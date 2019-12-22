@extends('layouts.admin_header')

@section('content')

    <form action="{{ route('userVerify') }}" method="POST" enctype='multipart/form-data'>
        {{ csrf_field() }}
       <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-10">
                <select name="did" class="form-control">
                    <option value="0">Select Department</option>
                    @foreach($data['departments'] as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach                
                </select>
            </div>
        </div>
         <div class="form-group row">
            <label for="clientsName" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select name="rid" class="form-control">
                    <option value="0">Select Role</option>
                    @foreach($data['roles'] as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach                
                </select>
            </div>
        </div>
       <input type="text" name="id" value="{{ $data['id']}}" hidden>
        <input type="submit" name="" value="Verfy"  class="btn btn-success" />
    </form>
@endsection
