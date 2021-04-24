@extends('layouts.editor')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">회원관리</h1>

    <div class="row bg-light p-3 border border-3">
      <div class="col-sm-3">
        총회원수: @{{ users.length }}
      </div>
      <div class="col-3">
        조건에 맞는 회원수: @{{ filteredList.length }}
      </div>
    </div>

    <div class="row mt-3 mb-3">
      <div class="col-2">
        <select class="form-select" v-model="selectedSchool" @change="filteringList">
          <option value="0" selected>전체기관</option>
          <option v-for="school in schools" :value="school.id" v-text="school.name"></option>
        </select>
      </div>

      <div class="col-2">
        <select class="form-select" v-model="nameOrder" @change="filteringList">
          <option value="0" selected>이름순</option>
          <option value="1">이름거꿀순</option>
        </select>
      </div>

      <div class="col-2">
        <select class="form-select" v-model="selectedSex" @change="filteringList">
          <option value="0" selected>성별</option>
          <option v-for="(sex, key) in sexes" v-text="sex" :value="key"></option>
        </select>
      </div>

      <div class="col-2">
        <select class="form-select" v-model="registeredOrder" @change="filteringList">
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
          <td v-text="sexes[user.sex]"></td>
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
  <script>
    const app = Vue.createApp({
      data() {
        return {
          users: [],
          filteredList: [],
          schools: [],
          sexes: {
            1: "남",
            2: "녀"
          },
          selectedSchool: 0,
          nameOrder: 0,
          selectedSex: 0,
          registeredOrder: 0,
        };
      },
      methods: {
        getList() {
          const url = '/editors/users-list';
          axios.get(url).then((response) => {
            this.users = response.data.users;
            this.filteredList = this.users;
            this.schools = response.data.schools;
          });
        },
        filteringList() {
          //所属期間でのフィルタリング
          if (this.selectedSchool > 0) {
            this.filteredList = this.users.filter(user => user.school_id === this.selectedSchool);
          } else {
            this.filteredList = this.users;
          }

          // 名前順で並べ替え
          if (this.nameOrder == 1) {
            this.filteredList.sort((a, b) => {
              if (a.name > b.name) {
                return 1;
              } else {
                return -1;
              }
            })
          } else {
            this.filteredList.sort((a, b) => {
              if (b.name > a.name) {
                return 1;
              } else {
                return -1;
              }
            })
          }

          // 性別でのフィルタリング
          if (this.selectedSex > 0) {
            this.filteredList = this.filteredList.filter(user => user.sex == this.selectedSex);
          }

          // 登録順で並べ替え
          if (this.registeredOrder == 1) {
            this.filteredList.sort((a, b) => {
              if (b.created_at > a.created_at) {
                return 1;
              } else {
                return -1;
              }
            })
          } else {
            this.filteredList.sort((a, b) => {
              if (a.created_at > b.created_at) {
                return 1;
              } else {
                return -1;
              }
            })
          }
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
      mounted() {
        this.getList();
      },
    });

    app.mount('#main');

  </script>
@endsection
