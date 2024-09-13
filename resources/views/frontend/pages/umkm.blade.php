@extends('frontend.templates.pages')
@section('title', 'UMKM')
@section('content')
<div id="home" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0,0,0,0)), url('{{ asset('banner.jpg') }}'); background-size: cover; background-position: center; height: 89vh;">
  <div class="container" style="height: 100%;">
    <div class="row align-items-center" style="height: 100%;">
      <div class="col col-md-6">
        <div class="display-5 fw-medium text-white mb-3">CONNECT YOUR BUSINESS TO A WORLD OF POSSIBILITIES</div>
        <div class="col-3 border border-white border-bottom mb-3"></div>
        <div class="text-white fs-5">Lorem ipsum dolor sit amet consectetur. Sed dignissim lorem auctor quis.</div>
      </div>
    </div>
  </div>
</div>
<section class="py-0 py-md-5">
  <div class="container py-5">
    <div class="text-center fs-2 fw-medium mb-2 mb-md-3">Nikmati Beragam Kelebihan Berbelanja</div>
    <div class="m-auto col-3 col-md-1 border border-warning border-bottom mb-5"></div>
    <div class="row g-3">
      <div class="col-12 col-md-3">
        <div class="card border-0">
          <div class="col-6 m-auto"><img src="{{ asset('images/3d-fluency-shop.png') }}" alt="" class="img-fluid"></div>
          <div class="text-center">
            <div class="fw-medium fs-5 mb-2">Sentra UMKM</div>
            <div class="text-muted lh-sm mb-md-4">Semua tentang produk unggulan khas lokal kota surakarta ada di UMKM Kita</div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="card border-0">
          <div class="col-6 m-auto"><img src="{{ asset('images/3d-fluency-stack-of-coins.png') }}" alt="" class="img-fluid"></div>
          <div class="text-center">
            <div class="fw-medium fs-5 mb-2">Harga Bersaing</div>
            <div class="text-muted lh-sm mb-md-4">Produk unggulan di UMKM kita memiliki harga terjangkau karena langsung dari pelaku usaha</div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="card border-0">
          <div class="col-6 m-auto"><img src="{{ asset('images/3d-fluency-new-product.png') }}" alt="" class="img-fluid"></div>
          <div class="text-center">
            <div class="fw-medium fs-5 mb-2">Produk Unggulan</div>
            <div class="text-muted lh-sm mb-md-4">UMKM kita menyediakan produk unggulan khas kearifan lokal kota surakarta</div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="card border-0">
          <div class="col-6 m-auto"><img src="{{ asset('images/3d-fluency-conference.png') }}" alt="" class="img-fluid"></div>
          <div class="text-center">
            <div class="fw-medium fs-5 mb-2">Dukungan Pemerintah</div>
            <div class="text-muted lh-sm mb-md-4">Inovasi ini sebagai wujud dukungan pemerintah</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="py-0">
  <div id="about-us" class="container py-5">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="p-0 p-md-3">
          <img src="{{ asset('about-us.png') }}" class="img-fluid" alt="">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="fs-2 fw-medium mt-0 mt-md-5 mb-3">About Us</div>
        <div class="col-3 border border-warning border-bottom mb-4"></div>
        <div class="fs-5 lh-sm">Lorem ipsum dolor sit amet consectetur adipiscing elit tincidunt dictum dapibus elementum, commodo penatibus augue proin duis dis porta etiam diam. Dui condimentum lobortis sagittis tempus bibendum, a litora cum ornare, auctor aliquet eu lacus. Suscipit donec nullam luctus per rhoncus bibendum iaculis, curae ac felis nulla cubilia.</div>
      </div>
    </div>
  </div>
</section>
@endsection