@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('storeBlog') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Blog Title</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="title">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <textarea name="description" rows="17"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
            <input type="file" name="photo" />
            </div>
        </div>
        
        
        <input type="submit" name="" value="Store"  class="btn btn-success" />
    </form>
@endsection
