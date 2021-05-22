<div class="side-user">
  @guest
    <button class="global-btn" onclick="location.href='{{ route('register') }}'">회원등록</button>
    <button class="global-btn" onclick="location.href='{{ route('login') }}'">로 그 인</button>
  @endguest
  @auth
    <p>{{ Auth::user()->name }}선생님, 안녕하십니까?</p>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="global-btn">로그아우트</button>
  </form>
  @endauth
</div>
