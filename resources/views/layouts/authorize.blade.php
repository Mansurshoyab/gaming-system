<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?? config('app.locale') }}" >
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $page . ' | ' . config('app.name') . '-' . config('app.tagline') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
  </head>
  <body>
    <main>{{ $slot }}</main>
    @stack('scripts')
  </body>
</html>
