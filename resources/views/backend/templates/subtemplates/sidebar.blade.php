<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark">
      <a href="">
        <img src="{{ asset('logo.png') }}" width="150" height="" alt="" class="img-fluid">
      </a>
    </h1>
    <div class="navbar-nav flex-row d-lg-none">
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
          <span class="avatar avatar-sm">{{ substr(auth()->user()->email, 0, 1) }}</span>
          <div class="d-none d-xl-block ps-2">
            <div>{{ auth()->user()->email }}</div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="sidebar-menu">
      <ul class="navbar-nav pt-lg-3">
        <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}"><a class="nav-link {{ Route::is('admin.dashboard') ? 'fw-bold' : '' }}" href="{{ route('admin.dashboard') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-house"></i></span><span class="nav-link-title">Dashboard</span></a></li>
        <li class="nav-item {{ Route::is('index') ? 'active' : '' }}"><a class="nav-link {{ Route::is('index') ? 'fw-bold' : '' }}" href="{{ route('index') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-magnifying-glass"></i></span><span class="nav-link-title">Dokumentasi UMKM</span></a></li>
        <li class="nav-item {{ Route::is('admin.user.*') ? 'active' : '' }}"><a class="nav-link {{ Route::is('admin.user.*') ? 'fw-bold' : '' }}" href="{{ route('admin.user.index') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-user"></i></span><span class="nav-link-title">User</span></a></li>
        <li class="nav-item {{ Route::is('admin.kategori.*') ? 'active' : '' }}"><a class="nav-link {{ Route::is('admin.kategori.*') ? 'fw-bold' : '' }}" href="{{ route('admin.kategori.index') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-tag"></i></span><span class="nav-link-title">Kategori</span></a></li>
        <li class="nav-item {{ Route::is('admin.wilayah.*') ? 'active' : '' }}"><a class="nav-link {{ Route::is('admin.wilayah.*') ? 'fw-bold' : '' }}" href="{{ route('admin.wilayah.index') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-location-dot"></i></span><span class="nav-link-title">Wilayah</span></a></li>
        <li class="nav-item {{ Route::is('admin.shelter.*') ? 'active' : '' }}"><a class="nav-link {{ Route::is('admin.shelter.*') ? 'fw-bold' : '' }}" href="{{ route('admin.shelter.index') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-layer-group"></i></span><span class="nav-link-title">Shelter</span></a></li>
        <li class="nav-item {{ Route::is('admin.booth.*') ? 'active' : '' }}"><a class="nav-link {{ Route::is('admin.booth.*') ? 'fw-bold' : '' }}" href="{{ route('admin.booth.index') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-store"></i></span><span class="nav-link-title">Booth</span></a></li>
        <li class="nav-item {{ Route::is('admin.produk.*') ? 'active' : '' }}"><a class="nav-link {{ Route::is('admin.produk.*') ? 'fw-bold' : '' }}" href="{{ route('admin.produk.index') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-box-open"></i></span><span class="nav-link-title">Produk</span></a></li>
      </ul>
    </div>
  </div>
</aside>