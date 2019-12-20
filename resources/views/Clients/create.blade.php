@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('clientStore') }}" method="POST">
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Clients Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Clients Logo</label>
            <div class="col-sm-10">
            <input type="file" name="logo" />
            </div>
        </div>
        
        <input type="submit" name="" value="Store"  class="btn btn-success" />
    </form>
@endsection
