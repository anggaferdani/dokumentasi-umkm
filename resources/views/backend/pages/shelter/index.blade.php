@extends('backend.templates.pages')
@section('title', 'Shelter')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Shelter
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('admin.shelter.create') }}" class="btn btn-primary">Create</a>
        <a href="{{ route('admin.shelter.index', array_merge(request()->query(), ['export' => 'excel'])) }}" class="btn btn-success">Excel</a>
        <a href="{{ route('admin.shelter.index', array_merge(request()->query(), ['export' => 'pdf'])) }}" class="btn btn-danger">PDF</a>
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
            <form action="{{ route('admin.shelter.index') }}" class="">
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
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                <button type="submit" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="{{ route('admin.shelter.index') }}" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-times"></i></a>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-vcenter card-table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Shelter</th>
                <th>Alamat</th>
                <th>Ditempati</th>
                <th>Kosong</th>
                <th>Ber SIP</th>
                <th>Selisih</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($shelters as $shelter)
                @php
                  $ditempatiPagi = 0;
                  $ditempatiMalam = 0;
                  $kosongPagi = $shelter->kapasitas;
                  $kosongMalam = $shelter->kapasitas;
                  $berSIPPagi = 0;
                  $berSIPMalam = 0;
          
                  foreach ($shelter->umkms as $umkm) {
                    if ($umkm->shift == 'pagi') {
                      $ditempatiPagi += 1;
                      $berSIPPagi += ($umkm->surat_ijin_penempatan === "ada") ? 1 : 0;
                      $kosongPagi -= 1;
                    } elseif ($umkm->shift == 'malam') {
                      $ditempatiMalam += 1;
                      $berSIPMalam += ($umkm->surat_ijin_penempatan === "ada") ? 1 : 0;
                      $kosongMalam -= 1;
                    } elseif ($umkm->shift == 'pagi malam') {
                      $ditempatiPagi += 1;
                      $ditempatiMalam += 1;
                      $berSIPPagi += ($umkm->surat_ijin_penempatan === "ada") ? 1 : 0;
                      $berSIPMalam += ($umkm->surat_ijin_penempatan === "ada") ? 1 : 0;
                      $kosongPagi -= 1;
                      $kosongMalam -= 1;
                    }
                  }
          
                  $selisihPagi = $ditempatiPagi - $berSIPPagi;
                  $selisihMalam = $ditempatiMalam - $berSIPMalam;
                @endphp
                <tr>
                  <td>{{ ($shelters->currentPage() - 1) * $shelters->perPage() + $loop->iteration }}</td>
                  <td>{{ $shelter->nama }}</td>
                  <td>{{ $shelter->alamat ?? '-' }}, {{ $shelter->subdistrict->district->name ?? '-' }}, {{ $shelter->subdistrict->name }}</td>
                  <td style="white-space: nowrap;">
                    <div>Pagi: {{ $ditempatiPagi }}</div>
                    <div>Malam: {{ $ditempatiMalam }}</div>
                  </td>
                  <td style="white-space: nowrap;">
                    <div>Pagi: {{ $kosongPagi }}</div>
                    <div>Malam: {{ $kosongMalam }}</div>
                  </td>
                  <td style="white-space: nowrap;">
                    <div>Pagi: {{ $berSIPPagi }}</div>
                    <div>Malam: {{ $berSIPMalam }}</div>
                  </td>
                  <td style="white-space: nowrap;">
                    <div>Pagi: {{ $selisihPagi }}</div>
                    <div>Malam: {{ $selisihMalam }}</div>
                  </td>
                  <td>{{ $shelter->kapasitas }}</td>
                  <td>
                    <div class="d-flex gap-1">
                      <a href="{{ route('admin.shelter.booth.index', ['shelterId' => $shelter->id]) }}" class="btn btn-primary">Booth</a>
                      <a href="{{ route('admin.shelter.edit', $shelter->id) }}" class="btn btn-icon btn-primary"><i class="fa-solid fa-pen"></i></a>
                      <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $shelter->id }}"><i class="fa-solid fa-trash"></i></button>
                    </div>
                  </td>
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

@foreach ($shelters as $shelter)
<div class="modal modal-blur fade" id="delete{{ $shelter->id }}" data-bs-backdrop="static" data-bs-backdrop="static" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-status bg-danger"></div>
      <form action="{{ route('admin.shelter.destroy', $shelter->id) }}" method="POST">
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