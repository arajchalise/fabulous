@if($service->department->name == 'IT')
 <div class="IT">
  <div class="container">
    
     <h1 class="pt-3"style="font-family:times-new-roman; color:white;">
        {{ $service->type_of_service }}
     </h1>
     <p style="color:white;">{!! $service->description !!}</p>
   <div class="row" > 
     <div class="col-lg-8 col-md-8 col-sm-4 pt-3 "  data-aos="fade-right" data-aos-duration="3000">
       
     </div>
      <div class="col-lg-4 col-md-4 col-sm-12" data-aos="fade-left" data-aos-duration="3000">
        <img src="{{asset('images')}}/itimage.png" height="300">
      </div>
   </div>
   <div>
     <button class="btn btn-outline-danger mt-3 mb-3">View More</button>
   </div>
  </div>
  
 </div>
 @elseif($service->department->name == 'Electronics')

 <div class="electronic">
   
 <div class="container">
    
   
   <div class="row">
   
      <div class="col-lg-4 col-md-4 col-sm-12"data-aos="fade-right" data-aos-duration="3000">
        <img src="images/ele.png" height="300">
      </div>
        <div class="col-lg-8 col-md-8 col-sm-4 mt-3 "data-aos="fade-left" data-aos-duration="3000">
            <h1 class="pt-3"style="font-family:times-new-roman; color:white;">
    Electornics
   </h1>
       <p style="color:white;">{!! $service->description !!}</p>
     </div>
   </div>
   <div class="row">
    <div class="col-lg-9 col-sm-12 col-md-9"></div>
    <div class="col-lg-3 col-sm-3 col-md-3">
      <button class="btn btn-outline-danger mt-3 mb-3">View More</button>
    </div>
  </div>
     
   </div>
  </div>

@else
 <div class="civil">
   
    <div class="container">
    
     <h1 class="pt-3"style="font-family:times-new-roman; color:white;">
    Civil
   </h1>
   <div class="row">
     <div class="col-lg-8 col-md-8 col-sm-4 mt-3 "data-aos="fade-right" data-aos-duration="3000">
       <p style="color:white;">{!! $service->description !!}</p>
     </div>
      <div class="col-lg-4 col-md- col-sm-12">
        <img src="">
      </div>
   </div>
   <div>
     <button class="btn btn-outline-danger mt-3 mb-3">View More</button>
   </div>
  </div>

 </div>
@endif
