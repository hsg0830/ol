@extends('layouts.editor')

@section('title', '얼 -- 問い合わせへの回答入力画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">問い合わせへの回答入力画面</h1>

    <a href="{{ route('contacts.list') }}" class="btn btn-primary mb-4">問い合わせ一覧画面へ</a>

    {{-- エラーメッセージ --}}
    <div class="alert alert-danger" role="alert" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    {{-- 質問内容 --}}
    <div class="row">
      <div class="col-4">
        質問者：@{{ contact.name }}
      </div>
      <div class="col-4">
        メールアドレス：@{{ contact.email }}
      </div>
    </div>

    <div class="row bg-light my-4 p-4" v-html="contact.description" style="white-space:pre-wrap;">
    </div>

    {{-- 回答入力フォーム --}}
    <div class="row mb-3">
      <label for="answer" class="form-label">問い合わせへの回答</label>
      <textarea class="form-control" id="answer" rows="15" v-model="reply"></textarea>
    </div>

    <div class="row mb-3">
      <button class="btn btn-primary" @click="modalOpen">プレビュー</button>
    </div>

    {{-- プレビュー用モーダル --}}
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close" @click="modalClose"></div>

      <div class="modal__content qa-modal">
        <div class="qa-modal__wrapper">
          <div class="qa-modal__answer" v-html="reply" style="white-space:pre-wrap;"></div>
        </div>

        <div class="buttons my-5 mx-auto d-flex justify-content-around">
          <button class="btn btn-danger" @click="modalClose">閉じる</button>
          <button class="btn btn-primary" @click="onSave">投稿を保存する</button>
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
          contact: {!! $contact !!},
          reply: '',
          errors: {},
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
          if (confirm('回答を送信します。よろしいですか？')) {
            const url = `/editors/contacts/${this.contact.id}`;
            const params = {
              _method: 'PUT',
              reply: this.reply,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  alert("回答を送信しました。");
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
      }
    });
    app.mount('#main');

  </script>
@endsection
