@extends('layouts.app')

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <aside id="sidemenu">
    <!-- 이번주기사 -->
    @include('commons.side-pick-up')

    {{-- 조선말대사전 --}}
    @include('commons.side-dic')

    <!-- 검색창 -->
    @include('commons.side-search')

    {{-- Lineリンク PC --}}
    <div class="ly-block top-line-link line-link-pc">
      <p>라인등록을 하시면 갱신정보를 수시로 받아보실수 있습니다.</p>
      <a href="https://lin.ee/s4RHXJS">
        <img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0">
      </a>
    </div>
  </aside>

  <main id="main">
    <!-- 갱신정보 -->
    <section class="ly-block info">
      <h2 class="info__heading">갱신정보</h2>
      <div class="info__list">
        <ul>
          @foreach ($notices as $notice)
            <li>
              {{-- {{ dd($notice->url) }} --}}
              {{-- @if ($notice->url) --}}
              <a href="{{ url('/') . $notice->url }}">
              {{-- @endif --}}
                <span class="info__date">
                  <span>{{ $notice->created_at->format('Y-m-d') }}</span>
                </span>
                <span class="info__category">
                  <span class="category-0{{ $notice->category }}">{{ $noticeCtegories[$notice->category] }}</span>
                </span>
                <span class="info__title">
                  <span>{{ $notice->title }}</span>
                </span>
              {{-- @if ($notice->url) --}}
              </a>
              {{-- @endif --}}
            </li>
          @endforeach
        </ul>
      </div>
    </section>

    <!-- 학습실 & 질문게시판 -->
    <section class="ly-block flex-block">

      <!-- 학습실 -->
      <div class="category-block">
        <h2 class="category-block__name">학습실</h2>
        <div class="category-block__content recent">
          {{-- <p class="recent__introduction">aaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaaaaa</p> --}}
          <div class="recent__tabs">
            <div class="tab" :class="{active: articleTab === 'tab-1'}" @click="articleTab = 'tab-1'">최신순</div>
            <div class="tab" :class="{active: articleTab === 'tab-2'}" @click="articleTab = 'tab-2'">인기순</div>
          </div>
          <div class="recent__item-block">

            {{-- 학습실 최신순 --}}
            <div v-show="articleTab == 'tab-1'">
              @foreach ($recentArticles as $article)
                <a href="{{ $article->url }}">
                  <div class="recent__item recent__item-01">
                    <span class="recent__item-01__category category-{{ $article->category_id }}">{{ $article->category->name }}</span>
                    <p class="recent__item-01__title">{{ $article->title }}</p>
                    {{-- <data class="recent__date">2021-04-17</data> --}}
                  </div>
                </a>
              @endforeach
            </div>

            {{-- 학습실 인기순 --}}
            <div v-show="articleTab == 'tab-2'">
              @foreach ($popularArticles as $article)
                <a href="{{ $article->url }}">
                  <div class="recent__item recent__item-01">
                    <span class="recent__item-01__category category-{{ $article->category_id }}">{{ $article->category->name }}</span>
                    <p class="recent__item-01__title">{{ $article->title }}</p>
                    {{-- <data class="recent__date">2021-04-17</data> --}}
                  </div>
                </a>
              @endforeach
            </div>

            <div class="more">
              <a href="{{ route('articles.index') }}"><i class="fas fa-angle-double-right"></i> 더보기</a>
            </div>
          </div>
        </div>
      </div>

      <!-- 질문게시판 -->
      <div class="category-block">
        <h2 class="category-block__name">질문게시판</h2>
        <div class="category-block__content recent">
          {{-- <p class="recent__introduction">aaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaaaaa</p> --}}
          <div class="recent__tabs">
            <div class="tab" :class="{active: bbsTab === 'tab-1'}" @click="bbsTab = 'tab-1'">최신순</div>
            <div class="tab" :class="{active: bbsTab === 'tab-2'}" @click="bbsTab = 'tab-2'">인기순</div>
          </div>

          <div class="recent__item-block">

            {{-- 질문게시판 최신순 --}}
            <div v-show="bbsTab == 'tab-1'">
              @foreach ($recentAsks as $ask)
                <a href="{{ $ask->url }}">
                  <div class="recent__item recent__item-02 category-{{ $ask->category_id }}">
                    <!-- <span class="recent__category category-200">문법</span> -->
                    <p class="recent__item-02__title">{{ $ask->title }}</p>
                    <!-- <data class="recent__date">2021-04-17</data> -->
                  </div>
                </a>
              @endforeach
            </div>

            {{-- 질문게시판 인기순 --}}
            <div v-show="bbsTab == 'tab-2'">
              @foreach ($popularAsks as $ask)
                <a href="{{ $ask->url }}">
                  <div class="recent__item recent__item-02 category-{{ $ask->category_id }}">
                    <!-- <span class="recent__category category-200">문법</span> -->
                    <p class="recent__item-02__title">{{ $ask->title }}</p>
                    <!-- <data class="recent__date">2021-04-17</data> -->
                  </div>
                </a>
              @endforeach
            </div>
            <div class="more">
              <a href="{{ route('bbs.index') }}"><i class="fas fa-angle-double-right"></i> 더보기</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 규범원문 & 자료실 -->
    <section class="ly-block flex-block">
      <!-- 규범원문 -->
      <div class="category-block link-block">
        <a href="{{ route('norms', 'index') }}"><h2 class="category-block__name">규범원문</h2></a>
        <div class="category-block__content">
          <div class="link-block__intro norm">
            <img src="{{ asset('img/block/top_01.png') }}" alt="" />
            <p>각종 규범원문을 볼수 있습니다.</p>
          </div>
          <div class="link-block__link norm">
            <button class="norm" onclick="location.href='{{ route('norms', 'index') }}'">보기</button>
          </div>
        </div>
      </div>

      <!-- 자료실 -->
      <div class="category-block link-block">
        <a href="{{ route('materials.index') }}"><h2 class="category-block__name">자료실</h2></a>
        <div class="category-block__content">
          <div class="link-block__intro ref">
            <img src="{{ asset('img/block/top_02.png') }}" alt="" />
            <p>사전, 코퍼스 및 각종 자료를 리용하실수 있습니다.</p>
            <div class="link-block__link ref">
              <button class="ref" onclick="location.href='{{ route('materials.index') }}'">보기</button>
            </div>
          </div>
        </div>
      </div>

    </section>

    {{-- Lineリンク SP --}}
    <div class="ly-block top-line-link line-link-sp">
      <p>라인등록을 하시면 갱신정보를 수시로 받아보실수 있습니다.</p>
      <a href="https://lin.ee/s4RHXJS">
        <img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0">
      </a>
    </div>

  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          articleTab: 'tab-1',
          bbsTab: 'tab-1',
        };
      },
    });

    app.mount('#main');
  </script>
@endsection
