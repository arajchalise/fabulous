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

<div class="blog"><h1 style="color: white; padding-top: 100px" class="text-center">OUR BLOG</h1></div>
<div class="container-fluid">
  <div class="container ">
    <div class="row">

      <div class="col-lg-8">
        <div class="row">
          <div class="col-lg-12">
            <div class="card mt-5" style="width: 45rem;">
              <img class="card-img-top" src="{{ asset('images/blogImages') }}/{{ $blogs[0]->photo }}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{ $blogs[0]->title }}</h5>
                <p class="card-text">{!! Str::limit($blogs[0]->description, 100) !!}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 pt-5">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Update</a>
            
          </li>
          
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Popular</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <img src="{{ asset('images') }}/t3.jpg" height="30px">Some quick example text to build<br>
            <img src="{{ asset('images') }}/t1.jpg" height="30px">Some quick example text to build
          </div>
          
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <img src="{{ asset('images') }}/t3.jpg" height="30px">Some quick example text to build<br>
            <img src="t1.jpg" height="30px">Some quick example text to build
          </div>
        </div><br><br><br>

        <div>
          <img src="{{ asset('images') }}/t1.jpg" height="110px" width="120px">
          <img src="{{ asset('images') }}/t2.jpg" height="110px" width="120px">
        </div>
        <div>
          <img src="{{ asset('images') }}/t3.jpg" height="110px" width="120px">
          <img src="{{ asset('images') }}/t5.jpg" height="110px" width="120px">
        </div><br><br>

        <div class="col-lg-3">
          <img src="{{ asset('images') }}/t5.jpg" height="200px" width="200px">

        </div>
      </div>
    </div> 


    <div class="row mt-5">
      @foreach($blogs as $blog)
        <div class="col-lg-3">
        <div class="card " style="width: 18rem;">
          <img class="card-img-top" src="{{ asset('images/blogImages') }}/{{ $blog->photo }}" alt="{{ $blog->title }}">
          <div class="card-body">
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text">{!! Str::limit($blog->description, 100) !!}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>
<!-- Footer  -->
  
@include('includes.footer')
<!-- Foote End -->
