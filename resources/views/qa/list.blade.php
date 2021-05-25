@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- QA管理画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">QA관리</h1>

    <a href="{{ route('qa.create') }}" class="btn btn-primary mb-3">新規投稿画面へ</a>

    {{-- フィルタリング・ソート --}}
    <div class="row mt-3 mb-3">

      <div class="col-2 form-floating">
        <select class="form-select" id="category" v-model="selectedCategory" @change=getList>
          <option value="0" selected>전체</option>
          <option v-for="category in categories" :value="category.id" v-text="category.name"></option>
        </select>
        <label for="category">カテゴリー</label>
      </div>

      <div class="col-2 form-floating">
        <select class="form-select" id="status" v-model="status" @change=changeViewedOrder>
          <option value="2" selected>전체</option>
          <option value="1">공개</option>
          <option value="0">미공개</option>
        </select>
        <label for="status">公開状態</label>
      </div>

      <div class="col-2 form-floating">
        <select class="form-select" id="viewed-order" v-model="viewedOrder" @change=filteringStatus>
          <option value="0" selected>적용안함</option>
          <option value="1">많은 차례</option>
          <option value="2">적은 차례</option>
        </select>
        <label for="viewed-order">閲覧数</label>
      </div>

    </div>

    <div class="row bg-light p-3 border border-3">
      <div class="col-3">
        총QA수: @{{ questions . length }}
      </div>
      <div class="col-3">
        {{-- 조건에 맞는 QA수: @{{ filteredUsers . length }} --}}
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">부류</th>
          <th scope="col" class="col-5">제목</th>
          <th scope="col">공개상태</th>
          <th scope="col">공개일</th>
          <th scope="col">열람수</th>
          <th scope="col">처리</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="question in questions">
          <th scope="row" v-text="question.id"></th>
          <th scope="row" v-text="question.category.name"></th>
          <td v-text="question.title" class="text-start"></td>
          <td>
            <a v-if="question.status === 1" class="btn btn-success" @click="changeStatus(question)">공개</a>
            <a v-else class="btn btn-warning" @click="changeStatus(question)">미공개</a>
          </td>
          <td v-text="question.date"></td>
          <td v-text="question.viewed_count"></td>
          <td>
            <a :href="question.edit_url" class="btn btn-primary me-3" target="_blank">편집</a>
            <button class="btn btn-danger" @click="onDelete(question)">삭제</button>
          </td>
        </tr>
      </tbody>
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
  </main>
@endsection

@section('css')
{{--  pagination用： 本来は editors.blade.php へセットすべきなのですが、ログイン画面などに影響するようでしたので、こちらへセットしています。--}}
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
          data: {},
          questions: [],
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
          const url = '/editors/qa/get-list';

          axios.get(url, {
              params: {
                page: this.page,
                category_id: this.selectedCategory,
                status: this.status,
                viewed_count: this.viewedOrder,
              }
            })
            .then((response) => {
              this.data = response.data.questions;
              this.questions = response.data.questions.data;
            });
        },
        changeViewedOrder() {
          this.page = 1;
          this.viewedOrder = 0;
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
        changeStatus(question) {
          if (confirm('公開状況を変更します。よろしいですか？')) {
            const url = `/editors/qa/${question.id}/change-status`;
            const params = {
              _method: 'POST',
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  alert('公開状況を変更しました。');
                  this.getList();
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
                  scrollTo(0, 0);

                } else {
                  console.log(error);
                }
              });
          }
        },
        movePage(page) {
          this.page = page;
          location.hash = `${this.page}`;
          this.getList();
          Vue.nextTick(() => {
            scrollTo(0, 0);
          });
        },
        onDelete(question) {
          if (confirm('削除します。よろしいですか？')) {
            const url = `/editors/qa/${question.id}`;
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
