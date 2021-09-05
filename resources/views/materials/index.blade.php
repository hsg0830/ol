@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 자료실')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name">자료실</span>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <div class="category-page-title">
      <img src="{{ asset('img/title/category_title_04.png') }}" alt="" />
      <h1>자료실</h1>
    </div>

    <div class="category-page-introduction">
      <p>여기서는 사전과 코퍼스, 그밖의 각종 자료들을 찾아보실수 있습니다.</p>
    </div>

    <div id="list-container" class="list-container">

      <h2 class="list-container__heading"><i class="fas fa-file-download"></i> 각종자료 내리적재</h2>

      {{-- 検索フォーム --}}
      <div class="search-box">
        <p class="search-box__title">키워드로 제목안 검색</p>

        <div class="filtering-form">
          {{-- カテゴリー選択 --}}
          {{-- <div class="form-group">
            <select type="select" id="category" v-model.number="categoryNo" @change="getItems">
              <option value="0" selected>전체</option>
              <option v-for="(category, key) in categories" v-text="category" :value="key"></option>
            </select>
          </div> --}}

          {{-- 検索ワード --}}
          <div class="search-form" style="margin: 0 auto;">
            <div class="search-form__wrapper">
              <input type="text" class="form-control" v-model="searchWord" @keypress.enter="searchMaterials">
              <div class="search-form__btn-block">
                <button class="global-btn" @click="searchMaterials">검색</button>
                <button class="global-btn" @click="clearSearchWord">지우기</button>
              </div>
            </div>
          </div>

        </div>
      </div>

      {{-- 件数 --}}
      <div class="list-container__count">
        <i class="fas fa-file-signature"></i> 해당되는 자료수: <span v-text="items.total"></span>건
      </div>

      {{-- 並べ替え --}}
      {{-- <div class="ask-sort">
        <select type="select" id="sort" v-model="sort" @change="getItems">
          <option value="0" selected>최신순</option>
          <option value="1">인기순</option>
        </select>
      </div> --}}

      <div v-if="materials.length > 0">
        <table class="task-list">
          <tr class="task-list__thead">
            <th>제목</th>
            <th>종류</th>
            <th>용량</th>
            {{-- <th>분류</th> --}}
            <th>등록일</th>
            <th></th>
            {{-- <th>설명</th> --}}
            {{-- <th>등록일</th> --}}
          </tr>
          <tr v-for="material in materials">
            <td class="narrow_width">
              <a :href="material.url" v-text="material.title" style="display: block"></a>
            </td>
            <td data-label="종류">
              <img :src="getIconPath(material)" alt="" style="width:3rem;">
            </td>
            <td data-label="용량" v-text="material.file_size"></td>
            {{-- <td data-label="분류" v-text="categories[material.category_key]"></td> --}}
            <td data-label="등록일" v-text="material.released_at"></td>
            <td style="text-align: center">
              <button type="button" class="global-btn" @click="modalOpen(material)">설명보기</button>
              {{-- <form :action="material.download_url">
                @csrf
                <button type="submit" class=""><i class="fas fa-file-download"></i></button>
              </form> --}}
            </td>
          </tr>
        </table>
      </div>

      <div v-else>
        <p class="message block"> 등록된 자료가 없습니다.</p>
      </div>

    </div>

    {{-- モーダル --}}
    <div class="user-modal js-modal">
      <div class="user-modal__bg js-modal" @click="modalClose"></div>

      <div class="user-modal__content">
        <i class="fas fa-times-circle" @click="modalClose"></i>
        <p class="user-modal__content__header" v-text="currentMaterial.title"></p>
        <div class="user-modal__content__description" v-html="currentMaterial.description"></div>
        <form :action="currentMaterial.download_url" class="user-modal__buttons">
          @csrf
          <button type="submit" class="global-btn">내리적재</button>
        </form>
        {{-- <div class="user-modal__buttons">
          <button class="btn global-btn" @click="modalClose">닫기</button>
        </div> --}}
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
  <script src="{{ asset('js/vue-components/PaginationComponent.js') }}"></script>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          page: 1,
          categoryNo: 0,
          categories: {!! $categories !!},
          types: {!! $types !!},
          items: {},
          materials: [],
          searchWord: '',
          currentMaterial: {},
        }
      },
      mounted() {
        this.getItems();
      },
      // updated() {
      //   this.closeDescription();
      // },
      components: {
        'v-pagination': paginationComponent,
      },
      computed: {
        pageCount() {
          return parseInt(this.items.last_page) || 0;
        }
      },
      methods: {
        getItems() {
          const url = '/materials/get-list';
          const params = {
            page: this.page,
            // categoryNo: this.categoryNo,
            searchWord: this.searchWord,
          };

          axios.get(url, {
              params: params,
            })
            .then((response) => {
              this.items = response.data.materials;
              this.materials = response.data.materials.data;
            });
        },
        getIconPath(material) {
          return `/img/icons/file_type_${this.types[material.type_key]}.png`;
        },
        // showDescription(material) {
        //   this.closeDescription();

        //   const id = `#material-desc-${material.id}`;
        //   $(id).show();
        // },
        // closeDescription() {
        //   $('.material-desc').hide();
        // },
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

          // if (hashCategoryNo > 1) {
          //   this.categoryNo = hashCategoryNo;
          // } else {
            this.categoryNo = 0;
          // }
        },
        // selectCategory(categoryNo) {
        //   this.categoryNo = categoryNo;
        //   this.page = 1;
        //   location.hash = `${this.page}%${this.categoryNo}`;
        //   this.getItems();
        // },
        searchMaterials() {
          this.getHashValue();
          // this.categoryNo = 0;
          this.getItems();
        },
        clearSearchWord() {
          this.searchWord = '';
          this.getItems();
        },
        modalOpen(material) {
          this.currentMaterial = material;
          $('.js-modal').fadeIn();
        },
        modalClose() {
          $('.js-modal').fadeOut();
          this.currentMaterial = {};
        },
      },
    });

    app.mount('#main');
  </script>
@endsection
