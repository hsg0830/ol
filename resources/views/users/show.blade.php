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
    {{ $user->name }}
    <h1 class="category-title">회원정보관리</h1>

    <div class="my-information">
      <div class="my-information__header">
        <span><i class="far fa-address-card"></i> 등록된 정보</span>
      </div>

      <div class="my-information__wrapper">
        <div class="my-information__item text-right">
          <a class="text-underline" href="#">암호재설정</a>
        </div>

        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 이름:</span>
          한성구
        </div>
        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 메일주소:</span>
          user1@example.com
        </div>
        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 성별:</span>
          남
        </div>
        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 생년월일:</span>
          1978년 8월 30일
        </div>
        <div class="my-information__item">
          <span><i class="fas fa-caret-right"></i> 소속:</span>
          조선대학교
          <button class="btn global-btn" @click="modalOpen">소속변경</button>
        </div>
      </div>
    </div>

    <div class="my-favorites">
      <div class="my-favorites__header"><i class="far fa-bookmark"></i> 보관해둔 기사</div>

      <table class="bbs">
        <tr class="bbs__thead">
          <!-- <th class="bbs__no"></th> -->
          <th class="bbs__question">질문</th>
          <!-- <th class="bbs__question"></th> -->
          <th class="bbs__category">분류</th>
          <!-- <th class="bbs__status">회답</th> -->
          <th class="bbs__date">투고날자</th>
        </tr>
        <tr>
          <!-- <td>1</td> -->
          <!-- <td data-label="질문">닭알을 어떻게 발음해야 맞습니까?</td> -->
          <td><a href="./bbs-show.html">닭알을 어떻게 발음해야 맞습니까?</a></td>
          <td data-label="분류">언어규범</td>
          <!-- <td data-label="회답"><span class="status-label">완료</span></td> -->
          <td data-label="투고날자">2021-04-06</td>
        </tr>
        <tr>
          <!-- <td>2</td> -->
          <td><a href="./bbs-show.html">음악을 흘리다라는 말은 틀렸습니까?</a></td>
          <td data-label="분류">어휘</td>
          <!-- <td data-label="회답"><span class="status-label unanswered">미결</span></td> -->
          <td data-label="투고날자">2021-04-01</td>
        </tr>
        <tr>
          <!-- <td>3</td> -->
          <td><a href="./bbs-show.html">가지고가 맞습니까? 가져서가 맞습니까?</a></td>
          <td data-label="분류">문법</td>
          <!-- <td data-label="회답"><span class="status-label">완료</span></td> -->
          <td data-label="투고날자">2021-03-22</td>
        </tr>
        <tr>
          <!-- <td>4</td> -->
          <td><a href="./bbs-show.html">닭알을 어떻게 발음해야 맞습니까? 닭알을 어떻게 발음해야 맞습니까?</a></td>
          <td data-label="분류">언어규범</td>
          <!-- <td data-label="회답"><span class="status-label">완료</span></td> -->
          <td data-label="투고날자">2021-04-06</td>
        </tr>
        <tr>
          <!-- <td>2</td> -->
          <td><a href="./bbs-show.html">음악을 흘리다라는 말은 틀렸습니까?</a></td>
          <td data-label="분류">어휘</td>
          <!-- <td data-label="회답"><span class="status-label unanswered">미결</span></td> -->
          <td data-label="투고날자">2021-04-01</td>
        </tr>
        <tr>
          <!-- <td>3</td> -->
          <td><a href="./bbs-show.html">가지고가 맞습니까? 가져서가 맞습니까?</a></td>
          <td data-label="분류">문법</td>
          <!-- <td data-label="회답"><span class="status-label">완료</span></td> -->
          <td data-label="투고날자">2021-03-22</td>
        </tr>
        <tr>
          <!-- <td>4</td> -->
          <td><a href="./bbs-show.html">닭알을 어떻게 발음해야 맞습니까? 닭알을 어떻게 발음해야 맞습니까?</a></td>
          <td data-label="분류">언어규범</td>
          <!-- <td data-label="회답"><span class="status-label">완료</span></td> -->
          <td data-label="투고날자">2021-04-06</td>
        </tr>
      </table>
    </div>

    <div class="user-modal js-modal">
      <div class="user-modal__bg js-modal" @click="modalClose"></div>

      <div class="user-modal__content">

        <div class="error-message" v-if="error">
          <p v-text="error"></p>
        </div>

        <div class="form-group">
          <label for="school">학교</label>
          <select type="select" id="school" required v-model="selectedSchool">
            <option value="0" selected>학교이름을 선택하십시오.</option>
            <option value="1">조선대학교</option>
            <option value="2">도꾜조선중고급학교</option>
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

@section('js-files')
  <script src="https://unpkg.com/vue@next"></script>
@endsection

@section('js-script')
  <script>
    const app = Vue.createApp({
      data() {
        return {
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
            this.error = '학교를 선택하십시오.';
            return
          }
          this.error = '';
          console.log(this.selectedSchool);
        },
      },
    });

    app.mount('#one-column');

  </script>
@endsection
