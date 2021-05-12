@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- お知らせ一覧画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">알림관리</h1>

    <a href="{{ route('notices.create') }}" class="btn btn-primary mb-3">お知らせ新規投稿画面へ</a>

    {{-- リスト --}}
    <table class="table table-striped">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">부류</th>
          <th scope="col" class="col-5">제목</th>
          <th scope="col">공개일</th>
          <th scope="col">처리</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="notice in notices">
          <th scope="row" v-text="notice.id"></th>
          <th v-text="notice.role"></th>
          <td class="text-start" v-text="notice.title"></td>
          <td v-text="notice.date"></td>
          <td>
            <a :href="notice.edit_url" class="btn btn-primary me-3" target="_blank">편집</a>
            <button class="btn btn-danger" @click="onDelete(notice)">삭제</button>
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
          data: {},
          notices: [],
          page: 1,
        };
      },
      components: {
        'v-pagination': paginationComponent,
      },
      methods: {
        getList() {
          const url = '/editors/notices/get-list';

          axios.get(url, {
              params: {
                page: this.page,
              }
            })
            .then((response) => {
              this.data = response.data.notices;
              this.notices = response.data.notices.data;
            });
        },
        movePage(page) {
          this.page = page;
          location.hash = `${this.page}`;
          this.getList();
          Vue.nextTick(() => {
            scrollTo(0, 0);
          });
        },
        onDelete(notice) {
          if (confirm('削除します。よろしいですか？')) {
            const url = `/editors/notices/${notice.id}`;
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
