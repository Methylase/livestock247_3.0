@extends('layouts.dash')
  @section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create User</h1>
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
                    <h6 class="m-0 font-weight-bold">Create User</h6>
                    <div class="float-right text-default" id="createUserToggle"><i class="fas fa-plus" id="close"></i></div>
                </div>
                <div class="card-body" id="create-user-body">
                <form class="form" action="{{route('create-user')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="user-email" class="control-label">User Email</label>
                                    <input type="email"  name="email" class="form-control" placeholder="Enter user email">
                                    <span class="text-danger">
                                        @if($errors->has('email'))
                                            {{ $email=$errors->first('email')}}
                                        @else
                                            {{$email=''}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="user-password" class="control-label"> Password</label>
                                    <input type="password"  name="password" class="form-control" placeholder="Enter user password">
                                    <span class="text-danger">
                                        @if($errors->has('password'))
                                            {{ $password=$errors->first('password')}}
                                        @else
                                            {{$password=''}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="user-role" class="control-label"> User Role</label>
                                    @if(isset($roles) && $roles !='')
                                    <select name="role_name" class="form-control">
                                        <option value="">Select User Role</option>
                                        @foreach($roles as $role)
                                            @if($role->name =="ROLE_ADMIN")
                                            <option value="{{$role->name}}">Admin</option>
                                            @elseif($role->name =="ROLE_SUPERADMIN")
                                            <option value="{{$role->name}}">Super Admin</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @else
                                    <select name="role_name" class="form-control">
                                        <option>Select User Role</option>
                                        <option value="ROLE_ADMIN">Admin</option>
                                        <option value="ROLE_SUPERADMIN">Super Admin</option>
                                    </select>
                                    @endif
                                    <span class="text-danger">
                                        @if($errors->has('role_name'))
                                            {{ $role_name=$errors->first('role_name')}}
                                        @else
                                            {{$role_name=''}}
                                        @endif
                                    </span>
                                </div>
                            </div>                            
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group text-right">
                                    <button type="submit"  id="create-user"  class="btn btn-warning" ><i class="fa fa-save"></i> Create User</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection