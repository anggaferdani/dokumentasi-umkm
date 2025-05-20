@extends('backend.templates.pages')
@section('title', 'Booth Shelter') {{-- More specific title --}}
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
  {{-- Statistics are now passed from the Controller --}}
  <div class="row">
    {{-- Use null coalesce operator for optional relationships and fields --}}
    {{-- Safely access nested relationships --}}
    <div>Alamat : {{ $shelter->alamat ?? '-' }}{{ $shelter->subdistrict ? ', ' . $shelter->subdistrict->name : '-' }}{{ $shelter->subdistrict && $shelter->subdistrict->district ? ', ' . $shelter->subdistrict->district->name : '-' }}</div>
    <div>Ditempati Pagi : {{ $ditempatiPagi }}/{{ $shelter->kapasitas }}</div>
    <div>Ditempati Malam: {{ $ditempatiMalam }}/{{ $shelter->kapasitas }}</div>
    <div>Kosong Pagi : {{ $kosongPagi }}/{{ $shelter->kapasitas }}</div>
    <div>Kosong Malam: {{ $kosongMalam }}/{{ $shelter->kapasitas }}</div>
    <div>Ber SIP Pagi : {{ $berSIPPagi }}</div>
    <div>Ber SIP Malam: {{ $berSIPMalam }}</div>
    <div>Kapasitas : {{ $shelter->kapasitas }}</div>
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
      {{-- Optional: Keep error display if there are other forms on the page --}}
      {{-- @if($errors->any())
        <div class="alert alert-danger alert-important">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif --}}
      <div class="card">
        <div class="card-header">
          <div class="ms-auto">
            {{-- Search form --}}
            {{-- Action route needs shelterId --}}
            <form action="{{ route('admin.shelter.booth.index', ['shelterId' => $shelter->id]) }}" method="GET" class="">
              <div class="d-flex gap-1">
                <input type="text" class="form-control" name="search" value="{{ $search ?? '' }}" placeholder="Search by Name or Booth">
                <button type="submit" class="btn btn-primary">Search</button>
                @if($search)
                    {{-- Use the current route name and shelterId for the reset link --}}
                    <a href="{{ route('admin.shelter.booth.index', ['shelterId' => $shelter->id]) }}" class="btn btn-secondary">Reset</a>
                @endif
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-vcenter card-table table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nomor Booth</th>
                <th>Shift</th>
              </tr>
            </thead>
            <tbody>
              {{-- Loop through the booth numbers provided by the paginator --}}
              {{-- $paginator->items() now contains the filtered booth numbers (e.g., [5, 6, 12] if capacity is 20 and searched for booths > 4) --}}
              @forelse ($paginator->items() as $boothNumber)
                <tr>
                  {{-- Calculate global row number based on current page and index in the paginated items --}}
                  {{-- $paginator->firstItem() gives the global index of the first item on the current page --}}
                  {{-- $loop->index is the 0-based index within the current page's items --}}
                  <td>{{ $paginator->firstItem() + $loop->index }}</td>
                  <td>Booth {{ $boothNumber }}</td>
                  <td>
                    {{-- Find UMKM for this specific booth number from the FULL list ($allUmkms) --}}
                    {{-- We use the full list here to ensure we find the UMKM even if the search didn't match their name, but the booth number is still displayed --}}
                    @php
                        $umkmForBooth = $allUmkms->where('nomor_booth', $boothNumber);

                        // Find the specific UMKM for each shift in this booth
                        $pagiUMKM = $umkmForBooth->first(function ($umkm) {
                            return str_contains($umkm->shift, 'pagi');
                        });
                         $malamUMKM = $umkmForBooth->first(function ($umkm) {
                            return str_contains($umkm->shift, 'malam');
                        });
                    @endphp

                    {{-- Display Pagi Shift UMKM --}}
                    <div>Pagi :
                        @if ($pagiUMKM)
                            {{-- Link to the modal using the found UMKM's ID --}}
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detail{{ $pagiUMKM->id }}" class="text-decoration-underline">{{ $pagiUMKM->nama }}</a>
                        @else
                            - {{-- Display '-' for empty slot --}}
                        @endif
                    </div>

                    {{-- Display Malam Shift UMKM --}}
                    <div>Malam :
                        @if ($malamUMKM)
                             {{-- Link to the modal using the found UMKM's ID --}}
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detail{{ $malamUMKM->id }}" class="text-decoration-underline">{{ $malamUMKM->nama }}</a>
                        @else
                            - {{-- Display '-' for empty slot --}}
                        @endif
                    </div>
                  </td>
                </tr>
              @empty
                 <tr>
                    {{-- Display message if the paginated list of booth numbers is empty --}}
                    <td colspan="3" class="text-center">No booths found matching your criteria.</td>
                 </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        {{-- Add pagination links --}}
        <div class="card-footer d-flex align-items-center">
            {{-- $paginator is now a LengthAwarePaginator of booth numbers --}}
            <p class="m-0 text-muted">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} booths</p>
            <ul class="pagination m-0 ms-auto">
                {{-- Append the current search query to pagination links --}}
                {{ $paginator->appends(['search' => $search])->links('pagination::bootstrap-4') }}
            </ul>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modals loop: Use the full list of UMKM ($allUmkms) --}}
{{-- This ensures modals for all UMKM in the shelter are available, regardless of pagination or search filtering of booth numbers --}}
@foreach ($allUmkms as $umkm)
<div class="modal modal-blur fade" id="detail{{ $umkm->id }}" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail : {{ $umkm->nama ?? '-' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center py-4">
        <div class="table-responsive">
          <table class="table table-vcenter text-start card-table table-striped">
            <tbody>
              <tr>
                <td>Shelter</td>
                {{-- Safely access shelter name via relationship --}}
                <td>Shelter {{ $umkm->shelter->nama ?? '-' }}</td>
              </tr>
              <tr>
                <td>Nomor Booth</td>
                <td>Booth {{ $umkm->nomor_booth ?? '-' }}</td>
              </tr>
              <tr>
                <td>Shift</td>
                <td>{{ $umkm->shift ?? '-' }}</td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>{{ $umkm->nama ?? '-' }}</td>
              </tr>
              <tr>
                <td>Produk</td>
                {{-- Assume $umkm->produk is a relationship or property indicating products exist --}}
                <td>@if($umkm->produk)<a href="{{ route('admin.umkm.produk', $umkm->id) }}" target="_blank" class="text-decoration-underline">Lebih Banyak</a>@else - @endif</td>
              </tr>
              <tr>
                <td>Tempat, Tanggal Lahir</td>
                {{-- Format date, handle potential null --}}
                <td>{{ $umkm->tempat_lahir ?? '-' }}, {{ $umkm->tanggal_lahir ? \Carbon\Carbon::parse($umkm->tanggal_lahir)->format('d F Y') : '-' }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{ $umkm->alamat ?? '-' }}</td>
              </tr>
              <tr>
                <td>SIP</td>
                <td>{{ $umkm->surat_ijin_penempatan ?? '-' }}</td>
              </tr>
              <tr>
                <td>Retribusi</td>
                <td>{{ $umkm->retribusi ?? '-' }}</td>
              </tr>
               <tr>
                <td>Kategori</td>
                 {{-- Safely access category name via relationship --}}
                <td>{{ $umkm->kategori->kategori ?? '-' }}</td>
              </tr>
              <tr>
                <td>Nomor SIP</td>
                <td>{{ $umkm->nomor_sip ?? '-' }}</td>
              </tr>
              <tr>
                <td>Valid SIP</td>
                <td>{{ $umkm->valid_sip ?? '-' }}</td>
              </tr>
              <tr>
                <td>Note</td>
                <td>{{ $umkm->note ?? '-' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection