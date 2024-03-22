
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crop Details </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
            <h1 class="m-0">Crop Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crop Details</li>
            </ol>
          </div><!-- /.col -->
        </div>
          

        <section class="content">
          @include('partials.success')
          @foreach ($marketplace_details as $item)
          <!-- Default box -->
          <div class="card card-solid">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3 class="d-inline-block d-sm-none">{{ $item->crop_name }}</h3>
                  <div class="col-12">
                    <img src="{{ $item->crop_pic }}.jpg" class="product-image" alt="Crop Image">
                  </div>
                  {{-- <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                    
                  </div> --}}
                </div>
                <div class="col-12 col-sm-6">
                  <h3 class="my-3">{{ $item->crop_name }}</h3>
                  <p>{{ $item->description }}</p>
    
                  <hr>
                  <h4>Available Quantity</h4>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center active">
                      <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                      {{ $item->quantity }} {{ $item->quantity_type }}
                      <br>
                      {{-- <i class="fas fa-circle fa-2x text-green"></i> --}}
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                      @php
                          $half = $item->quantity / 2;
                      @endphp
                      {{ $half }} {{ $item->quantity_type }}
                      <br>
                      {{-- <i class="fas fa-circle fa-2x text-blue"></i> --}}
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                      @php
                          $second_half = $item->quantity / 4;
                      @endphp
                      {{ $second_half }} {{ $item->quantity_type }}
                      <br>
                      {{-- <i class="fas fa-circle fa-2x text-purple"></i> --}}
                    </label>
                    
                  </div>
    
                  {{-- <h4 class="mt-3">Size <small>Please select one</small></h4>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                      <span class="text-xl">S</span>
                      <br>
                      Small
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                      <span class="text-xl">M</span>
                      <br>
                      Medium
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                      <span class="text-xl">L</span>
                      <br>
                      Large
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                      <span class="text-xl">XL</span>
                      <br>
                      Xtra-Large
                    </label>
                  </div> --}}
    
                  <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                      $ {{ $item->price }} per {{ $item->quantity_type }}
                    </h2>
                    <h4 class="mt-0">
                      @php
                          $totalPrice = $item->price * $item->quantity;
                      @endphp
                      <small>Total: ${{ $totalPrice }} </small>
                    </h4>
                  </div>
    
                  <div class="mt-4">
                    <div class="btn btn-primary">
                      <i class="fas fa-cart-plus fa-lg mr-2"></i>
                      <a href="{{ route('add_cart', ['id' => $item->id]) }}" class="text-white">
                        Add to Cart
                    </a>
                    </div>
                  </div>
    
                  {{-- <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                      <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                      <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                      <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                      <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                  </div> --}}
    
                </div>
              </div>
              <div class="row mt-4">
                <nav class="w-100">
                  <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                  </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{ $item->description }} </div>
                  <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> {{ $item->price }} </div>
                  <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    @endforeach
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
