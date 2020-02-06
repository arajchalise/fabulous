@extends('layouts.client_header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(session('error'))
            <div class="alert alert-danger" role="alert">
            {{ session('error') }}
          </div>
          @endif
         <form action="{{ route('client.changedPassword') }}" method="POST">
            {{ csrf_field() }}
       
      <div class="form-group">
      <label for="password">Current Password </label>
      <input id="password" type="password" class="form-control @error('currentPassword') is-invalid @enderror" name="cpassword" required autocomplete="new-password">
      @error('currentPassword')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
      <div class="form-group">
      <label for="password">Password </label>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      @error('password')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="password">Confirm Password </label>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
        <button type="submit" class="btn btn-info">Change Password</button>
      </form>
        </div>
    </div>
</div>
@endsection
