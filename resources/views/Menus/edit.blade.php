@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('menuUpdate') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Menu Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="name" value="{{ $menu->menu_name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="url" value="{{ $menu->url }}">
            </div>
        </div>
        <input type="text" name="id" value="{{ $menu->id }}" hidden>
        <input type="submit" name="" value="Update"  class="btn btn-success" />
    </form>
@endsection
