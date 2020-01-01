@extends('layouts.admin_header')
@section('content')
<a href="{{ route('createCareer') }}"class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Position</th>
      <th scope="col">Description</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($careers as $career)
    <tr>
        <td>{{ $career->position }}</td>
        <td>{{ $career->description }}</td>
        <td>{{ $career->department->name }}</td>
        <td>
          <a href="/career/{{ $career->id }}"class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> View</a>
          <a href="/career/{{ $career->id}}/edit"class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
          <a href="/career/{{ $career->id}}/destroy"class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>
        </td>
    </tr>
    @endforeach
     </tbody>
</table>
@endsection
