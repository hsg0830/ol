@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 학습실')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ route('articles.index') }}">
        <span itemprop="name">학습실</span>
      </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <!-- タイトル部 -->
    <div class="title-block">
      @if ($article->category->id == 100)
        <img src="{{ asset('img/thum/bg_black-board_thum.png') }}" alt="" />
      @elseif($article->category->id == 200)
        <img src="{{ asset('img/thum/bg_white-board_thum.png') }}" alt="" />
      @elseif($article->category->id == 300)
        <img src="{{ asset('img/thum/bg_memo_thum.png') }}" alt="" />
      @elseif($article->category->id == 400)
        <img src="{{ asset('img/thum/bg_film_thum.png') }}" alt="" />
      @endif

      <div class="title-block__category">{{ $article->category->name }}</div>

      @if ($article->category->id != 100)
        <h1 class="title-block__title">{{ $article->title }}</h1>
      @else
        <h1 class="title-block__title color-white">{{ $article->title }}</h1>
      @endif

      @if ($article->category->id != 100)
        <div class="title-block__date"><time>{{ $article->date }}</time></div>
      @else
        <div class="title-block__date color-white"><time>{{ $article->date }}</time></div>
      @endif

    </div>
    <!-- タイトル部 -->

    {{-- イントロダクション --}}
    <div class="introduction-block">
      {!! $article->introduction !!}
    </div>
    {{-- イントロダクション --}}

    <!-- 本文部 -->
    @if (count($article->subContents) > 0)
      <div class="content-block">
        @foreach ($article->subContents as $subContent)
          <section class="content-section">
            <div class="section-title-block">
              <h3 class="section-title-block__title">{{ $subContent->title }}</h3>
            </div>
            <div class="section-content-block">
              {!! $subContent->description !!}
            </div>
          </section>
        @endforeach
      </div>
    @endif
    <!-- 本文部 -->

    {{-- 関連記事 --}}
    <div id="list-container" class="list-container">
      <div class="list-container__related"><i class="fas fa-book-reader"></i> 관련기사</div>

      <div class="list-container__wrapper">
        @foreach ($relatedArticles as $item)
          <div class="list-item">
            <a href="{{ $item->url }}">
              <div class="list-item__header">
                @if ($item->category_id == 100)
                  <img src="{{ asset('img/thum/bg_black-board_thum.png') }}" alt="" />
                @elseif ($item->category_id == 200)
                  <img src="{{ asset('img/thum/bg_white-board_thum.png') }}" alt="" />
                @elseif ($item->category_id == 300)
                  <img src="{{ asset('img/thum/bg_memo_thum.png') }}" alt="" />
                @elseif ($item->category_id == 400)
                  <img src="{{ asset('img/thum/bg_film_thum.png') }}" alt="" />
                @endif
                <p class="title {{ $item->category_id == 100 ? 'color-white' : '' }}">
                  {{ $item->title }}</p>
              </div>
              <div class="list-item__content">
                <p class="lead">{{ $item->head_line }}</p>
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

