@extends('layouts.app')

<!-- ↓↓↓.wrapper：メイン＋サイド↓↓↓ -->
@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="one-column">
    <h1 class="category-title">管理者トップ画面</h1>

    @auth('editors')
      <form method="POST" action="{{ route('editors.logout') }}">
        @csrf
        <button class="global-btn">로그아우트</button>
      </form>
    @endauth
    
    <div style="margin: 0 auto; width: 80%; padding: 3rem; background-color: aqua">
      <h2 style="text-align: center">【作業用】</h2>
      <ul>
        <li><a href="{{ route('media') }}">● メディア管理画面</a></li>
        <li><a href="{{ route('articles.create') }}">● 学習室記事投稿画面</a></li>
      </ul>
    </div>
  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->

@endsection
<!-- ↑↑↑.wrapper：メイン＋サイド↑↑↑ -->
