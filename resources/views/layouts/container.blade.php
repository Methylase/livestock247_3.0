<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">
  <meta name="csrf-token" content="{{csrf_token()}}">   
  <meta name="author" content="">

  <title>Dashboard - {{$title}}</title>

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
  <script src="{{asset('dash-template/vendor/jquery/jquery.min.js')}}"></script> 

 
  <style>
  
  .login-container, .signup-container{
     margin-top: 7rem;
     border: 1px solid #d2d2d2;
     text-align:center !important;

   }  


   @media (max-width: 991px) {

     .login-container, .signup-container{
       width: 400px;
       margin-left:20%;
       margin-right:20%;
       padding: 25px;
     }  
     form{
       width:100%;
     }
   }

  
   @media (min-width: 992px) {
     .login-container, .signup-container{
       padding: 25px;
       width: 400px;
     } 
     
     form{
       width:350px;
      
     }
   }

 @media (min-width: 576px) {
   .pl-sm-5, .px-sm-5 {
     padding-left: 0 !important;
   }
   .pr-sm-5, .px-sm-5 {
     padding-right: 0 !important;
   }
 }



   @media (max-width: 575px) {
     .login-container, .signup-container{
       width: 100%;
       margin-left: 0;
       margin-right: 0;
       padding: 25px;
     }

     form{
       width:100%;
     }

     .container-fluid {
       padding-left: 0.2rem;
       padding-right: 0.2rem;
     }
   }      
    
 </style>  
</head>

<body id="page-top">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5">
            @yield('content')           
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
    <!-- Bootstrap core JavaScript-->
  <script src="{{asset('dash-template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('dash-template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('dash-template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('dash-template/js/sb-admin-2.min.js')}}"></script>
   <script> window.onload=dateTime();</script>    
  <!-- Page level plugins -->
  <script src="{{asset('dash-template/vendor/chart.js/Chart.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('jqueryTimePicker/jquery.timepicker.min.js')}}"></script>
  <!-- Page level custom scripts -->
  <script src="{{asset('dash-template/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('dash-template/js/demo/chart-pie-demo.js')}}"></script>
  <script src="{{asset('dash-template/js/jquery.dataTables.min.js')}}"></script> 
  <script src="{{asset('dash-template/js/bootstrap-multiselect.min.js')}}"></script> 
    <form id='logout-form' action="{{url('/deschool/logout')}}"
    method="POST" style='display:none'>
        {{csrf_field()}}
    </form>
</body>

</html>