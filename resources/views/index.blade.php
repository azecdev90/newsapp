@extends('layouts.public')


@section('content')

       <main role="main">
         <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
                  @foreach($articles as $article)
                    <div class="col-md-4">
                      <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{url($article->thumb)}}" width="250" height="250" alt="Image"/>
                          <div class="card-body">
                            <a href="{{URL::to('article/'.$article->id )}}"><h3 class="card-text">{{$article->title}}</h3></a>

                         </div>
                       </div>
                     </div>
                  @endforeach
                </div>
            </div>

      </div>
      <div class="container">

        <div class="pos" style="margin-left:500px">
    {{ $articles->links() }}
</div>
</div>
    </main>

@endsection
