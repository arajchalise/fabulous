@extends('layouts.client_header')

@section('content')
@if(count($orders) == 0)
    <p><span class="text-danger"><b>Nothing To Show</b></span></p>
@else
<table class="table">
    <thead>
    <tr>
      <th scope="col">Tnx Reference</th>
      <th scope="col">Receipent Name</th>
      <th scope="col">Receipent Contact</th>
      <th scope="col">Receipent Email</th>
      <th scope="col">Shipping Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
        @if($order->status == -1)
          <tr style="background: red; color: #fff;">
        @elseif($order->status == 2)
          <tr style="background: orange; color: #fff;">
        @else
          <tr>
        @endif
            <td>{{ $order->remarks }}</td>
            <td>{{ $order->receipent_name }}</td>
            <td>{{ $order->receipent_contact }}</td>
            <td>{{ $order->receipent_email }}</td>
            <td>{{ $order->shipping_address }}</td>
            <td>
                  <a href="orders/{{ $order->remarks }}/view" class="btn btn-success" ><i class="material-icons">visibility</i> </a>
                @if($order->status < 1)
                  <a href="orders/{{ $order->remarks }}/cancel" class="btn btn-danger" style="font-size: 13px; font-weight: bold;"><i class="material-icons">delete</i> </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif
@endsection
