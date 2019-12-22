@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('menuStore') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Menu Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="url">
            </div>
        </div>
        
        <input type="submit" name="" value="Store"  class="btn btn-success" />
    </form>
@endsection
