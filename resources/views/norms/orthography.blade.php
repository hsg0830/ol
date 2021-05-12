@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 맞춤법')

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
      <span itemprop="name">맞춤법</span>
      <meta itemprop="position" content="3" />
    </li>
  </ol>
@endsection

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="main">
    <h1 class="page-title">맞춤법</h1>
    <button class="btn all-ex-btn">
      <i class="fas fa-bars"></i>&nbsp;
      <span>전체해설보기</span>
    </button>

    <!-- 앞말 -->
    <div class="introduction">
      <p>위대한 수령 김일성동지께서는 다음과 같이 교시하시였다.</p>
      <p>
        <span>
          《우리의 언어학자들은 글자개혁안을 연구하는 한편 지금의 넓적글자를
          가지고도 보기 헐하도록 하기 위하여 적극 힘써야 합니다.》
        </span>
      </p>
      <p class="text-right">(《김일성전집》36권, 512페지)</p>
    </div>

    <!-- 총칙 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;총&nbsp;칙&nbsp;</span>
      </h2>
      <div class="term">
        <p class="description">
          조선말맞춤법은 단어에서 뜻을 가지는 매개 부분을 언제나 같게 적는
          원칙을 기본으로 하면서 일부 경우 소리나는대로 적거나 관습을
          따르는것을 허용한다.
        </p>
      </div>
    </div>

    <!-- 제1장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제1장.&nbsp;</span>
        조선어자모의 차례와 그 이름
      </h2>
      <!-- 제1항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제1항.&nbsp;</span>조선어자모의 차례와 그 이름은 다음과
            같다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td>ㄱ</br>(기윽)</td>
                <td>ㄴ</br>(니은)</td>
                <td>ㄷ</br>(디읃)</td>
                <td>ㄹ</br>(리을)</td>
                <td>ㅁ</br>(미음)</td>
              </tr>
              <tr>
                <td>ㅂ</br>(비읍)</td>
                <td>ㅅ</br>(시읏)</td>
                <td>ㅇ</br>(이응)</td>
                <td>ㅈ</br>(지읒)</td>
                <td>ㅊ</br>(치읓)</td>
              </tr>
              <tr>
                <td>ㅋ</br>(키읔)</td>
                <td>ㅌ</br>(티읕)</td>
                <td>ㅍ</br>(피읖)</td>
                <td>ㅎ</br>(히읗)</td>
                <td>ㄲ</br>(<span>된기윽</span>)</td>
              </tr>
              <tr>
                <td>ㄸ</br>(<span>된디읃</span>)</td>
                <td>ㅃ</br>(<span>된비읍</span>)</td>
                <td>ㅆ</br>(<span>된시읏</span>)</td>
                <td>ㅉ</br>(<span>된지읒</span>)</td>
                <td></td>
              </tr>
              <tr>
                <td>ㅏ</br>(아)</td>
                <td>ㅑ</br>(야)</td>
                <td>ㅓ</br>(어)</td>
                <td>ㅕ</br>(여)</td>
                <td>ㅗ</br>(오)</td>
              </tr>
              <tr>
                <td>ㅛ</br>(요)</td>
                <td>ㅜ</br>(우)</td>
                <td>ㅠ</br>(유)</td>
                <td>ㅡ</br>(으)</td>
                <td>ㅣ</br>(이)</td>
              </tr>
              <tr>
                <td>ㅐ</br>(애)</td>
                <td>ㅒ</br>(얘)</td>
                <td>ㅔ</br>(에)</td>
                <td>ㅖ</br>(예)</td>
                <td>ㅚ</br>(외)</td>
              </tr>
              <tr>
                <td>ㅟ</br>(위)</td>
                <td>ㅢ</br>(의)</td>
                <td>ㅘ</br>(와)</td>
                <td>ㅝ</br>(워)</td>
                <td>ㅙ</br>(왜)</td>
              </tr>
              <tr>
                <td>ㅞ</br>(웨)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table>
          </div>
          <p class="description">
            자음글자의 이름은 각각 다음과 같이 부를수도 있다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td>(그)</td>
                <td>(느)</td>
                <td>(드)</td>
                <td>(르)</td>
                <td>(므)</td>
                <td>(브)</td>
              </tr>
              <tr>
                <td>(스)</td>
                <td>(즈)</td>
                <td>(츠)</td>
                <td>(크)</td>
                <td>(트)</td>
                <td>(프)</td>
              </tr>
              <tr>
                <td>(흐)</td>
                <td>(끄)</td>
                <td>(뜨)</td>
                <td>(쁘)</td>
                <td>(쓰)</td>
                <td>(쯔)</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제2장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제2장.&nbsp;</span>
        형태부의 적기
      </h2>
      <!-- 제2항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제2항.&nbsp;</span>조선어의 글에서 쓰는 받침은 다음과 같다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">
          </p>
          <div class="example">
            <table>
              <tr>
                <td>ㄱ</td>
                <td class="text-left">책&nbsp;(책이, 책을, 책에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">먹다&nbsp;(먹으니, 먹어, 먹지)</td>
              </tr>
              <tr>
                <td>ㄳ</td>
                <td class="text-left">몫&nbsp;(몫이, 몫을, 몫에)</td>
              </tr>
              <tr>
                <td>ㄴ</td>
                <td class="text-left">논&nbsp;(논이, 논을, 논에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">안다&nbsp;(안으니, 안아, 안지)</td>
              </tr>
              <tr>
                <td>ㄵ</td>
                <td class="text-left">앉다&nbsp;(앉으니, 앉아, 앉지)</td>
              </tr>
              <tr>
                <td>ㄶ</td>
                <td class="text-left">많다&nbsp;(많으니, 많아, 많지)</td>
              </tr>
              <tr>
                <td>ㄷ</td>
                <td class="text-left">낟알&nbsp;(낟알이, 낟알을, 낟알에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">굳다&nbsp;(굳으니, 굳어, 굳지)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">듣다&nbsp;(들으니, 들어, 듣지)</td>
              </tr>
              <tr>
                <td>ㄹ</td>
                <td class="text-left">길&nbsp;(길이, 길을, 길에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">멀다&nbsp;(머니, 멀어서, 멀지)</td>
              </tr>
              <tr>
                <td>ㄺ</td>
                <td class="text-left">닭&nbsp;(닭이, 닭을, 닭에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">맑다&nbsp;(맑으니, 맑아, 맑지)</td>
              </tr>
              <tr>
                <td>ㄻ</td>
                <td class="text-left">삶&nbsp;(삶이, 삶을, 삶에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">젊다&nbsp;(젊으니, 젊어, 젊지)</td>
              </tr>
              <tr>
                <td>ㄼ</td>
                <td class="text-left">여덟&nbsp;(여덟이, 여덟을, 여덟에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">넓다&nbsp;(넓으니, 넓어, 넓지)</td>
              </tr>
              <tr>
                <td>ㄽ</td>
                <td class="text-left">돐&nbsp;(돐이, 돐을, 돐에)</td>
              </tr>
              <tr>
                <td>ㄾ</td>
                <td class="text-left">훑다&nbsp;(훑으니, 훑어, 훑지)</td>
              </tr>
              <tr>
                <td>ㄿ</td>
                <td class="text-left">읊다&nbsp;(읊으니, 읊어, 읊지)</td>
              </tr>
              <tr>
                <td>ㅀ</td>
                <td class="text-left">옳다&nbsp;(옳으니, 옳아, 옳지)</td>
              </tr>
              <tr>
                <td>ㅁ</td>
                <td class="text-left">밤&nbsp;(밤이, 밤을, 밤에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">심다&nbsp;(심으니, 심어, 심지)</td>
              </tr>
              <tr>
                <td>ㅂ</td>
                <td class="text-left">집&nbsp;(집이, 집을, 집에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">잡다&nbsp;(잡으니, 잡아, 잡지)</td>
              </tr>
              <tr>
                <td>ㅄ</td>
                <td class="text-left">값&nbsp;(값이, 값을, 값에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">없다&nbsp;(없으니, 없어, 없지)</td>
              </tr>
              <tr>
                <td>ㅅ</td>
                <td class="text-left">옷&nbsp;(옷이, 옷을, 옷에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">솟다&nbsp;(솟으니, 솟아, 솟지)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">잇다&nbsp;(잇으니, ?????잇어, 잇지)</td>
              </tr>
              <tr>
                <td>ㅇ</td>
                <td class="text-left">땅&nbsp;(땅이, 땅을, 땅에)</td>
              </tr>
              <tr>
                <td>ㅈ</td>
                <td class="text-left">낮&nbsp;(낮이, 낮을, 낮에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">맞다&nbsp;(맞으니, 맞아, 맞지)</td>
              </tr>
              <tr>
                <td>ㅊ</td>
                <td class="text-left">빛&nbsp;(빛이, 빛을, 빛에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">쫓다&nbsp;(쫓으니, 쫓아, 쫓지)</td>
              </tr>
              <tr>
                <td>ㅋ</td>
                <td class="text-left">부엌&nbsp;(부엌이, 부엌을, 부엌에)</td>
              </tr>
              <tr>
                <td>ㅌ</td>
                <td class="text-left">밭&nbsp;(밭이, 밭을, 밭에)</td>
              </tr>
              <tr>
                <td>ㅍ</td>
                <td class="text-left">숲&nbsp;(숲이, 숲을, 숲에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">높다&nbsp;(높으니, 높아, 높지)</td>
              </tr>
              <tr>
                <td>ㅎ</td>
                <td class="text-left">히읗&nbsp;(히읗이, 히읗을, 히읗에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">좋다&nbsp;(좋으니, 좋아, 좋지)</td>
              </tr>
              <tr>
                <td>ㄲ</td>
                <td class="text-left">밖&nbsp;(밖이, 밖을, 밖에)</td>
              </tr>
              <tr>
                <td></td>
                <td class="text-left">엮다&nbsp;(엮으니, 엮어, 엮지)</td>
              </tr>
              <tr>
                <td>ㅆ</td>
                <td class="text-left">있다&nbsp;(있으니, 있어, 있지)</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제3항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제3항.&nbsp;</span>받침 《ㄷ, ㅌ, ㅅ, ㅆ, ㅈ, ㅊ》가운데서 어느 하나로 적어야 할 까닭이 없는것은 관습대로 《ㅅ》으로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">무릇, 빗나가다, 사뭇, 숫돌, 첫째, 헛소리, 햇곡식, 얼핏, 읽으렷다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제4항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제4항.&nbsp;</span>한 형태부안의 두 모음사이에서 나는 자음은 혀옆소리가 아닌 경우 받침으로 적지 않는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <th>옳음</th>
                <th>그름</th>
              </tr>
              <tr>
                <td>겨누다</td>
                <td>견우다</td>
              </tr>
              <tr>
                <td>디디다</td>
                <td>딛이다</td>
              </tr>
              <tr>
                <td>미덥다</td>
                <td>믿업다</td>
              </tr>
              <tr>
                <td>메추리</td>
                <td>멧추리</td>
              </tr>
              <tr>
                <td>비치다</td>
                <td>빛이다</td>
              </tr>
              <tr>
                <td>소쿠리</td>
                <td>속후리</td>
              </tr>
              <tr>
                <td>시키다</td>
                <td>식히다</td>
              </tr>
              <tr>
                <td>지키다</td>
                <td>직히다</td>
              </tr>
              <tr>
                <td>여기다</td>
                <td>역이다</td>
              </tr>
              <tr>
                <td>기쁘다</td>
                <td>깃브다</td>
              </tr>
              <tr>
                <td>바싹</td>
                <td>밧삭</td>
              </tr>
              <tr>
                <td>부썩</td>
                <td>붓석</td>
              </tr>
              <tr>
                <td>해쑥하다</td>
                <td>햇슥하다</td>
              </tr>
              <tr>
                <td>아끼다</td>
                <td>앗기다</td>
              </tr>
              <tr>
                <td>여쭈다</td>
                <td>엿주다</td>
              </tr>
              <tr>
                <td>오빠</td>
                <td>옵바</td>
              </tr>
              <tr>
                <td>우뚝</td>
                <td>웃둑</td>
              </tr>
              <tr>
                <td>으뜸</td>
                <td>읏듬</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제5항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제5항.&nbsp;</span>한 형태부안의 두 모음사이에서 나는 혀옆소리는 《ㄹㄹ》로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <th>옳음</th>
                <th>그름</th>
              </tr>
              <tr>
                <td>걸레</td>
                <td>걸네</td>
              </tr>
              <tr>
                <td>놀라다</td>
                <td>놀나다</td>
              </tr>
              <tr>
                <td>벌레</td>
                <td>벌네</td>
              </tr>
              <tr>
                <td>실룩실룩</td>
                <td>실눅실눅</td>
              </tr>
              <tr>
                <td>빨래</td>
                <td>빨내</td>
              </tr>
              <tr>
                <td>알락달락</td>
                <td>알낙달낙</td>
              </tr>
              <tr>
                <td>얼른</td>
                <td>얼는</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제6항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제6항.&nbsp;</span>한 형태부안에서 받침 《ㄴ, ㄹ, ㅁ, ㅇ》다음의 소리가 된소리로 나는 경우에는 그것을 된소리로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <th>옳음</th>
                <th>그름</th>
              </tr>
              <tr>
                <td>반짝반짝</td>
                <td>반작반작</td>
              </tr>
              <tr>
                <td>걸써</td>
                <td>걸서</td>
              </tr>
              <tr>
                <td>말씀</td>
                <td>말슴</td>
              </tr>
              <tr>
                <td>벌써</td>
                <td>벌서</td>
              </tr>
              <tr>
                <td>활짝</td>
                <td>활작</td>
              </tr>
              <tr>
                <td>훨씬</td>
                <td>훨신</td>
              </tr>
              <tr>
                <td>알뜰살뜰</td>
                <td>알들살들</td>
              </tr>
              <tr>
                <td>옴짝달싹</td>
                <td>옴작달삭</td>
              </tr>
              <tr>
                <td>뭉뚝하다</td>
                <td>뭉둑하다</td>
              </tr>
            </table>
          </div>
          <p class="description">
            그러나 토에서는 《ㄹ》뒤에서 된소리가 나더라도 된소리로 적지 않는다.
          </p>
          <div class="example">
            <table>
              <tr>
                <th>옳음</th>
                <th>그름</th>
              </tr>
              <tr>
                <td>～ㄹ가</td>
                <td>～ㄹ까</td>
              </tr>
              <tr>
                <td>～ㄹ수록</td>
                <td>～ㄹ쑤록</td>
              </tr>
              <tr>
                <td>～ㄹ지라도</td>
                <td>～ㄹ찌라도</td>
              </tr>
              <tr>
                <td>～올시다</td>
                <td>～올씨다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제7항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제7항.&nbsp;</span>한 형태부의 소리가 줄어진 경우에는 준대로 적되 본래형태를 잘 파악할수 있도록 받침을 바로잡아 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <th>옳음</th>
                <th>그름</th>
              </tr>
              <tr>
                <td>갖가지(가지가지)</td>
                <td>갓가지</td>
              </tr>
              <tr>
                <td>갖고(가지고)</td>
                <td>갓고</td>
              </tr>
              <tr>
                <td>기럭아(기러기야)</td>
                <td>기러가</td>
              </tr>
              <tr>
                <td>딛고(디디고)</td>
                <td>딧고</td>
              </tr>
              <tr>
                <td>엊저녁(어제저녁)</td>
                <td>엇저녁</td>
              </tr>
              <tr>
                <td>온갖(온가지)</td>
                <td>온갓</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제3장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제3장.&nbsp;</span>
        말줄기와 토의 적기
      </h2>
      <!-- 제8항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제8항.&nbsp;</span>말줄기와 토가 어울릴 때에는 각각 그 본래형태를 밝혀 적는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">같다, 같으니, 같아, 같지</td>
              </tr>
              <tr>
                <td class="text-left">낳다, 낳으니, 낳아, 낳지</td>
              </tr>
              <tr>
                <td class="text-left">삶다, 삶으니, 삶아, 삶지</td>
              </tr>
              <tr>
                <td class="text-left">입다, 입으니, 입어, 입지</td>
              </tr>
              <tr>
                <td class="text-left">집이, 집을, 집에</td>
              </tr>
              <tr>
                <td class="text-left">팥이, 팥을, 팥에</td>
              </tr>
              <tr>
                <td class="text-left">흙이, 흙을, 흙에</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제9항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제9항.&nbsp;</span>오늘날 말줄기에 토가 붙은것으로 인정되기 어려운 경우에는 그것들을 밝혀 적지 않는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <th>옳음</th>
                <th>그름</th>
              </tr>
              <tr>
                <td>고치다</td>
                <td>곧히다</td>
              </tr>
              <tr>
                <td>나타나다</td>
                <td>낱아나다</td>
              </tr>
              <tr>
                <td>바라보다</td>
                <td>발아보다</td>
              </tr>
              <tr>
                <td>바치다</td>
                <td>받히다</td>
              </tr>
              <tr>
                <td>부러지다</td>
                <td>불어지다</td>
              </tr>
              <tr>
                <td>사라지다</td>
                <td>살아지다</td>
              </tr>
              <tr>
                <td>자라나다</td>
                <td>잘아나다</td>
              </tr>
              <tr>
                <td>자빠뜨리다</td>
                <td>잡바뜨리다</td>
              </tr>
            </table>
          </div>
          <p class="description">
            말줄기에 토가 붙은것으로 인정되는 경우에도 뜻이 딴 단어로 바뀐것은 그 말줄기와 토를 밝히지 않는다.
          </p>
          <div class="example">
            <table>
              <tr>
                <th>옳음</th>
                <th>그름</th>
              </tr>
              <tr>
                <td>드러나다</td>
                <td>들어나다</td>
              </tr>
              <tr>
                <td>스무나문</td>
                <td>스물남은</td>
              </tr>
              <tr>
                <td>쓰러지다</td>
                <td>쓸어지다</td>
              </tr>
              <tr>
                <td>(열흘)나마</td>
                <td>(열흘)남아</td>
              </tr>
              <tr>
                <td>(고개)너머</td>
                <td>(고개)넘어</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제10항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제10항.&nbsp;</span>일부 형용사, 동사에서 말줄기와 토가 어울릴 때에 말줄기의 끝소리가 일정하게 바뀌여지는것은 바뀐대로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>말줄기의 끝을 《ㄹ》로 적거나 적지 않는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>갈다</td>
                  <td class="text-left">
                    갈고, 갈며, 갈아</br>
                    가니, 갑니다, 가시니, 가오
                  </td>
                </tr>
                <tr>
                  <td>돌다</td>
                  <td class="text-left">
                    돌고, 돌며, 돌아</br>
                    도니, 돕니다, 도시니, 도오
                  </td>
                </tr>
                <tr>
                  <td>불다</td>
                  <td class="text-left">
                    불고, 불며, 불어</br>
                    부니, 붑니다, 부시니, 부오
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>말줄기의 끝을 《ㅅ》으로 적거나 적지 않는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>낫다</td>
                  <td class="text-left">
                    낫고, 낫지</br>
                    나으니, 나아
                  </td>
                </tr>
                <tr>
                  <td>짓다</td>
                  <td class="text-left">
                    짓고, 짓지</br>
                    지으니, 지어
                  </td>
                </tr>
                <tr>
                  <td>잇다</td>
                  <td class="text-left">
                    잇고, 잇지</br>
                    이으니, 이어
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>3)&nbsp;</span>말줄기의 끝을 《ㅎ》으로 적거나 적지 않는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>벌겋다</td>
                  <td class="text-left">
                    벌겋고, 벌겋지</br>
                    벌거오, 벌거니, 벌겁니다, 벌개서
                  </td>
                </tr>
                <tr>
                  <td>커다랗다</td>
                  <td class="text-left">
                    커다랗고 커다랗지</br>
                    커다라오, 커다라니, 커다랍니다, 커다래서
                  </td>
                </tr>
                <tr>
                  <td>허옇다</td>
                  <td class="text-left">
                    허옇고, 허옇지</br>
                    허여오, 허여니, 허엽니다, 허얘서
                  </td>
                </tr>
              </table>
            </div>
            <p class="description">
              <span class="complement">붙임</span>
              《ㅎ》받침으로 끝난 본래의 말줄기가 두 소리마디이상으로 된 형용사, 동사는 모두 여기에 속한다.
            </p>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>4)&nbsp;</span>말줄기의 끝 《ㄷ》을 《ㄹ》로도 적는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>걷다</td>
                  <td class="text-left">
                    걷고, 걷지</br>
                    걸으니, 걸어
                  </td>
                </tr>
                <tr>
                  <td>듣다</td>
                  <td class="text-left">
                    듣고, 듣지</br>
                    들으니, 들어
                  </td>
                </tr>
                <tr>
                  <td>묻다</td>
                  <td class="text-left">
                    묻고, 묻지</br>
                    물으니, 물어
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>5)&nbsp;</span>말줄기의 끝 《ㅂ》을 《오(우)》로도 적는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>고맙다</td>
                  <td class="text-left">
                    고맙고, 고맙지</br>
                    고마우니, 고마와
                  </td>
                </tr>
                <tr>
                  <td>곱다</td>
                  <td class="text-left">
                    곱고, 곱지</br>
                    고우니, 고와
                  </td>
                </tr>
                <tr>
                  <td>춥다</td>
                  <td class="text-left">
                    춥고, 춥지</br>
                    추우니, 추워
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>6)&nbsp;</span>말줄기의 끝 《ㄹ》을 《르ㄹ》로도 적는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>누르다</td>
                  <td class="text-left">
                    누르고, 누르지</br>
                    누르러, 누르렀다
                  </td>
                </tr>
                <tr>
                  <td>푸르다</td>
                  <td class="text-left">
                    푸르고, 푸르지</br>
                    푸르러, 푸르렀다
                  </td>
                </tr>
                <tr>
                  <td>이르다</td>
                  <td class="text-left">
                    이르고, 이르지</br>
                    이르러, 이르렀다
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>7)&nbsp;</span>말줄기의 끝 《르》를 《ㄹㄹ》로도 적는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>기르다</td>
                  <td class="text-left">
                    기르고, 기르지</br>
                    길러, 길렀다
                  </td>
                </tr>
                <tr>
                  <td>푸르다</td>
                  <td class="text-left">
                    푸르고, 푸르지</br>
                    푸르러, 푸르렀다
                  </td>
                </tr>
                <tr>
                  <td>빠르다</td>
                  <td class="text-left">
                    빠르고, 빠르지</br>
                    빨라, 빨랐다
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>8)&nbsp;</span>말줄기의 끝을 《ㅡ》로 적거나 적지 않는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>고프다</td>
                  <td class="text-left">
                    고프고, 고프지</br>
                    고파, 고팠다
                  </td>
                </tr>
                <tr>
                  <td>부르트다</td>
                  <td class="text-left">
                    부르트고, 부르트지</br>
                    부르터, 부르텄다
                  </td>
                </tr>
                <tr>
                  <td>뜨다</td>
                  <td class="text-left">
                    뜨고, 뜨지</br>
                    떠, 떴다
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>9)&nbsp;</span>말줄기의 끝을 《ㅜ》로 적거나 적지 않는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>푸다</td>
                  <td class="text-left">
                    푸고, 푸지</br>
                    퍼, 펐다
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 제11항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제11항.&nbsp;</span>말줄기가 《아, 어, 여》 또는 《았, 었, 였》과 어울릴 때에는 그 말줄기의 모음의 성질에 따라 각각 다음과 같이 구별하여 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>말줄기의 모음이 《ㅏ, ㅑ, ㅗ, ㅏㅡ, ㅗㅡ》인 경우에는 《아, 았》으로 적는다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>막다</td>
                  <td class="text-left">
                    막아, 막았다
                  </td>
                </tr>
                <tr>
                  <td>얇다</td>
                  <td class="text-left">
                    얇아, 얇았다
                  </td>
                </tr>
                <tr>
                  <td>오다</td>
                  <td class="text-left">
                    와, 왔다
                  </td>
                </tr>
                <tr>
                  <td>따르다</td>
                  <td class="text-left">
                    따라, 따랐다
                  </td>
                </tr>
                <tr>
                  <td>오르다</td>
                  <td class="text-left">
                    올라, 올랐다
                  </td>
                </tr>
              </table>
            </div>
            <p class="description">
              <span class="complement">붙임</span>
              말줄기의 모음이 《ㅏㅡ, ㅗㅡ》인것이라도 합친말줄기인 경우에는 《어, 었》으로 적는다.
            </p>
            <div class="example">
              <table>
                <tr>
                  <td>받들다</td>
                  <td class="text-left">
                    받들어, 받들었다
                  </td>
                </tr>
                <tr>
                  <td>곱들다</td>
                  <td class="text-left">
                    곱들어, 곱들었다
                  </td>
                </tr>
                <tr>
                  <td>쪼들다</td>
                  <td class="text-left">
                    쪼들어, 쪼들었다
                  </td>
                </tr>
              </table>

            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>말줄기의 모음이 《ㅓ, ㅕ, ㅜ, ㅡ, ㅓㅡ, ㅜㅡ, ㅡㅡ, ㅡㅣ》인 경우에는 《어, 었》으로 적는다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>넣다</td>
                  <td class="text-left">
                    넣어, 넣었다
                  </td>
                </tr>
                <tr>
                  <td>겪다</td>
                  <td class="text-left">
                    겪어, 겪었다
                  </td>
                </tr>
                <tr>
                  <td>두다</td>
                  <td class="text-left">
                    두다, 두었다
                  </td>
                </tr>
                <tr>
                  <td>크다</td>
                  <td class="text-left">
                    커, 컸다
                  </td>
                </tr>
                <tr>
                  <td>거들다</td>
                  <td class="text-left">
                    거들어, 거들었다
                  </td>
                </tr>
                <tr>
                  <td>부르다</td>
                  <td class="text-left">
                    불러, 불렀다
                  </td>
                </tr>
                <tr>
                  <td>흐르다</td>
                  <td class="text-left">
                    흘러, 흘렀다
                  </td>
                </tr>
                <tr>
                  <td>치르다</td>
                  <td class="text-left">
                    치러, 치렀다
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>3)&nbsp;</span>말줄기의 모음이 《ㅣ, ㅐ, ㅔ, ㅚ, ㅟ, ㅢ》인 경우와 줄기가 《하》인 경우에는 《여, 였》으로 적는다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td>기다</td>
                  <td class="text-left">
                    기여, 기였다</td>
                </tr>
                <tr>
                  <td>개다</td>
                  <td class="text-left">
                    개여, 개였다</td>
                </tr>
                <tr>
                  <td>베다</td>
                  <td class="text-left">
                    베여, 베였다</td>
                </tr>
                <tr>
                  <td>되다</td>
                  <td class="text-left">
                    되여, 되였다</td>
                </tr>
                <tr>
                  <td>쥐다</td>
                  <td class="text-left">
                    쥐여, 쥐였다</td>
                </tr>
                <tr>
                  <td>희다</td>
                  <td class="text-left">
                    희여, 희였다</td>
                </tr>
                <tr>
                  <td>하다</td>
                  <td class="text-left">
                    하여, 하였다</td>
                </tr>
              </table>
            </div>
            <p class="description">
              그러나 말줄기의 끝소리마디에 받침이 있을 때에는 《어, 었》으로 적는다.
            </p>
            <div class="example">
              <table>
                <tr>
                  <td>길다</td>
                  <td class="text-left">
                    길어, 길었다</td>
                </tr>
                <tr>
                  <td>심다</td>
                  <td class="text-left">
                    심어, 심었다</td>
                </tr>
                <tr>
                  <td>짓다</td>
                  <td class="text-left">
                    지어, 지었다</td>
                </tr>
              </table>
            </div>
            <p class="description">
              <span class="complement">붙임</span>
              부사로 된 다음과 같은 단어들은 말줄기와 토를 갈라 적지 않는다.
            </p>
            <div class="example">
              <table>
                <tr>
                  <th>옳음</th>
                  <th>그름</th>
                </tr>
                <tr>
                  <td>구태여</td>
                  <td>구태어</td>
                </tr>
                <tr>
                  <td>도리여</td>
                  <td>도리어</td>
                </tr>
                <tr>
                  <td>드디여</td>
                  <td>드디어</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 제12항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제12항.&nbsp;</span>모음으로 끝난 말줄기와 모음으로 시작한 토가 어울릴 때에 소리가 줄어든것은 준대로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td>가지다</td>
                <td class="text-left">가지여, 가지였다</td>
              </tr>
              <tr>
                <td>가지다</td>
                <td class="text-left">가져, 가졌다</td>
              </tr>
              <tr>
                <td>고이다</td>
                <td class="text-left">고이여, 고이였다</td>
              </tr>
              <tr>
                <td>괴다</td>
                <td class="text-left">괴다, 괴였다</td>
              </tr>
              <tr>
                <td>모이다</td>
                <td class="text-left">모이여(모여), 모이였다(모였다)</td>
              </tr>
              <tr>
                <td>뫼다</td>
                <td class="text-left">뫼여, 뫼였다</td>
              </tr>
              <tr>
                <td>보다</td>
                <td class="text-left">보아, 보았다</td>
              </tr>
              <tr>
                <td>보다</td>
                <td class="text-left">봐, 봤다</td>
              </tr>
              <tr>
                <td>주다</td>
                <td class="text-left">주어, 주었다</td>
              </tr>
              <tr>
                <td>주다</td>
                <td class="text-left">줘, 줬다</td>
              </tr>
              <tr>
                <td>꾸다</td>
                <td class="text-left">꾸어, 꾸었다</td>
              </tr>
              <tr>
                <td>꾸다</td>
                <td class="text-left">꿔, 꿨다</td>
              </tr>
              <tr>
                <td>뜨이다</td>
                <td class="text-left">뜨이여, 뜨이였다</td>
              </tr>
              <tr>
                <td>띄다</td>
                <td class="text-left">띄여, 띄였다</td>
              </tr>
              <tr>
                <td>쏘다</td>
                <td class="text-left">쏘아, 쏘았다</td>
              </tr>
              <tr>
                <td>쏘다</td>
                <td class="text-left">쏴, 쐈다</td>
              </tr>
              <tr>
                <td>쏘이다</td>
                <td class="text-left">쏘이여, 쏘이였다</td>
              </tr>
              <tr>
                <td>쐬다</td>
                <td class="text-left">쐬여, 쐬였다</td>
              </tr>
              <tr>
                <td>쓰이다</td>
                <td class="text-left">쓰이여, 씌이였다</td>
              </tr>
              <tr>
                <td>씌다</td>
                <td class="text-left">씌여, 씌였다</td>
              </tr>
              <tr>
                <td>쪼이다</td>
                <td class="text-left">쪼이여, 쪼이였다</td>
              </tr>
              <tr>
                <td>쬐다</td>
                <td class="text-left">쬐여, 쬐였다</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td>되다</td>
                <td class="text-left">되여서, 되였다</td>
              </tr>
              <tr>
                <td>되다</td>
                <td class="text-left">돼서, 됐다</td>
              </tr>
              <tr>
                <td>하다</td>
                <td class="text-left">하여서, 하였다</td>
              </tr>
              <tr>
                <td>하다</td>
                <td class="text-left">해서, 했다</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td>개다</td>
                <td class="text-left">개여서, 개였다</td>
              </tr>
              <tr>
                <td>개다</td>
                <td class="text-left">개서, 갰다</td>
              </tr>
              <tr>
                <td>메다</td>
                <td class="text-left">메여서, 메였다</td>
              </tr>
              <tr>
                <td>메다</td>
                <td class="text-left">메서, 멨다</td>
              </tr>
            </table>
          </div>
          <p class="description">그러나 다음과 같은 단어들은 줄어든대로 적는다.</p>
          <div class="example">
            <table>
              <tr>
                <td>살찌다</td>
                <td class="text-left">살쪄, 살쪘다</td>
              </tr>
              <tr>
                <td>지다</td>
                <td class="text-left">져, 졌다</td>
              </tr>
              <tr>
                <td>치다</td>
                <td class="text-left">쳐, 쳤다</td>
              </tr>
              <tr>
                <td>찌다</td>
                <td class="text-left">쪄, 쪘다</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td>건느다</td>
                <td class="text-left">건너, 건넜다</td>
              </tr>
              <tr>
                <td>잠그다</td>
                <td class="text-left">잠가, 잠갔다</td>
              </tr>
              <tr>
                <td>치르다</td>
                <td class="text-left">치러, 치렀다</td>
              </tr>
              <tr>
                <td>크다</td>
                <td class="text-left">커, 컸다</td>
              </tr>
              <tr>
                <td>쓰다</td>
                <td class="text-left">써, 썼다</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td>가다</td>
                <td class="text-left">가, 갔다</td>
              </tr>
              <tr>
                <td>사다</td>
                <td class="text-left">사, 샀다</td>
              </tr>
              <tr>
                <td>서다</td>
                <td class="text-left">서, 섰다</td>
              </tr>
              <tr>
                <td>켜다</td>
                <td class="text-left">켜, 켰다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제13항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제13항.&nbsp;</span>말줄기의 끝소리마디 《하》의 《ㅏ》가 줄어들면서 다음에 온 토의 첫소리자음이 거세게 될 때에는 거센소리로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <th>본말</th>
                <th>준말</th>
              </tr>
              <tr>
                <td>다정하다</td>
                <td>다정타</td>
              </tr>
              <tr>
                <td>례하건대</td>
                <td>례컨대</td>
              </tr>
              <tr>
                <td>발명하게</td>
                <td>발명케</td>
              </tr>
              <tr>
                <td>선선하지 못하다</td>
                <td>선선치 못하다</td>
              </tr>
              <tr>
                <td>시원하지 못하다</td>
                <td>시원치 못하다</td>
              </tr>
            </table>
          </div>
          <p class="description">
            그러나 《아니하다》가 줄어든 경우에는 《않다》로 적는다.
          </p>
          <div class="example">
            <table>
              <tr>
                <th>본말</th>
                <th>준말</th>
              </tr>
              <tr>
                <td>넉넉하지 아니하다</td>
                <td>넉넉치 않다</td>
              </tr>
              <tr>
                <td>서슴지 아니하다</td>
                <td>서슴지 않다</td>
              </tr>
              <tr>
                <td>주저하지 아니하다</td>
                <td>주저치 않다</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            이와 관련하여 《않다》, 《못하다》의 앞에 오는 《하지》를 줄인 경우에는 《치》로 적는다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">
                  고려치 않다, 괜치 않다, 넉넉치 않다, 만만치 않다, 섭섭치 않다, 똑똑치 않다, 우연치 않다, 편안치 못하다, 풍부치 못하다
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제4장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제4장.&nbsp;</span>
        합친말의 적기
      </h2>
      <!-- 제14항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제14항.&nbsp;</span>합친말은 매개 말뿌리의 본래형태를 각각 밝혀 적는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">걷잡다, 낮보다, 눈웃음, 돋보다, 물오리, 밤알, 손아귀, 철없다, 꽃철, 끝나다</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">값있다, 겉늙다, 몇날, 빛나다, 칼날, 팥알, 흙내</td>
              </tr>
            </table>
          </div>
          <p class="description">
            《암, 수》와 결합되는 동물의 이름이나 대상은 거센소리로 적지 않고 형태를 그대로 밝혀 적는다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">
                  수돼지, 암돼지, 수개, 암개, 수기와, 암기와
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제15항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제15항.&nbsp;</span>합친말에서 오늘날 말뿌리가 뚜렷하지 않은것은 그 형태를 밝혀 적지 않는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">며칠, 부랴부랴, 오라버니, 이틀, 이태</td>
              </tr>
              <tr>
                <td class="text-left">마파람, 휘파람, 좁쌀, 안팎</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제16항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제16항.&nbsp;</span>합친말을 이룰 때에 빠진 소리는 빠진대로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">다달이, 마소, 무넘이, 부나비, 부넘이, 부삽, 부손,<br> 소나무, 수저, 화살, 여닫이</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제17항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제17항.&nbsp;</span>합친말에서 앞말뿌리의 끝소리《ㄹ》이 닫긴소리로 된것은 《ㄷ》으로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">나흗날, 사흗날, 섣달, 숟가락, 이튿날</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제5장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제5장.&nbsp;</span>
        앞붙이와 말뿌리의 적기
      </h2>
      <!-- 제18항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제18항.&nbsp;</span>앞붙이와 말뿌리가 어울릴 때에는 각각 그 본래형태를 밝혀 적는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">갖풀, 덧신, 뒤일, 맏누이, 선웃음, 참외, 햇가지,<br>
                  아래집, 웃집, 옛말</td>
              </tr>
              <tr>
                <td class="text-left">빗보다, 싯허옇다, 짓밟다, 헛디디다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제6장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제6장.&nbsp;</span>
        말뿌리와 뒤붙이(또는 일부 토)의 적기
      </h2>
      <!-- 제19항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제19항.&nbsp;</span>자음으로 시작한 뒤붙이가 말뿌리와 어울릴 때에는 각각 그 형태를 밝혀 적는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>새 단어를 새끼치는 뒤붙이
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">곧추, 날치, 덮개, 돋보기, 첫째, 잎사귀</td>
                </tr>
                <tr>
                  <td class="text-left">꽃답다, 뜯적뜯적하다, 의롭다</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>동사의 사역, 피동의 기능을 나타내는 《이, 히, 기, 리, 우, 구, 추》
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">놓이다, 막히다, 꽂히다, 뽑히다, 앉히다, 익히다,<br>
                    입히다, 감기다, 담기다, 맡기다, 옮기다, 웃기다,<br>
                    살리다, 세우다, 돋구다, 맞추다</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>3)&nbsp;</span>힘줌을 나타내는 《치》
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">놓치다, 덮치다, 받치다, 뻗치다, 엎치다</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>4)&nbsp;</span>형용사를 동사로 만드는 《추》, 《히》
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">낮추다, 늦추다</td>
                </tr>
                <tr>
                  <td class="text-left">굳히다, 넓히다, 밝히다</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>5)&nbsp;</span>《하다》가 붙어서 형용사로 될수 있는 말뿌리와 어울려 부사를 만드는 뒤붙이 《히》
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">
                    넉넉히, 답답히, 미끈히, 꾸준히, 똑똑히, 빤히, 씨원히</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 제20항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제20항.&nbsp;</span>말뿌리와 뒤붙이가 어울려 파생어를 이룰 때에 빠진 소리는 빠진대로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">가으내, 겨우내, 무질(물속에 잠기는것), 바느질</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제21항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제21항.&nbsp;</span>《ㄺ, ㄼ, ㄾ, ㅀ》 등의 둘받침으로 끝난 말뿌리에 뒤붙이가 어울릴 때에 그 둘받침중의 한 소리가 따로 나지 않는것은 안 나는대로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">말끔하다, 말쑥하다, 실쭉하다, 할짝할짝하다, 얄팍하다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제22항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제22항.&nbsp;</span>말뿌리와 뒤붙이가 어울리여 아주 다른 뜻으로 바뀐것은 그 말뿌리와 뒤붙이를 밝혀 적지 않는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">
                  거두다, 기르다, 도리다, 드리다, 만나다, 미루다,<br>
                  부치다, 이루다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제23항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제23항.&nbsp;</span>모음으로 된 뒤붙이가 말뿌리와 어울릴 때에는 다음과 같이 갈라 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>말뿌리와 뒤붙이를 밝혀 적는 경우
            </h4>
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>(1)&nbsp;</span>명사나 부사를 만드는 뒤붙이 《이》
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">길이, 깊이, 높이, 미닫이, 살림살이, 손잡이, 해돋이</td>
                  </tr>
                  <tr>
                    <td class="text-left">네눈이, 삼발이</td>
                  </tr>
                  <tr>
                    <td class="text-left">같이, 굳이, 깊이, 많이, 좋이</td>
                  </tr>
                  <tr>
                    <td class="text-left">곳곳이, 낱낱이, 샅샅이, 집집이</td>
                  </tr>
                </table>
              </div>
              <p class="description">
                그러나 본딴말에 붙어서 명사를 이루는것은 밝혀 적지 않는다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">누더기, 더퍼리, 두드러기, 무더기, 매미, 깍두기, 딱따기</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>(2)&nbsp;</span>명사를 만드는 뒤붙이 《음》
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">갚음, 걸음, 물음, 믿음, 졸음, 죽음, 꽃묶음, 엮음, 웃음, 이음</td>
                  </tr>
                </table>
              </div>
              <p class="description">
                그러나 다음과 같은 단어들은 말뿌리와 뒤붙이를 밝혀 적지 않는다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">거름(거름을 내다)<br>
                      고름(고름을 짜다)<br>
                      마름(한마름, 두마름)<br>
                      주검(주검을 다루다)</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>(3)&nbsp;</span>동사의 상을 나타내거나 형용사를 동사로 만드는 《이》, 《우》, 《으키》, 《이키》, 《애》
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">높이다, 놓이다, 먹이다, 쌓이다, 돋우다, 일으키다, 들이키다, 없애다</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>(4)&nbsp;</span>《하다》가 붙어서 형용사로 될수 있는 《ㅅ》받침으로 끝난 말뿌리와 어울려서 부사를 만드는 뒤붙이 《이》
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">반듯이(반듯하게 펴놓다), 꼿꼿이, 깨끗이, 따뜻이, 뚜렷이, 빵긋이, 뿌듯이, 어렴풋이</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>(5)&nbsp;</span>형용사를 만드는 《없》
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">객없다, 덧없다, 부질없다, 시름없다</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>(6)&nbsp;</span>《거리》와 어울릴수 있는 말뿌리에 붙어서 동사를 만드는 뒤붙이 《이》
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">반짝이다, 번득이다, 번쩍이다, 속삭이다, 움직이다</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>말뿌리와 뒤붙이를 밝혀 적지 않는 경우
            </h4>
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>(1)&nbsp;</span>말뿌리에 《이》, 《음》이외의 뒤붙이가 붙어서 이루어진 명사나 부사
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">나머지, 마감, 마개, 마중, 바깥, 지붕, 지푸래기, 끄트머리, 뜨더귀, 싸래기, 쓰레기, 올가미</td>
                  </tr>
                  <tr>
                    <td class="text-left">너무, 도로, 바투, 비로소, 자주, 뜨덤뜨덤</td>
                  </tr>
                  <tr>
                    <td class="text-left">거뭇거뭇, 나붓나붓, 쫑긋쫑긋, 오긋오긋, 울긋불긋</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>(2)&nbsp;</span>어떤 토나 《하다》가 붙어서 단어를 이루는 일이 없는 말뿌리에 뒤붙이 《이》, 《애기》, 《어기(에기)》, 《아기》가 붙어서 된 명사나 부사
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">갑자기, 동그라미, 반드시, 슬며시, 호르래기, 부스레기</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>(3)&nbsp;</span>뒤붙이 《앟, 엏》 또는 《업》, 《읍》이 붙어서 이루어진 형용사
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">가맣다, 발갛다, 파랗다, 싸느랗다, 누렇다, 둥그렇다</td>
                  </tr>
                  <tr>
                    <td class="text-left">간지럽다, 미덥다, 부드럽다, 시끄럽다, 징그럽다, 어지럽다, 우습다</td>
                  </tr>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- 제24항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제24항.&nbsp;</span>부사에서 뒤붙이 《이》나 《히》가 그 어느 하나로만 소리나는것은 그 소리대로 적는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>《히》로 적는것(주로 《하다》를 붙일수 있는것)
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">고요히, 덤덤히, 마땅히, 빈번히, 지극히, 뻔히</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>《이》로 적는것(주로 《하다》를 붙일수 없는것)
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">간간이, 고이, 기어이, 객적이, 뿔뿔이, 짬짬이</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>3)&nbsp;</span>말뿌리에 직접 《하다》를 붙일수 없으나 《히》로만 소리나는것은 《히》로 적으며 말뿌리에 직접 《하다》를 붙일수 있으나 《이》로만 소리나는것은 《이》로
              적는다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">거연히, 도저히, 자연히, 작히</td>
                </tr>
                <tr>
                  <td class="text-left">큼직이, 뚜렷이</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 제7장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제7장.&nbsp;</span>
        한자말의 적기
      </h2>
      <!-- 제25항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제25항.&nbsp;</span>한자말은 소리마디마다 해당 한자음대로 적는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">국가, 녀자, 뇨소, 당, 락원, 로동, 례외, 천리마, 풍모</td>
              </tr>
            </table>
          </div>
          <p class="description">그러나 아래와 같은 한자말은 변한 소리대로 적는다.</p>
          <div class="example">
            <table>
              <tr>
                <th>옳음</th>
                <th>그름</th>
              </tr>
              <tr>
                <td>궁냥</td>
                <td>궁량</td>
              </tr>
              <tr>
                <td>나사</td>
                <td>라사</td>
              </tr>
              <tr>
                <td>나팔</td>
                <td>라팔</td>
              </tr>
              <tr>
                <td>류월</td>
                <td>륙월</td>
              </tr>
              <tr>
                <td>시월</td>
                <td>십월</td>
              </tr>
              <tr>
                <td>오뉴월</td>
                <td>오류월, 오륙월</td>
              </tr>
              <tr>
                <td>요기</td>
                <td>료기</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제26항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제26항.&nbsp;</span>한자말에서 모음 《ㅖ》가 들어있는 소리마디로는 《계》, 《례》, 《혜》, 《예》만을 인정한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">계산, 계획, 례절, 례외, 실례, 세계, 혜택, 은혜, 연예대, 예술, 예지, 예약</td>
              </tr>
            </table>
          </div>
          <p class="description">그러나 그 본래소리가 《게》인 한자는 그대로 적는다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">게시판, 게재, 게양대</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제27항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제27항.&nbsp;</span>한자말에서 모음 《ㅢ》가 들어있는 소리마디로는 《희》, 《의》만을 인정한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">희망, 순희, 유희, 회의, 의견, 의의</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->

  @include('commons.side-recently')
@endsection
