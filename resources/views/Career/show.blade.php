@extends('layouts.admin_header')

@section('content')
<h4>Position: {{ $career->position }}</h4>
<h4>Candidates</h4>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">CV</th>
    </tr>
  </thead>
  <tbody>
    @foreach($career->candidate as $c)
        <tr>
            <td>{{ $c->name }}</td>
            <td>{{ $c->email }}</td>
            <td>{{ $c->address }}</td>
            <td>{{ $c->phone }}</td>
           <td><a href="{{ asset('/candidateCv') }}/{{ $c->cv }}">{{ $c->cv }}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
