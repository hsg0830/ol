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
      <span itemprop="name">외국말적기법</span>
      <meta itemprop="position" content="3" />
    </li>
  </ol>
@endsection

@section('content')
  <main id="main">

    <h1 class="page-title" style="margin-bottom: 4rem;">외국말적기법</h1>

    <div class="message block" style="margin: 1rem auto 3rem; width: 90%">
      <h2  class="category-title">바로가기</h2>
      <ul style="font-size: 2.4rem">
        <li><a href="{{ url('/norms/foreign-en')}}"><i class="fas fa-angle-double-right"></i>&nbsp;영어단어를 우리 글로 적는 법</a></li>
      </ul>
    </div>

    <div class="chapter">
      <h2 class="title chapter__title">
        <span><i class="fas fa-feather-alt"></i>&nbsp;</span>
        일러두기
      </h2>

      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>1.&nbsp;</span>세계 언어들의 개별적적기법들은 해당 나라 말 자모의 차례에 따라 배렬하였다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
        {{-- <div class="term__description">
        </div> --}}
      </div>

      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>2.&nbsp;</span>개별적적기법은 그것을 적용하는 나라의 공용어(국어)뿐아니라 그 발음으로 불리우는 원주민토착어, 소수민족어, 제3국언어와 해당 언어의 모든 어휘부류들을 우리 글로
            적는데 다같이 쓰도록 작성하였다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
        {{-- <div class="term__description">
        </div> --}}
      </div>

      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>3.&nbsp;</span>해당 외국문에 쓰이는 글자들을 밝힌 개별적적기법의 항목에서 괄호( )안에 넣은것은 그 언어에서 외래어를 적는데만 쓰이는 글자이다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
        {{-- <div class="term__description">
        </div> --}}
      </div>

      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>4.&nbsp;</span>개별적적기법의 대응적기표에서 모든 올림글자들은 해당 언어의 자모순에 따라 올렸다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
        {{-- <div class="term__description">
        </div> --}}
      </div>

      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>5.&nbsp;</span>변형글자(례: Ä, Ø 등)는 그 언어의 자모순에 관계없이 원형글자(례: A, O 등) 다음에 올렸다.
            외국말 글자결합은 해당 언어의 자모순에 맞게 그 첫 글자의 자모순자리에서만 취급하고 뒤글자의 자리에는 거듭하여 올리지 않았다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
        {{-- <div class="term__description">
        </div> --}}
      </div>

      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>6.&nbsp;</span>세계 언어들의 겹모음결합글자(례: EI)의 발음을 우리 글자로 적을 때 그의 개별적요소들이 각각 홑모음자의 발음과 같게 적게 되는 경우(례: 《ㅔ이》)에는 그 결합글자를 따로 올리지 않았다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
        {{-- <div class="term__description">
        </div> --}}
      </div>

      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>7.&nbsp;</span>외국말의 홑모음이나 겹모음의 첫소리를 적는데서 우리 소리마디글자의 소리없는 글자 《ㅇ》은 대응적기표의 《우리 글자》란에서 쓰지 않고 낱소리모음자만 썼다. (례: 아→《ㅏ》, 웬→《 》, 아이→《ㅏ이》)
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
        {{-- <div class="term__description">
        </div> --}}
      </div>

      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>8.&nbsp;</span>대응적기표의 《우리 글자》란에 쓰인 부호들은 각각 다음과 같은것을 표기한다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
        {{-- <div class="term__description">
        </div> --}}
        <div class="example">
          <table>
            <tr>
              <td class="text-left">○－ : 소리마디 첫 글자</td>
            </tr>
            <tr>
              <td class="text-left">－○ : 소리마디 끝글자(받침)</td>
            </tr>
            <tr>
              <td class="text-left">－○○－ : 앞소리마디의 끝글자(받침)와 뒤소리마디의 첫 글자</td>
            </tr>
            <tr>
              <td class="text-left">○× : 올림글자를 없는것으로 치고 우리 글자를 대응시키지 않는것</td>
            </tr>
          </table>
        </div>
      </div>

      <div class="term">
        <div class="term__head-wrapper">
          <h3 class="title term__title">
            <span>9.&nbsp;</span>대응적기표의 《조건》란은 원어글자를 우리 글자로 적는데 작용하는 위치적 및 결합적조건을 밝힌것이다. 《조건》란에 아무것도 밝혀주지 않은것은 《모든 경우》를 말한다.
          </h3>
          {{-- <i class="ex-btn fas fa-plus"></i> --}}
        </div>
        {{-- <div class="term__description">
        </div> --}}
      </div>
    </div>


    <div class="message block" style="margin: 1rem auto 2rem; width: 90%">
      <h2  class="category-title">바로가기</h2>
      <ul style="font-size: 2.4rem">
        <li><a href="{{ url('/norms/foreign-en')}}"><i class="fas fa-angle-double-right"></i>&nbsp;영어단어를 우리 글로 적는 법</a></li>
      </ul>
    </div>
  </main>

  @include('commons.side')
@endsection
