@extends('backend.templates.pages')
@section('title', 'Create UMKM')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Create UMKM
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
      @if(Session::get('error'))
        <div class="alert alert-important alert-danger" role="alert">
          {{ Session::get('error') }}
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
          <h4 class="card-title">Create</h4>
        </div>
        <form action="{{ route('admin.umkm.store') }}" method="POST" class="">
          @csrf
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label required">Shelter</label>
              <select class="form-select" name="shelter_id" id="shelter-select">
                <option disabled selected value="" {{ old('shelter_id') === null ? 'selected' : '' }}>Pilih</option>
                @foreach($shelters as $shelter)
                  <option value="{{ $shelter->id }}" 
                          data-is-full-pagi="{{ $shelter->is_full_pagi ? 'true' : 'false' }}" 
                          data-is-full-malam="{{ $shelter->is_full_malam ? 'true' : 'false' }}" 
                          data-can-select-pagi-malam="{{ $shelter->can_select_pagi_malam ? 'true' : 'false' }}" 
                          data-total-capacity="{{ $shelter->total_capacity }}" 
                          data-booth-status="{{ json_encode($shelter->booth_status) }}"
                          {{ old('shelter_id') == $shelter->id ? 'selected' : '' }}>
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
                <input type="text" class="form-control" name="nomor_booth" id="nomor-booth-input"
                      placeholder="Masukkan nomor booth"
                      value="{{ old('nomor_booth') }}">
                @error('nomor_booth')<div class="text-danger">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                  <label class="form-label required">Shift</label>
                  <select class="form-select" name="shift" id="shift-select">
                      <option disabled value="" {{ old('shift') === null ? 'selected' : '' }}>Pilih</option>
                      <option value="pagi" {{ old('shift') == 'pagi' ? 'selected' : '' }}>Pagi</option>
                      <option value="malam" {{ old('shift') == 'malam' ? 'selected' : '' }}>Malam</option>
                      <option value="pagi malam" {{ old('shift') == 'pagi malam' ? 'selected' : '' }}>Pagi Malam</option>
                  </select>
                  @error('shift')<div class="text-danger">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label required">Nama</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama') }}">
              @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label required">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                @error('tempat_lahir')<div class="text-danger">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label required">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')<div class="text-danger">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label required">Alamat</label>
              <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat">{{ old('alamat') }}</textarea>
              @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Surat Ijin Penempatan</label>
              <select class="form-select" name="surat_ijin_penempatan">
                <option disabled value="" {{ old('surat_ijin_penempatan') === null ? 'selected' : '' }}>Pilih</option>
                <option value="ada" {{ old('surat_ijin_penempatan') == 'ada' ? 'selected' : '' }}>Ada</option>
                <option value="tidak" {{ old('surat_ijin_penempatan') == 'tidak' ? 'selected' : '' }}>Tidak</option>
              </select>
              @error('surat_ijin_penempatan')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Retribusi</label>
              <select class="form-select" name="retribusi">
                <option disabled value="" {{ old('retribusi') === null ? 'selected' : '' }}>Pilih</option>
                <option value="lancar" {{ old('retribusi') == 'lancar' ? 'selected' : '' }}>Lancar</option>
                <option value="tidak lancar" {{ old('retribusi') == 'tidak lancar' ? 'selected' : '' }}>Tidak Lancar</option>
              </select>
              @error('retribusi')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Kategori</label>
              <select class="form-select" name="kategori_id">
                <option disabled value="" {{ old('kategori_id') === null ? 'selected' : '' }}>Pilih</option>
                @foreach($kategoris as $kategori)
                  <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->kategori }}
                  </option>
                @endforeach
              </select>
              @error('kategori_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Dagangan</label>
              <input type="text" class="form-control" name="jenis_dagangan" placeholder="Jenis Dagangan" value="{{ old('jenis_dagangan') }}">
              @error('jenis_dagangan')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Nomor SIP</label>
              <input type="text" class="form-control" name="nomor_sip" placeholder="Nomor SIP" value="{{ old('nomor_sip') }}">
              @error('nomor_sip')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Valid SIP</label>
              <input type="text" class="form-control" name="valid_sip" placeholder="Valid SIP" value="{{ old('valid_sip') }}">
              @error('valid_sip')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Status Aktif</label>
              <select class="form-select" name="aktif">
                <option disabled value="" {{ old('aktif') === null ? 'selected' : '' }}>Pilih</option>
                <option value="1" {{ old('aktif') == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('aktif') == '0' ? 'selected' : '' }}>Non Aktif</option>
              </select>
              @error('aktif')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Note</label>
              <textarea class="form-control" name="note" rows="3" placeholder="Note">{{ old('note') }}</textarea>
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
    // Create modal script
    const shelterSelect = document.getElementById('shelter-select');
    const boothSelect = document.getElementById('nomor-booth-select');
    const shiftSelect = document.getElementById('shift-select');

    shelterSelect.addEventListener('change', function () {
        const selectedOption = shelterSelect.options[shelterSelect.selectedIndex];
        const boothStatus = JSON.parse(selectedOption.getAttribute('data-booth-status') || '{}');
        const totalCapacity = parseInt(selectedOption.getAttribute('data-total-capacity'), 10);

        // Reset booth and shift
        boothSelect.innerHTML = '<option disabled selected value="">Pilih</option>';
        shiftSelect.innerHTML = `
            <option disabled selected value="">Pilih</option>
            <option value="pagi">Pagi</option>
            <option value="malam">Malam</option>
            <option value="pagi malam">Pagi Malam</option>
        `;
        boothSelect.disabled = false;
        shiftSelect.disabled = true;

        // Populate booth options
        for (let i = 1; i <= totalCapacity; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = `Booth ${i}`;

            const status = boothStatus[i] || { pagi: false, malam: false };

            // Check if booth is full
            if (status.pagi && status.malam) {
                option.disabled = true;
            }

            boothSelect.appendChild(option);
        }

        boothSelect.addEventListener('change', function () {
            const selectedBooth = boothSelect.value;
            const status = boothStatus[selectedBooth] || { pagi: false, malam: false };

            // Reset shift options
            Array.from(shiftSelect.options).forEach(option => {
                option.disabled = false;
            });

            // Disable shifts based on booth status
            if (status.pagi) {
                shiftSelect.querySelector('option[value="pagi"]').disabled = true;
                shiftSelect.querySelector('option[value="pagi malam"]').disabled = true;
            }
            if (status.malam) {
                shiftSelect.querySelector('option[value="malam"]').disabled = true;
                shiftSelect.querySelector('option[value="pagi malam"]').disabled = true;
            }

            // If all shifts are disabled, disable booth
            const pagiDisabled = shiftSelect.querySelector('option[value="pagi"]').disabled;
            const malamDisabled = shiftSelect.querySelector('option[value="malam"]').disabled;
            const pagiMalamDisabled = shiftSelect.querySelector('option[value="pagi malam"]').disabled;

            if (pagiDisabled && malamDisabled && pagiMalamDisabled) {
                boothSelect.querySelector(`option[value="${selectedBooth}"]`).disabled = true;
            }

            shiftSelect.disabled = false;
        });
    });
  });
</script>
@endpush