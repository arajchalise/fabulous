@extends('layouts.admin_header')

@section('content')
<a href="{{ route('videoCreate') }}">Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($videos as $video)
        <tr>
            <td>{{ $video->id }}</td>
            <td>{{ $video->video }}</td>
            <td><a href="/video/{{ $video->id }}/edit">Edit</a><a href="/video/{{ $video->id }}/destroy">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
