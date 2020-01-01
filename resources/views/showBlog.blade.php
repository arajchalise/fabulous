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
        background-image:url('images/services.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        width: 100%;
        background-size: cover;
        height: 300px;
   }

       
      
     
      
  </style>
 
  <body style="margin-top: 0px;">
     <!-- Nav Bar  -->

    @include('includes/header')
   <!-- End of Nav Bar -->

    <div class="container-fluid">
      <div class="container ">
        <div class="row">
          
          <div class="col-md-8">
            <h1>{{ $blog->title }}</h1>
            <img src="{{ asset('images/blogImages') }}/{{ $blog->photo }}"><br><br>
            <p>{!! $blog->description !!}</p>
          </div>
          <div class="col-md-4"></div>

        </div>

      </div>
    </div>
<!-- Footer  -->
  
@include('includes.footer')
<!-- Foote End -->
