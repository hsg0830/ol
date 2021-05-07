@extends('layouts.editor')

@section('title', '얼 -- QA投稿・編集画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">QA投稿・編集</h1>

    <a href="{{ route('qa.list') }}" class="btn btn-primary">QA一覧画面へ</a>

    {{-- エラーメッセージ --}}
    <div class="alert alert-danger" role="alert" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    {{-- カテゴリー・公開ステータス選択フォーム --}}
    <div class="row my-3">
      <div class="col-3 form-floating">
        <select class="form-select" id="category" v-model="selectedCategory" @change="onChangeCategory">
          <option>----</option>
          <option v-for="category in categories" :value="category.id" v-text="category.name"></option>
        </select>
        <label for="category">カテゴリー</label>
      </div>

      <div class="col-3 form-floating" v-if="currentCategory.has_sub_category">
        <select class="form-select" id="sub-category" v-model="selectedSubCategory">
          <option>----</option>
          <option v-for="subCategory in currentSubCategories" :value="subCategory.id" v-text="subCategory.name"></option>
        </select>
        <label for="sub-category">サブカテゴリー</label>
      </div>

      <div class="col-3 form-floating">
        <select class="form-select" id="status" v-model="status">
          <option value="0" selected>非公開</option>
          <option value="1">公開</option>
        </select>
        <label for="status">公開状態</label>
      </div>
    </div>

    {{-- タイトル入力フォーム --}}
    <div class="row mb-3">
      <label for="title" class="form-label">質問タイトル</label>
      <input type="text" class="form-control form-control-lg" id="title" placeholder="質問タイトル" v-model="questionTitle">
    </div>

    {{-- 回答入力フォーム --}}
    <div class="row mb-3">
      <label for="answer" class="form-label">質問への回答</label>
      <textarea class="form-control" id="answer" rows="15" v-model="questionAnswer"></textarea>
    </div>

    <div class="row mb-3">
      <button class="btn btn-primary" @click="modalOpen">プレビュー</button>
    </div>

    {{-- プレビュー用モーダル --}}
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close" @click="modalClose"></div>

      <div class="modal__content qa-modal">
        <div class="qa-modal__wrapper">
          <div class="qa-modal__title" v-text=questionTitle></div>
          <div class="qa-modal__answer" v-html="questionAnswer"></div>
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
          categories: {!! $categories !!},
          currentMode: 'create',
          currentQuestion: {!! $question ?? 'null' !!},
          selectedCategory: '',
          selectedSubCategory: '',
          status: 0,
          questionTitle: '',
          questionAnswer: '',
          errors: {},
        }
      },
      computed: {
        currentCategory() {
          return this.categories.find(category => {
            return (parseInt(category.id) === parseInt(this.selectedCategory))
          }) || {};
        },
        currentSubCategories() {
          return this.currentCategory.sub_categories;
        }
      },
      mounted() {
        if (this.currentQuestion !== null) {
          this.currentMode = 'edit';
          // this.articleUrl = this.currentArticle.url;
          this.status = this.currentQuestion.status;
          this.selectedCategory = this.currentQuestion.category_id;
          this.selectedSubCategory = this.currentQuestion.sub_category_id;
          this.questionTitle = this.currentQuestion.title;
          this.questionAnswer = this.currentQuestion.answer;
        }
      },
      methods: {
        onChangeCategory() {
          this.selectedSubCategory = '';
        },
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
              url = '/editors/qa';
              method = 'POST';
            } else {
              url = `/editors/qa/${this.currentQuestion.id}`;
              method = 'PUT';
            }

            const params = {
              _method: method,
              status: this.status,
              title: this.questionTitle,
              category_id: this.selectedCategory,
              sub_category_id: this.selectedSubCategory,
              answer: this.questionAnswer,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  alert("QAを保存しました。");

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
          this.selectedCategory = '';
          this.selectedSubCategory = '';
          this.status = 0;
          this.questionTitle = '';
          this.questionAnswer = '';
        }
      }
    });

    app.mount('#main');

  </script>
@endsection
