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
      <span itemprop="name">회원정보관리</span>
      <!-- </a> -->
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
<main id="one-column">
  <h1 class="category-title">회원정보관리</h1>

  {{ $user->name}}
</main>
@endsection
