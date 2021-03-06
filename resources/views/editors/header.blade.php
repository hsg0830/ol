<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}" target="_blank">얼 -우리 말 배움터-</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('editors.top') }}">管理者トップ</a>
        </li>
      </ul>

      @auth('editors')
        <form class="d-flex" method="POST" action="{{ route('editors.logout') }}">
          @csrf
          <button class="btn btn-danger">로그아우트</button>
        </form>
      @endauth
    </div>
  </div>
</nav>
