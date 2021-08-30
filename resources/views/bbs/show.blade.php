@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 질문게시판')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ route('bbs.index') }}">
        <span itemprop="name">질문게시판</span>
      </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <div class="category-page-title">
      <img src="{{ asset('img/title/category_title_05.png') }}" alt="" />
      <h1>질문게시판</h1>
    </div>

    <div class="ask">
      <h2 class="ask__title"><span>{{ $ask->title }}</span></h2>
      <div class="ask__info">
        <span class="category category-{{ $ask->category->id }}">{{ $ask->category->name }}</span>
        <span class="date">접수일: {{ $ask->created_at->format('Y-m-d') }}</span>
      </div>
    </div>

    {{-- お気に入りボタン --}}
    @include('commons.favorite-btn')
    {{-- お気に入りボタン --}}

    <div class="ask-detail">{!! $ask->description !!}</div>

    <div class="reply">
      <div class="reply__date">회답일: {{ $ask->replied_at->format('Y-m-d') }}</div>
      <div class="reply__content">{!! $ask->reply !!}</div>
    </div>

    {{-- お気に入りボタン --}}
    @include('commons.favorite-btn')
    {{-- お気に入りボタン --}}

    {{-- 課題状況 --}}
    @include('commons.task-status')
    {{-- 課題状況 --}}

    <div class="ask-link">
      질문하실것이 있으시면 이쪽으로 → <a href="{{ route('bbs.index') }}#ask-form"><i class="fas fa-chevron-circle-right"></i>
        질문하기</a>
    </div>

    {{-- 関連記事 --}}
    <div id="list-container" class="list-container" style="margin-top: 4rem;">
      <div class="list-container__related"><i class="fas fa-book-reader"></i> 관련질문</div>

      <div class="list-container__wrapper">
        @foreach ($relatedAsks as $item)
          <div class="list-item">
            <a href="{{ $item->url }}">
              <div class="list-item__header">
                @if ($item->category_id == 100)
                  <img src="{{ asset('img/thum/bg_post_it_light_01.png') }}" alt="" />
                @elseif ($item->category_id == 200)
                  <img src="{{ asset('img/thum/bg_post_it_light_02.png') }}" alt="" />
                @elseif ($item->category_id == 300)
                  <img src="{{ asset('img/thum/bg_post_it_light_03.png') }}" alt="" />
                @elseif ($item->category_id == 500)
                  <img src="{{ asset('img/thum/bg_post_it_light_04.png') }}" alt="" />
                @endif
                {{-- <p class="title {{ $item->category_id == 100 ? 'color-white' : '' }}"> --}}
                <p class="title">
                  {{ $item->title }}</p>
              </div>
              <div class="list-item__content">
                <div class="list-item__content__info">
                  <p class="count">열람수: <span>{{ $item->viewed_count }}</span>번</p>
                  <p class="date">{{ $item->replied_date }}</p>
                  {{-- <p class="category category-{{ $item->category_id }}">{{ $item->category->name }}</p> --}}
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </main>

  @include('commons.side')

@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          ask: {!! $ask !!},
          isFollowing: {{ $isFollowing ? 'true' : 'false' }},
          task: {!! $task ?? 'null' !!},
          isCleared: {{ $isCleared ? 'true' : 'false' }},
          isAuthorized: {{ $isAuthorized ? 'true' : 'false' }},
        }
      },
      methods: {
        changeFavoriteStatus() {
          if (this.isAuthorized === false) {
            return alert('로그인하셔야 합니다.');
          }

          let url = `/bbs/${this.ask.id}/`;
          let method = 'POST';

          if (this.isFollowing == false) {
            url += 'follow';
          } else {
            url += 'unfollow';
            method = 'DELETE';
          }

          const params = {
              _method: method,
          };

          axios
            .post(url, params)
            .then((response) => {
              if (response.data.result === true) {
                this.isFollowing = response.data.isFollowing;
              }
            })
            .catch((error) => {
              console.log(error);
            });
        },
        changeTaskStatus() {
          let url = `/tasks/${this.task.id}/`;
          let method = 'POST';

          if (this.isCleared == false) {
            url += 'cleared';
          } else {
            url += 'un-cleared';
            method = 'DELETE';
          }

          const params = {
              _method: method,
          };

          axios.post(url, params)
            .then((response) => {
              if (response.data.result === true) {
                this.isCleared = response.data.isCleared;
              }
            })
            .catch((error) => {
              console.log(error);
            });
        },
      },
    });

    app.mount('#main');
  </script>
@endsection
