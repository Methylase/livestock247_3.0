@extends('layouts.dash')
  @section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reset Password</h1>
        </div>

        <!-- Content Column -->
        <div class="col-lg-12 mb-4"  style="height:820px">
            @if(session()->has('successMessage'))
                <div class='col-md-12col-sm-12 alert
                alert-success alert-dismissable text-center' style='margin-top:20px'>
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
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Reset Password</h6>
                    <div class="float-right text-default" id="resetPasswordToggle"><i class="fas fa-plus" id="close"></i></div>
                </div>
                <div class="card-body" id="reset-password-body">
                <form class="form" action="{{route('reset-password')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group class-subject-group">
                                    <label for="password" class="control-label"> Password</label>
                                    <input type="password"  name="password" class="form-control" placeholder="Enter password">
                                    <span class="text-danger">
                                        @if($errors->has('password'))
                                            {{ $password=$errors->first('password')}}
                                        @else
                                            {{$password=''}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group date-group">
                                    <label for="confirm-password" class="control-label"> Confirm Password</label>
                                    <input type="password"  name="password_confirmation" class="form-control" Placeholder="Enter confirm password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 offset-sm-6 col-sm-6">
                                <div class="form-group text-right">
                                    <button type="submit"  id="reset-password"  class="btn btn-warning" ><i class="fa fa-save"></i> Reset Password </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection