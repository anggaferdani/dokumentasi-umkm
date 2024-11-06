@extends('backend.templates.pages')
@section('title', 'booth')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Booth Shelter : {{ $shelter->nama }}
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('admin.shelter.index') }}" class="btn btn-primary">Back</a>
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
            <form action="{{ route('admin.shelter.booth.index', ['shelterId' => $shelter->id]) }}" class="">
              <div class="d-flex gap-1">
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                <button type="submit" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="{{ route('admin.shelter.booth.index', ['shelterId' => $shelter->id]) }}" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-times"></i></a>
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
                <th>Nomor Booth</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($umkms as $umkm)
                <tr>
                  <td>{{ ($umkms->currentPage() - 1) * $umkms->perPage() + $loop->iteration }}</td>
                  <td>{{ $umkm->shelter->nama }}</td>
                  <td>{{ $umkm->nama ?? '-' }}</td>
                  <td>{{ $umkm->nomor_booth ?? '-' }}</td>
                  <td>
                    <div class="d-flex gap-1">
                      <a href="{{ route('admin.umkm.produk', $umkm->id) }}" class="btn btn-primary">Produk</a>
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
@endsection