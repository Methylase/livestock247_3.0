@extends('layouts.container')
  @section('content')
    <div class="login-container">
      <div class="brand-logo text-center">
        <img src="{{asset('dash-template/img/desktop logo.png')}}" class="my-2" width="65%" height="100%">
      </div>
      <h4 class="text-center">Recover your password</h4>
      <h6 class="font-weight-light text-center">Gain access back now!!!</h6>
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
      <form method="POST" action="{{route('forgot-password')}}" class="pt-3">
      {{csrf_field()}}
      <div class="form-group">
        <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter your email">
        <span class="text-danger">
          @if($errors->has('email'))
            {{ $email= $errors->first('email')}}
          @else
            {{$email=''}}
          @endif
        </span>
      </div>
      <div class="mt-3">
        <input  type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SUBMIT">
      </div>
      <div class="my-2 mx-4 d-flex justify-content-between align-items-center mt-3">
        <a href="{{route('login')}}" class="text-primary">Login</a>
        <!--<a href="{{route('signup')}}" class="auth-link text-primary">Create Account</a>-->
      </div>

    </form>
    </div>

@endsection
