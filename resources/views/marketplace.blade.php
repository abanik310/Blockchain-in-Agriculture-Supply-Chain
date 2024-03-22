
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ChainHarvest - A Blockchain Based Agri Marketplace</title>

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
        @include('partials.success')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <div class="container-fluid">
                      <div class="card">
                          <div class="card-header border-0">
                              {{-- <div class="d-flex justify-content-between">
                                  <h3 style="margin:auto; font-size: xx-large" class="card-title"><b>Clients</b></h3>
                              </div> --}}
                          </div>
                          <div class="card-body" style="display: flex; flex-wrap: wrap;">
                              <!-- Your card content here -->
                              @foreach ($marketplace_items as $item)
                              <div class="card" style="width: 300px; margin: 10px;">
                                  <div class="card-header">
                                      <h4 style="text-align:center"><b>{{ $item->crop_name }}</b></h4>
                                  </div>
                                  <!-- /.card-header -->
                                  <div class="card-body">
                                      <img src="{{ $item->crop_pic }}.jpg" alt="Agriculture Image" style="height: 150px;">
                                      <h3 class="card-text"><b>Price: </b>${{ $item->price }}</h3>
                                      <h4 class="card-text"><b>Quantity: </b>{{ $item->quantity }} {{ $item->quantity_type }}</h4>
                                      <p class="card-text" style="font-size: larger;"><b>Token: </b>{{ $item->token }}</p>
                                      <p class="card-text"><b>Description: </b>{{ $item->description }}</p>
                                      

                                      <!-- Add more item details as needed -->
                                      <form action="{{ route('add_cart', ['id' => $item->id]) }}" method="POST" class="d-flex justify-content-end">
                                          @csrf
                                          <a href="{{ route('marketplace_details', ['id' => $item->id]) }}" class="btn btn-primary" style="margin-right: 10px;">Details</a>
                                          <button type="submit" class="btn btn-success">Add to Cart</button>
                                      </form>
                                  </div>
                                  <!-- /.card-body -->
                              </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.row -->
      </div>
  </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
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
