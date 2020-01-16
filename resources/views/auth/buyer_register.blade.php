@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <form action="{{ route('client.register.submit') }}" method="POST">
            {{ csrf_field() }}
       <div class="form-row">
      <div class="form-group col-md-6">
      <label for="firstName">First Name</label>
      <input id="name" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

      @error('firstName')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="lastName">Last Name</label>
      <input id="name" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

      @error('lastName')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
    <div class="form-row">
      <div class="form-group col-md-6">
      <label for="email">Email </label>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      @error('email')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="contactNo">Email Type</label>
      <select class="custom-select @error('email_type') is-invalid @enderror" name="email_type" id="country">
        <option selected value="">Select Type</option>
        <option value="Personal">Personal</option>
        <option value="Official">Official</option>
      </select>
      @error('email_type')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
      <label for="email">Contact No </label>
      <input id="name" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ old('contactNo') }}" required autocomplete="contactNo" autofocus>

      @error('contactNo')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="contactNo">Contact No Type</label>
      <select class="custom-select @error('contactNo_type') is-invalid @enderror" name="contactNo_type">
        <option selected value="">Select Type</option>
        <option value="Personal">Personal</option>
        <option value="Official">Official</option>
      </select>
      @error('contactNo_type')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input id="name" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

      @error('address')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>
   <div class="form-row">
      <div class="form-group col-md-6">
      <label for="firstName">Office Name</label>
      <input id="name" type="text" class="form-control @error('officeName') is-invalid @enderror" name="officeName" value="{{ old('officeName') }}" required autocomplete="officeName" autofocus>

      @error('officeName')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="lastName">Office Type</label>
      <select class="custom-select @error('office_type') is-invalid @enderror" name="office_type" id="country">
        <option selected value="">Select Type</option>
        <option value="Government">Government</option>
        <option value="Non-Government">Non-Government</option>
      </select>
      @error('office_type')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
   <div class="form-group">
    <label for="address">Office PAN/VAT No.</label>
    <input id="name" type="text" class="form-control @error('officePan') is-invalid @enderror" name="officePan" value="{{ old('officePan') }}" required autocomplete="officePan" autofocus>

      @error('officePan')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
      <label for="password">Password </label>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      @error('password')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="password">Confirm Password </label>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
  </div>
        <button type="submit" class="btn btn-info">Register</button>
      </form>
        </div>
    </div>
</div>
@endsection
