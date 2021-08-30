@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- 学習記事管理画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">학습실 기사 관리</h1>

    <a href="{{ route('articles.create') }}" class="btn btn-primary">新規投稿画面へ</a>

    <div class="row bg-light mt-3 p-3 border border-3">
      <div class="col-sm-3">
        총기사수: @{{ articles . length }}
      </div>
      <div class="col-3">
        조건에 맞는 기사수: @{{ filteredArticles . length }}
      </div>
    </div>

    <div class="row mt-3 mb-3">
      <div class="col-2">
        <select class="form-select" v-model="selectedCtegory">
          <option value="0" selected>분류</option>
          <option value="100">어휘</option>
          <option value="200">문법</option>
          <option value="300">언어규범</option>
          <option value="400">들어보기</option>
        </select>
      </div>

      <div class="col-2">
        <select class="form-select" v-model="selectedStatus">
          <option value="2" selected>공개상태</option>
          <option value="1">공개</option>
          <option value="0">미공개</option>
        </select>
      </div>

      <div class="col-2" v-if="selectedStatus == 1">
        <select class="form-select" v-model="viewedOrder">
          <option value="1" selected>열람자순</option>
          <option value="0">열람자거꿀순</option>
        </select>
      </div>

      <div class="col-2">
        <select class="form-select" v-model="registeredOrder">
          <option value="0" selected>등록순</option>
          <option value="1">등록거꿀순</option>
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
          <th scope="col">보관수</th>
          <th scope="col">처리</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="article in filteredArticles">
          <th scope="row" v-text="article.id"></th>
          <td v-text="article.category.name"></td>
          <td class="text-start">
            <a :href="article.url" target="_blank" v-text="article.title"></a>
          </td>
          <td>
            <a v-if="article.status === 1" class="btn btn-success" @click="changeStatus(article)">공개</a>
            <a v-else class="btn btn-warning" @click="changeStatus(article)">미공개</a>
          </td>
          <td v-text="article.date"></td>
          <td v-text="article.viewed_count"></td>
          <td v-text="article.followers"></td>
          <td class="d-flex justify-content-around">
            <a :href="article.edit_url" target="_blank" class="btn btn-primary">편집</a>
            <button class="btn btn-danger" @click="onDelete(article)">삭제</button>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
@endsection

@section('js-files')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          articles: [],
          selectedCtegory: 0,
          selectedStatus: 2,
          viewedOrder: 1,
          registeredOrder: 0,
        };
      },
      computed: {
        filteredArticles() {
          let articles = this.articles;

          // カテゴリーでフィルタリング
          articles = articles.filter(article => {
            const selectedCtegory = parseInt(this.selectedCtegory);
            return (
              selectedCtegory === 0 ||
              selectedCtegory === parseInt(article.category_id)
            )
          });

          // 公開ステータスでフィルタリング
          articles = articles.filter(article => {
            const selectedStatus = parseInt(this.selectedStatus);
            return (
              selectedStatus === 2 ||
              selectedStatus === parseInt(article.status)
            )
          });

          if (parseInt(this.selectedStatus) === 1) {
            // 閲覧者数順で並べ替え
            const viewedDirection = (parseInt(this.viewedOrder) === 0) ? 'asc' : 'desc';
            articles = _.orderBy(articles, 'viewed_count', viewedDirection);
          } else {
            // 登録順で並べ替え
            const registeredDirection = (parseInt(this.registeredOrder) === 0) ? 'asc' : 'desc';
            articles = _.orderBy(articles, 'created_at', registeredDirection);
          }

          return articles;
        },
      },
      methods: {
        getList() {
          const url = '/editors/articles/get-list';
          axios.get(url).then((response) => {
            this.articles = response.data.articles;
          });
        },
        changeStatus(article) {
          if (confirm('公開状況を変更します。よろしいですか？')) {
            const url = `/editors/articles/${article.id}/change-status`;
            const params = {
              _method: 'PUT',
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
