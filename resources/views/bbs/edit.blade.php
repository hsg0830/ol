@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- 質問掲示板編集画面')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/destyle.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">질문게시판 질문편집</h1>

    <div class="error-message" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    <div class="row bg-light border p-3 mb-3">{!! nl2br($ask->draft) !!}</div>

    <div class="d-flex mb-3">
      <div class="me-5">
        <p class="label">処理</p>
        {{-- <label for="category">カテゴリー：</label> --}}
        <select id="status" class="form-select" v-model="status" @change="changeTreatment">
          <option value="0">未対応</option>
          <option value="1">公開</option>
          <option value="2">執筆中</option>
          <option value="3">棄却</option>
        </select>
      </div>

      <div class="me-5">
        <p class="label">カテゴリー</p>
        {{-- <label for="category">カテゴリー：</label> --}}
        <select id="category" class="form-select" v-model="askCategory" @change="onChangeCategory">
          <option>--------</option>
          <option v-for="category in categories" v-text="category.name" :value="category.id"></option>
        </select>
      </div>

      <div class="mb-3" v-if="currentCategory.has_sub_category">
        <p class="label">サブカテゴリー</p>
        {{-- <label for="category">カテゴリー：</label> --}}
        <select id="sub-category" class="form-select" v-model="askSubCategory">
          <option>--------</option>
          <option v-for="category in currentSubCategories" v-text="category.name" :value="category.id"></option>
        </select>
      </div>
    </div>

    <template v-if="isInitial">
      <div class="buttons my-5 mx-auto d-flex justify-content-around">
        <button class="btn btn-primary" @click="changeStatus">ステータスを変更する</button>
      </div>
    </template>

    <template v-else>
      <div class="row mb-3">
        <label for="title" class="form-label">제목</label>
        <input type="text" name="title" id="title" class="form-control" v-model="title">
      </div>

      <div class="row mb-3">
        <label for="description" class="form-label">질문내용</label>
        <textarea name="description" id="description" class="form-control" id="title" class="form-control" rows="10"
          v-model="description"></textarea>
      </div>

      <div class="row mb-3">
        <label for="reply" class="form-label">대답</label>
        <textarea name="reply" id="reply" class="form-control" id="title" class="form-control" rows="10"
          v-model="reply"></textarea>
      </div>

      <div class="row">
        <button class="btn btn-primary" @click="modalOpen">プレビュー</button>
      </div>
    </template>

    {{-- プレビュー用モーダル --}}
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close" @click="modalClose"></div>

      <div class="modal__content article-modal">

        <main>
          <div class="ask">
            <h2 class="ask__title"><span v-text="title"></span></h2>
            <div class="ask__info">
              <span class="category" v-text="askCategory"></span>
              <span class="date">투고일: <span v-text="ask.created_at"></span></span>
            </div>
          </div>

          <div class="ask-detail" v-html="description"></div>

          <div class="reply">
            <div class="reply__date">회답일: 2021-XX-XX</div>
            <div class="reply__content" v-html="reply"></div>
          </div>
        </main>

        <div class="buttons my-5 mx-auto d-flex justify-content-around">
          <button class="btn btn-danger" @click="modalClose">閉じる</button>

          <div class="form-check" v-show="status == 1">
            <input class="form-check-input" type="checkbox" id="send-mail" v-model="sendMail">
            <label class="form-check-label" for="send-mail">
              메일보내기
            </label>
          </div>

          <button class="btn btn-primary" @click="onSave">回答を保存する</button>
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
          ask: {!! $ask !!},
          categories: {!! $categories !!},
          askCategory: '',
          askSubCategory: '',
          treatment: '',
          status: '',
          title: '',
          description: '',
          reply: '',
          sendMail: false,
          errors: {},
        }
      },
      mounted() {
        this.askCategory = this.ask.category_id;
        this.askSubCategory = this.ask.sub_category_id;
        this.status = this.ask.status;
        this.title = this.ask.title;
        this.description = this.ask.description;
        this.reply = this.ask.reply;

        if (this.status == 1 || this.status == 2) {
          this.treatment = '';
        } else {
          this.treatment = 'initial';
        }
      },
      computed: {
        currentCategory() {
          return this.categories.find(category => {
            return (parseInt(category.id) === parseInt(this.askCategory))
          }) || {};
        },
        currentSubCategories() {
          return this.currentCategory.sub_categories;
        },
        isInitial() {
          return this.treatment === 'initial';
        },
      },
      methods: {
        changeTreatment() {
          if (this.status == 1 || this.status == 2) {
            this.treatment = '';
          } else {
            this.treatment = 'initial';
          }
        },
        onChangeCategory() {
          this.askSubCategory = '';
        },
        modalOpen() {
          $('.js-modal').fadeIn();
        },
        modalClose() {
          $('.js-modal').fadeOut();
        },
        changeStatus() {
          if (confirm('ステータスを変更します。よろしいですか？')) {
            this.errors = {};
            const url = `/editors/bbs/${this.ask.id}/change-status`;
            const method = 'PUT';

            const params = {
              _method: method,
              status: this.status,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  alert("ステータスを変更を保存しました。");
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
                } else {
                  console.log(error);
                }
              });
          }
        },
        onSave() {
          if (confirm('保存します。よろしいですか？')) {
            this.errors = {};
            const url = `/editors/bbs/${this.ask.id}`;
            const method = 'PUT';

            const params = {
              _method: method,
              category_id: this.askCategory,
              sub_category_id: this.askSubCategory,
              status: this.status,
              title: this.title,
              description: this.description,
              reply: this.reply,
              send_mail: this.sendMail,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  alert("質問と回答を保存しました。");
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
      },
    });

    app.mount('#main');

  </script>
@endsection
