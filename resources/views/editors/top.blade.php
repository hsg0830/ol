@extends('layouts.editor')

@section('title', '얼 -- 管理者トップ画面')

@section('content')
  <main id="main">
    <h1 class="page-title">管理者トップ画面</h1>

    <div style="margin: 0 auto; width: 80%; padding: 3rem; background-color: lemonchiffon">
      <ul style="line-height: 2rem;">
        <li><a href="{{ route('media') }}">● メディア管理画面</a></li>
        <li><a href="{{ route('articles.list') }}">● 学習室記事管理画面</a></li>
        <li><a href="{{ route('articles.create') }}">● 学習室記事投稿画面</a></li>
        {{-- <li><a href="{{ route('qa.list') }}">● QA管理画面</a></li> --}}
        {{-- <li><a href="{{ route('qa.create') }}">● QA投稿画面</a></li> --}}
        <li><a href="{{ route('bbs.list') }}">● 掲示板管理画面</a></li>
        <li><a href="{{ route('contacts.list') }}">● 問い合わせ管理画面</a></li>
        <li><a href="{{ route('tasks.progress') }}">● 学習課題管理画面</a></li>
        <li><a href="{{ route('tasks.create') }}">● 学習課題追加画面</a></li>
        <li><a href="{{ route('notices.list') }}">● お知らせ管理画面</a></li>
        <li><a href="{{ route('notices.create') }}">● お知らせ投稿画面</a></li>

        @if (Auth::user()->role > 0)
          <li><a href="{{ route('users.management') }}">● 会員管理画面</a></li>
          <li><a href="{{ route('users.mount') }}">● 機関別会員統計</a></li>
        @endif
      </ul>
    </div>
  </main>
@endsection
