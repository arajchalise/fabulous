@extends('layouts.admin_header')

@section('content')
<a href="{{ route('clientCreate') }}">Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Department</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->department->name }}</td>
            <td>{{ $user->role->name }}</td>
            <td>
              @if($user->role->name == 'Unverified')<a href="/user/{{ $user->id }}/verify">Verify</a>@endif
              <a href="/user/{{ $user->id }}/edit">Edit</a>
              <a href="/user/{{ $user->id }}/destroy">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
