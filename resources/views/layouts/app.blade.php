<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- favicon --}}
  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicon/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicon/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicon/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  @hasSection('title')
    <title>@yield('title')</title>
  @else
    <title>얼 -우리 말 배움터-</title>
  @endif

  <!-- 각종 서체 -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <!-- Namun -->
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet" />
  <!-- Noto -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <!-- Sunflower -->
  <link href="https://fonts.googleapis.com/css2?family=Sunflower:wght@300;500;700&display=swap" rel="stylesheet" />
  <!-- Jua -->
  <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet" />
  <!-- Poor -->
  <link href="https://fonts.googleapis.com/css2?family=Poor+Story&display=swap" rel="stylesheet" />
  <!-- Songmyong -->
  <link href="https://fonts.googleapis.com/css2?family=Song+Myung&display=swap" rel="stylesheet" />

  <script src="https://kit.fontawesome.com/a57480febd.js" crossorigin="anonymous"></script>

  {{-- スタイルシート --}}
  <link rel="stylesheet" href="{{ asset('css/destyle.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />

  @yield('css')
</head>

<body>
  @include('commons.header')

  @include('commons.editors_status')

  <!-- ↓↓↓パンくずリスト↓↓↓ -->
  @yield('breadcrumb')
  <!-- ↑↑↑パンくずリスト↑↑↑ -->

  <!-- ↓↓↓.wrapper：メイン＋サイド↓↓↓ -->
  <div class="wrapper {{ Request::is('/') ? 'wrapper__top' : '' }}">
    @yield('content')
  </div>
  <!-- ↑↑↑.wrapper：メイン＋サイド↑↑↑ -->

  <!-- トップに戻るボタン -->
  <a href="#" class="back-to-top">▲</a>

  @include('commons.footer')

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  @env('local')
  <script src="https://unpkg.com/vue@next"></script>
  @endenv
  @env('production')
  <script src="https://unpkg.com/vue@3.0.11/dist/vue.global.prod.js"></script>
  @endenv

  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

  @yield('js-files')
  <script src="{{ asset('js/main.js') }}"></script>
  @yield('js-script')
</body>

@env('local')

@include('test.route_list')

@endenv

</html>
