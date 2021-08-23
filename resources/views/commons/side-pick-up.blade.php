<div class="pick-up">
  <h2 class="pick-up__heading">이번주 학습과제</h2>
  @if (is_null($pickUp))
    <p class="message">등록된 과제가 없습니다.</p>
  @else
    <a href="{{ $pickUp->url }}">
      <div class="pick-up__content">
        <span
          class="pick-up__content__category category-{{ $pickUp->category_id }}">{{ $pickUp->category->name }}</span>
        <p class="pick-up__content__title">{{ $pickUp->title }}</p>
      </div>
    </a>
  @endif
  <div class="more">
    <a href="{{ route('tasks.index') }}"><i class="fas fa-angle-double-right"></i> 이달 과제 확인하기</a>
  </div>
</div>
