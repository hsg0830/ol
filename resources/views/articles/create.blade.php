@extends('layouts.editor')

@section('title', '얼 -- 学習室記事画面')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/destyle.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
  <div id="one-column" class="post-form">
    <h1 class="page-title">学習室の記事の投稿フォーム</h1>

    <div class="error-message" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    {{-- 入力補助フォーム --}}
    <div class="form-tag-sample border border-info border-3 rounded-3 p-3 position-fixed" style="width: 60%;">
      <div class="d-flex justify-content-around my-3">
        <button id="01" class="btn btn-info form-btn" @click="copyFormTemplate">段落</button>
        <button id="02" class="btn btn-info form-btn" @click="copyFormTemplate">引用ブロック</button>
        <button id="03" class="btn btn-info form-btn" @click="copyFormTemplate">太字で強調</button>
        <button id="04" class="btn btn-info form-btn" @click="copyFormTemplate">アンダーライン</button>
        <button id="05" class="btn btn-info form-btn" @click="copyFormTemplate">脚注</button>
        <button id="06" class="btn btn-info form-btn" @click="copyFormTemplate">画像</button>
        <button id="07" class="btn btn-info form-btn" @click="copyFormTemplate">動画</button>
      </div>

      <div class="d-flex justify-content-around" style="position: absolute; left: -9999px">
        <textarea readonly id="form-01" cols="20" rows="3"><p>内容</p></textarea>

        <textarea readonly id="form-02" cols="20"
          rows="3"><blockquote class="quote">引用ブロック（中にpタグ可能）</blockquote></textarea>

        <textarea readonly id="form-03" cols="20" rows="3"><span class="emphasis">太字で強調</span></textarea>

        <textarea readonly id="form-04" cols="20" rows="3"><span class="moving-underline">アンダーライン</span></textarea>

        <textarea readonly id="form-05" cols="20"
          rows="3"><p><sup class="caption tooltip" title="脚注の内容">[1]←脚注番号</sup></p></textarea>

        <textarea readonly id="form-06" cols="20"
          rows="3"><div class="article-media"><img src="ソースURL" alt="No Image"></div></textarea>

        <textarea readonly id="form-07" cols="20" rows="3"><div class="article-media"><video src="ソースURL" controls controlsList="nodownload" oncontextmenu="return false;"></video></div>
            </textarea>
      </div>
    </div>

    {{-- タイトル部 --}}
    <div style="border: 2px solid brown; padding:0.5rem; background-color: lemonchiffon; margin: 11rem 0 2rem">
      <div class="mb-3">
        <p class="label">カテゴリー</p>
        {{-- <label for="category">カテゴリー：</label> --}}
        <select id="category" class="form-select" v-model="articleCategory">
          <option>--------</option>
          <option v-for="category in categories" v-text="category.name" :value="category.id"></option>
        </select>
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
          <textarea :id="`sub-content-${index}`" class="form-control" rows="10" v-model="subContent.description"></textarea>
        </div>

      </div>
    </div>
{{--    <div id="sub-form-area" class="p-3" style="background-color:skyblue">--}}
{{--      <div id="sub-section-0" class="mb-3" style="background-color:pink">--}}
{{--        <div class="mb-3">--}}
{{--          <label for="sub-no-0">サブタイトル番号：</label>--}}
{{--          <input id="sub-no-0" type="text" class="form-control" value="1" readonly />--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--          <label for="sub-title-0">サブタイトル：</label>--}}
{{--          <input id="sub-title-0" type="text" class="form-control" />--}}
{{--        </div>--}}

