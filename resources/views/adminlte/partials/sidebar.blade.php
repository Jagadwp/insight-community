<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('/adminlte/dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light ml-1">Insight Komunitas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @if (Auth::check() && Auth::user()->profile()->exists())
          <div class="image">
            <img src="{{  asset('/storage' . Auth::user()->profile->foto) }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        @else
          <div class="image">
            <img src="{{ asset('/adminlte/dist/img/AdminLTELogo.png') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <p class="text-muted text-center">------</p>
          </div>
        @endif
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/profile" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p> Profil <span class="right badge badge-info">Periksa</span></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/main" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Artikel <span class="right badge badge-danger">Baru</span> </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>