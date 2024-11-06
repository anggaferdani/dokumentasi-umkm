@extends('backend.templates.pages')
@section('title', 'UMKM')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Produk UMKM : {{ $umkm->nama }}
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('admin.umkm.index') }}" class="btn btn-primary">Back</a>
        <a href="{{ route('admin.umkm.produk', array_merge(request()->query(), ['export' => 'excel', 'id' => $umkm->id])) }}" class="btn btn-success">Excel</a>
        <a href="{{ route('admin.umkm.produk', array_merge(request()->query(), ['export' => 'pdf', 'id' => $umkm->id])) }}" class="btn btn-danger">PDF</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div>Shelter : {{ $umkm->shelter->nama }}</div>
    <div>UMKM : {{ $umkm->nama }}</div>
    <div>Nomor Booth : {{ $umkm->nomor_booth }}</div>
    <div>Kategori : {{ $umkm->kategori->kategori }}</div>
  </div>
</div>
@endsection
@section('content')
<div class="container-xl">
  <div class="row">
    <div class="col-12">
      @if(Session::get('success'))
        <div class="alert alert-important alert-success" role="alert">
          {{ Session::get('success') }}
        </div>
      @endif
      @if(Session::get('error'))
        <div class="alert alert-important alert-danger" role="alert">
          {{ Session::get('error') }}
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <div class="ms-auto">
            <form action="{{ route('admin.umkm.produk', $umkm->id) }}" class="">
              <div class="d-flex gap-1">
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                <button type="submit" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="{{ route('admin.umkm.produk', $umkm->id) }}" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-times"></i></a>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-vcenter card-table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Shelter</th>
                <th>UMKM</th>
                <th>No Booth</th>
                <th>Foto Produk</th>
                <th>Nama Produk</th>
                <th>Deskripsi Produk</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($produks as $produk)
                <tr>
                  <td>{{ ($produks->currentPage() - 1) * $produks->perPage() + $loop->iteration }}</td>
                  <td>{{ $produk->umkm->shelter->nama }}</td>
                  <td>{{ $produk->umkm->nama }}</td>
                  <td>{{ $produk->umkm->nomor_booth }}</td>
                  <td>
                    @if($produk->foto_produk)
                        <img src="/images/produk/foto-produk/{{ $produk->foto_produk }}" alt="" class="img-fluid" width="100">
                    @else
                        <img src="{{ asset('no-image-available.png') }}" alt="" class="img-fluid" width="100">
                    @endif
                  </td>
                  <td>{{ $produk->nama_produk ?? '-' }}</td>
                  <td>{{ $produk->deskripsi_produk }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          <ul class="pagination m-0 ms-auto">
            @if($produks->hasPages())
              {{ $produks->appends(request()->query())->links('pagination::bootstrap-4') }}
            @else
              <li class="page-item">No more records</li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection