@if (Auth::guard('editors')->check())
  <div class="editors_status">
    <p>관리자로 로그인중</p>
    <div>
      <a href="{{ route('editors.top') }}" class="text-underline">관리자 첫페지에로</a>
    </div>
  </div>
@endif
