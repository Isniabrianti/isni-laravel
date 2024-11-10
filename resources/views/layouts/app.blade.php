<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ secure_asset('argon/assets/img/ff2.png') }}">
  <link rel="icon" type="image/png" href="{{ secure_asset('argon/assets/img/ff2.png') }}">
  <title>
    Manhwa's Library
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ secure_asset('argon/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ secure_asset('argon/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ secure_asset('argon/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ secure_asset('argon/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet"/>
  <link href="{{ secure_asset('css/navsidecon.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('css/dashboard.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('css/google.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('css/setting.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('css/buku.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
  <!-- Navbar -->
  @include('layouts.navbar')
  
  <!-- Sidebar -->
  @if (!request()->routeIs('login')&& !request()->routeIs('register'))
      @include('layouts.sidebar')
  @endif

  <!-- Main Content -->
  <div class="content" style="margin-left: 300px; padding-top: 100px;">
      @yield('content')
  </div>

  <!-- Footer -->
  @if (!request()->routeIs('login')&& !request()->routeIs('register'))
      @include('layouts.footer')
  @endif

    <!-- Argon Dashboard JS -->
    <script src="https://cdn.jsdelivr.net/npm/argon-dashboard/js/argon-dashboard.js"></script>
    <!-- Core JS Files -->
    <script src="{{ secure_asset('argon/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ secure_asset('argon/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('argon/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ secure_asset('argon/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ secure_asset('argon/assets/js/plugins/chartjs.min.js') }}"></script>
</body>
</html>
