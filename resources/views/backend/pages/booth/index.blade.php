@extends('backend.templates.pages')
@section('title', 'booth')
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Booth
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Create new report</a>
        <a href="{{ route('admin.shelter.index') }}" class="btn btn-primary">Back</a>
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
            <form action="{{ route('admin.shelter.booth.index', ['shelterId' => $shelter->id]) }}" class="">
              <div class="d-flex gap-1">
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                <button type="submit" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="{{ route('admin.shelter.booth.index', ['shelterId' => $shelter->id]) }}" class="btn btn-icon btn-dark-outline"><i class="fa-solid fa-times"></i></a>
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
                <th>UMKM</th>
                <th>Nomor Booth</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($booths as $booth)
                <tr>
                  <td>{{ ($booths->currentPage() - 1) * $booths->perPage() + $loop->iteration }}</td>
                  <td>{{ $booth->shelter->nama }}</td>
                  <td>{{ $booth->umkm->nama ?? '-' }}</td>
                  <td>{{ $booth->nomor_booth }}</td>
                  <td>
                    <div class="d-flex gap-1">
                      <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $booth->id }}"><i class="fa-solid fa-pen"></i></button>
                      <button type="button" class="btn btn-icon btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $booth->id }}"><i class="fa-solid fa-trash"></i></button>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex align-items-center">
          <ul class="pagination m-0 ms-auto">
            @if($booths->hasPages())
              {{ $booths->appends(request()->query())->links('pagination::bootstrap-4') }}
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
      <form action="{{ route('admin.shelter.booth.store', ['shelterId' => $shelter->id]) }}" method="POST" class="">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Create</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" name="shelter_id" placeholder="" value="{{ $shelter->id }}">
          <div class="mb-3">
            <label class="form-label required">UMKM</label>
            <select class="form-select" name="umkm_id">
              <option disabled selected value="">Pilih</option>
              @foreach($umkms as $umkm)
                  <option value="{{ $umkm->id }}"
                      @if($registeredUmkms->contains($umkm->id)) @disabled(true) @endif
                    >
                    {{ $umkm->nama }}
                    @if($registeredUmkms->contains($umkm->id))
                      (Sudah terdaftar di shelter {{ $umkm->booth->shelter->nama }})
                    @endif
                  </option>
              @endforeach
            </select>
            @error('umkm_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Nomor Booth</label>
            <input type="number" class="form-control" name="nomor_booth" placeholder="Nomor Booth">
            @error('nomor_booth')<div class="text-danger">{{ $message }}</div>@enderror
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

@foreach ($booths as $booth)
<div class="modal modal-blur fade" id="edit{{ $booth->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="{{ route('admin.shelter.booth.update', ['shelterId' => $shelter->id, 'id' => $booth->id]) }}" method="POST" class="">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" name="shelter_id" placeholder="" value="{{ $shelter->id }}">
          <div class="mb-3">
            <label class="form-label required">UMKM</label>
            <select class="form-select" name="umkm_id">
              <option disabled selected value="">Pilih</option>
              @foreach($umkms as $umkm)
                <option value="{{ $umkm->id }}"
                    @if($booth->umkm_id == $umkm->id) 
                        @selected(true) 
                    @endif
            
                    @if($registeredUmkms->contains($umkm->id) && $booth->umkm_id != $umkm->id) 
                        @disabled(true) 
                    @endif
                >
                    {{ $umkm->nama }}
                    
                    @if($registeredUmkms->contains($umkm->id) && $booth->umkm_id != $umkm->id)
                        (Sudah terdaftar di shelter {{ $umkm->booth->shelter->nama }})
                    @endif
                </option>
              @endforeach
            </select>
            @error('umkm_id')<div class="text-danger">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label required">Nomor Booth</label>
            <input type="number" class="form-control" name="nomor_booth" placeholder="Nomor Booth" value="{{ $booth->nomor_booth }}">
            @error('nomor_booth')<div class="text-danger">{{ $message }}</div>@enderror
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

@foreach ($booths as $booth)
<div class="modal modal-blur fade" id="delete{{ $booth->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-status bg-danger"></div>
      <form action="{{ route('admin.shelter.booth.delete', ['shelterId' => $shelter->id, 'id' => $booth->id]) }}" method="POST">
        @csrf
        @method('Delete')
        <div class="modal-body text-center py-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
          <h3>Apakah anda yakin ingin menghapus</h3>
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