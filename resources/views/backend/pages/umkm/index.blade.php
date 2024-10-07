@extends('backend.templates.pages')
@section('title', 'UMKM')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        UMKM
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Create new report</a>
        <a href="{{ route('admin.umkm.index', array_merge(request()->query(), ['export' => 'excel'])) }}" class="btn btn-success">Excel</a>
        <a href="{{ route('admin.umkm.index', array_merge(request()->query(), ['export' => 'pdf'])) }}" class="btn btn-danger">PDF</a>
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
            <form action="{{ route('admin.umkm.index') }}" class="">
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
                <select class="form-select" name="shelter">
                  <option disabled selected value="">Shelter</option>
                  <option value="">Semua</option>
                  @foreach($shelters as $shelter)
                      <option value="{{ $shelter->id }}" {{ request('shelter') == $shelter->id ? 'selected' : '' }}>
                          {{ $shelter->nama }}
                      </option>
                  @endforeach
                </select>
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                <button type="submit" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-times"></i></a>
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
                <th>Nomor Shelter</th>
                <th>Nama</th>
                <th>Shift</th>
                <th>Jenis Dagangan</th>
                <th>Status</th>
                <th>Note</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($umkms as $umkm)
                <tr>
                  <td>{{ ($umkms->currentPage() - 1) * $umkms->perPage() + $loop->iteration }}</td>
                  <td>{{ $umkm->shelter->nama ?? '-' }}</td>
                  <td>{{ $umkm->nomor_booth ?? '-' }}</td>
                  <td>{{ $umkm->nama }}</td>
                  <td>{{ $umkm->shift }}</td>
                  <td>{{ $umkm->jenis_dagangan }}</td>
                  <td>
                    @if($umkm->aktif == true)
                      <span class="badge bg-primary text-white">Aktif</span>
                    @else
                      <span class="badge bg-danger text-white">Non Aktif</span>
                    @endif
                  </td>
                  <td>{{ $umkm->note ?? '-' }}</td>
                  <td>
                    <div class="d-flex gap-1">
                      <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $umkm->id }}"><i class="fa-solid fa-pen"></i></button>
                      <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $umkm->id }}"><i class="fa-solid fa-trash"></i></button>
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

<div class="modal modal-blur fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.umkm.store') }}" method="POST" class="">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Create</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">Shelter</label>
            <select class="form-select" name="shelter_id">
              <option disabled selected value="">Pilih</option>
              @foreach($shelters as $shelter)
                <option value="{{ $shelter->id }}" 
                  @if($shelter->is_full) disabled @endif>
                  {{ $shelter->nama }} 
                  @if($shelter->is_full)
                      {{ $shelter->current_count }}/{{ $shelter->total_capacity }} *Kapasitas Full
                  @else
                      {{ $shelter->current_count }}/{{ $shelter->total_capacity }}
                  @endif
                </option>
              @endforeach
            </select>
            @error('shelter_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Nomor Booth</label>
            <input type="number" class="form-control" name="nomor_booth" placeholder="Nomor Booth">
            @error('nomor_booth')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama">
            @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-6">
                <label class="form-label required">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                @error('tempat_lahir')<div class="text-danger">{{ $message }}</div>@enderror
              </div>
              <div class="col-6">
                <label class="form-label required">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir">
                @error('tanggal_lahir')<div class="text-danger">{{ $message }}</div>@enderror
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label required">Alamat</label>
            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"></textarea>
            @error('alamat')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Shift</label>
            <select class="form-select" name="shift">
              <option disabled selected value="">Pilih</option>
              <option value="pagi">Pagi</option>
              <option value="malam">Malam</option>
              <option value="pagi malam">Pagi Malam</option>
            </select>
            @error('shift')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Surat Ijin Penempatan</label>
            <select class="form-select" name="surat_ijin_penempatan">
              <option disabled selected value="">Pilih</option>
              <option value="ada">Ada</option>
              <option value="tidak">Tidak</option>
            </select>
            @error('surat_ijin_penempatan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Retribusi</label>
            <select class="form-select" name="retribusi">
              <option disabled selected value="">Pilih</option>
              <option value="lancar">Lancar</option>
              <option value="tidak lancar">Tidak Lancar</option>
            </select>
            @error('retribusi')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Kategori</label>
            <select class="form-select" name="kategori_id">
              <option disabled selected value="">Pilih</option>
              @foreach($kategoris as $kategori)
                  <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
              @endforeach
            </select>
            @error('kategori_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Dagangan</label>
            <input type="text" class="form-control" name="jenis_dagangan" placeholder="Jenis Dagangan">
            @error('jenis_dagangan')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Nomor SIP</label>
            <input type="text" class="form-control" name="nomor_sip" placeholder="Nomor SIP">
            @error('nomor_sip')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Valid SIP</label>
            <input type="text" class="form-control" name="valid_sip" placeholder="Valid SIP">
            @error('valid_sip')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Status Aktif</label>
            <select class="form-select" name="aktif">
              <option disabled selected value="">Pilih</option>
              <option value="1">Aktif</option>
              <option value="0">Non Aktif</option>
            </select>
            @error('aktif')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Note</label>
            <textarea class="form-control" name="note" rows="3" placeholder="Note"></textarea>
            @error('note')<div class="text-danger">{{ $message }}</div>@enderror
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

@foreach ($umkms as $umkm)
<div class="modal modal-blur fade" id="edit{{ $umkm->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" class="">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label required">Shelter</label>
            <select class="form-select" name="shelter_id">
              <option disabled selected value="">Pilih</option>
              @foreach($shelters as $shelter)
                <option value="{{ $shelter->id }}" 
                  @if($shelter->is_full && $umkm->shelter_id != $shelter->id) 
                    disabled 
                  @endif
                  @if($umkm->shelter_id == $shelter->id) 
                      selected 
                  @endif>
                  {{ $shelter->nama }} 
                  ({{ $shelter->current_count }}/{{ $shelter->total_capacity }}) @if($shelter->is_full && $umkm->shelter_id != $shelter->id) *Kapasitas Full @endif
                </option>
              @endforeach
            </select>
            @error('shelter_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Nomor Booth</label>
            <input type="text" class="form-control" name="nomor_booth" placeholder="Nomor Booth" value="{{ $umkm->nomor_booth }}">
            @error('nomor_booth')<div class="text-danger">{{ $message }}</div>@enderror
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
            <label class="form-label required">Shift</label>
            <select class="form-select" name="shift">
              <option disabled selected value="">Pilih</option>
              <option value="pagi" @if($umkm->shift == 'pagi') @selected(true) @endif>Pagi</option>
              <option value="malam" @if($umkm->shift == 'malam') @selected(true) @endif>Malam</option>
              <option value="pagi malam" @if($umkm->shift == 'pagi malam') @selected(true) @endif>Pagi Malam</option>
            </select>
            @error('shift')<div class="text-danger">{{ $message }}</div>@enderror
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

@foreach ($umkms as $umkm)
<div class="modal modal-blur fade" id="delete{{ $umkm->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-status bg-danger"></div>
      <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST">
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