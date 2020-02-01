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
        background-image:url('images/services.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        width: 100%;
        background-size: cover;
        height: 300px;
      }
    .btn{
      background-color: maroon;
      border: maroon;

    }   

  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
  <body style="margin-top: 0px;">
    @if(Session::has('message'))
      <script type="text/javascript">
        alert("{{ Session::get('message') }}");
      </script>
      {{ Session::forget('message') }}
    @endif
  <!-- Nav Bar  -->

    @include('includes/header')
   <!-- End of Nav Bar -->
 <div class="blog"><h1 style="color: white; padding-top: 100px" class="text-center">Career</h1></div>

 <div class="container-fluid">
  <div class="container pt-5 pb-5">
    <div class="row">
      @foreach($careers as $career)
      <div class="col-lg-8 col-md-8 col-sm-12">
        <h1 style="text-decoration: underline;">{{ $career->position }}</h1><br><br>
        <p>{!! $career->description !!}</p>
        <a href="#" class="btn btn-success" onclick="showModel({{ $career->id }});">Apply Now</a> 
      </div>
      @endforeach
      <div id="myModal" class="modal">

  <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <form class="pt-3 pb-3" method="POST" action="{{ route('storeCandidate') }}" enctype='multipart/form-data'>
          {{ csrf_field() }}
          <input type="text" name="id" id="id" hidden>
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
          </div><br>
          <div class="form-group">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your email" name="email">
          </div><br>

          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your address" name="address">
          </div><br>

          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Phone" name="phone">
          </div><br>
          
          <div class="form-group">
            <label for="exampleFormControlFile1">Browse</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
          </div><br>
          <input type="submit" class="btn btn-success btn" value="Submit">
        </form>
        </div>

      </div>

      <div class="col-lg-4 col-md-4 col-sm-12" style="border: 1px solid" >
        <h4 style="color: maroon" align="center" class="pt-4"><b>Drop Your CV</b></h4>
        <form class="pt-3 pb-3" method="POST" action="{{ route('storeCandidate') }}" enctype='multipart/form-data'>
          {{ csrf_field() }}
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
          </div><br>
          <div class="form-group">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your email" name="email">
          </div><br>

          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your address" name="address">
          </div><br>

          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Phone" name="phone">
          </div><br>
          
          <div class="form-group">
            <label for="exampleFormControlFile1">Browse</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
          </div><br>
          <input type="submit" class="btn btn-success btn" value="Submit">
        </form>
      </div>

    </div>
  </div>
 </div>

 <!-- Footer  -->
  
@include('includes.footer')
<!-- Foote End -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="js/style.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>

<script type="text/javascript">


</script>
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script type="text/javascript">
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var submit = document.getElementById('submit');
    // When the user clicks on the button, open the modal
    function showModel(id) {
      modal.style.display = "block";
      document.getElementById('id').value = id;
      //document.myForm.action = '/contact/'+id+'/sendEmail';
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    submit.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>

  </body>
</html>
