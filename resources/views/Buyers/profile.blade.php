@extends('layouts.client_header')

@section('content')
   <div class="row">
       <div class="col-md-4">
            <img src="{{ asset('images/buyerImages/master.jpg') }}" style="width: 100%;">
            <a href="#" class="btn btn-primary">Upload Profile Picture</a>
        </div>
        <div class="col-md-8">
            {{ Auth::guard('buyer')->user()->first_name }} {{ Auth::guard('buyer')->user()->last_name }}<br>
            {{ Auth::guard('buyer')->user()->address }}<br>
            {{ Auth::guard('buyer')->user()->email }}<br>
            {{ Auth::guard('buyer')->user()->contact_no }}<br>
            {{ Auth::guard('buyer')->user()->office_name }}<br>
            <a href="#" class="btn btn-primary">Upload Company Register Certificate</a>
            <a href="#" class="btn btn-primary">Upload PAN Certificate</a>
        </div>
   </div>

@endsection
