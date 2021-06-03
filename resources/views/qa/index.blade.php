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
      <span itemprop="name">일문일답</span>
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

    <div class="category-page-introduction">
      <p>여기서는 우리 말의 어휘와 문법, 언어규범 같은데 대하여 자주 있는 물음과 그에 대한 대답을 정리하였습니다.</p>
      <p>내용은 수시로 갱신할 예정이며 내용을 새로 보충하였을 때에는 첫페지 갱신정보란과 LINE을 통하여 통보해드립니다.</p>
      <p>※ 여기에 없는 내용에 대하여 물어보실것이 있으면 <a href="{{ route('bbs.index') }}" class="caption">질문게시판</a>을 통하여 제기하여주십시오.</p>

    </div>

    <div id="list-container" class="list-container">

      {{-- カテゴリーセレクトボタン --}}
      <div class="list-container__selector">
        <category-select-button :categories="categories" v-model="categoryNo" @child-click="selectCategory">
        </category-select-button>
      </div>

      <div class="search-form">
        <p class="search-form__title">키워드로 물음안 검색</p>
        <div class="search-form__wrapper">
          <input type="text" class="form-control" v-model="searchWord" @keypress.enter="searchQuestions">
          <button class="global-btn" @click="searchQuestions" style="margin: 0 1rem;">검색</button>
          <button class="global-btn" @click="clearSearchWord">지우기</button>
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
            <div class="answer-message" v-html="question.answer"></div>
          </div>
        </div>
        {{-- QAの一アイテム ここまで --}}
      </div>
    </div>

    {{-- pagination --}}
    <v-pagination v-model="page" :page-count="pageCount" :click-handler="movePage" prev-text="&laquo;" next-text="&raquo;"
      container-class="v-pagination">
    </v-pagination>

  </main>

  @include('commons.side')
@endsection

@section('js-files')
  <script src="{{ asset('js/vue-components/CategoryButton.js') }}"></script>
  <script src="{{ asset('js/vue-components/PaginationComponent.js') }}"></script>
@endsection

@section('js-script')

  <script>
    const app = Vue.createApp({
      data() {
        return {
          page: 1,
          categoryNo: 0,
          questions: {},
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
            this.page = parseInt(hashPage);
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
        },
        clearSearchWord() {
          this.searchWord = '';
          this.getHashValue();
          this.getItems();
        },
      },
      computed: {
        pageCount() {
          return parseInt(this.questions.last_page) || 0;
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
