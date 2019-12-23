@extends('layouts.admin_header')

@section('content')
@if(Auth::user()->role->name != 'Unverified')
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
              @if(Auth::user()->role->name == 'Admin')
                @if($user->role->name == 'Unverified')<a href="/user/{{ $user->id }}/verify">Verify</a>@endif
              @endif
              @if($user->id == Auth::user()->id)<a href="{{ route('userEdit') }}">Edit</a>@endif
              @if($user->id != Auth::user()->id)<a href="/user/{{ $user->id }}/destroy">Delete</a>@endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
<p>You are not verified yet, Please logged yourself out</p>
@endif
@endsection
