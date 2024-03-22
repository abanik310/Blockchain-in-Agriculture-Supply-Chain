
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cart</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<script>
  function handleSelection(select) {
    var selectedOption = select.options[select.selectedIndex];

    if (selectedOption.value === 'logout') {
      window.location.href = 'logout';
    }
  }
</script>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
@include('partials.main_nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('partials.side_bar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cart</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cart</li>
            </ol>
          </div><!-- /.col -->
        </div>
          

        <div class="col-lg-12">
          <div class="card">
            {{-- <div class="card-header">
              <div class="d-flex justify-content-end align-items-center">
                  <button class="btn btn-primary" onclick="location.href='/view_add_crops'">Add New Crops</button>
              </div>
          </div> --}}
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="card-body table-responsive p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Crop Name</th>
                                <th>Farmer Name</th>
                                <th>Quantity Type</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_list as $info)
                                <tr>
                                    <td>{{ $info->crop_name }}</td>
                                    <td>{{ $info->farmer_name }}</td>
                                    <td>{{ $info->quantity_type }}</td>
                                    <td>{{ $info->quantity }}</td>
                                    <td>{{ $info->price }} per {{ $info->quantity_type }}</td>
                                    <td class="text-center">
                                      <a href="{{ route('make_payment', ['id' => $info->id]) }}" class="btn btn-primary">Make Payment</a>
                                    </td>
                                    <!-- Add more columns as needed -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('partials.main_footer')

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
