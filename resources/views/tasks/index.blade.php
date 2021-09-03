@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 학습과제')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name">학습과제</span>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="one-column">
    <h1 class="category-title">월별학습과제</h1>

    <div class="task-date">
      <!-- 年 -->
      <select name="year" class="task-date__select" v-model.number="year">
        @for ($i = 2021; $i <= date('Y'); $i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>년

      <!-- 月 -->
      <select name="month" class="task-date__select" v-model.number="month" @change="getList">
        @for ($i = 1; $i <= 12; $i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>월
    </div>

    <template v-if="tasks.length > 0">
      <table class="task-list">
        <tr class="task-list__thead">
          <th>제목</th>
          <th>기간</th>
          <th>정형</th>
        </tr>

        {{-- v-for開始 --}}
        <tr v-for="(task, index) in tasks">
          {{-- タイトル --}}
          <td>
            <template v-if="task.article_id > 0">
              <a :href="getArticleUrl(task.article_id)">
                <span v-text="selectArticle(task.article_id)"></span>
              </a>
            </template>
            <template v-else>
              <a :href="getAskUrl(task.ask_id)">
                <span v-text="selectAsk(task.ask_id)"></span>
              </a>
            </template>
          </td>
          {{-- 期間 --}}
          <td data-label="기간" v-text="`${task.start}〜${task.end}`"></td>
          {{-- 処理 --}}
          <td data-label="정형">
              <span v-if="checkStatus(task)">
                {{-- <button class="status-label" @click="changeClearedStatus(task.id, 1)">완료취소</button> --}}
                <span class="status-label">완료</span>
              </span>
              <span v-else>
                {{-- <button class="status-label unanswered" @click="changeClearedStatus(task.id, 0)">완료보고</button> --}}
                <span class="status-label unanswered">미결</span>
              </span>
              @if (Auth::guard()->check() && Auth::user()->role > 0)
                <button class="status-label catergory-200" @click="showProgress(task)">단위정형</button>
              @endif
          </td>
        </tr>
        {{-- v-for終わり --}}
      </table>
    </template>
    <template v-else>
      <p class="message">등록된 과제가 없습니다.</p>
    </template>

    {{-- 学校別学習状況 --}}
    <div v-if="progress" class="task-progress">
      <h2 class="task-progress__heading">
        <span>학습정형</span>
        <button @click="closeProgress"><i class="fas fa-times-circle"></i> 닫기</button>
      </h2>

      <p class="task-progress__title" v-text="currentTaskTitle"></p>

      <ul class="task-progress__members">
        <li v-for="user in users">
          <span class="task-progress__members__name" v-text="user.name"></span>
          <span v-if="checkStatus(currentTask, user.id)">●</span>
          <span v-else>×</span>
        </li>
      </ul>
    </div>
    {{-- 学校別学習状況 --}}

  </main>
@endsection

@section('js-files')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          articles: {!! $articles !!},
          asks: {!! $asks !!},
          tasks: [],
          year: new Date().getFullYear(),
          month: new Date().getMonth()+1,
          isUser: {!! $isAuthoried ? 'true' : 'false' !!},
          userId: {!! $userId ?? 'null' !!},
          users: @json($users),
          progress: false,
          currentTask: '',
          currentTaskTitle: '',
        }
      },
      mounted() {
        this.getList();
      },
      methods: {
        getList() {
          const url = '/tasks/get-list';

          axios.get(url, {
              params: {
                year: this.year,
                month: this.month,
              }
            })
            .then((response) => {
              this.tasks = response.data.tasks;
            })
        },
        selectArticle(articleId) {
          const article = this.articles.find((article) => article.id == articleId);
          return article.title;
        },
        selectAsk(askId) {
          const ask = this.asks.find((ask) => ask.id == askId);
          return ask.title;
        },
        getArticleUrl(articleId) {
          const article = this.articles.find((article) => article.id === articleId);
          return article.url;
        },
        getAskUrl(askId) {
          const ask = this.asks.find((ask) => ask.id === askId);
          return ask.url;
        },
        checkStatus(task, userId) {
          let currentUserId;

          if (userId == null) {
            currentUserId = this.userId;
          } else {
            currentUserId = userId;
          }

          let passed = [];
          const checkArr = task.cleared_users;

          if (checkArr.length > 0) {
            passed = checkArr.filter(member => member.id == currentUserId);
          }

          if (passed.length > 0) {
            return true;
          } else {
            return false;
          }
        },
        // changeClearedStatus(taskId, currentStatus) {
        //   let url = `/tasks/${taskId}/`;
        //   let method = 'POST';

        //   if (currentStatus == 0) {
        //     url += 'cleared';
        //   } else {
        //     url += 'un-cleared';
        //     method = 'DELETE';
        //   }

        //   const params = {
        //       _method: method,
        //   };

        //   axios.post(url, params)
        //     .then((response) => {
        //       this.closeProgress();
        //       this.getList();
        //     });
        // },
        showProgress(task) {
          this.currentTask = task;

          if (this.currentTask.category_id == 1) {
            this.currentTaskTitle = this.selectArticle(task.article_id);
          } else {
            this.currentTaskTitle = this.selectAsk(task.ask_id);
          }

          return this.progress = true;
        },
        closeProgress() {
          return this.progress = false;
        }
      },
    });

    app.mount('#one-column');
  </script>
@endsection
