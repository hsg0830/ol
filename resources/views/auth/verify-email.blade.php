@extends('layouts.app')

@section('content')
  <main id="one-column">
    <h1 class="category-title">메일주소확인</h1>

    <div class="message">
      <p>회원등록을 하시느라 수고하셨습니다.</p>
      <p><span class="text-underline">등록을 마무리하시려면 등록하신 메일주소앞으로 보내드린 이메일에 있는</span></p>
      <p><span class="text-underline"><span class="text-emphasis">《메일주소확인》</span>단추를 누르십시오.</span></p>
      <p>메일을 받지 못하신 경우에는 다시 보내드리겠습니다.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
      <div class="notification text-center">
        <p>확인용 이메일을 다시 보내드렸습니다. </p>
        <p>이메일을 확인하십시오.</p>
        <p>이메일을 받지 못한 경우애는 문의하기를 통하여 문의해주십시오.</p>
      </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div class="message">
          <button class="btn global-btn large">메일 다시받기</button>
        </div>
      </form>

      {{-- <form method="POST" action="{{ route('logout') }}">
        @csrf

        <div class="message">
          <button type="submit" class="btn global-btn">로그아우트</button>
        </div>
      </form> --}}

      <div class="message">
        <p>회원등록을 하시렵니까?</p>
        <a href="{{ route('register') }}" class="text-underline">회원등록페지에로</a>
      </div>

      <div class="message">
        <p>암호가 기억나지 않으십니까?</p>
        <a href="{{ route('password.request') }}" class="text-underline">암호재설정페지에로</a>
      </div>
    </div>
  </main>

@endsection
