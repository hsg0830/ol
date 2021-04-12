<!-- ↓↓↓ヘッダー↓↓↓ -->
<header id="header">
  <div class="cover">
    <div class="sp-fixed">
      <div class="sp-fixed__logo">
        <a href="#"><img src="{{ asset('img/logo_sp_white.png') }}" alt="" /></a>
      </div>
      <button class="sp-btn"></button>
    </div>
    <div class="cover__btn-group">
      @guest
        <button class="global-btn" onclick="location.href='{{ route('register') }}'">회원등록</button>
        <button class="global-btn" onclick="location.href='{{ route('login') }}'">로 그 인</button>
      @endguest
      {{-- @auth()
      @endauth --}}
      {{-- @auth('editors')
      @endauth --}}

      @if (Auth::guard('editors')->check())
        <form method="POST" action="{{ route('editors.logout') }}">
          @csrf
          <button class="global-btn" onclick="location.href='{{ route('editors.logout') }}'">로그아우트</button>
        </form>
      @elseif (Auth::check())
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="global-btn" onclick="location.href='{{ route('logout') }}'">로그아우트</button>
        </form>
      @endif
      
      <button class="global-btn" onclick="location.href='#'">문의하기</button>

    </div>
    <div class="cover__logo">
      <a href="#"><img src="{{ asset('img/logo_pc_white_orange.png') }}" alt="얼 -우리 말 배움터-" /></a>
    </div>
    <img class="cover__clock" src="{{ asset('img/clock.png') }}" alt="" />
  </div>
  <!-- PC用のグローバルメニュー -->
  <nav class="global-nav">
    <div class="pc-fixed-logo">
      <a href="#"><img src="{{ asset('img/logo_sp_white.png') }}" alt="얼 우리 말 배움터" /></a>
    </div>
    <ul>
      <li><a href="#">학습실</a></li>
      <li><a href="#">일문일답</a></li>
      <li><a href="#">규범원문</a></li>
      <li><a href="#">자료실</a></li>
      <li><a href="#">질문게시판</a></li>
    </ul>
    <button class="nav-login-btn global-btn" onclick="location.href='{{ route('login') }}'">로 그 인</button>
  </nav>
  <!-- SPハンバーガー用のナビゲーション -->
  <nav class="sp-nav">
    <ul>
      <li><a href="{{ route('register') }}">회원등록</a></li>
      <li><a href="{{ route('login') }}">로그인</a></li>
      <li><a href="#">학습실</a></li>
      <li><a href="#">일문일답</a></li>
      <li><a href="#">자료실</a></li>
      <li><a href="#">질문게시판</a></li>
      <li><a href="#">문의하기</a></li>
    </ul>
  </nav>
</header>
<!-- ↑↑↑ヘッダー↑↑↑ -->
