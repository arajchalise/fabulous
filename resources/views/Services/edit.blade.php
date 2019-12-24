@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('serviceUpdate') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="text" name="id" value="{{ $serv->id }}" hidden>
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Type of Service</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="name" value="{{ $serv->type_of_service }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <textarea name="description" id="editor">{{ $serv->description }}</textarea>
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
