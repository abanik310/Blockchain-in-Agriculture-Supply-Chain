
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Crops</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
            <h1 class="m-0">Add New Crops</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Crops</li>
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
                        <div class="col-lg-6"><br><br>
                            <form method="post" action="{{ route('add_new_crops') }}">
                                {{ csrf_field() }}
                                <div class="input-group mb-3">
                                    <input type="text" name="crop_name" class="form-control" placeholder="Crop Name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-leaf"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="growing_type" class="form-control" required>
                                        <option>Select a Growing Type</option>
                                        <option value=" traditional_farming"> Traditional Farming</option>
                                        <option value="organic_methods">Organic Methods</option>
                                        <option value="hydroponics">Hydroponics</option>
                                      </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="harvesting_type" class="form-control" required>
                                        <option>Select a Harvesting Type</option>
                                        <option value=" by_hand"> By Hand</option>
                                        <option value=" by_machine"> By Machine</option>
                                      </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="sourcing_type" class="form-control" required>
                                        <option>Select a Sourcing Type </option>
                                        <option value=" locally_sourced"> Locally Sourced</option>
                                        <option value=" grown_on_farm"> Grown On Farm</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="gmo_type" class="form-control" required>
                                        <option>Select a GMO(Genetically Modified) Type </option>
                                        <option value=" gmo"> GMO</option>
                                        <option value=" non_gmo"> Non-GMO</option>
                                        <option value=" not_applicable"> Not Applicable</option>
                                      </select>
                                </div>
                                  
                                <div class="input-group mb-3">
                                    <textarea name="description" class="form-control" placeholder="Description"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-comment"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                  <select name="quantity_type" class="form-control" required>
                                      <option>Quantity Type </option>
                                      <option value=" piece"> Piece</option>
                                      <option value=" kg"> KG</option>
                                    </select>
                              </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-balance-scale"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="price" class="form-control" placeholder="Price" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-dollar-sign"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Add New Crop</button>
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
