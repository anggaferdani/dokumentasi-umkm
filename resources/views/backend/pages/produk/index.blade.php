@extends('backend.templates.pages')
@section('title', 'UMKM')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        UMKM
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#createModal">Create new report</a>
        <a href="{{ route('admin.produk.index', array_merge(request()->query(), ['export' => 'excel'])) }}" class="btn btn-success">Excel</a>
        <a href="{{ route('admin.produk.index', array_merge(request()->query(), ['export' => 'pdf'])) }}" class="btn btn-danger">PDF</a>
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
      <div class="card">
        <div class="card-header">
          <div class="ms-auto">
            <form action="{{ route('admin.produk.index') }}" class="">
              <div class="d-flex gap-1">
                <select class="form-select" name="wilayah">
                  <option disabled selected value="">Wilayah</option>
                  <option value="">Semua</option>
                  @foreach($wilayahs as $wilayah)
                      <option value="{{ $wilayah->id }}" {{ request('wilayah') == $wilayah->id ? 'selected' : '' }}>
                          {{ $wilayah->nama }}
                      </option>
                  @endforeach
                </select>
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
                <button type="submit" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-times"></i></a>
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
                <th>Kategori</th>
                <th>Foto Produk</th>
                <th>Nama Produk</th>
                <th>Deskripsi Produk</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($produks as $produk)
                <tr>
                  <td>{{ ($produks->currentPage() - 1) * $produks->perPage() + $loop->iteration }}</td>
                  <td>{{ $produk->umkm->shelter->nama }}</td>
                  <td>{{ $produk->umkm->nama }}</td>
                  <td>{{ $produk->kategori->kategori }}</td>
                  <td>
                    @if($produk->foto_produk)
                        <img src="/images/produk/foto-produk/{{ $produk->foto_produk }}" alt="" class="img-fluid" width="100">
                    @else
                        <img src="{{ asset('no-image-available.png') }}" alt="" class="img-fluid" width="100">
                    @endif
                  </td>
                  <td>{{ $produk->nama_produk ?? '-' }}</td>
                  <td>{{ $produk->deskripsi_produk }}</td>
                  <td>
                    <div class="d-flex gap-1">
                      <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $produk->id }}"><i class="fa-solid fa-pen"></i></button>
                      <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $produk->id }}"><i class="fa-solid fa-trash"></i></button>
                    </div>
                  </td>
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

<div class="modal modal-blur fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.produk.store') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Create</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">UMKM</label>
            <select class="form-select" name="umkm_id">
              <option disabled selected value="">Pilih</option>
              @foreach($umkms as $umkm)
                  <option value="{{ $umkm->id }}">{{ $umkm->nama }}</option>
              @endforeach
            </select>
            @error('umkm_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk">
            @error('nama_produk')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Foto Produk</label>
            <input type="file" class="form-control" name="foto_produk" placeholder="Foto Produk">
            @error('foto_produk')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Deskripsi Produk</label>
            <textarea class="form-control" name="deskripsi_produk" rows="3" placeholder="Deskripsi Produk"></textarea>
            @error('deskripsi_produk')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Kategori</label>
            <select class="form-select" name="kategori_id">
              <option disabled selected value="">Pilih</option>
              @foreach($kategoris as $kategori)
                  <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
              @endforeach
            </select>
            @error('kategori_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach ($produks as $produk)
<div class="modal modal-blur fade" id="edit{{ $produk->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">UMKM</label>
            <select class="form-select" name="umkm_id">
              <option disabled selected value="">Pilih</option>
              @foreach($umkms as $umkm)
                <option value="{{ $umkm->id }}" @if($produk->umkm_id == $umkm->id) @selected(true) @endif>{{ $umkm->nama }}</option>
              @endforeach
            </select>
            @error('umkm_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" value="{{ $produk->nama_produk }}">
            @error('nama_produk')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Foto Produk</label>
            <input type="file" class="form-control" name="foto_produk" placeholder="Foto Produk" value="{{ $produk->foto_produk }}">
            <div><a href="/images/produk/foto-produk/{{ $produk->foto_produk }}" target="_blank">{{ $produk->foto_produk }}</a></div>
            @error('foto_produk')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Deskripsi Produk</label>
            <textarea class="form-control" name="deskripsi_produk" rows="3" placeholder="Deskripsi Produk">{{ $produk->deskripsi_produk }}</textarea>
            @error('deskripsi_produk')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Kategori</label>
            <select class="form-select" name="kategori_id">
              <option disabled selected value="">Pilih</option>
              @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" @if($produk->kategori_id == $kategori->id) @selected(true) @endif>{{ $kategori->kategori }}</option>
              @endforeach
            </select>
            @error('kategori_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
          </a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@foreach ($produks as $produk)
<div class="modal modal-blur fade" id="delete{{ $produk->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-status bg-danger"></div>
      <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST">
        @csrf
        @method('Delete')
        <div class="modal-body text-center py-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
          <h3>Are you sure?</h3>
          <div class="text-secondary">Are you sure you want to delete this? This action cannot be undone.</div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">Cancel</a></div>
              <div class="col"><button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">Delete</button></div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endsection