@extends('layouts.admin_header')

@section('content')
<a href="{{ route('submenuCreate') }}">Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Parent Menu</th>
      <th scope="col">URL</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($menus as $menu)
        <tr>
            <td>{{ $menu->submenu_name }}</td>
            <td>{{ $menu->menu->menu_name }}</td>
            <td>{{ $menu->url }}</td>
            <td><a href="/submenu/{{ $menu->id }}/edit">Edit</a><a href="/submenu/{{ $menu->id }}/destroy">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
