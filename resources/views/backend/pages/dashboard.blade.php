@extends('backend.templates.pages')
@section('title', 'Dashboard')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Dashboard
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="container-xl">
  <div class="row row-cards">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="subheader">Total Shelter</div>
          <div class="h3 m-0">{{ $totalShelter }} Shelter</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="subheader">Total UMKM Ber SIP</div>
          <div class="h3 m-0">{{ $totalUMKMBerSIP }} UMKM</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="subheader">Total UMKM Tidak Ber SIP</div>
          <div class="h3 m-0">{{ $totalUMKMTidakBerSIP }} UMKM</div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-primary text-white avatar">
                <i class="fa-solid fa-store"></i>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Total UMKM
              </div>
              <div class="text-secondary">
                {{ $totalUMKM }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-success text-white avatar">
                <i class="fa-solid fa-store"></i>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Total UMKM Aktif
              </div>
              <div class="text-secondary">
                {{ $totalUMKMAktif }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-danger text-white avatar">
                <i class="fa-solid fa-store-slash"></i>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Total UMKM Tidak Aktif
              </div>
              <div class="text-secondary">
                {{ $totalUMKMTidakAktif }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
      <div class="card card-sm">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-auto">
              <span class="bg-info text-white avatar">
                <i class="fa-solid fa-folder-open"></i>
              </span>
            </div>
            <div class="col">
              <div class="font-weight-medium">
                Total UMKM Ber Note
              </div>
              <div class="text-secondary">
                {{ $totalUMKMBerNote }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">UMKM</h3>
        </div>
        <table class="table card-table table-vcenter">
          <thead>
            <tr>
              <th>Keterangan</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>UMKM Ber Retribusi Lancar</td>
              <td>{{ $totalUMKMBerRetribusiLancar }}</td>
            </tr>
            <tr>
              <td>UMKM Ber Retribusi Tidak Lancar</td>
              <td>{{ $totalUMKMBerRetribusiTidakLancar }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6 col-lg-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Shelter</h3>
        </div>
        <div class="table-responsive">
          <table class="table table-vcenter card-table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Shelter</th>
                <th>Ditempati</th>
                <th>Kosong</th>
                <th>Total</th>
                <th>Ber SIP</th>
                <th>Selisih</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($shelters as $shelter)
              @php
                $ditempati = $shelter->umkms->count();
                $kosong = $shelter->kapasitas - $ditempati;
                $berSIP = $shelter->umkms->filter(function ($umkm) {
                  return $umkm->surat_ijin_penempatan === "ada";
                })->count();
              @endphp
                <tr>
                  <td>{{ ($shelters->currentPage() - 1) * $shelters->perPage() + $loop->iteration }}</td>
                  <td>{{ $shelter->nama }}</td>
                  <td>{{ $ditempati }}</td>
                  <td>{{ $kosong }}</td>
                  <td>{{ $shelter->kapasitas }}</td>
                  <td>{{ $berSIP }}</td>
                  <td>{{ $ditempati - $berSIP }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          <ul class="pagination m-0 ms-auto">
            @if($shelters->hasPages())
              {{ $shelters->appends(request()->query())->links('pagination::bootstrap-4') }}
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