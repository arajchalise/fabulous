@extends('layouts.admin_header')

@section('content')
<a href="{{ route('serviceCreate') }}">Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Type of Service</th>
      <th scope="col">Description</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($services as $service)
        <tr>
            <td>{{ $service->type_of_service }}</td>
            <td>{{ $service->description }}</td>
            <td>{{ $service->department->name }}</td>
            <td><a href="/service/{{ $service->id }}/edit">Edit</a><a href="/service/{{ $service->id }}/destroy">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
