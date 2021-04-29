@extends('layouts.app')

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
      {{-- <a itemprop="item" href=""> --}}
      <span itemprop="name">문장부호법</span>
      {{-- </a> --}}
      <meta itemprop="position" content="3" />
    </li>
  </ol>
@endsection

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="main">
    <h1 class="page-title">문장부호법</h1>
    <button class="btn all-ex-btn">
      <i class="fas fa-bars"></i>&nbsp;
      <span>전체해설보기</span>
    </button>

    <div class="introduction">
      <p>위대한 수령 김일성동지께서는 다음과 같이 교시하시였다.</p>
      <p>
        <span>
          《…단어형태를 고정시키는 문제는 아마 남북이 통일된 다음에 해결해야 할것입니다. 이 문제에 대해서는 지금부터 잘 연구해두는것이 좋습니다.
          지금과 같은 네모글자를 가지고라도 띄여쓰기와 점치기 같은것으로 조절하면 이 문제도 어느 정도 풀릴수 있을것 같습니다.》
        </span>
      </p>
      <p class="text-right">(《김일성전접》32권, 360페지)</p>
    </div>

    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;총&nbsp;칙&nbsp;</span>
      </h2>
      <div class="term">
        <p class="description">현대조선말의 문장부호는 문장들, 문장안의 각 단위들을 뜻과 기능에 따라 갈라주기 위하여 친다.</p>
      </div>
    </div>
    <!-- 제1항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제1항.&nbsp;</span>우리 글에서 쓰는 부호의 종류와 이름
      </h2>
      <div class="example">
        <table>
          <tr>
            <td>.</td>
            <td class="text-left">점</td>
            <td>《 》</td>
            <td class="text-left">인용표</td>
          </tr>
          <tr>
            <td>:</td>
            <td class="text-left">두점</td>
            <td>.......</td>
            <td class="text-left">밑점</td>
          </tr>
          <tr>
            <td>,</td>
            <td class="text-left">반점</td>
            <td>〈 〉</td>
            <td class="text-left">거듭인용표</td>
          </tr>
          <tr>
            <td>？</td>
            <td class="text-left">물음표</td>
            <td>○○○, ×××, □□□</td>
            <td class="text-left">숨김표</td>
          </tr>
          <tr>
            <td>！</td>
            <td class="text-left">느낌표</td>
            <td>( )</td>
            <td class="text-left">쌍괄호</td>
          </tr>
          <tr>
            <td>-</td>
            <td class="text-left">이음표</td>
            <td>〔 〕</td>
            <td class="text-left">꺾쇠괄호</td>
          </tr>
          <tr>
            <td>－</td>
            <td class="text-left">풀이표</td>
            <td>〃</td>
            <td class="text-left">같음표</td>
          </tr>
          <tr>
            <td>…</td>
            <td class="text-left">줄임표</td>
            <td>～</td>
            <td class="text-left">물결표</td>
          </tr>
        </table>
      </div>

    </div>
    <!-- 제2항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제2항.&nbsp;</span>점(.)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>문장(감탄문과 의문문 제외)이 끝났을 때 문장끝의 오른편 아래쪽에 친다. (이 부호의 이름을 《끝점》이라 할수 있다.)
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">우리 시대는 위대한 주체시대이다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>략자나 줄임말임을 보여주기 위해 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>(1)&nbsp;</span>년, 월, 일이나 이름을 줄인 경우에는 그 수나 글자의 오른편 아래쪽에 치는것을 원칙으로 한다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">2000.10. 10<br />
                    2007. 9.<br />
                    2009.<br />
                    2001―2009.<br />
                    아. 엔. 똘스또이</td>
                </tr>
              </table>
            </div>

          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>(2)&nbsp;</span>략자나 달과 날의 수자가 합쳐져 명사화되였거나 그뒤에 자립적인 단어가 올 때에는 그 말마디의 사이에 친다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">《ㅌ.ㄷ》</td>
                </tr>
                <tr>
                  <td class="text-left">4.25 축구팀<br />
                    민족최대의 명절 4.15<br />
                    9.9절</td>
                </tr>
              </table>
            </div>
          </div>
          <p class="description">
            <span class="complement">참고</span>
            과학기술부문에서 생겨나는 준말사이에는 점을 치지 않는다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">DNA (데헥산)<br />
                  DVD (디브이디)</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>대목이나 장, 절과 같은 단계를 구분하는 경우에 친다.<br />
            1. 1) (2) ④와 같은 단계를 보여줄 때 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">제1장. 제1절. 제1조. 제6항.</td>
              </tr>
              <tr>
                <td class="text-left">Ⅰ. 1. ㄱ.</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">과. 목. 강</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">참고</span>
            반괄호나 동그라미가 있는 경우에는 치지 않는다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">1) ②</td>
              </tr>
            </table>
          </div>
          <p class="description">다음과 같은 경우에는 점을 치지 않는다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">도표1－2<br />
                  그림 2－1<br />
                  1－씨, 2－잎, 3－꽃</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제3항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제3항.&nbsp;</span>
        두점( : )
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>뒤의 설명을 보라는것을 밝히는 단어나 말마디뒤에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">례:</td>
              </tr>
              <tr>
                <td class="text-left">물음:<br />
                  대답:</td>
              </tr>
              <tr>
                <td class="text-left">김은덕동무의 토론:<br />
                  순이의 야무진 말:</td>
              </tr>
              <tr>
                <td class="text-left">열매의 종류:</td>
              </tr>
              <tr>
                <td class="text-left">실험조건:</td>
              </tr>
            </table>
          </div>

        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>맞세우는 관계를 표시하거나 단계로 됨을 구분할 때 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">배합비률은 1:2로 섞는다.<br />
                  두만강:청천강 (두만강팀:청천강팀)</td>
              </tr>
              <tr>
                <td class="text-left">10:10 (10시 10분)</td>
              </tr>
            </table>
          </div>

        </div>
      </div>
    </div>

    <!-- 제4항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제4항.&nbsp;</span>
        반점 (,)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>복합문에서 이음토가 없이 문장들이 이어질 때 단일문들사이에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">나는 로동자, 너는 농장원.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>어떤 문장이나 말마디가 렬거되거나 맺음토로 끝났다 하더라도 뒤의 문장이나 말마디와 밀접히 련관되여있을 때에는 그 맺음토의 뒤에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">왔고나, 왔고나, 혁명이 왔고나.</td>
              </tr>
              <tr>
                <td class="text-left">바람이 세다, 창문을 주의해라.</td>
              </tr>
              <tr>
                <td class="text-left">어제도 좋았고, 오늘도 좋고, 래일은 더욱 좋을 우리 생활!</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>문장속에서 같은 성분들사이를 갈라주거나 죽 들어 말한 단어들사이를 갈라주기 위해 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">도시와 농촌에서, 일터와 마을에서, 학교와 가정에서 생활은 약동하고있다.</td>
              </tr>
              <tr>
                <td class="text-left">우리는 작품창작에서 당성, 로동계급성, 인민성의 원칙을 철저히 지켜야 한다.</td>
              </tr>
              <tr>
                <td class="text-left">과수원에는 사과, 배, 복숭아 등 과일들이 대단히 많다.</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">참고</span>
            반의어적, 대구적관계에서의 렬거는 반점을 치지 않는다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">앉든가 가든가 해라.</td>
              </tr>
              <tr>
                <td class="text-left"> 가는가 마는가 하는 문제</td>
              </tr>
              <tr>
                <td class="text-left">가느냐 마느냐 빨리 결정하자.</td>
              </tr>
              <tr>
                <td class="text-left">갈가 말가 하는 태도</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>4)&nbsp;</span>문장에서 부름말, 느낌말의 뒤에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">아바이, 고맙습니다.</td>
              </tr>
              <tr>
                <td class="text-left">과장동지, 오늘 계획을 100%로 수행했습니다.</td>
              </tr>
              <tr>
                <td class="text-left">아, 우리 조국은 얼마나 아름다운가!</td>
              </tr>
              <tr>
                <td class="text-left">옳아, 네 말이 맞았어.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>5)&nbsp;</span>제시어뒤에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">당, 그가 있음으로 하여 오늘의 승리가 있다.</td>
              </tr>
              <tr>
                <td class="text-left">혁명적예술인이 되는것, 이것은 사회주의적문화예술을 창조하는 작가, 예술인들에게 있어서 가장 중요한 임무로 된다.</td>
              </tr>
              <tr>
                <td class="text-left">우리 당의 령도밑에 민족간부, 그가운데서도 기술간부가 많이 자랐다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>6)&nbsp;</span>문장성분의 차례를 바꾸어 한 부분을 특별히 힘주어 나타낼 때에는 그 힘준 말뒤에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">나가자, 판가리싸움에<br />
                  나가자, 유격전으로</td>
              </tr>
              <tr>
                <td class="text-left">그가 왔답니다, 전쟁때 우리 집에 얼마간 묵어갔던 그 군관아저씨가…</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제5항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제5항.&nbsp;</span>
        물음표(?)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>물음을 나타내는 문장의 끝에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">혁명과 건설에서 청년들이 하여야 할 임무는 무엇인가?</td>
              </tr>
              <tr>
                <td class="text-left">차는 몇시에 떠났어?</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>의심쩍거나 망설이게 됨을 나타낼 때 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">박선생이 왔다?</td>
              </tr>
              <tr>
                <td class="text-left">어떻게 할가? 이것도 가져간다?</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            수사학적물음으로 된 문장이 끝났을 때에는 점을 치는것을 원칙으로 한다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">동무가 그래서 되겠는가. 대오의 앞장에 서야 할 동무가 말이요.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제6항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제6항.&nbsp;</span>
        느낌표(!)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>느낌을 나타내는 문장끝에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">여기에 한 당원의 충성의 기록장이 있다!</td>
              </tr>
              <tr>
                <td class="text-left">아, 금강산은 참말 아름답구나!</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>부름말, 느낌말, 제시어 등이 감동적어조를 가지고있을 때 그뒤에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">동무들! 우리의 생활이 행복할수록 피눈물나던 지난날을 잊지 맙시다.</td>
              </tr>
              <tr>
                <td class="text-left">백두산! 너는 혁명의 뿌리가 내린 조종의 산, 조선의 넋이여라.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제7항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제7항.&nbsp;</span>
        이음표(-)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            두개이상의 단어가 어울리여 하나의 통일된 개념을 나타낼 때 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">조선-꾸바친선협회<br />
                  맑스-레닌주의<br />
                  굳은-넓은잎나무<br />
                  구조-문법적특성<br />
                  물리-화학적성질</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제8항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제8항.&nbsp;</span>
        풀이표(－)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>같은 종류의 문장성분들과 그것에 대한 묶음말사이에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">벼, 보리, 밀, 강냉이－이런 알곡들은…<br />
                  이런 알곡들－벼, 보리, 밀, 강냉이 등은…</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>동격어의 뒤에 칠수 있다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">영광스러운 우리 조국－조선민주주의인민공화국<br />
                  렬사들이 걸어온 길－혁명의 길은 간고하고도 영예로운 길이였다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>《에서―까지》의 뜻을 나타내기 위하여 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">평양－신의주<br />
                  6.25－7.27미제반대투쟁의 날</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>4)&nbsp;</span>특수한 글에서 주어와 술어가 토없이 맞물렸을 때 그사이에 칠수 있다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">나－《갈매기》호 선장<br />
                  철호－통신병<br />
                  순이－간호원</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제9항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제9항.&nbsp;</span>
        줄임표(…, … …, … … …)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>단락이나 그 보다 큰 단위가 줄었을 때에는 석점짜리 세개 《… … …》를 친다.
          </h3>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>문장이 줄었을 때에는 석점짜리 두개《… …》를 친다.
          </h3>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>단어나 문장의 일부 말마디가 줄었을 때 줄어진 부분에 석점《…》을 친다.
          </h3>
        </div>
      </div>

    </div>

    <!-- 제10항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제10항.&nbsp;</span>
        인용표(《》)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>이미 이루어진 말이나 대화를 인용할 때 그 문장의 앞뒤에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《야, 백두산이 보인다!》<br />
                  박동무는 《내가 이겼지.》라고 힘주어 말하였다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>말마디나 표현을 드러내서 나타날 때 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>①&nbsp;</span>도서, 작품 등의 이름을 나타내는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">도서《인민들속에서》 제15권</td>
                </tr>
                <tr>
                  <td class="text-left">《장편소설《석개울의 새봄》</td>
                </tr>
                <tr>
                  <td class="text-left">대집단체조와 예술공연《아리랑》</td>
                </tr>
                <tr>
                  <td class="text-left">태양절기념무도회《태양절을 노래하세》</td>
                </tr>
                <tr>
                  <td class="text-left">축포야회《강성대국의 불보라》</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>②&nbsp;</span>제품, 품종, 상품 등의 고유명사를 나타내는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">인공지구위성《광명성1》호</td>
                </tr>
                <tr>
                  <td class="text-left">우량벼종자《강성1》호</td>
                </tr>
                <tr>
                  <td class="text-left">무역짐배《지성5》호</td>
                </tr>
                <tr>
                  <td class="text-left">《AH－64아파치》직승기</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>③&nbsp;</span>특수하게 이루어진 단체, 기관 등의 이름을 나타내는 경우
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">《ㅌ.ㄷ》</td>
                </tr>
                <tr>
                  <td class="text-left">로씨야《평화의 오늘》위원회</td>
                </tr>
                <tr>
                  <td class="text-left">중국《환경교육보급계획》대표단</td>
                </tr>
                <tr>
                  <td class="text-left">《미국은 물러가라》위원회</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>《이른바》라는 뜻을 가지고 따온 일반적인 말마디나 부정적인 표현의 앞뒤에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《하늘의 독수리》라는 비행사</td>
              </tr>
              <tr>
                <td class="text-left">미제는《원조》를 미끼로 남의 나라를 침략한다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제11항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제11항.&nbsp;</span>
        거듭인용표(〈 〉)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            인용한 말안에 또 다른 인용문이 들어가는 경우에 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《영철동무는〈하자고 결심만 하면 못할 일이 없습니다.〉라고 하면서 계획된대로 내밀자고 토론했소.》</td>
              </tr>
              <tr>
                <td class="text-left">《우리 분조에는 〈천리마〉호가 3대나 배정되였습니다.》</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            그리고 인용표안에 들어가는 모든 인용표는 거듭인용표를 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《우리는 오늘 〈조선로동당은 영광스러운 〈ㅌ.ㄷ〉의 전통을 계승한 주체형의 혁명적당이다〉의 기본내용을 학습하겠습니다.》</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제12항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제12항.&nbsp;</span>
        쌍괄호와 꺾쇠괄호(( ), [ ])
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>본문을 보충하기 위하여 붙인 말의 앞뒤에 쌍괄호(( ))를 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">내가 대학에 입학하던 해였다.(그해도 풍년이 들었었다.) 어머니는 집을 떠나는 나에게 훌륭한 농업전문가가 되여 돌아오라고 당부하였다.</td>
              </tr>
              <tr>
                <td class="text-left">우리는 몹시 기뻤다.(분기계획을 넘쳐 수행한것으로 하여)</td>
              </tr>
              <tr>
                <td class="text-left">전보미동무(로력영웅이다.)는 오늘도 자기 계획을 2배로 넘쳐하였다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>인용하는 말이 나온 곳을 밝히는 말마디의 앞뒤에 쌍괄호(( ))를 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《인적드문 심산유곡에 구차한 생을 도모하고있는 이 늙은 백성이 오매불망 그리워하던 장군님의 존안을 이렇게 문득 뵈옵게 되니 황송하기가 그지 없습니다.》
                  (총서《불멸의 력사》중 장편소설《고난의 행군》에서)</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>괄호안에 또 다른 쌍괄호나 인용표가 있을 때 바깥것은 꺾쇠괄호([ ])로 묶는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《근대철학의 큰 기본문제는 존재에 대한 사유의 관계여하의 문제이다.》 [《루두위히 포이에르바흐와 독일고전철학의 종말》(에프 엥겔스) 조선로동당출판사
                  1957년, 25페지]</td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    </div>

    <!-- 제13항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제13항.&nbsp;</span>
        인용표와 쌍괄호안에서의 부호사용법
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>인용표나 쌍괄호안의 말이 문장인 경우에는 거기에 해당한 부호를 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《올해도 거름을 많이 냅시다! 정당 20t은 문제없습니다.》라고 분조장은 신이 나서 말한다.</td>
              </tr>
              <tr>
                <td class="text-left">우리는 매우 긴장한 투쟁을 하고있었다. (상반년계획을 4.15전으로 끝내야 했었다.)</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            《〈…〉라고》로 끝나는 경우에 《라고》의 뒤에는 해당한 부호를 치는것을 원칙으로 한다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《50t은 문제없습니다.》라고.<br />
                  《빨리 서둘자요!》라고…<br />
                  《번개》라고?</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>인용표나 쌍괄호안의 말이 문장이 아닐 때에는 아무 부호도 치지 않는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">회고록《세기와 더불어》를 학습한다.</td>
              </tr>
              <tr>
                <td class="text-left">학생들(다섯사람)은 노래부르며 마을앞을 지나갔다.</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            그러나 인용표나 쌍괄호안의 말이 여러 마디일 때에는 그것들사이를 구별하는 부호를 친다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《견주다, 겨누다, 겨루다》는 소리가 비슷하나 뜻이 다른 딴 단어들이다.</td>
              </tr>
              <tr>
                <td class="text-left">같이 있던 네사람(작업반장, 분조장, 태식아바이, 성숙)이 달려왔다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>쌍괄호안의 말이 전체 문장의 끝에 있는 경우는 괄호뒤에 아무 부호도 치지 않는다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">공든 탑이 무너지랴? (속담)</td>
              </tr>
              <tr>
                <td class="text-left">눈접방법(그림5)</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>4)&nbsp;</span>인용표안에 있는 문장의 끝에서 전체 문장도 끝나는 경우는 끝맺는 부호를 다음과 같이 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《얘, 주의해. 〈낮말은 새가 듣고 밤말은 쥐가 듣는다.〉》</td>
              </tr>
              <tr>
                <td class="text-left">《속담에도 있지만 〈때지 않은 굴뚝에서 연기날가?〉》</td>
              </tr>
              <tr>
                <td class="text-left">《동무들, 〈생산도 학습도 생활도 항일유격대식으로!〉》</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제14항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제14항.&nbsp;</span>
        밑점(......)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            문장에서 특별히 중점을 두어 강조하는 부분에 치되 점의 수는 글자의 수에 따른다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">우리의 관심은 어디서, 언제 그리고 어떻게 이 문제가 해결되였는가에 있었다.</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            중점을 두어 강조하는 부분을 드러내기 위하여서는 밑줄( )이나 물결표( )같은것도 쓸수 있다.
          </p>
        </div>
      </div>
    </div>

    <!-- 제15항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제15항.&nbsp;</span>
        숨김표(×××, □□□, ○○○ 등)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            문장에서 글자로 나타낼 필요성이 없을 때 그 글자수만큼 친다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">아프리카의 일부 지방에 들이닥친 무더기비로 ×××에서는 약 ○○○정도의 재산피해를 보았다.</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            숨김표는 출판물의 성격에 따라 동일한것을 쓸수도 있고 서로 다른것을 쓸수도 있다.<br />
            숨김표의 구체적인 이름은 다음과 같다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">가위숨김표×××(가위 가위 가위)<br />
                  네모숨김표□□□(네모 네모 네모)<br />
                  동그라미숨김표 ○○○(동그라미 동그라미 동그라미)</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제16항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제16항.&nbsp;</span>
        같음표(〃)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            같은 수량이나 수자가 겹쳐 나올 때 두번째부터의 그 부분을 나타내기 위하여 쓸수 있다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">제1작업반 50명<br />
                  제2작업반 〃<br />
                  제6작업반 〃</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            때에 따라서는 같음표를 《―〃―》로도 표시할수 있다.
          </p>
        </div>
      </div>
    </div>

    <!-- 제17항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제17항.&nbsp;</span>
        물결표(∼)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>《내지》라는 뜻으로 쓰되 단위를 나타내는 말은 마지막 수자에만 붙인다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">10∼12시</td>
              </tr>
              <tr>
                <td class="text-left">5∼8월</td>
              </tr>
              <tr>
                <td class="text-left">100∼150명</td>
              </tr>
              <tr>
                <td class="text-left">1 200∼1 600㎞/h</td>
              </tr>
              <tr>
                <td class="text-left">90 ∼100㎨</td>
              </tr>
              <tr>
                <td class="text-left">10만∼15만개</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>단위가 되풀이되면서 그 일부를 줄일 때 쓴다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">체육<br />
                  ∼가<br />
                  ∼하다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제18항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제18항.&nbsp;</span>
        제목글에서의 부호사용법
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>제목글에서 느낌문, 물음문의 경우는 문장의 끝에 해당한 부호를 치고 서술문의 경우에는 끝점을 치지 않을수 있다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">우리 식으로 꾸려놓으니 보기도 좋다!<br />
                  누가 이겼을가?<br />
                  모내기를 끝냈다</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>신문, 잡지 등의 제목글이 명명문이나 맺음토없이 끝난 문장인 경우에는 부호를 치지 않는것을 원칙으로 한다.
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">충실성의 귀감<br />
                  한 간호원에 대한 이야기</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            그러나 특별히 감정의 색채를 뚜렷이 하기 위하여 해당한 부호를 칠수도 있다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">인간에 대한 지극한 사랑!<br />
                  《힘장수?》</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제19항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제19항.&nbsp;</span>
        대목이나 장, 절, 문단 등을 가르는 부호와 그 차례(그 이름도 다음과 같이 통일하여 부르기로 한다.)
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            【 19항의 례 】
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td>Ⅰ,Ⅱ,Ⅲ</td>
                <td class="text-left">로마수자 일, 이, 삼</td>
              </tr>
              <tr>
                <td>1, 2, 3</td>
                <td class="text-left">아라비아수자 일, 이, 삼</td>
              </tr>
              <tr>
                <td>1), 2), 3)</td>
                <td class="text-left">반괄호 일, 이, 삼</td>
              </tr>
              <tr>
                <td>(1), (2), (3)</td>
                <td class="text-left">쌍괄호 일, 이, 삼</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td>ㄱ</td>
                <td class="text-left">그</td>
              </tr>
              <tr>
                <td>ㄴ</td>
                <td class="text-left">느</td>
              </tr>
              <tr>
                <td>ㄷ</td>
                <td class="text-left">드</td>
              </tr>
            </table>
          </div>
          <div class="example">
            <table>
              <tr>
                <td>①, ②, ③</td>
                <td class="text-left">동그라미 일, 이, 삼</td>
              </tr>
              <tr>
                <td>△</td>
                <td class="text-left">삼각</td>
              </tr>
              <tr>
                <td>－</td>
                <td class="text-left">풀이표</td>
              </tr>
              <tr>
                <td>○</td>
                <td class="text-left">동그라미</td>
              </tr>
              <tr>
                <td>·</td>
                <td class="text-left">풀이점</td>
              </tr>
              <tr>
                <td>※</td>
                <td class="text-left">참고표</td>
              </tr>
              <tr>
                <td>＊</td>
                <td class="text-left">꽃표</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>


    <!-- 보충항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        보충항들은 다음과 같다.
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1)&nbsp;</span>빗선(/)
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">빗선은 짝을 이르거나, 몫을 표시할 때 친다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">가/이 는/은<br />
                  1㎏/3명분 200J/100g</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2)&nbsp;</span>겹부호 (?!, !!, !?, ?? …)
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">문예작품의 글과 같이 형상성을 가진 문장에서 감정, 정서를 구체적으로 표시할 때 친다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">《대장동무, 서두르지 않아도 됩니다. 이제 곧 승용차가 올겁니다．》<br />
                  《승용차요?!》 (의문과 감탄)</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3)&nbsp;</span>련결점(……)
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <p class="description">제목이나 차례의 뒤에 보충하는 설명을 붙일 때 공백을 련결하기 위하여 칠수 있다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">제1장. 모음의 발음 ……………………1</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>4)&nbsp;</span>내려쓰는 글에서의 부호사용법
          </h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>①&nbsp;</span>점(.)과 반점(,)은 가로 쓸때와 같이 치되 오른편에 치우쳐 찍는다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">어서 가자． 사과，배 등</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>②&nbsp;</span>물음표, 느낌표, 풀이표, 줄임표, 이음표, 물결표는 가로쓸 때와 같이 치되 내려쓰는 글의 가운데에 친다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">《뭐？ 백두산！》<br />
                    《야，백두산이 보인다！》<br />
                    평양―신의주<br />
                    《어제 온다고 하던데…》<br />
                    맑스―레닌주의<br />
                    ３～４번 먹는다．</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>③&nbsp;</span>인용표, 거듭인용표, 쌍괄호는 가로쓸 때와 같이 치되 내려쓰는 글의 머리부와 끝부분에 친다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">인공지구위성《광명성２》호<br />
                    《다시한번 평양속도를 창조》<br />
                    《오늘호 〈로동신문〉소개》<br />
                    내가 난 해（２００１년）에</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="term__detail">
            <h4 class="title term__detail__title">
              <span>④&nbsp;</span>두점(:)은 줄임표(…)와의 혼돈을 피하기 위하여 글줄과 가로방향(‥)으로 친다.
            </h4>
            <div class="example">
              <table>
                <tr>
                  <td class="text-left">주원료: 사탕，우유</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->

  @include('commons.side-recently')
@endsection
