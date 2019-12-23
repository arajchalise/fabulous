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
      .contact{
         background-image:url('images/services.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        width: 100%;
        background-size: cover;
        height:300px;
      }
     
      
  </style>
  <body style="margin-top: 0px;">
     <!-- Nav Bar  -->

    @include('includes/header')
   <!-- End of Nav Bar -->

 <div class="container-fluid contact">
  <br><br>
   <h1 class="text-center pt-5" style="color:white; font-family:times-new-roman;">Contact Us</h1>
 </div>

 

<div class="container">
  <div class="row">
    <div class=" col-lg-12 col-sm-12 col-md-12 mt-5">
      <h2 class="text-center"  style=" font-family:times-new-roman;">Get In Touch With Us...</h2>
      <p class="text-center" style=" font-family:times-new-roman;">Please fill out the quick form and we will be in touch with lightening speed.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-sm-12 col-md-6  mt-5">
      <form method="POST" action="{{route('contactStore')}}">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="text" name="name" placeholder="Full Name" class="form-control" required="">
        </div>
          <div class="form-group">
          <input type="text" name="email" placeholder="E-mail" class="form-control" required="">
        </div>
          <div class="form-group"> 
          <input type="text" name="subject" placeholder="Subject" class="form-control" required="">
        </div>
          <div class="form-group">
          <input type="text" name="company" placeholder="Company" class="form-control" required="">
        </div>
          <div class="form-group">
          <textarea class="form-control" required="" name="message">Your Message Please!!!</textarea>
        </div>

        <input type="submit" value="Submit" class="btn btn-outline-danger mb-3 mt-3">
      </form>

    </div>

    <div class="col-lg-6 col-sm-12 col-md-6">
      <h3 class="text-center mt-3" style=" font-family:times-new-roman;">Contact with us..</h3>
      <ul class="ml-5">
        <li>For support or any questions:</li>
        <li>E-mail us at support@fabulousnepal.com</li>
        <li>Fabulous IT & Engineering company pvt. ltd.</li>
        <li>Bafal Kathmandu Nepal</li>
        <li>01-5237138</li>
      </ul>
    </div>
  </div>
</div>



<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14129.801731691216!2d85.2847344!3d27.7033757!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa41246090df71b0!2sFabulous+IT+and+Engineering+Company+Pvt.+Ltd.!5e0!3m2!1sen!2snp!4v1563182071093!5m2!1sen!2snp" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</div>

<!-- Footer  -->
  
@include('includes.footer')
<!-- Foote End -->

