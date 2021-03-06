<!-- ↓↓↓ヘッダー↓↓↓ -->
<header id="header">
  <div class="cover">
    <div class="sp-fixed">
      <div class="sp-fixed__logo">
        <a href="#"><img src="{{ asset('img/logo/logo_sp_white.png') }}" alt="" /></a>
      </div>
      <button class="sp-btn"></button>
    </div>
    <div class="cover__btn-group">
      @guest('web')
        <button class="global-btn" onclick="location.href='{{ route('register') }}'">회원등록</button>
        <button class="global-btn" onclick="location.href='{{ route('login') }}'">로 그 인</button>
      @endguest

      @auth('web')
        <button class="global-btn" onclick="location.href='{{ route('users.show', Auth::id()) }}'">회원정보</button>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="global-btn">로그아우트</button>
        </form>
      @endauth

      <button class="global-btn" onclick="location.href='{{ route('contact.form') }}'">문의하기</button>

    </div>
    <div class="cover__logo">
      <a href="{{ url('/') }}"><img src="{{ asset('img/logo/logo_pc_white_orange.png') }}"
          alt="얼 -우리 말 배움터-" /></a>
    </div>
    <img class="cover__clock" src="{{ asset('img/clock.png') }}" alt="" />
  </div>

  <!-- PC用のグローバルメニュー -->
  <nav class="global-nav">
    <div class="pc-fixed-logo">
      <a href="{{ url('/') }}"><img src="{{ asset('img/logo/logo_sp_white.png') }}" alt="얼 우리 말 배움터" /></a>
    </div>
    <ul>
      <li><a href="{{ route('articles.index') }}" class="{{ Request::is('articles*') ? 'active' : '' }}">학습실</a>
      </li>
      {{-- <li><a href="{{ route('qa.index') }}" class="{{ Request::is('qa*') ? 'active' : '' }}">일문일답</a></li> --}}
      <li><a href="{{ route('norms', 'index') }}" class="{{ Request::is('norms/*') ? 'active' : '' }}">규범원문</a>
      </li>
      <li><a href="{{ route('materials.index') }}" class="{{ Request::is('materials*') ? 'active' : '' }}">자료실</a>
      </li>
      <li><a href="{{ route('bbs.index') }}" class="{{ Request::is('bbs*') ? 'active' : '' }}">질문게시판</a></li>
    </ul>
    @guest('web')
      <button class="nav-login-btn global-btn" onclick="location.href='{{ route('login') }}'">로 그 인</button>
    @endguest
    @auth('web')
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="nav-login-btn global-btn" style="width: 10rem;">로그아우트</button>
    </form>
    @endauth
  </nav>

  <!-- SPハンバーガー用のナビゲーション -->
  <nav class="sp-nav">
    <ul>
      @guest('web')
        <li><a href="{{ route('register') }}">회원등록</a></li>
        <li><a href="{{ route('login') }}">로그인</a></li>
      @endguest
      @auth('web')
        <li><a href="{{ route('users.show', Auth::id()) }}">회원정보</a></li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button>로그아우트</button>
          </form>
        </li>
      @endauth
      <li><a href="{{ route('articles.index') }}">학습실</a></li>
      {{-- <li><a href="{{ route('qa.index') }}">일문일답</a></li> --}}
      <li><a href="{{ route('norms', 'index') }}">규범원문</a></li>
      <li><a href="{{ route('materials.index') }}">자료실</a></li>
      <li><a href="{{ route('bbs.index') }}">질문게시판</a></li>
      <li><a href="{{ route('contact.form') }}">문의하기</a></li>
    </ul>
  </nav>
</header>
<!-- ↑↑↑ヘッダー↑↑↑ -->
