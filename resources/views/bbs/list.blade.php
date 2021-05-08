@extends('layouts.editor')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">질문게시판관리</h1>

    {{-- フィルタリング・ソート --}}
    <div class="row mt-3 mb-3">

      <div class="col-2 form-floating">
        <select class="form-select" id="status" v-model="status" @change="changeOrderAndCategory">
          <option value="2" selected>전체</option>
          <option value="1">회답완료</option>
          <option value="0">미회답</option>
        </select>
        <label for="status">回答状況</label>
      </div>

      <div class="col-2 form-floating">
        <select class="form-select" id="category" v-model="selectedCategory" @change="changeCategory">
          <option value="0" selected>전체</option>
          <option v-for="category in categories" :value="category.id" v-text="category.name"></option>
        </select>
        <label for="category">カテゴリー</label>
      </div>

      <div class="col-2 form-floating">
        <select class="form-select" id="viewed-order" v-model="viewedOrder" @change="filteringStatus">
          <option value="0" selected>적용안함</option>
          <option value="1">많은 차례</option>
          <option value="2">적은 차례</option>
        </select>
        <label for="viewed-order">閲覧数</label>
      </div>

    </div>

    {{-- 件数 --}}
    <div class="row bg-light p-3 border border-3">
      <div class="col-3">
        질문총수: <span v-text="total"></span>
      </div>
      <div class="col-3">
        조건에 맞는 질문수: <span v-text="data.total"></span>
      </div>
    </div>

    {{-- リスト --}}
    <table class="table table-striped">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">질문자</th>
          <th scope="col">공개상태</th>
          <th scope="col">부류</th>
          <th scope="col" class="col-5">제목</th>
          <th scope="col">공개일</th>
          <th scope="col">열람수</th>
          <th scope="col">처리</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="ask in asks">
          <th scope="row" v-text="ask.id"></th>
          <th v-text="ask.user.name"></th>
          <td>
            <a v-if="ask.status === 1" class="btn btn-success">회답완료</a>
            <a v-else class="btn btn-warning">미회답</a>
          </td>
          <th>
            <span v-if="ask.status ===1" v-text="ask.category.name"></span>
          </th>
          <td class="text-start">
            <span v-if="ask.status === 1" v-text="ask.title"></span>
            <span v-else v-text="ask.headline"></span>
          </td>
          <td v-text="ask.date"></td>
          <td v-text="ask.viewed_count"></td>
          <td>
            <a :href="ask.edit_url" class="btn btn-primary me-3" target="_blank">편집</a>
            <button class="btn btn-danger" @click="onDelete(ask)">삭제</button>
          </td>
        </tr>
      </tbody>
    </table>

    {{-- pagination --}}
    <v-pagination v-model="page" :page-count="pageCount" :click-handler="movePage" prev-text="&laquo;" next-text="&raquo;"
      container-class="v-pagination">
    </v-pagination>
  </main>
@endsection

@section('css')
  {{-- pagination用： 本来は editors.blade.php へセットすべきなのですが、ログイン画面などに影響するようでしたので、こちらへセットしています。 --}}
  <link rel="stylesheet" href="{{ asset('css/destyle.css') }}" />
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
          total: {{ $total }},
          data: {},
          asks: [],
          page: 1,
          selectedCategory: 0,
          status: 2,
          viewedOrder: 0,
        };
      },
      components: {
        'v-pagination': paginationComponent,
      },
      methods: {
        getList() {
          const url = '/editors/bbs/get-list';

          axios.get(url, {
              params: {
                page: this.page,
                category_id: this.selectedCategory,
                status: this.status,
                viewed_count: this.viewedOrder,
              }
            })
            .then((response) => {
              this.data = response.data.asks;
              this.asks = response.data.asks.data;
            });
        },
        changeOrderAndCategory() {
          this.page = 1;

          if (this.status != 1) {
            this.selectedCategory = 0;
          }

          this.viewedOrder = 0;
          this.getList();
        },
        changeCategory() {
          this.page = 1;
          this.status = 1;
          this.getList();
        },
        filteringStatus() {
          this.page = 1;

          if (this.viewedOrder == 0) {
            this.status = 2;
          } else {
            this.status = 1;
          }

          this.getList();
        },
        movePage(page) {
          this.page = page;
          location.hash = `${this.page}`;
          this.getList();
          Vue.nextTick(() => {
            scrollTo(0, 0);
          });
        },
        onDelete(ask) {
          if (confirm('削除します。よろしいですか？')) {
            const url = `/editors/bbs/${ask.id}`;
            axios.delete(url).then((response) => {
              if (response.data.result === true) {
                this.getList();
              }
            });
          }
        },
      },
      computed: {
        pageCount() {
          return parseInt(this.data.last_page) || 0;
        }
      },
      mounted() {
        this.getList();
      },
    });

    app.mount('#main');

  </script>
@endsection
