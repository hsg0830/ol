@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- お知らせ投稿・編集画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">お知らせ投稿・編集</h1>

    <a href="{{ route('notices.list') }}" class="btn btn-primary">お知らせ一覧画面へ</a>

    {{-- エラーメッセージ --}}
    <div class="alert alert-danger" role="alert" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    {{-- role選択フォーム --}}
    <div class="row my-3">
      <div class="col-3 form-floating">
        <select class="form-select" id="role" v-model="role">
          <option value="0" selected>普通</option>
          <option value="1">特別</option>
        </select>
        <label for="role">扱い</label>
      </div>
    </div>

    {{-- 概要入力フォーム --}}
    <div class="row mb-3">
      <label for="title" class="form-label">お知らせの概要</label>
      <textarea class="form-control" id="title" rows="5" v-model="noticeTitle"></textarea>
    </div>

    {{-- 詳細入力フォーム --}}
    <div class="row mb-3" v-if="role == 1">
      <label for="description" class="form-label">お知らせの詳細</label>
      <textarea class="form-control" id="description" rows="15" v-model="noticeDescription"></textarea>
    </div>

    <div class="row mb-3">
      <button class="btn btn-primary" @click="modalOpen">プレビュー</button>
    </div>

    {{-- プレビュー用モーダル --}}
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close" @click="modalClose"></div>

      <div class="modal__content qa-modal">
        <div class="qa-modal__wrapper">
          <div class="qa-modal__answer" v-text="noticeTitle"></div>
          <div class="qa-modal__answer" style="margin-top: 3rem;" v-if="role == 1" v-html="noticeDescription"></div>
        </div>

        <div class="buttons my-5 mx-auto d-flex justify-content-around">
          <button class="btn btn-danger" @click="modalClose">閉じる</button>
          <button class="btn btn-primary" @click="onSave">お知らせを保存する</button>
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
          currentMode: 'create',
          currentNotice: {!! $notice ?? 'null' !!},
          role: 0,
          noticeTitle: '',
          noticeDescription: '',
          errors: {},
        }
      },
      mounted() {
        if (this.currentNotice !== null) {
          this.currentMode = 'edit';
          this.role = this.currentNotice.role;
          this.noticeTitle = this.currentNotice.title;
          this.noticeDescription = this.currentNotice.description;
        }
      },
      methods: {
        modalOpen() {
          $('.js-modal').fadeIn();
        },
        modalClose() {
          $('.js-modal').fadeOut();
        },
        onSave() {
          if (confirm('保存します。よろしいですか？')) {
            this.errors = {};
            let url = '';
            let method = '';

            if (this.currentMode === 'create') {
              url = '/editors/notices';
              method = 'POST';
            } else {
              url = `/editors/notices/${this.currentNotice.id}`;
              method = 'PUT';
            }

            const params = {
              _method: method,
              role: this.role,
              title: this.noticeTitle,
              description: this.noticeDescription,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  alert("お知らせを保存しました。");

                  if (this.currentMode === 'create') {
                    this.clearParams();
                  }

                  this.modalClose();
                  scrollTo(0, 0);
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
                  this.modalClose();
                  scrollTo(0, 0);

                } else {
                  console.log(error);
                }
              });
          }
        },
        clearParams() {
          this.errors = {};
          this.role = 0;
          this.noticeTitle = '';
          this.noticeDescription = '';
        }
      }
    });

    app.mount('#main');

  </script>
@endsection
