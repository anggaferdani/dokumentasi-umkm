@extends('backend.templates.pages')
@section('title', "Edit UMKM ID $umkm->id")
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Edit UMKM ID {{ $umkm->id }}
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Back</a>
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
        <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" class="">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label required">Shelter</label>
              <select class="form-select" name="shelter_id" id="shelter-select-edit{{ $umkm->id }}">
                  <option disabled selected value="">Pilih</option>
                  @foreach($shelters as $shelter)
                      <option value="{{ $shelter->id }}"
                          data-is-full-pagi="{{ $shelter->is_full_pagi ? 'true' : 'false' }}"
                          data-is-full-malam="{{ $shelter->is_full_malam ? 'true' : 'false' }}"
                          data-can-select-pagi-malam="{{ $shelter->can_select_pagi_malam ? 'true' : 'false' }}"
                          data-total-capacity="{{ $shelter->total_capacity }}"
                          data-booth-status="{{ json_encode($shelter->booth_status) }}"
                          @if($umkm->shelter_id == $shelter->id) selected @endif>
                          {{ $shelter->nama }} 
                          (Pagi: {{ $shelter->count_pagi }}/{{ $shelter->total_capacity }},
                           Malam: {{ $shelter->count_malam }}/{{ $shelter->total_capacity }})
                      </option>
                  @endforeach
              </select>
              @error('shelter_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <label class="form-label required">Nomor Booth</label>
                    <input type="hidden" name="nomor_booth" value="{{ $umkm->nomor_booth }}">
                    <select class="form-select" name="nomor_booth" id="nomor-booth-select-edit{{ $umkm->id }}">
                        <option disabled selected value="">Pilih</option>
                    </select>
                    @error('nomor_booth')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label required">Shift</label>
                    <input type="hidden" name="shift" value="{{ $umkm->shift }}">
                    <select class="form-select" name="shift" id="shift-select-edit{{ $umkm->id }}">
                        <option disabled selected value="">Pilih</option>
                    </select>
                    @error('shift')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mb-3">
              <label class="form-label required">Nama</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $umkm->nama }}">
              @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col-6">
                  <label class="form-label required">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ $umkm->tempat_lahir }}">
                  @error('tempat_lahir')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-6">
                  <label class="form-label required">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $umkm->tanggal_lahir }}">
                  @error('tanggal_lahir')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label required">Alamat</label>
              <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat">{{ $umkm->alamat }}</textarea>
              @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Surat Ijin Penempatan</label>
              <select class="form-select" name="surat_ijin_penempatan">
                <option disabled selected value="">Pilih</option>
                <option value="ada" @if($umkm->surat_ijin_penempatan == 'ada') @selected(true) @endif>Ada</option>
                <option value="tidak" @if($umkm->surat_ijin_penempatan == 'tidak') @selected(true) @endif>Tidak</option>
              </select>
              @error('surat_ijin_penempatan')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Retribusi</label>
              <select class="form-select" name="retribusi">
                <option disabled selected value="">Pilih</option>
                <option value="lancar" @if($umkm->retribusi == 'lancar') @selected(true) @endif>Lancar</option>
                <option value="tidak lancar" @if($umkm->retribusi == 'tidak lancar') @selected(true) @endif>Tidak Lancar</option>
              </select>
              @error('retribusi')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Kategori</label>
              <select class="form-select" name="kategori_id">
                <option disabled selected value="">Pilih</option>
                @foreach($kategoris as $kategori)
                  <option value="{{ $kategori->id }}" @if($umkm->kategori_id == $kategori->id) @selected(true) @endif>{{ $kategori->kategori }}</option>
                @endforeach
              </select>
              @error('kategori_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Dagangan</label>
              <input type="text" class="form-control" name="jenis_dagangan" placeholder="Jenis Dagangan" value="{{ $umkm->jenis_dagangan }}">
              @error('jenis_dagangan')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Nomor SIP</label>
              <input type="text" class="form-control" name="nomor_sip" placeholder="Nomor SIP" value="{{ $umkm->nomor_sip }}">
              @error('nomor_sip')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Valid SIP</label>
              <input type="text" class="form-control" name="valid_sip" placeholder="Valid SIP" value="{{ $umkm->valid_sip }}">
              @error('valid_sip')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Status Aktif</label>
              <select class="form-select" name="aktif">
                <option disabled selected value="">Pilih</option>
                <option value="1" @if($umkm->aktif == 1) @selected(true) @endif>Aktif</option>
                <option value="0" @if($umkm->aktif == 0) @selected(true) @endif>Non Aktif</option>
              </select>
              @error('aktif')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Note</label>
              <textarea class="form-control" name="note" rows="3" placeholder="Note">{{ $umkm->note }}</textarea>
              @error('note')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Back</a>
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
  document.addEventListener('DOMContentLoaded', function () {
    const shelterSelectEdit{{ $umkm->id }} = document.getElementById(`shelter-select-edit{{ $umkm->id }}`);
    const boothSelectEdit{{ $umkm->id }} = document.getElementById(`nomor-booth-select-edit{{ $umkm->id }}`);
    const shiftSelectEdit{{ $umkm->id }} = document.getElementById(`shift-select-edit{{ $umkm->id }}`);

    function populateBoothAndShiftEdit{{ $umkm->id }}() {
      const selectedOption = shelterSelectEdit{{ $umkm->id }}.options[shelterSelectEdit{{ $umkm->id }}.selectedIndex];
      const boothStatus = JSON.parse(selectedOption.getAttribute('data-booth-status') || '{}');
      const totalCapacity = parseInt(selectedOption.getAttribute('data-total-capacity'), 10);

      // Populate booth options
      boothSelectEdit{{ $umkm->id }}.innerHTML = '<option disabled value="">Pilih</option>';
      for (let i = 1; i <= totalCapacity; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = `Booth ${i}`;

        const status = boothStatus[i] || { pagi: false, malam: false };

        // Check if booth is full
        if (status.pagi && status.malam) {
          option.disabled = true;
        }

        // Set the current booth as selected
        if (i == {{ $umkm->nomor_booth }}) {
          option.selected = true;
        }

        boothSelectEdit{{ $umkm->id }}.appendChild(option);
      }

      // Ensure the fields are enabled if they already have values
      if (boothSelectEdit{{ $umkm->id }}.value) {
        boothSelectEdit{{ $umkm->id }}.disabled = false;
        handleShiftOptionsEdit{{ $umkm->id }}(); // Adjust shifts dynamically
      }
      if (shiftSelectEdit{{ $umkm->id }}.value) {
        shiftSelectEdit{{ $umkm->id }}.disabled = false;
      }
    }

    function handleShiftOptionsEdit{{ $umkm->id }}() {
      const selectedBooth = boothSelectEdit{{ $umkm->id }}.value;
      const selectedOption = shelterSelectEdit{{ $umkm->id }}.options[shelterSelectEdit{{ $umkm->id }}.selectedIndex];
      const boothStatus = JSON.parse(selectedOption.getAttribute('data-booth-status') || '{}');
      const status = boothStatus[selectedBooth] || { pagi: false, malam: false };

      // Reset shift options
      shiftSelectEdit{{ $umkm->id }}.innerHTML = `
          <option disabled value="">Pilih</option>
          <option value="pagi" {{ $umkm->shift == 'pagi' ? 'selected' : '' }}>Pagi</option>
          <option value="malam" {{ $umkm->shift == 'malam' ? 'selected' : '' }}>Malam</option>
          <option value="pagi malam" {{ $umkm->shift == 'pagi malam' ? 'selected' : '' }}>Pagi Malam</option>
      `;

      // Disable shifts based on booth status
      if (status.pagi) {
        shiftSelectEdit{{ $umkm->id }}.querySelector('option[value="pagi"]').disabled = true;
        shiftSelectEdit{{ $umkm->id }}.querySelector('option[value="pagi malam"]').disabled = true;
      }
      if (status.malam) {
        shiftSelectEdit{{ $umkm->id }}.querySelector('option[value="malam"]').disabled = true;
        shiftSelectEdit{{ $umkm->id }}.querySelector('option[value="pagi malam"]').disabled = true;
      }

      // Ensure shift is enabled
      shiftSelectEdit{{ $umkm->id }}.disabled = false;
    }

    // Populate data on page load and when shelter changes
    populateBoothAndShiftEdit{{ $umkm->id }}();
    shelterSelectEdit{{ $umkm->id }}.addEventListener('change', function () {
      boothSelectEdit{{ $umkm->id }}.disabled = false; // Ensure booth is enabled
      shiftSelectEdit{{ $umkm->id }}.disabled = true;  // Disable shift until a booth is selected
      populateBoothAndShiftEdit{{ $umkm->id }}();
    });

    boothSelectEdit{{ $umkm->id }}.addEventListener('change', function () {
      handleShiftOptionsEdit{{ $umkm->id }}(); // Handle shift options based on booth status
    });
  });
</script>
@endpush