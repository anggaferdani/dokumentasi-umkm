@extends('backend.templates.authentications')
@section('title', 'Login')
@section('content')
<div class="container container-tight py-4">
  <div class="text-center mb-4">
    <a href="{{ route('index') }}" class="navbar-brand navbar-brand-autodark">
      <img src="{{ asset('logo.png') }}" width="200" height="" alt="" class="">
    </a>
  </div>
  <div class="card card-md">
    <div class="card-body">
      <h2 class="h2 text-center mb-4">Reset Password</h2>
      <div class="mb-3">Masukkan kata sandi baru untuk akun Anda. Setelah diperbarui, gunakan kata sandi ini untuk masuk ke akun Anda.</div>
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
      <form action="{{ route('reset-password-post', $user->id) }}" method="post">
        @csrf
        <div class="mb-3">
          <label class="form-label">New Password</label>
          <input type="password" class="form-control" name="password" placeholder="New Password">
          <div class="text-secondary small">Password harus memiliki minimal 8 karakter, mencakup huruf, angka, dan simbol.</div>
          @error('password')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Confirm New Password</label>
          <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
          @error('confirm_password')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <div class="text-center mt-3"><a href="{{ route('login') }}">Back to Login</a></div>
</div>
@endsection