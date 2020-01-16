@extends('layouts.client_header')
<style type="text/css">
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
@section('content')
<h2 style="text-align: center;">Invoice</h2>
<table class="table">
  <tr><b>Fabulous Engineering</b><br>Bafal, Kathmandu<br>977-1-1111111<br>info@fabulous.com.np<br><br></span></tr>
  <thead>
    <th scope="col" >Billing Address</th>
    <th scope="col">Shipping Address</th>
  </thead>
  <tbody>
    <tr>
      <td><b>{{ $orders[0]->buyer->first_name }} {{ $orders[0]->buyer->last_name }}</b><br>{{ $orders[0]->buyer->address }} <br> {{ $orders[0]->buyer->contact_no }} <br> {{ $orders[0]->buyer->email }}</td>
      <td><b>{{ $orders[0]->receipent_name }}</b><br>{{ $orders[0]->shipping_address }} <br> {{ $orders[0]->receipent_contact }} <br> {{ $orders[0]->receipent_email }}</td>
    </tr>
  </tbody>
</table>
@if($orders[0]->status == -1)
<?php  $v = new \App\HoldOrder();
        $msg = $v->getMessage($orders[0]->remarks);
 ?>
<p><b>Reason for suspension: <span class="text-danger">{{ $msg }}</span></b></p>
@endif
<p>Transaction Reference: <b>{{ $orders[0]->remarks }}</b></p>
<p>Purchase Details: </p>
<table class="table">
    <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; $subtotal = 0; ?>
    @foreach($orders as $order)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $order->product->name }}</td>
            <td><img src="{{ asset('images/productImages') }}/{{ $order->product->photos[0]->photo }}" style="width: 60px;"></td>
            <td>{{ number_format($order->product->price, 2) }}</td>
            <td>{{ $order->qty }}</td>
            <td>{{ number_format($order->total_amount, 2) }}</td>
        </tr>
        <?php $i++; $subtotal+= $order->total_amount; ?>
    @endforeach
    <tr><th scope="col" colspan="5">Sub Total</th><th scope="col">{{ number_format($subtotal, 2) }}</th></tr>
    <tr><th scope="col" colspan="5">Discount</th><th scope="col">{{ number_format(0, 2) }}</th></tr>
    <tr><th scope="col" colspan="5">Tax 13%</th><th scope="col">{{ number_format($subtotal*0.13, 2) }}</th></tr>
    <tr><th scope="col" colspan="5">Grand Total</th><th scope="col">{{ number_format($subtotal+$subtotal*0.13, 2) }}</th></tr>
    <tr>
      @if($orders[0]->status == 1)
      <td colspan="4"></td><td colspan=""><a href="#" class="btn btn-success" onclick="showModel({{ $orders[0]->remarks }})"><i class="material-icons">payment</i> Looks Good? , Upload Payment Proof</a> 
        @endif
    </td>
  </tr>
    </tbody>
</table>

  <div id="myModal" class="modal" style="width: 70%; margin-left: auto; margin-right: auto;">

  <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <form class="pt-3 pb-3" method="POST" action="{{ route('makePayment')}}" enctype='multipart/form-data'>
          {{ csrf_field() }}
          <input type="text" name="tnx" id="id" hidden>
          <input type="file" name="photo">
          <input type="submit" class="btn btn-success btn" value="Submit">
        </form>
        </div>

      </div>
<script type="text/javascript">
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var submit = document.getElementById('submit');
    // When the user clicks on the button, open the modal
    function showModel(id) {
      modal.style.display = "block";
      document.getElementById('id').value = id;
      //document.myForm.action = '/contact/'+id+'/sendEmail';
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    submit.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>
@endsection
