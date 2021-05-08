@extends('layouts.app')

@section('content')
  <main id="one-column">

    <!-- 학습실 -->
    <section class="ly-block">
      <div class="category-block">
        <h2 class="category-block__name">학습실</h2>
        <div class="category-block__content">
          <!-- slider -->
          {{-- <div class="swiper-container top-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide category-100">
                <img src="./img/articles_01.png" alt="" />
                <p>어휘</p>
              </div>
              <div class="swiper-slide category-200">
                <img src="./img/articles_02.png" alt="" />
                <p>문법</p>
              </div>
              <div class="swiper-slide category-300">
                <img src="./img/articles_03.png" alt="" />
                <p>언어규범</p>
              </div>
              <div class="swiper-slide category-400">
                <img src="./img/articles_04.png" alt="" />
                <p>들어보기</p>
              </div>
            </div>

            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="prev"><i class="fas fa-angle-left"></i></div>
            <div class="next"><i class="fas fa-angle-right"></i></div>
          </div> --}}

          <!-- 자주 보는 기사 -->
          <div class="flex-block recent-articles">
            <div class="recent-articles__info">
              <h3>자주 보는 기사</h3>
              <a><i class="fas fa-angle-double-right"></i> 전체 기사 보기</a>
            </div>
            <div class="recent-articles__item">
              <span class="recent-articles__category category-100">어휘</span>
              <p class="recent-articles__title">맞춤법이란 무엇인가?</p>
              <time class="recent-articles__date">2021-04-17</time>
            </div>
            <div class="recent-articles__item">
              <span class="recent-articles__category category-200">문법</span>
              <p class="recent-articles__title">맞춤법이란 무엇인가? 맞춤법이란 무엇인가?</p>
              <time class="recent-articles__date">2021-04-17</time>
            </div>
            <div class="recent-articles__item">
              <span class="recent-articles__category category-300">언어규범</span>
              <p class="recent-articles__title">맞춤법이란 무엇인가?</p>
              <time class="recent-articles__date">2021-04-17</time>
            </div>
            <div class="recent-articles__item">
              <span class="recent-articles__category category-400">들어보기</span>
              <p class="recent-articles__title">맞춤법이란 무엇인가?</p>
              <time class="recent-articles__date">2021-04-17</time>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="flex-block ly-block">
      <!-- 일문일답 -->
      <section class="category-block">
        <h2 class="category-block__name">일문일답</h2>
        <div class="category-block__content recent-qa recent-common">
          <p class="recent-qa__introduction">aaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaaaaa</p>
          <div class="recent-qa__item">
            <span class="recent-qa__category category-200">문법</span>
            <p class="recent-qa__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
            <!-- <data class="recent-qa__date">2021-04-17</data> -->
          </div>
          <div class="recent-qa__item">
            <span class="recent-qa__category category-100">어휘</span>
            <p class="recent-qa__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
            <!-- <data class="recent-qa__date">2021-04-17</data> -->
          </div>
          <div class="recent-qa__item">
            <span class="recent-qa__category category-500">기타</span>
            <p class="recent-qa__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
            <!-- <data class="recent-qa__date">2021-04-17</data> -->
          </div>
          <div class="recent-qa__item">
            <span class="recent-qa__category category-300">언어규범</span>
            <p class="recent-qa__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
            <!-- <data class="recent-qa__date">2021-04-17</data> -->
          </div>
          <div class="more">
            <a href="#"><i class="fas fa-angle-double-right"></i> 더보기</a>
          </div>
        </div>
      </section>

      <section>
        <!-- 규범원문 -->
        <section class="category-block link-block">
          <h2 class="category-block__name">규범원문</h2>
          <div class="category-block__content">
            <div class="link-block__intro norm">
              <img src="./img/articles_01.png" alt="" />
              <p>introduction introduction introduction introduction introduction</p>
            </div>
            <div class="link-block__link norm">
              <button class="norm">button</button>
            </div>
          </div>
        </section>

        <!-- 자료실 -->
        <section class="category-block link-block">
          <h2 class="category-block__name">자료실</h2>
          <div class="category-block__content">
            <div class="link-block__intro ref">
              <img src="./img/articles_01.png" alt="" />
              <p>introduction introduction introduction introduction introduction</p>
            </div>
            <div class="link-block__link ref">
              <button class="ref">button</button>
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
              <li>
                <p>aaaaaaaaaa aa aa aa aa aa aa</p>
              </li>
              <li>
                <p>aaaaaaaaaa aa aa aa aa aa aa</p>
              </li>
              <li>
                <p>aaaaaaaaaa aa aa aa aa aa aa</p>
              </li>
              <li>
                <p>aaaaaaaaaa aa aa aa aa aa aa aaaaaaaaaa aa aa aa aa aa aa</p>
              </li>
            </ul>
            <div class="more">
              <a href="#"><i class="fas fa-angle-double-right"></i> 더보기</a>
            </div>
          </div>
        </section>

        <!-- 갱신정보 -->
        <section class="category-block">
          <div class="info-block recent-common">
            <h2>갱신정보</h2>
            <ul>
              <li>
                <span class="info-block__date">2021-04-17</span>
                <span>aaaaaaa aaaaaaa aaaaaaa</span>
              </li>
              <li>
                <span class="info-block__date">2021-04-17</span>
                <span>aaaaaaa aaaaaaa aaaaaaa</span>
              </li>
              <li>
                <span class="info-block__date">2021-04-17</span>
                <span>aaaaaaa aaaaaaa aaaaaaa</span>
              </li>
            </ul>
          </div>
        </section>
      </section>
    </div>

    <section class="ly-block">バナー広告欄？</section>
  </main>
@endsection

@section('js-files')
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection

@section('js-script')
  <script>
    const swiper = new Swiper('.swiper-container', {
      loop: true,
      speed: 1000,
      effect: 'fade',
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.next',
        prevEl: '.prev',
      },
    });
  </script>
@endsection
