
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recharge Balance</title>

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
        @include('partials.success')

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Recharge Balance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Recharge Balance</li>
            </ol>
          </div><!-- /.col -->
        </div>
          
        
        <div class="col-lg-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Balance card -->
              <div class="col-lg-3 col-6" style="margin:auto">
                  <div class="small-box bg-orange">
                      <div class="inner">
                          <h3>{{ session('balance') }} $</h3>
                          <h4>Balance</h4>
                      </div>
                      <div class="icon">
                          <i class="fas fa-money-bill-wave"></i>
                      </div>
                  </div>
              </div>
          
              <!-- Recharge methods -->
              <div class="row">
                <div class="col-lg-3 col-6" style="margin:auto">
                    <a href="{{ route('recharge_amount', ['amount' => 10]) }}" class="btn btn-primary btn-block"><i class="fas fa-dollar-sign"></i> 10 $</a>
                </div>
                <div class="col-lg-3 col-6" style="margin:auto">
                    <a href="{{ route('recharge_amount', ['amount' => 20]) }}" class="btn btn-primary btn-block"><i class="fas fa-dollar-sign"></i> 20 $</a>
                </div>
                <div class="col-lg-3 col-6" style="margin:auto">
                    <a href="{{ route('recharge_amount', ['amount' => 50]) }}" class="btn btn-primary btn-block"><i class="fas fa-dollar-sign"></i> 50 $</a>
                </div>
                <div class="col-lg-3 col-6" style="margin:auto">
                    <a href="{{ route('recharge_amount', ['amount' => 100]) }}" class="btn btn-primary btn-block"><i class="fas fa-dollar-sign"></i> 100 $</a>
                </div>
            </div>
          </div>
              <!-- /.card-body -->
          </div>
      </div>

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3>Recharge History</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="card-body table-responsive p-0">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                          <th class="text-center">SL</th>
                          <th class="text-center">Recharge Amount</th>
                          <th class="text-center">Recharge Date</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                    @php $counter = 1; @endphp
                      @foreach ($recharge as $recharge_info)
                          <tr>
                              <td class="text-center">{{ $counter ++ }}</td>
                              <td class="text-center">{{ $recharge_info->recharge_amount }}</td>
                              <td class="text-center">{{ $recharge_info->created_at->format('d F, Y') }}</td>

                              
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
