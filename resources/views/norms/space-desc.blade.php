@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 띄여쓰기규정해설')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/norm.css')}}">
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
      <a itemprop="item" href="{{ route('norms', 'index')}}">
        <span itemprop="name">규범원문</span>
      </a>
      <meta itemprop="position" content="2" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name">띄여쓰기규정해설</span>
      <meta itemprop="position" content="3" />
    </li>
  </ol>
@endsection

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="main">
    <h1 class="page-title">띄여쓰기규정해설</h1>
    <button class="btn all-ex-btn">
      <i class="fas fa-bars"></i>&nbsp;
      <span>전체해설보기</span>
    </button>

    <!-- 총칙 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;총&nbsp;칙&nbsp;</span>
      </h2>
      <div class="term">
        <p class="description">단어를 단위로 띄여쓰는것을 원칙으로 하되 글을 읽고 리해하기 쉽게 일부 경우에는 붙여쓴다.</p>
        <p class="description">총칙에서는 띄여쓰기규정의 6개 항에 관통되고있는 기본원칙을 밝혀주고있다.</p>
      </div>
      <!-- 첫째로 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>첫째로,&nbsp;</span>단어를 단위로 띄여쓰는것을 원칙으로 한다고 규정하였다.</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">
            단어를 단위로 띄여쓰는것을 《원칙》으로 한다고 한 규정은 두가지 내용을 담고있다.<br />
            하나는 일정한 어휘적뜻을 가지고 하나의 대상, 행동, 상태를 나타내는 단어는 그것을 단위로 하여 띄여쓴다는것이고 다른 하나는 하나의
            《단어》라고 하기 어려운것도 붙여쓰는 경우가 있다는것이다.
          </p>
        </div>
      </div>
      <!-- 둘째로 -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>둘째로,&nbsp;</span>글을 읽고 리해하기 쉽게 일부 경우에는 붙여쓴다고 규정하였다.</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">
            일정한 어휘적뜻을 가지고 하나의 대상, 행동, 상태를 나타내는 단어를 단위로 하여 띄여쓰는것이 원칙이나 글을 읽거나 글의 뜻을 리해하는데
            불편을 주는 경우에는 붙여쓸수도 있다는것이다.<br />
            실례로 자립성이 적은 불완전명사를 품사나 토에 관계없이 앞단위에 붙여쓰는 경우, 고유한 대상의 명칭이나 학술용어도 여러개의 단어들이
            이러저러한 형태로 결합되였으나 하나의 대상으로 붙여쓰는 경우 등을 말한다.
          </p>
        </div>
      </div>
    </div>

    <!-- 제1항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제1항.&nbsp;</span>
        토뒤의 단어나 품사가 서로 다른 단어는 띄여쓴다.
      </h2>
      <p class="description">
        1항은 띄여쓰기규정의 기본항의 하나로서 총칙의 첫째 내용인 《단어를 단위로 띄여쓰는것을 원칙으로 한다.》는 내용을 따른 항이다.
      </p>

      <!-- 1) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title"><span>1)&nbsp;</span>토뒤의 단어는 띄여쓴다.</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">토는 단어의 문법적형태를 이루는 덧붙이로서 문장속에서 단어들사이의 관계를 나타낸다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">
                  선군정치<span class="underline">는</span> 민족<span class="underline">의</span> 자주성<span class="underline">을</span> 위한
                  필승<span class="underline">의</span> 보검이<span class="underline">다</span>.
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  하나<span class="underline">에</span> 하나<span class="underline">를</span> 합하<span class="underline">면</span> 더 큰
                  하나<span class="underline">가</span> 된<span class="underline">다</span>.
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  건설<span class="underline">을</span> 하<span class="underline">다</span>, 가슴<span class="underline">이</span> 뜨겁<span
                    class="underline"
                    >다</span
                  >, 꿈<span class="underline">을</span> 꾸<span class="underline">다</span>
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  저녁<span class="underline">을</span> 먹<span class="underline">은</span> 후<span class="underline">에</span> 보<span class="underline">자</span>.
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  일<span class="underline">을</span> 시작하<span class="underline">기</span> 전<span class="underline">에</span> 준비작업<span
                    class="underline"
                    >을</span
                  >
                  빈틈없이 해<span class="underline">야</span> 한다.
                </td>
              </tr>
            </table>
          </div>

          <div class="auxiliary">
            <p class="description">
              ※학술용어에서 고유한 명칭 즉 일정한 정리나 법칙 등과 같은 용어에서 사람, 나라, 지역의 이름 등의 뒤에 속격토 《의》가 올 때에는 그
              뒤단어를 띄여쓴다.
            </p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">
                    옴<span class="underline">의</span> 법칙, 피타고라스<span class="underline">의</span> 정리, 뉴톤<span class="underline"
                      >의</span> 제3법칙
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- 2) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title"><span>2)&nbsp;</span>품사가 서로 다른 단어는 띄여쓴다.</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">
            품사는 단어들을 어휘적인 뜻과 문법적특성의 공통성에 따라 묶은 단어들의 부류로서 품사가 다르다는것은 곧 다른 단어라는것을 말해준다.<br />
            그러므로 서로 다른 품사는 문장속에서 맺는 관계도 같지 않다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left"><span class="underline">두 대학생</span>의 아름다운 소행 (수사＋명사)</td>
              </tr>
              <tr>
                <td class="text-left"><span class="underline">온갖 새</span>들이 찾아드는 숲 (관형사＋명사)</td>
              </tr>
              <tr>
                <td class="text-left"><span class="underline">온 도</span>가 떨쳐나섰다. (관형사＋명사)</td>
              </tr>
            </table>
          </div>
          <p class="description">※관형사의 띄여쓰기는 2항[참고]《관형사의 띄여쓰기는 다음과 같이 한다.》를 참고하시오.</p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">전쟁시기 <span class="underline">잘 싸운</span> 로병부부 (부사＋동사)</td>
                </tr>
                <tr>
                  <td class="text-left"><span class="underline">아, 얼마나</span> 아름다운 마을인가. (감동사＋부사)</td>
                </tr>
              </table>
            </div>
          <div class="auxiliary">
            <p class="description">
              <span class="complement">참고</span>
              부사파생형 《이, 히》뒤에 오는 《하다, 되다, 시키다》는 띄여쓴다.
            </p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">공고히 하다, 알뜰히 하다, 깨끗이 되다, 철저히 시키다, 말끔히 시키다</td>
                </tr>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- 제2항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제2항.&nbsp;</span>
        하나의 대상이나 행동, 상태를 나타내는 말마디는 토가 끼이였거나 품사가 달라도 붙여쓴다.
      </h2>
      <p class="description">
        2항은 1항의 규정내용을 뒤집어놓은듯 한감을 주는 규정내용이라고 할수 있으나 본질은 총칙의 첫째 내용인 《단어를 단위로 띄여쓰는것을 원칙으로
        한다》는 내용을 따른 항으로서 단어와 단어사이에 토가 끼이였거나 품사가 서로 다른 단어라도 결합하여 하나의 단어나 《단어》처럼 된것은
        붙여쓰게 규정한 항이다.
      </p>

      <!-- 1) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title"><span>1)&nbsp;</span>토가 없이 이루어져 하나의 대상, 행동, 상태를 나타내는 경우</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <!-- (1) -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>(1)&nbsp;</span>같은 품사에 속하는 단어들이 토가 없이 결합되여 하나의 대상, 행동, 상태를 나타내는 경우에는 붙여쓴다.
            </h4>
            <!-- ① -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>①&nbsp;</span>같은 명사끼리 토가 없이 결합되여 하나의 대상을 나타낼 때에는 붙여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">
                      선군혁명로선, 군사중시사상, 조선민족제일주의, 사회주의건설, 총대중시사상, 반제자주력량, 사상기술문화혁명,
                      사회주의경제강국건설, 물고기잡이전투, 오늘모임, 오전회의, 로동계급출신간부, 사양공처녀, 공장로동자, 국어교원. 학교건물크기,
                      가스탕크용적, 강냉이밭면적, 굴뚝높이, 동판무게, 경기장넓이
                    </td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">학교앞에, 집뒤에, 처마끝에, 인민대중속에, 대문밖에, 일제때, 극장안에, 지붕우에, 마루아래, 방가운데</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">최신형설비, 조선식사회주의, 만성대장염, 혁명적군인정신, 학생용가방, 고위급대표단</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">
                      평양부근, 아시아지역, 량강도일대, 청진시주변, 두만강류역, 압록강연안, 백두산기슭, 유럽지대, 아프리카대륙, 조선반도,
                      재령평야, 태백산줄기, 연백벌
                    </td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">
                      조선사람, 꾸바인민, 평양시민, 선교구역주민(로동자, 사람), 조선청년, 만병초향기, 은방울꽃송이, 청산리정신
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- ② -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>②&nbsp;</span>명사들이 토없이 결합된 단위뒤에 오는 《부문, 분야, 기관, 담당, 관계, 이상…》 등은 앞의 단위에 붙여쓰고 그뒤는
                띄여쓴다.(기관, 부서, 직제의 이름과 결합될 때에도 같은 방식으로 처리한다.)
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">
                      농촌경리부문 일군들<br />
                      사회과학부문 급수사정위원회<br />
                      행정경제분야 책임일군들<br />
                      국토건설기관 사업실태<br />
                      륙상담당 책임부원<br />
                      수학담당 교원<br />
                      교육사업담당 부위원장<br />
                      하부담당 부원<br />
                      ○○부 공장담당 지도과<br />
                      유엔특별정치문제담당 부사무총장<br />
                      사회과목관계 교원들<br />
                      소대장이상 일군들<br />
                      스무살이하 처녀들
                    </td>
                  </tr>
                </table>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">참고1</span>
                  《부문, 분야, 기관, 담당, 관계, 이상…》 등이 겹쳐쓰인 경우에는 그것들사이는 붙여쓰고 마지막에 오는 단위와만 띄여쓴다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">
                        <span class="underline">관계부문</span> 일군들, 농업<span class="underline">관계기관</span> 성원들, 공업<span
                          class="underline"
                          >부문담당</span> 지도원들
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">참고2</span>
                  《부문, 분야, 기관, 담당, 관계, 이상…》 등이 앞에 놓이면서 뒤단어와 결합하여 하나의 대상으로 될 때에는 붙여쓴다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">
                        부문위원회, 기관책임자, 관계기관, 담당기대공, 선전부 담당부원, 관계부서, 기관잡지, 부문과학 담당제, 기관판매
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- ③ -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>③&nbsp;</span>앞의 명사를 다시 받는다고 할수 있는 《자신, 자체, 전체, 전부, 전원, 일행, 일가, 일동…》은 앞단위에 붙여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">
                      기사장<span class="underline">자신</span>이 만들었다.<br />
                      로동자<span class="underline">전체</span>가 일떠섰다.<br />
                      학생<span class="underline">전원</span>이 참가했다.<br />
                      박사<span class="underline">일가</span>는 오늘도 모여앉았다.<br />
                      답사자<span class="underline">일행</span>은 휴식도 없이 걸었다.<br />
                    </td>
                  </tr>
                </table>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">보충1</span>
                  부사 《모두, 스스로》도 우와 같이 처리한다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">
                        학생들<span class="underline">스스로</span>가 보초병이 되였다.<br />
                        토론자<span class="underline">모두</span>가 말하였다.
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">보충2</span>
                  대명사의 뒤에서도 우와 같이 처리한다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">
                        나<span class="underline">자신</span>, 그<span class="underline">자신</span>, 우리<span class="underline">자신</span>,
                        당신<span class="underline">자신</span>, 그들<span class="underline">자신</span>, 그들<span class="underline">전체</span>,
                        우리들<span class="underline">전체</span>, 나<span class="underline">자체</span>, 그<span class="underline">자체</span>,
                        너<span class="underline">자체</span>, 우리<span class="underline">모두</span>, 그들<span class="underline">모두</span>,
                        우리<span class="underline">스스로</span>, 제<span class="underline">스스로</span>, 우리<span class="underline">일행</span>,
                        그들<span class="underline">일가</span>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- ④ -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>④&nbsp;</span>두개이상의 단어가 겹치거나 잇달리여 하나로 녹아붙어 하나의 대상이나 현상을 나타낼 때에는 붙여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">집집, 순간순간, 구석구석, 아침저녁</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">
                      서로서로, 거듭거듭, 모두모두, 골고루, 고루고루, 더욱더, 더더욱, 모두다, 더한층, 한층더, 다같이, 또다시, 똑같이, 가로세로,
                      이리저리, 그럭저럭, 허둥지둥, 띄염띄염, 곧이곧대로
                    </td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">하나하나, 하나씩하나씩, 열백번, 천번만번, 억천만번</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">누구누구, 이곳저곳, 네것내것, 그나저나, 너도나도, 네일내일, 이도그도, 무엇무엇, 여기저기</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- (2) -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>(2)&nbsp;</span>서로 다른 품사가 토가 없이 결합되여 하나의 대상, 행동, 상태를 나타내는 경우에도 붙여쓴다.
            </h4>
            <!-- ① -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title"><span>①&nbsp;</span>서로 다른 품사가 토가 없이 결합되여 하나의 대상을 나타내는 경우</h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">
                      2중영웅, 1211고지, 1호발전기, 3000t급짐배, 3년석달, 7개년계획, 2중3대혁명붉은기, 백날기침, 열두삼천리벌, 세벌김, 네발짐승
                    </td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">
                      척척박사, 갑작부자, 산들바람, 만세소리, 살짝공, 차렷자세, 꽥소리, 쏠라닥장난, 으스름달밤, 먼저주, 먼저달
                    </td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">새벽갈이, 한결같이, 심장깊이, 가슴뜨거이, 가슴뿌듯이, 아무말없이, 불길높이, 기치높이</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">세손가락울림법, 미리덥히기, 갑작변이, 나도국수나무, 끝소리법칙</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">새날, 새서방, 온종일, 별말씀, 총지휘자, 총참모부, 옛이야기</td>
                  </tr>
                </table>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">참고</span>
                  관형사의 띄여쓰기는 다음과 같이 한다.
                </p>
                <p class="description">
                  일부 관형사들이 앞붙이적으로 쓰이면서 합친말의 구성부분으로 되는것과 관련하여 그 처리에서 몇가지 방법을 취하고있다.
                </p>
                <p class="description indent">
                  <span class="indent__mark">－</span>
                  외마디관형사와 외마디명사가 결합하여 하나의 단어로 되는 률이 높다는 점을 고려하여 이런 경우에는 붙여쓰는것을 원칙으로 하되
                  외마디관형사가 앞붙이적으로 쓰이지 않고 관형사적기능이 뚜렷하며 붙여쓰면 합친말의 뜻이 달라지거나 단어결합이 어색할 경우에는
                  외마디명사의 앞에 오는 외마디관형사도 띄여쓴다.
                </p>
                <div class="example">
                  <table>
                    <tr>
                      <td class="text-left">온몸, 온넋, 온통, 매해, 매번, 귀국, 전국, 각국, 각개, 각당, 각파</td>
                    </tr>
                  </table>
                </div>
                <div class="example">
                  <table>
                    <tr>
                      <td class="text-left">
                        영화의 <span class="underline">매</span> 부마다 자기 생리가 있다.<br />
                        <span class="underline">매</span> 부(과)마다 한사람씩 나오시오.<br />
                        <span class="underline">매</span> 음마다 하나씩 올리시오.<br />
                        졸업생 <span class="underline">매</span> 기마다 최우수생이 나왔다.<br />
                        <span class="underline">각</span> 도에서 올라온 지원물자
                      </td>
                    </tr>
                  </table>
                </div>
                <p class="description indent">
                  <span class="indent__mark">－</span>
                  외마디관형사가 두마디이상의 명사와 결합했을 때, 두마디이상의 관형사와 외마디명사나 두마디이상의 명사가 결합했을 때에는
                  띄여쓴다.
                </p>
                <div class="example">
                  <table>
                    <tr>
                      <td class="text-left">
                        매 <span class="underline">분기</span>, 웬 <span class="underline">손님</span>, <span class="underline">모든</span> 집에,
                        <span class="underline">어느</span> 부락
                      </td>
                    </tr>
                  </table>
                </div>
                <p class="description">
                  그러나 현행사전에 올림말로 올라있는 관형사와 결합된 단어는 《조선말대사전》(1992년판 사회과학출판사)에 준하여 처리한다.
                </p>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">보충1</span>
                  관형사 《어느, 여느, 여러, 오른, 바른》과 앞붙이 《왼》은 다음과 같이 처리한다.
                </p>
                <p class="description indent">
                  <span class="indent__mark">○</span>
                  관형사 《어느, 여느》가 《해, 달, 날, 곳, 때》와 결합되였을 때에는 붙여쓴다.
                </p>
                <div class="example">
                  <table>
                    <tr>
                      <td class="text-left">어느해, 어느날, 어느달, 어느때, 어느곳, 여느해, 여느날, 여느달, 여느때, 여느곳</td>
                    </tr>
                  </table>
                </div>
                <p class="description indent">
                  <span class="indent__mark">○</span>
                  관형사 《여러》는 단위명사나 단위명사적으로 쓰이는 외마디명사와는 붙여쓰고 두마디명사에서는 《차례》, 《가지》와만 붙여쓴다.
                </p>
                <div class="example">
                  <table>
                    <tr>
                      <td class="text-left">여러곳, 여러해, 여러날, 여러달, 여러개, 여러번, 여러알, 여러대</td>
                    </tr>
                  </table>
                </div>
                <div class="example">
                  <table>
                    <tr>
                      <td class="text-left">여러가지, 여러차례</td>
                    </tr>
                  </table>
                </div>
                <p class="description indent">
                  <span class="indent__mark">○</span>
                  관형사 《오른(바른)》과 앞붙이 《왼》이 인체기관의 이름과 어울려 쓰이는 경우에는 붙여쓴다.
                </p>
                <div class="example">
                  <table>
                    <tr>
                      <td class="text-left">오른손, 왼팔, 왼귀, 오른눈, 바른손, 바른팔</td>
                    </tr>
                  </table>
                </div>
                <p class="description">《왼쪽, 오른쪽》도 우와 같이 처리한다.</p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">오른쪽가슴, 왼쪽다리</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">보충2</span>
                  부사 《일단》과 명사 《전체, 일부, 소수, 극소수, 력대, 해당, 각종, 각급》 등은 관형사적으로 처리하여 명사의 앞에서 띄여쓴다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left"><span class="underline">일단</span> 유사시, <span class="underline">전체</span> 성원들, <span class="underline">소수</span> 자본가들, <span class="underline">극소수</span> 반동들, <span class="underline">력대</span> 통치배들, <span class="underline">해당</span> 일군들, <span class="underline">각종</span> 식기류, <span class="underline">각급</span> 학교들에서</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">보충3</span>
                  한자말관형사 《신, 구, 주, 대, 수수》는 앞붙이적으로 쓰이는 때가 많으므로 관형사로 처리하지 않고 단어조성적앞붙이로 보고 뒤에 오는 단위와 붙여쓴다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">신식민주의, 구시대, 대조선정책, 주유엔대표부, 수수천년</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- ② -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>②&nbsp;</span>시간과 공간의 뜻을 추상적으로 나타내는 고유어명사 《앞, 옆, 뒤, 끝, 속, 밖, 안, 우, 아래, 밑, 사이(새), 때, 제, 곁, 길, 군데, 해, 날, 달, 낮, 밤, 곳, 가운데》 등이 토없는 대명사, 수사와 결합되여 하나의 대상이나 현상을 나타낼 때 붙여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">그날, 이달, 이밤, 그길로, 그해, 그새, 그가운데, 스물아래, 세해, 두밤, 다섯가운데</td>
                  </tr>
                </table>
              </div>
              <p class="description">명사 《전, 후, 년, 놈, 녀석》도 우와 같이 처리한다.</p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">그전, 그후, 그년, 세년, 그녀석, 두놈, 이놈
                    </td>
                  </tr>
                </table>
              </div>
              <p class="description">명사 《다음, 동안》은 대명사 《이, 그》뒤에서는 붙여쓴다.</p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">이다음, 그다음, 그동안, 이동안
                    </td>
                  </tr>
                </table>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">보충1</span>
                  불완전명사 《자, 분, 이》는 불완전명사대로 처리한다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">비겁한<span class="underline">자</span>야 갈라면 가라.
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left">위대한<span class="underline">분</span>의 손길아래서 영웅으로 자랐다.
                      </td>
                    </tr>
                    <tr>
                      <td class="text-left">나이많은<span class="underline">이</span>들은 그 자리에 앉으십시오.
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">보충2</span>
                  복수토 《들》은 뒤붙이처럼 처리하여 그뒤에 오는 단어는 붙여쓴다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">그들가운데, 인민들속에서, 학생들사이
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- 동그라미 3 -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>③&nbsp;</span>서로 다른 품사가 토가 없이 결합되여 하나의 행동, 상태를 나타내는 경우
              </h5>
              <p class="description indent">
                <span class="indent__mark">－</span>
                토없는 명사에 《하다, 되다, 시키다, 지다, 답다, 거리다, 겹다, 맞다, 궂다, 적다, 어리다》가 직접 결합되여 하나의 행동, 상태를 나타내는것은 붙여쓴다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">건설하다, 겨냥하다, 나무하다, 이신작칙하다, 영광찬란하다, 선발배치하다, 각성되다, 구현되다, 참되다, 창설되다, 공고발전되다, 조직전개되다, 각성시키다, 동원시키다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">값지다, 외지다, 그늘지다, 장마지다, 언덕지다, 모지다, 살지다, 얼룩지다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">꽃답다, 남자답다, 녀성답다, 일군답다, 인민군대답다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">반짝거리다, 얼른거리다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">흥겹다, 눈물겹다, 역겹다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">방정맞다, 능청맞다, 때맞다, 빗맞다, 설맞다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">험상궂다, 짖궂다, 심술궂다, 곰살궂다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">멋적다, 열적다, 객적다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">기쁨어리다, 애어리다, 정기어리다</td>
                  </tr>
                </table>
              </div>
              <p class="description indent">
                <span class="indent__mark">－</span>
                토없는 명사에 《하다, 되다, 시키다…》외의 동사, 형용사가 어울려 하나의 행동, 상태를 나타내는것은 붙여쓴다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">꿈꾸다, 춤추다, 잠자다, 짐지다, 숨쉬다, 금긋다, 뜸뜨다, 신신다, 임이다, 그림그리다, 걸음걷다, 싸움싸우다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">가살부리다, 재간부리다, 심술부리다, 낯설다, 산설다, 방정떨다, 엄상떨다, 일삼다, 사위삼다, 소리치다, 활개치다, 굽이치다, 시집가다, 장가가다, 눈팔다, 낯익다, 몸풀다, 논풀다, 논삶다, 눈멀다, 더위먹다, 마음먹다, 추위타다, 더위타다, 여름타다, 감사납다, 체면보다, 말씀드리다, 소리지르다, 주제넘다, 수놓다, 불놓다, 불지르다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">때이르다, 꽃피다, 불타다, 애쓰다, 손쓰다, 가슴뜨겁다, 유별나다, 재간있다, 기운없다, 밥먹다, 머리숙이다, 유서깊다, 눈부시다, 대바르다, 움트다, 싹트다, 안개끼다, 번개치다, 고집세다, 우뢰울다, 눈오다, 비내리다, 물맑다, 비새다, 인상좋다, 맛좋다, 벼락같다, 끝맺다, 맴돌다, 끝나다, 나물캐다, 총화짓다, 고기잡다, 꽃같다, 꿀같다</td>
                  </tr>
                </table>
              </div>
              <p class="description indent">
                <span class="indent__mark">－</span>
                《앞, 뒤, 곱, 겹》이 동사나 형용사와 결합되여 하나의 행동이나 상태를 나타낼 때에는 붙여쓴다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">앞서다, 앞당기다, 뒤늦다, 뒤잇다, 곱가다, 곱먹다, 겹놓다, 겹싸다</td>
                  </tr>
                </table>
              </div>
              <p class="description indent">
                <span class="indent__mark">－</span>
                일부 부사나 대명사 그밖의 품사가 《하다, 되다, 시키다》와 어울려 하나의 행동, 상태를 나타낼 때에는 붙여쓴다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">못하다, 못되다, 안하다, 안되다, 안시키다, 아니되다, 아니하다, 다하다, 다되다, 덜시키다, 덜되다, 더하다, 더되다, 더시키다, 같이하다, 이만하다, 그러루하다, 그만하다, 새큼새큼하다, 좔좔하다, 엉거주춤하다, 철썩하다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">말씀드리기 뭣하다, 무엇하는가고 묻다, 제자리걸음하는 일군들</td>
                  </tr>
                </table>
              </div>
              <p class="description indent">
                <span class="indent__mark">－</span>
                일부 부사와 대명사 그밖의 품사에 고유어로 된 동사나 형용사가 어울리여 하나의 행동, 상태를 나타내는 경우에는 붙여쓴다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">쩔쩔매다, 끄떡없다, 감쪽같다, 설설기다, 꼼짝없다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">바로잡다, 올리벋치다, 가로질리다, 곧이듣다, 가로채다, 냅다받다, 들이대다, 들이치다, 드립다대다, 드립다차다, 들이부시다, 가득차다, 걸써대하다, 똑같다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">그같은, 이같은, 나보고</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">첫째가는, 으뜸가는, 제일가는, 때아닌</td>
                  </tr>
                </table>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">참고1</span>
                  명사나 부사에 동사나 형용사가 결합되여 하나의 행동이나 상태를 나타내는 단어의 앞에 또 명사가 붙는 경우 그 명사는 띄여쓴다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">가슴 불타오르다, 점령 못하다</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">참고2</span>
                  토없는 명사가 고유어로 된 동사나 형용사와 어울리여 쓰이여도 토를 줄였다는것이 뚜렷하거나 앞뒤단어와의 의미―론리적련관속에서 볼 때 띄여야 할 경우에는 띄여쓴다.(주로 운문에서 많이 쓰이고있다.)
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">은혜로운 <span class="underline">해발 안고</span> (《을》생략)<br />
                        무슨 <span class="underline">일 할가</span> (《을》생략)<br />
                        사랑의 <span class="underline">정 품고</span> (《을》생략)<br />
                        명적의 기세 드높다<br />
                        내가 <span class="underline">한마디 하겠다</span> (《를》생략)<br />
                        무슨 좋은 <span class="underline">일 할셈인가</span> (《을》생략)<br />
                        <span class="underline">오곡백과 설레이는</span> 협동벌 (《가》생략)<br />
                        실, 바늘, 목달개 <span class="underline">같은</span> 소비품<br />
                        강영창, 정준택 <span class="underline">같은</span> 사람들<br />
                        승냥이 <span class="underline">같은</span> 짐승 (그러나 《승냥이같은 미제》와 같이 형상적인 뜻으로 쓰인 경우는 붙여쓴다.)
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>토를 가지고 이루어져 하나의 대상, 행동, 상태를 나타내는 경우
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <!-- (1) -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>(1)&nbsp;</span>토를 사이에 두고 단어가 결합되여 하나의 대상을 나타내는 경우에는 붙여쓴다.
            </h4>
            <!-- ① -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>①&nbsp;</span>동사나 형용사의 《ㄴ, ㄹ》형이 시칭의 뜻이 없이 명사와 어울리면서 그앞에 다시 《ㄴ, ㄹ》형의 규정어를 받을수 있는것은 붙여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">된장(묽은 된장), 식은땀(심한 식은땀)<br />
                      작은아버지(키 큰 작은아버지)<br />
                      뜬소문(돌아가는 뜬소문)<br />
                      들돌(내려놓은 들돌), 잔돈(많은 잔돈)<br />
                      큰고모(키 작은 큰고모), 멜가방(큰 멜가방)</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">붉은기(펄럭이는 붉은기), 푸른기, 흰기, 푸른색(연한 푸른색), 흰색, 검은색, 노란빛(진한 노란빛), 빨간빛</td>
                  </tr>
                </table>
              </div>

            </div>
            <!-- ② -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>②&nbsp;</span>두개이상의 단어가 어울려서 하나로 녹아붙어 하나의 대상을 나타내는 경우에는 붙여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">앉을자리, 못된놈, 몹쓸일, 안될말, 덜된말, 지난해, 지난달, 앉은자리, 선자리, 궂은비, 모진비, 간밤, 이른봄, 늦은가을, 오는해, 묵은해, 땔나무</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">짠맛, 신맛, 단맛, 쓴맛, 매운맛</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">가까운바다, 먼바다, 찬단물, 모내는기계</td>
                  </tr>
                </table>
              </div>
              <p class="description">※《조선말대사전》에 올라있는 단어에 준하여 처리하는것을 원칙으로 한다.</p>
            </div>

          </div>
          <!-- (2) -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>(2)&nbsp;</span>토를 사이에 두고 두개의 단어가 결합되여 하나의 행동, 상태를 나타내는 경우에는 붙여쓴다.
            </h4>
            <!-- ① -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>①&nbsp;</span>《아, 어, 여》, 《고》형의 동사나 형용사가 다른 동사와 어울려 하나의 행동, 상태를 나타낼 때에는 붙여쓴다.
              </h5>
              <p class="description">이음토 《아, 어, 여》, 《고》는 동사나 형용사들사이에 쓰이는 토로서 두개이상의 동사나 형용사를 결합시켜 다른 하나의 행동이나 상태를 나타낼수 있게 한다.
                이때 뒤에 오는 동사나 형용사는 앞의 동사나 형용사의 뜻을 강조해주거나 보충적으로 설명해주는 보조적인 역할밖에 놀지 못한다.</p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">떨어지다, 붉어지다, 다듬어지다, 좋아지다, 뽀얘지다, 같아지다, 안겨지다, 몰아치다, 후려치다, 둘러치다, 놀아나다, 죽어나다, 일어나다, 묻어나다, 견디여나다, 태여나다, 빚어내다, 몰아내다, 쥐여내다, 건져내다, 먹어대다, 졸라대다, 고아대다, 부셔대다, 붙어잡다, 털어버리다, 먹어보다, 반가와하다, 가르쳐주다, 돌아보다, 담아두다, 접어놓다, 급해맞다, 바빠맞다, 기뻐하다, 먹어치우다, 밀어치우다, 앉아있다, 놓여있다, 누워있다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">놀고먹다, 가고말다, 먹고싶다, 짜고들다, 읽고있다, 자고있다, 캐고들다, 들고뛰다, 타고나다, 물고뜯다, 들고일어나다, 털고나앉다</td>
                  </tr>
                </table>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">참고</span>
                  《았다, 었다, 였다》형이 시칭의 뜻이 없이 쓰이는 경우에도 붙여쓴다.
                </p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">을렀다메다, 들었다놓다, 고았다대다</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- ② -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>②&nbsp;</span>《아, 어, 여》, 《고》형이 아닌 다른 형의 뒤에서 동사나 형용사가 붙어 하나의 행동, 상태를 나타낼 때에도 붙여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">보다나니, 쓰다나니, 돌아다니다나니, 맏형이다나니, 되다보니, 서두르다보니, 보시다싶이, 아다싶이, 하다못해, 보다못해, 사다먹다, 내다팔다, 쳐다보다, 올려다보다, 바라다보다, 내다보다, 맞다들다, 기쁘다마다, 희다마다, 곱다마다, 알다마다, 모범이다마다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">읽는가싶다, 앉을가싶다, 찾아오는가싶다, 체육관인가싶다, 올가보다, 읽을가보다, 세찬가보다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">올상싶다, 참고될상싶다, 알고있을상싶다, 의사일상싶다, 될상싶다, 갈상싶다, 갈성싶다, 볼성싶다</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">승리하고야만다, 멸망하고야만다</td>
                  </tr>
                </table>
              </div>
              <div class="auxiliary">
                <p class="description">
                  <span class="complement">참고</span>
                  말하는 사람의 언어적습성과 관련된 군더더기에 불과한 《말이야》는 앞단위와 띄여쓴다.
                </p>
                <div class="example">
                  <table>
                    <tr>
                      <td class="text-left">간단 말이야, 가잔 말이야, 간다고 말이야</td>
                    </tr>
                  </table>
                </div>
                <p class="description">《～뭐》도 이에 준하여 처리한다.</p>
                <div class="example">
                  <table class="mb-0">
                    <tr>
                      <td class="text-left">그렇지요 뭐</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">들어서자마자, 보자마자, 먹자마자, 나가자마자</td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- ③ -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>③&nbsp;</span>《아, 어, 여》, 《고》형의 동사나 형용사가 잇달아 있더라도 뒤에 오는 동사나 형용사가 문맥속에서 자립적인 뜻을 나타낼 때에는 자립적인 행동이나 상태의 단위로 보고 띄여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">방안에서 짐을 <span class="underline">들고 나가다</span>.<br/>
                      <span class="underline">먹고 입고 쓰고 사는</span> 걱정을 모르다.<br/>
                      짐을 <span class="underline">들고 이고 메고 가는</span> 돌격대원들<br/>
                      많은 사람들이 물건을 <span class="underline">사고 팔며</span> 붐비는 시장<br/>
                      <span class="underline">맑고 아름다운</span> 강산, <span class="underline">슬기롭고 용감한</span> 인민<br/>
                      서로 <span class="underline">돕고 이끌며</span> 화목하게 지내다.<br/>
                      방안이 깨끗<span class="underline">하여 좋다</span>.<br/>
                      나물을 <span class="underline">씻어 말리워</span> 포장하다.<br/>
                      자료를 <span class="underline">보아 넘기다</span>.<br/>
                      <span class="underline">다그쳐 묻다</span>.<br/>
                      계획을 <span class="underline">넘쳐 수행하다</span>.(끝내다)<br/>
                      <span class="underline">앞당겨 완수하다</span>.(생산하다, 실현하다, 끝내다, 점령하다, 해제끼다)</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">기여넘어가 살펴보다, 들어가 집어올리다, 만나보아 알고있다, 받아안아 덮어싸다, 손잡아 이끌어주다</td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- ④ -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>④&nbsp;</span>토 《나, 디, 고, 도, 니, 락, 다, 든, 쿵, 듯, 둥, 쑥, 숭, 건, 네, 리, ㄴ…》을 사이에 두고 두개의 동사나 형용사가 겹치여 하나의 현상, 행동을 나타내는것은 붙여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">크나큰, 기나긴, 머나먼, 깊으나깊은, 젊으나젊은, 자나깨나, 아니나다를가, 가나오나, 달디단, 높디높은, 차디찬, 멀고먼, 부르고부르는, 크고작은, 높고낮은, 가도가도, 오도가도, 길고도긴, 넓고도넓은, 긴긴, 먼먼, 높으락낮으락, 이러쿵저러쿵, 죽을둥살둥, 들락날락, 들쑥날쑥, 본숭만숭, 왔다갔다, 이러니저러니, 앞서거니뒤서거니, 가네오네, 가리오리, 가든오든, 가건말건</td>
                  </tr>
                </table>
              </div>

            </div>
            <!-- ⑤ -->
            <div class="term__detail__case">
              <h5 class="title term__detail__case__title">
                <span>⑤&nbsp;</span>토를 사이에 두고 두개이상의 서로 다른 품사가 하나로 녹아붙어 하나의 말소리덩어리로 되는 경우에는 붙여쓴다.
              </h5>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">왜냐하면, 무엇보다먼저, 죽기내기로, 다시말하여</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">여러말할것없이, 의심할바없는, 어쩔수없이, 웬만해가지고는, 할수없이, 하잘것없는, 할것없이, 뿐만아니라, 뿐아니라, 이렇다할, 별게아니라, 별다른게아니라, 불행중다행, 전에없이, 다름아니라, 그달음으로, 그걸음으로, 털어놓고말하여, 내놓고말하여, 까놓고말하여, 숨돌릴새없이</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 제3항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제3항.&nbsp;</span>
        고유한 대상의 이름은 붙여쓰되 마디를 이루면서 잇달리는것은 매 마디마디 띄여쓴다.
      </h2>
      <p class="description">3항은 고유한 대상의 이름들의 띄여쓰기와 고유한 대상의 이름의 앞과 뒤에 붙는 칭호와 관련된 띄여쓰기를 규정하고있다.<br />
        고유한 대상의 이름에는 인명, 지명, 나라명, 기관, 기업소, 단체명과 같은 공식명칭이나 대중운동, 회의, 사변, 기념일, 강령과 출판물, 물건이름을 비롯하여 다른것들과 특별히 구별하기 위해 지어 부르는 이름들이 속한다.<br />
        고유한 대상의 이름은 포괄범위도 넓고 그 구조자체도 단순하지 않으므로 고유한 대상의 이름의 띄여쓰기는 총칙의 두번째 내용인 《글을 읽고 리해하기 쉽게 일부 경우에는 붙여쓴다》에 준하여 처리한다.</p>

      <!-- 1) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>고유한 대상의 이름은 붙여쓰는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">김철, 리옥금, 독고순, 황보영화, 김 아무개, 김 누구누구, 김 무엇 철</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">조선로동당, 조선민주주의인민공화국, 김책공업종합대학, 대동문식료품상점</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">평양326전선공장, 4.25체육단, 2.17과학자, 기술자돌격대, 릉라2동사무소, 리계순사리원제1사범대학, 3대혁명붉은기쟁취운동, 아프리카3개국수뇌자회의, 3.1인민봉기, 4월15일명절, 9.9절, 20개조정강, 전민족대단결10대강령</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">뻬루조선친선협회, 조중친선협회</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">김일성훈장, 조선민주주의인민공화국창건기념훈장, 로력훈장, 김정일선집, 주체사상탑, 만수대의사당</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">함북1호, 구성3호</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">
              <span class="complement">참고</span>
              외국의 고유한 명칭은 그 나라에서 하는대로 띄여쓰기를 하는것을 기본으로 하되 다음과 같이 처리한다.
            </p>
            <p class="description indent">
              <span class="indent__mark">－</span>
              외국의 고유한 명칭을 그 나라에서 발음하는대로 옮기는 경우에는 그 나라에서 하는대로 띄여쓰기를 한다.
            </p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">싼디아고 데 칠레, 에르네스또 체 게바라, 크라스나야 즈베즈다</td>
                </tr>
              </table>
            </div>
            <p class="description indent">
              <span class="indent__mark">－</span>
              외국의 고유한 명칭을 우리 말로 번역하여 쓰는 경우에는 우리 말 띄여쓰기규정에 준하여 띄여쓰기를 한다.
            </p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">조선의 자주적통일을 위한 국제련락위원회</td>
                </tr>
              </table>
            </div>
            <p class="description">※ 나라, 지역의 이름 앞뒤에 오는 《동, 서, 남, 북…》과 《시, 군, 도, 주, 련방, 왕국, 공화국, 국…》 등은 앞과 뒤에 붙여쓴다.</p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">북아메리카, 중앙아프리카, 스위스련방, 레소토왕국, 이란이슬람교공화국</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 2) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>고유한 대상의 이름이 마디를 이루면서 잇달리는것은 매 마디마디 띄여쓴다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">고유한 대상의 이름은 단순한 구조도 있지만 단계적으로 마디를 이루고 잇달리면서 길어지는 복잡한 구조도 있다.<br />
            이러한 구조의 이름을 다 붙여쓰면 읽기 힘들고 리해에도 혼란을 줄수 있으므로 매 마디마디 띄여쓴다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">조선로동당 평양시 강남군위원회<br />
                  평양시 중구역 대동문동<br />
                  사회과학원 행정조직국<br />
                  조선직업총동맹 중앙위원회<br />
                  조선농업근로자동맹 중앙위원회</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">조선민주주의인민공화국 최고인민회의 상설회의 의원<br />
                  조선로동당 중앙위원회 ○○부 부장<br />
                  김정숙탁아소 소장 ○○○동지</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">조선로동당 중앙위원회 제6기 제10차전원회의<br />
                  최고인민회의 제○○기 제1차회의<br />
                  공화국정부성명지지 ○○○시군중대회<br />
                  보천보전투승리기념 사회과학원토론회<br />
                  조선로동당창건 ○○돐기념 중앙보고회<br />
                  조선인민군창건 ○○돐기념 평양시군중대회<br />
                  조선민주주의인민공화국창건 55돐기념 중앙과학토론회<br />
                  보천보전투승리 기념강연회<br />
                  공화국창건 20돐 기념토론회<br /><br />
                  ※ 단어 《기념》이 《기념강연회, 기념토론회, 기념보고회》와 같이 대상화될 때에는 붙이고 그렇지 않을 때에는 그 앞단위에 붙여준다.<br /><br />
                  조국광복 60돐행사, 당창건 60돐행사</td>
              </tr>
            </table>
          </div>

          <div class="example">
            <table>
              <tr>
                <td class="text-left">제7차 세계륙상선수권대회<br />
                  제2차 세계대전<br />
                  제3차 중동전쟁<br />
                  제1차 군무자축전</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">※ 그러나 《차》뒤에 《전원회의, 회, 대회》, 《전쟁, 투쟁, 봉기…》 등이 직접 올 때에는 앞에 붙여쓴다.</p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">제2차대전, 1차전쟁, 제1차경연, 1차축전, 3차투쟁, 2차봉기, 제3차대회, 2차전원회의, 5차회의</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">전국농업부문 일군회의<br />
                  평안남도농업부문 일군회의<br />
                  아시아지역 주체사상연구소<br />
                  조선통일지지 라오스위원회<br />
                  주체사상연구 부르끼나파쏘위원회<br />
                  조선민주주의인민공화국주재 중화인민공화국대사관<br />
                  오끼나와주둔 미해병대소속 사병<br />
                  ○○사범대학부속 ○○중학교<br />
                  ○○소속 ○○해안포병중대<br />
                  채취공업성산하 ○○연구소</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">※ 그러나 《직속, 부속, 산하, 소속, 아래…》 등이 일반적인 대상과 어울려 쓰일 때에는 뒤단어와 붙여쓴다.</p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">직속기관, 부속소학교, 산하기업소, 소속구분대, 아래기관</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">김정일명칭 제1차 뽈스까청년단<br />
                  로씨야 챠이꼽스끼명칭 모스크바국립음악대학 합창단</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">제20차 4월의 봄 친선예술축전조직위원회<br />
                  영예의 붉은기 ○○중학교<br />
                  전사의 영예훈장 제1급</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">참고</span>
            고유한 대상의 이름이 마디를 이루면서 단계적으로 내려갈 때 줄어지는 말마디의 띄여쓰기는 다음과 같다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">조선로동당 중앙위원회 ○○부 ○○과 과장<br />
                  당중앙위원회 ○○부 ○○과 과장<br />
                  당중앙위원회 과장(부원)</td>
              </tr>
              <tr>
                <td class="text-left">조선로동당 중앙위원회 정치국 위원<br />
                  당중앙위원회 정치국 위원<br />
                  당중앙위원회 위원(후보위원)<br />
                  정치국위원(정치국후보위원)<br />
                  도당위원(도당후보위원)</td>
              </tr>
              <tr>
                <td class="text-left">조선로동당 자강도위원회 책임비서 ○○○<br />
                  자강도당위원회 책임비서 ○○○<br />
                  자강도당 책임비서 ○○○<br />
                  도당책임비서 ○○○</td>
              </tr>
              <tr>
                <td class="text-left">경공업성 초급당위원회 비서<br />
                  경공업성 초급당비서<br />
                  경공업성 당비서<br />
                  성당비서, 초급당비서</td>
              </tr>
              <tr>
                <td class="text-left">조선민주주의인민공화국 내각 총리<br />
                  내각총리(내각부총리)</td>
              </tr>
              <tr>
                <td class="text-left">중화인민공화국 국무원 총리<br />
                  중국국무원 총리<br />
                  국무원총리<br />
                  중국총리</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">근로단체조직들의 이름도 우와 같이 처리한다.</p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">김일성사회주의청년동맹 중앙위원회 1비서<br />
                    청년동맹중앙위원회 1비서<br />
                    도청년동맹위원회 비서</td>
                </tr>
                <tr>
                  <td class="text-left">평양종합방직공장 청년동맹위원회 비서<br />
                    방직공장 청년동맹위원회 비서<br />
                    공장청년동맹위원회 비서<br />
                    청년동맹비서<br />
                    동맹비서</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">최고인민회의 대의원<br />
                  자강도인민회의 대의원<br />
                  도인민회의 대의원<br />
                  자강도대의원<br />
                  도대의원</td>
              </tr>
              <tr>
                <td class="text-left">프랑스공화국 국회 상원 의원<br />
                  프랑스국회 상원 의원<br />
                  프랑스국회 의원<br />
                  국회 하원 의원<br />
                  국회하원<br />
                  국회상하원<br />
                  미국국회 상하원<br />
                  상원의원 ○○○<br />
                  국회의장 ○○○<br />
                  국회의원 ○○○</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">사회과학원 ○○실 연구사 ○○○<br />
                  사회과학원 ○○실 실장<br />
                  사회과학원 연구사</td>
              </tr>
              <tr>
                <td class="text-left">평양기초식품공장 지배인<br />
                  기초식품공장 지배인<br />
                  공장지배인</td>
              </tr>
              <tr>
                <td class="text-left">동평양제1중학교 교장<br />
                  1중학교 교장<br />
                  중학교 교장<br />
                  학교교장</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">금속기계공업성 일군(책임일군)<br />
                  성일군(책임일군)</td>
              </tr>
              <tr>
                <td class="text-left">평양강철공장 로동계급<br />
                  공장로동계급</td>
              </tr>
              <tr>
                <td class="text-left">○○○군부대 군인<br />
                  부대군인</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">《인민, 주민, 일군…》 등이 행정지명과 어울릴 때에는 붙여쓴다.</p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">강원도인민, 자강도일군(책임일군)</td>
                </tr>
              </table>
            </div>
            <p class="description">그러나 단계성을 띨 때는 행정지명뒤에서 띄여쓴다.</p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">평안남도 온천군 책임일군(일군)</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">조선민주주의인민공화국 최고인민회의 상임위원회 정령 제9호<br />
                  상임위원회정령 제9호</td>
              </tr>
              <tr>
                <td class="text-left">조선민주주의인민공화국 내각 결정 제10호<br />
                  내각결정 제10호</td>
              </tr>
              <tr>
                <td class="text-left">조선인민군 최고사령관 명령 제0031호<br />
                  최고사령관명령
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  조선인민군 최고사령부 보도 제30호<br />
                  최고사령부보도 제30호<br />
                  최고사령부보도</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">조선민주주의인민공화국 외무성 대변인담화<br />
                  외무성 대변인담화</td>
              </tr>
              <tr>
                <td class="text-left">중국외교부 대변인담화<br />
                  중국외교부 담화<br />
                  외교부담화</td>
              </tr>
              <tr>
                <td class="text-left">조선민주주의인민공화국 정부 성명
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  조선중앙통신사 대변인담화</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">
              <span class="complement">보충1</span>
              고유한 대상의 명칭이 아니라도 시간 또는 위치적개념을 가지고 단계성을 띠면서 렬거되는 사실인 경우에는 그 단위로 되는 마디마디를 띄여쓴다.
            </p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">오후 3시 20분 30초<br />
                    2003년 10월 10일 금요일 오전 10시<br />
                    B.C. 3세기 20년대초 [기원전 3세기 20년대초(상, 중, 말)]<br />
                    1990년대 전반기(후반기, 중엽…)<br />
                    오늘 아침 새벽 5시<br />
                    그날 저녁 6시, 이날 낮 1시<br />
                    이튿날 새벽, 어제 밤에<br />
                    오늘 아침, 오늘 오후<br />
                    다음날 오전, 월요일 오후<br />
                    작년 가을 어느날 밤<br />
                    음력 3월 7일 저녁 8시<br />
                    음력 윤5월</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">《김정일선집》 1권 20페지<br />
                    동경 62°5’<br />
                    령하 10℃<br />
                    미누수 10℃</td>
                </tr>
              </table>
            </div>
            <p class="description">※ 그러나 부호와 함께 쓰일 때에는 붙여쓴다.</p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">-10℃</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">김일성경기장 주석단<br />
                    학생소년궁전 앞공원<br />
                    조선콤퓨터쎈터 2호청사 3층복도</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="auxiliary">
            <p class="description">
              <span class="complement">보충2</span>
              고유한 대상의 이름뒤에 보통명사가 결합되여 하나의 단위로 될 때에는 붙여쓴다.
            </p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">조선민주주의인민공화국정부, 사회과학원청사, 평양고무공장설비, 로씨야국가회의선거</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 3) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>고유한 대상의 이름의 앞과 뒤에 오는 칭호는 다음과 같이 띄여쓴다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>①&nbsp;</span>고유한 대상의 이름의 앞에 오는 칭호는 띄여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">인민과학자, 원사, 교수, 박사, 최남석선생님<br />
                    부교수, 학사 김일남</td>
                </tr>
              </table>
            </div>
            <p class="description">그러나 《교수 박사 ○○○선생, 부교수 학사 ○○○선생…》과 같이 칭호가 붙은 고유한 대상의 이름들을 둘이상 렬거할 경우에는 칭호들사이에 반점 《,》을 치지 않고 칭호들사이를 띄여쓸수 있다.</p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">근위 서울류경수105땅크사단<br />
                    금성친위 제○○군부대<br />
                    2중3대혁명붉은기 ○○공장<br />
                    3중영예의 붉은기 ○○소학교</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">로력영웅 박옥희, 인민배우 김미란</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">과장 ○○○동지</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">부장 ○○○ 대리 부부장 ○○○<br />
                    부장대리로 일하는 박○○<br />
                    대리부장으로 일하는 김동무</td>
                </tr>
              </table>
            </div>
            <div class="auxiliary">
              <p class="description">
                <span class="complement">참고</span>
                동격어적관계로 어울리는 단어들사이도 띄여쓴다.
              </p>
              <div class="example">
                <table class="mb-0">
                  <tr>
                    <td class="text-left">잡지 《천리마》<br />
                      동서남북 사방<br />
                      직각삼각형 ABC<br />
                      천하명승 금강산<br />
                      음악무용서사시 《영광의 노래》</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>②&nbsp;</span>고유한 대상의 이름뒤에 오는 칭호나 부름말은 붙여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">김철수동지, 김영옥동무, 김송이지배인</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">정성옥영웅, 김옥희아주머니</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">박동지, 영만오빠</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">김영남군당책임비서(김영남책임비서)<br />
                    리순실동사무장(리순실사무장)<br />
                    장철남1비서, ○○외무상(○○○상)<br />
                    리남순과학지도국장(리남순국장)<br />
                    리철호실장선생(리철호실장)</td>
                </tr>
              </table>
            </div>
            <div class="auxiliary">
              <p class="description">
                <span class="complement">보충1</span>
                칭호가 이름뒤에 올 때에도 단계적으로 내려가는 마디마디는 띄여쓴다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">김영남 금속기계공업성 상<br />
                      김영남금속기계공업상<br />
                      김○○ 당중앙위원회 부부장</td>
                  </tr>
                </table>
              </div>
              <p class="description">그러나 이름뒤에 직제만 올 때에는 붙여쓴다.</p>
              <div class="example">
                <table class="mb-0">
                  <tr>
                    <td class="text-left">김영남상, 김철남부부장</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="auxiliary">
              <p class="description">
                <span class="complement">보충2</span>
                김철 작곡, 김봄 지음, 박송이 작사
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 제4항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제4항.&nbsp;</span>
        수사는 《백, 천, 만, 억, 조》단위로 띄여쓰며 수사뒤에 오는 단위명사와 일부 단어는 붙여쓴다.
      </h2>
      <p class="description">이 항은 수사의 띄여쓰기와 수사뒤에 오는 단위명사와 수사가 어울려 하나의 뜻덩어리로 쓰이는 단어들의 띄여쓰기와 관련한 내용을 규정하고있다.</p>

      <!-- 1) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>수사는《백, 천, 만, 억, 조》를 단위로 하여 띄여쓴다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">3조 3억 8천만, 7만 6천 6백 20</td>
              </tr>
            </table>
          </div>
          <p class="description">우리 말에서 수사는 세가지 형태로 적을수 있는 조건에서 띄여쓰기는 다음과 같이 한다.</p>
          <p class="description indent">
            <span class="indent__mark">－</span>
            수자를 고유한 우리 말로만 적는 경우에는 《백, 천, 만, 억, 조》를 단위로 하여 띄여쓴다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">십구만 칠천 삼백 이십일<br />
                  삼억 사천 칠백 이십만 오천 이백</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">※ 회계장부나 기타 문건들에 복기로 우리 글자를 쓸 때에는 띄여쓰기를 하지 않고 다 붙여쓸수도 있다.</p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">34 529(삼사오이구)<br />
                    102 000(십만이천)<br />
                    22(스물둘)<br />
                    1 195(천백구십오)</td>
                </tr>
              </table>
            </div>
          </div>
          <p class="description indent">
            <span class="indent__mark">－</span>
            수자를 아라비아수자와 우리 글을 섞어 적는 경우에는 《백, 천, 만, 억, 조》를 단위로 띄여쓴다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">1만 1 950<br />
                  1조 2억 3천만</td>
              </tr>
            </table>
          </div>
          <p class="description indent">
            <span class="indent__mark">－</span>
            수자를 아라비아수자로만 적는 경우에는 세자리씩 올라가면서 띄여쓴다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">1 482 522(일백 사십팔만 이천 오백 이십이)<br />
                  75 772(칠만 오천 칠백 칠십이)<br />
                  20 005(이만 다섯)<br />
                  45(마흔다섯)<br />
                  8 520(팔천 오백 이십)</td>
              </tr>
              <tr>
                <td class="text-left">26 528, 871 219</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">
              <span class="complement">참고</span>
              수사가 일부 명사와 어울려 새로운 고유한 대상을 나타내는 경우에는 세자리씩 올라가면서 띄여쓰지 않는다.
            </p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">2000년, 10000t프레스</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 2) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>수사뒤에 오는 단위명사와 수사가 어울려 하나의 뜻덩어리를 이루는 단위는 붙여쓴다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <!-- ① -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>①&nbsp;</span>수사뒤에 오는 단위명사는 붙여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">닭알 3알, 살림집 두동, 학습장 5권, 학생 50명, 화분 20개, 토끼 3마리, 쌀 4네, 5시, 50초</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">한알, 백년간, 석주, 열책</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- ② -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>②&nbsp;</span>수사나 단위명사의 뒤에 오는 《이상, 이하, 미만, 정도, 범위, 이전, 이후, 이내, 현재, 동안, 사이, 가량, 안팎》 등은 그 앞단위에 붙여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">서른살가량, 20명정도, 10℃이하, 40명범위, 150%이상, 50살안팎, 3일이내, 20일현재, 30분동안, 80년대이후, 3일이전, 3이상, 10미만, 50범위…</td>
                </tr>
              </table>
            </div>
            <p class="description">명사 《전, 후》도 우와 같이 처리한다.</p>
            <p class="description">명사 《밖》이 수사나 단위명사와 결합되여 쓰이면서 그뒤에 부정의 표현이 올 때에는 단위명사뒤에 붙여쓴다.</p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">20살밖에 못되였다, 3m밖에 안된다.(3m 밖에 있다.)</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- ③ -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>③&nbsp;</span>《수, 여, 나마(나문), 몇》 등이 수사나 명사와 직접 어울려서 량적의미를 나타낼 때에는 붙여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">수십, 수십억, 수백만, 수백수천, 수삼차, 수삼개월</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">50여명, 1 000여t</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">5백나마, 석달나마, 여나문, 스무나문</td>
                </tr>
              </table>
            </div>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">몇백명, 몇배, 몇만명, 몇명</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- ④ -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>④&nbsp;</span>《성상, 세월, 나이, 평생, 고개》와 같은 완전명사도 수사뒤에 붙여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">20여성상, 70평생, 60여평생, 20성상, 60나이, 70살나이에, 마흔고개, 60살고개, 3년세월, 50여년세월</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- ⑤ -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>⑤&nbsp;</span>수사가 하나의 인체의 부분과 어울려 쓰일 때에는 붙여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">한눈, 두귀, 한팔, 다섯손가락, 열발가락</td>
                </tr>
              </table>
            </div>

            <div class="auxiliary">
              <p class="description">
                <span class="complement">참고</span>
                수사 《한》의 처리는 다음과 같다.
              </p>
              <p class="description indent">
                <span class="indent__mark">－</span>
                수사 《한》이 수량적의미와 《어느》의 뜻으로 쓰일 때에는 뒤에 오는 단어와 띄여쓴다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left"><span class="underline">한 청년</span>의 영웅적소행<br />
                      조선혁명은 세계혁명의 <span class="underline">한 고리</span>이다.</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left"><span class="underline">한 간호원</span>에 대한 이야기<br />
                      공장으로 돌아온 <span class="underline">한 로동자</span>에 대해 이야기하였다.</td>
                  </tr>
                </table>
              </div>
              <p class="description indent">
                <span class="indent__mark">－</span>
                수사 《한》이 《같은, 좀, 마구, 한바탕, 큰, 옹근》 등의 뜻을 가지고 쓰이는 경우에는 그 뒤의 명사와 어울려 하나의 뜻덩어리를 이루는것으로 보고 붙여쓴다.
              </p>
              <div class="example">
                <table>
                  <tr>
                    <td class="text-left">한가정, 한가마밥, 한길, 한곬, 한마음, 한배, 한뜻, 한집안, 한하늘, 한부대</td>
                  </tr>
                </table>
              </div>
              <div class="example">
                <table class="mb-0">
                  <tr>
                    <td class="text-left">밥 한술, 한소나기 퍼붓다, 한달음에 달려가다, 한여름이 닥쳐왔다, 한잠자다, 한목숨바치다, 한가슴에 받아안다, 한겨울에 접어들다, 한길에 나서다</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="auxiliary">
              <p class="description">
                <span class="complement">참고</span>
                《～째(～번째)》가 붙어서 순서를 나타내는 말의 뒤에 온 단어는 띄여쓴다.
              </p>
              <div class="example">
                <table class="mb-0">
                  <tr>
                    <td class="text-left">세번째 책상, 첫번째 내용</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 제5항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제5항.&nbsp;</span>
        불완전명사(단위명사포함)는 앞단어에 붙여쓰되 그뒤에 오는 단어는 띄여쓰는것을 원칙으로 한다.
      </h2>
      <p class="description">이 항에서는 불완전명사(단위명사포함)의 띄여쓰기와 그뒤에 오는 단어의 띄여쓰기에 대하여 규정하고있다.</p>

      <!-- 1) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>순수한 불완전명사는 언제나 붙여쓴다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">아는<span class="underline">것</span>이 힘이다.<br />
                  모르면서 아는<span class="underline">체</span> 하는것은 나쁜 버릇이다.<br />
                  힘든<span class="underline">줄</span> 모르고 일한다.<br />
                  커서 인민군대가 될<span class="underline">터</span>이다.<br />
                  말할<span class="underline">나위</span>가 없다.<br />
                  그<span class="underline">자</span>, 못된<span class="underline">자</span>, 뛰여난<span class="underline">분</span>, 그<span class="underline">이</span></td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">※ 《년, 놈》은 명사이므로 토뒤에서는 띄여쓴다.</p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">우둔한 놈이 범잡는다고…<br />
                    도망간 년이 되돌아올상싶으냐?</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 2) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>지난날 불완전명사적으로 처리하던 외마디한자말단어는 다음과 같이 처리한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description indent">
            <span class="indent__mark">－</span>
            《경, 기, 내, 당, 말, 발, 번, 부, 산, 조, 차, 착, 초, 측, 행, 양, 외》 등은 원래 불완전명사이므로 토뒤에도 붙여쓰며 그뒤의 단어와는 띄여쓴다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">12월경 예정실적, 제1기 졸업생, 학교내 위생사업, 단위당 수확고, 12월말 생산실적, 보건성발 제1호, 평양발 2렬차, 이번 전시회, 3일부 신문, 10년부 기한으로 대여, 개성산 인삼, 제1조, 제13차 전국체육대회, 평양착 38렬차, 20세기초 기후현상, 우리측 대표, 개성행 렬차, 아는양을 하다, 계획외 공사</td>
              </tr>
            </table>
          </div>
          <p class="description indent">
            <span class="indent__mark">－</span>
            《간, 중》은 명사이나 불완전명사적으로도 쓰이므로 불완전명사로 처리한다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">형제<span class="underline">간</span> 의리, 분기<span class="underline">간</span> 계획, 회의<span class="underline">중</span> 출입금지, 집에서 오던<span class="underline">중</span> 만났다</td>
              </tr>
            </table>
          </div>
          <p class="description indent">
            <span class="indent__mark">－</span>
            《장, 판, 항, 편》은 외마디한자말명사이지만 수사나 단위명사와 결합되여 쓰일 때에는 그뒤에 오는 단위와 붙여쓸수 없으므로 띄여쓴다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">제1장 선군령도의 본질<br />
                  제1항 토뒤나 품사가 서로 다른 단어는 띄여쓴다.<br />
                  1980년판 국어교과서</td>
              </tr>
            </table>
          </div>
          <p class="description indent">
            <span class="indent__mark">－</span>
            지난날 불완전명사적으로 처리하던 외마디한자말단어 《급, 계, 과, 별, 상, 식, 전1, 전2, 하, 형, 호》는 완전명사로, 《상, 성, 적, 제, 용》은 뒤붙이로 처리한다. 그러므로 이 단어들과 결합된 단위뒤에 오는 명사는 앞단위에 붙여쓴다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">고위급회담, 총련계인사, 화본과식물, 개인별경쟁, 5월분계획, 반월상신경절, 영웅전, 학령전어린이, 1호기중기, 자동식무기, 최신형콤퓨터</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">시간상제약, 변이성이발주위염, 혁명적군인정신, 외국제무기, 학생용가방</td>
              </tr>
            </table>
          </div>
          <p class="description indent">
            <span class="indent__mark">－</span>
            우에서 지적한 외마디한자말단어들이 외마디한자말단어와 결합되여 단어조성적요소로 쓰이는 경우에는 그뒤에 오는 단어는 앞에 붙여쓴다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">해상운수, 륙상경기, 륙상모, 림상조직, 년간계획, 업간체조, 야간대학, 시초축적, 년초계획, 도중손실, 옥중투쟁, 지하자원, 지하역, 실내장식, 가내부업, 옥내보수, 산전휴가, 과외실습, 직외강사, 야외극장, 산후휴가, 특산물, 산별조직, 년말계획, 특제품, 고층살림집, 고차방정식, 급행렬차, 특호활자</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 3) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>불완전명사 《듯, 만, 법, 번, 사, 척, 체》 등이 붙은 동사나 형용사가 토없이 《하다》와 어울린것은 띄여쓴다.(이 단어뒤에 토가 오는 경우에도 띄여쓴다.)
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">올듯 하다, 들을만 하다, 만날번 했다, 갈법 하다, 웃을사 하다, 가는척 하다, 아는체 하다</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">갈듯도 하다, 오를만도 하다, 아는체를 하다</td>
              </tr>
            </table>
          </div>
          <p class="description">《～군 하다》도 이에 준하여 띄여쓴다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">가군 하다</td>
              </tr>
            </table>
          </div>
          <div class="auxiliary">
            <p class="description">
              <span class="complement">참고1</span>
              단위명사나 단위명사적으로 쓰이는 완전명사도 불완전명사와 같이 처리한다.(완전명사가 단위명사적으로 쓰이는것은 《조선말대사전》에 준하여 처리한다.)
            </p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">3개 공병려단, 세봉지 약, 약 세봉지, 1월 상순에, 15세기 중엽에, 2000년대 하반기, 1900년도 중엽</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="auxiliary">
            <p class="description">
              <span class="complement">참고2</span>
              《년, 월, 일》이 있는 단위에 《교시, 말씀, 지시, 방침…》 등이 올 때에는 《년》만 띄여쓰고 《월, 일》과 《교시, 말씀, 지시, 방침》은 붙여쓴다.
            </p>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">1954년 5월14일말씀, 5월14일말씀</td>
                </tr>
              </table>
            </div>
            <p class="description">※ 《년(년도)》 뒤에 온 말마디가 하나의 대상으로 묶어지는 덩이라도 띄여쓴다.</p>
            <div class="example">
              <table class="mb-0">
                <tr>
                  <td class="text-left">2003년 국가예산, 2000년도 전기생산량</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- 4) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>4)&nbsp;</span>《등, 대, 겸》은 다음과 같이 띄여쓴다.(《등등, 등지, 따위》도 이에 준하여 처리한다.)
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <!-- ① -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>①&nbsp;</span>《등, 대, 겸》이 둘이상의 대상이나 사물을 들어 말하는 경우에는 앞뒤의 단위와 띄여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">알곡 대 알곡, 부수상 겸 농업상, 사과, 배, 복숭아 등(등등, 등지, 따위)</td>
                </tr>
              </table>
            </div>
            <div class="auxiliary">
              <p class="description">※ 부사 《및》도 우에 준하여 처리한다.</p>
              <div class="example">
                <table class="mb-0">
                  <tr>
                    <td class="text-left">영화 및 방송음악단</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- ② -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>②&nbsp;</span>《대, 겸》이 다른말과 어울려 하나의 뜻덩어리로 되는 경우에는 붙여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">3대 3의 비률, 2대 3대 5의 비률<br />
                    지대공미싸일, 해상대공중미싸일</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- ③ -->
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>③&nbsp;</span>《《겸》이 동사 《ㄴ, ㄹ》형뒤에서 행동을 같이 한다는 뜻을 나타낼 때에는 붙여쓴다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">비도 그을겸, 집도 구경할겸</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 제6항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제6항.&nbsp;</span>
        단어들사이의 맞물림관계를 고려하여 뜻을 리해하기 쉽게 띄여쓰기를 할수 있다.
      </h2>
      <p class="description">이 항에서는 다른 항의 규정내용에 비추어 붙여쓸수 있는 경우라도 글의 뜻을 래해하는데 지장을 줄수 있는 경우라면 맞물림관계를 고려하여 띄여써야 한다는 내용을 규정하고있다.</p>

      <!-- 1) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>앞단어와 맞물리지 않는 단어는 띄여쓴다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">앞단어와 맞물리지 않는다는것은 단어조성적견지에서 볼 때 서로 밀착성이 적어 하나의 어휘적뜻덩어리로 되지 못한다는것을 말해준다. 그러므로 이때에는 맞물림관계를 고려하여 두 단어 사이를 띄여써야 한다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">이 나라 주재 우리 나라 대사관<br />
                  고유한 우리 말 어근으로 새말을 만든다.<br />
                  우리 식 사회주의<br />
                  유엔국제기구대표단 만경대 방문<br />
                  뻬루신문 론평 발표<br />
                  새 세대 청년학생들<br />
                  우리 말 공부<br />
                  우리 당 언어정책<br />
                  세계 혁명적인민들</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">위대한 수령 김일성동지 교시 학습<br />
                  경애하는 장군님 위대성 선전<br />
                  위대한 수령 김일성동지 혁명활동<br />
                  위대한 장군님 현지지도로정<br />
                  위대한 수령님 품속에서 자란 꽃봉오리<br />
                  위대한 수령님 탄생 90돐</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">수정같이 맑은 물이 흐르는 금강산<br />
                  기계화의 동음 높이 울리는 협동벌<br />
                  3대혁명 기치높이 앞으로 나가자.<br />
                  기발 높이 들고 나간다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 2) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>붙여쓰면 두가지 뜻으로 리해될수 있는것은 뜻이 통하게 띄여쓴다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">김인옥어머니(어머니자신)<br />
                  김인옥 어머니(김인옥의 어머니)</td>
              </tr>
              <tr>
                <td class="text-left">중세 언어연구(중세에 진행된 언어연구)<br />
                  중세언어 연구(중세의 언어연구)</td>
              </tr>
              <tr>
                <td class="text-left">김철부부장(김철부 부장인 경우)<br />
                  김철 부부장(김철 부부장인 경우)</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">사리원, 평산일대(두 지역 포괄)<br />
                  사리원, 평산 일대(사리원일대, 평산일대)</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">원시유적, 유물(유적, 유물 다 포괄)<br />
                  사상, 기술, 문화혁명(사상, 기술, 문화 즉 세분야를 포괄적으로 말할 때)<br />
                  륙, 해, 공군부대들(포괄적일 때)<br />
                  당원들과 근로자들속에서(포괄적일 때)<br />
                  선진기술과 리론(두가지 포괄)<br />
                  축구와 배구 및 롱구경기(세가지 포괄)</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 3) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>토없이 결합된 단위가 너무 길어 읽고 리해하기 힘들 때에는 뜻단위로 띄여쓸수 있다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">중증 급성 호흡기증후군<br />
                  3대혁명붉은기쟁취운동 궐기모임참가자들<br />
                  우리 나라 사회주의건설 장성속도 시위<br />
                  우리 당 언어정책 관철정형에 대한 서술<br />
                  이웃집 마루방벽에 걸린 그림</td>
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
