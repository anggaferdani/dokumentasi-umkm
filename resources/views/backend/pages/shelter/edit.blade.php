@extends('backend.templates.pages')
@section('title', "Edit Shelter ID $shelter->id")
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Edit Shelter ID {{ $shelter->id }}
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('admin.shelter.index') }}" class="btn btn-secondary">Back</a>
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
          <h4 class="card-title">Edit</h4>
        </div>
        <form action="{{ route('admin.shelter.update', $shelter->id) }}" method="POST" class="">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label required">Nama Shelter</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Shelter" value="{{ $shelter->nama }}">
              @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Kapasitas</label>
              <input type="number" class="form-control number" name="kapasitas" placeholder="Kapasitas" value="{{ $shelter->kapasitas }}">
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
                      <option value="{{ $district->id }}" {{ $district->id == $kelurahan->district_id ? 'selected' : '' }}>{{ $district->id }} - {{ $district->name }}</option>
                  @endforeach
                </select>
                @error('kecamatan_id')<div class="text-danger">{{ $message }}</div>@enderror
              </div>
              <div class="col-6">
                <label class="form-label required">Kelurahan</label>
                <select class="form-select subdistrictEdit" name="kelurahan_id" id="subdistrict{{ $shelter->id }}">
                  <option disabled selected value="">Pilih</option>
                  @foreach($subdistricts as $subdistrict)
                      <option value="{{ $subdistrict->id }}" {{ $subdistrict->id == $shelter->kelurahan_id ? 'selected' : '' }}>
                        {{ $subdistrict->id }} - {{ $subdistrict->name }}
                      </option>
                  @endforeach
                </select>
                @error('kelurahan_id')<div class="text-danger">{{ $message }}</div>@enderror
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a href="{{ route('admin.shelter.index') }}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary ms-auto">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
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
                  $(subdistrictSelect).append('<option value="' + value.id + '">' + value.id + ' - ' + value.name + '</option>');
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