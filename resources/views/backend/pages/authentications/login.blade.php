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
      <h2 class="h2 text-center mb-4">Login</h2>
      @if(Session::get('success'))
        <div class="alert alert-important alert-success" role="alert">
          {{ Session::get('success') }}
        </div>
      @endif
      @if(Session::get('error'))
        <div class="alert alert-important alert-danger" role="alert" id="login-error">
          <span id="countdown-timer">{{ Session::get('error') }}</span>
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
      <form action="{{ route('post.login') }}" method="post">
        @csrf
        <div class="mb-3">
          <label class="form-label required">Email</label>
          <input type="email" class="form-control email" name="email" placeholder="Email" value="{{ old('email') }}" required>
          @error('email')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label class="form-label required">Password</label>
          <input type="password" class="form-control password" name="password" placeholder="Password" required>
          @error('password')<div class="text-danger">{{ $message }}</div>@enderror
          <ul class="text-secondary validation-list">
            <li id="length" class="text-danger">Minimal 8 karakter (<span id="char-count">0</span>/8)</li>
            <li id="letter" class="text-danger">Mengandung huruf</li>
            <li id="number" class="text-danger">Mengandung angka</li>
            <li id="symbol" class="text-danger">Mengandung simbol (@, $, !, %, *, ?, &)</li>
          </ul>
        </div>
        <div class="mb-3">
          <label class="form-label required">Confirm Password</label>
          <input type="password" class="form-control confirm-password" name="confirm_password" placeholder="Confirm Password" required>
          <div id="confirm-feedback" class="text-danger"></div>
          @error('confirm_password')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label class="form-label required">ReCaptcha</label>
          <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
          @error('g-recaptcha-response')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-footer">
          <button id="login-button" type="submit" class="btn btn-primary w-100">Login</button>
        </div>
      </form>
    </div>
  </div>
  <div class="text-center mt-3">Lupa kata sandi? <a href="{{ route('forgot-password') }}">Klik di sini untuk reset</a></div>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready(function() {
    if ($('#login-error').length) {
        let countdownText = $('#countdown-timer').text();
        let match = countdownText.match(/(\d+)/);
        
        if (match) {
            let secondsRemaining = parseInt(match[0]);

            $('#login-button').prop('disabled', true);

            let countdownInterval = setInterval(function() {
                secondsRemaining--;

                $('#countdown-timer').text('Terlalu banyak percobaan login. Silakan coba lagi dalam ' + secondsRemaining + ' detik.');

                if (secondsRemaining <= 0) {
                    clearInterval(countdownInterval);
                    $('#login-button').prop('disabled', false);
                    $('#login-error').fadeOut();
                }
            }, 1000);
        }
    }
  });
</script>
@endpush