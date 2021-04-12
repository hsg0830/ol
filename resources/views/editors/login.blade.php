@extends('layouts.app')

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="one-column">
    <h1 class="category-title">편집자 로그인</h1>
    <form class="login-form" method="POST" action="{{ route('editors.login') }}">
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
