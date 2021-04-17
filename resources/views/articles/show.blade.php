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
      <img src="{{ asset('img/bg_black-board_thum.png') }}" alt="" />
      <div class="title-block__category">{{ $article->category->name }}</div>
      <h1 class="title-block__title">{{ $article->title }}</h1>
      <div class="title-block__date">갱신날자: <time>{{ $article->created_at }}</time></div>
    </div>
    <!-- タイトル部 -->

    @if (count($article->subContents) > 0)
      <!-- 本文部 -->
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
      <!-- 本文部 -->
    @endif
  </main>

  @include('commons.side-recently')
@endsection

@section('js-files')
  <!-- ツールチップ -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.0.5/js/jquery.tooltipster.js"></script>
@endsection
