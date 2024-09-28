<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ asset('easy-searchable-filterable-select-list-with-jquery/jquery.searchableSelect.css') }}" rel="stylesheet">
  <style>
    * {
      font-family: "Space Grotesk", sans-serif;
    }
    ::-webkit-resizer{
      display: none;
    }
    .slick-slide {
      padding: 0 20px;
    }
  </style>
</head>
<body>
  <div class="p-3 d-none d-md-block" style="background: #101526 !important;">
    <div class="container">
      <div class="d-flex">
        <div class="text-white me-5"><i class="fa-solid fa-phone text-white me-1"></i> (021) 566 - 4688</div>
        <div class="text-white"><i class="fa-solid fa-envelope text-white me-1"></i> dokumentasi@umkm.com</div>
        <div class="ms-auto"><a href="{{ route('logout') }}" class="text-white text-decoration-none">Logout</a></div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="">
        <img src="{{ asset('logo.png') }}" alt="" width="150" height="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav m-auto mb-md-0 mb-3 gap-0 gap-md-3">
          <li class="nav-item">
            <a class="nav-link text-dark {{ Route::is('index') ? 'fw-bold' : '' }}" href="{{ route('index') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark {{ Route::is('produk') ? 'fw-bold' : '' }}" href="{{ route('produk') }}">Produk</a>
          </li>
          @if(auth()->user()->role == 1)
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin.dashboard') }}">Dashboard</a>
          </li>
          @endif
        </ul>
        <form class="d-flex" role="search" action="{{ route('produk') }}">
          <input class="form-control border border-end-0 rounded-end-0 rounded-pill ps-3 pe-0" name="search" type="text" placeholder="Search" style="outline: none; box-shadow: none;" value="{{ request()->search }}">
          <button class="btn btn-icon border border-start-0 rounded-start-0 rounded-pill" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div>
    </div>
  </nav>
  @yield('content')
  <section class="py-0 py-md-5" style="background: #101526;">
    <div class="container py-3 py-md-5">
      <div class="row row-cols-4 justify-content-between">
        <div class="col-12 col-md-4">
          {{-- <div class="col-md-6 mb-3">
            <img src="{{ asset('logo-white.png') }}" class="img-fluid" alt="">
          </div> --}}
          <div class="text-white fs-3 fw-bold mb-3">Dinas Perdagangan Kota Surakarta</div>
          <div class="text-white lh-sm mb-3">Lorem ipsum dolor sit amet consectetur adipiscing elit tincidunt dictum dapibus elementum, commodo penatibus augue proin duis dis porta etiam diam. Dui condimentum lobortis sagittis tempus bibendum, a litora cum ornare, auctor aliquet eu lacus. Suscipit donec nullam luctus per rhoncus bibendum iaculis, curae ac felis nulla cubilia.</div>
        </div>
        <div class="col-12 col-md-auto">
          <div class="text-white fw-medium fs-3 mb-3 mt-3">Menu</div>
          <div class="text-white mb-3"><a href="{{ route('index') }}" class="text-white text-decoration-none">Beranda</a></div>
          <div class="text-white mb-3"><a href="{{ route('produk') }}" class="text-white text-decoration-none">Produk</a></div>
          <div class="text-white mb-3"><a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none">Dashboard</a></div>
        </div>
        <div class="col-12 col-md-3">
          <div class="text-white fw-medium fs-3 mb-3 mt-3">Address & Contact</div>
          <div class="d-flex mb-3">
            <i class="fa-solid fa-location-dot fs-4 text-white me-3"></i>
            <div class="text-white">Lorem ipsum dolor sit amet consectetur adipiscing elit tincidunt dictum dapibus elementum, commodo penatibus augue proin duis dis porta etiam diam.</div>
          </div>
          <div class="d-flex mb-3">
            <i class="fa-solid fa-envelope fs-4 text-white me-3"></i>
            <div class="text-white">dokumentasi@umkm.com</div>
          </div>
          <div class="d-flex mb-3">
            <i class="fa-solid fa-phone fs-4 text-white me-3"></i>
            <div class="d-block">
              <div class="text-white">(021) 566 - 4688</div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-auto">
          <div class="text-white fw-medium fs-3 mb-3 mt-3">Social Network</div>
          <div class="d-flex justify-content-between">
            <a href=""><i class="fa-brands fa-x-twitter fs-4 text-white"></i></a>
            <a href=""><i class="fa-brands fa-instagram fs-4 text-white"></i></a>
            <a href=""><i class="fa-brands fa-facebook fs-4 text-white"></i></a>
            <a href=""><i class="fa-brands fa-youtube fs-4 text-white"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="{{ asset('easy-searchable-filterable-select-list-with-jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ asset('easy-searchable-filterable-select-list-with-jquery/jquery.searchableSelect.js') }}"></script>
  <script>
    $(document).ready(function() {
        $('.select').searchableSelect();
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
      $('form').on('submit', function() {
        $.LoadingOverlay("show");
    
        setTimeout(function(){
            $.LoadingOverlay("hide");
        }, 100000);
      });
    });
  </script>
</body>
</html>