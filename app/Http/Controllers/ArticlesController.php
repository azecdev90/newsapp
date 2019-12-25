<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Image;

class ArticlesController extends Controller
{

/**
 * Show 5 last articles from database
 *
 * @return View
 */
public function show()
{
      $articles = Article::paginate(6);
      return view('index', ['articles' => $articles]);
}

/**
 * Show specified article and display it public
 *
 * @param int $id
 * @return View
 */
public function showarticle($id)
{
        $article = Article::find($id);
        return view('article', compact('article'));
}

/**
 * Show articles in admin panel
 *
 * @return View
 */
public function index()
{
      $articles = Article::all();
      return view('ind', compact('articles'));
}

/**
 * Add form for new articles
 *
 * @return View
 */
public function addForm()
{
          return view('addform');
}

/**
 * Method for editing articles in admin panel
 *
 * @return View
 */
public function edit($id)
{
      $article = Article::find($id);
      return view('edit', compact('article'));

}

/**
* Method for updating article
*
*
*/
public function update(Request $request, $id)
{

    $request->validate([
      'title'=>'required',
      'article'=>'required',
      'author'=>'required',
      'image' => 'required|image'
  ]);

  if($request->hasFile('image')) {

      $filenamewithextension = $request->file('image')->getClientOriginalName();
      $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      $extension = $request->file('image')->getClientOriginalExtension();
      $filenametostore = $filename.'_'.time().'.'.$extension;

      $request->file('image')->storeAs('public/images', $filenametostore);
      $request->file('image')->storeAs('public/images/thumbnail', $filenametostore);
      $request->file('image')->storeAs('public/images/display', $filenametostore);

      $thumbnailpath = public_path('storage/images/thumbnail/'.$filenametostore);
      $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
          $constraint->aspectRatio();
      });
      $img->save($thumbnailpath);
      $displaypath = public_path('storage/images/display/'.$filenametostore);
      $img = Image::make($displaypath)->resize(1000, 450, function($constraint) {
          $constraint->aspectRatio();
      });
      $img->save($displaypath);
      $thumbnailpath = 'storage/images/thumbnail/'.$filenametostore;
      $displaypath = 'storage/images/display/'.$filenametostore;
}


        $article = Article::find($id);
        $article->title =  $request->get('title');
        $article->article = $request->get('article');
        $article->author = $request->get('author');
        $article->thumb = $thumbnailpath;
        $article->picture = $displaypath;

        $article->save();
  }

  /**
  * Method for add new article
  *
  */
  public function save(Request $request)
  {
      $request->validate([
        'title'=>'required|min:5',
        'article'=>'required',
        'author'=>'required',
        'image' => 'required|image'
    ]);

    if($request->hasFile('image')) {

        $filenamewithextension = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenametostore = $filename.'_'.time().'.'.$extension;

        $request->file('image')->storeAs('public/images', $filenametostore);
        $request->file('image')->storeAs('public/images/thumbnail', $filenametostore);
        $request->file('image')->storeAs('public/images/display', $filenametostore);

        $thumbnailpath = public_path('storage/images/thumbnail/'.$filenametostore);
        $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
        $displaypath = public_path('storage/images/display/'.$filenametostore);
        $img = Image::make($displaypath)->resize(1000, 450, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($displaypath);
        $thumbnailpath = 'storage/images/thumbnail/'.$filenametostore;
        $displaypath = 'storage/images/display/'.$filenametostore;
}

          $article = new Article([
          'title' => $request->get('title'),
          'article' => $request->get('article'),
          'author' => $request->get('author'),
          'thumb' => $thumbnailpath,
          'picture' => $displaypath,

      ]);

      $article->save();
    }

/**
 * Delete specified article
 *
 * @param int $id
 * @return
 */
public function delete($id) {
        $article = Article::find($id);
        $article->delete();

    }
}
