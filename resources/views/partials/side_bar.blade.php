<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: green">
    <!-- Brand Logo -->
        <a href="/" target="_blank" class="social-icon brand-link" style="font-size: x-large; color:white"><i class="fas fa-leaf fa-2x" style="font-size: xx-large;color: white"></i>ChainHarvest</a>      


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
            
            <p class="text " style="text-align: center;text-transform: uppercase;color:lightyellow">
                Welcome <b>{{ session('fullname') }} </b>
            </p>
            <p class="text " style="text-align: center;text-transform: uppercase;color:lightyellow">
              <b>{{ session('usertype') }} </b>
          </p>
          <p class="text " style="text-align: center;text-transform: uppercase;color:lightyellow">
            <b>Balance : {{ session('balance') }} $ </b>
        </p>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
          <li class="nav-item" >
            <a href="/dashboard" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(session('usertype') == "consumer")
            <li class="nav-item">
              <a href="/recharge_balance_view" class="nav-link" style="color:white">
                <i class="nav-icon fas fa-money-bill-wave"></i> <!-- Money icon -->
                <p>Recharge Balance</p>
              </a>
            </li>
          @endif

          @if(session('usertype') == "logistic_company")
          <li class="nav-item">
            <a href="/view_investigation" class="nav-link" style="color:white">
                <i class="nav-icon fas fa-box"></i>
                <p><i class="fas fa-investigation"></i> Investigation</p>
            </a>
        </li>
          @endif
          @if(session('usertype') == "farmer")
          
          <li class="nav-item">
            <a href="/crops" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-box"></i>
              <p>My Crops</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/crop_timeline" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>Crop Timeline</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/private_key_generate" class="nav-link" style="color:white">
                <i class="nav-icon fas fa-key"></i>
                <p>Private Key Generate</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="/tokenization" class="nav-link" style="color:white">
                <i class="nav-icon fas fa-shield-alt"></i>
                <p>Tokenization</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="/store_crop" class="nav-link" style="color:white">
                <i class="nav-icon fas fa-store"></i>
                <p>Store Crop</p>
            </a>
          </li>
          
            @endif
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>