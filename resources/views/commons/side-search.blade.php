<div class="top-search">
  <div class="top-search__heading">기사, 질문 검색</div>

  <div class="top-search__tabs">
    <div id="search-tab-a">제목</div>
    <div id="search-tab-b">전체</div>
  </div>

  <div class="top-search__box">
    <div class="top-search__title" id="search-box-a">
      <form action="{{ route('search') }}" class="top-search__form">
        <div class="top-search__select">
          {{-- <select name="range" id="range">
            <option value="1">제목</option>
            <option value="2">전체</option>
          </select> --}}
          <input type="search" name="word" id="word" />
        </div>
        <div class="top-search__radio">
          <div>
            <input type="radio" name="category" id="radio-a" value="1" checked />
            <label for="radio-a">전체</label>
          </div>
          <div>
            <input type="radio" name="category" id="radio-b" value="2" />
            <label for="radio-b">학습실</label>
          </div>
          <div>
            <input type="radio" name="category" id="radio-c" value="3" />
            <label for="radio-c">질문게시판</label>
          </div>
        </div>
        <div class="top-search__submit">
          <input type="submit" value="검색" class="btn global-btn" />
        </div>
      </form>
    </div>

    <div class="top-search__all" id="search-box-b">
      <script async src="https://cse.google.com/cse.js?cx=cbbfdeb59ef399f5b"></script>
      <div class="gcse-searchbox-only"></div>
    </div>
  </div>
</div>
