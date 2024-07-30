@extends('layouts.dash')
  @section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Profile</h1>
        </div>

        <!-- Content Column -->
        <div class="col-lg-12 mb-4"  style="height:820px">
            @if(session()->has('failureMessage'))
                <div class='offset-md-1 col-md-10 offset-sm-1 col-sm-10 alert
                alert-danger alert-dismissable text-center' style='margin-top:20px'>
                <a href='' class='close' data-dismiss='alert' aria-label='close'> &times</a>
                <strong>
                    Danger
                </strong>
                {{session('failureMessage')}}
                </div>
            @endif
            @if(session()->has('successMessage'))
                <div class='offset-md-1 col-md-10 offset-sm-1 col-sm-10 alert
                alert-success alert-dismissable text-center' style='margin-top:20px'>
                <a href='' class='close' data-dismiss='alert' aria-label='close'> &times</a>
                <strong>
                    Success
                </strong>
                {{session('successMessage')}}
                </div>
            @endif
            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Update Profile</h6>
                    <div class="float-right text-default" id="profileToggle"><i class="fas fa-plus" id="close"></i></div>
                </div>
                <div class="card-body" id="profile-body">
                    @if(!isset($profile->id))
                    <form class="form-sample" action="{{route('profile')}}" enctype="multipart/form-data" method="POST">
                    @else
                    <form class="form" action="{{route('profile')}}" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="id" value="{{old('id', $profile->id)}}">
                    @endif
                    {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div class="img-container">
                                        <img src="{{$profile->profile_image !== null ? asset('uploads/'.$profile->profile_image) :  asset('dash-template/img/user.jpg')}}" class="img-fluid w-50 mb-4">

                                    </div>                      
                                    <input type="file" id="profileImage" name="profileImage" class="form-control">
                                    <label for="profile-image" class="control-label">Select profile image</label> 
                                    <span class="text-danger">
                                        @if($errors->has('profileImage'))
                                            {{ $profileImage= $errors->first('profileImage')}}
                                        @else
                                            {{$profileImage=''}}
                                        @endif
                                    </span>                        
                                </div>
                            </div>                       
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="first-name" class="control-label">Firstname</label>
                                    <input type="text" name="firstname" value="{{$profile->firstname !== null ? $profile->firstname :old('firstname', $profile->firstname) }}" class="form-control" />
                                    <span class="text-danger">
                                        @if($errors->has('firstname'))
                                            {{ $firstname= $errors->first('firstname')}}
                                        @else
                                            {{$firstname=''}}
                                        @endif
                                    </span>                     
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="last-name" class="control-label">Lastname</label>
                                    <input type="text" value="{{$profile->lastname !== null ? $profile->lastname :old('lastname', $profile->lastname) }}" name="lastname" class="form-control" />
                                    <span class="text-danger">
                                        @if($errors->has('lastname'))
                                            {{ $lastname= $errors->first('lastname')}}
                                        @else
                                            {{$lastname=''}}
                                        @endif
                                    </span>                   
                                </div>
                            </div>                      
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email" class="control-label"> Email</label>
                                    <input type="email" value="{{$userEmail !== null ? $userEmail :old('email', $userEmail) }}" name="email" class="form-control" readonly />
                                    <span class="text-danger">
                                        @if($errors->has('email'))
                                        {{ $email=$errors->first('email')}}
                                        @else
                                        {{$email=''}}
                                        @endif
                                    </span>                       
                                </div>
                            </div>                      
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone-number" class="control-label"> Phone Number</label>
                                    <input type="text" name="phone"  value="{{$profile->phone_number !== null ? $profile->phone_number :old('phone',$profile->phone_number) }}" class="form-control" />
                                    <span class="text-danger">
                                        @if($errors->has('phone'))
                                        {{ $phone=$errors->first('phone')}}
                                        @else
                                        {{$phone=''}}
                                        @endif
                                    </span>                     
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="designation" class="control-label">Author's Designation</label>
                                    <input type="text"  name="designation" class="form-control"  value="Content Strategist, Livestock247" readonly>
                                    <span class="text-danger">
                                        @if($errors->has('designation'))
                                        {{ $designation=$errors->first('designation')}}
                                        @else
                                        {{$designation=''}}
                                        @endif
                                    </span>                      
                                </div>
                            </div>                  
                            <div class="col-md-6 col-sm-6">
                                <br>
                                <div class="form-group text-right">
                                    <button type="submit"  id="update-profile"  class="btn btn-warning" ><i class="fa fa-save"></i> Update Profile </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection