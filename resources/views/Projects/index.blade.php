@extends('layouts.admin_header')

@section('content')
<a href="{{ route('projectCreate') }}">Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Photo</th>
      <th scope="col">Client</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{{ $project->name }}</td>
            <td>{!! $project->description !!}</td>
            <td><img src="{{ asset('images') }}/{{ $project->photo }}"></td>
            <td>{{ $project->client->name }}</td>
            <td>{{ $project->department->name }}</td>
            <td><a href="/client/{{ $project->id }}/edit">Edit</a><a href="/client/{{ $project->id }}/destroy">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
