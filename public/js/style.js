    $(document).ready(function(){
      $(window).scroll(function(){
      var scroll = $(window).scrollTop();
      if(scroll>50){
      $('#nav').css('background','#0000');
    }
    else{
    $('#nav').css('background','transparent');
  }
    });
    });


    $(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});