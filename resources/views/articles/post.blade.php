@extends('layouts.editor')

@section('title', '얼 -- 学習室記事投稿・編集画面')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/destyle.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
  <div id="one-column" class="post-form">
    <h1 class="page-title">学習室の記事の投稿フォーム</h1>

    <a href="{{ route('articles.list') }}" class="btn btn-primary mb-3">一覧画面へ</a>

    <div class="error-message" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    <div v-if="articleUrl" class="mb-4">
      <a :href="articleUrl" target="_blank" class="btn btn-success">記事を確認</a>
    </div>

    {{-- 入力補助フォーム --}}
    <div class="form-tag-sample border border-info border-3 rounded-3 p-3 position-fixed">
      <div class="d-flex my-3">
        <button id="01" class="btn btn-info form-btn me-4" @click="copyFormTemplate">段落</button>
        <button id="02" class="btn btn-info form-btn me-4" @click="copyFormTemplate">引用ブロック</button>
        <button id="03" class="btn btn-info form-btn me-4" @click="copyFormTemplate">太字で強調</button>
        <button id="04" class="btn btn-info form-btn me-4" @click="copyFormTemplate">アンダーライン</button>
        <button id="05" class="btn btn-info form-btn me-4" @click="copyFormTemplate">脚注</button>
        <button id="06" class="btn btn-info form-btn me-4" @click="copyFormTemplate">画像</button>
        <button id="07" class="btn btn-info form-btn" @click="copyFormTemplate">動画</button>
      </div>

      <div class="d-flex justify-content-around" style="position: absolute; left: -9999px">
        <textarea readonly id="form-01" cols="20" rows="3"><p>内容</p></textarea>

        <textarea readonly id="form-02" cols="20"
          rows="3"><blockquote class="quote">引用ブロック（中にpタグ可能）</blockquote></textarea>

        <textarea readonly id="form-03" cols="20" rows="3"><span class="emphasis">太字で強調</span></textarea>

        <textarea readonly id="form-04" cols="20" rows="3"><span class="moving-underline">アンダーライン</span></textarea>

        <textarea readonly id="form-05" cols="20"
          rows="3"><sup class="caption tooltip" data-text="脚注の内容">[1]←脚注番号</sup></textarea>

        <textarea readonly id="form-06" cols="20"
          rows="3"><div class="article-media"><img src="ソースURL" alt="No Image"></div></textarea>

        <textarea readonly id="form-07" cols="20" rows="3"><div class="article-media"><video src="ソースURL" controls controlsList="nodownload" oncontextmenu="return false;"></video></div>
                    </textarea>
      </div>
    </div>

    {{-- タイトル部 --}}
    <div style="border: 2px solid brown; padding:0.5rem; background-color: lemonchiffon; margin: 11rem 0 2rem">
      <div class="d-flex mb-3">
        <div class="me-5">
          <p class="label">カテゴリー</p>
          {{-- <label for="category">カテゴリー：</label> --}}
          <select id="category" class="form-select" v-model="articleCategory" @change="onChangeCategory">
            <option>--------</option>
            <option v-for="category in categories" v-text="category.name" :value="category.id"></option>
          </select>
        </div>

        <div>
          <p class="label">公開状態</p>
          {{-- <label for="category">カテゴリー：</label> --}}
          <select id="status" class="form-select" v-model="status">
            <option value="0">非公開</option>
            <option value="1">公開</option>
          </select>
        </div>
      </div>

      <div class="mb-3" v-if="currentCategory.has_sub_category">
        <p class="label">サブカテゴリー</p>
        {{-- <label for="category">カテゴリー：</label> --}}
        <select id="sub-category" class="form-select" v-model="subCategory">
          <option>--------</option>
          <option v-for="category in currentSubCategories" v-text="category.name" :value="category.id"></option>
        </select>
      </div>

      <div class="mb-3">
        <p class="label">記事のタイトル</p>
        {{-- <label for="title">記事のタイトル：</label> --}}
        <input id="title" type="text" class="form-control" v-model="articleTitle" />
      </div>

      <div class="mb-3">
        <p class="label">イントロダクション</p>
        {{-- <label for="introduction">イントロダクション：</label> --}}
        <textarea id="introduction" class="form-control" rows="10" v-model="articleIntroduction"></textarea>
      </div>
    </div>

    {{-- サブコンテンツ部 --}}
    <div id="sub-form-area" class="p-3 mb-3" style="background-color:skyblue">
      <div class="mb-3" style="background-color:pink" v-for="(subContent,index) in subContents">

        <div class="mb-3">
          <label :for="`sub-no-${index}`">サブタイトル番号：</label>
          <input :id="`sub-no-${index}`" type="text" class="form-control" v-model="subContent.order" readonly />
        </div>

        <div class="mb-3">
          <label :for="`sub-title-${index}`">サブタイトル：</label>
          <input :id="`sub-title-${index}`" type="text" class="form-control" v-model="subContent.title" />
        </div>

        <div class="mb-3">
          <label :for="`sub-content-${index}`">本文：</label>
          <textarea :id="`sub-content-${index}`" class="form-control" rows="10"
            v-model="subContent.description"></textarea>
        </div>

      </div>
    </div>

    {{-- 各種ボタン --}}
    <div class="buttons my-5 mx-auto d-flex justify-content-around">
      <button v-if="subContents.length > 1" class="btn btn-danger mr-3" @click="removeForm">末尾のフォームブロックを削除</button>

      <button class="btn btn-primary" @click="addFormBlock">入力フォームを追加</button>

      <button class="btn btn-success" @click="modalOpen">投稿内容をプレビュー</button>
    </div>

    {{-- プレビュー用モーダル --}}
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close" @click="modalClose"></div>

      <div class="modal__content article-modal">

          <main style="max-width: 800px; margin: 0 auto;">
          <!-- タイトル部 -->
          <div class="title-block">
            <img src="{{ asset('img/thum/bg_black-board_thum.png') }}" alt="" v-if="articleCategory == 100" />
            <img src="{{ asset('img/thum/bg_white-board_thum.png') }}" alt="" v-else-if="articleCategory == 200" />
            <img src="{{ asset('img/thum/bg_memo_thum.png') }}" alt="" v-else-if="articleCategory == 300" />
            <img src="{{ asset('img/thum/bg_film_thum.png') }}" alt="" v-else-if="articleCategory == 400" />
            <div class="title-block__category" v-text="articleCategory"></div>
            <h1 class="title-block__title" v-text="articleTitle"></h1>
            <div class="title-block__date">갱신날자: <time>XXXX-XX-XX</time></div>
          </div>
          <!-- タイトル部 -->

          <!-- 本文部 -->
          <div class="content-block">
            <section class="content-section">
              <div class="section-content-block" v-html="articleIntroduction"></div>
            </section>
            <section v-for="item in subContents" class="content-section">
              <div class="section-title-block">
                {{-- <span class="section-title-block__number" v-text="item.no"></span> --}}
                <h3 class="section-title-block__title" v-text="item.title"></h3>
              </div>
              <div class="section-content-block" v-html="item.description"></div>
            </section>
          </div>
          <!-- 本文部 -->
        </main>

        <div class="buttons my-5 mx-auto d-flex justify-content-around" style="max-width: 800px;">
          <button class="btn btn-danger" @click="modalClose">閉じる</button>
          <button class="btn btn-primary" @click="onSave">投稿を保存する</button>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          categories: {!! $categories !!},
          currentArticle: {!! $article ?? 'null' !!},
          currentMode: 'create',
          articleUrl: '',
          articleCategory: '',
          subCategory: '',
          status: 0,
          articleTitle: '',
          articleIntroduction: '',
          subContents: [],
          errors: {},
        }
      },
      mounted() {
        if (this.currentArticle === null) {
          this.addFormBlock();
        } else {
          this.currentMode = 'edit';
          this.articleUrl = this.currentArticle.url;
          this.articleCategory = this.currentArticle.category_id;
          this.subCategory = this.currentArticle.sub_category_id;
          this.status = this.currentArticle.status;
          this.articleTitle = this.currentArticle.title;
          this.articleIntroduction = this.currentArticle.introduction;
          this.subContents = this.currentArticle.sub_contents;
        }
      },
      methods: {
        copyFormTemplate(e) {
          const selector = e.target.getAttribute('id');
          const formEl = document.querySelector(`#form-${selector}`);
          formEl.select();
          document.execCommand('copy');
          alert(`コピーできました！ : ${formEl.value}`);
        },
        addFormBlock() {
          const newOrderNumber = this.subContents.length + 1;
          this.subContents.push({
            order: newOrderNumber,
            title: '',
            description: '',
          });
        },
        removeForm() {
          this.subContents.splice(-1, 1);
        },
        modalOpen() {
          $('.js-modal').fadeIn();
        },
        modalClose() {
          $('.js-modal').fadeOut();
        },
        onChangeCategory() {
          this.subCategory = '';
        },
        onSave() {
          if (confirm('保存します。よろしいですか？')) {
            this.errors = {};
            let url = '';
            let method = '';

            if (this.currentMode === 'create') {
              url = '/editors/articles';
              method = 'POST';
            } else {
              url = `/editors/articles/${this.currentArticle.id}`;
              method = 'PUT';
            }

            const params = {
              _method: method,
              status: this.status,
              title: this.articleTitle,
              category_id: this.articleCategory,
              sub_category_id: this.subCategory,
              introduction: this.articleIntroduction,
              subContents: this.subContents,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  this.articleUrl = response.data.article.url;

                  alert("記事を保存しました。\n"+ this.articleUrl);

                  if (this.currentMode === 'create') {
                    this.clearParams();
                    this.addFormBlock();
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
          this.status = 0;
          this.articleTitle = '';
          this.articleCategory = '';
          this.subCategory = '';
          this.articleIntroduction = '';
          this.subContents = [];
        }
      },
      computed: {
        currentCategory() {
          return this.categories.find(category => {
            return (parseInt(category.id) === parseInt(this.articleCategory))
          }) || {};
        },
        currentSubCategories() {
          return this.currentCategory.sub_categories;
        }
      },
    });

    app.mount('#one-column');

  </script>
@endsection
