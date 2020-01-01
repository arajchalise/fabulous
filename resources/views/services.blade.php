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
        height: 250px;
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
 @foreach($services as $service)
 @if($service->department->name == 'IT')
 <div class="IT">
  <div class="container">
    
     <h1 class="pt-3"style="font-family:times-new-roman; color:white;">
        {{ $service->type_of_service }}
     </h1>
     <p style="color:white;">{!! $service->description !!}</p>
   <div class="row" > 
     <div class="col-lg-8 col-md-8 col-sm-4 pt-3 "  data-aos="fade-right" data-aos-duration="3000">
       
     </div>
      <div class="col-lg-4 col-md-4 col-sm-12" data-aos="fade-left" data-aos-duration="3000">
        <img src="{{asset('images')}}/itimage.png" height="300">
      </div>
   </div>
   <div>
     <button class="btn btn-outline-danger mt-3 mb-3">View More</button>
   </div>
  </div>
  
 </div>
 @elseif($service->department->name == 'Electronics')

 <div class="electronic">
   
 <div class="container">
    
   
   <div class="row">
   
      <div class="col-lg-4 col-md-4 col-sm-12"data-aos="fade-right" data-aos-duration="3000">
        <img src="images/ele.png" height="300">
      </div>
        <div class="col-lg-8 col-md-8 col-sm-4 mt-3 "data-aos="fade-left" data-aos-duration="3000">
            <h1 class="pt-3"style="font-family:times-new-roman; color:white;">
    Electornics
   </h1>
       <p style="color:white;">{!! $service->description !!}</p>
     </div>
   </div>
   <div class="row">
    <div class="col-lg-9 col-sm-12 col-md-9"></div>
    <div class="col-lg-3 col-sm-3 col-md-3">
      <button class="btn btn-outline-danger mt-3 mb-3">View More</button>
    </div>
  </div>
     
   </div>
  </div>

@else
 <div class="civil">
   
    <div class="container">
    
     <h1 class="pt-3"style="font-family:times-new-roman; color:white;">
    Civil
   </h1>
   <div class="row">
     <div class="col-lg-8 col-md-8 col-sm-4 mt-3 "data-aos="fade-right" data-aos-duration="3000">
       <p style="color:white;">{!! $service->description !!}</p>
     </div>
      <div class="col-lg-4 col-md- col-sm-12">
        <img src="">
      </div>
   </div>
   <div>
     <button class="btn btn-outline-danger mt-3 mb-3">View More</button>
   </div>
  </div>

 </div>
@endif
@endforeach
<!-- Footer  -->
  
@include('includes.footer')
<!-- Foote End -->
