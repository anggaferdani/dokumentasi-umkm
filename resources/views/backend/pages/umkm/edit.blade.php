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
          <h4 class="card-title">Edit</h4>
        </div>

        <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">

            {{-- Shelter --}}
            <div class="mb-3">
              <label class="form-label required">Shelter</label>
              <select class="form-select" name="shelter_id">
                  <option disabled selected value="">Pilih</option>
                  @foreach($shelters as $shelter)
                      <option value="{{ $shelter->id }}"
                          @if($umkm->shelter_id == $shelter->id) selected @endif>
                          {{ $shelter->nama }} 
                          (Pagi: {{ $shelter->count_pagi }}/{{ $shelter->total_capacity }},
                           Malam: {{ $shelter->count_malam }}/{{ $shelter->total_capacity }})
                      </option>
                  @endforeach
              </select>
              @error('shelter_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- ✅ Nomor Booth jadi input number --}}
            {{-- ✅ Shift tetap pakai select --}}
            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <label class="form-label required">Nomor Booth</label>
                    <input type="number" class="form-control" name="nomor_booth"
                           value="{{ old('nomor_booth', $umkm->nomor_booth) }}"
                           placeholder="Masukkan Nomor Booth">
                    @error('nomor_booth')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label required">Shift</label>
                    <select class="form-select" name="shift">
                        <option disabled selected value="">Pilih</option>
                        <option value="pagi" {{ old('shift', $umkm->shift) == 'pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="malam" {{ old('shift', $umkm->shift) == 'malam' ? 'selected' : '' }}>Malam</option>
                        <option value="pagi malam" {{ old('shift', $umkm->shift) == 'pagi malam' ? 'selected' : '' }}>Pagi Malam</option>
                    </select>
                    @error('shift')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- Nama --}}
            <div class="mb-3">
              <label class="form-label required">Nama</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama"
                     value="{{ old('nama', $umkm->nama) }}">
              @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Tempat & Tanggal Lahir --}}
            <div class="mb-3">
              <div class="row">
                <div class="col-6">
                  <label class="form-label required">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir"
                         value="{{ old('tempat_lahir', $umkm->tempat_lahir) }}">
                  @error('tempat_lahir')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-6">
                  <label class="form-label required">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir"
                         value="{{ old('tanggal_lahir', $umkm->tanggal_lahir) }}">
                  @error('tanggal_lahir')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
              <label class="form-label required">Alamat</label>
              <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat">{{ old('alamat', $umkm->alamat) }}</textarea>
              @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Surat Ijin Penempatan --}}
            <div class="mb-3">
              <label class="form-label required">Surat Ijin Penempatan</label>
              <select class="form-select" name="surat_ijin_penempatan">
                <option disabled selected value="">Pilih</option>
                <option value="ada" {{ old('surat_ijin_penempatan', $umkm->surat_ijin_penempatan) == 'ada' ? 'selected' : '' }}>Ada</option>
                <option value="tidak" {{ old('surat_ijin_penempatan', $umkm->surat_ijin_penempatan) == 'tidak' ? 'selected' : '' }}>Tidak</option>
              </select>
              @error('surat_ijin_penempatan')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Retribusi --}}
            <div class="mb-3">
              <label class="form-label required">Retribusi</label>
              <select class="form-select" name="retribusi">
                <option disabled selected value="">Pilih</option>
                <option value="lancar" {{ old('retribusi', $umkm->retribusi) == 'lancar' ? 'selected' : '' }}>Lancar</option>
                <option value="tidak lancar" {{ old('retribusi', $umkm->retribusi) == 'tidak lancar' ? 'selected' : '' }}>Tidak Lancar</option>
              </select>
              @error('retribusi')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
              <label class="form-label required">Kategori</label>
              <select class="form-select" name="kategori_id">
                <option disabled selected value="">Pilih</option>
                @foreach($kategoris as $kategori)
                  <option value="{{ $kategori->id }}" {{ old('kategori_id', $umkm->kategori_id) == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->kategori }}
                  </option>
                @endforeach
              </select>
              @error('kategori_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Jenis Dagangan --}}
            <div class="mb-3">
              <label class="form-label">Jenis Dagangan</label>
              <input type="text" class="form-control" name="jenis_dagangan" placeholder="Jenis Dagangan"
                     value="{{ old('jenis_dagangan', $umkm->jenis_dagangan) }}">
              @error('jenis_dagangan')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Nomor SIP --}}
            <div class="mb-3">
              <label class="form-label">Nomor SIP</label>
              <input type="text" class="form-control" name="nomor_sip" placeholder="Nomor SIP"
                     value="{{ old('nomor_sip', $umkm->nomor_sip) }}">
              @error('nomor_sip')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Valid SIP --}}
            <div class="mb-3">
              <label class="form-label">Valid SIP</label>
              <input type="text" class="form-control" name="valid_sip" placeholder="Valid SIP"
                     value="{{ old('valid_sip', $umkm->valid_sip) }}">
              @error('valid_sip')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Status Aktif --}}
            <div class="mb-3">
              <label class="form-label required">Status Aktif</label>
              <select class="form-select" name="aktif">
                <option disabled selected value="">Pilih</option>
                <option value="1" {{ old('aktif', $umkm->aktif) == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('aktif', $umkm->aktif) == 0 ? 'selected' : '' }}>Non Aktif</option>
              </select>
              @error('aktif')<div class="text-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Note --}}
            <div class="mb-3">
              <label class="form-label">Note</label>
              <textarea class="form-control" name="note" rows="3" placeholder="Note">{{ old('note', $umkm->note) }}</textarea>
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
    const shelterSelect = document.querySelector('select[name="shelter_id"]');
    const boothInput = document.querySelector('input[name="nomor_booth"]');
    const shiftSelect = document.querySelector('select[name="shift"]');

    // Simpan status booth dari data attribute setiap shelter
    const shelters = @json($shelters);

    function updateShiftOptions() {
        const selectedShelterId = shelterSelect.value;
        const boothNumber = boothInput.value;

        // Reset semua shift jadi aktif
        shiftSelect.querySelectorAll('option').forEach(opt => opt.disabled = false);

        if (!selectedShelterId || !boothNumber) return;

        // Cari shelter yang dipilih
        const shelter = shelters.find(s => s.id == selectedShelterId);
        if (!shelter) return;

        const boothStatus = shelter.booth_status || {};
        const status = boothStatus[boothNumber] || { pagi: false, malam: false };

        // 🔴 Kalau booth sudah dipakai untuk pagi → disable opsi "pagi" & "pagi malam"
        if (status.pagi) {
            shiftSelect.querySelector('option[value="pagi"]').disabled = true;
            shiftSelect.querySelector('option[value="pagi malam"]').disabled = true;
        }

        // 🔴 Kalau booth sudah dipakai untuk malam → disable opsi "malam" & "pagi malam"
        if (status.malam) {
            shiftSelect.querySelector('option[value="malam"]').disabled = true;
            shiftSelect.querySelector('option[value="pagi malam"]').disabled = true;
        }
    }

    // Event Listener
    shelterSelect.addEventListener('change', updateShiftOptions);
    boothInput.addEventListener('input', updateShiftOptions);
});
</script>
@endpush
