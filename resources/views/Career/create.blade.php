@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('storeCareer') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Position</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="position">
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
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    // filebrowserUploadUrl: '/ckeditor/upload',
    // filebrowserUploadMethod: 'form'
  };
</script>
<script>
CKEDITOR.replace('editor', options);
</script>

@endsection
