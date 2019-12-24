@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('departmentUpdate') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="text" name="id" value="{{ $department->id }}" hidden>
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Department Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="name" value="{{ $department->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <textarea name="description" id="editor">{{ $department->description }}</textarea>
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
