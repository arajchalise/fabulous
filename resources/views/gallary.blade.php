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
      
  </style>
  <body style="margin-top: 0px;">
   <div style="background: rgba(0, 0, 0, 0.7); width: 100%; display: none;">
     <img src="" id="img" style="display: none;width: 90%; z-index: 5000; margin-left: auto; margin-right: auto;">
     <a onclick="hideImage()" style="position: absolute; z-index: 6000;">Close</a>
   </div>
     <!-- Nav Bar  -->

    @include('includes/header')
   <!-- End of Nav Bar -->
<div class="blog">
  <h1 style="color: white; padding-top: 100px" class="text-center"><b>Gallery</b></h1>
</div>

<div class="container-fluid">
<div class="container">
 <div class="row">
  <div class="col-md-12">

    <div id="mdb-lightbox-ui"></div>
    <div class="mdb-lightbox">
        <div class="row pt-3 pb-3">
              @foreach($galleries as $gallery)
                <div class="col-lg-3 col-md-6 col-sm-12">
                  <a href="{{ asset('images/galleryImages') }}/{{ $gallery->photo }}" data-size="    1600x1067" style="display: block;">
                      <img alt="{{ $gallery->caption }}" src="{{ asset('images/galleryImages') }}/{{ $gallery->photo }}" class="img-fluid" />
                  </a>
                </div>
              @endforeach
        </div>

      <!--<figure class="col-md-4">
        
      </figure>

      <figure class="col-md-4">
        <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(150).jpg" data-size="1600x1067">
          <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(150).jpg" class="img-fluid" />
        </a>
      </figure>-->

    </div>

  </div>
</div>
</div>
</div>

<!-- Footer  -->
  <script type="text/javascript">
    function showImage(image) {
      var name = "{{asset('images/galleryImages/')}}"+"/"+image;
      document.getElementById('img').src = name;
      document.getElementById('img').style.display = 'block';
    }
  </script>
@include('includes.footer')
<!-- Foote End -->
