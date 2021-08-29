<div class="pick-up">
  <h2 class="pick-up__heading">최신기사</h2>
    <a href="{{ $latestArticle->url }}">
      <div class="pick-up__content">
        <span
          class="pick-up__content__category category-{{ $latestArticle->category_id }}">{{ $latestArticle->category->name }}</span>
        <p class="pick-up__content__title">{{ $latestArticle->title }}</p>
      </div>
    </a>
  <div class="more">
    <a href="{{ route('articles.index') }}"> <i class="fas fa-angle-double-right"></i> 더보기 </a>
  </div>
</div>
