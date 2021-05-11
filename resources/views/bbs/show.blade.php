@extends('layouts.app')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ route('bbs.index') }}">
        <span itemprop="name">질문게시판</span>
      </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <div class="category-page-title">
      <img src="{{ asset('img/norms_top.png') }}" alt="" />
      <h1>질문게시판</h1>
    </div>

    <div class="category-page-introduction">
      <p>여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다.</p>
    </div>

    <div class="ask">
      <h2 class="ask__title"><span>{{ $ask->title }}</span></h2>
      <div class="ask__info">
        <span class="category category-{{ $ask->category->id }}">{{ $ask->category->name }}</span>
        <span class="date">투고일: {{ $ask->created_at->format('Y-m-d') }}</span>
      </div>
    </div>

    <div class="ask-detail">{!! $ask->description !!}</div>

    <div class="reply">
      <div class="reply__date">회답일: {{ $ask->replied_at->format('Y-m-d') }}</div>
      <div class="reply__content">{!! $ask->reply !!}</div>
    </div>

    {{-- 関連記事 --}}
    <div id="list-container" class="list-container" style="margin-top: 4rem;">
      <div class="list-container__related"><i class="fas fa-book-reader"></i> 관련질문</div>

      <div class="list-container__wrapper">
        @foreach ($relatedAsks as $item)
          <div class="list-item">
            <a href="{{ $item->url }}">
              <div class="list-item__header">
                @if ($item->category_id == 100)
                  <img src="{{ asset('img/bg_black-board_thum.png') }}" alt="" />
                @elseif ($item->category_id == 200)
                  <img src="{{ asset('img/bg_white-board_thum.png') }}" alt="" />
                @elseif ($item->category_id == 300)
                  <img src="{{ asset('img/bg_memo_thum.png') }}" alt="" />
                @elseif ($item->category_id == 500)
                  <img src="{{ asset('img/bg_film_thum.png') }}" alt="" />
                @endif
                <p class="title {{ $item->category_id == 100 ? 'color-white' : '' }}">
                  {{ $item->title }}</p>
              </div>
              <div class="list-item__content">
                <div class="info">
                  <p class="date">{{ $item->date }}</p>
                  <p class="category category-{{ $item->category_id }}">{{ $item->category->name }}</p>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </main>

  @include('commons.side-recently')

@endsection