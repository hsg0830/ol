@extends('layouts.editor')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">학습실 기사 관리</h1>

    <a href="{{ route('articles.create') }}" class="btn btn-primary">投稿画面へ</a>

    <div class="row mt-5 mb-3">
      <div class="col-3">
        <select class="form-select" v-model="selectedCtegory" @change="filteringList">
          <option value="0" selected>분류</option>
          <option value="100">어휘</option>
          <option value="200">문법</option>
          <option value="300">언어규범</option>
          <option value="400">들어보기</option>
        </select>
      </div>

      <div class="col-3">
        <select class="form-select" v-model="selectedStatus" @change="filteringList">
          <option value="2" selected>공개상태</option>
          <option value="1">공개</option>
          <option value="0">미공개</option>
        </select>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">분류</th>
          <th scope="col">제목</th>
          <th scope="col">공개상태</th>
          <th scope="col">작성일</th>
          <th scope="col">열람수</th>
          <th scope="col">처리</th>
        </tr>
      </thead>
      <tbody>
        <!-- <tr class="text-center" v-for="article in filteredList"> -->
        <tr class="text-center" v-for="article in list">
          <th scope="row" v-text="article.id"></th>
          <td v-text="article.category.name"></td>
          <td class="text-start">
            <a :href="article.url" target="_blank" v-text="article.title"></a>
          </td>
          <td>
            <a v-if="article.status === 1" class="btn btn-success" @click="changeStatus(article)">공개</a>
            <a v-else class="btn btn-warning" @click="changeStatus(article)">미공개</a>
          </td>
          <td v-text="article.released_at"></td>
          <td v-text="article.viewed_count"></td>
          <td class="d-flex justify-content-around">
            <a :href="article.edit_url" target="_blank" class="btn btn-primary">편집</a>
            <button class="btn btn-danger" @click="onDelete(article)">삭제</button>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          articles: [],
          list: [],
          selectedCtegory: 0,
          selectedStatus: 2,
        };
      },
      computed: {
        // filteredList() {
        //   return this.articles.filter((article) => {
        //     if (this.selectedCtegory !== 0) {
        //       article.category == this.selectedCtegory;
        //     } else {
        //       article.category != this.selectedCtegory;
        //     }
        //   });
        // },
      },
      methods: {
        getList() {
          const url = '/editors/articles/get-list';
          axios.get(url).then((response) => {
            this.articles = response.data.articles;
            this.list = this.articles;
          });
        },
        filteringList() {
          if (this.selectedCtegory != 0) {
            this.list = this.articles.filter(article => article.category_id == this.selectedCtegory);
          } else {
            this.list = this.articles;
          }

          if (this.selectedStatus != 2) {
            this.list = this.list.filter(item => item.status == this.selectedStatus);
          } else {
            this.list = this.list;
          }
        },
        changeStatus(article) {
          if (confirm('公開状況を変更します。よろしいですか？')) {
            const url = `/editors/articles/change-status/${article.id}`;
            const method = 'POST';
            const params = {
              _method: method,
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
        onDelete(article) {
          if (confirm('削除します。よろしいですか？')) {
            const url = `/editors/articles/${article.id}`;
            axios.delete(url).then((response) => {
              if (response.data.result === true) {
                this.getList();
              }
            });
          }
        },
      },
      mounted() {
        this.getList();
      },
    });

    app.mount('#main');

  </script>
@endsection
