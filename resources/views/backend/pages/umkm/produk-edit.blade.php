@extends('backend.templates.pages')
@section('title', "Edit Produk ID $produk->id")
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Edit Produk ID {{ $produk->id }}
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('admin.umkm.produk', $umkm->id) }}" class="btn btn-secondary">Back</a>
      </div>
    </div>
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
      @if($errors->any())
        <div class="alert alert-danger alert-important">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Edit</h4>
        </div>
        <form action="{{ route('admin.umkm.produk.update', ['id' => $umkm->id, 'produk_id' => $produk->id]) }}" method="POST" class="" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label required">Nama Produk</label>
              <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" value="{{ $produk->nama_produk }}">
              @error('nama_produk')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Foto Produk</label>
              <input type="file" class="form-control image" name="foto_produk" placeholder="Foto Produk" value="{{ $produk->foto_produk }}" accept=".png,.jpg,.jpeg">
              <div class="text-secondary small">Maksimal ukuran file adalah 150KB dan hanya boleh berupa file dengan format PNG, JPG, atau JPEG.</div>
              @error('foto_produk')<div class="text-danger">{{ $message }}</div>@enderror
              <div class="col-12 col-md-4 mt-2">
                @if($produk->foto_produk)
                  <a href="/images/produk/foto-produk/{{ $produk->foto_produk }}" target="_blank"><img src="/images/produk/foto-produk/{{ $produk->foto_produk }}" class="img-fluid w-100 rounded"></a>
                @else
                    <img src="{{ asset('no-image-available.png') }}" alt="" class="img-fluid w-100 rounded">
                @endif
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label required">Deskripsi Produk</label>
              <textarea class="form-control" name="deskripsi_produk" rows="3" placeholder="Deskripsi Produk">{{ $produk->deskripsi_produk }}</textarea>
              @error('deskripsi_produk')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a href="{{ route('admin.umkm.produk', $umkm->id) }}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary ms-auto">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection