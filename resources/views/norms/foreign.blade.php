@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 외국말적기법')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/norm.css') }}">
@endsection

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ route('norms', 'index') }}">
        <span itemprop="name">규범원문</span>
      </a>
      <meta itemprop="position" content="2" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name">외국말적기법</span>
      <meta itemprop="position" content="3" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">

    <h1 class="page-title">외국말적기법</h1>

    <div class="message block" style="margin-top: 3rem;">
      <h2 class="category-title">준비중</h2>
      <p>미안합니다.</p>
      <p>현재 준바중이며 조만간에 공개할 예정입니다.</p>
      <p>제작이 끝나는 차제로 홈페지를 통하여 알려드리겠으므로 잠시만 기다려주십시오.</p>
      <a href="{{ url('/') }}" class="text-underline">첫페지에로</a>
    </div>
  </main>
  
  @include('commons.side-recently')
@endsection
