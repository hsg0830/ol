@extends('layouts.app')

<!-- ↓↓↓パンくずリスト↓↓↓ -->
@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="#">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <!-- <a itemprop="item" href="カテゴリー2のURL"> -->
      <span itemprop="name">질문게시판</span>
      <!-- </a> -->
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection
<!-- ↑↑↑パンくずリスト↑↑↑ -->

<!-- ↓↓↓.wrapper：メイン＋サイド↓↓↓ -->
@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="main">
    メインコンテンツが入る部分
  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->

  <!-- ↓↓↓サイドメニュー↓↓↓ -->
  @include('commons.side-recently')
  <!-- ↑↑↑サイドメニュー↑↑↑ -->

@endsection
<!-- ↑↑↑.wrapper：メイン＋サイド↑↑↑ -->
