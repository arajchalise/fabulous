@if(Auth::check())
  <div style="width: 100%; background: #000; min-height: 40px;">
    <span style="color: #fff; margin-left: 10%;">Hey, {{ Auth::user()->name}} done here ?? <a href="{{ route('home')}}" style="color: #fff">Go to Dashboard</a></span>
  </div>
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
   
  @include('includes.header')
<div class="container-fluid row">
  <div class="col-lg-6">
    <div class="container my-4">
    <!--Carousel Wrapper-->
    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        @foreach($product[0]->photos as $photo)
          @if($loop->first)
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/productImages')}}/{{ $photo->photo }}" alt="{{ $product[0]->name }}" height="300">
            </div>
          @else
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/productImages')}}/{{ $photo->photo }}" alt="{{ $product[0]->name }}">
              </div>
          @endif
        @endforeach
      </div>
      <!--/.Slides-->
      <!--Controls-->
      <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->
        <ol class="carousel-indicators">
          @for($i = 0; $i < count($product[0]->photos); $i++)
              @if($i == 0)
                <li data-target="#carousel-thumb" data-slide-to="0" class="active" style="width: 100px;"> <img class="d-block w-100" src="{{ asset('images/productImages') }}/{{ $product[0]->photos[$i]->photo }}"
            class="img-fluid" style="width: 100px; height: 50px;"></li>
              @else 
              <li data-target="#carousel-thumb" data-slide-to="{{ $i }}" style="width: 100px;"><img class="d-block w-100" src="{{ asset('images/productImages') }}/{{ $product[0]->photos[$i]->photo }}"
            class="img-fluid" style="width: 100px; height: 50px;"></li>
              @endif
          @endfor
      </ol>
    </div>
    <!--/.Carousel Wrapper-->

  </div>
  </div>

  <div class="col-lg-6">
    <h3 style="margin-top:40px; ">{{ $product[0]->name }}</h3>
    <h4>{{ $product[0]->brand_name }}</h4>
    <h4>Rs. {{ $product[0]->price }}/ unit</h4>
    <p class="text-muted">Please enter the qty you need </p>
    <form action="{{ route('addToCart') }}" method="post">
      {{ csrf_field() }}
      <input type="text" name="id" value="{{ $product[0]->id }}" hidden>
      <input type="text" name="name" value="{{ $product[0]->name }}" hidden>
      <input type="text" name="brand_name" value="{{ $product[0]->brand_name }}" hidden>
      <input type="text" name="brand_name" value="{{ $product[0]->photos[0]->photo }}" hidden>
      <input type="text" name="price" value="{{ $product[0]->price }}" hidden>
      <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-5">
            <input type="number" class="form-control" id="quantity" name="qty" min="1" value="1">
            </div>
        </div>
      <br>
      <input type="submit" name="addToCart" value="Add To Cart" class="btn btn-primary">
      <input type="submit" name="buyNow" value="Buy Now" class="btn btn-success">
    </form>
  </div>
</div>
<div style="height: 50px;"></div>
<div class="container-fluid" style="width: 90%; margin-left: auto; ,margin-right: auto;">
  <h1>Product Overview</h1>
  <p>{!! $product[0]->description !!}</p>
</div>
<script type="text/javascript">
  function addToCart(id) {
    jQuery.get('addToCart/'+id);
  }
</script>
@include('includes.footer')
