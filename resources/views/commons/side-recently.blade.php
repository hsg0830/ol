<!-- ↓↓↓サイドメニュー↓↓↓ -->
<aside id="sidemenu">
  <div class="side-board">
    <h3 class="list-heading">자주 보는 기사</h3>
    <ol class="list list__recently">
      @foreach ($topArticles as $topArticle)
      <li>
        <a href="#">
          <p class="list__category category-{{ $topArticle->category->id }}">{{ $topArticle
          ->category->name }}</p>
          <p class="list__date">{{ $topArticle->created_at }}</p>
          <p class="list__title">{{ $topArticle->title }}</p>
        </a>
      </li>
      @endforeach
    </ol>
    <div class="list-more">
      <a href="#"> <i class="fas fa-angle-double-right"></i>더보기 </a>
    </div>
  </div>
</aside>
<!-- ↑↑↑サイドメニュー↑↑↑ -->
