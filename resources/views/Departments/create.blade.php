@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('storeDepartment') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Department Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <textarea name="description" id="editor"></textarea>
            </div>
        </div>
        
        
        <input type="submit" name="" value="Store"  class="btn btn-success" />
    </form>
    <script>
    CKEDITOR.replace('editor', {
      height: 400,
      baseFloatZIndex: 10005
    });
  </script>
@endsection
