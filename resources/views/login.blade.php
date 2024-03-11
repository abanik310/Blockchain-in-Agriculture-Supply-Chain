<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('partials.home_nav')

  <!-- Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          {{-- <div class="col-lg-6">
            <div class="card">
                    <div class="card-body" style="padding: 0;">
                        <img src="/image/back.jpg" class="img-fluid" alt="Agriculture Image" style="height: 50%;">

                    </div>
                
            </div>
          </div> --}}
          <div class="col-lg-4" style="margin: auto">
            <div class="card">
            </div>
              <div class="card-body login-card-body">
                {{-- <h3 style="text-align:center; font-size: xx-large" class="card-title">LOGIN</h3> <br>
                <h3 style="text-align:center;" class="card-title">Sign in to start your session</h3>
                 --}}
                 <p style="font-size: xx-large" class="login-box-msg"><b>LOGIN</b></p>
                @if(Session::has('error'))
                  <p class="text text-bold text-danger" style="text-align: center;text-transform: uppercase;color:lightyellow">{!! Session::get('error') !!}</p>
                @endif
                <p class="login-box-msg" style="font-size: large; color:green">Sign in to start your session</p>
                <form method="post" action="{{ route('check_login') }}" >
                  {{ csrf_field() }}
                  <div class="input-group mb-3">
                    <select name="usertype" class="form-control" required>
                      <option>Select a user type</option>
                      <option value="farmer">Farmer</option>
                      <option value="logistic_company">Logistic Company</option>
                      <option value="consumer">Consumer</option>
                    </select>
                  </div>

                  <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
                  
                  <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                  <div class="row">
                    <div class="col-8">
                      
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
                
                <!-- /.social-auth-links -->
          
                
                <p class="mb-0">
                  <a href="register" class="text-center">Register a new membership</a>
                </p>
              </div>
                
            </div>
          </div>
            <!-- /.card -->
          </div>
          <br>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
<footer class="main-footer" style="margin-left: 0px; background: forestgreen; text-align: center; padding: 40px">
  <strong style="font-size: x-large;color: white;">Copyright &copy; 2024 <a href="#" style="color: black">Abu Bakar Siddiq</a>.
  All rights reserved.</strong>
  <div class="float-left d-none d-sm-inline-block" style="color: white">
    <a href="#" target="_blank" class="social-icon"><i class="fab fa-facebook fa-3x" style="color: white"></i></a>
    <a href="#" target="_blank" class="social-icon"><i class="fab fa-skype fa-3x" style="color: white"></i></a>
    <a href="#" target="_blank" class="social-icon"><i class="fab fa-youtube fa-3x" style="color: white"></i></a>
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
