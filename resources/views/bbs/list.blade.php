@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- 質問掲示板管理画面')

@section('content')
  <main id="main">
    <h1 class="page-title">질문게시판관리</h1>

    {{-- フィルタリング・ソート --}}
    <div class="row mt-3 mb-3">

      <div class="col-2 form-floating">
        <select class="form-select" id="status" v-model="status" @change="changeOrderAndCategory">
          <option value="4" selected>전체</option>
          <option value="0">미회답</option>
          <option value="1">회답완료</option>
          <option value="2">회답작성중</option>
          <option value="3">기각</option>
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

      <div class="col-2 form-floating">
        <select class="form-select" id="editor" v-model="editorId" @change="changeEditor">
          <option value="0" selected>전체</option>
          <option v-for="editor in editors" :value="editor.id" v-text="editor.name"></option>
        </select>
        <label for="editor">回答者</label>
      </div>

      <div class="col-3 text-center">
        <div class="d-flex">
          <input type="date" class="form-control" v-model="startDate">
          〜
          <input type="date" class="form-control" v-model="endDate">
        </div>
        <button class="btn btn-primary mt-2" @click="changePeriod">접수일 期間指定</button>
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
          <th scope="col" class="text-center">ID</th>
          <th scope="col" class="text-center">질문자</th>
          <th scope="col" class="text-center">답변자</th>
          <th scope="col" class="text-center">공개상태</th>
          <th scope="col" class="text-center">부류</th>
          <th scope="col" class="col-4 text-center">제목</th>
          <th scope="col" class="text-center">접수일</th>
          <th scope="col" class="text-center">공개일</th>
          <th scope="col" class="text-center">열람수</th>
          <th scope="col" class="text-center">보관수</th>
          <th scope="col" class="text-center">처리</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="ask in asks">
          <th scope="row" v-text="ask.id"></th>
          <td>
            <a :href="getEmailLink(ask.user)" v-text="ask.user.name"></a>
          </td>
          {{-- <td v-text="getEditorName(ask.editor_id)"></td> --}}
          <td>
            <span v-if="ask.editor_name" v-text="ask.editor_name.name"></span>
          </td>
          <td>
            <a v-if="ask.status === 0" class="btn btn-warning">미결</a>
            <a v-else-if="ask.status === 1" class="btn btn-success">완료</a>
            <a v-else-if="ask.status === 2" class="btn btn-primary">집필</a>
            <a v-else-if="ask.status === 3" class="btn btn-secondary">기각</a>
          </td>
          <td>
            <span v-if="ask.status === 1" v-text="ask.category.name"></span>
          </td>
          <td class="text-start">
            <span v-if="ask.status === 1"><a :href="ask.url" v-text="ask.title"></a></span>
            <span v-else v-text="ask.headline"></span>
          </td>
          <td v-text="ask.created_at"></td>
          <td v-text="ask.replied_date"></td>
          <td v-text="ask.viewed_count"></td>
          <td v-text="ask.followers"></td>
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
          editors: {!! $editors !!},
          total: {{ $total }},
          data: {},
          asks: [],
          page: 1,
          selectedCategory: 0,
          status: 4,
          viewedOrder: 0,
          editorId: 0,
          startDate: 0,
          endDate: 0,
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
                editor_id: this.editorId,
                start_date: this.startDate,
                end_date: this.endDate,
              }
            })
            .then((response) => {
              this.data = response.data.asks;
              this.asks = response.data.asks.data;
            });
        },
        checkPeriod() {
          const startDate = new Date(this.startDate);
          const endDate = new Date(this.endDate);
          const period = endDate - startDate;
          return period > 0;
        },
        changeOrderAndCategory() {
          if (!this.checkPeriod()) {
            return alert('기간을 잘못 선택하셨습니다.');
          }

          this.page = 1;

          if (this.status != 1) {
            this.selectedCategory = 0;
          }

          this.editorId = 0;
          this.viewedOrder = 0;
          this.getList();
        },
        changeCategory() {
          if (!this.checkPeriod()) {
            return alert('기간을 잘못 선택하셨습니다.');
          }

          this.page = 1;
          this.status = 1;
          this.getList();
        },
        changeEditor() {
          if (!this.checkPeriod()) {
            return alert('기간을 잘못 선택하셨습니다.');
          }

          this.page = 1;
          this.getList();
        },
        filteringStatus() {
          if (!this.checkPeriod()) {
            return alert('기간을 잘못 선택하셨습니다.');
          }
          
          this.page = 1;

          if (this.viewedOrder == 0) {
            this.status = 4;
          } else {
            this.status = 1;
          }

          this.getList();
        },
        changePeriod() {
          if (!this.checkPeriod()) {
            return alert('기간을 잘못 선택하셨습니다.');
          }

          this.getList();
        },
        getEmailLink(user) {
          return `mailto:${user.email}`;
        },
        getDate() {
          const today = new Date();
          const year = today.getFullYear();
          const month = ("0" + (today.getMonth() + 1)).slice(-2);
          const day = today.getDate();
          this.endDate = `${year}-${month}-${day}`;
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
        this.getDate();
        this.getList();
      },
    });

    app.mount('#main');
  </script>
@endsection
