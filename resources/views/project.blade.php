@if(Auth::check())
  <div style="width: 100%; background: #000; min-height: 40px;">
    <span style="color: #fff; margin-left: 10%;">Hey, {{ Auth::user()->name}} done here ?? <a href="{{ route('home')}}" style="color: #fff">Go to Dashboard</a></span>
  </div>
@endif
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
      background-image: url('/..images/banner.jpg');
   }
      
  </style>
  <body style="margin-top: 0px;">
   
  @include('includes.header')

<div class="blog pt-3 pt-3"><h1 style="color: white; padding-top: 100px" align="center">Our Projects</h1></div>

<div class="container-fluid">
  <div class="container pt-5 pb-5">
    <div class="row">
      @foreach($projects as $project)
            <div class="item col-lg-3 col-sm-12 col-md-4" style="margin-bottom: 10px;">
              <div class="card" style="width: 100%; border: none;" >
                <img src="{{('images/projectImages')}}/{{ $project->photo }}" class="card-img-top" alt="{{ $project->name }}" height="250">
          
          <div class="container-fluid" style="background-color:#730510; min-height:50px;">
            <h5 class="text-center pt-2" style="color: white; font-family:times-new-roman;"><a href="/projects/{{ $project->id }}" style="color: white">{{ Str::limit($project->name, 18) }}</a>
            </h5>
            <p style="color: #fff; font-family:times-new-roman; font-size: 17px;"><!-- <img src=" {{ asset('images/location.png') }} " style="width: 20px;"> --> {{ $project->location }}<br>
              {{ $project->type }}<br> {{ $project->system_used }}
            </p>
          </div>
        </div>
            </div>
      @endforeach
  </div>
    <div class=" row justify-content-center">
      {{ $projects->links('pagination::bootstrap-4') }}
    </div>       
  </div>
</div>

@include('includes.footer')
