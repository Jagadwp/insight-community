<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        @if (Auth::check())
          <a href="/home" class="nav-link">Logout</a>
        @else
          <div> </div>
        @endif
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/main" class="nav-link">Artikel</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Profile links -->
    <div class="profile-box ml-auto mr-2">
      @if (Auth::check())
        <a href="/profile" class="btn btn-primary nav-link">Profil</a>
      @else
        <a href="/profile" class="btn btn-primary nav-link">Login</a>
      @endif
    </div>
  </nav>