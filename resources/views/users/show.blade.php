@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 회원정보관리')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name">회원정보관리</span>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="one-column">
    <h1 class="category-title">회원정보관리</h1>

    {{-- 会員情報 --}}
    <div class="my-information">
      <h2 class="my-information__header">
        <span><i class="far fa-address-card"></i> 등록된 정보</span>
      </h2>

      <div class="my-information__wrapper">
        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 이름:</span>
          {{ $user->name }}
        </div>
        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 메일주소:</span>
          {{ $user->email }}
        </div>
        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 성별:</span>
          @{{ sexes[user.sex] }}
        </div>
        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 생년월일:</span>
          {{ $user->birth_date }}
        </div>
        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 소속:</span>
          @{{ schools[user.school_id - 1].name }}
          <button class="btn global-btn" @click="modalOpen">소속변경</button>
        </div>
      </div>

      <div class="message">
        ※ 암호를 변경하고싶으신 경우에는 일단 로그아우트하신 다음에 로그인화면 아래쪽에 있는 암호재설정링크를 리용하십시오.
      </div>
    </div>

    {{-- お気に入り --}}
    <div class="my-favorites">
      <h2 class="my-favorites__header"><i class="far fa-bookmark"></i>보관해둔 기사</h2>

      <h3 class="my-favorites__category">학습실</h3>
      @if (count($favoriteArticles) > 0)
        <ul class="my-favorites__list">
          @foreach ($favoriteArticles as $article)
            <li class="my-favorites__list__item">
              <a href="{{ $article->url }}"><i class="fas fa-circle"></i>{{ $article->title }}</a>
            </li>
          @endforeach
        </ul>
      @else
        <div class="my-favorites__list">
          <p>보관하신 기사가 없습니다.</p>
        </div>
      @endif

      <h3 class="my-favorites__category">질문게시판</h3>
      @if (count($favoriteAsks) > 0)
        <ul class="my-favorites__list">
          @foreach ($favoriteAsks as $ask)
            <li class="my-favorites__list__item">
              <a href="{{ $ask->url }}"><i class="fas fa-circle"></i>{{ $ask->title }}</a>
            </li>
          @endforeach
        </ul>
      @else
        <div class="my-favorites__list">
          <p>보관하신 질문이 없습니다.</p>
        </div>
      @endif
    {{-- モーダル --}}
    <div class="user-modal js-modal">
      <div class="user-modal__bg js-modal" @click="modalClose"></div>

      <div class="user-modal__content">

        <div class="error-message" v-if="error">
          <p v-text="error"></p>
        </div>

        <div class="form-group">
          <label for="school">소속기관</label>
          <select type="select" id="school" required v-model="selectedSchool">
            <option value="0" selected>소속기관이름을 선택하십시오.</option>
            @foreach ($schools as $school)
              <option value="{{ $school->id }}">{{ $school->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="user-modal__buttons">
          <button class="btn global-btn" @click="modalClose">닫기</button>
          <button class="btn global-btn" @click="onSave">보내기</button>
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
          user: {!! $user !!},
          sexes: {
            1: '남',
            2: '녀',
          },
          schools: {!! $schools !!},
          selectedSchool: 0,
          error: '',
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
          if (this.selectedSchool == 0) {
            this.error = '소속기관을 선택하십시오.';
            return
          }

          if (confirm('소속을 변경하시겠습니까?')) {
            this.error = '';
            const url = `/users/${this.user.id}/change-school`;
            const params = {
              _method: 'POST',
              school_id: this.selectedSchool,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  alert('소속을 변경하였습니다.');
                  this.user = response.data.user;
                  this.modalClose();
                } else {
                  alert('변경할 내용이 없습니다.');
                  this.modalClose();
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
      },
    });

    app.mount('#one-column');

  </script>
@endsection
