
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inspection</title>

  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
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
            <h1 class="m-0">Inspection</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inspection</li>
            </ol>
          </div><!-- /.col -->
        </div>

        <div class="col-lg-12">
            <div class="card">
              @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('success') }}
                </div>
              @endif
                <div class="container">
                    <div class="row justify-content-center">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>Farmer Name</th>
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
                              @foreach ($inspect_by_LC as $info)
                                  <tr>
                                      <td>{{ $info->fullname }}</td>
                                      <td>{{ $info->crop_name }}</td>
                                      <td>{{ $info->growing_type }}</td>
                                      <td>{{ $info->harvesting_type }}</td>
                                      <td>{{ $info->sourcing_type }}</td>
                                      <td>{{ $info->gmo_type }}</td>
                                      <td>{{ $info->description }}</td>
                                      <td>{{ $info->quantity_type }}</td>
                                      <td>{{ $info->quantity }}</td>
                                      <td>{{ $info->price }} per {{ $info->quantity_type }}</td>
                                      
                                      <!-- Add more columns as needed -->
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                        <div class="col-lg-6" style="margin: auto;"><br><br>
                            <form method="post" action="{{ route('add_inspection_certificate') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="crop_id" value="crop_id">

                                <div class="input-group mb-3">
                                    <select name="growing_type" class="form-control" required>
                                        <option>Growing Type Info</option>
                                        <option value=" as_mentioned"> As Mentioned</option>
                                        <option value="not_maintained">Not Maintained</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="harvesting_type" class="form-control" required>
                                        <option>Harvesting Type Info</option>
                                        <option value=" correct"> Correct</option>
                                        <option value=" incorrect"> Incorrect</option>
                                      </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="sourcing_type" class="form-control" required>
                                        <option>Sourcing Type Info</option>
                                        <option value=" correct"> Correct</option>
                                        <option value=" incorrect"> Incorrect</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="gmo_type" class="form-control" required>
                                        <option>GMO(Genetically Modified) Type Info</option>
                                        <option value=" correct"> Correct</option>
                                        <option value=" incorrect"> Incorrect</option>
                                      </select>
                                </div>
                                <div class="input-group mb-3">
                                  <select name="quantity_info" class="form-control" required>
                                      <option>Quantity Info </option>
                                      <option value=" correct"> Correct</option>
                                      <option value=" incorrect"> Incorrect</option>
                                    </select>
                              </div>
                                  
                                <div class="input-group mb-3">
                                    <textarea name="comment" class="form-control" placeholder="Comment"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-comment"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                  <textarea name="about_price" class="form-control" placeholder="About Price"></textarea>
                                  <div class="input-group-append">
                                      <div class="input-group-text">
                                          <span class="fas fa-comment"></span>
                                      </div>
                                  </div>
                              </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Add Certificate</button>
                                    </div>
                                </div><br>
                            </form>
                        </div>
                    </div>
                </div>
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
