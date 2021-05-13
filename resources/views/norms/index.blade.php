@extends('layouts.app')

@section('title', '얼 -우리 말 배움터- 규범원문')

@section('breadcrumb')
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ url('/') }}">
        <span itemprop="name">홈</span>
      </a>
      <meta itemprop="position" content="1" />
    </li>

    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name">규범원문</span>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
@endsection

@section('content')
  <!-- ↓↓↓メインコンテンツ↓↓↓ -->
  <main id="main">
    <div class="category-page-title">
      <img src="{{ asset('img/title/category_title_01.png') }}" alt="" />
      <h1>규범원문</h1>
    </div>

    <div class="category-page-introduction">
      <p>여기서는 현재 우리 나라에서 시행되는 <span class="text-emphasis">언어규범의 원문</span>들을 그대로 보여주었습니다.</p>
      <p>
        리용자들의 편의를 도모하기 위하여 <span class="text-underline">난해한 용어</span>나
        <span class="text-underline">북남간의 차이</span> 같은데 대한 해설을 비롯한 <span class="text-emphasis">간단한 해설</span>도 덧붙였습니다.
      </p>
    </div>

    <div class="category-page-sub">
      <ul class="list list__sticker">
        <li>
          <a href="{{ route('norms', 'orthography') }}"><i class="fas fa-angle-double-right"></i> 맞춤법</a>
        </li>
        <li>
          <a href="{{ route('norms', 'pronouciation') }}"><i class="fas fa-angle-double-right"></i> 문화어발음법</a>
        </li>
        <li>
          <a href="{{ route('norms', 'space') }}"><i class="fas fa-angle-double-right"></i> 띄여쓰기규정</a>
        </li>
        <li>
          <a href="{{ route('norms', 'space-desc') }}"><i class="fas fa-angle-double-right"></i> 띄여쓰기규정해설</a>
        </li>
        <li>
          <a href="{{ route('norms', 'symbol') }}"><i class="fas fa-angle-double-right"></i> 문장부호법</a>
        </li>
        <li>
          <a href="{{ route('norms', 'foreign') }}"><i class="fas fa-angle-double-right"></i> 외국말적기법</a>
        </li>
        <li>
          <a href="{{ route('norms', 'latin') }}"><i class="fas fa-angle-double-right"></i> 라틴문자표기법</a>
        </li>
      </ul>
    </div>

    {{-- 맞춤법 --}}
    <div class="category-page-block">
      <div class="block-title">
        <img src="{{ asset('img/block/bg_block_01.png') }}" alt="" />
        <h2>맞춤법</h2>
      </div>
      <div class="block-description">
        <p>
          <span class="text-underline">조선말을 조선글자로 표기할 때 어떤 경우에 어떻게 적어야 하는가</span> 하는데 대하여 정해놓은
          서사규범입니다.
        </p>
        <p>
          현행규범은 <span class="text-emphasis">2010년 10월</span>에 나온 조선민주주의인민공화국 국어사정위원회
          <span class="text-emphasis">《조선말규범집》</span>에 실렸습니다.
        </p>
        <a href="{{ route('norms', 'orthography') }}" class="btn"><i class="fas fa-angle-double-right"></i> 원문보기</a>
      </div>
    </div>

    {{-- 문화어발음법 --}}
    <div class="category-page-block">
      <div class="block-title">
        <img src="{{ asset('img/block/bg_block_02.png') }}" alt="" />
        <h2>문화어발음법</h2>
      </div>
      <div class="block-description">
        <p><span class="text-underline">조선말을 어떤 경우에 어떻게 발음해야 하는가</span> 하는데 대하여 정해놓은 발음규범입니다.</p>
        <p>
          현행규범은 <span class="text-emphasis">2010년 10월</span>에 나온 조선민주주의인민공화국 국어사정위원회
          <span class="text-emphasis">《조선말규범집》</span>에 실렸습니다.
        </p>
        <a href="{{ route('norms', 'pronouciation') }}" class="btn"><i class="fas fa-angle-double-right"></i> 원문보기</a>
      </div>
    </div>

    {{-- 띄여쓰기규정 --}}
    <div class="category-page-block">
      <div class="block-title">
        <img src="{{ asset('img/block/bg_block_03.png') }}" alt="" />
        <h2>띄여쓰기규정</h2>
      </div>
      <div class="block-description">
        <p>
          <span class="text-underline">조선말을 적을 때 어떤 경우에 띄여쓰고 어떤 경우에 붙여써야 하는가</span> 하는데 대하여 정해놓은
          서사규범입니다.
        </p>
        <p>
          현행규범은 <span class="text-emphasis">2010년 10월</span>에 나온 조선민주주의인민공화국 국어사정위원회
          <span class="text-emphasis">《조선말규범집》</span>에 실렸습니다.
        </p>
        <a href="{{ route('norms', 'space') }}" class="btn"><i class="fas fa-angle-double-right"></i> 원문보기</a>
      </div>
    </div>

    {{-- 띄여쓰기규정해설 --}}
    <div class="category-page-block">
      <div class="block-title">
        <img src="{{ asset('img/block/bg_block_04.png') }}" alt="" />
        <h2>띄여쓰기규정해설</h2>
      </div>
      <div class="block-description">
        <p>2010년에 나온 <span class="text-underline">《띄여쓰기규정》에 대하여 상세히 설명한 글</span>입니다.</p>
        <p>
          《띄여쓰기규정》자체는 상당히 추상적이기때문에 《띄여쓰기규정》에 대하여 잘 알고 규정에 따라 띄여쓰기를 잘하려면 이 글을 참고하는것이
          좋을것입니다.
        </p>
        <p>
          여기서는 조선민주주의인민공화국 국어사정위원회가 <span class="text-emphasis">2008년 8월</span>에 출판한 《띄여쓰기규정해설》을 그대로
          보여주었습니다.
        </p>
        <a href="{{ route('norms', 'space-desc') }}" class="btn"><i class="fas fa-angle-double-right"></i> 원문보기</a>
      </div>
    </div>

    {{-- 문장부호법 --}}
    <div class="category-page-block">
      <div class="block-title">
        <img src="{{ asset('img/block/bg_block_01.png') }}" alt="" />
        <h2>문장부호법</h2>
      </div>
      <div class="block-description">
        <p><span class="text-underline">조선말을 적을 때 언제 어떤 문장부호를 써야 하는가</span> 하는데 대하여 정해놓은 서사규범입니다.</p>
        <p>
          현행규범은 <span class="text-emphasis">2010년 10월</span>에 나온 조선민주주의인민공화국 국어사정위원회
          <span class="text-emphasis">《조선말규범집》</span>에 실렸습니다.
        </p>
        <a href="{{ route('norms', 'symbol') }}" class="btn"><i class="fas fa-angle-double-right"></i> 원문보기</a>
      </div>
    </div>

    {{-- 외국말적기법 --}}
    <div class="category-page-block">
      <div class="block-title">
        <img src="{{ asset('img/block/bg_block_02.png') }}" alt="" />
        <h2>외국말적기법</h2>
      </div>
      <div class="block-description">
        <p><span class="text-underline">외국말을 조선글자로 적을 때 어떻게 적어야 하는가</span>를 정해놓은 서사규범입니다.</p>
        <p>조선말에서 <span class="text-emphasis">외래어로 굳어지지 않은 외국말들을 조선글자로 적으려 할 때</span>는 이 규범을 따라야 합니다.</p>
        <p>
          여기서는 <span class="text-emphasis">2012년</span>에 나온 조선민주주의인민공화국 국어사정위원회 《외국말적기법》가운데서
          <span class="text-emphasis">《일본말단어를 우리 글자로 적는 법》</span>과
          <span class="text-emphasis">《영어 단어를 우리 글자로 적는 법》</span>을 보여주었습니다.
        </p>
        <!-- <p class="sub-description">
                  ※ 《외국말적기법》은 모두 51개 언어를 조선글자로 적는 법을 규정하였습니다. 일본말, 영어외 언어에 대한 자료가 요구되시는분은 문의하기를
                  통하여 문의하여주십시오.
                </p> -->
        <a href="{{ route('norms', 'foreign') }}" class="btn"><i class="fas fa-angle-double-right"></i> 원문보기</a>
      </div>
    </div>

    {{-- 라틴문자표기법 --}}
    <div class="category-page-block">
      <div class="block-title">
        <img src="{{ asset('img/block/bg_block_03.png') }}" alt="" />
        <h2>라틴문자표기법</h2>
      </div>
      <div class="block-description">
        <p><span class="text-underline">조선말을 라틴문자로 옮겨적을 때 어떻게 적어야 하는가</span> 하는데 대하여 정해놓은 서사규범입니다.</p>
        <p>
          현재 우리 나라에서는 <span class="text-emphasis">1992년 7월</span>에 조선민주주의인민공화국 외국어번역용어통일 및 급수사정위원회가
          내놓은 《조선어의 라틴문자표기법》을 리용하고있습니다.
        </p>
        <a href="{{ route('norms', 'latin') }}" class="btn"><i class="fas fa-angle-double-right"></i> 원문보기</a>
      </div>
    </div>
  </main>
  <!-- ↑↑↑メインコンテンツ↑↑↑ -->

  @include('commons.side')
@endsection
