@extends('layouts.app')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <!-- <a itemprop="item" href="カテゴリー2のURL"> -->
      <span itemprop="name">문의하기</span>
      <!-- </a> -->
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="one-column">
    <h1 class="category-title"><i class="far fa-envelope"></i> 문의하기</h1>

    <div class="error-message" v-if="Object.keys(errors).length">
      <ul>
        <li v-for="error in errors" v-text="error"></li>
      </ul>
    </div>

    {{-- 入力画面 --}}
    <div class="contact-form" v-if="isIndex">
      <div class="form-group">
        <label for="name">이름</label>
        <input type="text" id="name" required v-model="name" />
      </div>

      <div class="form-group">
        <label for="email">메일주소</label>
        <input type="email" id="email" required oncopy="return false" onpaste="return false" oncontextmenu="return false"
          v-model="email" @input="confirmEmail" />
      </div>

      <div class="form-group">
        <label for="email_confirmation">메일주소 (확인용)</label>
        <input type="email" id="email_confirmation" required oncopy="return false" onpaste="return false"
          oncontextmenu="return false" v-model="emailConfirmation" @input="confirmEmail" />
        <p class="error-message" v-if="emailConfirmationStatus === false">매일주소가 일치하지 않습니다.</p>
        <p class="form-tip"><i class="fas fa-exclamation-circle"></i>&nbsp;정확히 입력되였는지 확인하기 위하여 다시 입력하십시오.</p>
      </div>

      <div class="form-group">
        <label for="content">문의내용</label>
        <textarea id="content" cols="30" rows="10" required v-model="content"></textarea>
      </div>

      <div class="form-group">
        <button type="submit" class="btn global-btn" @click="confirm">확인하기</button>
      </div>
    </div>

    {{-- 確認画面 --}}
    <div class="contact-confirmation" v-if="isConfirmation">
      <table>
        <tr>
          <th>이름</th>
          <td v-text="name"></td>
        </tr>
        <tr>
          <th>메일주소</th>
          <td v-text="email"></td>
        </tr>
        <tr>
          <th>문의내용</th>
          <td v-html="content" style="white-space: pre-wrap;"></td>
        </tr>
      </table>

      <div class="form-group contact-confirmation__btn">
        <button type="submit" class="btn global-btn" @click="toIndex">돌아가기</button>
        <button type="submit" class="btn global-btn" @click="onSend">보내기</button>
      </div>
    </div>

    {{-- 送信中画面 --}}
    <div v-if="isSending">
      <div class="message block">
        <h2 class="category-title">송신중</h2>
        <p>문의내용을 보내고있습니다.</p>
        <p>잠시만 기다려주십시오.</p>
      </div>
    </div>

    {{-- 送信完了画面 --}}
    <div v-if="isSent">
      <div class="message block">
        <h2 class="category-title">접수완료</h2>
        <p>문의내용을 접수하였습니다.</p>
        <a href="{{ url('/') }}" class="text-underline">첫페지에로</a>

        <p>다른 문의를 하시렵니까?</p>
        <a class="text-underline" @click="toIndex">문의내용입력화면에로</a>
      </div>
    </div>

  </main>
@endsection

@section('js-files')
  <script src="https://unpkg.com/vue@next"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
          name: '',
          email: '',
          emailConfirmation: '',
          emailConfirmationStatus: true,
          content: '',
          status: 'index',
          errors: [],
        };
      },
      computed: {
        isIndex() {
          return this.status === 'index';
        },
        isConfirmation() {
          return this.status === 'confirmation';
        },
        isSending() {
          return this.status === 'sending';
        },
        isSent() {
          return this.status === 'sent';
        },
      },
      methods: {
        confirmEmail() {
          if (this.email !== this.emailConfirmation) {
            return (this.emailConfirmationStatus = false);
          }
          return (this.emailConfirmationStatus = true);
        },
        confirm() {
          if (this.name === '') {
            this.errors.push('성함을 입력하십시오.');
            return
          }
          if (this.email === '') {
            this.errors.push('메일주소를 입력하십시오.');
            return
          }
          if (this.content === '') {
            this.errors.push('문의하실 내용을 입력하십시오.');
            return
          }
          this.errors = [];
          this.status = 'confirmation';
        },
        toIndex(e) {
          e.preventDefault();
          this.status = 'index';
        },
        onSend() {
          if (confirm('문의내용을 보내시겠습니까?')) {
            this.status = 'sending';

            const url = `/contact`;
            const method = 'POST';
            const params = {
              _method: method,
              name: this.name,
              email: this.email,
              body: this.content,
            };

            axios
              .post(url, params)
              .then((response) => {
                if (response.data.result === true) {
                  this.status = 'sent';
                  this.name = '';
                  this.email = '';
                  this.content = '';
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
      },
    });

    app.mount('#one-column');

  </script>
@endsection
