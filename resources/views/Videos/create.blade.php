@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('videoStore') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
      
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Video</label>
            <div class="col-sm-10">
            <input type="file" name="video" />
            </div>
        </div>
        
        <input type="submit" name="" value="Store"  class="btn btn-success" />
    </form>
@endsection
