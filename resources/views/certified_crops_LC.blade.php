
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Certified Crops</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}
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
            <h1 class="m-0">Certified Crops</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Certified Crops</li>
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
                  {{-- <div class="card-body table-responsive p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>Crop Name</th>
                                  <th>Growing Type</th>
                                  <th>Harvesting Type</th>
                                  <th>Sourcing Type</th>
                                  <th>GMO Type</th>
                                  <th>Description</th>
                                  <th>Quantity Type</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                              </tr>
                          </thead>
                          <tbody>
                              <!-- Your table body content here -->
                              @foreach ($certified_crops as $certified_crops)
                          <tr>
                              <td>{{ $certified_crops->crop_name }}</td>
                              <td>{{ $certified_crops->growing_type }}</td>
                              <td>{{ $certified_crops->harvesting_type }}</td>
                              <td>{{ $certified_crops->sourcing_type }}</td>
                              <td>{{ $certified_crops->gmo_type }}</td>
                              <td>{{ $certified_crops->description }}</td>
                              <td>{{ $certified_crops->quantity_type }}</td>
                              <td>{{ $certified_crops->quantity }}</td>
                              <td>{{ $certified_crops->price }} per {{ $certified_crops->quantity_type }}</td>
                              <!-- Add more columns as needed -->
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div> 
                  </div>--}}
                  @foreach ($certified_crops as $index => $crop)

                    <div class="col-lg-12">
                        <div class="col-12" id="accordion">
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapse{{ $index }}">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            {{ $crop->crop_name }}
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapse{{ $index }}" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline-item">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-red">{{ $crop->created_at->format('d F, Y') }}</span>
                                                </div>
                                                <div>
                                                    {{-- <i class="fas fa-envelope bg-blue"></i> --}}
                                                    <div>
                                                    <div class="timeline-item">
                                                      <h3 class="timeline-header no-border"> Initially Uploaded</h3>
                                                  </div>
                                                    </div>
                                                    <table class="table table-striped table-bordered table-hover">
                                                      <thead>
                                                          <tr>
                                                              <th>Growing Type</th>
                                                              <th>Harvesting Type</th>
                                                              <th>Sourcing Type</th>
                                                              <th>GMO Type</th>
                                                              <th>Description</th>
                                                              <th>Quantity Type</th>
                                                              <th>Quantity</th>
                                                              <th>Price</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <!-- Your table body content here -->
                                                          @foreach ($certified_crops as $certified_crops)
                                                      <tr>
                                                          <td>{{ $certified_crops->growing_type }}</td>
                                                          <td>{{ $certified_crops->harvesting_type }}</td>
                                                          <td>{{ $certified_crops->sourcing_type }}</td>
                                                          <td>{{ $certified_crops->gmo_type }}</td>
                                                          <td>{{ $certified_crops->description }}</td>
                                                          <td>{{ $certified_crops->quantity_type }}</td>
                                                          <td>{{ $certified_crops->quantity }}</td>
                                                          <td>{{ $certified_crops->price }} per {{ $certified_crops->quantity_type }}</td>
                                                          <!-- Add more columns as needed -->
                                                      </tr>
                                                      @endforeach
                                                      </tbody>
                                                  </table>
                                                  @foreach ($inspect_by_LC as $index => $crop_inspection)
                                                  
                                                  {{-- <div class="time-label bg-red">
                                                    <span >{{ $crop_inspection->created_at->format('d F, Y') }}</span>
                                                  </div> --}}
                                                  <div class="time-label">
                                                    <span class="bg-red">{{ $crop_inspection->created_at->format('d F, Y') }}</span>
                                                </div>
                                                  <div>
                                                    {{-- <i class="fas fa-user bg-green"></i> --}}
                                                    <div class="timeline-item">
                                                        {{-- <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span> --}}
                                                        <h3 class="timeline-header no-border"> From Logistic Company</h3>
                                                    </div>
                                                  </div>
                                                  <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Growing Type</th>
                                                            <th>Harvesting Type</th>
                                                            <th>Sourcing Type</th>
                                                            <th>GMO Type</th>
                                                            <th>Comment</th>
                                                            <th>Quantity Type</th>
                                                            <th>About Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($inspect_by_LC as $inspect_by_LC)
                                                    <tr>
                                                        <td>{{ $inspect_by_LC->growing_type }}</td>
                                                        <td>{{ $inspect_by_LC->harvesting_type }}</td>
                                                        <td>{{ $inspect_by_LC->sourcing_type }}</td>
                                                        <td>{{ $inspect_by_LC->gmo_type }}</td>
                                                        <td>{{ $inspect_by_LC->quantity_info }}</td>
                                                        <td>{{ $inspect_by_LC->comment }}</td>
                                                        <td>{{ $inspect_by_LC->about_price }}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                @endforeach
                                                </div>
                                            </div>
                                            <!-- END timeline -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
