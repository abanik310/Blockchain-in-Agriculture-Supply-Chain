
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crops Timeline</title>

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
            <h1 class="m-0">Crops Timeline</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crops Timeline</li>
            </ol>
          </div><!-- /.col -->
        </div>
          
        @foreach ($my_crops as $index => $crop)
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
                      <div class="timeline">
                        <!-- timeline time label -->
                        <div class="time-label">
                          <span class="bg-red">{{ $crop->created_at->format('d F, Y') }}</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-envelope bg-blue"></i>
                          <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{ $crop->created_at->format('H:i') }}</span>
                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
          
                            <div class="timeline-body">
                              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                              weebly ning heekya handango imeem plugg dopplr jibjab, movity
                              jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                              quora plaxo ideeli hulu weebly balihoo...
                            </div>
                            <div class="timeline-footer">
                              <a class="btn btn-primary btn-sm">Read more</a>
                              <a class="btn btn-danger btn-sm">Delete</a>
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-user bg-green"></i>
                          <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-comments bg-yellow"></i>
                          <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                            <div class="timeline-body">
                              Take me to your leader!
                              Switzerland is small and neutral!
                              We are more like Germany, ambitious and misunderstood!
                            </div>
                            <div class="timeline-footer">
                              <a class="btn btn-warning btn-sm">View comment</a>
                            </div>
                          </div>
                        </div>
                        <div>
                          <i class="fas fa-clock bg-gray"></i>
                        </div>
                      </div>
                    </div>
                                      </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
        {{-- @foreach ($my_crops as $my_crops)
        <div class="col-lg-12">
          
          <div class="col-12" id="accordion">
            
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                              {{ $my_crops->crop_name }}
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        </div>
                    </div>
                </div>
                
            </div>
            
          {{-- <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-end align-items-center">
                  <button class="btn btn-primary" onclick="location.href='/view_add_crops'">Add New Crops</button>
              </div>
          </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="card-body table-responsive p-0">
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
                              @foreach ($my_crops as $my_crops)
                          <tr>
                              <td>{{ $my_crops->crop_name }}</td>
                              <td>{{ $my_crops->growing_type }}</td>
                              <td>{{ $my_crops->harvesting_type }}</td>
                              <td>{{ $my_crops->sourcing_type }}</td>
                              <td>{{ $my_crops->gmo_type }}</td>
                              <td>{{ $my_crops->description }}</td>
                              <td>{{ $my_crops->quantity_type }}</td>
                              <td>{{ $my_crops->quantity }}</td>
                              <td>{{ $my_crops->price }} per {{ $my_crops->quantity_type }}</td>
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
      @endforeach --}}
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
