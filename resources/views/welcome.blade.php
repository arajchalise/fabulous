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
  </style>
  <body style="margin-top: 0px;">
<header>
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="{{ asset('videos') }}/{{ $data['video']->video }}" type="video/mp4">
  </video>
 


  <div class="container h-100">
  
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white logo" data-aos="zoom-in"data-aos-duration="2500">
       <img src="images/logo.png" height="250">
      </div>
    </div>
  </div>
</header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success navbar-fixed-top sticky-top" id='nav'>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('welcome')}}" style="color:white;">Home<span class="sr-only">(current)</span></a>
      </li>
     
       <li class="nav-item">
        <a class="nav-link" href="{{ route('services')}}" style="color:white;">Services</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ route('career') }}" style="color:white;">Career</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ route('gallary') }}" style="color:white;">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('allProjects') }}" style="color:white;">Project</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('blog') }}" style="color:white;">Blog</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('contact') }}" style="color:white;">Contact</a>
      </li>
     
    
    </ul>
  
  </div>
</nav>

<div class="container mb-5" id='about' >
  <div class="text-center"data-aos="fade-up"
     data-aos-anchor-placement="top-bottom"data-aos-duration="1500">
    <h3 style ="font-weight: bold; font-family: times-new-roman"class="mt-5">ABOUT <span style="color: #730510;">US</span></h3>
  </div>
  <div class="text-center mt-3" data-aos="zoom-in"data-aos-duration="1500">
    <p style="font-family: times-new-roman">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>


  <div class="row pt-3">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="row">
        @foreach($data['departments'] as $department)
          <div class="col-lg-4 col-sm-12 col-md-4"data-aos="fade-right"data-aos-duration="1500">
          <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
              <p class="text-center"><i class="fa fa-leaf fa-5x"></i></p>
            </div>
          </div>
          <h3 class="text-center"style="font-family: times-new-roman">{{ $department->name }}</h3>
          <p class="text-center mt-3 mb-3"style="font-family: times-new-roman">{!! $department->description !!}</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div>


   

  </div>
</div>



<div class="container-fluid project">
  <div class="row">
    <div class="col-lg-12 co-sm-12 col-md-12">
      <div class="text-center pt-5" style="font-family: times-new-roman;"><h3 style="font-weight: bold; color: white;">OUR <span style="color: #730510; font-family: times-new-roman;">PROJECT</span></h3></div>
      <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12">
          <p style="font-family: times-new-roman; color: white" class="text-center mt-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      
  <div class="owl-carousel ml-3 ">
      @foreach($data['projects'] as $project)
           <div class="row">
            <div class="item col-lg-4 col-sm-12 col-md-6">
              <div class="card" style="width: 20rem; border: none;" >
                <img src="{{('images/projectImages')}}/{{ $project->photo }}" class="card-img-top" alt="{{ $project->name }}" height="250">
          
          <div class="container-fluid" style="background-color:#730510; height:50px;">
            <h5 class="text-center pt-2" style="color: white; font-family:times-new-roman;"><a href="/projects/{{ $project->id }}" style="color: white">{{ $project->name }}</a></h5>
          </div>
        </div>
            </div>
            </div> 
      @endforeach
  </div>


    </div>

    </div>
  </div>
  <div class="row">
  <div class="col-sm-12 col-md-4 col-lg-4 text-center mx-auto mb-5 mt-3">
    <a class="btn btn-success" style="background-color:#730510;" href="{{ route('projects') }}">View more Project</a>
  </div>
</div>
</div>


<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-5">
     <h3 style="font-weight: bold;font-family: times-new-roman;">OUR <span style="color: #730510; font-family: times-new-roman;">CLIENTS</span></h3>
     <p style="font-family: times-new-roman">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
  <div class="owl-carousel ml-3 mb-5">
    @foreach($data['clients'] as $client)
      <div class="item">
        <div class="card" style="width: 19rem; ">
          <img src="{{ asset('images/clientImages') }}/{{ $client->logo }}" class="card-img-top" alt="{{ $client->name }}" style="width: 100px;">
          <div class="card-body">
            <p class="card-text">{{ $client->name }}</p>
          </div>
        </div>
      </div>
    @endforeach
    </div>
</div>
      
</div>


  </div>


</div>



<div class="container-fluid itback">
  <div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 mt-5">
      <div class="mt-5 mb-5 text-center">
        <p style="font-family:times-new-roman; font-weight:bold; color:white;"><i>Are You Ready To Connect <span style="color:#730510;">With US?</i></span></p>
        <h3 style="font-family:times-new-roman; font-weight:bold; color:white;">INSPIRE YOUR CUSTOMER HERE!</h3>
        <div class="row">
          <div class="col-lg-4 col-sm-12 col-md-4 mx-auto mt-5 mb-5">
            <a class="btn btn-outline-danger" href="{{ route('contact') }}">Get Connect</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Footer  -->
  
@include('includes.footer')
<!-- Foote End -->
