@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 검색결과')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name">검색결과</span>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <h1 class="category-title">검색결과</h1>

    <h2 class="my-favorites__category">학습실</h2>
    @if (count($articles) > 0)
      <ul class="my-favorites__list">
        @foreach ($articles as $article)
          <li class="my-favorites__list__item">
            <a href="{{ $article->url }}"><i class="fas fa-circle"></i>{{ $article->title }}</a>
          </li>
        @endforeach
      </ul>
    @else
      <div class="my-favorites__list">
        <p>해당되는 기사가 없습니다.</p>
      </div>
    @endif

    <h2 class="my-favorites__category">질문게시판</h2>
    @if (count($asks) > 0)
      <ul class="my-favorites__list">
        @foreach ($asks as $ask)
          <li class="my-favorites__list__item">
            <a href="{{ $ask->url }}"><i class="fas fa-circle"></i>{{ $ask->title }}</a>
          </li>
        @endforeach
      </ul>
      @else
      <div class="my-favorites__list">
        <p>해당되는 질문이 없습니다.</p>
      </div>
    @endif
  </main>

  <aside id="sidemenu">
    <!-- 검색창 -->
    @include('commons.side-search')
  </aside>
@endsection
