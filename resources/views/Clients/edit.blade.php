@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('clientUpdate') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="text" name="id" value="{{ $client->id }}" hidden>
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Clients Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="name" value="{{ $client->name }}">
            </div>
        </div>
        <input type="submit" name="" value="Update"  class="btn btn-success" />
    </form>
@endsection
