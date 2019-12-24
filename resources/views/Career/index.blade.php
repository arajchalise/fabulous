@extends('layouts.admin_header')
@section('content')
<a href="{{ route('createCareer') }}">Add New</a>
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
          <a href="/career/{{ $career->id }}">View</a>
          <a href="/career/{{ $career->id}}/edit">Edit</a>
          <a href="/career/{{ $career->id}}/destroy">Delete</a>
        </td>
    </tr>
    @endforeach
     </tbody>
</table>
@endsection
