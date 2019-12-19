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
   
     <!-- Nav Bar  -->

    @include('includes/header')
   <!-- End of Nav Bar -->
<div class="blog">
  <h1 style="color: white; padding-top: 100px" class="text-center"><b>IT Services</b></h1>
</div>

<div class="container-fluid">
<div class="container">
 <div class="row">
  <div class="col-md-12">

    <div id="mdb-lightbox-ui"></div>

    <div class="mdb-lightbox">
        <div class="row pt-3 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(145).jpg" data-size="1600x1067">
                <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(145).jpg" class="img-fluid">
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(150).jpg" data-size="      1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(150).jpg" class="img-fluid" />
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(152).jpg" data-size="      1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(152).jpg" class="img-fluid" />
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(42).jpg" data-size="       1600x1067">
                    <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(42).jpg" class="img-fluid" />
                </a>
            </div>
        </div>

      <!--<figure class="col-md-4">
        
      </figure>

      <figure class="col-md-4">
        <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(150).jpg" data-size="1600x1067">
          <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(150).jpg" class="img-fluid" />
        </a>
      </figure>-->

    </div>

  </div>
</div>
</div>
</div>

<!-- Footer  -->
  
@include('includes.footer')
<!-- Foote End -->
