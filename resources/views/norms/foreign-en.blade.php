@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 외국말적기법')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/norm.css') }}">
@endsection

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ route('norms', 'index') }}">
        <span itemprop="name">규범원문</span>
      </a>
      <meta itemprop="position" content="2" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name">외국말적기법 (영어)</span>
      <meta itemprop="position" content="3" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">
    <h1 class="page-title">외국말적기법 (영어)</h1>

    <div class="message" style="margin: 1rem auto; text-align: right; width: 100%;">
      <ul>
        <li><a href="{{ url('/norms/foreign')}}">외국말적기법 첫페지에로</a></li>
      </ul>
    </div>

    <button class="btn all-ex-btn">
      <i class="fas fa-bars"></i>&nbsp;
      <span>전체해설닫기</span>
    </button>

    <div class="chapter">
      <h2 class="title chapter__title text-center">
        <span><i class="fas fa-feather-alt"></i>&nbsp;영어단어를 우리 글자로 적는 법</span>
      </h2>

      <!-- 첫째로 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1.&nbsp;</span>영어의 자모이름은 우리 글자로 다음과 같이 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td>A a<br>에이</td>
                <td>B b<br>비</td>
                <td>C c<br>씨</td>
                <td>D d<br>디</td>
                <td>E e<br>이</td>
              </tr>
              <tr>
                <td>F f<br>에프</td>
                <td>G g<br>쥐</td>
                <td>H h<br>에취</td>
                <td>I i<br>아이</td>
                <td>J j<br>줴이</td>
              </tr>
              <tr>
                <td>K k<br>케이</td>
                <td>L l<br>엘</td>
                <td>M m<br>엠</td>
                <td>N n<br>엔</td>
                <td>O o<br>어우</td>
              </tr>
              <tr>
                <td>P p<br>피</td>
                <td>Q q<br>큐</td>
                <td>R r<br>아</td>
                <td>S s<br>에스</td>
                <td>T t<br>티</td>
              </tr>
              <tr>
                <td>U u<br>유</td>
                <td>V v<br>븨</td>
                <td>W w<br>다블유</td>
                <td>X x<br>엑스</td>
                <td>Y y<br>와이</td>
              </tr>
              <tr>
                <td>Z z<br>젣</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">
              <span class="complement">참고</span>
              규범은 우와 같으나 일상적인 언어생활에서는 일부 다르게 부르군 합니다.
            </p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td>R r (아르)</td>
                  <td>V v (브이)</td>
                  <td>Z z (제트)</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- 둘째로 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2.&nbsp;</span>영어는 단어를 단위로 하여 우리 글로 적는다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
      </div>

      <!-- 셋째로 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3.&nbsp;</span>영어단어는 그 발음을 나타내는 국제발음기호에 우리 글자를 대응시키는 방법으로 적는다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
      </div>

      <!-- 넷째로 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>4.&nbsp;</span>영어의 국제발음기호는 다음의 대응적기표에 따라 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="auxiliary">
            <p class="description">
              <span class="complement">참고</span>
              영어단어의 발음을 국제발음기호를 써서 표기할 때 영국식발음인가 미국식발음인가 하는데 따라 발음표기도 달라지는데 우리 나라에서는 영국식발음에 근거하여 우리 말로 옮깁니다.
            </p>
            {{-- <div class="example">
              <table class="mb-0">
                <tr>
                  <td>R r (아르)</td>
                  <td>V v (브이)</td>
                  <td>Z z (제트)</td>
                </tr>
              </table>
            </div> --}}
          </div>

          {{-- 모음기호 --}}
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>(1)&nbsp;</span>모음기호 (※력점부호는 생략함)
            </h4>

            <div class="example">
              <table class="foreign-table">

                <tr>
                  <th><span class="sp-hide">기호</span></th>
                  <th><span class="sp-hide">우리 글자</span></th>
                  <th>례</th>
                </tr>

                {{-- a / ɑ / ʌ --}}
                <tr>
                  <td class="sil">a<br>ɑ<br>ʌ</td>
                  <td>ㅏ</td>
                  <td class="text-left">
                    Irene&nbsp;
                    <span class="sil">/<span class="text-em">a</span>ɪriːn/</span>&nbsp;
                    <span class="text-em">아</span>이린<br>
                    Outer&nbsp;
                    <span class="sil">/<span class="text-em">a</span>ʊtə/</span>&nbsp;
                    <span class="text-em">아</span>우터<br>
                    Genii&nbsp;
                    <span class="sil">/ʤiːnɪ<span class="text-em">a</span>ɪ/</span>&nbsp;
                    쥐니<span class="text-em">아</span>이<br>
                    Simon&nbsp;
                    <span class="sil">/s<span class="text-em">a</span>ɪmən/</span>&nbsp;
                    <span class="text-em">싸</span>이먼<br>
                    Down&nbsp;
                    <span class="sil">/d<span class="text-em">a</span>ʊn/</span>&nbsp;
                    <span class="text-em">다</span>운<br>
                    Arthur&nbsp;
                    <span class="sil">/<span class="text-em">ɑ</span>ːθə/</span>&nbsp;
                    <span class="text-em">아</span>써<br>
                    Zoar&nbsp;
                    <span class="sil">/zəʊ<span class="text-em">ɑ</span>ː/</span>&nbsp;
                    저우<span class="text-em">아</span><br>
                    Margaret&nbsp;
                    <span class="sil">/m<span class="text-em">ɑ</span>ːɡərɪt/</span>&nbsp;
                    <span class="text-em">마</span>거리트<br>
                    Under&nbsp;
                    <span class="sil">/<span class="text-em">ʌ</span>ndə/</span>&nbsp;
                    <span class="text-em">안</span>더<br>
                    Columbia&nbsp;
                    <span class="sil">/kəl<span class="text-em">ʌ</span>mbɪə/</span>&nbsp;
                    컬<span class="text-em">람</span>비어<br>
                  </td>
                </tr>

                {{-- æ --}}
                <tr>
                  <td class="sil">æ</td>
                  <td>ㅐ</td>
                  <td class="text-left">
                    Anna&nbsp;
                    <span class="sil">/<span class="text-em">æ</span>nə/</span>&nbsp;
                    <span class="text-em">애</span>너<br>
                    Seattle&nbsp;
                    <span class="sil">/sɪ<span class="text-em">æ</span>tl/</span>&nbsp;
                    씨<span class="text-em">애</span>틀<br>
                  </td>
                </tr>

                {{-- eə --}}
                <tr>
                  <td class="sil">eə</td>
                  <td>ㅔ어</td>
                  <td class="text-left">
                    Eire&nbsp;
                    <span class="sil">/<span class="text-em">eə</span>rə/</span>&nbsp;
                    <span class="text-em">에어</span>러<br>
                    Maryland&nbsp;
                    <span class="sil">/m<span class="text-em">eə</span>rɪlænd/</span>&nbsp;
                    <span class="text-em">메어</span>릴랜드<br>
                  </td>
                </tr>

                {{-- ə / ɜ --}}
                <tr>
                  <td class="sil">ə<br>ɜ</td>
                  <td>ㅓ</td>
                  <td class="text-left">
                    Abaddon&nbsp;
                    <span class="sil">/<span class="text-em">ə</span>bæd<span class="text-em">ə</span>n/</span>&nbsp;
                    <span class="text-em">어</span>베<span class="text-em">던</span><br>
                    Ernest&nbsp;
                    <span class="sil">/<span class="text-em">ɜ</span>ːnɪst/</span>&nbsp;
                    <span class="text-em">어</span>니스트<br>
                    Tobias&nbsp;
                    <span class="sil">/t<span class="text-em">ə</span>bɑɪ<span class="text-em">ə</span>s/</span>&nbsp;
                    <span class="text-em">터</span>바이<span class="text-em">어</span>스<br>
                    Superior&nbsp;
                    <span class="sil">/sjuːpɪ<span class="text-em">ə</span>rɪ<span class="text-em">ə</span>/</span>&nbsp;
                    쓔피<span class="text-em">어</span>리<span class="text-em">어</span><br>
                    Ware&nbsp;
                    <span class="sil">/we<span class="text-em">ə</span>/</span>&nbsp;
                    웨<span class="text-em">어</span><br>
                    Birmingham&nbsp;
                    <span class="sil">/b<span class="text-em">ɜ</span>ːmɪŋ<span class="text-em">ə</span>m/</span>&nbsp;
                    <span class="text-em">버</span>밍<span class="text-em">엄</span><br>
                    Herbert&nbsp;
                    <span class="sil">/h<span class="text-em">ɜ</span>ːb<span class="text-em">ə</span>t/</span>&nbsp;
                    <span class="text-em">허버</span>트<br>
                  </td>
                </tr>

                {{-- e --}}
                <tr>
                  <td class="sil">e</td>
                  <td>ㅔ</td>
                  <td class="text-left">
                    Ellen&nbsp;
                    <span class="sil">/<span class="text-em">e</span>lən/</span>&nbsp;
                    <span class="text-em">엘</span>런<br>
                    Henrietta&nbsp;
                    <span class="sil">/h<span class="text-em">e</span>nrɪ<span class="text-em">e</span>tə/</span>&nbsp;
                    <span class="text-em">헨</span>리<span class="text-em">에</span>터<br>
                    Amy&nbsp;
                    <span class="sil">/<span class="text-em">e</span>ɪmi/</span>&nbsp;
                    <span class="text-em">에</span>이미<br>
                    Baker&nbsp;
                    <span class="sil">/b<span class="text-em">e</span>ɪkə/</span>&nbsp;
                    <span class="text-em">베</span>이커<br>
                  </td>
                </tr>

                {{-- ɪ / i --}}
                <tr>
                  <td class="sil">ɪ<br>i</td>
                  <td>ㅣ</td>
                  <td class="text-left">
                    Indian&nbsp;
                    <span class="sil">/<span class="text-em">ɪ</span>nd<span class="text-em">ɪ</span>ən/</span>&nbsp;
                    <span class="text-em">인디</span>언<br>
                    Erie&nbsp;
                    <span class="sil">/<span class="text-em">ɪ</span>ər<span class="text-em">i</span>/</span>&nbsp;
                    <span class="text-em">이</span>어<span class="text-em">리</span><br>
                    Idaho&nbsp;
                    <span class="sil">/ɑ<span class="text-em">ɪ</span>dəhəʊ/</span>&nbsp;
                    아<span class="text-em">이</span>더허우<br>
                    Loyd&nbsp;
                    <span class="sil">/lɒ<span class="text-em">ɪ</span>d/</span>&nbsp;
                    로<span class="text-em">이</span>드<br>
                    Nereid&nbsp;
                    <span class="sil">/n<span class="text-em">ɪ</span>ər<span class="text-em">ɪɪ</span>d/</span>&nbsp;
                    <span class="text-em">니</span>어<span class="text-em">리이</span>드<br>
                    Mississippi&nbsp;
                    <span class="sil">/m<span class="text-em">ɪ</span>s<span class="text-em">ɪ</span>s<span class="text-em">ɪ</span>p<span class="text-em">i</span>/</span>&nbsp;
                    <span class="text-em">미씨씨피</span><br>
                    Hebe&nbsp;
                    <span class="sil">/h<span class="text-em">i</span>ːb<span class="text-em">i</span>ː/</span>&nbsp;
                    <span class="text-em">히비</span><br>
                  </td>
                </tr>

                {{-- ɒ / ɔ --}}
                <tr>
                  <td class="sil">ɒ<br>ɔ</td>
                  <td>ㅗ</td>
                  <td class="text-left">
                    Oxford&nbsp;
                    <span class="sil">/<span class="text-em">ɒ</span>ksfəd/</span>&nbsp;
                    <span class="text-em">옥</span>스퍼드<br>
                    Auckland&nbsp;
                    <span class="sil">/<span class="text-em">ɔ</span>ːklənd/</span>&nbsp;
                    <span class="text-em">오</span>클런드<br>
                    Montreal&nbsp;
                    <span class="sil">/m<span class="text-em">ɒ</span>ntrɪ<span class="text-em">ɔ</span>ːl/</span>&nbsp;
                    <span class="text-em">몬</span>트리<span class="text-em">올</span><br>
                  </td>
                </tr>

                {{-- əʊ --}}
                <tr>
                  <td class="sil">əʊ</td>
                  <td>ㅓ우</td>
                  <td class="text-left">
                    Oak&nbsp;
                    <span class="sil">/<span class="text-em">əʊ</span>k/</span>&nbsp;
                    <span class="text-em">어우</span>크<br>
                    Narrow&nbsp;
                    <span class="sil">/nær<span class="text-em">əʊ</span>/</span>&nbsp;
                    내<span class="text-em">러우</span><br>
                    미국발음에서<br>
                    Golden&nbsp;
                    <span class="sil">/ɡ<span class="text-em">əʊ</span>ldən/</span>&nbsp;
                    <span class="text-em">거울</span>던<br>
                    Chicago&nbsp;
                    <span class="sil">/ʃɪkɑːɡ<span class="text-em">əʊ</span>/</span>&nbsp;
                    쉬카<span class="text-em">거우</span><br>
                  </td>
                </tr>

                {{-- ʊ / u --}}
                <tr>
                  <td class="sil">ʊ<br>u</td>
                  <td>ㅜ</td>
                  <td class="text-left">
                    Oomph&nbsp;
                    <span class="sil">/<span class="text-em">ʊ</span>mf/</span>&nbsp;
                    <span class="text-em">움</span>프<br>
                    Yaourt&nbsp;
                    <span class="sil">/jɑː<span class="text-em">ʊ</span>ət/</span>&nbsp;
                    야<span class="text-em">우</span>어트<br>
                    Cook&nbsp;
                    <span class="sil">/k<span class="text-em">ʊ</span>k/</span>&nbsp;
                    <span class="text-em">쿠</span>크<br>
                    Liverpool&nbsp;
                    <span class="sil">/lɪvəp<span class="text-em">u</span>ːl/</span>&nbsp;
                    리버<span class="text-em">풀</span><br>
                    Missouri&nbsp;
                    <span class="sil">/mɪz<span class="text-em">ʊ</span>ri/</span>&nbsp;
                    미<span class="text-em">주</span>리<br>
                  </td>
                </tr>
              </table>
            </div>
          </div>

          {{-- 자음기호 --}}
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>(2)&nbsp;</span>자음기호
            </h4>

            {{-- <a href="#b" class="text-underline-link"><span class="sil">b</span></a>&nbsp;/&nbsp;
            <a href="#d" class="text-underline-link"><span class="sil">d</span></a>&nbsp;/&nbsp;
            <a href="#dz" class="text-underline-link"><span class="sil">ʣ</span></a>&nbsp;/&nbsp; --}}

            <div class="example">
              <table class="foreign-table">
                <tr>
                  <th><span class="sp-hide">기호</span></th>
                  <th><span class="sp-hide">조건</span></th>
                  <th><span class="sp-hide">우리 글자</span></th>
                  <th>례</th>
                </tr>

                {{-- b --}}
                <tr id="b">
                  <td class="sil" rowspan="2">b</td>
                  <td>모음앞</td>
                  <td>ㅂ-</td>
                  <td class="text-left">
                    Barbara&nbsp;
                    <span class="sil">/<span class="text-em">b</span>ɑː<span class="text-em">b</span>ərə/</span>&nbsp;
                    <span class="text-em">바버</span>러<br>
                    Derby&nbsp;
                    <span class="sil">/dɑː<span class="text-em">b</span>i/</span>&nbsp;
                    다<span class="text-em">비</span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>브</td>
                  <td class="text-left">
                    Roxburgh&nbsp;
                    <span class="sil">/rɒks<span class="text-em">b</span>rə/</span>&nbsp;
                    록스<span class="text-em">브</span>러<br>
                    Bab&nbsp;
                    <span class="sil">/bæ<span class="text-em">b</span>/</span>&nbsp;
                    배<span class="text-em">브</span><br>
                  </td>
                </tr>

                {{-- d --}}
                <tr id="d">
                  <td class="sil" rowspan="2">d</td>
                  <td>모음앞</td>
                  <td>ㄷ-</td>
                  <td class="text-left">
                    Dolly&nbsp;
                    <span class="sil">/<span class="text-em">d</span>ɒli/</span>&nbsp;
                    <span class="text-em">돌</span>리<br>
                    Dundee&nbsp;
                    <span class="sil">/<span class="text-em">d</span>ʌn<span class="text-em">d</span>iː/</span>&nbsp;
                    <span class="text-em">단디</span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>드</td>
                  <td class="text-left">
                    Hudson&nbsp;
                    <span class="sil">/hʌ<span class="text-em">d</span>sn/</span>&nbsp;
                    하<span class="text-em">드</span>슨<br>
                    Mildred&nbsp;
                    <span class="sil">/mɪl<span class="text-em">d</span>rə<span class="text-em">d</span>/</span>&nbsp;
                    밀<span class="text-em">드</span>러<span class="text-em">드</span><br>
                  </td>
                </tr>

                {{-- ʣ --}}
                <tr id="dz">
                  <td class="sil">ʣ</td>
                  <td>자음앞<br>단어끝</td>
                  <td>즈</td>
                  <td class="text-left">
                    Landsman&nbsp;
                    <span class="sil">/læn<span class="text-em">ʣ</span>mən/</span>&nbsp;
                    랜<span class="text-em">즈</span>먼<br>
                    Leeds&nbsp;
                    <span class="sil">/liː<span class="text-em">ʣ</span>/</span>&nbsp;
                    리<span class="text-em">즈</span><br>
                  </td>
                </tr>

                {{-- ʤ --}}
                <tr id="dzh">
                  <td class="sil" rowspan="2">ʤ</td>
                  <td>
                    <span class="text-sm">뒤의 모음과 함께</span><br>
                    <span class="sil">ʤa</span><br>
                    <span class="sil text-hide">ʤ</span><br>
                    <span class="sil">ʤɑː</span><br>
                    <span class="sil">ʤʌ</span><br>
                    <span class="sil">ʤæ</span><br>
                    <span class="sil">ʤə</span><br>
                    <span class="sil">ʤe</span><br>
                    <span class="sil">ʤi</span><br>
                    <span class="sil">ʤɒ</span><br>
                    <span class="sil text-hide">ʤ</span><br>
                    <span class="sil">ʤəʊ</span><br>
                    <span class="sil">ʤʊ</span><br>
                    <span class="sil text-hide">ʤ</span><br>
                    <span class="sil">ʤuː</span><br>
                  </td>
                  <td>
                    <span class="sil text-hide">ʤ</span><br>
                    <span class="text-kr">쟈</span><br>
                    <span class="sil text-hide">ʤ</span><br>
                    <span class="sil text-hide">ʤ</span><br>
                    <span class="sil text-hide">ʤ</span><br>
                    <span class="text-kr">좨</span><br>
                    <span class="text-kr">져</span><br>
                    <span class="text-kr">줴</span><br>
                    <span class="text-kr">쥐</span><br>
                    <span class="text-kr">죠</span><br>
                    <span class="sil text-hide">ʤ</span><br>
                    <span class="text-kr">져우</span><br>
                    <span class="text-kr">쥬</span><br>
                    <span class="sil text-hide">ʤ</span><br>
                    <span class="sil text-hide">ʤ</span><br>
                  </td>
                  <td class="text-left">
                    <span class="sil text-hide">ʤ</span><br>
                    Gyrose&nbsp;
                    <span class="sil">/<span class="text-em">ʤa</span>ɪrəʊs/</span>&nbsp;
                    <span class="text-em">쟈</span>이러우스<br>
                    Joust&nbsp;
                    <span class="sil">/<span class="text-em">ʤa</span>ʊst/</span>&nbsp;
                    <span class="text-em">쟈</span>우스트<br>
                    Jah&nbsp;
                    <span class="sil">/<span class="text-em">ʤɑ</span>ː/</span>&nbsp;
                    <span class="text-em">쟈</span><br>
                    Jungle&nbsp;
                    <span class="sil">/<span class="text-em">ʤʌ</span>ŋɡl/</span>&nbsp;
                    <span class="text-em">쟝</span>글<br>
                    Jackson&nbsp;
                    <span class="sil">/<span class="text-em">ʤæ</span>ksn/</span>&nbsp;
                    <span class="text-em">좩</span>슨<br>
                    Benjamin&nbsp;
                    <span class="sil">/ben<span class="text-em">ʤə</span>mɪn/</span>&nbsp;
                    벤<span class="text-em">져</span>민<br>
                    Jenny&nbsp;
                    <span class="sil">/<span class="text-em">ʤe</span>ni/</span>&nbsp;
                    <span class="text-em">줴</span>니<br>
                    Jesus&nbsp;
                    <span class="sil">/<span class="text-em">ʤi</span>ːzəs/</span>&nbsp;
                    <span class="text-em">쥐</span>저스<br>
                    Georgie&nbsp;
                    <span class="sil">/<span class="text-em">ʤɔ</span>ːʤi/</span>&nbsp;
                    <span class="text-em">죠</span>쥐<br>
                    John&nbsp;
                    <span class="sil">/<span class="text-em">ʤɒ</span>n/</span>&nbsp;
                    <span class="text-em">죤</span><br>
                    Joseph&nbsp;
                    <span class="sil">/<span class="text-em">ʤəʊ</span>zɪf/</span>&nbsp;
                    <span class="text-em">져우</span>지프<br>
                    Jurassic&nbsp;
                    <span class="sil">/<span class="text-em">ʤʊ</span>əræsɪk/</span>&nbsp;
                    <span class="text-em">쥬</span>어래씨크<br>
                    Jewry&nbsp;
                    <span class="sil">/<span class="text-em">ʤʊ</span>əri/</span>&nbsp;
                    <span class="text-em">쥬</span>어리<br>
                    Juno&nbsp;
                    <span class="sil">/<span class="text-em">ʤu</span>ːnəʊ/</span>&nbsp;
                    <span class="text-em">쥬</span>너우<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>그밖의 경우</td>
                  <td>쥐</td>
                  <td class="text-left">
                    Wedgwood&nbsp;
                    <span class="sil">/we<span class="text-em">ʤ</span>wʊd/</span>&nbsp;
                    웨<span class="text-em">쥐</span>우드<br>
                    Cambridge&nbsp;
                    <span class="sil">/keɪmbrɪ<span class="text-em">ʤ</span>/</span>&nbsp;
                    케임브리<span class="text-em">쥐</span><br>
                  </td>
                </tr>

                {{-- ð --}}
                <tr>
                  <td class="sil" rowspan="2">ð</td>
                  <td>모음앞</td>
                  <td>ㄷ-</td>
                  <td class="text-left">
                    Motherland&nbsp;
                    <span class="sil">/mʌ<span class="text-em">ð</span>əlænd/</span>&nbsp;
                    마<span class="text-em">덜</span>랜드<br>
                    Carmarthen&nbsp;
                    <span class="sil">/kəmɑː<span class="text-em">ð</span>ən/</span>&nbsp;
                    커마<span class="text-em">던</span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>드</td>
                  <td class="text-left">
                    Mouths&nbsp;
                    <span class="sil">/maʊ<span class="text-em">ð</span>z/</span>&nbsp;
                    마우<span class="text-em">드</span>즈<br>
                    With
                    &nbsp;<span class="sil">/wɪ<span class="text-em">ð</span>/</span>&nbsp;
                    위<span class="text-em">드</span><br>
                  </td>
                </tr>

                {{-- f --}}
                <tr>
                  <td class="sil" rowspan="2">f</td>
                  <td>
                    <span class="text-sm">뒤의 모음과 함께</span><br>
                    <span class="sil">fa(fɑː, fʌ)</span><br>
                    <span class="sil">fɪ</span><br>
                    <span class="sil">fæ</span><br>
                    <span class="sil">fə</span><br>
                    <span class="sil">fe</span><br>
                    <span class="sil">fɒ</span><br>
                    <span class="sil">fəʊ</span><br>
                    <span class="sil">fuː</span><br>
                  </td>
                  <td>
                    <span class="sil text-hide">f</span><br>
                    <span class="text-kr">화</span><br>
                    <span class="text-kr">휘</span><br>
                    <span class="text-kr">홰</span><br>
                    <span class="text-kr">훠</span><br>
                    <span class="text-kr">훼</span><br>
                    <span class="text-kr">훠</span><br>
                    <span class="text-kr">훠우</span><br>
                    <span class="text-kr">후</span><br>
                  </td>
                  <td class="text-left">
                    <span class="sil text-hide">f</span><br>
                    File&nbsp;
                    <span class="sil">/<span class="text-em">fa</span>ɪl/</span>&nbsp;
                    <span class="text-em">화</span>일<br>
                    Fish&nbsp;
                    <span class="sil">/<span class="text-em">fɪ</span>ʃ/</span>&nbsp;
                    <span class="text-em">휘</span>쉬<br>
                    Fan&nbsp;
                    <span class="sil">/<span class="text-em">fæ</span>n/</span>&nbsp;
                    <span class="text-em">홴</span><br>
                    Furniture&nbsp;
                    <span class="sil">/<span class="text-em">fə</span>nɪʧə/</span>&nbsp;
                    <span class="text-em">훠</span>니쳐<br>
                    Fence&nbsp;
                    <span class="sil">/<span class="text-em">fe</span>ns/</span>&nbsp;
                    <span class="text-em">휀</span>스<br>
                    Fond&nbsp;
                    <span class="sil">/<span class="text-em">fɒ</span>nd/</span>&nbsp;
                    <span class="text-em">훤</span>드<br>
                    Allophone&nbsp;
                    <span class="sil">/ælə<span class="text-em">fə</span>ʊn/</span>&nbsp;
                    앨러<span class="text-em">훠</span>운<br>
                    Fool&nbsp;
                    <span class="sil">/<span class="text-em">fu</span>ːl/</span>&nbsp;
                    <span class="text-em">훌</span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>흐, 프</td>
                  <td class="text-left">
                    Florida&nbsp;
                    <span class="sil">/<span class="text-em">f</span>lɒrɪdə/</span>&nbsp;
                    <span class="text-em">흘</span>로리더<br>
                    Left&nbsp;
                    <span class="sil">/le<span class="text-em">f</span>t/</span>&nbsp;
                    레<span class="text-em">프</span>트<br>
                    Bluff&nbsp;
                    <span class="sil">/blʌ<span class="text-em">f</span>/</span>&nbsp;
                    블라<span class="text-em">프</span><br>
                  </td>
                </tr>

                {{-- ɡ --}}
                <tr>
                  <td class="sil" rowspan="2">ɡ</td>
                  <td>모음앞</td>
                  <td>ㄱ-</td>
                  <td class="text-left">
                    Gulliver&nbsp;
                    <span class="sil">/<span class="text-em">ɡ</span>ʌlɪvə/</span>&nbsp;
                    <span class="text-em">갈</span>리버<br>
                    Maggie&nbsp;
                    <span class="sil">/mæ<span class="text-em">ɡ</span>i/</span>&nbsp;
                    매<span class="text-em">기</span><br>
                    Guanaco&nbsp;
                    <span class="sil">/<span class="text-em">ɡ</span>wənɑːkəʊ/</span>&nbsp;
                    <span class="text-em">궈</span>나커우<br>
                    Guinevere&nbsp;
                    <span class="sil">/<span class="text-em">ɡ</span>wɪnɪvɪə/</span>&nbsp;
                    <span class="text-em">귀</span>니비어<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>그</td>
                  <td class="text-left">
                    Gray&nbsp;
                    <span class="sil">/<span class="text-em">ɡ</span>rei/</span>&nbsp;
                    <span class="text-em">그</span>레이<br>
                    Magdalen&nbsp;
                    <span class="sil">/mæ<span class="text-em">ɡ</span>dəlɪn/</span>&nbsp;
                    매<span class="text-em">그</span>덜린<br>
                    Winnipeg&nbsp;
                    <span class="sil">/wɪnɪpe<span class="text-em">ɡ</span>/</span>&nbsp;
                    위니페<span class="text-em">그</span><br>
                  </td>
                </tr>

                {{-- h --}}
                <tr>
                  <td class="sil">h</td>
                  <td>모음앞</td>
                  <td>ㅎ-</td>
                  <td class="text-left">
                    Helena&nbsp;
                    <span class="sil">/<span class="text-em">h</span>elɪnə/</span>&nbsp;
                    <span class="text-em">헬</span>리너<br>
                    Ivanhoe&nbsp;
                    <span class="sil">/aɪvən<span class="text-em">h</span>əʊ/</span>&nbsp;
                    아이번<span class="text-em">허</span>우<br>
                  </td>
                </tr>

                {{-- hw --}}
                <tr>
                  <td class="sil">hw</td>
                  <td>
                    <span class="text-sm">미국발음에서</span><br>
                    <span class="text-sm">뒤의 모음과 함께</span><br>
                    <span class="sil">hwa</span><br>
                    <span class="sil">hwe</span><br>
                    <span class="sil">hwæ</span><br>
                    <span class="sil">hwɪ</span><br>
                    <span class="sil">hwɒ</span><br>
                  </td>
                  <td>
                    <span class="sil text-hide">hw</span><br>
                    <span class="sil text-hide">hw</span><br>
                    <span class="text-kr">화</span><br>
                    <span class="text-kr">훼</span><br>
                    <span class="text-kr">홰</span><br>
                    <span class="text-kr">휘</span><br>
                    <span class="text-kr">훠</span><br>
                  </td>
                  <td class="text-left">
                    <span class="sil text-hide">hw</span><br>
                    <span class="sil text-hide">hw</span><br>
                    white&nbsp;
                    <span class="sil">/<span class="text-em">hwa</span>ɪt/</span>&nbsp;
                    <span class="text-em">화</span>이트<br>
                    Whalan&nbsp;
                    <span class="sil">/<span class="text-em">hwe</span>ɪlən/</span>&nbsp;
                    <span class="text-em">훼</span>일런<br>
                    Whampoa&nbsp;
                    <span class="sil">/<span class="text-em">hwæ</span>mpəʊə/</span>&nbsp;
                    <span class="text-em">횀</span>퍼우어<br>
                    Whippany&nbsp;
                    <span class="sil">/<span class="text-em">hwɪ</span>pəni/</span>&nbsp;
                    <span class="text-em">휘</span>퍼니<br>
                    Wharton&nbsp;
                    <span class="sil">/<span class="text-em">hwɔ</span>ːtən/</span>&nbsp;
                    <span class="text-em">훠</span>턴<br>
                  </td>
                </tr>

                {{-- j --}}
                <tr>
                  <td class="sil" rowspan="2">j</td>
                  <td>
                    <span class="text-sm">
                      뒤의 <span class="sil text-narrow">ɑ, ʌ, ɪ, ɒ, u</span><br>
                      와 함께
                    </span><br>
                    <span class="sil">jɑ</span><br>
                    <span class="sil">jʌ</span><br>
                    <span class="sil">jɪ</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="sil">jəʊ</span><br>
                    <span class="sil">jɒ</span><br>
                    <span class="sil">juː</span><br>
                    <span class="sil text-hide">j</span><br>
                  </td>
                  <td>
                    <span class="sil text-hide">j</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="text-kr">ㅑ</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="text-kr">ㅣ</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="text-kr">ㅕ우</span><br>
                    <span class="text-kr">ㅛ</span><br>
                    <span class="text-kr">ㅠ</span><br>
                    <span class="sil text-hide">j</span><br>
                  </td>
                  <td class="text-left">
                    <span class="sil text-hide">j</span><br>
                    <span class="sil text-hide">j</span><br>
                    Yamouth&nbsp;
                    <span class="sil">/<span class="text-em">jɑ</span>ːməθ/</span>&nbsp;
                    <span class="text-em">야</span>머스<br>
                    Young&nbsp;
                    <span class="sil">/<span class="text-em">jʌ</span>ŋ/</span>&nbsp;
                    <span class="text-em">양</span><br>
                    Yiddish&nbsp;
                    <span class="sil">/<span class="text-em">jɪ</span>dɪʃ/</span>&nbsp;
                    <span class="text-em">이</span>디슈<br>
                    Year&nbsp;
                    <span class="sil">/<span class="text-em">jɪ</span>ə/</span>&nbsp;
                    <span class="text-em">이</span>어<br>
                    Yeoman&nbsp;
                    <span class="sil">/<span class="text-em">jəʊ</span>mən/</span>&nbsp;
                    <span class="text-em">여우</span>먼<br>
                    York&nbsp;
                    <span class="sil">/<span class="text-em">jɒ</span>k/</span>&nbsp;
                    <span class="text-em">요</span>크<br>
                    Yukon&nbsp;
                    <span class="sil">/<span class="text-em">ju</span>ːkɒn/</span>&nbsp;
                    <span class="text-em">유</span>콘<br>
                    Newcastle&nbsp;
                    <span class="sil">/n<span class="text-em">ju</span>ːkɑːsl/</span>&nbsp;
                    <span class="text-em">뉴</span>카슬<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>
                    <span class="text-sm">
                      뒤의 <span class="sil text-narrow">æ, ɛ, ə, e</span><br>
                      와 함께<br>
                      단어 첫머리와<br>
                      모음뒤
                    </span><br>
                    <span class="sil">jæ</span><br>
                    <span class="sil">jeə</span><br>
                    <span class="sil">jə</span><br>
                    <span class="sil">je</span><br>
                    <span class="text-sm">자음뒤</span><br>
                    <span class="sil">jeə</span><br>
                    <span class="sil">jə</span><br>
                    <span class="sil text-hide">j</span><br>
                  </td>
                  <td>
                    <span class="sil text-hide">j</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="text-kr">얘</span><br>
                    <span class="text-kr">예어</span><br>
                    <span class="text-kr">여</span><br>
                    <span class="text-kr">예</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="text-kr">ㅔ어</span><br>
                    <span class="text-kr">ㅣ어</span><br>
                    <span class="sil text-hide">j</span><br>
                  </td>
                  <td class="text-left">
                    <span class="sil text-hide">j</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="sil text-hide">j</span><br>
                    <span class="text-narrow">
                      Yacketyyak&nbsp;
                      <span class="sil">/<span class="text-em">jæ</span>kɪtɪjæk/</span>&nbsp;
                      <span class="text-em">얘</span>키티얘크
                    </span><br>
                    Yeah&nbsp;
                    <span class="sil">/<span class="text-em">je</span>ə/</span>&nbsp;
                    <span class="text-em">예</span>어<br>
                    Yahoo&nbsp;
                    <span class="sil">/<span class="text-em">jə</span>huː/</span>&nbsp;
                    <span class="text-em">여</span>후<br>
                    <span class="text-narrow">
                      Yellowstone&nbsp;
                      <span class="sil">/<span class="text-em">je</span>ləʊstəʊn/</span>&nbsp;
                      <span class="text-em">옐</span>러우스터운
                    </span><br>
                    <span class="sil text-hide">j</span><br>
                    Cordillera&nbsp;
                    <span class="sil">/kɔːdɪl<span class="text-em">jeə</span>rə/</span>&nbsp;
                    코딜<span class="text-em">레어</span>러<br>
                    Virginia&nbsp;
                    <span class="sil">/vɜːʤɪn<span class="text-em">jə</span>/</span>&nbsp;
                    버쥐<span class="text-em">니어</span><br>
                    Georgian&nbsp;
                    <span class="sil">/ʤɔːʤ<span class="text-em">jə</span>n/</span>&nbsp;
                    죠<span class="text-em">쥐언</span><br>
                  </td>
                </tr>

                {{-- k --}}
                <tr>
                  <td class="sil" rowspan="2">k</td>
                  <td>모음과 w앞</td>
                  <td>ㅋ-</td>
                  <td class="text-left">
                    Catherine&nbsp;
                    <span class="sil">/<span class="text-em">k</span>æθərɪn/</span>&nbsp;
                    <span class="text-em">캐</span>써린<br>
                    Kentucky&nbsp;
                    <span class="sil">/<span class="text-em">k</span>entʌ<span class="text-em">k</span>i/</span>&nbsp;
                    <span class="text-em">켄</span>타<span class="text-em">키</span><br>
                    Quiet&nbsp;
                    <span class="sil">/<span class="text-em">k</span>waɪət/</span>&nbsp;
                    <span class="text-em">콰</span>이어트<br>
                    Quebec&nbsp;
                    <span class="sil">/<span class="text-em">k</span>wɪbek/</span>&nbsp;
                    <span class="text-em">퀴</span>베크<br>
                    Quahaug&nbsp;
                    <span class="sil">/<span class="text-em">k</span>wɔːhɒɡ/</span>&nbsp;
                    <span class="text-em">쿼</span>호그<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>
                    <span class="text-sm">
                      모음과<br>
                      청없는 소리기호사이
                    </span>
                  </td>
                  <td>-ㄱ</td>
                  <td class="text-left">
                    Taxas&nbsp;
                    <span class="sil">/te<span class="text-em">k</span>səs/</span>&nbsp;
                    <span class="text-em">텍</span>써스<br>
                    Benedict&nbsp;
                    <span class="sil">/benɪdɪ<span class="text-em">k</span>t/</span>&nbsp;
                    베니<span class="text-em">딕</span>트<br>
                  </td>
                </tr>

                {{-- l --}}
                <tr>
                  <td class="sil" rowspan="4">l</td>
                  <td>
                    <span class="text-sm">
                      단어 첫머리
                    </span><br>
                    <br>
                    <span class="text-sm">
                      <span class="sil">m, n, ŋ</span>과 모음사이
                    </span>
                  </td>
                  <td>ㄹ-</td>
                  <td class="text-left">
                    Labour&nbsp;
                    <span class="sil">/<span class="text-em">l</span>eɪbə/</span>&nbsp;
                    <span class="text-em">레</span>이버<br>
                    Labrador&nbsp;
                    <span class="sil">/<span class="text-em">l</span>æbrədɔː/</span>&nbsp;
                    <span class="text-em">래</span>브러도<br>
                    Hamlet&nbsp;
                    <span class="sil">/hæm<span class="text-em">l</span>ɪt/</span>&nbsp;
                    햄<span class="text-em">리</span>트<br>
                    Sunlight&nbsp;
                    <span class="sil">/sʌn<span class="text-em">l</span>aɪt/</span>&nbsp;
                    싼<span class="text-em">라</span>이트<br>
                    Longlived&nbsp;
                    <span class="sil">/lɒŋ<span class="text-em">l</span>ɪvd/</span>&nbsp;
                    롱<span class="text-em">리</span>브드<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>
                    <span class="text-sm">
                      두 모음기호사이,<br>
                      자음(<span class="sil">m, n, ŋ</span>제외)과<br>
                      모음사이
                    </span>
                  </td>
                  <td>-ㄹㄹ-</td>
                  <td class="text-left">
                    Columbia&nbsp;
                    <span class="sil">/kə<span class="text-em">l</span>ʌmbɪə/</span>&nbsp;
                    <span class="text-em">컬람</span>비어<br>
                    Oliver&nbsp;
                    <span class="sil">/ɒ<span class="text-em">l</span>ɪvə/</span>&nbsp;
                    <span class="text-em">올리</span>버<br>
                    Florida&nbsp;
                    <span class="sil">/f<span class="text-em">l</span>ɒrɪdə/</span>&nbsp;
                    <span class="text-em">흘로</span>리더<br>
                    Cleveland&nbsp;
                    <span class="sil">/k<span class="text-em">l</span>iːv<span class="text-em">l</span>ənd/</span>&nbsp;
                    <span class="text-em">클리블런</span>드<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>
                    <span class="text-sm">
                      단어끝의 <span class="sil">m, n</span>앞
                    </span>
                  </td>
                  <td>-ㄹ르</td>
                  <td class="text-left">
                    Whelm&nbsp;
                    <span class="sil">/we<span class="text-em">l</span>m/</span>&nbsp;
                    <span class="text-em">웰름</span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>그밖의 경우</td>
                  <td>-ㄹ</td>
                  <td class="text-left">
                    Gerald&nbsp;
                    <span class="sil">/ʤerə<span class="text-em">l</span>d/</span>&nbsp;
                    줴<span class="text-em">럴</span>드<br>
                    Bristol&nbsp;
                    <span class="sil">/brɪst<span class="text-em">l</span>/</span>&nbsp;
                    브리스<span class="text-em">틀</span><br>
                    Bell&nbsp;
                    <span class="sil">/be<span class="text-em">l</span>/</span>&nbsp;
                    <span class="text-em">벨</span><br>
                  </td>
                </tr>

                {{-- m --}}
                <tr>
                  <td class="sil" rowspan="2">m</td>
                  <td>모음앞</td>
                  <td>ㅁ-</td>
                  <td class="text-left">
                    Miami&nbsp;
                    <span class="sil">/<span class="text-em">m</span>aɪæ<span class="text-em">m</span>i/</span>&nbsp;
                    <span class="text-em">마</span>이애<span class="text-em">미</span><br>
                    Monmouth&nbsp;
                    <span class="sil">/<span class="text-em">m</span>ɒn<span class="text-em">m</span>əθ/</span>&nbsp;
                    <span class="text-em">몬머</span>스<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>-ㅁ</td>
                  <td class="text-left">
                    Ambrose&nbsp;
                    <span class="sil">/æ<span class="text-em">m</span>brəʊz/</span>&nbsp;
                    <span class="text-em">앰</span>브러우즈<br>
                    Ohmmeter&nbsp;
                    <span class="sil">/əʊ<span class="text-em">m</span>miːtə/</span>&nbsp;
                    어<span class="text-em">움</span>미터<br>
                    Durham&nbsp;
                    <span class="sil">/dʌrə<span class="text-em">m</span>/</span>&nbsp;
                    다<span class="text-em">럼</span><br>
                  </td>
                </tr>

                {{-- n --}}
                <tr>
                  <td class="sil" rowspan="3">n</td>
                  <td>모음앞</td>
                  <td>ㄴ-</td>
                  <td class="text-left">
                    Nanny&nbsp;
                    <span class="sil">/<span class="text-em">n</span>æ<span class="text-em">n</span>i/</span>&nbsp;
                    <span class="text-em">내니</span><br>
                    Nevada&nbsp;
                    <span class="sil">/<span class="text-em">n</span>ɪvɑːdə/</span>&nbsp;
                    <span class="text-em">니</span>바더<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>단어끝의 l앞</td>
                  <td>느</td>
                  <td class="text-left">
                    National&nbsp;<span class="sil">/næʃə<span class="text-em">n</span>l/</span>&nbsp;
                    내셔<span class="text-em">늘</span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>그밖의 경우</td>
                  <td>-ㄴ</td>
                  <td class="text-left">
                    Robinson&nbsp;
                    <span class="sil">/rɒbɪ<span class="text-em">n</span>s<span class="text-em">n</span>/</span>&nbsp;
                    로<span class="text-em">빈슨</span><br>
                    Oneness&nbsp;
                    <span class="sil">/wʌ<span class="text-em">n</span>nɪs/</span>&nbsp;
                    <span class="text-em">완</span>니스<br>
                    Britain&nbsp;
                    <span class="sil">/brɪtə<span class="text-em">n</span>/</span>&nbsp;
                    브리<span class="text-em">턴</span><br>
                  </td>
                </tr>

                {{-- ŋ --}}
                <tr>
                  <td class="sil">ŋ</td>
                  <td></td>
                  <td>-ㅇ</td>
                  <td class="text-left">
                    England&nbsp;
                    <span class="sil">/ɪ<span class="text-em">ŋ</span>glənd/</span>&nbsp;
                    <span class="text-em">잉</span>글런드<br>
                    Lincoln&nbsp;
                    <span class="sil">/lɪ<span class="text-em">ŋ</span>kən/</span>&nbsp;
                    <span class="text-em">링</span>컨<br>
                    Singer&nbsp;
                    <span class="sil">/sɪ<span class="text-em">ŋ</span>ə/</span>&nbsp;
                    <span class="text-em">씽</span>어<br>
                    Long&nbsp;
                    <span class="sil">/lɒ<span class="text-em">ŋ</span>/</span>&nbsp;
                    <span class="text-em">롱</span><br>
                  </td>
                </tr>

                {{-- p --}}
                <tr>
                  <td class="sil" rowspan="3">p</td>
                  <td>모음앞</td>
                  <td>ㅍ-</td>
                  <td class="text-left">
                    Penelope&nbsp;
                    <span class="sil">/<span class="text-em">p</span>ɪnelə<span class="text-em">p</span>i/</span>&nbsp;
                    <span class="text-em">피</span>넬러<span class="text-em">피</span><br>
                    Portland&nbsp;
                    <span class="sil">/<span class="text-em">p</span>ɔːtlənd/</span>&nbsp;
                    <span class="text-em">포</span>틀런드<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>
                    <span class="text-sm">
                      모음과<br>청없는 소리기호사이
                    </span>
                  </td>
                  <td>-ㅂ</td>
                  <td class="text-left">
                    Cyclops&nbsp;
                    <span class="sil">/saɪklɒ<span class="text-em">p</span>s/</span>&nbsp;
                    싸이클<span class="text-em">롭</span>스<br>
                    Kapton&nbsp;
                    <span class="sil">/kæ<span class="text-em">p</span>tən/</span>&nbsp;
                    <span class="text-em">캡</span>턴<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>그밖의 경우</td>
                  <td>프</td>
                  <td class="text-left">
                    <span class="text-narrow">
                      Northampton&nbsp;
                      <span class="sil">/nɔːθæm<span class="text-em">p</span>tən/</span>&nbsp;
                      노쌤<span class="text-em">프</span>턴
                    </span><br>
                    Philip&nbsp;
                    <span class="sil">/fɪlɪ<span class="text-em">p</span>/</span>&nbsp;
                    필리<span class="text-em">프</span><br>
                  </td>
                </tr>

                {{-- r --}}
                <tr>
                  <td class="sil">r</td>
                  <td>모음앞</td>
                  <td>ㄹ-</td>
                  <td class="text-left">
                    Rosemary&nbsp;
                    <span class="sil">/<span class="text-em">r</span>əʊzmə<span class="text-em">r</span>i/</span>&nbsp;
                    <span class="text-em">러</span>우즈머<span class="text-em">리</span><br>
                    Frederick&nbsp;
                    <span class="sil">/f<span class="text-em">r</span>ed<span class="text-em">r</span>ɪk/</span>&nbsp;
                    흐<span class="text-em">레</span>드<span class="text-em">리</span>크<br>
                  </td>
                </tr>

                {{-- s --}}
                <tr>
                  <td class="sil" rowspan="2">s</td>
                  <td>모음앞</td>
                  <td>ㅆ-</td>
                  <td class="text-left">
                    Saxony&nbsp;
                    <span class="sil">/<span class="text-em">s</span>æk<span class="text-em">s</span>əni/</span>&nbsp;
                    <span class="text-em">쌕써</span>니<br>
                    Circe&nbsp;
                    <span class="sil">/<span class="text-em">s</span>ɜː<span class="text-em">s</span>i/</span>&nbsp;
                    <span class="text-em">써씨</span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>그밖의 경우</td>
                  <td>스</td>
                  <td class="text-left">
                    Scotland&nbsp;
                    <span class="sil">/<span class="text-em">s</span>kɒtlənd/</span>&nbsp;
                    <span class="text-em">스</span>코틀런드<br>
                    Obeisance&nbsp;
                    <span class="sil">/əʊbeɪ<span class="text-em">s</span>n<span class="text-em">s</span>/</span>&nbsp;
                    어우베이<span class="text-em">슨스</span><br>
                    Ross&nbsp;
                    <span class="sil">/rɒ<span class="text-em">s</span>/</span>&nbsp;
                    로<span class="text-em">스</span><br>
                  </td>
                </tr>

                {{-- θ --}}
                <tr>
                  <td class="sil" rowspan="2">θ</td>
                  <td>모음앞</td>
                  <td>ㅆ-</td>
                  <td class="text-left">
                    Carthage&nbsp;
                    <span class="sil">/kɑː<span class="text-em">θ</span>ɪʤ/</span>&nbsp;
                    카<span class="text-em">씨</span>쥐<br>
                    <span class="text-narrow">
                      Southampton&nbsp;
                      <span class="sil">/sau<span class="text-em">θ</span>æmptən/</span>&nbsp;
                      싸우<span class="text-em">쌤</span>프턴
                    </span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>스</td>
                  <td class="text-left">
                    Kathleen&nbsp;
                    <span class="sil">/kæ<span class="text-em">θ</span>lɪn/</span>&nbsp;
                    캐<span class="text-em">슬</span>린<br>
                    Forth&nbsp;
                    <span class="sil">/fɔː<span class="text-em">θ</span>/</span>&nbsp;
                    훠<span class="text-em">스</span><br>
                  </td>
                </tr>

                {{-- ʃ --}}
                <tr>
                  <td class="sil" rowspan="3">ʃ</td>
                  <td>
                    <span class="text-sm">뒤의 모음과 함께</span><br>
                    <span class="sil">ʃa</span><br>
                    <span class="sil">ʃɑː</span><br>
                    <span class="sil">ʃʌ</span><br>
                    <span class="sil">ʃæ</span><br>
                    <span class="sil">ʃə</span><br>
                    <span class="sil">ʃe</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                    <span class="sil">ʃɪ</span><br>
                    <span class="sil">ʃəʊ</span><br>
                    <span class="sil">ʃɒ</span><br>
                    <span class="sil">ʃʊ(ʃuː)</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                  </td>
                  <td>
                    <span class="sil text-hide">ʃ</span><br>
                    <span class="text-kr">샤</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                    <span class="sil text-hide">쇄</span><br>
                    <span class="sil text-hide">셔</span><br>
                    <span class="sil text-hide">쉐</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                    <span class="text-kr">쉬</span><br>
                    <span class="text-kr">셔우</span><br>
                    <span class="text-kr">쇼</span><br>
                    <span class="text-kr">슈</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                    <span class="sil text-hide">ʃ</span><br>
                  </td>
                  <td class="text-left">
                    <span class="sil text-hide">ʃ</span><br>
                    Shylock&nbsp;
                    <span class="sil">/<span class="text-em">ʃa</span>ɪlɒk/</span>&nbsp;
                    <span class="text-em">샤</span>일로크<br>
                    Charlotte&nbsp;
                    <span class="sil">/<span class="text-em">ʃɑ</span>ːlət/</span>&nbsp;
                    <span class="text-em">샬</span>러트<br>
                    Shovel&nbsp;
                    <span class="sil">/<span class="text-em">ʃʌ</span>vl/</span>&nbsp;
                    <span class="text-em">샤</span>블<br>
                    Chambray&nbsp;
                    <span class="sil">/<span class="text-em">ʃe</span>mbrei/</span>&nbsp;
                    <span class="text-em">쇔</span>브레이<br>
                    Cheshire&nbsp;
                    <span class="sil">/ʧe<span class="text-em">ʃə</span>/</span>&nbsp;
                    체<span class="text-em">셔</span><br>
                    Sheffield&nbsp;
                    <span class="sil">/<span class="text-em">ʃe</span>fiːld/</span>&nbsp;
                    <span class="text-em">쉐</span>필드<br>
                    Shavian&nbsp;
                    <span class="sil">/<span class="text-em">ʃe</span>ɪvɪən/</span>&nbsp;
                    <span class="text-em">쉐</span>이비언<br>
                    Share&nbsp;
                    <span class="sil">/<span class="text-em">ʃe</span>ə/</span>&nbsp;
                    <span class="text-em">쉐</span>어<br>
                    Michigan&nbsp;
                    <span class="sil">/mɪ<span class="text-em">ʃɪ</span>ɡən/</span>&nbsp;
                    미<span class="text-em">쉬</span>건<br>
                    Shoal&nbsp;
                    <span class="sil">/<span class="text-em">ʃəʊ</span>l/</span>&nbsp;
                    <span class="text-em">셔울</span><br>
                    Aldershot&nbsp;
                    <span class="sil">/ɔːld<span class="text-em">ʃɒ</span>t/</span>&nbsp;
                    올더<span class="text-em">쇼</span>트<br>
                    Should&nbsp;
                    <span class="sil">/<span class="text-em">ʃʊ</span>d/</span>&nbsp;
                    <span class="text-em">슈</span>드<br>
                    Shoes&nbsp;
                    <span class="sil">/<span class="text-em">ʃu</span>ːz/</span>&nbsp;
                    <span class="text-em">슈</span>즈<br>
                    Sure&nbsp;
                    <span class="sil">/<span class="text-em">ʃʊ</span>ə/</span>&nbsp;
                    <span class="text-em">슈</span>어<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>
                    <span class="text-sm">
                      모음앞에서 뒤의<br>
                      <span class="sil">j</span>와 함께 <span class="sil">ʃj</span>
                    </span>
                  </td>
                  <td><span class="text-sm text-narrow">(겹모음)</span></td>
                  <td class="text-left">
                    Oceanography&nbsp;
                    <span class="sil">/əʊ<span class="text-em">ʃj</span>ənɒɡrefi/</span>&nbsp;<br>
                    어우<span class="text-em">셔</span>노그러피<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>그밖의 경우</td>
                  <td>
                    슈<br>
                    <span class="sil text-hide">ʃ</span><br>
                    쉬
                  </td>
                  <td class="text-left">
                    Shrewsbury&nbsp;
                    <span class="sil">/<span class="text-em">ʃ</span>ruːzbəri/</span>&nbsp;
                    <span class="text-em">슈</span>루즈버리<br>
                    Joshua&nbsp;
                    <span class="sil">/ʤɒ<span class="text-em">ʃ</span>wə/</span>&nbsp;
                    죠<span class="text-em">슈</span>워<br>
                    English&nbsp;
                    <span class="sil">/ɪŋɡlɪ<span class="text-em">ʃ</span>/</span>&nbsp;
                    잉글리<span class="text-em">쉬</span><br>
                  </td>
                </tr>

                {{-- t --}}
                <tr>
                  <td class="sil" rowspan="2">t</td>
                  <td>모음앞</td>
                  <td>ㅌ-</td>
                  <td class="text-left">
                    Boston&nbsp;
                    <span class="sil">/bɒs<span class="text-em">t</span>ən/</span>&nbsp;
                    보스<span class="text-em">턴</span><br>
                    Toronto&nbsp;
                    <span class="sil">/<span class="text-em">t</span>ərɒn<span class="text-em">t</span>əʊ/</span>&nbsp;
                    <span class="text-em">터</span>론<span class="text-em">터</span>우<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>트</td>
                  <td class="text-left">
                    Stratford&nbsp;
                    <span class="sil">/s<span class="text-em">t</span>ræ<span class="text-em">t</span>fəd/</span>&nbsp;
                    스<span class="text-em">트</span>래<span class="text-em">트</span>퍼드<br>
                    Twickenham&nbsp;
                    <span class="sil">/<span class="text-em">t</span>wɪkənəm/</span>&nbsp;
                    <span class="text-em">트</span>위커넘<br>
                    Gilbert&nbsp;
                    <span class="sil">/ɡɪlbə<span class="text-em">t</span>/</span>&nbsp;
                    길버<span class="text-em">트</span><br>
                  </td>
                </tr>

                {{-- ʦ --}}
                <tr>
                  <td class="sil" rowspan="2">ʦ</td>
                  <td>
                    <span class="text-sm">한 소리마디안의</span><br>모음앞</td>
                  <td>ㅉ-</td>
                  <td class="text-left">
                    Quartzite&nbsp;
                    <span class="sil">/kwɔː<span class="text-em">ʦ</span>aɪt/</span>&nbsp;
                    쿼<span class="text-em">짜</span>이트<br>
                    Betsy&nbsp;
                    <span class="sil">/be<span class="text-em">ʦ</span>i/</span>&nbsp;
                    베<span class="text-em">찌</span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>츠</td>
                  <td class="text-left">
                    Pittsburgh&nbsp;
                    <span class="sil">/pɪ<span class="text-em">ʦ</span>bɜːɡ/</span>&nbsp;
                    피<span class="text-em">츠</span>버그<br>
                    Hights&nbsp;
                    <span class="sil">/haɪ<span class="text-em">ʦ</span></span>&nbsp;
                    하이<span class="text-em">츠</span><br>
                  </td>
                </tr>

                {{-- ʧ --}}
                <tr>
                  <td class="sil" rowspan="2">ʧ</td>
                  <td>
                    <span class="text-sm">뒤의 모음과 함께</span><br>
                    <span class="sil">ʧa</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="sil">ʧɑː</span><br>
                    <span class="sil">ʧʌ</span><br>
                    <span class="sil">ʧæ</span><br>
                    <span class="sil">ʧə(ʧɜː)</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="sil">ʧe</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="sil">ʧɪ</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="sil">ʧəʊ</span><br>
                    <span class="sil">ʧɒ(ʧɔː)</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="sil">ʧʊ(ʧuː)</span><br>
                  </td>
                  <td>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="text-kr">챠</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="text-kr">쵀</span><br>
                    <span class="text-kr">쳐</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="text-kr">췌</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="text-kr">취</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="text-kr">쳐우</span><br>
                    <span class="text-kr">쵸</span><br>
                    <span class="sil text-hide">ʧ</span><br>
                    <span class="text-kr">츄</span><br>
                  </td>
                  <td class="text-left">
                    <span class="sil text-hide">ʧ</span><br>
                    Child&nbsp;
                    <span class="sil">/<span class="text-em">ʧa</span>ɪld/</span>&nbsp;
                    <span class="text-em">챠</span>일드<br>
                    Chouse&nbsp;
                    <span class="sil">/<span class="text-em">ʧa</span>ʊs/</span>&nbsp;
                    <span class="text-em">챠</span>우스<br>
                    Charles&nbsp;
                    <span class="sil">/<span class="text-em">ʧɑ</span>ːlz/</span>&nbsp;
                    <span class="text-em">챨</span>즈<br>
                    Chough&nbsp;
                    <span class="sil">/<span class="text-em">ʧʌ</span>f/</span>&nbsp;
                    <span class="text-em">챠</span>프<br>
                    Chatham&nbsp;
                    <span class="sil">/<span class="text-em">ʧæ</span>təm/</span>&nbsp;
                    <span class="text-em">쵀</span>텀<br>
                    Rachel&nbsp;
                    <span class="sil">/reɪ<span class="text-em">ʧə</span>l/</span>&nbsp;
                    레이<span class="text-em">쳘</span><br>
                    Churchil&nbsp;
                    <span class="sil">/<span class="text-em">ʧɜ</span>ːʧɪl/</span>&nbsp;
                    <span class="text-em">쳐</span>칠<br>
                    Chester&nbsp;
                    <span class="sil">/<span class="text-em">ʧe</span>stə/</span>&nbsp;
                    <span class="text-em">췌</span>스터<br>
                    <span class="text-narrow">
                      Chamberlain&nbsp;
                      <span class="sil">/<span class="text-em">ʧe</span>ɪmbəlɪn/</span>&nbsp;
                      <span class="text-em">췌</span>임벌린
                    </span><br>
                    Chary&nbsp;
                    <span class="sil">/<span class="text-em">ʧe</span>əri/</span>&nbsp;
                    <span class="text-em">췌</span>어리<br>
                    Manchester&nbsp;
                    <span class="sil">/mæn<span class="text-em">ʧɪ</span>stə/</span>&nbsp;
                    맨<span class="text-em">취</span>스터<br>
                    Cheero&nbsp;
                    <span class="sil">/<span class="text-em">ʧɪ</span>ərəʊ/</span>&nbsp;
                    <span class="text-em">취</span>어러우<br>
                    Chopine&nbsp;
                    <span class="sil">/<span class="text-em">ʧəʊ</span>piːn/</span>&nbsp;
                    <span class="text-em">쳐우</span>핀<br>
                    Choctaw&nbsp;
                    <span class="sil">/<span class="text-em">ʧɒ</span>ktɔː/</span>&nbsp;
                    <span class="text-em">쵹</span>토<br>
                    Chaucer&nbsp;
                    <span class="sil">/<span class="text-em">ʧɔ</span>ːsə/</span>&nbsp;
                    <span class="text-em">쵸</span>써<br>
                    <span class="text-narrow">
                      Massachusetts&nbsp;
                      <span class="sil">/mæsə<span class="text-em">ʧu</span>ːseʦ/</span>&nbsp;
                      매써<span class="text-em">츄</span>쎄츠
                    </span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>그밖의 경우</td>
                  <td>취</td>
                  <td class="text-left">
                    Richmond&nbsp;
                    <span class="sil">/rɪ<span class="text-em">ʧ</span>mənd/</span>&nbsp;
                    리<span class="text-em">취</span>먼드<br>
                    Norwich&nbsp;
                    <span class="sil">/nɔːwɪ<span class="text-em">ʧ</span>/</span>&nbsp;
                    노위<span class="text-em">취</span><br>
                  </td>
                </tr>

                {{-- v --}}
                <tr>
                  <td class="sil" rowspan="2">v</td>
                  <td>모음앞</td>
                  <td>ㅂ-</td>
                  <td class="text-left">
                    Vancouver&nbsp;
                    <span class="sil">/<span class="text-em">v</span>ænkuː<span class="text-em">v</span>ə/</span>&nbsp;
                    <span class="text-em">밴</span>쿠<span class="text-em">버</span><br>
                    David&nbsp;
                    <span class="sil">/deɪ<span class="text-em">v</span>ɪd/</span>&nbsp;
                    데이<span class="text-em">비</span>드<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>브</td>
                  <td class="text-left">
                    Devonshire&nbsp;
                    <span class="sil">/de<span class="text-em">v</span>nʃɪə/</span>&nbsp;
                    데<span class="text-em">븐</span>쉬어<br>
                    Dave&nbsp;
                    <span class="sil">/deɪ<span class="text-em">v</span></span>&nbsp;
                    데이<span class="text-em">브</span><br>
                  </td>
                </tr>

                {{-- w --}}
                <tr>
                  <td class="sil">w</td>
                  <td>
                    <span class="text-sm">뒤의 모음과 함께</span><br>
                    <span class="sil">wa</span><br>
                    <span class="sil">wɑː</span><br>
                    <span class="sil">wʌ</span><br>
                    <span class="sil">wæ</span><br>
                    <span class="sil">wə(wɜː)</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="sil">we</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="sil">weə</span><br>
                    <span class="sil">wɪ(wiː)</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="sil">wəʊ</span><br>
                    <span class="sil">wɔː</span><br>
                    <span class="sil">wʊ(wuː)</span><br>
                    <span class="sil text-hide">w</span><br>
                  </td>
                  <td>
                    <span class="sil text-hide">w</span><br>
                    <span class="text-kr">와</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="text-kr">왜</span><br>
                    <span class="text-kr">워</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="text-kr">웨</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="text-kr">웨어</span><br>
                    <span class="text-kr">위</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="sil text-hide">w</span><br>
                    <span class="text-kr">워우</span><br>
                    <span class="text-kr">워</span><br>
                    <span class="text-kr">우</span><br>
                    <span class="sil text-hide">w</span><br>
                  </td>
                  <td class="text-left">
                    <span class="sil text-hide">w</span><br>
                    White&nbsp;
                    <span class="sil">/<span class="text-em">wa</span>ɪt/</span>&nbsp;
                    <span class="text-em">와</span>이트<br>
                    Chippewa&nbsp;
                    <span class="sil">/ʧɪpɪ<span class="text-em">wɑ</span>ː/</span>&nbsp;
                    치피<span class="text-em">와</span><br>
                    Worry&nbsp;
                    <span class="sil">/<span class="text-em">wʌ</span>ri/</span>&nbsp;
                    <span class="text-em">와</span>리<br>
                    Wacke&nbsp;
                    <span class="sil">/<span class="text-em">wæ</span>kə/</span>&nbsp;
                    <span class="text-em">왜</span>커<br>
                    Edward&nbsp;
                    <span class="sil">/ed<span class="text-em">wə</span>d/</span>&nbsp;
                    에드<span class="text-em">워</span>드<br>
                    Whertle&nbsp;
                    <span class="sil">/<span class="text-em">wɜ</span>ːtl/</span>&nbsp;
                    <span class="text-em">워</span>틀<br>
                    Wells&nbsp;
                    <span class="sil">/<span class="text-em">we</span>lz/</span>&nbsp;
                    <span class="text-em">웰</span>즈<br>
                    Midway&nbsp;
                    <span class="sil">/mɪd<span class="text-em">we</span>i/</span>&nbsp;
                    미드<span class="text-em">웨</span>이<br>
                    Delaware&nbsp;
                    <span class="sil">/delə<span class="text-em">weə</span>/</span>&nbsp;
                    델러<span class="text-em">웨어</span><br>
                    Darwin&nbsp;
                    <span class="sil">/dɑː<span class="text-em">wɪ</span>n/</span>&nbsp;
                    다<span class="text-em">윈</span><br>
                    Weald&nbsp;
                    <span class="sil">/<span class="text-em">wi</span>ːld/</span>&nbsp;
                    <span class="text-em">윌</span>드<br>
                    Sweet&nbsp;
                    <span class="sil">/s<span class="text-em">wi</span>ːt/</span>&nbsp;
                    스<span class="text-em">위</span>트<br>
                    Wear&nbsp;
                    <span class="sil">/<span class="text-em">wɪ</span>ə/</span>&nbsp;
                    <span class="text-em">위</span>어<br>
                    Woden&nbsp;
                    <span class="sil">/<span class="text-em">wəʊ</span>dn/</span>&nbsp;
                    <span class="text-em">워우</span>든<br>
                    Walter&nbsp;
                    <span class="sil">/<span class="text-em">wɔ</span>ːltə/</span>&nbsp;
                    <span class="text-em">월</span>터<br>
                    Worcester&nbsp;
                    <span class="sil">/<span class="text-em">wʊ</span>stə/</span>&nbsp;
                    <span class="text-em">우</span>스터<br>
                    Woopee&nbsp;
                    <span class="sil">/<span class="text-em">wu</span>ːpiː/</span>&nbsp;
                    <span class="text-em">우</span>피<br>
                  </td>
                </tr>

                {{-- z --}}
                <tr>
                  <td class="sil" rowspan="2">z</td>
                  <td>모음앞</td>
                  <td>ㅈ-</td>
                  <td class="text-left">
                    Zuyder&nbsp;
                    <span class="sil">/<span class="text-em">z</span>aɪdə/</span>&nbsp;
                    <span class="text-em">자</span>이더<br>
                    Mackenzie&nbsp;
                    <span class="sil">/məken<span class="text-em">z</span>i/</span>&nbsp;
                    머켄<span class="text-em">지</span><br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>자음앞<br>단어끝</td>
                  <td>즈</td>
                  <td class="text-left">
                    Brisbane&nbsp;
                    <span class="sil">/brɪ<span class="text-em">z</span>bən/</span>&nbsp;
                    브리<span class="text-em">즈</span>번<br>
                    Thames&nbsp;
                    <span class="sil">/tem<span class="text-em">z</span></span>&nbsp;
                    템<span class="text-em">즈</span><br>
                  </td>
                </tr>

                {{-- ʒ --}}
                <tr>
                  <td class="sil" rowspan="2">ʒ</td>
                  <td>
                    <span class="text-sm">뒤의 모음과 함께</span><br>
                    <span class="sil">ʒɑː</span><br>
                    <span class="sil">ʒə</span><br>
                    <span class="sil">ʒʊ</span><br>
                  </td>
                  <td>
                    <span class="sil text-hide">ʒ</span><br>
                    <span class="text-kr">좌</span><br>
                    <span class="text-kr">줘</span><br>
                    <span class="text-kr">쥬</span><br>
                  </td>
                  <td class="text-left">
                    <span class="sil text-hide">ʒ</span><br>
                    Gendarme&nbsp;
                    <span class="sil">/<span class="text-em">ʒɑ</span>ːndɑːm/</span>&nbsp;
                    <span class="text-em">좐</span>담<br>
                    Measure&nbsp;
                    <span class="sil">/me<span class="text-em">ʒə</span>/</span>&nbsp;
                    메<span class="text-em">줘</span><br>
                    Usual&nbsp;
                    <span class="sil">/juː<span class="text-em">ʒʊ</span>əl/</span>&nbsp;
                    유<span class="text-em">쥬</span>얼<br>
                  </td>
                </tr>
                <tr>
                  {{-- <td class="sil"></td> --}}
                  <td>그밖의 경우</td>
                  <td>쥐</td>
                  <td class="text-left">
                    Garage&nbsp;
                    <span class="sil">/ɡærɑː<span class="text-em">ʒ</span>/</span>&nbsp;
                    개라<span class="text-em">쥐</span><br>
                  </td>
                </tr>

              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  @include('commons.side')
@endsection

@section('js-script')
  <script>
    $(function() {
      let headerHight = 50; //ヘッダの高さ

      $('a[href^=#]').click(function() {
        let href = $(this).attr("href");
        let target = $(href == "#" || href == "" ? 'html' : href);
        let position = target.offset().top - headerHight;
        $("html, body").animate({
          scrollTop: position
        }, 550, "swing");
        return false;
      });
    });
  </script>
@endsection
