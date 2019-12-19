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
    <source src="video/back.mp4" type="video/mp4">
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
        <a class="nav-link" href="#" style="color:white;">Project</a>
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
<div id="app">
  <department></department>
  <project></project>
  <client></client>
</div>


<div class="container-fluid itback">
  <div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 mt-5">
      <div class="mt-5 mb-5 text-center">
        <p style="font-family:times-new-roman; font-weight:bold; color:white;"><i>Are You Ready To Connect <span style="color:#730510;">With US?</i></span></p>
        <h3 style="font-family:times-new-roman; font-weight:bold; color:white;">INSPIRE YOUR CUSTOMER HERE!</h3>
        <div class="row">
          <div class="col-lg-4 col-sm-12 col-md-4 mx-auto mt-5 mb-5">
            <a class="btn btn-outline-danger" href="contact.html">Get Connect</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Footer  -->
  
@include('includes.footer')
<!-- Foote End -->
