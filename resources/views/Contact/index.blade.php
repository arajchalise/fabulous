@extends('layouts.admin_header')

@section('content')
<a href="{{ route('clientCreate') }}">Add New</a>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Company</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->company }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->message }}</td>
            <td>
              <a href="/contact/{{ $contact->id }}/sendEmail">Reply</a>
              <a href="/contact/{{ $contact->id }}/destroy">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
