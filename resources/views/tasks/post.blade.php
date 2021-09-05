@extends('layouts.editor')

@section('title', '얼 -우리 말 배움터- 学習課題登録画面')

@section('content')
  <main id="main" class="container">
    <h1 class="page-title">학습과제등록</h1>

    {{-- バリデーションエラー --}}
    <div class="error-message" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    {{-- 年月選択 --}}
    <div class="input-group mb-4">
      <!-- 年 -->
      <select name="year" class="form-select" v-model.number="year" @change="getTasks">
        @for ($i = 2021; $i <= date('Y'); $i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>년&nbsp;&nbsp;

      <!-- 月 -->
      <select name="month" class="form-select" v-model.number="month" @change="getTasks">
        @for ($i = 1; $i <= 12; $i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>월&nbsp;&nbsp;
    </div>

    {{-- 課題登録・編集フォーム --}}
    <div class="mb-4 d-flex justify-content-around align-item-center text-center row" v-for="(task, index) in tasks">
      {{-- <div class="col" v-text="task.month_index"></div> --}}

      {{-- カテゴリー選択 --}}
      <div class="col-1">
        <select name="category_id" class="form-select" v-model.number="task.category_id">
          <option value="1">학습</option>
          <option value="2">질문</option>
          <option value="3">자료</option>
        </select>
      </div>

      {{-- 課題タイトル選択 --}}
      <div class="col-4">
        <select name="article_id" class="form-select" v-model.number="task.article_id" v-if="task.category_id == 1">
          <option value="0">----- 학습실 -----</option>
          <option v-for="(article, index) in articles" :value="article.id" v-text="article.title"></option>
        </select>

        <select name="ask_id" class="form-select" v-model.number="task.ask_id" v-else-if="task.category_id ==2">
          <option value="0">----- 질문게시판 -----</option>
          <option v-for="(ask, index) in asks" :value="ask.id" v-text="ask.title"></option></option>
        </select>

        <select name="material_id" class="form-select" v-model.number="task.material_id" v-else-if="task.category_id == 3">
          <option value="0">----- 자료 -----</option>
          <option v-for="(material, index) in materials" :value="material.id" v-text="material.title"></option></option>
        </select>
      </div>

      {{-- 開始日と終了日 --}}
      <div class="col-4 d-flex justify-content-around">
        <div class="">
          {{-- <label for="start" class="form-label">개시일</label> --}}
          <input type="date" class="form-control" id="start" v-model="task.start">
        </div>

        <div class="">
          {{-- <label for="end" class="form-label">완료일</label> --}}
          <input type="date" class="form-control" id="end" v-model="task.end">
        </div>
      </div>

      {{-- 完了者 --}}
      <div class="col">완료: @{{ task.cleared_users }}명</div>

      {{-- modeがedit時の処理 --}}
      <div class="col" v-if="currentMode == 'edit'">
        <div class="btn btn-success me-2" v-if="task.id" @click="onUpdate(task)">수정</div>
        <div class="btn btn-primary me-2" v-else @click="onUpdate(task)">추가</div>
        <div class="btn btn-danger" v-if="task.cleared_users == 0" @click="onDelete(task)">삭제</div>
      </div>
    </div>

    <div>
      {{-- 全mode共通処理 --}}
      <button class="btn btn-primary me-3" @click="addFormBlock">과제추가</button>
      <button class="btn btn-danger me-3" @click="removeForm">마지막과제삭제</button>
      {{-- modeがcreate時の処理 --}}
      <button class="btn btn-success" v-if="currentMode == 'create'" @click="onCreate">과제등록</button>
    </div>
  </main>
@endsection

@section('js-files')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          year: {!! $year ?? getdate()['year'] !!},
          month: {!! $month ?? getdate()['mon'] !!},
          tasks: [],
          articles: {!! $articles !!},
          asks: {!! $asks !!},
          materials: {!! $materials !!},
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
          this.tasks.push({
            category_id: 1,
            article_id: 0,
            ask_id: 0,
            material_id: 0,
            start: '',
            end: '',
            cleared_users: 0,
          });
        },
        removeForm() {
          this.tasks.splice(-1, 1);
        },
        getTasks() {
          if (this.currentMode == 'create') {
            return
          }

          const url = '/editors/tasks/get-tasks';
          const params = {
            year: this.year,
            month: this.month,
          };

          axios.get(url, {
            params: params,
          }).then((response) => {
            this.tasks = response.data.tasks;
          })
        },
        onCreate() {
          if (confirm('保存します。よろしいですか？')) {
            this.errors = {};
            const url = '/editors/tasks';

            const params = {
              year: this.year,
              month: this.month,
              tasks: this.tasks,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  this.tasks = response.data.tasks;
                  this.currentMode = 'edit';
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
        onUpdate(task) {
          if (confirm('保存します。よろしいですか？')) {
            this.errors = {};
            let url = '';
            let method = '';

            if(task.id) {
              url = `/editors/tasks/${task.id}`;
              method = 'PUT';
            } else {
              url = `/editors/tasks/add`;
              method = 'POST';
            }

            const params = {
              _method: method,
              year: this.year,
              month: this.month,
              task: task,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  alert('変更内容を保存しました。');
                  this.tasks = response.data.tasks;
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
        onDelete(task) {
          if (confirm('削除します。よろしいですか？')) {
            this.errors = {};
            const url = `/editors/tasks/${task.id}`;
            const method = 'delete';

            const params = {
              _method: method,
              year: this.year,
              month: this.month,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  this.tasks = response.data.tasks;
                  scrollTo(0, 0);
                }
              })
              .catch((error) => {
                  console.log(error);
              });
          }
        },
      }
    });

    app.mount('#main');
  </script>
@endsection
