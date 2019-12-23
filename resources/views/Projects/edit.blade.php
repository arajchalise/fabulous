@extends('layouts.admin_header')

@section('content')

    <form action="{{ route('projectUpdate') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <input type="texte" name="id" value="{{ $project->id }}" hidden>
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Projects Name</label>
            <div class="col-sm-10">
            <input type="text" name="pname" class="form-control" id="clientsName" value="{{ $project->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Projects Name</label>
            <div class="col-sm-10">
            <textarea name="description" rows="17">{{ $project->description }}</textarea>
            </div>
        </div>
        <input type="submit" name="" value="Store"  class="btn btn-success" />
    </form>
@endsection
