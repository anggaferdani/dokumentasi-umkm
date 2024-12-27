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
  <div class="row">
    <div>Alamat : {{ $shelter->alamat ?? '-' }}, {{ $shelter->subdistrict->district->name ?? '-' }}, {{ $shelter->subdistrict->name }}</div>
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
            <form action="{{ route('admin.shelter.booth.index', ['shelterId' => $shelter->id]) }}" class="">
              <div class="d-flex gap-1">
                <input disabled type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
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
              @for ($i = 0; $i < $shelter->kapasitas; $i++)
                <tr>
                  <td>{{ $i + 1 }}</td>
                  <td>Booth {{ $i + 1 }}</td>
                  <td>
                    {{-- Ambil semua UMKM dengan nomor_booth yang sesuai --}}
                    @php
                        $umkmForBooth = $umkms->where('nomor_booth', $i + 1);
                    @endphp
                    
                    {{-- Shift Pagi --}}
                    @php
                        $pagiUMKM = $umkmForBooth->filter(function ($umkm) {
                            return str_contains($umkm->shift, 'pagi');
                        })->first();
                    @endphp
                    @if ($pagiUMKM)
                        <div>Pagi : <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detail{{ $pagiUMKM->id }}" class="text-decoration-underline">{{ $pagiUMKM->nama }}</a></div>
                    @else
                        <div>Pagi : <a href="" class=""></a></div>
                    @endif
                    
                    {{-- Shift Malam --}}
                    @php
                        $malamUMKM = $umkmForBooth->filter(function ($umkm) {
                            return str_contains($umkm->shift, 'malam');
                        })->first();
                    @endphp
                    @if ($malamUMKM)
                        <div>Malam : <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#detail{{ $malamUMKM->id }}" class="text-decoration-underline">{{ $malamUMKM->nama }}</a></div>
                    @else
                        <div>Malam : <a href="" class=""></a></div>
                    @endif
                  </td>
                </tr>
              @endfor
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
<div class="modal modal-blur fade" id="detail{{ $umkm->id }}" data-bs-backdrop="static" data-bs-backdrop="static" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail : {{ $umkm->nama }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center py-4">
        <div class="table-responsive">
          <table class="table table-vcenter text-start card-table table-striped">
            <tbody>
              <tr>
                <td>Shelter</td>
                <td>Shelter {{ $umkm->shelter->nama }}</td>
              </tr>
              <tr>
                <td>Nomor Booth</td>
                <td>Booth {{ $umkm->nomor_booth }}</td>
              </tr>
              <tr>
                <td>Shift</td>
                <td>{{ $umkm->shift }}</td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>{{ $umkm->nama }}</td>
              </tr>
              <tr>
                <td>Produk</td>
                <td><a href="{{ route('admin.umkm.produk', $umkm->id) }}" target="_blank" class="text-decoration-underline">Lebih Banyak</a></td>
              </tr>
              <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>{{ $umkm->tempat_lahir }}, {{ $umkm->tanggal_lahir }}</td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>{{ $umkm->alamat }}</td>
              </tr>
              <tr>
                <td>SIP</td>
                <td>{{ $umkm->surat_ijin_penempatan }}</td>
              </tr>
              <tr>
                <td>Retribusi</td>
                <td>{{ $umkm->retribusi }}</td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td>{{ $umkm->kategori->kategori }}</td>
              </tr>
              <tr>
                <td>Nomor SIP</td>
                <td>{{ $umkm->nomor_sip }}</td>
              </tr>
              <tr>
                <td>Valid SIP</td>
                <td>{{ $umkm->valid_sip }}</td>
              </tr>
              <tr>
                <td>Note</td>
                <td>{{ $umkm->note }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
          Cancel
        </a>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection