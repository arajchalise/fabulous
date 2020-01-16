 <style type="text/css">
   .dropdown>.dropdown-menu {
  top: 200%;
  transition: 0.3s all ease-in-out;
}
.dropdown:hover>.dropdown-menu {
  display: block;
  top: 100%;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}

 </style>
 <nav class="navbar navbar-expand-lg navbar-dark bg-success navbar-fixed-top sticky-top" id='nav'style="background-color: #730510 !important;">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
            Categories
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php 
              $v = new \App\Category(); // your model object
              $cats = $v ->getCat(); // its method
            ?>
            @foreach($cats as $cat)
            <a class="dropdown-item" href='/product/<?php echo str_replace(" ", "_", $cat->name)  ?>'>{{$cat->name}}</a>
            @endforeach
          </div>
        </div>
       <li class="nav-item">
          <a class="nav-link" href="{{ route('services') }}" style="color:white;">Services</a>
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
        <a class="nav-link" href="{{ route('cart') }}" style="color:white;"><img src="{{ asset('images') }}/cart.png" style="width: 40px; height: 30px;">@if(Session::has('cart'))
          @if(count(Session::get('cart')) != 0)
          <span class="badge badge-dark" style="background-color: green; font-family: Arial;">
            
            {{ count(Session::get('cart')) }}
          </span>
          @endif
          @endif</a>
      </li>
      @if(Auth::guard('buyer')->check())
      <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
            {{ Auth::guard('buyer')->user()->first_name }}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href='/client/dashboard'><span><i class="glyphicon glyphicon-log-out"></i></span> Dashboard</a>
          <a class="dropdown-item" href='/client/profile'><span><i class="glyphicon glyphicon-log-out"></i></span> Profile</a>
            <a class="dropdown-item" href='/client/logout'><span><i class="glyphicon glyphicon-log-out"></i></span> Logout</a>
          </div>
        </div>
        @else
        <li class="nav-item">
        <a class="nav-link" href="{{ route('client.login') }}" style="color:white;"><i class="glyphicon glyphicon-log-out"></i> Login</a>
      </li>
     @endif
    
    </ul>
  
  </div>
 </nav>
