<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crop Storage</title>

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

<script>
  function storeCrop(cropId, storageArea) {
      // Redirect to the route with the selected storage area and crop ID
      location.href = '/crop_store?crop_id=' + cropId + '&storage_area=' + storageArea;
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
            <h1 class="m-0">Crop Storage</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crop Storage</li>
            </ol>
          </div><!-- /.col -->
        </div>
        @if (count($key_crops) == 0)
        <div class="card card-primary card-outline">
            <div class="card-body" style="margin:auto">
                <h4>No Crop Remain For Store</h4>
            </div>
        </div>
        @endif
        
        @foreach ($key_crops as $index => $crop)
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
                                            <th>Storage Area</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Your table body content here -->
                                        @foreach ($key_crops as $key_crop)
                                        <tr>
                                            <td>{{ $key_crop->description }}</td>
                                            <td>{{ $key_crop->quantity_type }}</td>
                                            <td>{{ $key_crop->quantity }}</td>
                                            <td>{{ $key_crop->price }} per {{ $key_crop->quantity_type }}</td>
                                            <td>{{ $key_crop->private_key }}</td>
                                            <td>
                                                <select id="storageAreaSelect{{ $key_crop->id }}" name="storage_area" class="form-control"required>
                                                    <option>Select Storage Area</option>
                                                    <option value="dhaka">Dhaka</option>
                                                    <option value="rajshahi">Rajshahi</option>
                                                    <option value="chottogram">Chottogram</option>
                                                    <option value="khulna">Khulna</option>
                                                    <option value="rangpur">Rangpur</option>
                                                    <option value="barishal">Barishal</option>
                                                    <option value="mymensingh">Mymensingh</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" onclick="storeCrop('{{ $key_crop->id }}', document.getElementById('storageAreaSelect{{ $key_crop->id }}').value)">Store Crop</button>
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
<div class="card">
<div class="col-md-12">
      
        <div class="card-body">
          <h3>Crop on Storage</h3>
          <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Crop Name</th>
                    <th>Quantity Type</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Private Key</th>
                    <th>Storage Area</th>
                    <th>Token</th>
                    <th>Store Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Your table body content here -->
                @foreach ($store_crops as $store_crop)
                <tr>
                    <td>{{ $store_crop->crop_name }}</td>
                    <td>{{ $store_crop->quantity_type }}</td>
                    <td>{{ $store_crop->quantity }}</td>
                    <td>{{ $store_crop->price }} per {{ $store_crop->quantity_type }}</td>
                    <td>{{ $store_crop->private_key }}</td>
                    <td>{{ $store_crop->storage_area }}</td>
                    <td>{{ $store_crop->token }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $store_crop->created_at)->format('d F, Y') }}
                    </td>
                    @if($store_crop->status == 'stored_in_storage')
                    <td>
                      <button class="btn btn-primary" onclick="location.href='/add_to_marketplace?crop_id={{ $store_crop->crop_id }}'" style="height: 40px; white-space: nowrap;">Add to Marketplace</button>
                  </td>

                    @else
                      <td>Already in Marketplace</td>
                    @endif
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
</div>
</div>
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

<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
