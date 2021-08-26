@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 자료실')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name">자료실</span>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <div class="category-page-title">
      <img src="{{ asset('img/title/category_title_04.png') }}" alt="" />
      <h1>자료실</h1>
    </div>

    <div class="qa-item">
      <div class="qa-item__question">
        <div class="mark_and_category">
          <span class="mark"><img src="{{ asset('img/icons/file_type_' . $types[$material->type_key] . '.png') }}" alt="">
          </span>
          <span class="category category-">{{ $categories[$material->category_key] }}</span>
        </div>
        <p class="question-sentence">{{ $material->title }}</p>
        <span class="question-date">{{ $material->released_at }}</span>
      </div>
      <div class="qa-item__answer at-show">
        {{-- <span class="mark">설명</span> --}}
        <div class="answer-message">{!! nl2br($material->description) !!}</div>
        <form action="{{ route('materials.download', $material) }}">
          @csrf
          <button type="submit" class="global-btn">내리적재</button>
        </form>
      </div>
    </div>

    <div class="message" style="margin-top: 2rem;">
      <a href="{{ route('materials.index')}}" class="text-underline">자료 전체보기</a>
    </div>
  </main>

  @include('commons.side')
@endsection
