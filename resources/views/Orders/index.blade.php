@extends('layouts.admin_header')

@section('content')
@if(count($orders) == 0)
      <p><span class="text-danger"><b>Nothing To Show</b></span></p>
 @else
 <form class="form-inline" method="post" action="{{ route('filterOrderList') }}">
  {{ csrf_field() }}
  <input type="text" name="status" value="{{ $orders[0]->status }}" hidden>
  <div class="row">
  <div class="form-group mb-2 col-lg-4">
    <label for="staticEmail2" class="sr-only">Search Keyword</label>
    <input type="text" class="form-control" id="staticEmail2" placeholder="Enter your search Keyword" style="width: 100%;" name="key">
  </div>
  <div class="form-group mx-sm-3 mb-2 col-lg-4">
    <label for="inputPassword2" class="sr-only">Password</label>
    <select class="form-control" style="width: 100%;" name="key_type">
      <option value="">Select Keyword Type</option>
      <option value="remarks">Tnx Reference Number</option>
      <option value="first_name">First Name</option>
      <option value="last_name">Last Name</option>
      <option value="email">Email</option>
      <option value="contact_no">Contact No</option>
      <option value="name">Product Name</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success mb-2 col-lg-3">Search/Filter Tnx</button>
  </div>
</form>
<br><br>
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
<!--  -->
@endif
@endsection
