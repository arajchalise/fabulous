@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('categoryStore') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="name">
            </div>
        </div>
        
        <input type="submit" name="" value="Store"  class="btn btn-success" />
    </form>
@endsection
