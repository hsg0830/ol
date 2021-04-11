@extends('layouts.app')

{{-- @section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="#">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <!-- <a itemprop="item" href="カテゴリー2のURL"> -->
      <span itemprop="name">로그인</span>
      <!-- </a> -->
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection --}}

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="one-column">
    <form class="login-form" method="POST" action="{{ route('editor.login') }}">
      @csrf

      @error('auth')
        <div class="error-message" role="alert">
          &#x26A0; {{ $message }}
        </div>
      @enderror

      <div class="form-group">
        <label for="email">메일주소</label>
        <input type="email" id="email" name="email" :value="old('email')" required autofocus>
      </div>

      <div class="form-group">
        <label for="password">암호</label>
        <input type="password" id="password" name="password" required autocomplete="current-password">
      </div>

      <input type="hidden" name="guard" value="editors" />

      <div class="form-group">
        <button type="submit" class="btn global-btn">보내기</button>
      </div>


    </form>
  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->
@endsection
