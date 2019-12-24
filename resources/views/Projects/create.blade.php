@extends('layouts.admin_header')

@section('content')

    <form action="{{ route('projectStore') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Projects Name</label>
            <div class="col-sm-10">
            <input type="text" name="pname" class="form-control" id="clientsName">
            </div>
        </div>
         <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Clients Name</label>
            <div class="col-sm-10">
                <select name="cid" class="form-control">
                    <option value="0">Select Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach                
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
            <input type="file" name="photo" />
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Project Description</label>
            <div class="col-sm-10">
                <textarea name="description" id="editor"></textarea>
            </div>
        </div>
        <input type="submit" name="" value="Store"  class="btn btn-success" />
    </form>
    <script>
    CKEDITOR.replace('editor', {
      height: 400,
      baseFloatZIndex: 10005
    });
  </script>
@endsection
