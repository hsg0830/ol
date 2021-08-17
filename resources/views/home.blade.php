@extends('layouts.app')

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <aside id="sidemenu">
    <!-- 이번주기사 & 검색창 -->
    <!-- <section class="ly-block"> -->
    <!-- 이번주기사 -->
    <div class="pick-up">
      <h2 class="pick-up__heading">이번주 학습과제</h2>
      <a href="#">
        <div class="pick-up__content">
          <span class="pick-up__content__category category-100">어휘</span>
          <p class="pick-up__content__title">조직생활은 누리는것인가? 조직생활은 누리는것인가?</p>
        </div>
      </a>
      <div class="more">
        <a href="#"><i class="fas fa-angle-double-right"></i> 이달 과제 확인하기</a>
      </div>
    </div>

    <!-- 검색창 -->
    <div class="top-search">
      <div class="top-search__heading">기사, 질문 검색</div>
      <form action="#" class="top-search__form">
        <div class="top-search__select">
          <select name="" id="">
            <option value="">제목</option>
            <option value="">전체</option>
          </select>
          <input type="search" name="" id="" />
        </div>
        <div class="top-search__radio">
          <div>
            <input type="radio" name="" id="radio-a" value="" />
            <label for="radio-a">전체</label>
          </div>
          <div>
            <input type="radio" name="" id="radio-b" value="" />
            <label for="radio-b">학습실</label>
          </div>
          <div>
            <input type="radio" name="" id="radio-c" value="" />
            <label for="radio-c">질문게시판</label>
          </div>
        </div>
        <div class="top-search__submit">
          <input type="submit" value="검색" class="btn global-btn" />
        </div>
      </form>
    </div>
    <!-- </section> -->
  </aside>

  <main id="main">
    <!-- 갱신정보 -->
    <section class="ly-block info">
      <!-- <h2 class="info__heading">갱신정보</h2> -->
      <div class="info__list">
        <ul>
          <li>
            <a href="#">
              <span class="info__date">
                <span>2021-08-12</span>
              </span>
              <span class="info__category">
                <span class="category-01">학습실</span>
              </span>
              <span class="info__title">
                <span>조직생활은 누리는것인가?</span>
              </span>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="info__date">
                <span>2021-08-12</span>
              </span>
              <span class="info__category">
                <span class="category-02">게시판</span>
              </span>
              <span class="info__title">
                <span>조직생활은 누리는것인가? 조직생활은 누리는것인가?</span>
              </span>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="info__date">
                <span>2021-08-12</span>
              </span>
              <span class="info__category">
                <span class="category-02">게시판</span>
              </span>
              <span class="info__title">
                <span>조직생활은 누리는것인가?</span>
              </span>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="info__date">
                <span>2021-08-12</span>
              </span>
              <span class="info__category">
                <span class="category-03">새기능</span>
              </span>
              <span class="info__title">
                <span>조직생활은 누리는것인가?</span>
              </span>
            </a>
          </li>
          <li>
            <a href="#">
              <span class="info__date">
                <span>2021-08-12</span>
              </span>
              <span class="info__category">
                <span class="category-01">학습실</span>
              </span>
              <span class="info__title">
                <span>조직생활은 누리는것인가?</span>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </section>

    <!-- 학습실 & 질문게시판 -->
    <section class="ly-block flex-block">
      <!-- 학습실 -->
      <div class="category-block">
        <h2 class="category-block__name">학습실</h2>
        <div class="category-block__content recent">
          <p class="recent__introduction">aaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaaaaa</p>
          <div class="recent__tabs">
            <div class="tab" :class="{active: articleTab === 'tab-1'}" @click="articleTab = 'tab-1'">최신순</div>
            <div class="tab" :class="{active: articleTab === 'tab-2'}" @click="articleTab = 'tab-2'">인기순</div>
          </div>
          <div class="recent__item-block">
            <div v-show="articleTab == 'tab-1'">
              <div class="recent__item recent__item-01">
                <span class="recent__item-01__category category-200">문법</span>
                <p class="recent__item-01__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-01">
                <span class="recent__item-01__category category-200">문법</span>
                <p class="recent__item-01__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-01">
                <span class="recent__item-01__category category-200">문법</span>
                <p class="recent__item-01__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-01">
                <span class="recent__item-01__category category-200">문법</span>
                <p class="recent__item-01__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
            </div>
            <div v-show="articleTab == 'tab-2'">
              <div class="recent__item recent__item-01">
                <span class="recent__item-01__category category-400">문법</span>
                <p class="recent__item-01__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-01">
                <span class="recent__item-01__category category-400">문법</span>
                <p class="recent__item-01__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-01">
                <span class="recent__item-01__category category-400">문법</span>
                <p class="recent__item-01__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-01">
                <span class="recent__item-01__category category-400">문법</span>
                <p class="recent__item-01__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
            </div>
            <div class="more">
              <a href="#"><i class="fas fa-angle-double-right"></i> 더보기</a>
            </div>
          </div>
        </div>
      </div>

      <!-- 질문게시판 -->
      <div class="category-block">
        <h2 class="category-block__name">질문게시판</h2>
        <div class="category-block__content recent">
          <p class="recent__introduction">aaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaaaaa</p>
          <div class="recent__tabs">
            <div class="tab" :class="{active: bbsTab === 'tab-1'}" @click="bbsTab = 'tab-1'">최신순</div>
            <div class="tab" :class="{active: bbsTab === 'tab-2'}" @click="bbsTab = 'tab-2'">인기순</div>
          </div>
          <div class="recent__item-block">
            <div v-show="bbsTab == 'tab-1'">
              <div class="recent__item recent__item-02 category-100">
                <!-- <span class="recent__category category-200">문법</span> -->
                <p class="recent__item-02__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-02 category-100">
                <!-- <span class="recent__category category-200">문법</span> -->
                <p class="recent__item-02__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-02 category-100">
                <!-- <span class="recent__category category-200">문법</span> -->
                <p class="recent__item-02__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-02 category-100">
                <!-- <span class="recent__category category-200">문법</span> -->
                <p class="recent__item-02__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
            </div>
            <div v-show="bbsTab == 'tab-2'">
              <div class="recent__item recent__item-02 category-300">
                <!-- <span class="recent__category category-200">문법</span> -->
                <p class="recent__item-02__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-02 category-300">
                <!-- <span class="recent__category category-200">문법</span> -->
                <p class="recent__item-02__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-02 category-300">
                <!-- <span class="recent__category category-200">문법</span> -->
                <p class="recent__item-02__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
              <div class="recent__item recent__item-02 category-300">
                <!-- <span class="recent__category category-200">문법</span> -->
                <p class="recent__item-02__title">bbbbbbbbbbbbb bbbbbbbbbbbbbbbbb</p>
                <!-- <data class="recent__date">2021-04-17</data> -->
              </div>
            </div>
            <div class="more">
              <a href="#"><i class="fas fa-angle-double-right"></i> 더보기</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 규범원문 & 자료실 -->
    <section class="ly-block flex-block">
      <!-- 규범원문 -->
      <div class="category-block link-block">
        <h2 class="category-block__name">규범원문</h2>
        <div class="category-block__content">
          <div class="link-block__intro norm">
            <img src="img/block/top_01.png" alt="" />
            <p>각종 규범원문을 볼수 있습니다.</p>
          </div>
          <div class="link-block__link norm">
            <button class="norm">button</button>
          </div>
        </div>
      </div>

      <!-- 자료실 -->
      <div class="category-block link-block">
        <h2 class="category-block__name">자료실</h2>
        <div class="category-block__content">
          <div class="link-block__intro ref">
            <img src="img/block/top_02.png" alt="" />
            <p>사전, 코퍼스 및 각종 자료를 리용하실수 있습니다.</p>
          </div>
          <div class="link-block__link ref">
            <button class="re">button</button>
          </div>
        </div>
      </div>
    </section>
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
