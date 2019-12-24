@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('blogUpdate') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="text" name="id" value="{{ $blog->id }}" hidden>
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Blog Title</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="title" value="{{ $blog->title }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <textarea name="description" id="editor">{{ $blog->description }}</textarea>
            </div>
        </div>    
        <input type="submit" name="" value="Update"  class="btn btn-success" />
    </form>
    <script>
    CKEDITOR.replace('editor', {
      height: 400,
      baseFloatZIndex: 10005
    });
  </script>
@endsection
