@extends('layouts.editor')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">회원관리</h1>

    {{-- <a href="{{ route('articles.create') }}" class="btn btn-primary">新規投稿画面へ</a> --}}

    <div class="row mt-5 mb-3">
      <div class="col-3">
        <select class="form-select" v-model="selectedSchool" @change="filteringList">
          <option>-----</option>
          <option v-for="school in schools" :value="school.id" v-text="school.name"></option>
        </select>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">이름</th>
          <th scope="col">메일주소</th>
          <th scope="col">소속기관</th>
          <th scope="col">성별</th>
          <th scope="col">생년월일</th>
          <th scope="col">로그인회수</th>
          <th scope="col">최종로그인</th>
          <th scope="col">처리</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="user in filteredList">
          {{-- <tr class="text-center" v-for="user in users"> --}}
          <th scope="row" v-text="user.id"></th>
          <td v-text="user.name"></td>
          {{-- <td v-text="user.email"></td> --}}
          <td>
            <a class="mailtoui" :href="getEmailLink(user)" v-text="user.email"></a>
          </td>
          <td v-text="user.school.name"></td>
          <td v-text="user.sex"></td>
          <td v-text="user.birth_date"></td>
          <td v-text="user.login_count"></td>
          <td v-text="user.last_login"></td>
          <td>
            <button class="btn btn-danger" @click="onDelete(user)">삭제</button>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
@endsection

{{-- @section('js-files')
  <script src="https://cdn.jsdelivr.net/npm/mailtoui@1.0.3/dist/mailtoui-min.js"></script>
@endsection --}}

@section('js-script')
  <script src="https://unpkg.com/vue@next"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  <script>
    const app = Vue.createApp({
      data() {
        return {
          users: [],
          schools: [],
          selectedSchool: 0,
        };
      },
      computed: {
        filteredList() {
          return this.users.filter(user => user.school_id === parseInt(this.selectedSchool));
        },
      },
      methods: {
        getList() {
          const url = '/editors/users-list';
          axios.get(url).then((response) => {
            this.users = response.data.users;
            this.schools = response.data.schools;
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
        getEmailLink(user) {
          return `mailto:${user.email}`;
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
        onDelete(user) {
          if (confirm('削除します。よろしいですか？')) {
            const url = `/editors/users/${user.id}`;
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
