@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 띄여쓰기규정')

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
      <span itemprop="name">띄여쓰기규정</span>
      <meta itemprop="position" content="3" />
    </li>
  </ol>
@endsection

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="main">
    <h1 class="page-title">띄여쓰기규정</h1>
    <button class="btn all-ex-btn">
      <i class="fas fa-bars"></i>&nbsp;
      <span>전체해설닫기</span>
    </button>

    <div class="introduction">
      <p>위대한 수령 김일성동지께서는 다음과 같이 교시하시였다.</p>
      <p>
        <span> 《우리 글을 보기 헐하게 하려면 띄여쓰기를 잘 규정하여주는것이 중요합니다.》 </span>
      </p>
      <p class="text-right">(《김일성전집》36권, 512페지)</p>
    </div>

    <!-- 총칙 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;총&nbsp;칙&nbsp;</span>
      </h2>
      <div class="term">
        <p class="description">단어를 단위로 띄여쓰는것을 원칙으로 하되 글을 읽고 리해하기 쉽게 일부 경우에는 붙여쓴다.</p>
      </div>
    </div>

    <!-- 제1항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제1항.&nbsp;</span>
        토뒤의 단어나 품사가 서로 다른 단어는 띄여쓴다.
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">【 1항의 례 】</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">선군정치는 민족의 자주성을 위한 필승의 보검이다.</td>
              </tr>
              <tr>
                <td class="text-left">하나에 하나를 합하면 더 큰 하나가 된다.</td>
              </tr>
              <tr>
                <td class="text-left">두 대학생의 아름다운 소행</td>
              </tr>
              <tr>
                <td class="text-left">온갖 새들이 찾아드는 숲</td>
              </tr>
              <tr>
                <td class="text-left">전쟁시기 잘 싸운 로병부부</td>
              </tr>
              <tr>
                <td class="text-left">아, 얼마나 아름다운 마을인가!</td>
              </tr>
              <tr>
                <td class="text-left">옴의 법칙, 피타고라스의 정리</td>
              </tr>
              <tr>
                <td class="text-left">저녁을 먹은 후에 보자.</td>
              </tr>
              <tr>
                <td class="text-left">일을 시작하기 전에 준비작업을 빈틈없이 해야 한다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- 제2항 -->
    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;제2항.&nbsp;</span>
        하나의 대상이나 행동, 상태를 나타내는 말마디들은 토가 끼이였거나 품사가 달라도 붙여쓴다.
      </h2>
      <!-- 1) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title"><span>1)&nbsp;</span>토가 없이 이루어져 하나의 대상, 행동, 상태를 나타내는 경우</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">선군혁명로선, 군사중시사상, 조선민족제일주의</td>
              </tr>
              <tr>
                <td class="text-left">
                  건설하다, 각성되다, 궐기시키다, 꽃피다, 불타다, 애쓰다, 때이르다,<br />
                  가슴뜨겁다, 기쁨어리다, 꿈꾸다, 잠자다
                </td>
              </tr>
              <tr>
                <td class="text-left">척척박사, 갑작부자, 만세소리</td>
              </tr>
              <tr>
                <td class="text-left">1호발전기, 3호변전소</td>
              </tr>
              <tr>
                <td class="text-left">최신형설비, 혁명적군인정신, 조선식사회주의</td>
              </tr>
              <tr>
                <td class="text-left">세손가락울림법, 미리덥히기, 갑작변이</td>
              </tr>
              <tr>
                <td class="text-left">새날, 새서방, 별말씀, 온종일, 총지휘자, 총참모부, 대조선정책</td>
              </tr>
              <tr>
                <td class="text-left">아침저녁, 서로서로, 가슴깊이, 다같이, 때아닌, 첫째가는, 지대공미싸일</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 2) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title"><span>2)&nbsp;</span>토를 가지고 이루어져 하나의 대상, 행동, 상태를 나타내는 경우</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">작은아버지, 큰고모, 잔돈, 멜가방, 앉을자리, 가까운바다, 먼바다, 찬단물, 식은땀</td>
              </tr>
              <tr>
                <td class="text-left">모내는기계, 붉은기, 푸른색, 짠맛, 신맛</td>
              </tr>
              <tr>
                <td class="text-left">
                  떨어지다, 몰아치다, 놀아나다, 빚어내다, 먹어대다, 붙어잡다,<br />
                  놀고먹다, 가고말다, 먹고싶다, 짜고들다, 가르쳐주다, 돌아보다, 들었다놓다
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  여러말할것없이, 의심할바없는, 아니나다를가, 가나오나, 가든오든,<br />
                  가건말건, 달디단, 가네오네, 죽기내기로, 하다못해, 왜냐하면, 무엇보다먼저
                </td>
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
        고유한 대상의 이름은 붙여쓰되 마디를 이루면서 잇달리는것은 매 마디마디 띄여쓴다.
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">【 3항의 례 】</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">
                  조선로동당, 조선민주주의인민공화국, 김책공업종합대학,<br />
                  대동문식료품상점, 리계순사리원제1사범대학
                </td>
              </tr>
              <tr>
                <td class="text-left">조선로동당 평양시 중구역위원회, 평양시 중구역 대동문동, 사회과학원 행정조직국</td>
              </tr>
              <tr>
                <td class="text-left">조선통일지지 라오스위원회, 아시아지역 주체사상연구소</td>
              </tr>
              <tr>
                <td class="text-left">제20차 4월의 봄 친선예술축전, 로씨야 차이꼽스끼명칭 모스크바국립음악대학합창단</td>
              </tr>
              <tr>
                <td class="text-left">
                  조선로동당 중앙위원회 제○기 제○차전원회의,<br />
                  조선민주주의인민공화국창건 56돐기념 중앙과학토론회
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  근위 서울류경수105땅크사단, 금성친위 제○○군부대,<br />
                  2중3대학명붉은기 ○○공장, 3중영예의 붉은기 ○○소학교
                </td>
              </tr>
              <tr>
                <td class="text-left">김영남군당책임비서, 리순실동사무장, 리남순과학지도국장, 리철호실장선생</td>
              </tr>
              <tr>
                <td class="text-left">인민과학자, 원사, 교수, 박사 ○○○선생</td>
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
        수사는 백, 천, 만, 억, 조단위로 띄여쓰며 수사뒤에 오는 단위명사와 일부 단어는 붙여쓴다.
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">【 4항의 례 】</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">3조 2억 8천만</td>
              </tr>
              <tr>
                <td class="text-left">7만 8천 6백 20</td>
              </tr>
              <tr>
                <td class="text-left">닭알 3알, 살림집 두동, 학습장 5권</td>
              </tr>
              <tr>
                <td class="text-left">70평생, 60나이, 20여성상, 3년세월</td>
              </tr>
              <tr>
                <td class="text-left">서른살가량, 20명정도, 10℃이하, 150%</td>
              </tr>
            </table>
          </div>
          <p class="description">
            <span class="complement">붙임</span>
            수량수사는 옹근수인 경우 왼쪽으로 가면서, 소수인 경우 오른쪽으로 가면서 세단위씩 띄여쓴다.
          </p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">
                  1 000 000 000(10억)<br />
                  0.002 321 67
                </td>
              </tr>
            </table>
          </div>
          <p class="description">그러나 대상화된 단어이거나 고유명사인 경우는 붙여쓴다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">
                  1211고지, 3000t급배,<br />
                  국규 1215:2008(2008년도 1215번으로 등록)
                </td>
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
        불완전명사(단위명사 포함)는 앞단어에 붙여쓰되 그뒤에 오는 단어는 띄여쓰는것을 원칙으로 한다.
      </h2>
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">【 5항의 례 】</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">아는것이 힘이다. 모르면서 아는체 하는것은 나쁜 버릇이다.</td>
              </tr>
              <tr>
                <td class="text-left">힘든줄 모르고 일한다.</td>
              </tr>
              <tr>
                <td class="text-left">커서 인민군대가 될터이다.</td>
              </tr>
              <tr>
                <td class="text-left">4월초 봄날씨, 2일부 《로동신문》</td>
              </tr>
              <tr>
                <td class="text-left">3개 공병려단</td>
              </tr>
            </table>
          </div>
          <p class="description">※《등, 대, 겸》은 다음과 같이 띄여쓴다.</p>
          <div class="example">
            <table>
              <tr>
                <td class="text-left">알곡 대 알곡, 부총리 겸 재정상</td>
              </tr>
              <tr>
                <td class="text-left">사과, 배, 복숭아 등(등등)</td>
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
        단어들사이의 맞물림관계를 고려하여 뜻을 리해하기 쉽게 띄여쓰기를 할수 있다.
      </h2>
      <!-- 1) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title"><span>1)&nbsp;</span>앞단어와 맞물리지 않는 단어는 띄여쓴다.</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">이 나라 주재 우리 나라 대사관</td>
              </tr>
              <tr>
                <td class="text-left">고유한 우리 말 어근으로 새말을 만든다.</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 2) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title"><span>2)&nbsp;</span>붙여쓰면 두가지 뜻으로 리해될수 있는것은 뜻이 통하게 띄여쓴다.</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">
                  김인옥어머니(어머니자신)<br />
                  김인옥 어머니(김인옥의 어머니)
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  중세 언어연구(중세에 진행된 언어연구)<br />
                  중세언어 연구(중세의 언어에 대한 연구)
                </td>
              </tr>
              <tr>
                <td class="text-left">
                  사리원, 평산일대(두 지역 포괄)<br />
                  사리원, 평산 일대(사리원일대, 평산일대)
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <!-- 3) -->
      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title"><span>3)&nbsp;</span>토없이 결합된 단위가 너무 길어 읽고 리해하기 힘들 때에는 뜻단위로 띄여쓸수 있다.</h3>
          <i class="ex-btn fas fa-plus"></i>
        </div>
        <div class="term__description">
          <div class="example">
            <table>
              <tr>
                <td class="text-left">3대혁명붉은기쟁취운동 궐기모임 참가자들</td>
              </tr>
              <tr>
                <td class="text-left">중증 급성 호흡기증후군</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->

  @include('commons.side')
@endsection
