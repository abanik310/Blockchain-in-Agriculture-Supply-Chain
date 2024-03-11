
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Private Key Generate</title>

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
            <h1 class="m-0">Private Key Generate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Private Key Generate</li>
            </ol>
          </div><!-- /.col -->
        </div>
        @if (count($certified_crops) == 0)
        <div class="card card-primary card-outline">
            <div class="card-body" style="margin:auto">
                <h4>No data found</h4>
            </div>
        </div>
        @endif
        
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
                              
                                <div>
  
                                  <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Quantity Type</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Private Key</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Your table body content here -->
                                        @foreach ($certified_crops as $certified_crop)
                                        <tr>
                                            <td>{{ $certified_crop->description }}</td>
                                            <td>{{ $certified_crop->quantity_type }}</td>
                                            <td>{{ $certified_crop->quantity }}</td>
                                            <td>{{ $certified_crop->price }} per {{ $certified_crop->quantity_type }}</td>
                                            <td>
                                                @if(!is_null($crop_for_private_key) && count($crop_for_private_key) > 0)
                                                    @foreach ($crop_for_private_key as $crop)
                                                        {{ $crop->id }}
                                                    @endforeach
                                                @else
                                                    <!-- Handle the case where $crop_for_private_key is null or empty -->
                                                    <button class="btn btn-primary" onclick="location.href='/generate_key?crop_id={{ $crop->id }}'">Generate Key</button>
                                                    @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
        
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
