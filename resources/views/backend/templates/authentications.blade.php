<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title')</title>
    <link href="{{ asset('tabler/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/demo.min.css?1692870487') }}" rel="stylesheet"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="{{ asset('tabler/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page page-center">
      @yield('content')
    </div>

    <script src="{{ asset('tabler/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('tabler/dist/js/demo.min.js?1692870487') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    @stack('scripts')

    <script type="text/javascript">
      $(document).ready( function () {
        $('form').on('submit', function() {
          $.LoadingOverlay("show");
      
          setTimeout(function(){
              $.LoadingOverlay("hide");
          }, 100000);
        });
      });

      $(document).ready(function() {
        // Validasi input email
        $('.email').on('input', function() {
            var value = $(this).val();
            // Memeriksa apakah format email valid
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(value)) {
                $(this).get(0).setCustomValidity('Masukkan alamat email yang valid');
            } else {
                $(this).get(0).setCustomValidity('');
            }
        });

        $('.password').on('input', function () {
            var password = $(this).val();

            // Validate length
            if (password.length >= 8) {
                $('#length').removeClass('text-danger').addClass('text-success').text(`Minimal 8 karakter (${password.length}/8)`);
            } else {
                $('#length').removeClass('text-success').addClass('text-danger').text(`Minimal 8 karakter (${password.length}/8)`);
            }

            // Validate letter
            if (/[a-zA-Z]/.test(password)) {
                $('#letter').removeClass('text-danger').addClass('text-success');
            } else {
                $('#letter').removeClass('text-success').addClass('text-danger');
            }

            // Validate number
            if (/\d/.test(password)) {
                $('#number').removeClass('text-danger').addClass('text-success');
            } else {
                $('#number').removeClass('text-success').addClass('text-danger');
            }

            // Validate symbol
            if (/[@$!%*?&]/.test(password)) {
                $('#symbol').removeClass('text-danger').addClass('text-success');
            } else {
                $('#symbol').removeClass('text-success').addClass('text-danger');
            }
        });

        $('.confirm-password').on('input', function () {
            var password = $('.password').val();
            var confirmPassword = $(this).val();

            if (password === confirmPassword) {
                $('#confirm-feedback').removeClass('text-danger').addClass('text-success').text('Password sesuai');
            } else {
                $('#confirm-feedback').removeClass('text-success').addClass('text-danger').text('Password tidak sesuai');
            }
        });
      });
    </script>
  </body>
</html>