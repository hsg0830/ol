@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 문화어발음법')

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
      <span itemprop="name">문화어발음법</span>
      <meta itemprop="position" content="3" />
    </li>
  </ol>
@endsection

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="main">
    <h1 class="page-title">문화어발음법</h1>
    <button class="btn all-ex-btn">
      <i class="fas fa-bars"></i>&nbsp;
      <span>전체해설보기</span>
    </button>

    <div class="introduction">
      <p>위대한 수령 김일성동지께서는 다음과 같이 교시하시였다.</p>
      <p>
        <span>
          《…우리 나라 말은 발음이 매우 풍부합니다. 그렇기때문에 우리 말과 글로써는 동서양의 어떤 나라 말의 발음이든지 거의 마음대로 나타낼수 있습니다.》
        </span>
      </p>
      <p class="text-right">(《김일성전집》32권, 355페지)</p>
    </div>

    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;총&nbsp;칙&nbsp;</span>
      </h2>
      <div class="term">
        <p class="description">
          조선말발음법은 혁명의 수도 평양을 중심지로 하고 평양말을 토대로 하여 이룩된 문화어의 발음에 기준한다.
        </p>
      </div>
    </div>

    <!-- 제1장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제1장.&nbsp;</span>
        모음의 발음
      </h2>
      <!-- 제1항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제1항.&nbsp;</span>모음들이 일정한 자리에서 각각 짧고 높은 소리와 길고 낮은 소리의 차이가 있는것은 있는대로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <th>짧고 높은 소리</th>
                <th>길고 낮은 소리</th>
              </tr>
              <tr>
                <td>밤(낮과 밤)</td>
                <td>밤(밤과 대추)</td>
              </tr>
              <tr>
                <td>곱다(손이 곱다)</td>
                <td>곱다(꽃이 곱다)</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제2항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제2항.&nbsp;</span>《ㅢ》는 겹모음으로 발음하는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">의리, 의무, 의사, 의탁, 의롭다, 의젓하다, 의존하다, 의지하다</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            1) 자음과 결합할 때와 단어의 가운데나 끝에 있는 《ㅢ》는 [ㅣ]로 발음함을 허용한다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">희망[희망/히망], 띄우다[띠우다], 씌우다[씨우다]</td>
              </tr>
              <tr>
                <td class="text-left">결의문[겨릐문/겨리문], 정의[정이], 의의[의이], 회의[회의/회이]</td>
              </tr>
            </table>
          </div>
          <p class="description">2) 속격토로 쓰인 경우 일부 [ㅔ]와 비슷하게 발음함을 허용한다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">혁명의 북소리[혁명에 북쏘리]<br>
                  우리의 집은 당의 품[우리에 지븐 당에 품]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제3항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제3항.&nbsp;</span>《ㅚ》, 《ㅟ》는 어떤 자리에서나 홑모음으로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">외국, 외삼촌, 외지다, 대외사업</td>
              </tr>
              <tr>
                <td class="text-left">위대하다, 위병대, 위하여, 가위</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제4항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제4항.&nbsp;</span>《ㄱ, ㄹ, ㅎ》뒤에 있는 《ㅖ》는 각각 《ㅔ》로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">계속[게속], 계시다[게시다], 관계[관게], 례절[레절],<br>
                  사례[사레], 차례[차레], 혜택[헤택], 은혜[은헤]</td>
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
        첫소리자음의 발음
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제5항.&nbsp;</span>《ㄹ》은 모든 모음앞에서 《ㄹ》로 발음하는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">라지오, 려관, 론문, 루각, 리론, 레루, 용광로</td>
              </tr>
            </table>
          </div>
          <p class="description">그러나 한자말에서 《렬, 률》은 편의상 모음뒤에서는 [열]과 [율]로, 《ㄹ》을 제외한 자음뒤에서는 [녈], [뉼]로 발음한다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">대렬[대열], 규률[규율]</td>
              </tr>
              <tr>
                <td class="text-left">선렬[선녈], 정렬[정녈], 선률[선뉼]</td>
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
        받침자모와 관련한 발음
      </h2>
      <!-- 제6항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제6항.&nbsp;</span>우리 말의 받침소리는 [ㄱ, ㄴ, ㄷ, ㄹ, ㅁ, ㅂ, ㅇ]의 7개이다.
          </h3>
        </div>
      </div>
      <!-- 제7항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제7항.&nbsp;</span>《ㄹ》이 받침소리로 될 때는 혀옆소리로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">갈, 갈매기, 놀다</td>
              </tr>
              <tr>
                <td class="text-left">달과 별, 말과 글, 쌀과 물, 얼른</td>
              </tr>
              <tr>
                <td class="text-left">갈라지다, 달리다, 몰리다, 빨래, 쏠리다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제8항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제8항.&nbsp;</span>받침자모와 받침소리의 호상관계는 다음과 같다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>받침《ㄳ, ㄺ, ㅋ, ㄲ 》의 받침소리는 무성자음앞에서와 발음이 끝날 때에는 [ㄱ]으로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">넋살[넉쌀], 늙다[늑따], 부엌세간[부억세간], 낚시[낙시]</td>
                </tr>
                <tr>
                  <td class="text-left">몫[목], 닭[닥], 동녘[동녁], 밖[박]</td>
                </tr>
              </table>
            </div>
            <p class="description">그러나 동사나 형용사의 말줄기끝의 받침《ㄺ》은 《ㄱ》앞에서 [ㄹ]로 발음한다.</p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">맑고[말꼬], 맑구나[말꾸나], 맑게[말께], 맑기[말끼]</td>
                </tr>
                <tr>
                  <td class="text-left">밝고[발꼬], 밝구나[발꾸나], 밝게[발께], 밝기[발끼]</td>
                </tr>
                <tr>
                  <td class="text-left">붉고[불꼬], 붉구나[불꾸나], 붉게[불께], 붉기[불끼]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>받침《ㅅ, ㅈ, ㅊ, ㅌ, ㅆ》의 받침소리는 무성자음앞에서와 발음이 끝날 때에는 [ㄷ]으로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">잇다[읻따], 잦다[잗따], 닻줄[닫쭐], 밭갈이[받깔이], 있다[읻따]</td>
                </tr>
                <tr>
                  <td class="text-left">옷[옫], 젖[젇], 꽂[꼳], 뭍[묻]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>3)&nbsp;</span>받침《ㄼ, ㄿ, ㅄ, ㅍ》의 받침소리는 무성자음앞에서와 발음이 끝날 때에는 [ㅂ]으로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">넓지[넙찌], 읊다[읍따], 없다[업따], 높다[놉따], 값[갑]</td>
                </tr>
              </table>
            </div>
            <p class="description">그러나 형용사말줄기끝의 받침《ㄼ》은 《ㄱ》앞에서 [ㄹ]로 발음하며 《여덟》은 [여덜]로 발음한다.</p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">넓게[널께], 짧고[짤꼬], 얇기[얄끼], 섧게[설께], 떫구나[떨꾸나]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>4)&nbsp;</span>받침《ㄽ, ㄾ, ㅀ》의 받침소리는 자음앞에서와 발음이 끝날 때에는 [ㄹ]로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">곬빠지기[골빠지기], 핥다[할따], 곯느냐[골르냐], 옳네[올레]</td>
                </tr>
                <tr>
                  <td class="text-left">돐[돌], 곬[골]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>5)&nbsp;</span>받침《ㄻ》의 받침소리는 자음앞에서와 발음이 끝날 때에는 [ㅁ]으로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">젊다[점따], 젊고[점꼬], 삶느냐[삼느냐], 삶네[삼네]</td>
                </tr>
                <tr>
                  <td class="text-left">고결한 삶[∼삼], 죽음과 삶[∼삼]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>6)&nbsp;</span>받침《ㄵ, ㄶ》의 받침소리는 자음앞에서는 [ㄴ]으로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">앉다[안따], 앉고[안꼬], 얹게[언께], 얹느냐[언느냐]</td>
                </tr>
                <tr>
                  <td class="text-left">많다[만타], 많고[만코], 많네[만네]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>7)&nbsp;</span>말줄기끝의 받침《ㅎ》은 단어의 끝소리마디에서와 《ㅅ》이나 《ㄴ》으로 시작된 토앞에서 [ㄷ]처럼 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">히읗[히읃]</td>
                </tr>
                <tr>
                  <td class="text-left">좋소[졷쏘 → 조쏘], 좋니[졷니 → 존니]</td>
                </tr>
                <tr>
                  <td class="text-left">놓네[녿네 → 논네]</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 제4장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제4장.&nbsp;</span>
        받침의 이어내기현상과 관련한 발음
      </h2>
      <!-- 제9항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제9항.&nbsp;</span>모음앞에 있는 받침은 뒤소리마디의 첫소리로 이어서 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>모음으로 시작되는 토나 뒤붙이앞에 있는 받침은 이어서 발음한다. 둘받침의 경우는 왼쪽받침을 받침소리로, 오른쪽받침을 뒤모음의 첫소리로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">높이[노피], 삼발이[삼바리]</td>
                </tr>
                <tr>
                  <td class="text-left">몸에[모메], 밭으로[바트로], 꽃을[꼬츨]</td>
                </tr>
                <tr>
                  <td class="text-left">젖어서[저저서], 갔었다[가썯따], 씻으며[씨스며]</td>
                </tr>
                <tr>
                  <td class="text-left">닭을[달글], 곬이[골시], 값에[갑쎄]</td>
                </tr>
                <tr>
                  <td class="text-left">맑은[말근], 밟아[발바], 읊어[을퍼], 젊은이[절므니]</td>
                </tr>
              </table>
            </div>
            <p class="description">그러나 부름을 나타내는 토《-아》앞에서 받침은 끊어서 발음한다.</p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">벗아[벋아 → 버다], 꽃아[꼳아 → 꼬다]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>한자말에서 모음앞에 놓이는 받침은 모두 이어서 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">검열[거멸], 답안[다반], 국영[구경], 월요일[워료일]</td>
                </tr>
                <tr>
                  <td class="text-left">8.15[파리로], 3.14[사밀싸]</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 제5장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제5장.&nbsp;</span>
        받침의 끊어내기현상과 관련한 발음
      </h2>
      <p class="description">끊어내기는 받침자모를 발음을 끝낼 때의 받침소리로 바꾸고 뒤의 모음에 이어서 발음한다. 받침자모와 받침소리의 대응관계는 제9항과 같다.</p>
      <!-- 제10항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제10항.&nbsp;</span>모음《아, 어, 오, 우, 애, 외》로 시작한 고유어말뿌리앞에 있는 받침은 끊어서 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">부엌안[부억안 → 부어간], 넋없다[넉업따 → 너겁따]</td>
              </tr>
              <tr>
                <td class="text-left">옷안[옫안 → 오단], 첫애기[첟애기 → 처대기],<br>
                  젖어머니[젇어머니 → 저더머니], 닻올림[닫올림 → 다돌림]</td>
              </tr>
              <tr>
                <td class="text-left">무릎우[무릅우 → 무르부]</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            《있다》앞에 오는 받침들도 끊어서 발음한다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">값있는[갑읻는 → 가빈는]</td>
              </tr>
            </table>
          </div>
          <p class="description">그러나 《맛있다》, 《멋있다》는 이어내여 발음함을 허용한다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">맛있다[마싣따/마딛따], 멋있게[머싣께/머딛께]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제11항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제11항.&nbsp;</span>단어들이 결합관계로 되여있는 경우에도 앞단어가 받침으로 끝나고 뒤단어가 모음으로 시작될 때에는 끊어서 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">팥 아홉키로[팥 아홉키로], 짚 열단[집 열딴],<br>
                  옷 열한벌[옫 여란벌], 첫 의정[첟 의정 / 처 듸정]</td>
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
        된소리현상과 관련한 발음
      </h2>
      <!-- 제12항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제12항.&nbsp;</span>[ㄱ, ㄷ, ㅂ]으로 나는 받침소리뒤에 오는 순한소리는 된소리로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">국밥[국빱], 맏사위[맏싸위], 곱돌[곱똘]</td>
              </tr>
              <tr>
                <td class="text-left">흙밥[흑빱], 꽃밥[꼳빧], 없다[업따], 밟기[밥끼]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제13항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제13항.&nbsp;</span>동사나 형용사의 말줄기끝의 받침《ㄴ, ㄵ, ㄻ, ㅁ》과 《ㄹ》로 발음되는 받침《ㄺ, ㄼ, ㄾ》뒤에 오는 토나 뒤붙이의 순한소리는 된소리로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">(아기를)안다[안따], 안고[안꼬], 안기[안끼]</td>
              </tr>
              <tr>
                <td class="text-left">앉다[안따], 앉고[안꼬], 앉기[안끼]</td>
              </tr>
              <tr>
                <td class="text-left">옮다[옴따], 옮고[옴꼬], 옮기[옴끼]</td>
              </tr>
              <tr>
                <td class="text-left">(나무를)심다[심따], 심고[심꼬], 심기[심끼]</td>
              </tr>
              <tr>
                <td class="text-left">굵게[굴께], 얇고[얄꼬], 훑다[훌따], 핥기[할끼]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제14항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제14항.&nbsp;</span>다음과 같은 경우에 《ㄹ》받침뒤에 순한소리는 된소리로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>한자말에서 뒤의 순한소리가 《ㄷ, ㅅ, ㅈ》인 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">발동[발똥], 결실[결씰], 발전[발쩐]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>일부 고유어로 된 보조적단어가 《ㄹ》뒤에 오는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">열개[열깨], 여덟그루[여덜끄루], (집)열동[열똥]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>3)&nbsp;</span>규정토《ㄹ》의 뒤에 오는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">들것[들껃], 갈데[갈떼], 갈 사람[갈싸람]</td>
                </tr>
                <tr>
                  <td class="text-left">들가[들까], 올지[올찌], 볼듯[볼뜯]</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 제15항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제15항.&nbsp;</span>일부 한자말들에서 《적(的), 성(性), 법(法), 권(權, 眷), 점(點), 건(件), 가(價), 과(課, 果)》등의 한자말은 일부 제한하여 된소리로
            발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">당적[당쩍], 시적[시쩍]</td>
              </tr>
              <tr>
                <td class="text-left">혁명성[형명썽], 전투성[전투썽]</td>
              </tr>
              <tr>
                <td class="text-left">헌법[헌뻡], 료법[료뻡]</td>
              </tr>
              <tr>
                <td class="text-left">주권[주꿘], 구매권[구매꿘]</td>
              </tr>
              <tr>
                <td class="text-left">사건[사껀], 조건[조껀]</td>
              </tr>
              <tr>
                <td class="text-left">물가[물까], 시가[시까]</td>
              </tr>
              <tr>
                <td class="text-left">내과[내꽈], 외과[외꽈], 자재과[자재꽈]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제16항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제16항.&nbsp;</span>단어나 단어결합에서 사이소리가 순한소리앞에 끼여나는 경우는 그 순한소리를 된소리로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              사이소리가 끼우지 않는 경우:
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">된벼락, 센바람, 봄가을, 날바다, 별세계</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              사이소리가 끼우는 경우:
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">논두렁[논뚜렁], 손가락[손까락], 손등[손뜽], 안사람[안싸람]</td>
                </tr>
                <tr>
                  <td class="text-left">전주대[전주때], 나루가[나루까], 강가[강까], 그믐달[그믐딸]</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 제17항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제17항.&nbsp;</span>말줄기의 끝받침《ㅎ》, 《ㄶ》, 《ㅀ》뒤에 오는 토의 순한소리《ㅅ》은 된소리로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">좋소[졷쏘], 많습니다[만씀니다], 옳소[올쏘]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제7장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제7장.&nbsp;</span>
        《ㅎ》과 어울린 거센소리되기현상과 관련한 발음
      </h2>
      <!-- 제18항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제18항.&nbsp;</span>토나 뒤붙이의 첫머리에 온 순한소리는 말줄기의 끝받침 《ㅎ, ㄶ, ㅀ》뒤에서 거센소리로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">좋다[조타], 좋고[조코], 좋지[조치]</td>
              </tr>
              <tr>
                <td class="text-left">많다[만타], 많고[만코], 많지[만치]</td>
              </tr>
              <tr>
                <td class="text-left">옳다[올타], 옳고[올코], 옳지[올치]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제19항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제19항.&nbsp;</span>한 단어안에서 받침 《ㄱ, ㄷ, ㅂ, ㅈ》이나 《ㄵ, ㄺ, ㄼ》뒤에 《ㅎ》이 올 때 그 《ㅎ》은 각각 [ㅋ, ㅌ, ㅍ, ㅊ]으로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">먹히다[머키다], 특히[트키], 딱하다[따카다], 역할[여칼],<br>
                  맏형[마텽], 잡히다[자피다], 맺히다[매치다], 꽂히다[꼬치다]</td>
              </tr>
              <tr>
                <td class="text-left">앉혔다[안쳗따], 얹히다[언치다], 밝혔다[발켣따], 밝히다[발키다],<br>넓혔다[널펻따], 밟히다[발피다]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제8장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제8장.&nbsp;</span>
        닮기현상이 일어날 때의 발음
      </h2>
      <!-- 제20항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제20항.&nbsp;</span>받침 《ㄷ, ㅌ, ㄾ》뒤에 토나 뒤붙이인 《이》가 올 때 그 《이》는 각각 [지, 치]로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">가을걷이[가을거지], 굳이[구지], 해돋이[해도지], 같이[가치], 붙이다[부치다], 핥이다[할치다]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제21항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제21항.&nbsp;</span>받침《ㄱ, ㄳ, ㅋ, ㄲ》, 《ㄷ, ㅅ, ㅈ, ㅊ, ㅌ, ㅆ》, 《ㄼ, ㅂ, ㅄ, ㅍ》뒤에 자음《ㄴ, ㅁ, ㄹ》이 이어질 때에는 다음과 같이 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>받침《ㄱ, ㄳ, ㅋ, ㄲ》은 [ㅇ]으로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">익는다[잉는다], 격멸[경멸], 식료품[싱뇨품/싱료품], 몫나눔[몽나눔],<br>
                    동녘노을[동녕노을], 부엌문[부엉문], 닦네[당네]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>받침《ㄷ, ㅅ, ㅈ, ㅊ, ㅌ, ㅆ》은 [ㄴ]으로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">받는다[반는다], 맏며느리[만며느리], 웃느냐[운느냐],<br>
                    옷매무시[온매무시], 젖먹이[전머기], 꽃눈[꼰눈],<br>
                    밭머리[반머리], 있는것[인는걷]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>3)&nbsp;</span>받침《ㄼ, ㅂ, ㅄ, ㅍ》은 [ㅁ]으로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">밟는다[밤는다], 법령[볌령], 없는것[엄는걷], 앞마을[암마을]</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 제22항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제22항.&nbsp;</span>받침《ㄹ》뒤에 《ㄴ》이 왔거나 받침 《ㄴ》뒤에 《ㄹ》이 올 때에는 그 《ㄴ》을 [ㄹ]로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">들놀이[들로리], 물농사[물롱사], 별나라[별라라], 살눈섭[살룬섭]</td>
              </tr>
              <tr>
                <td class="text-left">근로자[글로자], 본래[볼래], 천리마[철리마], 난로[날로], 진리[질리], 원리[월리], 권리[궐리]</td>
              </tr>
            </table>
          </div>
          <p class="description">그러나 형태부들의 경계에서는 뒤의 《ㄹ》을 《ㄴ》으로 발음한다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">순리익[순니익], 발전량[발쩐냥]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제23항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제23항.&nbsp;</span>받침《ㄴ》뒤에 《ㄴ》이 올 때에는 적은대로 발음하는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">눈나비, 단내, 분노, 신념, 안내</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제24항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제24항.&nbsp;</span>받침소리[ㅁ, ㅇ]뒤에서 《ㄹ》은 [ㄴ]으로 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">목란[몽난], 백로주[뱅노주]</td>
              </tr>
            </table>
          </div>
          <p class="description">그러나 모음 《ㅑ, ㅕ, ㅛ, ㅠ》의 앞에서는 [ㄴ] 또는 [ㄹ]로 발음할수도 있다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">식량[싱냥/싱량], 협력[혐녁/혐력]</td>
              </tr>
              <tr>
                <td class="text-left">식료[싱뇨/싱료], 청류벽[청뉴벽/청류벽]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제9장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제9장.&nbsp;</span>
        소리끼우기현상과 관련한 발음
      </h2>
      <!-- 제25항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제25항.&nbsp;</span>고유어가 들어가 만들어진 합친말(또는 앞붙이와 말뿌리가 어울린 단어)의 뒤형태부가 《이, 야, 여, 요, 유》로 시작되는 경우에는 다음과 같이 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>앞형태부가 자음으로 끝날 때에는 형태부사이에 [ㄴ]을 끼워 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">논일[논닐], 밭일[반닐], 꽃잎[꼰닙], 안팎일[안팡닐], 옛일[옌닐],<br>낯익은[난니근], 못잊을[몬니즐], 짓이기다[진니기다]</td>
                </tr>
                <tr>
                  <td class="text-left">들양[들냥 → 들량], 산양[산냥]</td>
                </tr>
                <tr>
                  <td class="text-left">불여우[불녀우 → 불려우]</td>
                </tr>
                <tr>
                  <td class="text-left">눈요기[눈뇨기]</td>
                </tr>
                <tr>
                  <td class="text-left">풋윷[푼뉻]</td>
                </tr>
              </table>
            </div>
          </div>
          <p class="description">그러나 《있다》의 경우는 제10항에 준하여 끊어내기로 발음한다.</p>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>앞형태부가 모음으로 끝날 때에는 사이소리가 끼우는 경우에 한하여 [ㄴㄴ]을 끼워 발음한다.
            </h4>
            <p class="description">사이소리가 끼우지 않는 경우:</p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">나라일, 바다일, 베개잇</td>
                </tr>
              </table>
            </div>
            <p class="description">사이소리가 끼우는 경우:</p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">수여우[순녀우], 수양[순냥]</td>
                </tr>
                <tr>
                  <td class="text-left">아래이[아랜니]</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 제26항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제26항.&nbsp;</span>《암, 수》가 들어가 만들어진 단어의 발음은 다음과 같이 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>1)&nbsp;</span>뒤형태부의 첫소리가 《ㄱ, ㄷ, ㅂ, ㅈ》인 경우는 [ㅋ, ㅌ, ㅍ, ㅊ]의 거센소리로 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">암돼지[암퇘지], 수강아지[수캉아지], 수병아리[수평아리]</td>
                </tr>
                <tr>
                  <td class="text-left">암기와[암키와], 수돌쩌귀[수톨쩌귀]</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>2)&nbsp;</span>그밖의 경우 앞형태부가 《수》이면 사이소리를 끼워 발음한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">수사자[숟사자 → 수싸자], 수소[숟소 → 수쏘]</td>
                </tr>
                <tr>
                  <td class="text-left">수나비[숟나비 → 순나비], 수오리[숟오리 → 수도리]</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 제27항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제27항.&nbsp;</span>고유어로 만들어지는 일부 합친말이나 단어결합에서 사이소리가 끼여나는 경우는 형태부들사이에 《ㄷ》을 끼워 발음한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">강가[강ㄷ가 → 강까], 길가[길ㄷ가 → 길까]</td>
              </tr>
              <tr>
                <td class="text-left">바다가[바닫가 → 바다까], 수도가[수돋가 → 수도까],</td>
              </tr>
              <tr>
                <td class="text-left">뒤문[뒫문 → 뒨문], 뒤사람[뒫사람 → 뒤싸람]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제10장 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제10장.&nbsp;</span>
        약화 또는 빠지기 현상과 관련한 발음
      </h2>
      <!-- 제28항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제28항.&nbsp;</span>말줄기끝의 《ㅎ》은 모음으로 시작된 토나 뒤붙이앞에서 발음하지 않는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">낳아[나아], 낳으니[나으니]<br>
                  닿아[다아], 많아[만아 → 마나], 싫어[실어 → 시러]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제29항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제29항.&nbsp;</span>소리마디의 첫소리《ㅎ》은 모음이나 울림자음뒤에서 약하게 발음할수 있다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">마흔, 아흐레, 안해, 열흘, 부지런히, 확실히, 험하다, 말하다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 제30항 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>제30항.&nbsp;</span>둘받침《ㅀ》으로 끝나는 말줄기에 《ㄴ》으로 시작되는 토가 이어질 때 《ㅎ》은 받침소리로 내지 않는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">옳네[올레], 싫네[실레], 곯느니라[골르니라]</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            《ㄶ》으로 끝나는 말줄기에 《ㄴ》으로 시작되는 토가 이어질 때의 《ㅎ》도 받침소리로 내지 않는다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">[제8항 6조 참조]</td>
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
