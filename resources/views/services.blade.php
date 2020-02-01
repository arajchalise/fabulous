@if(Auth::check())
  <div style="width: 100%; background: #000; min-height: 40px;">
    <span style="color: #fff; margin-left: 10%;">Hey, {{ Auth::user()->name}} done here ?? <a href="{{ route('home')}}" style="color: #fff">Go to Dashboard</a></span>
  </div>
@endif
@include('includes.head')
  <style type="text/css">
      .itback{
        background-image: url('images/tab.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        width: 100%;
        background-size: cover;
      }
      .project{
        background-image: url('images/tab.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        width: 100%;
        background-size: cover;
      }
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
      .services{
        background-image:url('images/services.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        width: 100%;
        background-size: cover;
        height: 300px;
      }
      .IT{
        background-color:  #ee8910;
        
      }
       .electronic{
        background-color:   #9d10ee;
       
      }
        .civil{
        background-color:#4b1538;
       
      }
     
      
  </style>
  <body style="margin-top: 0px;">
   <!-- Nav Bar  -->

    @include('includes/header')
   <!-- End of Nav Bar -->
   <div id="app"></div>
 <div class="container-fluid services">
  <br><br>
   <h1 class="text-center pt-5" style="color:white; font-family:times-new-roman;">Services</h1>
 </div>
 <div class="row" style="width: 90%; margin-left: auto; margin-right: auto;">
@foreach($services as $service)
  <div class="col-md-4" style="min-height: 200px; margin-top: 20px;">
    <center><img src="{{ asset('images') }}/{{ $service->department->name }}.png" style="width: 100px;"></center>
    <h3 style="text-align: center; padding-top: 30px; padding-bottom: 20px; background-color: #E3F2FD; margin-top: 5px;">{{ $service->type_of_service }}</h3>
  </div>
@endforeach
</div>
<!-- Footer  -->
  
@include('includes.footer')
<!-- Foote End -->
