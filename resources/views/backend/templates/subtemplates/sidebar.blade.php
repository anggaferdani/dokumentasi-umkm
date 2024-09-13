<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark">
      <a href="">
        {{-- <img src="{{ asset('logo.png') }}" width="150" height="" alt="" class="img-fluid"> --}}
        Dokumentasi UMKM
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
        <li class="nav-item {{ Route::is('admin.kategori.*') ? 'active' : '' }}"><a class="nav-link {{ Route::is('admin.kategori.*') ? 'fw-bold' : '' }}" href="{{ route('admin.kategori.index') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-tag"></i></span><span class="nav-link-title">Kategori</span></a></li>
        <li class="nav-item {{ Route::is('admin.umkm.*') ? 'active' : '' }}"><a class="nav-link {{ Route::is('admin.umkm.*') ? 'fw-bold' : '' }}" href="{{ route('admin.umkm.index') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-pen"></i></span><span class="nav-link-title">UMKM</span></a></li>
        <li class="nav-item {{ Route::is('umkm') ? 'active' : '' }}"><a class="nav-link {{ Route::is('umkm') ? 'fw-bold' : '' }}" href="{{ route('umkm') }}" ><span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa-solid fa-magnifying-glass"></i></span><span class="nav-link-title">Dokumentasi UMKM</span></a></li>
      </ul>
    </div>
  </div>
</aside>