@extends('layouts.app')

@section('content')
  <main id="one-column">

    {{-- トップのお知らせ --}}
    @if ($topNotice)
      <div class="top-notice-box">
        <div class="top-notice-box__title">{{ $topNotice->title }}</div>
        <p class="top-notice-box__description">{!! nl2br($topNotice->description) !!}</p>
      </div>
    @endif

    <!-- 학습실 -->
    <section class="ly-block">
      <div class="category-block">
        <h2 class="category-block__name">학습실</h2>
        <div class="category-block__content">

          <!-- 최근기사 -->
          <div class="flex-block recent-articles">
            <div class="recent-articles__info">
              <h3>최근기사</h3>
              <a href="{{ route('articles.index') }}"><i class="fas fa-angle-double-right"></i> 더보기</a>
            </div>

            @foreach ($recentArticles as $article)
              <a href="{{ $article->url }}" class="recent-articles__item">
                <div>
                  <span
                    class="recent-articles__category category-{{ $article->category_id }}">{{ $article->category->name }}</span>
                  <p class="recent-articles__title">{{ $article->short_title }}</p>
                  <time class="recent-articles__date">{{ $article->date }}</time>
                </div>
              </a>
            @endforeach

          </div>

          <!-- 인기기사 -->
          <div class="flex-block recent-articles" style="margin-top: 3rem;">
            <div class="recent-articles__info">
              <h3>인기기사</h3>
              <a href="{{ route('articles.index') }}"><i class="fas fa-angle-double-right"></i> 더보기</a>
            </div>

            @foreach ($popularArticles as $article)
              <a href="{{ $article->url }}" class="recent-articles__item">
                <div>
                  <span
                    class="recent-articles__category category-{{ $article->category_id }}">{{ $article->category->name }}</span>
                  <p class="recent-articles__title">{{ $article->short_title }}</p>
                  <time class="recent-articles__date">{{ $article->date }}</time>
                </div>
              </a>
            @endforeach

          </div>

        </div>
      </div>
    </section>

    <div class="flex-block ly-block">
      <!-- 일문일답 -->
      <section class="category-block">
        <h2 class="category-block__name">일문일답</h2>
        <div class="category-block__content recent-qa recent-common">
          @foreach ($questions as $question)
            <div class="recent-qa__item" id="qa-{{ $question->id }}" @click="showQa($event)">
              <span
                class="recent-qa__category category-{{ $question->category_id }}">{{ $question->category->name }}</span>
              <p class="recent-qa__title">{{ $question->title }}</p>

              <div class="recent-qa__answer" id="qa-answer-{{ $question->id }}">
                {!! nl2br($question->answer) !!}
                <button class="btn global-btn" id="qa-btn-{{ $question->id }}" @click="hideQa($event)">닫기</button>
              </div>
            </div>
          @endforeach

          <div class="more">
            <a href="{{ route('qa.index') }}"><i class="fas fa-angle-double-right"></i> 더보기</a>
          </div>
        </div>
      </section>

      <section>
        <!-- 규범원문 -->
        <section class="category-block link-block">
          <h2 class="category-block__name">규범원문</h2>
          <div class="category-block__content">
            <div class="link-block__intro norm">
              <img src="{{ asset('img/block/top_01.png') }}" alt="" />
              <p>각종 규범웜문을 볼수 있습니다.</p>
            </div>
            <div class="link-block__link norm">
              <button class="norm" onclick="location.href='{{ route('norms', 'index') }}'">보기</button>
            </div>
          </div>
        </section>

        <!-- 자료실 -->
        <section class="category-block link-block">
          <h2 class="category-block__name">자료실</h2>
          <div class="category-block__content">
            <div class="link-block__intro ref">
              <img src="{{ asset('img/block/top_02.png') }}" alt="" />
              <p>사전, 코퍼스 및 각종 자료를 리용하실수 있습니다.</p>
              <div class="link-block__link ref">
                <button class="ref" onclick="location.href='{{ route('materials.index') }}'">보기</button>
              </div>
            </div>
        </section>
      </section>

      <section>
        <!-- 질문게시판 -->
        <section class="category-block">
          <h2 class="category-block__name">질문게시판</h2>
          <div class="category-block__content recent-ask recent-common">
            <ul>

              @foreach ($asks as $ask)
                <a href="{{ $ask->url }}">
                  <li>
                    <p>{{ $ask->title }}</p>
                  </li>
                </a>

              @endforeach
            </ul>
            <div class="more">
              <a href="{{ route('bbs.index') }}"><i class="fas fa-angle-double-right"></i> 더보기</a>
            </div>
          </div>
        </section>

        <!-- 갱신정보 -->
        <section class="category-block">
          <div class="info-block recent-common">
            <h2>갱신정보</h2>
            @if (count($notices) > 0)
              <ul>
                @foreach ($notices as $notice)
                  <li>
                    <span class="info-block__date">{!! $notice->created_at->format('Y-m-d') !!}</span>
                    <span>{{ $notice->title }}</span>
                  </li>
                @endforeach
              </ul>
            @endif
          </div>
        </section>
      </section>
    </div>

    {{-- バナー広告 --}}
    <section class="ly-block top-banners">
      <div class="top-banners__item">
        <a href="https://form.run/@manhattanroll-1607396609" target="_blank">
          <img src="{{ asset('/img/banners/manhattan.png') }}" alt="">
        </a>
      </div>
      <div class="top-banners__item">
        <a href="https://onlinestore.xmobile.ne.jp/xt/1/1iFz" target="_blank">
          <img src="{{ asset('/img/banners/x-mobile.png') }}" alt="">
        </a>
      </div>
      <div class="top-banners__item">
        <a href="https://www.eight-wedding.com/" target="_blank">
          <img src="{{ asset('/img/banners/8-wedding.jpg') }}" alt="">
        </a>
      </div>
      <div class="top-banners__item">
        <a href="https://denki.remixpoint.co.jp/lp/teiatsu/" target="_blank">
          <img src="{{ asset('/img/banners/remix.jpg') }}" alt="">
        </a>
      </div>
    </section>


    {{-- Lineリンク --}}
    <div class="ly-block top-line-link">
      <p>라인등록을 하시면 갱신정보를 수시로 받아보실수 있습니다.</p>
      <a href="https://lin.ee/s4RHXJS">
        <img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0">
      </a>
    </div>
  </main>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          currentIdValue: '',
        }
      },
      methods: {
        showQa(evt) {
          $('.recent-qa__answer').hide();
          const targetId = $(evt.target).parent().attr('id').split('-');
          const idValue = targetId[targetId.length - 1];
          this.currentIdValue = idValue;
          $(`#qa-answer-${idValue}`).fadeIn();
        },
        hideQa(evt) {
          evt.stopPropagation();
          $(`#qa-answer-${this.currentIdValue}`).hide();
        },
      },
    });

    app.mount('#one-column');

  </script>
@endsection
