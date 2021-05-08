<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @hasSection('title')
    <title>@yield('title')</title>
  @else
    <title>얼 -우리 말 배움터-</title>
  @endif

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">

  @yield('css')
</head>

<body>
  @include('editors.header')

  <div class="wrapper">
    @yield('content')
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  {{-- <script src="https://unpkg.com/vue@3.0.11/dist/vue.global.prod.js"></script> --}}
  <script src="https://unpkg.com/vue@next"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

  @yield('js-files')
  @yield('js-script')
</body>

@env('local')

@include('test.route_list')

@endenv

</html>
