@extends('layouts.client_header')

@section('content')
    <p><span class="text-danger"><b>Hell, {{ Auth::guard('buyer')->user()->first_name }}, This page is currently under construction, Please visit later<br>Thank you</b></span></p>
@endsection
