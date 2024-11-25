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
      <h2 class="h2 text-center mb-4">Forgot Password</h2>
      <div class="mb-3">Jika Anda lupa kata sandi, masukkan alamat email Anda di bawah ini. Kami akan mengirimkan tautan untuk mereset kata sandi Anda.</div>
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
      <form action="{{ route('forgot-password-post') }}" method="post">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email">
          @error('email')<div class="text-danger">{{ $message }}</div>@enderror
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