@extends('layouts.admin_header')

@section('content')
<a href="{{ route('clientCreate') }}">Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">URL</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($menus as $menu)
        <tr>
            <td>{{ $menu->menu_name }}</td>
            <td>{{ $menu->url }}</td>
            <td><a href="/menu/{{ $menu->id }}/edit">Edit</a><a href="/menu/{{ $menu->id }}/destroy">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
