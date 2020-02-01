@extends('layouts.client_header')

@section('content')

            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Welcome {{ Auth::guard('buyer')->user()->first_name }}!</h1>
                    <div class="row" style="margin-top: 5%;">
                        <div class=" col-lg-12">
                        <form  method="post" action="{{ route('trackOrder') }}">
                          {{ csrf_field() }}
                          <div class="row">
                          <div class="form-group col-lg-4">
                            <label for="staticEmail2" class="sr-only">Transaction Reference Number</label>
                            <input type="text" class="form-control" id="staticEmail2" placeholder="Enter Transaction Reference Number" style="width: 100%;" name="key">
                          </div>
                          <button type="submit" class="btn btn-success mb-2 col-lg-3">Track your Order</button>
                          </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
@endsection
