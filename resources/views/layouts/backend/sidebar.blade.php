 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/backend_dashboard')}}" class="nav-link">Halo Selamat Datang Kembali</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" href="#" role="button" 
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
         Keluar <i class="fa fa-sign-out"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{url('/backend_dashboard')}}" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/backend_user_list')}}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/backend_user_message')}}" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                User Message
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/backend_book_category')}}" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Book Catgeory
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/backend_book_list')}}" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Book List
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/backend_book_order')}}" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Book Order
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>