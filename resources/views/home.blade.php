@extends('layouts.admin_header')
@section('content')

            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Welcome {{ Auth::user()->name }}!</h1>
                </div>
            </div>
            <!-- /.row -->
@endsection
