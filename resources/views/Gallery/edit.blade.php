@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('galleryUpdate') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="text" name="id" value="{{ $gallery->id }}" hidden>
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Caption</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="caption" value="{{ $gallery->caption }}">
            </div>
        </div>
        <input type="submit" name="" value="Update"  class="btn btn-success" />
    </form>
@endsection
