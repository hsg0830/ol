@extends('layouts.editor')

@section('title', '얼 -- 管理者トップ画面')

@section('content')
  <main id="main">
    <h1 class="page-title">管理者トップ画面</h1>

    <div style="margin: 0 auto; width: 80%; padding: 3rem; background-color: aqua">
      <h2 style="text-align: center">【作業用】</h2>
      <ul style="line-height: 2rem;">
        <li><a href="{{ route('media') }}">● メディア管理画面</a></li>
        <li><a href="{{ route('articles.list') }}">● 学習室記事管理画面</a></li>
        <li><a href="{{ route('articles.create') }}">● 学習室記事投稿画面</a></li>
        <li><a href="{{ route('users.management') }}">● 会員管理画面</a></li>
        <li><a href="{{ route('contacts.list') }}">● 問い合わせ一覧画面</a></li>
      </ul>
    </div>
  </main>
@endsection
