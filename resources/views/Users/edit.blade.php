@extends('layouts.admin_header')

@section('content')

    <form action="{{ route('userUpdate') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="text" name="id" value="{{ Auth::user()->id }}" hidden>
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="clientsName" value="{{ Auth::user()->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="password" name="password" class="form-control">
            </div>
        </div>
         <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
            <input type="password" name="password" class="form-control">
            </div>
        </div>
        <input type="submit" name="" value="Update"  class="btn btn-success" />
    </form>
@endsection
