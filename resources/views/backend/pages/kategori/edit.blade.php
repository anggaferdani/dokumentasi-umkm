@extends('backend.templates.pages')
@section('title', "Edit Kategori ID $kategori->id")
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Edit Kategori ID {{ $kategori->id }}
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Back</a>
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
        <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="">
              <label class="form-label required">Kategori</label>
              <input type="text" class="form-control" name="kategori" placeholder="kategori" value="{{ $kategori->kategori }}">
              @error('kategori')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary ms-auto">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection