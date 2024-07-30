<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">
  <meta name="csrf-token" content="{{csrf_token()}}">   
  <meta name="author" content="">

  <title>Livestock247 - {{$title}}</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('dash-template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{asset('dash-template/img/desktop logo.png')}}"  sizes ="25x25"> 
  <!-- Custom styles for this template-->
  <link href="{{asset('jqueryTimePicker/jquery.timepicker.min.css')}}" rel="stylesheet"> 
  <link href="{{asset('dash-template/css/jquery.dataTables.min.css')}}" rel="stylesheet"> 
  <link href="{{asset('dash-template/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('dash-template/css/bootstrap-multiselect.min.css')}}" rel="stylesheet">
  <script src="{{asset('jqueryTimePicker/jquery.timepicker.min.js')}}"></script>
  <!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>-->
  <script src="{{asset('dash-template/vendor/jquery/jquery.min.js')}}"></script> 
  <script>
      $(document).ready(function(){

        // reset password toggle
        $('#resetPasswordToggle').click(function(){
          $('#reset-password-body').toggle();
        });

        // blog posts toggle
        $('#blogPostsToggle').click(function(){
         $('#blog-posts-body').toggle();
        });

        // create blog post toggle
        $('#createBlogPostToggle').click(function(){
         $('#create-blog-post-body').toggle();
        });

       // profile toggle
        $('#profileToggle').click(function(){
          $('#profile-body').toggle();
        });

        // edit blog post toggle
        $('#editBlogPostToggle').click(function(){
          $('#edit-blog-post-body').toggle();
        });


          // create user toggle
        $('#createUserToggle').click(function(){
          $('#create-user-body').toggle();
        });
        
          // users toggle
          $('#usersToggle').click(function(){
          $('#users-body').toggle();
        });
            
        $('.deletePost').on('click', function(){
          var delPost = $(this).attr('id');
          delPost = delPost.split(' ');
          $('.del_post').attr('id', 'del_post'+delPost[1])
          $('#del_post'+delPost[1]).on('click', function(){
           
          
          var token =$("meta[name='csrf-token']").attr("content");
          values= {
            "post_id": delPost[1],
            "_token": token,
          }

          // delete post
          $.ajax({
              type: "DELETE",
              url: "delete-post/"+delPost[1],
              data: values,
          }).done(function(result){
            if (result.success=='success'){
              $('#confirm-delete').modal('hide');
              $("#blog-post-body").prepend("<div class='status alert alert-success text-center col-sm-9 offset-sm-1'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a><strong >" +result.message+"</strong></div>"); 
              setTimeout(function(){
              location.reload();
              }, 3000);
            }else if(result.success=='fail'){
                $("#blog-post-body").prepend("<div class='status alert alert-danger text-center col-sm-9 offset-sm-1'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a><strong >" +result.message+"</strong></div>");
              setTimeout(function(){
              location.reload();
              }, 3000);                  
            }
          });
          });
        });


        // lock user
        $('.lockUser').on('click', function(){
          var lockUser = $(this).attr('id');
          var token =$("meta[name='csrf-token']").attr("content");
          lockUser = lockUser.split(' ');
          $('.lock_user').attr('id', 'lock_user'+lockUser[1])
          $('#lock_user'+lockUser[1]).on('click', function(){
          values= {
            "user_id": lockUser[1],
            "_token": token
          }
          $.ajax({
              type: "POST",
              url: "lock_user",
              data: values,
              dataType: 'json',
          }).done(function(result){
              console.log(result);
              
            if (result.status=='success'){
              $('#lock-user').modal('hide');
              $("#users-body").prepend("<div class='status alert alert-warning text-center col-sm-9 offset-sm-1'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a><strong >" +result.message+"</strong></div>"); 
              setTimeout(function(){
              location.reload();
              }, 3000);
            }
          });
          });
        });         
        



        //number of users
        setInterval(function() {
          $.get('number_of_users', function(data){
            $('.number_of_users').html(data);
          });           
        }, 1000);        

        //number of locked users
        setInterval(function() {
          $.get('number_of_locked_users', function(data){
            $('.number_of_locked_users').html(data);
          });            
        }, 1000); 

        
         //number of blog post
        setInterval(function() {
          $.get('number_of_blog_post', function(data){
            $('.number_of_blog_post').html(data);
          });             
        }, 1000); 
   
        
         //number of blog post
        setInterval(function() {
          $.get('number_of_deleted_post', function(data){
            $('.number_of_deleted_post').html(data);
          });             
        }, 1000); 
        

        $('#dataTablePost').DataTable({
          "bJQueryUI": true,
          "sPaginationType": "full_numbers",
          "bDestroy": true,
          "aoColumnDefs":[{
            "aSortable": true,
            "aTargets":[0,1]
          }],
          "aLengthMenu":[[5,10,20,50,100,200, 500,-1], [5,10,20,50,100,200,500, "All"]],
          "iDisplayLenghth": 5,
          
        }); 


        $('#dataTableUsers').DataTable({
          "bJQueryUI": true,
          "sPaginationType": "full_numbers",
          "bDestroy": true,
          "aoColumnDefs":[{
            "aSortable": true,
            "aTargets":[0,1]
          }],
          "aLengthMenu":[[5,10,20,50,100,200, 500,-1], [5,10,20,50,100,200,500, "All"]],
          "iDisplayLenghth": 5,
          
        });         

        $('#staffEmail').multiselect({
          enableHTML: true
        });  
           
      }); 
     
      /*tinymce.init({
      /*selector: 'textarea#post-description',
      skin: 'bootstrap',
      plugins: 'lists, link, image, media',
      toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
      menubar: true,
    });*/
  </script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon">
        <img src="{{$profile->profile_image !== null || $profile->profile_image !='' ? url('uploads/'.$profile->profile_image) : asset('dash-template/img/user.jpg') }}" width="25" height="25" style="border-radius:100%;">
        </div>
        <div class="sidebar-brand-text mx-3"> Livestock247 </div>
      </a>  
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>     
      </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Addons
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog fa-spin text-gray-400"></i>
            <span>Settings</span>
          </a>
          <div id="collapseSettings" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Settings:</h6>
                <a class="collapse-item" href="{{route('profile')}}">Update Profile</a> 
                <a class="collapse-item" href="{{route('reset-password')}}">Reset Password</a>    
            </div>
          </div>
        </li> 
        @if(Auth::user()->hasRole('ROLE_SUPERADMIN'))
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Addons
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog fa-spin text-gray-400"></i>
            <span>Users</span>
          </a>
          <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Users:</h6>  
                @if(Auth::user()->lock_user !='lock')    
                <a class="collapse-item" href="{{route('create-user')}}">Create User</a> 
                @endif              
                <a class="collapse-item" href="{{route('users')}}">Users</a>
               
            </div>
          </div>
        </li>
        @endif   
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Addons
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-envelope text-gray-400"></i>
            <span>Blog Post</span>
          </a>
          <div id="collapseBlog" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Blog Post:</h6> 
              @if(Auth::user()->lock_user !='lock') 
                <a class="collapse-item" href="{{route('create-post')}}">Create Post</a>
              @endif  
                <a class="collapse-item" href="{{route('posts')}}">All Blog Post</a>
            </div>
          </div>
        </li>

        <!-- Divider -->
      
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Addons
        </div>  

      <li class="nav-item">
     
        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit()">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Logout</span>
        </a>
     

      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" >
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
                
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @if(Auth::user()->hasRole('ROLE_SUPERADMIN'))
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$profile->firstname !== null || $profile->firstname != '' ? ucwords($profile->firstname.' '.$profile->lastname) : ucfirst($userEmail) }}</span>
              @elseif(Auth::user()->hasRole('ROLE_ADMIN'))
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$profile->firstname !== null || $profile->firstname != '' ? ucwords($profile->firstname.' '.$profile->lastname) : ucfirst($userEmail) }}</span>
              @endif
                  
                <img class="img-profile rounded-circle" src="{{$profile->profile_image !== null || $profile->profile_image !='' ? url('uploads/'.$profile->profile_image) : asset('dash-template/img/user.jpg') }}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('profile')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Update Profile
                </a>
                <a class="dropdown-item" href="{{route('reset-password')}}">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Reset Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit()">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        @yield('content')

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Livestock247 {{$date}}</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('dash-template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('dash-template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('dash-template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('dash-template/js/sb-admin-2.min.js')}}"></script>
 
  <!-- Page level plugins -->
  <script src="{{asset('dash-template/vendor/chart.js/Chart.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('jqueryTimePicker/jquery.timepicker.min.js')}}"></script>
  <!-- Page level custom scripts -->
  <script src="{{asset('dash-template/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('dash-template/js/demo/chart-pie-demo.js')}}"></script>
  <script src="{{asset('dash-template/js/jquery.dataTables.min.js')}}"></script> 
  <script src="{{asset('dash-template/js/bootstrap-multiselect.min.js')}}"></script> 
    <form id='logout-form' action="{{route('logout')}}"
    method="POST" style='display:none'>
        {{csrf_field()}}
    </form>
</body>

</html>
