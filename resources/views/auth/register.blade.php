@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 회원등록')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name">회원등록</span>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="one-column">

    {{-- 初期画面 --}}
    <div v-if="isInitial">

      {{-- 認証コード入力画面 --}}
      <form class="login-form pw-comfirm" v-if="!checkStatus">

        <v-errors :error="errors.check_code"></v-errors>

        <div class="form-group">
          <label for="check-code">암호</label>
          <input type="password" id="check-code" v-model="checkCode">
          <p class="form-tip"><i class="fas fa-exclamation-circle"></i>&nbsp;학교에서 전달된 확인용암호를 입력하십시오. 입력하신 다음에는 enter건을 누르지
            말고 보내기단추를 누르십시오.</p>
        </div>

        <div class="form-group">
          <button type="button" class="btn global-btn" @click="confirmCheckCode()">보내기</button>
        </div>

      </form>

      {{-- 認証後の登録情報入力画面 --}}
      <div class="register-form" v-if="checkStatus">

        <div class="form-group">
          <label for="name">이름</label>
          <input type="text" id="name" v-model="name" />
          <v-errors :error="errors.name"></v-errors>
        </div>

        <div class="form-group">
          <span class="form-label">생년월일</span>

          <!-- 年 -->
          <select name="birth_year" class="birth_date" v-model="birthYear">
            <option></option>
            @for ($i = 1945; $i <= date('Y'); $i++)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>년&nbsp;&nbsp;

          <!-- 月 -->
          <select name="birth_month" class="birth_date" v-model="birthMonth">
            <option></option>
            @for ($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>월&nbsp;&nbsp;

          <!-- 日 -->
          <select name="birth_day" class="birth_date" v-model="birthDay">
            <option></option>
            @for ($i = 1; $i <= 31; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>일

          <v-errors :error="errors.birth_year"></v-errors>
          <v-errors :error="errors.birth_month"></v-errors>
          <v-errors :error="errors.birth_day"></v-errors>
          <v-errors :error="errors.birth_date"></v-errors>

        </div>

        <div class="form-group radio">
          <span class="form-label">성별</span>
          <input type="radio" name="sex" id="male" value="1" v-model="sex" />
          <label for="male">남</label>
          <input type="radio" name="sex" id="female" value="2" v-model="sex" />
          <label for="female">녀</label>

          <v-errors :error="errors.sex"></v-errors>
        </div>

        <div class="form-group">
          <label for="school">소속기관</label>
          <select type="select" id="school" v-model="schoolId">
            <option>소속기관이름을 선택하십시오.</option>
            @foreach ($schools as $school)
              <option value="{{ $school->id }}">{{ $school->name }}</option>
            @endforeach
          </select>

          <v-errors :error="errors.school_id"></v-errors>
        </div>

        <div class="form-group">
          <label for="email">메일주소</label>
          <input type="email" id="email" oncopy="return false" onpaste="return false" oncontextmenu="return false"
            v-model="email" @input="confirmEmail" />
          <v-errors :error="errors.email"></v-errors>
        </div>

        <div class="form-group">
          <label for="email_confirmation">메일주소 (확인용)</label>
          <input type="email" id="email_confirmation" oncopy="return false" onpaste="return false"
            oncontextmenu="return false" v-model="emailConfirmation" @input="confirmEmail" />
          <p class="error-message" v-if="emailConfirmationStatus === false">매일주소가 일치하지 않습니다.</p>
          <p class="form-tip"><i class="fas fa-exclamation-circle"></i>&nbsp;정확히 입력되였는지 확인하기 위하여 다시 입력하십시오.</p>
        </div>

        <div class="form-group">
          <label for="password">암호</label>
          <input type="password" id="password" oncopy="return false" onpaste="return false" oncontextmenu="return false"
            v-model="password" @input="confirmPassword" />
          <p class="form-tip"><i class="fas fa-exclamation-circle"></i>&nbsp;암호는 8글자이상이여야 합니다.</p>
          <v-errors :error="errors.password"></v-errors>
        </div>

        <div class="form-group">
          <label for="password_confirmation">암호 (확인용)</label>
          <input type="password" id="password_confirmation" oncopy="return false" onpaste="return false"
            oncontextmenu="return false" v-model="passwordConfirmation" @input="confirmPassword" />
          <p class="error-message" v-if="passwordConfirmationStatus === false">암호가 일치하지 않습니다.</p>
          <p class="form-tip"><i class="fas fa-exclamation-circle"></i>&nbsp;정확히 입력되였는지 확인하기 위하여 다시 입력하십시오.</p>
        </div>

        <div class="form-group">
          <button type="button" class="btn global-btn" @click="onSave()">보내기</button>
        </div>
      </div>

      <div class="message">
        <p>로그인을 하시렵니까?</p>
        <a href="{{ route('login') }}" class="text-underline">로그인페지에로</a>
      </div>
    </div>

    {{-- 登録内容送信中画面 --}}
    <div v-if="isRegistering">
      <div class="message block">
        <h1 class="category-title">송신중</h1>

        <p>정보를 보내고있습니다.</p>
        <p>다른 조작을 하지 말고 잠시만 기다려주십시오.</p>
        <span class="loading-icon fas fa-sync" aria-hidden="true"></span>
      </div>
    </div>

    {{-- 登録完了画面 --}}
    <div v-if="isRegistered">
      <div class="message block">
        <h1 class="category-title">송신완료</h1>
        <p>회원등록이 성과적으로 끝났습니다.</p>
        <p>2초후에 자동적으로 이동됩니다.</p>
        <span class="loading-icon fas fa-sync" aria-hidden="true"></span>
      </div>
    </div>

  </main>
@endsection

@section('js-files')
  <script src="{{ asset('/js/vue-components/ErrorComponent.js') }}"></script>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          checkCode: '',
          checkStatus: false,
          status: 'initial',
          name: '',
          birthYear: '',
          birthMonth: '',
          birthDay: '',
          sex: '',
          schoolId: '소속기관이름을 선택하십시오.',
          email: '',
          emailConfirmation: '',
          emailConfirmationStatus: '',
          password: '',
          passwordConfirmation: '',
          passwordConfirmationStatus: '',
          errors: {},
        }
      },
      components: {
        'v-errors': errorComponent,
      },
      computed: {
        isInitial() {
          return this.status === 'initial'
        },
        isRegistering() {
          return this.status === 'registering';
        },
        isRegistered() {
          return this.status === 'registered';
        },
      },
      methods: {
        confirmCheckCode() {
          if (this.checkCode === '') {
            return alert('암호를 입력하십시오.');
          }

          const url = '/check-code';
          const method = 'POST';
          const params = {
            _method: method,
            check_code: this.checkCode,
          };

          axios
            .post(url, params)
            .then((response) => {
              if (response.data.result === true) {
                return this.checkStatus = true;
              }
            })
            .catch((error) => {
              if (error.response.status === 422) {
                const responseErrors = error.response.data.errors;
                console.log(responseErrors);
                let errors = {};

                for (const key in responseErrors) {
                  errors[key] = responseErrors[key][0];
                }
                console.log(errors);
                this.errors = errors;
              } else {
                console.log(error);
              }
            });
        },
        confirmEmail() {
          if (this.email !== this.emailConfirmation) {
            return this.emailConfirmationStatus = false;
          }
          return this.emailConfirmationStatus = true;
        },
        confirmPassword() {
          if (this.password !== this.passwordConfirmation) {
            return this.passwordConfirmationStatus = false;
          }
          return this.passwordConfirmationStatus = true;
        },
        onSave() {
          if (confirm('회원정보를 등록하시렵니까?')) {
            this.status = 'registering';
            const url = '/register';
            const method = 'POST';

            const params = {
              _method: method,
              check_code: this.checkCode,
              name: this.name,
              birth_year: parseInt(this.birthYear),
              birth_month: parseInt(this.birthMonth),
              birth_day: parseInt(this.birthDay),
              sex: parseInt(this.sex),
              school_id: parseInt(this.schoolId),
              email: this.email,
              password: this.password,
              password_confirmation: this.passwordConfirmation,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  setTimeout(() => {
                    window.location.href = response.data.url;
                  }, 2000);
                  this.status = 'registered';
                }
              })
              .catch((error) => {
                if (error.response.status === 422) {
                  const responseErrors = error.response.data.errors;
                  console.log(responseErrors);
                  let errors = {};

                  for (const key in responseErrors) {
                    errors[key] = responseErrors[key][0];
                  }
                  console.log(errors);
                  this.errors = errors;
                } else {
                  console.log(error);
                }

                this.status = 'initial';
              });
          }
        },
      },
    });

    app.mount('#one-column');

  </script>
@endsection
