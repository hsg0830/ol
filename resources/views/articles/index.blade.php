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
      <span itemprop="name">학습실</span>
      {{-- </a> --}}
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <div class="category-page-title">
      <img src="{{ asset('img/articles_top.png') }}" alt="" />
      <h1>학습실</h1>
    </div>

    <div class="category-page-introduction">
      <p>여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다. 여기에 이 코너에 대한 설명글이 들어갑니다.</p>
    </div>

    <div id="list-container" class="list-container">
      {{-- カテゴリーセレクトボタン --}}
      <div class="list-container__selector">
        <category-select-button :categories="categories" v-model="categoryNo" @child-click="selectCategory">
        </category-select-button>
      </div>

      <div class="list-container__count">
        <i class="fas fa-file-signature"></i> 해당되는 기사수: <span v-text="items.total"></span>건
      </div>

      <div class="list-container__wrapper">
        <div class="list-item" v-for="item in items.data">
          <a :href="item.url">
            <div class="list-item__header">
              <img src="{{ asset('img/bg_black-board_thum.png') }}" alt="" v-if="item.category.id === 100" />
              <img src="{{ asset('img/bg_white-board_thum.png') }}" alt="" v-else-if="item.category.id === 200" />
              <img src="{{ asset('img/bg_memo_thum.png') }}" alt="" v-else-if="item.category.id === 300" />
              <img src="{{ asset('img/bg_film_thum.png') }}" alt="" v-else-if="item.category.id === 400" />
              <p class="title" :class="getTextClass(item.category.id)" v-text="item.title"></p>
            </div>
            <div class="list-item__content">
              <p class="lead" v-html="item.head_line"></p>
              <div class="info">
                <p class="date" v-text="item.date"></p>
                <p class="category" :class="getCategoryClass(item.category.id)" v-text="item.category.name"></p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    {{-- pagination --}}
    <v-pagination :data="items" @move-page="movePage($event)"></v-pagination>
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
          items: [],
          categories: [],
        }
      },
      components: {
        'category-select-button': categoryButtonComponent,
        'v-pagination': paginationComponent,
      },
      methods: {
        getItems() {
          const url = '/articles/pagination';
          axios.get(url, {
              params: {
                page: this.page,
                categoryNo: this.categoryNo,
              }
            })
            .then((response) => {
              this.items = response.data.articles;
              this.categories = response.data.categories;
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
        getCategoryClass(index) {
          return `category-${index}`;
        },
        getTextClass(index) {
          if (parseInt(index) === 100) {
            return 'color-white'
          }
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
