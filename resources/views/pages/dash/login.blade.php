@extends('layouts.container')
  @section('content')
    <div class="login-container">
      <div class="brand-logo text-center">
        <img src="{{asset('dash-template/img/desktop logo.png')}}" class="my-2" width="65%" height="100%">
      </div>
      <h4 class="text-center">Great! let's get started</h4>
      <h6 class="font-weight-light text-center">Sign in to continue.</h6>
      @if(session()->has('failureMessage'))
          <div class="col-md-12 col-sm-12 alert
          alert-danger alert-dismissable text-center" style="margin-top:20px">
          <a href='' class='close' data-dismiss='alert' aria-label='close'> &times</a>
          <strong>
              Danger
          </strong>
          {{session('failureMessage')}}
          </div>
      @endif
      <form method="POST" action="{{route('login')}}" class="pt-3">
        {{csrf_field()}}
        <div class="form-group">
          <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
          <span class="text-danger">
            @if($errors->has('email'))
              {{ $email= $errors->first('email')}}
            @else
              {{$email=''}}
            @endif
          </span>
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
          <span class="text-danger">
            @if($errors->has('password'))
              {{ $password=$errors->first('password')}}
            @else
              {{$password=''}}
            @endif
          </span>
        </div>
        <div class="mt-3">
          <input  type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
          <div class="form-check form-check-success">
            <label class="form-check-label text-muted">
              <input type="checkbox" class="form-check-input">
              Keep me signed in
            </label>
          </div>
          <a href="{{route('forgot-password')}}" class="auth-link text-primary">Forgot password?</a>
        </div>
       <!-- <div class="text-center mt-4 font-weight-light">
          Don't have an account? <a href="{{route('signup')}}" class="text-primary">Create</a>
        </div>-->
      </form>
    </div>

@endsection
