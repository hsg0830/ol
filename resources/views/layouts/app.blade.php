<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
  <!-- Dokdo -->
  <link href="https://fonts.googleapis.com/css2?family=Dokdo&display=swap" rel="stylesheet" />
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

  <!-- ↓↓↓パンくずリスト↓↓↓ -->
  @yield('breadcrumb')
  <!-- ↑↑↑パンくずリスト↑↑↑ -->

  <!-- ↓↓↓.wrapper：メイン＋サイド↓↓↓ -->
  <div class="wrapper">
    @yield('content')
  </div>
  <!-- ↑↑↑.wrapper：メイン＋サイド↑↑↑ -->

  <!-- トップに戻るボタン -->
  <a href="#" class="back-to-top">▲</a>

  @include('commons.footer')

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://unpkg.com/vue@3.0.11/dist/vue.global.prod.js"></script>
  {{-- <script src="https://unpkg.com/vue@next"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

  <!-- 共通 -->
  @yield('js-files')

  <script src="{{ asset('js/main.js') }}"></script>

  @yield('js-script')
</body>

@env('local')

@include('test.route_list')

@endenv

</html>
