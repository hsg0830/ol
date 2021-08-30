@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- 学習課題登録画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">학습과제등록</h1>

    <div class="error-message" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    {{-- 年月選択 --}}
    <div class="input-group mb-4">
      <!-- 年 -->
      <select name="year" class="form-select" v-model.number="year">
        @for ($i = 2021; $i <= date('Y'); $i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>년&nbsp;&nbsp;

      <!-- 月 -->
      <select name="month" class="form-select" v-model.number="month">
        @for ($i = 1; $i <= 12; $i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>월&nbsp;&nbsp;
    </div>

    <div class="mb-4 d-flex align-item-center row" v-for="(task, index) in tasks">
      <div class="col" v-text="task.month_index"></div>

      <div class="col"v-text="task.cleared_users"></div>

      <div class="col">
        <select name="category_id" class="form-select" v-model.number="task.category_id">
          <option value="1">학습</option>
          <option value="2">질문</option>
        </select>
      </div>

      <div class="col">
        <select name="article_id" class="form-select" v-model.number="task.article_id" v-if="task.category_id == 1">
          <option value="0">----- 학습실 -----</option>
          <option v-for="(article, index) in articles" :value="article.id" v-text="article.title"></option>
        </select>

        <select name="ask_id" class="form-select" v-model.number="task.ask_id" v-else-if="task.category_id ==2">
          <option value="0">----- 질문게시판 -----</option>
          <option v-for="(ask, index) in asks" :value="ask.id" v-text="ask.title"></option></option>
        </select>
      </div>

      <div class="col d-flex">
        <div class="">
          {{-- <label for="start" class="form-label">개시일</label> --}}
          <input type="date" class="form-control" id="start" v-model="task.start">
        </div>

        <div class="">
          {{-- <label for="end" class="form-label">완료일</label> --}}
          <input type="date" class="form-control" id="end" v-model="task.end">
        </div>
      </div>
    </div>

    <div>
      <button class="btn btn-primary me-3" @click="addFormBlock">과제추가</button>
      <button class="btn btn-danger me-3" @click="removeForm">마지막과제삭제</button>
      <button class="btn btn-success" @click="onSave">과제등록</button>
    </div>
  </main>
@endsection

@section('js-files')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          year: {!! $year ?? 2021 !!},
          month: {!! $month ?? 1 !!},
          tasks: [],
          articles: {!! $articles !!},
          asks: {!! $asks !!},
          currentTasks: {!! $tasks ?? 'null' !!},
          currentMode: 'create',
          errors: {},
        }
      },
      mounted() {
        if (this.currentTasks == null) {
          this.addFormBlock();
        } else {
          this.currentMode = 'edit';
          this.tasks = this.currentTasks;
        }
      },
      methods: {
        addFormBlock() {
          const newOrderNumber = this.tasks.length + 1;
          this.tasks.push({
            month_index: newOrderNumber,
            cleared_users: 0,
            category_id: 1,
            article_id: 0,
            ask_id: 0,
            start: '',
            end: '',
          });
        },
        removeForm() {
          this.tasks.splice(-1, 1);
        },
        onSave() {
          if (confirm('保存します。よろしいですか？')) {
            this.errors = {};
            let url = '';
            let method = '';

            if (this.currentMode === 'create') {
              url = '/editors/tasks';
              method = 'POST';
            } else {
              url = '/editors/tasks';
              method = 'PUT';
            }

            const params = {
              _method: method,
              mode: this.currentMode,
              year: this.year,
              month: this.month,
              tasks: this.tasks,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {

                  alert("保存しました。");

                  if (this.currentMode === 'create') {
                    this.tasks = [];
                    this.addFormBlock();
                  }

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
