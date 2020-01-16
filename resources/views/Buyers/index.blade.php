@extends('layouts.client_header')

@section('content')
<table class="table" style="font-size: 14px;">
    <thead>
    <tr>
      <th scope="col" style="font-size: 14px; font-weight: bold;">Tnx Reference</th>
      <th scope="col" style="font-size: 14px; font-weight: bold;">Receipent Name</th>
      <th scope="col" style="font-size: 14px; font-weight: bold;">Receipent Contact</th>
      <th scope="col" style="font-size: 14px; font-weight: bold;">Receipent Email</th>
      <th scope="col" style="font-size: 14px; font-weight: bold;">Shipping Address</th>
      <th scope="col" style="font-size: 14px; font-weight: bold;">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->remarks }}</td>
            <td>{{ $order->receipent_name }}</td>
            <td>{{ $order->receipent_contact }}</td>
            <td>{{ $order->receipent_email }}</td>
            <td>{{ $order->shipping_address }}</td>
            <td>@if($order->status == 1)
                  <a href="orders/{{ $order->remarks }}/view" class="btn btn-success" style="font-size: 13px; font-weight: bold;"><i class="glyphicon glyphicon-eye-open"></i> View Txn</a>
                @else
                  <a href="orders/{{ $order->remarks }}/cancel" class="btn btn-danger" style="font-size: 13px; font-weight: bold;"><i class="glyphicon glyphicon-trash"></i> Remove Tnx</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
