@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin panel</div>

                <div class="card-body">
                  <h1>Edit</h1>

                            <form method="post" action="{{URL::to('admin/update/'.$article->id )}}"  enctype="multipart/form-data">
                                      @method('PUT')
                                      @csrf

                                       <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                          <label for="title">Title:</label>
                                          <input type="text" class="form-control" name="title" value="{{ $article->title }}" />
                                          <small class="text-danger">{{ $errors->first('title') }}</small>
                                      </div>

                                        <div class="form-group{{ $errors->has('article') ? ' has-error' : '' }}">
                                          <label class="control-label " for="article">Text</label>
                                          <textarea class="form-control" name="article" rows="5">{{$article->article}}</textarea>
                                          <small class="text-danger">{{ $errors->first('article') }}</small>
                                      </div>


                                    <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                                          <label for="author">Author</label>
                                          <input type="text" class="form-control" name="author" value="{{ $article->author }}" />
                                         <small class="text-danger">{{ $errors->first('author') }}</small>
                                      </div>

                                      <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                          <input type="file" name="image" id="fileToUpload">
                                          <small class="text-danger">{{ $errors->first('image') }}</small>
                                    </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                         </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
