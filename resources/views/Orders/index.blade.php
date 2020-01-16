@extends('layouts.admin_header')

@section('content')
<table class="table">
    <thead>
    <tr>
      <th scope="col">Tnx Id</th>
      <th scope="col">Client Name</th>
      <th scope="col">Receipent Name</th>
      <th scope="col">Receipent Contact</th>
      <th scope="col">Receipent Email</th>
      <th scope="col">Shipping Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->remarks }}</td>
            <td>{{ $order->buyer->first_name }} {{ $order->buyer->last_name }}</td>
            <td>{{ $order->receipent_name }}</td>
            <td>{{ $order->receipent_contact }}</td>
            <td>{{ $order->receipent_email }}</td>
            <td>{{ $order->shipping_address }}</td>
            <td><a href="/orders/{{ $order->remarks }}" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> View Tnx</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
