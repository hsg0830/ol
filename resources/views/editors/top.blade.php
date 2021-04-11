管理者トップページ

<form method="POST" action="{{ route('editor.logout') }}">
  @csrf
  <button class="global-btn" onclick="location.href='{{ route('editor.logout') }}'">로그아우트</button>
</form>
