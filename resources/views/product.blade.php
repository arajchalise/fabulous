@if(Auth::check())
  <div style="width: 100%; background: #000; min-height: 40px;">
    <span style="color: #fff; margin-left: 10%;">Hey, {{ Auth::user()->name}} done here ?? <a href="{{ route('home')}}" style="color: #fff">Go to Dashboard</a></span>
  </div>
@endif
@if(Session::has('message'))
  <script type="text/javascript">
    alert('Your order has been placed, you will notify later');
  </script>
  <?php Session::forget('message'); ?>
@endif
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

<div class="blog pt-3 pt-3" style="background: url('../images/bg.jpg');">
  <h1 style="color: white; padding-top: 100px" align="center">
    @if(Session::has('category'))
    {{ Session::get('category') }}
    @else
    Our products
    @endif
  </h1>
</div>

<div class="container-fluid">
  <div class="container pt-5 pb-5">
    <div class="row">
      @foreach($products as $product)
            <div class="item col-lg-3 col-sm-12 col-md-4" style="margin-bottom: 10px;">
              <div class="card" style="width: 100%; border: none;" >
                <!-- <img src="{{('images/productImages')}}/{{ $product->photos[0]->photo }}" class="card-img-top" alt="{{ $product->name }}" height="250"> -->
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                @foreach($product->photos as $photo)
                  @if($loop->first)
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/productImages')}}/{{ $photo->photo }}" height="250">
                    </div>
                    @else
                     <div class="carousel-item">
                      <img class="d-block w-100" src="{{ asset('images/productImages')}}/{{ $photo->photo }}" alt="First slide" height="250">
                    </div>
                  @endif
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="background-color: #000; height: 30px; margin-top: 40%;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="background-color: #000; height: 30px; margin-top: 40%;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          
          <div class="container-fluid" style="background-color:#730510; min-height:50px;">
            <h5 class="text-center pt-2" style="color: white; font-family:times-new-roman;"><a href="/products/{{ $product->id }}" style="color: white">{{ Str::limit($product->name, 18) }}</a>
            </h5>
            <p style="color: #fff; font-family:times-new-roman; font-size: 17px;"><!-- <img src=" {{ asset('images/location.png') }} " style="width: 20px;"> --> Rs. {{ $product->price }}/ unit<br>
              {{ $product->brand_name }}<br> {{ $product->category->name }}
            </p>
          </div>
        </div>
        <!-- <button class="btn btn-sucess"  onclick="addToCart({{ $product->id }});" style="background-color: green; width: 48%; margin-top: 5px;"> Add to Cart</button>
        <button class="btn btn-sucess"  onclick="buyNow({{ $product->id }});" style="background-color: green; width: 48%; margin-top: 5px;"> Buy Now</button> -->
        <form action="{{ route('addToCart') }}" method="post">
      {{ csrf_field() }}
      <input type="text" name="id" value="{{ $product->id }}" hidden>
      <input type="text" name="name" value="{{ $product->name }}" hidden>
      <input type="text" name="brand_name" value="{{ $product->brand_name }}" hidden>
      <input type="text" name="price" value="{{ $product->price }}" hidden>
      <input type="number" class="form-control" id="quantity" name="qty" min="1" value="1" hidden>
      <input type="text" name="photo" value="{{ $product->photos[0]->photo }}" hidden>
      <br>
      <input type="submit" name="addToCart" value="Add To Cart" class="btn btn-primary" style="width: 48%;">
      <input type="submit" name="buyNow" value="Buy Now" class="btn btn-success" style="width: 48%;">
    </form>
            </div>
      @endforeach
  </div>
    <div class=" row justify-content-center">
      {{ $products->links('pagination::bootstrap-4') }}
    </div>       
  </div>
</div>
<script type="text/javascript">
  function addToCart(id) {
    jQuery.get('addToCart/'+id);
  }
</script>
@include('includes.footer')
