@extends('layouts.admin_header')

@section('content')
<a href="{{ route('clientCreate') }}">Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">Caption</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($galleries as $gallery)
        <tr>
            <td>{{ $gallery->photo }}</td>
            <td>{{ $gallery->caption }}</td>
            <td><a href="/gallery/{{ $gallery->id }}/edit">Edit</a><a href="/gallery/{{ $gallery->id }}/destroy">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
