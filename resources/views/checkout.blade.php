@include('includes.head')
<style type="text/css">
     
     
        .footer{
        background-color:#730510;
        height: 250px;
        width: 100%;
        
      }
      hr{
        border-color: white;
      }
      .icon a i:hover{
           color:green;
      }
    
   .blog{
        background-image:url('images/bg.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        width: 100%;
        background-size: cover;
        height: 300px;
   }

   .bg{
      background-image: url('/..images/banner.jpg');
   }
      
      .carousel-item {
    height: 350px;
    }

.carousel-indicators li {
    width: 10px;
    height: 10px;
    border-radius: 100%;
}
.carousel-indicators {
    bottom: -50px;
}
  </style>
  <body style="margin-top: 0px;">
@include('includes.product_header')

<div class="container-fluid" style="min-height: 400px; width: 90%; margin-left: auto; margin-right: auto;">
  <form action="{{ route('makeOrder') }}" method="POST">
  <div class="row">
  <div class="col-lg-6">
    {{ csrf_field() }}
    <p ><b>Billing Address</b></p>
       <div class="form-row">
      <div class="form-group col-md-6">
      <label for="firstName">First Name</label>
      <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName" value="{{ Auth::guard('buyer')->user()->first_name }}" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="lastName">Last Name</label>
      <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName" value="{{ Auth::guard('buyer')->user()->last_name }}" readonly>
    </div>
  </div>
    <div class="form-row">
      <div class="form-group col-md-6">
      <label for="email">Email </label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ Auth::guard('buyer')->user()->email }}" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="contactNo">Contact No.</label>
      <input type="text" class="form-control" id="contactNo" placeholder="Contact Number" name="contactNo" value="{{ Auth::guard('buyer')->user()->contact_no }}" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ Auth::guard('buyer')->user()->address }}" readonly>
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" onclick="getShippingAddr();" value="Y" name="ship">
      <label class="form-check-label" for="gridCheck">
        Ship to another address
      </label>
    </div>
  </div>
  <div id="shippingAddr" style="display: none;">
    <p><b>Shipping Address</b></p>
      <div class="form-row">
      <div class="form-group col-md-6">
      <label for="sFirstName">First Name</label>
      <input type="text" class="form-control" id="sFirstName" placeholder="First Name" name="sFirstName">
    </div>
    <div class="form-group col-md-6">
      <label for="sLastName">Last Name</label>
      <input type="text" class="form-control" id="sLastName" placeholder="Last Name" name="sLastName">
    </div>
  </div>
    <div class="form-row">
      <div class="form-group col-md-6">
      <label for="sEmail">Email </label>
      <input type="email" class="form-control" id="sEmail" placeholder="Email" name="sEmail">
    </div>
    <div class="form-group col-md-6">
      <label for="sContactNo">Contact No.</label>
      <input type="text" class="form-control" id="sContactNo" placeholder="Contact Number" name="sContactNo">
    </div>
  </div>
  <div class="form-group">
    <label for="sAddress">Address</label>
    <input type="text" class="form-control" id="sAddress" placeholder="Address" name="sAddress">
  </div>
  </div>

</div>
<div class="col-lg-6">
    <table class="table col-sm-12">
        <thead>
          <th scope="col">SN</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Image</th>
          <th scope="col">Product Price</th>
          <th scope="col">Quantity</th>
          <th scope="col"> Amount</th>
        </thead>
        <tbody>
            <?php  $v = Session::get('cart'); $total_amt = 0; $i= 1;?>
            @foreach($v as $product)
            <tr>
                <td> {{ $i }} </td>
                <td> {{ $product['name'] }}</td>
                <td><img src="{{ asset('images/productImages') }}/{{ $product['photo'] }}" style="width: 60px; height: 60px;"></td>
                <td> {{ $product['price'] }}</td>
                <td>{{ $product['qty'] }}</td>
                <td> {{ $product['amt'] }}</td>
                <td><button onclick="removeCart({{$i-1}});">X</button></td>
              </tr>
              <?php  $total_amt += $product['amt']; $i++; ?>
            @endforeach
            <tr><th colspan="5" scope="col">Total Amount</th><td>{{ $total_amt }}</td></tr>
        </tbody>
      </table>
      <input type="submit" name="" value="Make Order" class="btn btn-success" style="float: right;">
</div>
</div>
</form>
</div>
<script type="text/javascript">
  function getShippingAddr() {
      if(jQuery('#gridCheck').prop('checked')){
        jQuery('#shippingAddr').css('display', 'block');
      } else {
        jQuery('#shippingAddr').css('display', 'none');
      }
    }
</script>
@include('includes.footer')

