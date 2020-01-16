@extends('layouts.admin_header')

@section('content')
<a href="{{ route('projectCreate') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
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
            <td><img src="{{ asset('images/projectImages') }}/{{ $project->photo }}" style="width: 80px;"></td>
            <td>{{ $project->client->name }}</td>
            <td>@if($project->status == 0) Running
                @else Completed
                @endif
            </td>
            <td>
              <a href="{{ route('allProjects') }}" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> View As</a>
              <a href="/project/{{ $project->id }}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="/project/{{ $project->id }}/destroy" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
