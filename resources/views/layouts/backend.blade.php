<!DOCTYPE html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?? config('app.locale') }}" >
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $page . ' | ' . config('company.name') . '-' . config('company.tagline') }}</title>
    <link rel="icon" href="{{ asset('images/company/' . config('company.favicon') ) }}" type="image/x-icon" />

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
    <link rel="stylesheet" href="{{ asset('plugins/css/sweetalert2.min.css') }}" />
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
    <script src="{{ asset('plugins/js/jquery-3.7.1.min.js') }}" ></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}" ></script>
    <script src="{{ asset('backend/js/core/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('plugins/js/axios.min.js') }}" ></script>
    <script src="{{ asset('plugins/js/select2.full.min.js') }}" ></script>
    <script src="{{ asset('backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}" ></script>
    <script src="{{ asset('backend/js/plugin/chart.js/chart.min.js') }}" ></script>
    <script src="{{ asset('backend/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}" ></script>
    <script src="{{ asset('backend/js/plugin/chart-circle/circles.min.js') }}" ></script>
    <script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}" ></script>
    <script src="{{ asset('backend/js/plugin/jsvectormap/jsvectormap.min.js') }}" ></script>
    <script src="{{ asset('backend/js/plugin/jsvectormap/world.js') }}" ></script>
    <script src="{{ asset('backend/js/plugin/gmaps/gmaps.js') }}" ></script>
    <script src="{{ asset('plugins/js/sweetalert2.min.js') }}" ></script>
    <script src="{{ asset('backend/js/kaiadmin.min.js') }}" ></script>
    @include('layouts.sweetalert')
    @stack('scripts')
  </body>
</html>
