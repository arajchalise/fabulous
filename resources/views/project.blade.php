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
   
  @include('includes.header')

<div class="blog pt-3 pt-3"><h1 style="color: white; padding-top: 100px" align="center">Our Projects</h1></div>

<div class="container-fluid">
  <div class="container pt-5 pb-5">
    <div class="row">
      @foreach($projects as $project)
        <div class="col-lg-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{ asset('images/projectImages') }}/{{ $project->photo }}" alt="Card image cap">
          <div class="card-body">
              <h5 class="card-title">{{ $project->name}}</h5>
              <p class="card-text">{{ Str::limit($project->description, 100)}}</p>
              <a href="#" class="card-link">Read More</a>
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
