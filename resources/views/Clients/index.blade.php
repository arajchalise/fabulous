@extends('layouts.admin_header')

@section('content')
<a href="{{ route('clientCreate') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Logo</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td><img src="{{ asset('images/clientImages') }}/{{ $client->logo }}" style="width: 70px;"></td>
            <td>{{ $client->department->name }}</td>
            <td>
              <a href="/client/{{ $client->id }}/edit" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
              <a href="/client/{{ $client->id }}/destroy" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
