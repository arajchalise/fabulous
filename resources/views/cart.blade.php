@include('includes.head')
  <style type="text/css">
     
     
        .footer{
        background-color:#730510;
        min-height: 250px;
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
      background-image: url('images/banner.jpg');
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

<div class="container-fluid">
  <div class="container pt-5 pb-5">
    <div class="row" style="min-height: 300px;">
     @if(Session::has('cart'))
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
                <td><form>
                  {{ csrf_field() }}
                  <input class="form-control" type="number" name="qty" value="{{ $product['qty'] }}" min="1" onchange="updateCart({{$i-1}})" id="qty{{$i-1}}">
                </form></td>
                <td> {{ $product['amt'] }}</td>
                <td><button onclick="removeCart({{$i-1}});">X</button></td>
              </tr>
              <?php  $total_amt += $product['amt']; $i++; ?>
            @endforeach
            <tr><th colspan="5" scope="col">Total Amount</th><td>{{ $total_amt }}</td></tr>
        </tbody>
      </table>
      <a href="{{ route('checkout') }}">Proceed to Checkoout</a>
     @else
      <p>There's nothing to show</p>
     @endif
  </div>      
  </div>
</div>
<script type="text/javascript">
  function removeCart(id) {
      if(confirm("Remove Item??")){
        jQuery.get('/removeCart/'+id);
        location.reload(true);
      }
    }

    function updateCart(id) {
      var qty = jQuery('#qty'+id).val();
      console.log(qty);
      var _token = jQuery('input[name = "_token"]').val();
      jQuery.ajax({
                url: "{{ route('updateCart') }}",
                method: "POST",
                data: {qty:qty, id:id, _token:_token},
                success: function(data) {
                  location.reload(true);
                  console.log(data);
                }
              })
    }
</script>
@include('includes.footer')
