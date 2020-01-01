@extends('layouts.admin_header')
@section('content')
<a href="{{ route('createDepartment') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($departments as $department)
    <tr>
        <td>{{ $department->name }}</td>
        <td>{{ $department->description }}</td>
        <td>
          <a href="/department/{{ $department->id}}/edit"class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a href="/department/{{ $department->id}}/destroy"class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></td>
    </tr>
    @endforeach
     </tbody>
</table>
@endsection
