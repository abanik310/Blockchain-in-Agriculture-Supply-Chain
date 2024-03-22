
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Make Payment</title>

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
  // Get the current date in UTC to avoid time zone issues
  var currentDate = new Date(Date.now() - new Date().getTimezoneOffset() * 60000);

  // Format the date as mm/dd/yyyy
  var formattedDate = (currentDate.getMonth() + 1) + '/' + (currentDate.getDate()+1) + '/' + currentDate.getFullYear();

  // Set the formatted date to the element with id="currentDate"
  document.getElementById('currentDate').innerText = 'Date: ' + formattedDate;
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
            <h1 class="m-0">Make Payment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Make Payment</li>
            </ol>
          </div><!-- /.col -->
        </div>
          

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                {{-- <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div> --}}
    
    
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-12">
                      <h4>
                        {{-- <i class="fas fa-globe"></i> AdminLTE, Inc. --}}
                        <small class="float-right">Date: {{ date('d/m/Y') }}</small>

                      </h4>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                    
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice #007612</b><br>
                      <br>
                      <b>Order ID:</b> 4F3S8J<br>
                      <b>Payment Due:</b> 2/22/2014<br>
                      <b>Account:</b> 968-34567
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
    
                  <!-- Table row -->
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>Qty</th>
                          <th>Qty Type</th>
                          <th>Product</th>
                          <th>Farmer Name</th>
                          <th>Token</th>
                          <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($cart_list as $info)
                          <tr>
                              <td>{{ $info->quantity }}</td>
                              <td>{{ $info->quantity_type }}</td>
                              <td>{{ $info->crop_name }}</td>
                              <td>{{ $info->farmer_name }}</td>
                              <td>{{ $info->token }}</td>
                              
                              <td>{{ $info->price }}</td>
                              
                              <!-- Add more columns as needed -->
                          </tr>
                      @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
    
                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                      <p class="lead">Payment Methods:</p>
                      <img src="../../dist/img/credit/visa.png" alt="Visa">
                      <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                      <img src="../../dist/img/credit/american-express.png" alt="American Express">
                      <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
    
                      <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                        plugg
                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                      </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                      <p class="lead">Amount Due 2/22/2014</p>
    
                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                          </tr>
                          <tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                          </tr>
                          <tr>
                            <th>Shipping:</th>
                            <td>$5.80</td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td>$265.24</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
    
                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <div class="col-12">
                      <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                      <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                      </button>
                      <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                      </button>
                    </div>
                  </div>
                </div>
                <!-- /.invoice -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
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
