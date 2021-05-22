@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 일문일답')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ route('qa.index') }}">
        <span itemprop="name">일문일답</span>
      </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <div class="category-page-title">
      <img src="{{ asset('img/title/category_title_02.png') }}" alt="" />
      <h1>일문일답</h1>
    </div>

    <div class="qa-item">
      <div class="qa-item__question">
        <div class="mark_and_category">
          <span class="mark">Q</span>
          <span class="category category-{{ $question->category_id }}">{{ $question->category->name }}</span>
        </div>
        <p class="question-sentence">{{ $question->title }}</p>
        <span class="question-date">{{ $question->date }}</span>
      </div>
      <div class="qa-item__answer at-show">
        <span class="mark">A</span>
        <p class="answer-message">{!! nl2br($question->answer) !!}</p>
      </div>
    </div>

    <div class="message" style="margin-top: 2rem;">
      <a href="{{ route('qa.index')}}" class="text-underline">일문일답 전체보기</a>
    </div>
  </main>

  @include('commons.side')
@endsection
