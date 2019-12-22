@extends('layouts.admin_header')

@section('content')
    <form action="{{ route('submenuStore') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Submenu Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="clientsName" name="name">
            </div>
        </div>
        <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Menu Name</label>
            <div class="col-sm-10">
            <select name="mid" class="form-control">
                    <option value="0">Select Menu</option>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->menu_name }}</option>
                    @endforeach                
                </select>
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
