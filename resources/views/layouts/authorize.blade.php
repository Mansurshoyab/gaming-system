<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?? config('app.locale') }}" >
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $page . ' | ' . config('company.name') . '-' . config('company.tagline') }}</title>
    <link rel="icon" href="{{ asset('images/company/' . config('company.favicon') ) }}" type="image/x-icon" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      .frosted-glass {
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
      }
      .link:not(:last-child):after {
        content: '|';
        padding-left: 5px;
      }
    </style>
    @stack('styles')
  </head>
  <body class="min-h-screen bg-gray-950 text-white flex items-center justify-center" >
    {{-- Container --}}
    <div class="w-full max-w-md bg-opacity-80 bg-black rounded-lg frosted-glass shadow-lg p-8 mx-4" >
      @stack('title')
      <div>{{ $slot }}</div>
      {{-- Footer Links --}}
      <div class="mt-6 text-center text-xs text-gray-500">
        <p>
          <span>&copy;</span>
          <span id="year" ></span>
          <strong>{{ __('Casino King') }}</strong>
          <span>{{ __('|') }}</span>
          <span>{{ __('All Rights Reserved.') }}</span>
        </p>
        @foreach ($menu as $item)
          <a href="{{ $item['url'] ? $item['url'] : 'javascript:void(0);' }}" class="link hover:underline" >{{ $item['label'] }}</a>
        @endforeach
      </div>
    </div>
    <script src="{{ asset('plugins/js/jquery-3.7.1.min.js') }}" ></script>
    <script src="{{ asset('plugins/js/axios.min.js') }}" ></script>
    <script>
      var year = document.getElementById("year");
      year.textContent = new Date().getFullYear();
    </script>
    {{-- Webpage scripts --}}
    @stack('scripts')
  </body>
</html>
