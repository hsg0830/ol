@extends('layouts.app')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      {{-- <a itemprop="item" href="{{ route('articles.index') }}"> --}}
      <span itemprop="name">일문일답</span>
      {{-- </a> --}}
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <!-- <h1 class="category-title">언어규범과 관련한 Q&A</h1> -->
    <div class="category-page-title">
      <img src="{{ asset('img/norms_top.png') }}" alt="" />
      <h1>일문일답</h1>
    </div>

    <div class="category-page-introduction">
      <p>여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다.</p>
    </div>

    <div class="list-container">

      {{-- カテゴリーセレクトボタン --}}
      <div class="list-container__selector">
        <category-select-button :categories="categories" v-model="categoryNo" @child-click="selectCategory">
        </category-select-button>
      </div>

      <div class="search-form">
        <p class="search-form__title">키워드로 검색</p>
        <div class="search-form__wrapper">
          <input type="text" class="form-control" v-model="searchWord">
          <button class="global-btn" @click="searchQuestions">검색</button>
        </div>
      </div>
      <div class="list-container__count">
        <i class="fas fa-file-signature"></i> 해당되는 물음수: <span v-text="questions.total"></span>건
      </div>

      <div class="list-container__wrapper">
        {{-- QAの一アイテム --}}
        <div class="qa-item" v-for="question in questions.data" :key="question.id">
          <div class="qa-item__question">
            <div class="mark_and_category">
              <span class="mark">Q</span>
              <span class="category" :class="getCategoryClass(question.category_id)"
                v-text="question.category.name"></span>
            </div>
            <p class="question-sentence" v-text="question.title"></p>
            <span class="question-date" v-text="question.date"></span>
            <i class="qa-ex-btn fas fa-plus" @click="changeView(question.id, $event)"></i>
          </div>
          <div class="qa-item__answer" style="display: none;">
            <span class="mark">A</span>
            <p class="answer-message" v-html="question.answer"></p>
          </div>
        </div>
        {{-- QAの一アイテム ここまで --}}
      </div>
    </div>

    {{-- pagination --}}
    <v-pagination :data="questions" @move-page="movePage($event)"></v-pagination>
  </main>

  @include('commons.side-recently')
@endsection

@section('js-files')
  <script src="{{ asset('js/vue-components/CategoryButton.js') }}"></script>
  <script src="{{ asset('js/vue-components/PaginationComponent.js') }}"></script>
  <script src="https://unpkg.com/vue@next"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          page: 1,
          categoryNo: 0,
          questions: [],
          categories: [],
          searchWord: '',
        }
      },
      components: {
        'category-select-button': categoryButtonComponent,
        'v-pagination': paginationComponent,
      },
      methods: {
        getItems() {
          const url = '/qa/pagination';
          axios.get(url, {
              params: {
                page: this.page,
                categoryNo: this.categoryNo,
                searchWord: this.searchWord,
              }
            })
            .then((response) => {
              this.questions = response.data.questions;
              this.categories = response.data.categories;
            });
        },
        getCategoryClass(index) {
          return `category-${index}`;
        },
        changeView(index, event) {
          const $clickedBtn = $(event.target);
          const clickedBtnStatus = $clickedBtn.hasClass('fa-plus');
          const selectedItem = $clickedBtn.parent().next();

          if (clickedBtnStatus === true) {
            $clickedBtn.removeClass('fa-plus');
            $clickedBtn.addClass('fa-minus');
            selectedItem.show();

            const url = `qa/${index}/increment`;
            axios.post(url, 'post')
          } else {
            $clickedBtn.removeClass('fa-minus');
            $clickedBtn.addClass('fa-plus');
            selectedItem.hide();
          }
        },
        movePage(page) {
          this.page = page;
          location.hash = `${this.page}%${this.categoryNo}`;
          this.getItems();
          Vue.nextTick(() => {
            const scrollTop = $('#list-container').offset().top - 50;
            $('html,body').animate({
              scrollTop: scrollTop
            }, 'fast');
          });
        },
        getHashValue() {
          const [hashPage, hashCategoryNo] = location.hash.substring(1).split('%');

          if (hashPage > 0) {
            this.page = hashPage;
          } else {
            this.page = 1;
          }

          if (hashCategoryNo > 1) {
            this.categoryNo = hashCategoryNo;
          } else {
            this.categoryNo = 0;
          }
        },
        selectCategory(categoryNo) {
          this.categoryNo = categoryNo;
          this.page = 1;
          location.hash = `${this.page}%${this.categoryNo}`;
          this.getItems();
        },
        searchQuestions() {
          this.getHashValue();
          this.getItems();
        }
      },
      mounted() {
        this.getHashValue();
        this.getItems();
      }
    });

    app.mount('#main');

  </script>
@endsection
