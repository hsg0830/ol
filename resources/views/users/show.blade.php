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

    <div class="my-information">
      <div class="my-information__header">
        <span><i class="far fa-address-card"></i> 등록된 정보</span>
      </div>

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

    {{-- 보관해둔 기사 --}}
    {{-- <div class="my-favorites">
      <div class="my-favorites__header"><i class="far fa-bookmark"></i> 보관해둔 기사</div>

      <table class="bbs">
        <tr class="bbs__thead">
          <th class="bbs__question">질문</th>
          <th class="bbs__category">분류</th>
          <th class="bbs__date">투고날자</th>
        </tr>
        <tr>
          <td><a href="./bbs-show.html">닭알을 어떻게 발음해야 맞습니까?</a></td>
          <td data-label="분류">언어규범</td>
          <td data-label="투고날자">2021-04-06</td>
        </tr>
        <tr>
          <td><a href="./bbs-show.html">음악을 흘리다라는 말은 틀렸습니까?</a></td>
          <td data-label="분류">어휘</td>
          <td data-label="투고날자">2021-04-01</td>
        </tr>
      </table>
    </div> --}}

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
