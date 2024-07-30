@extends('layouts.container')
  @section('content')
  <div class="login-container">
    <div class="brand-logo text-center">
        <img src="{{asset('dash-template/img/desktop logo.png')}}" width="65%" height="100%">
    </div>
    <h4 class="text-center">New here?</h4>
    <h6 class="font-weight-light text-center">Signing up is easy. It only takes a few steps</h6>
    @if(session()->has('successMessage'))
        <div class="col-md-12 col-sm-12 alert
        alert-success alert-dismissable text-center" style="margin-top:20px">
            <a href='' class='close' data-dismiss='alert' aria-label='close'> &times</a>
            <strong>
            Success
            </strong>
            {{session('successMessage')}}
        </div>
    @endif
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

    @if(session()->has('agreement'))
      <div class="col-md-12 col-sm-12 alert
      alert-danger alert-dismissable text-center" style="margin-top:20px">
        <a href='' class='close' data-dismiss='alert' aria-label='close'> &times</a>
        <strong>
            Danger
        </strong>
        {{session('agreement')}}
      </div>
    @endif

    <form method="POST" action="" class="pt-3">
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
                    {{ $password= $errors->first('password')}}
                @else
                    {{$password=''}}
                @endif
            </span>
        </div>
        <div class="mb-4 form-group">
            <div class="form-check form-check-success">

                <label class="form-check-label text-muted">
                    <input type="checkbox" name="condition" class="form-check-input">
                    I agree to all Terms & Conditions
                </label>
                <span class="text-danger">
                    @if($errors->has('condition'))
                        {{ $condition= $errors->first('condition')}}
                    @else
                        {{$condition=''}}
                    @endif
                </span>
            </div>
        </div>
        <div class="mt-3">
            <input  type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP">
        </div>
        <div class="text-center mt-4 font-weight-light">
            Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
        </div>
    </form>
  </div>

@endsection
