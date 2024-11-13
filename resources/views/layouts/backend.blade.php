<!DOCTYPE html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?? config('app.locale') }}" >
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $page . ' | ' . config('app.name') . '-' . config('app.tagline') }}</title>
    <link
      rel="icon"
      href="{{ asset('backend/img/kaiadmin/favicon.ico') }}"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="{{ asset('backend/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('backend/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}" />
    @stack('styles')
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <x-backend-sidebar />
      <!-- End Sidebar -->

      <div class="main-panel">
        <x-backend-navbar />

        <div class="container">
          <div class="page-inner">
            @stack('breadcrumb')
            <div class="page-category">{{ $slot }}</div>
          </div>
        </div>

        <x-backend-footer />
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('backend/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('backend/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('backend/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('backend/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ asset('backend/js/plugin/gmaps/gmaps.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('backend/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('backend/js/kaiadmin.min.js') }}"></script>
    @stack('scripts')
  </body>
</html>
