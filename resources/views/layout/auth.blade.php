<!DOCTYPE html>
<html lang="en">

<head>
  <title>perpustakaan</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/animsition/css/animsition.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login') }}/css/main.css">

</head>

<body>

  <div class="limiter">
    <div class="container-login100" style="background-image: url('{{ asset('login/images/back.png') }}'); background-color: rgba(255, 255, 255, 255);">
      <div class="wrap-login100">

        <form class="login100-form validate-form" action="{{ route('proses_login') }}" method="post">
          @csrf
          <div class="text-center">
            <img src="{{ asset('login/images/logosekolah.png') }}" alt="" width="115" height="115">
          </div>

          <span class="login100-form-title p-b-34 p-t-27" style="font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: bold;">
            SD IT ADZKIA 1 PADANG
          </span>
          @if (session('error'))
          <div class="alert alert-danger" role="alert">
            ⛔ {{ session('error') }}
          </div>
          @endif
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            ✅ {{ session('success') }}
          </div>
          @endif
          <div class="wrap-input100 validate-input" data-validate="Enter username">
            <input class="input100" type="text" name="email" placeholder="Username">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="password" placeholder="Password">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              login
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>

  <script src="{{ asset('login') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="{{ asset('login') }}/vendor/animsition/js/animsition.min.js"></script>
  <script src="{{ asset('login') }}/vendor/bootstrap/js/popper.js"></script>
  <script src="{{ asset('login') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset('login') }}/vendor/select2/select2.min.js"></script>
  <script src="{{ asset('login') }}/vendor/daterangepicker/moment.min.js"></script>
  <script src="{{ asset('login') }}/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="{{ asset('login') }}/vendor/countdowntime/countdowntime.js"></script>
  <script src="{{ asset('login') }}/js/main.js"></script>

</body>

</html>