@extends('frontend.templates.pages')
@section('title', 'Produk')
@section('content')
<div class="container pt-5">
  <div class="text-center fs-2 mb-2 mb-md-3 fw-medium">Pencarian Produk UMKM</div>
  <div class="m-auto col-3 col-md-1 border border-warning border-bottom"></div>
</div>
<section class="py-0 py-md-5">
  <div class="container">
    <div class="row mb-3">
      <form action="{{ route('produk') }}" class="">
        <div class="d-flex gap-1">
          <select class="form-select" name="shelter">
            <option disabled selected value="">Shelter</option>
            <option value="">Semua</option>
            @foreach($shelters as $shelter)
                <option value="{{ $shelter->id }}" {{ request('shelter') == $shelter->id ? 'selected' : '' }}>
                    {{ $shelter->nama }}
                </option>
            @endforeach
          </select>
          <select class="form-select" name="umkm">
            <option disabled selected value="">UMKM</option>
            <option value="">Semua</option>
            @foreach($umkms as $umkm)
                <option value="{{ $umkm->id }}" {{ request('umkm') == $umkm->id ? 'selected' : '' }}>
                    {{ $umkm->nama }}
                </option>
            @endforeach
          </select>
          <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
          <button type="submit" class="btn btn-icon btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
          <a href="{{ route('produk') }}" class="btn btn-icon btn-danger"><i class="fa-solid fa-times"></i></a>
        </div>
      </form>
    </div>
    <div class="mb-3">
      @foreach($produks as $produk)
        <div class="row g-3 mb-3">
          <div class="col-md-3">
            @if($produk->foto_produk)
                <img src="/images/produk/foto-produk/{{ $produk->foto_produk }}" alt="" class="img-fluid w-100 rounded">
            @else
                <img src="{{ asset('no-image-available.png') }}" alt="" class="img-fluid w-100 rounded">
            @endif
          </div>
          <div class="col-md-9">
            <div>Nama Produk : {{ $produk->nama_produk ?? '-' }}</div>
            <div>Deksripsi : {{ $produk->deskripsi_produk ?? '-' }}</div>
            <div>Shelter : {{ $produk->umkm->booth->shelter->nama ?? '-' }}</div>
            <div>Nomor Shelter : {{ $produk->umkm->booth->nomor_booth ?? '-' }}</div>
            <div>Nama UMKM : {{ $produk->umkm->nama ?? '-' }}</div>
            <div>Kategori : {{ $produk->umkm->kategori->kategori ?? '-' }}</div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="d-flex align-items-center">
      <ul class="pagination m-auto">
        @if($produks->hasPages())
          {{ $produks->appends(request()->query())->links('pagination::bootstrap-4') }}
        @else
          <li class="page-item">No more records</li>
        @endif
      </ul>
    </div>
  </div>
</section>
@endsection