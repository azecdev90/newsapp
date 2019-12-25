@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin panel</div>

                <div class="card-body">

                    <h1>Articles</h1>
                        @foreach($articles as $article)
                       {{$article->title}}

                      <a href="{{URL::to('admin/edit/'.$article->id )}}"><button type="button" class="btn btn-success">Edit</button></a>
                      <a href="{{URL::to('admin/delete/'.$article->id )}}"> <button type="button" class="btn btn-danger">Delete</button></a>

                      </br>
                    @endforeach
                       <a href="{{URL::to('admin/new/')}}"><button type="button" class="btn btn-primary" style="margin-top:30px;">New Article</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
