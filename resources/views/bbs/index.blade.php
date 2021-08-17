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
    <span itemprop="name">질문게시판</span>
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

  <div class="category-page-introduction">
    <p>여기서는 우리 말과 관련하여 회원분들이 보내주신 질문과 그에 대한 대답을 게재하였습니다.</p>
    <p>우리 말과 관련하여 질문하실 내용이 있으면 아래쪽에 있는 <a href="#ask-form" class="caption">입력란</a>을 리용하여 질문하십사오.</p>
  </div>

  {{-- リスト、ボタンなどのコンテナ --}}
  <div id="list-container" class="list-container">
    {{-- カテゴリーセレクトボタン --}}
    <div class="list-container__selector">
      <category-select-button :categories="categories" v-model="categoryNo" @child-click="selectCategory">
      </category-select-button>
    </div>

    {{-- 検索フォーム --}}
    <div class="search-box">
      <p class="search-box__title">키워드로 질문안 검색</p>

      <div class="filtering-form">
        <div class="form-group">
          <select type="select" id="category" v-model="categoryNo">
            <option value="0" selected>전체</option>
            <option v-for="category in categories" v-text="category.name" :value="category.id"></option>
          </select>
        </div>

        <div class="search-form">
          <div class="search-form__wrapper">
            <input type="text" class="form-control" v-model="searchWord" @keypress.enter="searchAsks">
            <div class="search-form__btn-block">
              <button class="global-btn" @click="searchAsks">검색</button>
              <button class="global-btn" @click="clearSearchWord">지우기</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- 件数表示 --}}
    <div class="list-container__count">
      <p><i class="fas fa-file-signature"></i> 해당되는 질문수: <span v-text="items.total"></span>건
      <p>
      <p><i class="fas fa-flag"></i> 현재 접수하여 회답하지 못한 질문수: <span v-text="notCompatible"></span>건</p>
    </div>

    <div class="ask-sort">
      {{-- 並べ替え --}}
      <div>
        <select type="select" id="sort" v-model="sort" @change="getItems">
          <option value="0" selected>최신순</option>
          <option value="1">인기순</option>
        </select>
      </div>

      {{-- ページ下部にある問い合わせフォームへのリンク --}}
      <div class="ask-link">
        <a href="#ask-form"><i class="fas fa-caret-down"></i> 질문하기</a>
      </div>
    </div>

    {{-- 一覧 --}}
    <div class="list-container__wrapper">
      <div class="list-item" v-for="item in items.data">
        <a :href="item.url">
          <div class="list-item__header">
            <img src="{{ asset('img/thum/bg_black-board_thum.png') }}" alt="" v-if="item.category.id === 100" />
            <img src="{{ asset('img/thum/bg_white-board_thum.png') }}" alt="" v-else-if="item.category.id === 200" />
            <img src="{{ asset('img/thum/bg_memo_thum.png') }}" alt="" v-else-if="item.category.id === 300" />
            <img src="{{ asset('img/thum/bg_500_03.png') }}" alt="" v-else-if="item.category.id === 500" />
            <p class="title" :class="getTextClass(item.category.id)" v-text="item.title"></p>
          </div>
          <div class="list-item__content">
            <div class="list-item__content__info">
              <p class="count">열람수: <span>@{{ item.viewed_count }}</span>번</p>
              <p class="date" v-text="item.date"></p>
              {{-- <p class="category" :class="getCategoryClass(item.category.id)" v-text="item.category.name"></p> --}}
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  {{-- pagination --}}
  <v-pagination v-model="page" :page-count="pageCount" :click-handler="movePage" prev-text="&laquo;" next-text="&raquo;"
    container-class="v-pagination">
  </v-pagination>

  {{-- 問い合わせフォーム --}}
  <div id="ask-form" class="ask-form">
    <div class="error-message" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    <div class="ask-form__message">
      <p class="ask-form__message__attention" v-if="!authorized"><i class="fas fa-exclamation-triangle"></i> 로그인을 하셔야 질문하실수 있습니다. </p>
      <div class="ask-form__message__desc">
        <p>질문은 보내신 즉시 반영되지 않고 관리자가 확인한 다음에 답변과 함께 싸이트에 반영됩니다. 때문에 오탈자 등에 신경 쓰시지 말고 편안하게 질문하셔도 됩니다.</p>
        <p>질문을 접수하면 가능한 한 빨리 답변드리겠으며 싸이트에 반영되는 차제로 등록하신 메일주소앞으로 통보해드리겠습니다.</p>
      </div>
    </div>

    <template v-if="!isSending">
      <div class="form-group ask-form__input">
        <label for="content">질문내용</label>
        <textarea name="content" id="content" cols="30" rows="10" required v-model="ask"></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn global-btn" @click="onSave">보내기</button>
      </div>
    </template>
    <template v-else>
      <div class="message block" style="margin: 3rem auto 1rem;">
        <p>질문내용을 송신중이므로 잠시만 기다리십시오.</p>
        <span class="loading-icon fas fa-sync" aria-hidden="true"></span>
      </div>
    </template>
  </div>
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
        items: {},
        categories: {!! $categories !!},
        notCompatible: 0,
        sort: 0,
        ask: '',
        authorized: {!! Auth::check() ? 'true' : 'false' !!},
        errors: {},
        searchWord: '',
        sendingStatus: '',
      }
    },
    components: {
      'category-select-button': categoryButtonComponent,
      'v-pagination': paginationComponent,
    },
    computed: {
      pageCount() {
        return parseInt(this.items.last_page) || 0;
      },
      isSending() {
        return this.sendingStatus === 'sending';
      },
    },
    mounted() {
      this.getHashValue();
      this.getItems();
    },
    methods: {
      getItems() {
        const url = '/bbs/pagination';
        axios.get(url, {
            params: {
              page: this.page,
              categoryNo: this.categoryNo,
              searchWord: this.searchWord,
              sort: this.sort,
            }
          })
          .then((response) => {
            this.items = response.data.asks;
            this.notCompatible = response.data.notCompatible;
          });
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
      searchAsks() {
        this.getHashValue();
        // this.categoryNo = 0;
        this.getItems();
      },
      clearSearchWord() {
        this.searchWord = '';
        this.getItems();
      },
      getCategoryClass(index) {
        return `category-${index}`;
      },
      getTextClass(index) {
        if (parseInt(index) === 100) {
          return 'color-white'
        }
      },
      onSave() {
        if (this.authorized === false) {
          alert("로그인하셔야 합니다.");
          return
        }

        if (this.ask == '') {
          alert("짊문내용을 입력하십시오.");
          return
        }

        if (confirm('질문내용을 보내시겠습니까?')) {
          this.sendingStatus = 'sending';

          const url = '/bbs';
          const method = 'POST';
          const params = {
            _method: method,
            draft: this.ask,
          };

          axios
            .post(url, params)
            .then(response => {
              if (response.data.result === true) {
                this.ask = '';
                this.sendingStatus = '';
                scrollTo(0, 0);
                alert('질문을 접수하였습니다.');
              }
            })
            .catch((error) => {
              if (error.response.status === 422) {
                const responseErrors = error.response.data.errors;
                let errors = {};

                for (const key in responseErrors) {
                  errors[key] = responseErrors[key][0];
                }
                this.errors = errors;
              } else {
                console.log(error);
              }
            });
        }
      },
    },
  });

  app.mount('#main');
</script>
@endsection
