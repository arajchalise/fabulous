<!DOCTYPE html>
<html lang="en">
<head>
    <!--  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: 'textarea'
      });
    </script> -->
<script src="https://cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="{{ asset('css') }}/style.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script type="text/javascript">
  $(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    
    
</script>
<title>Fabulous IT-Admin Panel</title>
</head>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images') }}/logo.png" alt="LOGO" style="width: 80px; height: 100%;">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li> <a>{{ Auth::user()->name }}</a></li>           
            <li><a href="#">
                <form action="/logout" method="POST">
                    {{ csrf_field() }}
                <i class="fa fa-fw fa-power-off"></i> <input type="submit" value="Logout" style="border: none; background: none;"></form></a></li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="{{ route('users') }}" style="text-align: center;"> Users</a>
                </li>
                <li>
                    <a href="{{ route('departments') }}" style="text-align: center;"> Departments</a>
                </li>
                <li>
                    <a href="{{ route('clients') }}" style="text-align: center;">Clients</a>
                </li>
                <li>
                    <a href="{{ route('projects') }}" style="text-align: center;">  Projects</a>
                </li>
                <li>
                    <a href="{{ route('gallery') }}" style="text-align: center;">Gallery</a>
                </li>
                <li>
                    <a href="{{ route('service') }}" style="text-align: center;">Services</a>
                </li>
                <li>
                    <a href="{{ route('menus') }}" style="text-align: center;">Menu</a>
                </li> 
                <li>
                    <a href="{{ route('submenus') }}" style="text-align: center;">Sub Menu</a>
                </li>
                <li>
                    <a href="{{ route('video') }}" style="text-align: center;">Video</a>
                </li> 
                <li>
                    <a href="{{ route('blogs') }}" style="text-align: center;">Blog</a>
                </li>
                <li>
                    <a href="{{ route('getContacts') }}" style="text-align: center;">Contacts</a>
                </li>
                <li>
                    <a href="{{ route('careers') }}" style="text-align: center;">Career</a>
                </li>   
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid" style="margin-top: 30px;">
            @yield('content')
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
