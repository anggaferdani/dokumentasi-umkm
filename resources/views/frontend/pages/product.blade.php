@extends('frontend.templates.pages')
@section('title', 'UMKM')
@section('content')
<div class="container py-5">
  <div class="text-center fs-2 mb-2 mb-md-3 fw-medium">Pencarian produk UMKM</div>
  <div class="m-auto col-3 col-md-1 border border-warning border-bottom"></div>
</div>
<section class="py-0 py-md-5">
  <div class="container">
    <div class="mb-3">
      @foreach($umkms as $umkm)
        <div class="row g-3 mb-3">
          <div class="col-md-3">
            @if($umkm->foto_produk)
                <img src="/images/umkm/foto-produk/{{ $umkm->foto_produk }}" alt="" class="img-fluid w-100 rounded">
            @else
                <img src="{{ asset('no-image-available.png') }}" alt="" class="img-fluid w-100 rounded">
            @endif
          </div>
          <div class="col-md-9">
            <div>Nama : {{ $umkm->nama }}</div>
            <div>Nama Produk : {{ $umkm->nama_produk ?? '-' }}</div>
            <div>Kategori : {{ $umkm->kategori->kategori }}</div>
            <div>Tempat Usaha : {{ $umkm->tempat_usaha }}</div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="d-flex align-items-center">
      <ul class="pagination m-auto">
        @if($umkms->hasPages())
          {{ $umkms->appends(request()->query())->links('pagination::bootstrap-4') }}
        @else
          <li class="page-item">No more records</li>
        @endif
      </ul>
    </div>
  </div>
</section>
@endsection