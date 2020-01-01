@extends('layouts.admin_header')

@section('content')
<a href="{{ route('serviceCreate') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
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
            <td>
              <a href="{{ route('services') }}"class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> View As</a>
              <a href="/service/{{ $service->id }}/edit"class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="/service/{{ $service->id }}/destroy"class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
