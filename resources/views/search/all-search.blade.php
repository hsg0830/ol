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
    <script async src="https://cse.google.com/cse.js?cx=cbbfdeb59ef399f5b"></script>
    <div class="gcse-searchresults-only"></div>
  </main>

  <aside id="sidemenu">
    <!-- 검색창 -->
    @include('commons.side-search')
  </aside>
@endsection