{{--        <div class="mb-3">--}}
{{--          <label for="sub-content-0">本文：</label>--}}
{{--          <textarea id="sub-content-0" class="form-control" rows="10"></textarea>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

    {{-- 各種ボタン --}}
    <div class="buttons my-5 mx-auto d-flex justify-content-around">
      <button v-if="subContents.length > 1" class="btn btn-danger mr-3" @click="removeForm">末尾のフォームブロックを削除</button>

      <button class="btn btn-primary" @click="addFormBlock">入力フォームを追加</button>

      <button class="btn btn-success" @click="preview">投稿内容をプレビュー</button>
    </div>

    {{-- プレビュー用モーダル --}}
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close" @click="modalClose"></div>

      <div class="modal__content article-modal">

        <main id="main">
          <!-- タイトル部 -->
          <div class="title-block">
            <img src="{{ asset('img/bg_black-board_thum.png') }}" alt="" />
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

        <div class="buttons my-5 mx-auto d-flex justify-content-around">
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
          categories: [],
          // subCategories: [],
          articleCategory: '',
          subCategory: '',
          articleTitle: '',
          articleIntroduction: '',
          // formBlockCount: 0,
          subContents: [],
          errors: {},
        }
      },
      created() {
        this.getCategories();
      },
      methods: {
        getCategories() {
          const url = '/editors/articles/categories';
          axios.get(url)
            .then((response) => {
              this.categories = response.data.categories;
              // this.subCategories = response.data[1];
            });
        },
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

          // // フォームブロックの数を追加
          // this.formBlockCount++;
          //
          // // 最後にformBlock要素をappendする親要素
          // const formArea = document.querySelector('#sub-form-area');
          //
          // // フォームブロックを作成
          // const formBlock = document.createElement('div');
          // formBlock.id = `sub-section-${this.formBlockCount}`;
          // formBlock.classList.add('mb-3');
          // formBlock.style.backgroundColor = 'pink';
          //
          // // サブタイトル番号エリア
          // const subNoBlock = document.createElement('div');
          // subNoBlock.classList.add('mb-3');
          // const subNoLabel = document.createElement('label');
          // subNoLabel.htmlFor = `sub-no-${this.formBlockCount}`;
          // subNoLabel.textContent = 'サブタイトルの番号：';
          // subNoBlock.appendChild(subNoLabel);
          // const subNoInput = document.createElement('input');
          // subNoInput.id = `sub-no-${this.formBlockCount}`;
          // subNoInput.type = 'text';
          // subNoInput.value = this.formBlockCount + 1;
          // subNoInput.readOnly = true;
          // subNoInput.classList.add('form-control');
          // subNoBlock.appendChild(subNoInput);
          // formBlock.appendChild(subNoBlock);
          //
          // // サブタイトルエリア
          // const subTitleBlock = document.createElement('div');
          // subTitleBlock.classList.add('mb-3');
          // const subTitleLabel = document.createElement('label');
          // subTitleLabel.htmlFor = `sub-title-${this.formBlockCount}`;
          // subTitleLabel.textContent = 'サブタイトル：';
          // subTitleBlock.appendChild(subTitleLabel);
          // const subTitleInput = document.createElement('input');
          // subTitleInput.id = `sub-title-${this.formBlockCount}`;
          // subTitleInput.type = 'text';
          // subTitleInput.classList.add('form-control');
          // subTitleBlock.appendChild(subTitleInput);
          // formBlock.appendChild(subTitleBlock);
          //
          // // 本文エリア
          // const subContentBlock = document.createElement('div');
          // subContentBlock.classList.add('mb-3');
          // const subContentLabel = document.createElement('label');
          // subContentLabel.htmlFor = `sub-content-${this.formBlockCount}`;
          // subContentLabel.textContent = '本文：';
          // subContentBlock.appendChild(subContentLabel);
          // const subContentInput = document.createElement('textarea');
          // subContentInput.id = `sub-content-${this.formBlockCount}`;
          // subContentInput.classList.add('form-control');
          // subContentInput.rows = 10;
          // subContentBlock.appendChild(subContentInput);
          // formBlock.appendChild(subContentBlock);
          //
          // // formBlockをformAreaに追加
          // formArea.appendChild(formBlock);
        },
        removeForm() {
          // const removeObj = document.querySelector(`#sub-section-${this.formBlockCount}`);
          // removeObj.remove();
          // this.formBlockCount--;
          this.subContents.splice(-1,1);
        },
        preview() {
          // this.subContents = [];

          // for (let i = 0; i < this.formBlockCount + 1; i++) {
          //   const order = document.querySelector(`#sub-no-${i}`).value;
          //   const title = document.querySelector(`#sub-title-${i}`).value;
          //   const content = document.querySelector(`#sub-content-${i}`).value;
          //
          //   const subContent = {
          //     order: parseInt(order),
          //     title: title,
          //     description: content,
          //   };
          //
          //   this.subContents.push(subContent);
          //
          // }
          this.modalOpen();
        },
        modalOpen() {
          $('.js-modal').fadeIn();
        },
        modalClose() {
          $('.js-modal').fadeOut();
        },
        onSave() {
          if (confirm('保存します。よろしいですか？')) {
            const url = '/editors/articles';
            const method = 'POST';

            const params = {
              _method: method,
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
                  alert('記事を保存しました。');
                  this.clearParams();
                  this.addFormBlock();
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

          }) || {}; // 存在しない場合は空オブジェクト

        },
        currentSubCategories() {

          return this.currentCategory.sub_categories;

        }
      },
      watch: {
        articleCategory() {
          this.subCategory = ''; // バリデーションが反応してしまうので、カテゴリ変更時はサブカテゴリを初期化
        }
      },
      mounted() {

        this.addFormBlock(); // ページ読み込みが完了したらフォーム・ブロックを１つ追加

      }
    });

    app.mount('#one-column');

  </script>
@endsection
