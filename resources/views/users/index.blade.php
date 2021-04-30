@extends('layouts.editor')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">회원관리</h1>

    <div class="row bg-light p-3 border border-3">
      <div class="col-3">
        총회원수: @{{ users . length }}
      </div>
      <div class="col-3">
        조건에 맞는 회원수: @{{ filteredUsers . length }}
      </div>
    </div>

    <div class="row mt-3 mb-3">
      <div class="col-2">
        <select class="form-select" v-model="selectedSchool">
          <option value="0" selected>전체기관</option>
          <option v-for="school in schools" :value="school.id" v-text="school.name"></option>
        </select>
      </div>

      <div class="col-2">
        <select class="form-select" v-model="selectedSex">
          <option value="0" selected>성별</option>
          <option v-for="(sex, key) in sexes" v-text="sex" :value="key"></option>
        </select>
      </div>

      <div class="col-2">
        <select class="form-select" v-model="nameOrder">
          <option value="0" selected>이름순</option>
          <option value="1">이름거꿀순</option>
        </select>
      </div>


      <div class="form-check col-2 ms-4">
        <input class="form-check-input" type="checkbox" id="date-order" v-model="orderByDate">
        <label class="form-check-label" for="date-order">
          등록일순적용
        </label>
      </div>

      <div class="col-2" v-if="orderByDate === true">
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
          <th scope="col">이름</th>
          <th scope="col">메일주소</th>
          <th scope="col">소속기관</th>
          <th scope="col">성별</th>
          <th scope="col">생년월일</th>
          <th scope="col">로그인회수</th>
          <th scope="col">최종로그인</th>
          <th scope="col">등록시일</th>
          <th scope="col">처리</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="user in filteredUsers">
          <th scope="row" v-text="user.id"></th>
          <td v-text="user.name"></td>
          <td>
            <a :href="getEmailLink(user)" v-text="user.email"></a>
          </td>
          <td v-text="user.school.name"></td>
          <td v-text="sexes[user.sex]"></td>
          <td v-text="user.birth_date"></td>
          <td v-text="user.login_count"></td>
          <td v-text="user.last_login"></td>
          <td v-text="user.registered_date"></td>
          <td>
            <button class="btn btn-danger" @click="onDelete(user)">삭제</button>
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
          users: [],
          schools: [],
          sexes: {
            1: "남",
            2: "녀"
          },
          selectedSchool: 0,
          selectedSex: 0,
          nameOrder: 0,
          orderByDate: false,
          registeredOrder: 0,
        };
      },
      methods: {
        getList() {
          const url = '/editors/users-list';
          axios.get(url).then((response) => {
            this.users = response.data.users;
            this.schools = response.data.schools;
          });
        },
        getEmailLink(user) {
          return `mailto:${user.email}`;
        },
        onDelete(user) {
          if (confirm('削除します。よろしいですか？')) {
            const url = `/editors/users/${user.id}`;
            axios.delete(url).then((response) => {
              if (response.data.result === true) {
                this.getList();
                this.selectedSchool = 0;
              }
            });
          }
        },
      },
      computed: {
        filteredUsers() {
          let users = this.users;

          //所属機関でのフィルタリング
          users = users.filter(user => {
            const selectedSchool = parseInt(this.selectedSchool);
            return (
              selectedSchool === 0 ||
              selectedSchool === parseInt(user.school_id)
            )
          });

          // 性別でのフィルタリング
          users = users.filter(user => {
            const selectedSex = parseInt(this.selectedSex);
            return (
              selectedSex === 0 ||
              selectedSex === parseInt(user.sex)
            )
          });

          // 名前順で並べ替え
          const nameDirection = (parseInt(this.nameOrder) === 0) ? 'asc' : 'desc';
          users = _.orderBy(users, 'name', nameDirection);

          // 登録順で並べ替え
          if (this.orderByDate === true) {
            const registeredDirection = (parseInt(this.registeredOrder) === 0) ? 'asc' : 'desc';
            users = _.orderBy(users, 'created_at', registeredDirection);
          }

          return users;

        }
      },
      mounted() {
        this.getList();
      },
    });

    app.mount('#main');

  </script>
@endsection
