@extends('backend.templates.pages')
@section('title', "Profile")
@section('header')
<div class="container-xl">
  <div class="row g-2 align-items-center">
    <div class="col">
      <h2 class="page-title">
        Profile
      </h2>
    </div>
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
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
        <form action="{{ route('admin.profile.update', $user->id) }}" method="POST" class="">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label required">Nama</label>
              <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ $user->name }}">
              @error('name')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label required">Email</label>
              <input type="email" class="form-control email" name="email" placeholder="Email" value="{{ $user->email }}">
              @error('email')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control password" name="password" placeholder="Password">
              <div class="text-secondary">Masukan password baru jika ingin update password *Optional</div>
              @error('password')<div class="text-danger">{{ $message }}</div>@enderror
              <ul class="text-secondary validation-list">
                <li id="length" class="text-danger">Minimal 8 karakter (<span id="char-count">0</span>/8)</li>
                <li id="letter" class="text-danger">Mengandung huruf</li>
                <li id="number" class="text-danger">Mengandung angka</li>
                <li id="symbol" class="text-danger">Mengandung simbol (@, $, !, %, *, ?, &)</li>
              </ul>
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" class="form-control confirm-password" name="confirm_password" placeholder="Confirm Password">
              <div id="confirm-feedback" class="text-danger"></div>
              @error('confirm_password')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="d-flex">
              <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
              <button type="submit" class="btn btn-primary ms-auto">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection