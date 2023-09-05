<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('login') }}/fonts/icomoon/style.css">

  <link rel="stylesheet" href="{{ asset('login') }}/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('login') }}/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="{{ asset('login') }}/css/style.css">

  <title>Sistem informasi Perpustakaan</title>
</head>

<body>


  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{ asset('login/images/bg.jpg') }}');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container" style="background-color:	#F0FFFF	;">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center">
            <h3 class="mb-1"><strong>SISTEM PERPUSTAKAAN</strong></h3>
            <h4 class="mb-1"><strong>SD IT ADZKIA 1 KOTA PADANG</strong></h4>
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
            <form action="{{ route('proses_login') }}" method="post">
              @csrf
              <div class="form-group first mt-4" style="border-color: black;">
                <label for="username" style="color: black; float: left;">Username</label>
                <input type="text" name="email" class="form-control" placeholder="enter username">
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group last mb-3" style="border-color: black;">
                <label for="password" style="color: black; float: left;">Password</label>
                <input type="password" name="password" class="form-control" placeholder="enter password">
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <button type="submit" class="btn btn-block btn-primary">Login</button>

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
  <script src="{{ asset('login') }}/js/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('login') }}/js/popper.min.js"></script>
  <script src="{{ asset('login') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('login') }}/js/main.js"></script>
</body>

</html>