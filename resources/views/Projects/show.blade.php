@if(Auth::check())
  <div style="width: 100%; background: #000; min-height: 40px;">
    <span style="color: #fff; margin-left: 10%;">Hey, {{ Auth::user()->name}} done here ?? <a href="{{ route('home')}}" style="color: #fff">Go to Dashboard</a></span>
  </div>
@endif
@include('includes.head')
  
  <body style="margin-top: 0px;">
   
  @include('includes.header')
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
<div class="container-fluid">
  <div class="container pt-5 pb-5">
    <div class="col-lg-12"> 
    <h1>{{ $project->name }}</h1>
    <h4>{{ $project->location }}</h4>
    <h5>{{ $project->type}}, {{ $project->system_used }}</h5>
    <img src="{{ asset('images/projectImages') }}/{{ $project->photo}}" style="width: 100%;">
    <p>{!! $project->description !!}</p>    
  </div>     
  </div>
</div>

@include('includes.footer')
