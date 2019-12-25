@extends('layouts.app')


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin panel</div>

                <div class="card-body">
                  <h1>New</h1>
                      <form action="{{URL::to('admin/save')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                             <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title"/>
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                             </div>

                            <div class="form-group{{ $errors->has('article') ? ' has-error' : '' }}">
                                <label class="control-label " for="article">Text</label>
                                <textarea class="form-control" name="article" rows="5"></textarea>
                                <small class="text-danger">{{ $errors->first('article') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                                  <label for="author">Author</label>
                                  <input type="text" class="form-control" name="author"/>
                                  <small class="text-danger">{{ $errors->first('author') }}</small>
                            </div>


                            <div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}">
                              <input type="file" name="image" id="fileToUpload"> </br>
                              <small class="text-danger">{{ $errors->first('profile_image') }}</small>
                            </div>

                          <button type="submit" class="btn btn-primary">Add</button>
                  </form>

              </div>
        </div>
      </div>
    </div>
</div>


@endsection
