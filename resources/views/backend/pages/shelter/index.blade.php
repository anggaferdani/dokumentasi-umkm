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
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Create new report</a>
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
      @if(Session::get('error'))
        <div class="alert alert-important alert-danger" role="alert">
          {{ Session::get('error') }}
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
                <th>Total</th>
                <th>Ber SIP</th>
                <th>Selisih</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($shelters as $shelter)
                @php
                  $ditempati = $shelter->umkms->reduce(function ($carry, $umkm) {
                    if ($umkm->shift == 'pagi malam') {
                      return $carry + 2;
                    } elseif ($umkm->shift == 'pagi' || $umkm->shift == 'malam') {
                      return $carry + 1;
                    } 
                    return $carry;
                  }, 0);
                  $kosong = $shelter->kapasitas - $ditempati;
                  $berSIP = $shelter->umkms->filter(function ($umkm) {
                    return $umkm->surat_ijin_penempatan === "ada";
                  })->count();
                @endphp
                <tr>
                  <td>{{ ($shelters->currentPage() - 1) * $shelters->perPage() + $loop->iteration }}</td>
                  <td>{{ $shelter->nama }}</td>
                  <td>{{ $shelter->alamat ?? '-' }}, {{ $shelter->district->dis_name ?? '-' }}, {{ $shelter->subdistrict->subdis_name }}</td>
                  <td>{{ $ditempati }}</td>
                  <td>{{ $kosong }}</td>
                  <td>{{ $shelter->kapasitas }}</td>
                  <td>{{ $berSIP }}</td>
                  <td>{{ $ditempati - $berSIP }}</td>
                  <td>
                    <div class="d-flex gap-1">
                      <a href="{{ route('admin.shelter.booth.index', ['shelterId' => $shelter->id]) }}" class="btn btn-primary">Booth</a>
                      <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $shelter->id }}"><i class="fa-solid fa-pen"></i></button>
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

<div class="modal modal-blur fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.shelter.store') }}" method="POST" class="">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Create</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">Nama Shelter</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Shelter">
            @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Kapasitas</label>
            <input type="number" class="form-control" name="kapasitas" placeholder="Kapasitas">
            @error('kapasitas')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Alamat</label>
            <textarea class="form-control" name="alamat" rows="3" placeholder="Masukan nama desa dan jalan"></textarea>
            @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="row">
            <div class="col-6">
              <label class="form-label required">Kecamatan</label>
              <select class="form-select" name="kecamatan_id" id="district">
                <option disabled selected value="">Pilih</option>
                @foreach($districts as $district)
                    <option value="{{ $district->dis_id }}">{{ $district->dis_name }}</option>
                @endforeach
              </select>
              @error('kecamatan_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="col-6">
              <label class="form-label required">Kelurahan</label>
              <select class="form-select" name="kelurahan_id" id="subdistrict">
                <option disabled selected value="">Pilih</option>
              </select>
              @error('kelurahan_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
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

@foreach ($shelters as $shelter)
<div class="modal modal-blur fade" id="edit{{ $shelter->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.shelter.update', $shelter->id) }}" method="POST" class="">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">Nama Shelter</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Shelter" value="{{ $shelter->nama }}">
            @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Kapasitas</label>
            <input type="number" class="form-control" name="kapasitas" placeholder="Kapasitas" value="{{ $shelter->kapasitas }}">
            @error('kapasitas')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Alamat</label>
            <textarea class="form-control" name="alamat" rows="3" placeholder="Masukan nama desa dan jalan">{{ $shelter->alamat }}</textarea>
            @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="row">
            <div class="col-6">
              <label class="form-label required">Kecamatan</label>
              <select class="form-select districtEdit" name="kecamatan_id" id="district{{ $shelter->id }}">
                <option disabled selected value="">Pilih</option>
                @foreach($districts as $district)
                    <option value="{{ $district->dis_id }}" {{ $district->dis_id == $shelter->kecamatan_id ? 'selected' : '' }}>{{ $district->dis_name }}</option>
                @endforeach
              </select>
              @error('kecamatan_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="col-6">
              <label class="form-label required">Kelurahan</label>
              <select class="form-select subdistrictEdit" name="kelurahan_id" id="subdistrict{{ $shelter->id }}">
                <option disabled selected value="">Pilih</option>
                @foreach($subdistricts as $subdistrict)
                    <option value="{{ $subdistrict->subdis_id }}" {{ $subdistrict->subdis_id == $shelter->kelurahan_id ? 'selected' : '' }}>
                        {{ $subdistrict->subdis_name }}
                    </option>
                @endforeach
              </select>
              @error('kelurahan_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
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

@foreach ($shelters as $shelter)
<div class="modal modal-blur fade" id="delete{{ $shelter->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
@push('scripts')
<script>
  let districtName, subdistrictName;

  $(document).ready(function () {
    $('#district').on('change', function () {
        var districtId = $(this).val();
        districtName = $(this).children("option:selected").text();
        console.log(districtName);
        if (districtId) {
            populateSubdistricts(districtId, '#subdistrict');
        } else {
            resetSubdistrict('#subdistrict');
        }
    });

    $('.districtEdit').on('change', function () {
        var districtId = $(this).val();
        districtName = $(this).children("option:selected").text();
        var subdistrictSelect = $(this).closest('.modal').find('.subdistrictEdit');

        if (districtId) {
            populateSubdistricts(districtId, subdistrictSelect);
        } else {
            resetSubdistrict(subdistrictSelect);
        }
    });
  });

  function populateSubdistricts(districtId, subdistrictSelect) {
      $.ajax({
          url: '/admin/get-subdistricts',
          type: 'GET',
          data: { district_id: districtId },
          success: function (data) {
              $(subdistrictSelect).empty();
              $(subdistrictSelect).append('<option disabled selected value="">Pilih</option>');
              $.each(data, function (key, value) {
                  $(subdistrictSelect).append('<option value="' + value.subdis_id + '">' + value.subdis_name + '</option>');
              });
          }
      });
  }

  function resetSubdistrict(subdistrictSelect) {
      $(subdistrictSelect).empty();
      $(subdistrictSelect).append('<option disabled selected value="">Pilih</option>');
  }
</script>
@endpush