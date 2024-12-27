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
        <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary">Create</a>
        <a href="{{ route('admin.umkm.index', array_merge(request()->query(), ['export' => 'excel'])) }}" class="btn btn-success">Excel</a>
        <a href="{{ route('admin.umkm.index', array_merge(request()->query(), ['export' => 'pdf'])) }}" class="btn btn-danger">PDF</a>
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
      @if(Session::get('errror'))
        <div class="alert alert-important alert-danger" role="alert">
          {{ Session::get('errror') }}
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
          <div class="ms-auto">
            <form action="{{ route('admin.umkm.index') }}" class="">
              <div class="d-flex gap-1">
                {{-- <select class="form-select" name="wilayah">
                  <option disabled selected value="">Wilayah</option>
                  <option value="">Semua</option>
                  @foreach($wilayahs as $wilayah)
                      <option value="{{ $wilayah->id }}" {{ request('wilayah') == $wilayah->id ? 'selected' : '' }}>
                          {{ $wilayah->nama }}
                      </option>
                  @endforeach
                </select> --}}
                <select class="form-select" name="shelter">
                  <option disabled selected value="">Shelter</option>
                  <option value="">Semua</option>
                  @foreach($shelters as $shelter)
                      <option value="{{ $shelter->id }}" {{ request('shelter') == $shelter->id ? 'selected' : '' }}>
                          {{ $shelter->nama }}
                      </option>
                  @endforeach
                </select>
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                <button type="submit" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-times"></i></a>
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
                <th>Nomor Booth</th>
                <th>Nama</th>
                <th>Shift</th>
                <th>Jenis Dagangan</th>
                <th>Status</th>
                <th>Action</th>
                <th>Note</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($umkms as $umkm)
                <tr>
                  <td>{{ ($umkms->currentPage() - 1) * $umkms->perPage() + $loop->iteration }}</td>
                  <td>{{ $umkm->shelter->nama ?? '-' }}</td>
                  <td>{{ $umkm->nomor_booth ?? '-' }}</td>
                  <td>{{ $umkm->nama }}</td>
                  <td>{{ $umkm->shift }}</td>
                  <td>{{ $umkm->jenis_dagangan }}</td>
                  <td>{{ $umkm->note ?? '-' }}</td>
                  <td>
                    @if($umkm->aktif == true)
                      <span class="badge bg-primary text-white">Aktif</span>
                    @else
                      <span class="badge bg-danger text-white">Non Aktif</span>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex gap-1">
                      <a href="{{ route('admin.umkm.produk', $umkm->id) }}" class="btn btn-primary">Produk</a>
                      <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="btn btn-icon btn-primary"><i class="fa-solid fa-pen"></i></a>
                      <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $umkm->id }}"><i class="fa-solid fa-trash"></i></button>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          <ul class="pagination m-0 ms-auto">
            @if($umkms->hasPages())
              {{ $umkms->appends(request()->query())->links('pagination::bootstrap-4') }}
            @else
              <li class="page-item">No more records</li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@foreach ($umkms as $umkm)
<div class="modal modal-blur fade" id="delete{{ $umkm->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-status bg-danger"></div>
      <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST">
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