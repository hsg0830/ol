<div class="side-board" style="margin-top: 3rem">

  <h3 class="list-heading"><i class="fas fa-question-circle"></i> 최근질문</h3>

  <ol class="list list__recently">
    @foreach ($recentAsks as $ask)
      <li>
        <a class="ask category-{{ $ask->category->id }}" href="{{ $ask->url }}">
          {{-- <p class="list__category category-{{ $ask->category->id }}">
            {{ $ask->category->name }}</p>
          <p class="list__date">{{ $ask->date }}</p> --}}
          <p class="list__title">{{ $ask->title }}</p>
        </a>
      </li>
    @endforeach
  </ol>

  <div class="more">
    <a href="{{ route('bbs.index') }}"> <i class="fas fa-angle-double-right"></i> 더보기 </a>
  </div>

</div>
