<div class="pick-up">
  <h2 class="pick-up__heading">학습과제</h2>
  @if (is_null($pickUp))
    <p class="message">등록된 과제가 없습니다.</p>
  @else
    <a href="{{ $pickUp->url }}">
      <div class="pick-up__content">
        <span class="pick-up__content__category @if($task->category_id == 1) category-100 @elseif ($task->category_id == 2) category-200 @elseif ($task->category_id == 3) category-300 @endif">
          @if($task->category_id == 1)
            학습실
          @elseif ($task->category_id == 2)
            질문게시판
          @elseif ($task->category_id == 3)
            자료실
          @endif
        </span>
        <p class="pick-up__content__title">{{ $pickUp->title }}</p>
      </div>
    </a>
  @endif
  <div class="more">
    <a href="{{ route('tasks.index') }}"><i class="fas fa-angle-double-right"></i> 과제 확인하기</a>
  </div>
</div>
