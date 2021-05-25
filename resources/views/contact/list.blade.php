@extends('layouts.editor')

@section('title', '얼 -- 問い合わせ一覧')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">문의내용관리</h1>

    <div class="row bg-light p-3 border border-3">
      <div class="col-3">
        문의총수: @{{ contacts . length }}
      </div>
      <div class="col-3">
        조건에 맞는 문의수: @{{ filteredContacts . length }}
      </div>
    </div>

    <div class="row mt-3 mb-3">
      <div class="col-2 form-floating">
        <select class="form-select" id="status" v-model="selectedStatus">
          <option value="2" selected>전체</option>
          <option value="0">미회답</option>
          <option value="1">회답완료</option>
        </select>
        <label for="status">회답정형</label>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">이름</th>
          <th scope="col">메일주소</th>
          <th scope="col">문의날자</th>
          <th scope="col">답변상태</th>
          <th scope="col">답변날자</th>
          <th scope="col">처리</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center" v-for="contact in filteredContacts">
          <th scope="row" v-text="contact.id"></th>
          <td v-text="contact.name"></td>
          <td>
            <a :href="getEmailLink(contact)" v-text="contact.email"></a>
          </td>
          <td v-text="contact.created_date"></td>
          <td v-text="contact.status"></td>
          <td v-text="contact.replied_at"></td>
          <td>
            <button class="btn btn-success me-3" @click="modalOpen(contact)">내용확인</button>
            <a class="btn btn-primary me-3" :href="contact.reply_url">답변하기</a>
            <button class="btn btn-danger" @click="onDelete(contact)">삭제</button>
          </td>
        </tr>
      </tbody>
    </table>

    {{-- プレビュー用モーダル --}}
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close" @click="modalClose"></div>

      <div class="modal__content qa-modal">
        <div class="qa-modal__wrapper">
          <div class="qa-modal__answer" v-html="selectedContact.name"></div>
          <div class="qa-modal__answer" v-html="selectedContact.description"></div>
          <div class="qa-modal__answer" v-if="selectedContact.status === 1" v-html="selectedContact.reply"></div>
        </div>

        <div class="buttons my-5 mx-auto d-flex justify-content-around">
          <button class="btn btn-danger" @click="modalClose">閉じる</button>
          <a class="btn btn-primary" :href="selectedContact.reply_url">답변하기</a>
        </div>

      </div>
    </div>
  </main>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          contacts: [],
          selectedContact: '',
          selectedStatus: 2,
        };
      },
      computed: {
        filteredContacts() {
          let contacts = this.contacts;

          if (this.selectedStatus < 2) {
            contacts = contacts.filter(contact => contact.status === parseInt(this.selectedStatus));
          }

          return contacts;
        },
      },
      methods: {
        getList() {
          const url = '/editors/contacts/get-list';
          axios.get(url).then((response) => {
            this.contacts = response.data.contacts;
          });
        },
        getEmailLink(contact) {
          return `mailto:${contact.email}`;
        },
        modalOpen(contact) {
          this.selectedContact = contact;
          $('.js-modal').fadeIn();
        },
        modalClose() {
          $('.js-modal').fadeOut();
        },
        onDelete(contact) {
          if (confirm('削除します。よろしいですか？')) {
            const url = `/editors/contacts/${contact.id}`;
            axios.delete(url).then((response) => {
              if (response.data.result === true) {
                alert('問い合わせを削除しました。');
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
