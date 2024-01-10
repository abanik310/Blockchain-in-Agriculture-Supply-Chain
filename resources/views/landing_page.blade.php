
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ChainHarvest - Decentralized Agri-Supply Chain</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('partials.nav')

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
            <div class="col-lg-6">
            <div class="card">
                    <div class="card-body" style="padding: 0;">
                        <img src="/image/back.jpg" class="img-fluid" alt="Agriculture Image" style="height: 50%;">

                    </div>
                
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
                    <div class="card-body" style="padding: 0;">
                      <p style="margin-left: 250px;font-size: xx-large" class="card-title"><b>At a Glance</b></p><br>
                        <br><img src="/image/benefit.jpg" class="img-fluid" alt="Agriculture Image" style="height: 50%;">

                    </div>
                
            </div>
          </div>

          <div class="container-fluid">
            <div class="card col-lg-12">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 style="margin:auto; font-size: xx-large" class="card-title"><b>BENEFITS</b></h3>
                </div>
              </div>
            <div class="row">
              <div class="col-lg-4">
                <!-- Your first card content here -->
                <div class="card-body" style="position: relative">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="d-flex justify-content-between">
                        <h3 style="text-align:center; font-size: x-large" class="card-title">Digitalized Crop Sourcing</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <p>Manage processes in a vertically integrated crop supply chain through a centralized digital agriculture platform. Bring the platform to farms in your supply chain and digitalize your crop sourcing processes.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Your first card content here -->
                <div class="card-body" style="position: relative">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="d-flex justify-content-between">
                        <h3 style="text-align:center; font-size: x-large" class="card-title">Farmer Contracting & Advisory</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <p>Simplify famer contracting and monitoring with data on quantities per crop, inputs and services provided. Track production progress by farm and provide agronomic advisory directly through the platform.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Your first card content here -->
                <div class="card-body" style="position: relative">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="d-flex justify-content-between">
                        <h3 style="text-align:center; font-size: x-large" class="card-title">Crop Insights & Best Practices</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <p>Provide farmers with real-time insights into crop health, risk and climate conditions, enabling data-driven decisions. Share best agronomic practices to produce healthy, nutritious and safe produce in a sustainable way.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Your second card content here -->
                <div class="card-body" style="position: relative">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="d-flex justify-content-between">
                        <h3 style="text-align:center; font-size: x-large" class="card-title">Standards & Traceability</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <p>Monitor agronomic practices and use of agrochemicals by crop and field to ensure compliance with food quality and safety standards, securing total traceability.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Your third card content here -->
                <div class="card-body" style="position: relative">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="d-flex justify-content-between">
                        <h3 style="text-align:center; font-size: x-large" class="card-title">Real-Time Yield Forecasting</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <p>Track harvest plans and actual harvesting by farm, crop and field in real time. Secure a continuous supply and minimize gaps in produce delivery.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Your fourth card content here -->
                <div class="card-body" style="position: relative">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="d-flex justify-content-between">
                        <h3 style="text-align:center; font-size: x-large" class="card-title">Supply Chain Sustainability</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <p>Analyze your supply chain climate footprint, land and water use, impact on environment and supplier livelihoods. Meet your sustainability goals.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body login-card-body">
                <div class="card-body" style="padding: 0;">
                  <!-- Replace existing content with the image -->
                  <img src="/image/benefit.JPG" class="img-fluid" alt="Agriculture Image" style="height: 50%;">
              </div>
              </div>
            </div>
          </div>

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Some Product
                    </td>
                    <td>$13 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small>
                      12,000 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Another Product
                    </td>
                    <td>$29 USD</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                      </small>
                      123,234 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Amazing Product
                    </td>
                    <td>$1,230 USD</td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                      </small>
                      198 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Perfect Item
                      <span class="badge bg-danger">NEW</span>
                    </td>
                    <td>$199 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        63%
                      </small>
                      87 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Online Store Overview</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="ion ion-ios-refresh-empty"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> 12%
                    </span>
                    <span class="text-muted">CONVERSION RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                    </span>
                    <span class="text-muted">SALES RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                  <p class="text-danger text-xl">
                    <i class="ion ion-ios-people-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> 1%
                    </span>
                    <span class="text-muted">REGISTRATION RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
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
