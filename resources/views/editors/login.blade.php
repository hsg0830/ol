@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- 관리자 로그인')

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="one-column" class="container">
    <h1 class="page-title">관리자 로그인</h1>

    <form class="p-5" method="POST" action="{{ route('editors.login') }}">
      @csrf

      @error('auth')
        <div class="error-message" role="alert">
          &#x26A0; {{ $message }}
        </div>
      @enderror

      <div class="row form-group mb-4 justify-content-center">
        <label class="col-2" for="email">메일주소</label>
        <input class="col-6" type="email" id="email" name="email" :value="old('email')" required autofocus>
      </div>

      <div class="row form-group mb-5 justify-content-center">
        <label class="col-2" for="password">암호</label>
        <input class="col-6" type="password" id="password" name="password" required autocomplete="current-password">
      </div>

      <div class="row form-group mx-auto mb-5 text-center">
        <label for="remember_me">
          <input id="remember_me" type="checkbox" name="remember">
          로그인상태를 기억시켜두시겠습니까?
        </label>
      </div>

      <input type="hidden" name="guard" value="editors" />

      <div class="row form-group justify-content-center">
        <button type="submit" class="col-6 btn btn-success btn-block">보내기</button>
      </div>

    </form>
  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->
@endsection
