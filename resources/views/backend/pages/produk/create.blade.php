@extends('backend.templates.pages')
@section('title', 'Create Produk')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Create Produk
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Back</a>
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
          <h4 class="card-title">Create</h4>
        </div>
        <form action="{{ route('admin.produk.store') }}" method="POST" class="" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label required">UMKM</label>
              <select class="form-select" name="umkm_id">
                <option disabled selected value="">Pilih</option>
                @foreach($umkms as $umkm)
                    <option value="{{ $umkm->id }}" {{ old('umkm_id') == $umkm->id ? 'selected' : '' }}>
                      {{ $umkm->nama }}
                    </option>
                @endforeach
              </select>
              @error('umkm_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Nama Produk</label>
              <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" value="{{ old('nama_produk') }}">
              @error('nama_produk')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Foto Produk</label>
              <input type="file" class="form-control image" name="foto_produk" placeholder="Foto Produk" accept=".png,.jpg,.jpeg">
              <div class="text-secondary small">Maksimal ukuran file adalah 150KB dan hanya boleh berupa file dengan format PNG, JPG, atau JPEG.</div>
              @error('foto_produk')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Deskripsi Produk</label>
              <textarea class="form-control" name="deskripsi_produk" rows="3" placeholder="Deskripsi Produk">{{ old('deskripsi_produk') }}</textarea>
              @error('deskripsi_produk')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary ms-auto">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection