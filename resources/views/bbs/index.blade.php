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
      <span itemprop="name">질문게시판</span>
      {{-- </a> --}}
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <div class="category-page-title">
      <img src="{{ asset('img/norms_top.png') }}" alt="" />
      <h1>질문게시판</h1>
    </div>

    <div class="category-page-introduction">
      <p>여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다.</p>
    </div>


    <div class="filtering-form">
      <div class="form-group" style="width:40%; margin: 0;">
        <label for="category" style="margin-right: 1rem;">분류:</label>
        <select type="select" id="category" v-model="selectedCategory" @change="selectCategory">
          <option value="0" selected>전체</option>
          <option v-for="category in categories" v-text="category.name" :value="category.id"></option>
        </select>
      </div>

      <div class="search-form">
        <p class="search-form__title">키워드로 검색</p>
        <div class="search-form__wrapper">
          <input type="text" class="form-control" v-model="searchWord" @keypress.enter="searchAsks">
          <div class="search-form__btn-block">
            <button class="global-btn" style="margin-right: 2rem; margin-left: 2rem;" @click="searchAsks">검색</button>
            <button class="global-btn" @click="clearSearchWord">지우기</button>
          </div>
        </div>
      </div>
    </div>

    <div class="list-container__count">
      <p><i class="fas fa-file-signature"></i> 해당되는 질문수: <span v-text="asks.total"></span>건<p>
      <p><i class="fas fa-flag"></i> 현재 접수하여 회답하지 못한 질문수: <span v-text="notCompatible"></span>건</p>
    </div>

    {{-- ページ下部にある問い合わせフォームへのリンク --}}
    <div class="ask-link">
      <a href="#ask-form"><i class="fas fa-caret-down"></i> 질문하기</a>
    </div>

    {{-- リスト --}}
    <table class="bbs">
      <tr class="bbs__thead">
        <!-- <th class="bbs__no"></th> -->
        <th class="bbs__question">질문</th>
        <th class="bbs__category">분류</th>
        {{-- <th class="bbs__status">회답</th> --}}
        <th class="bbs__date">투고날자</th>
      </tr>
      <tr v-for="ask in asks.data">
        <!-- <td>1</td> -->
        <td><a :href="ask.url" v-text="ask.title"></a></td>
        <!-- <td data-label="질문">닭알을 어떻게 발음해야 맞습니까?</td> -->
        <td data-label="분류"><span v-text="ask.category.name" class="category-label" :class="getCategoryClass(ask)"></td>
        {{-- <td data-label="회답"><span class="status-label">완료</span></td> --}}
        <td data-label="투고날자" v-text="ask.date"></td>
      </tr>
    </table>

    {{-- pagination --}}
    <v-pagination
      v-model="page"
      :page-count="pageCount"
      :click-handler="movePage"
      prev-text="&laquo;"
      next-text="&raquo;"
      container-class="v-pagination">
    </v-pagination>

    {{-- 問い合わせフォーム --}}
    <div id="ask-form" style="margin-top: 3rem;">
      <div class="error-message" v-if="Object.keys(errors).length">
        <ul>
          <li v-for="error in errors" v-text="error"></li>
        </ul>
      </div>

      <div>
        <p><i class="fas fa-exclamation-triangle"></i> 로그인을 하셔야 질문하실수 있습니다. </p>
        <p>또 질문은 보내신 즉시 반영되지 않고 관리자가 확인한 다음에 답변과 함께 싸이트에 반영됩니다. 때문에 오탈자 등에 신경 쓰시지 말고 편안하게 질문하셔도 됩니다.</p>
        <p>질문을 접수하면 가능한 한 빨리 답변드리겠으며 싸이트에 반영되는 차제로 등록하신 메일주소앞으로 통보해드리겠습니다.</p>
      </div>

      <div class="form-group">
        <label for="content">질문내용</label>
        <textarea name="content" id="content" cols="30" rows="10" required v-model="ask"></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn global-btn" @click="onSave">보내기</button>
      </div>
    </div>
  </main>

  @include('commons.side-recently')

@endsection

@section('js-files')
  <script src="{{ asset('js/vue-components/PaginationComponent.js') }}"></script>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          categories: {!! $categories !!},
          notCompatible: 0,
          page: 1,
          selectedCategory: 0,
          asks: {},
          ask: '',
          // authorized: {!! Auth::check() ?? 'null' !!},
          authorized: false,
          errors: {},
          searchWord: '',
        }
      },
      components: {
        'v-pagination': paginationComponent,
      },
      computed: {
        pageCount() {
          return parseInt(this.asks.last_page) || 0;
        }
      },
      mounted() {
        this.getHashValue();
        this.getList();
      },
      methods: {
        getList() {
          const url = '/bbs/pagination';

          axios.get(url, {
            params: {
              page: this.page,
              selectedCategory: this.selectedCategory,
              searchWord: this.searchWord,
            }
          })
          .then(response => {
            this.asks = response.data.asks;
            this.notCompatible = response.data.notCompatible;
            this.authorized = response.data.authorized;
          });
        },
        movePage(page) {
          this.page = page;
          location.hash = `${this.page}%${this.selectedCategory}`;
          this.getList();
          Vue.nextTick(() => {
            const scrollTop = $('.category-page-introduction').offset().top;
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
            this.selectedCategory = hashCategoryNo;
          } else {
            this.selectedCategory = 0;
          }
        },
        selectCategory() {
          this.page = 1;
          location.hash = `${this.page}%${this.selectedCategory}`;
          this.getList();
        },
        searchAsks() {
          this.getHashValue();
          this.getList();
        },
        clearSearchWord() {
          this.searchWord = '';
          this.getList();
        },
        getCategoryClass(ask) {
          return `catergory-${ask.category_id}`;
        },
        onSave() {
          if (this.authorized === false) {
            alert("로그인하셔야 합니다.");
            return
          }

          if (confirm('질문내용을 보내시겠습니까?')) {
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
