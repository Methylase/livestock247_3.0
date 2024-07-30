@extends('layouts.dash')
  @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>

          </div>
        </div>
            <!-- Content Column -->
            <div class="col-lg-12 mb-4" style="height:820px">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold">Users </h6>
                  <div class="float-right text-default" id="usersToggle"><i class="fas fa-plus" id="close"></i></div>
                </div>
                <div class="card-body" id="users-body">
                  <div class="text-right">
                    <a href="{{route('create-user')}}" class="btn btn-sm btn-warning float-right mb-3">Create User</a>
                  </div> 
                  <div class="table-responsive">
                    
                    @if(isset($users) && $users != '')
                      <table class="table table-bordered border-bottom-info table-striped" id="dataTableUsers"  style="width:100%" cellspacing="0">
                        
                        
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Firstname</th>
                              <th>Lastname</th>
                              <th>Email</th>
                              <th>Phone Number</th>
                              <th>Designation</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                            @php $i=1;
                            @endphp
                            <tbody>
                            @foreach($users as $user)
                                  <tr>
                                      <td>{{$i}}</td>
                                      <td>{{ucfirst($user->firstname)}}</td>
                                      <td>{{ucfirst($user->lastname)}}</td>
                                      <td>{{ucfirst($user->email)}}</td>
                                      <td>{{ucfirst($user->phone_number)}}</td>
                                      <td>{{ucfirst($user->designation)}}</td>
                                      <td>
                                      
                                        <a href="" class="btn btn-sm btn-warning lockUser"  id="lock {{ucfirst($user->user_id)}}" data-title="Lock User" data-toggle="modal" data-target="#lock-user">
                                        @if($user->lock_user =="lock")
                                          <span class="fa fa-lock" title="Lock user"></span>
                                        @else
                                          <span class="fa fa-unlock" title="Lock user"></span>
                                        @endif 
                                            </a>                                          
                                      </td>  
                                  </tr>
                                
                            @php $i++;
                            @endphp
                            @endforeach
                      
                        </tbody>
                      </table>
                    @else
                      <p class="text-center">No user found</p>
                    @endif
                        <!-- modal for lock user -->
                        <div class="modal col-md-10 offset-md-2  col-sm-10 offset-sm-2 " id="lock-user" tabindex="-1" role="dialog" aria-labelledby="lock" aria-hidden="true">                  
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title" id="Heading">Lock this user</h4>
                                </div>
                                <div class="modal-body">
                                <div class="alert alert-warning  format"><span class="fa fa-warning text-danger"></span> Are you sure you want to lock this user?</div>
                                </div>
                                <div class="modal-footer">
                                <button  class="btn btn-success lock_user"><span class="fa fa-check-circle"></span> Yes</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fa fa-remove"></span> No</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    <!-- end of modal for lock user -->   
                  </div>                  
                </div>
              </div>
            </div>
          </div>

        <!-- /.container-fluid -->
      <!-- End of Main Content -->
@endsection
