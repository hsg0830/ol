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
      <!-- <a itemprop="item" href="カテゴリー2のURL"> -->
      <span itemprop="name">자료실</span>
      <!-- </a> -->
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <div class="category-page-title">
      <img src="{{ asset('img/articles_top.png') }}" alt="" />
      <h1>자료실</h1>
    </div>

    <div class="category-page-introduction">
      <p>여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다.</p>
    </div>

    <div class="message block" style="margin-top: 3rem;">
      <h2 class="category-title">준비중</h2>
      <p>미안합니다.</p>
      <p>이 페지는 현재 제작중이며 2021년 8월경에 공개할 예정입니다.</p>
      <p>제작이 끝나는 차제로 홈페지를 통하여 알려드리겠으므로 잠시만 기다려주십시오.</p>
      <a href="{{ url('/') }}" class="text-underline">첫페지에로</a>
    </div>
  </main>

  @include('commons.side-recently')
@endsection
