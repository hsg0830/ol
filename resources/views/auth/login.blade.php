@extends('layouts.app')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
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
@endsection

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="one-column">
    <h1 class="category-title">로그인</h1>

    <form class="login-form" method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label for="email">메일주소</label>
        <input type="email" id="email" name="email" :value="old('email')" required autofocus>
      </div>

      <div class="form-group">
        <label for="password">암호</label>
        <input type="password" id="password" name="password" required autocomplete="current-password">
      </div>

      <div class="form-group">
        <button type="submit" class="btn global-btn">보내기</button>
      </div>

    </form>

    <div class="message">
      <p>회원등록을 하시렵니까?</p>
      <a href="{{ route('register') }}" class="text-underline">회원등록페지에로</a>
    </div>

      <div class="message">
        <p>암호가 기억나지 않으십니까?</p>
        <a href="{{ route('password.request') }}" class="text-underline">암호재설정페지에로</a>
      </div>
  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->
@endsection
