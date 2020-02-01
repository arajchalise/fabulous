@extends('layouts.client_header')
<style type="text/css">
        body{
  background-color: #f1f1f1;
}
.main-timeline-section{
  position: relative; 
  width: 100%;  
  margin:auto; 
  height:300px;
}
.main-timeline-section .timeline-start,
.main-timeline-section .timeline-end{
  position: absolute;
  background:#F2635F;
  border-radius:100px;
  top:50%;
  transform: translateY(-50%);
  width:30px;
  height:30px;
}
.main-timeline-section .timeline-end{
  right:0px;
}
.main-timeline-section .conference-center-line{
  position: absolute;
  width:100%;
  height:5px;
  top:50%;
  transform: translateY(-50%);
  background:#F2635F;
}
.timeline-article{
    width: 20%;
    position: relative;
    min-height: 300px;
    float:right;
}
.timeline-article .content-date{
    position: absolute;
    top: 35%;
    left: -30px; 
    font-size:18px;
}
.timeline-article .meta-date{
    position: absolute;
    top: 50%;
    left: 0px;
    transform: translateY(-50%); 
    width:20px;
    height:20px;
    border-radius: 100%;
    background:#fff;
    border:1px solid #F2635F;
}
 .meta-date-selected{
    position: absolute;
    top: 50%;
    left: 0px;
    transform: translateY(-50%); 
    width:20px;
    height:20px;
    border-radius: 100%;
    background:green;
    border:1px solid #F2635F;
    
}
.timeline-article .content-box{
  box-shadow: 2px 2px 4px 0px #c1c1c1;
  border:1px solid #F2635F;
  border-radius: 5px;
  background-color: #fff;
  width: 180px;
  position: absolute;
  top: 60%;
  left: -80px; 
  padding:10px;
}
.timeline-article-top .content-box:before{
  content: " ";
  position:absolute; 
  left:50%;
  transform: translateX(-50%);
  top:-20px;
  border:10px solid transparent;
  border-bottom-color: #F2635F;
}
.timeline-article-bottom .content-date{
  top: 59%;
}
.timeline-article-bottom .content-box{
  top: 0%;
}
.timeline-article-bottom .content-box:before{
  content: " ";
  position:absolute; 
  left:50%;
  transform: translateX(-50%);
  bottom:-20px;
  border:10px solid transparent;
  border-top-color:#F2635F;
}


@media (max-width:460px){
  body{
    display: none;
  }
}
    </style>
@section('content')
   <div class="container" style="margin-top: 10%;">
    <h3>Your Transaction Reference No: {{ $order->remarks }}</h3>
    <div class="row" style="margin-top: 5%;">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <section class="main-timeline-section">

                <div class="timeline-start">
                </div>
                <div class="conference-center-line"></div>
                <div class="conference-timeline-content">
                    <div class="timeline-article timeline-article-top">
                        <div class="content-date">
                            <span id="date-4">Dispatched</span>
                        </div>
                        <div class="meta-date" id="4"></div>
                        <div class="content-box" id="content-box-4">
                            <p>Your order is already dispatched</p>
                        </div>
                    </div>

                    <div class="timeline-article timeline-article-bottom">
                        <div class="content-date">
                            <span id="date-3">Payment Reviewed</span>
                        </div>
                        <div class="meta-date" id="three"></div>
                        <div class="content-box" id="content-box-3">
                            <p>Your order is ready to dispatch</p>
                        </div>
                    </div>
                     <div class="timeline-article timeline-article-top">
                        <div class="content-date">
                            <span id="date-2">Payment Made</span>
                        </div>
                        <div class="meta-date" id="two"></div>
                        <div class="content-box" id="content-box-2">
                            <p>Your payment review is pending</p>
                        </div>
                    </div>

                    <div class="timeline-article timeline-article-bottom">
                        <div class="content-date">
                            <span id="date-1">Approved</span>
                        </div>
                        <div class="meta-date" id="one"></div>
                        <div class="content-box" id="content-box-1">
                            <p>Your order has been approved, Please kindly make payment</p>
                        </div>
                    </div> 
                    <div class="timeline-article timeline-article-bottom">
                        <div class="content-date">
                            <span>You Placed Order</span>
                        </div>
                        <!-- <div class="meta-date"></div>
                        <div class="content-box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                        </div> -->
                    </div> 
                </div>
                <div class="timeline-end"></div>
            </section>
        </div>
    </div>
</div>
            <!-- /.row -->
@endsection
<script type="text/javascript">
  <?php $i = $order->status; ?>
  window.onload = function() {
    if (<?php echo $i; ?> == 3) {
    document.getElementById('content-box-4').style.display = 'none';
    document.getElementById('date-4').style.display = 'none';
    var one = document.getElementById('one');
    var two = document.getElementById('two');
    var three = document.getElementById('three');
    one.classList.remove('meta-date');
    one.classList.add('meta-date-selected');
    two.classList.remove('meta-date');
    two.classList.add('meta-date-selected');
    three.classList.remove('meta-date');
    three.classList.add('meta-date-selected');
    } else if(<?php echo $i; ?> == 2){
    document.getElementById('content-box-4').style.display = 'none';
    document.getElementById('content-box-3').style.display = 'none';
    document.getElementById('date-4').style.display = 'none';
    document.getElementById('date-3').style.display = 'none';
    var one = document.getElementById('one');
    var two = document.getElementById('two');
    one.classList.remove('meta-date');
    one.classList.add('meta-date-selected');
    two.classList.remove('meta-date');
    two.classList.add('meta-date-selected');
    } else if (<?php echo $i; ?> == 1) {
    document.getElementById('content-box-4').style.display = 'none';
    document.getElementById('content-box-3').style.display = 'none';
    document.getElementById('content-box-2').style.display = 'none';
    document.getElementById('date-4').style.display = 'none';
    document.getElementById('date-3').style.display = 'none';
    document.getElementById('date-2').style.display = 'none';
    var one = document.getElementById('one');
    one.classList.remove('meta-date');
    one.classList.add('meta-date-selected');
    } else if (<?php echo $i; ?> == 0) {
       document.getElementById('content-box-4').style.display = 'none';
      document.getElementById('content-box-3').style.display = 'none';
      document.getElementById('content-box-2').style.display = 'none';
      document.getElementById('content-box-1').style.display = 'none';
      document.getElementById('date-4').style.display = 'none';
      document.getElementById('date-3').style.display = 'none';
      document.getElementById('date-2').style.display = 'none';
      document.getElementById('date-1').style.display = 'none';
    }
    else if (<?php echo $i; ?> == -1) {
      document.getElementById('content-box-4').style.display = 'none';
      document.getElementById('content-box-3').style.display = 'none';
      document.getElementById('content-box-2').style.display = 'none';
      document.getElementById('date-4').style.display = 'none';
      document.getElementById('date-3').style.display = 'none';
      document.getElementById('date-2').style.display = 'none';
      document.getElementById('content-box-1').innerHTML = 'Your order is Declined, You will get notified after while. Sorry for Inconvience';
      var one = document.getElementById('one');
      one.classList.remove('meta-date');
      one.classList.add('meta-date-selected');
      document.getElementById('date-1').innerHTML = 'Declined';
      document.getElementById('date-1').style.color = 'red';
      document.getElementById('date-1').style.fontWeight = 'bold';
      document.getElementById('content-box-1').style.color = 'red';
    }
  }
</script>
