/*------------------
スクロールに応じたPCヘッダーの固定
------------------*/

$(window).on('load resize', function () {
  const winW = $(window).width();
  const devW = 767;

  if (winW <= devW) {
    //767px以下の時の処理
    const spNavPos = $('.global-nav').offset().top;
    const spNavHeight = $('.global-nav').outerHeight();

    $(window).on('scroll', () => {
      if ($(this).scrollTop() > spNavPos) {
        // $(".wrapper").css("padding-top", spNavHeight + 30);
        $('.sp-fixed').addClass('fixed');
        $('.cover__clock').addClass('fixed');
      } else {
        // $(".wrapper").css("padding-top", 20);
        $('.sp-fixed').removeClass('fixed');
        $('.cover__clock').removeClass('fixed');
      }
    });
  } else {
    //768pxより大きい時の処理
    const pcNavPos = $('.global-nav').offset().top;
    const pcNavHeight = $('.global-nav').outerHeight();

    $(window).on('scroll', () => {
      if ($(this).scrollTop() > pcNavPos) {
        // $(".wrapper").css("padding-top", pcNavHeight + 20);
        $('.global-nav').addClass('fixed');
        $('#sidemenu').addClass('fixed');
      } else {
        // $(".wrapper").css("padding-top", 50);
        $('.global-nav').removeClass('fixed');
        $('#sidemenu').removeClass('fixed');
      }
    });
  }
});

/*------------------
SP用ハンバーガーメニュー
------------------*/
$('.sp-btn').on('click', () => {
  $('html').toggleClass('open');
});

/*------------------
トップへ戻るボタン
------------------*/
// ボタンの表示／非表示を切り替える関数
const updateButton = () => {
  if ($(window).scrollTop() >= 220) {
    $('.back-to-top').fadeIn();
  } else {
    $('.back-to-top').fadeOut();
  }
};

// スクロールされる度にupdateButtonを実行
$(window).on('scroll', updateButton);

// ボタンをクリックしたらページトップにスクロールする
$('.back-to-top').on('click', (e) => {
  e.preventDefault();

  // 600ミリ秒かけてトップに戻る
  $('html, body').animate({ scrollTop: 0 }, 600);
});

// ページの途中でリロード（再読み込み）された場合でも、ボタンが表示されるようにする
updateButton();

/*------------------
規範原文ページの内容の表示/非表示切り替え
------------------*/
// 항 해설 표시 초기설정
// $('.term__description').hide();

// 항 해설 여닫기
$('.ex-btn').on('click', (e) => {
  const $clickedBtn = $(e.target);
  const clickedBtnStatus = $clickedBtn.hasClass('fa-plus');
  const selectedItem = $clickedBtn.parent().next();

  if (clickedBtnStatus === true) {
    $clickedBtn.removeClass('fa-plus');
    $clickedBtn.addClass('fa-minus');
    selectedItem.show();
  } else {
    $clickedBtn.removeClass('fa-minus');
    $clickedBtn.addClass('fa-plus');
    selectedItem.hide();
  }
});

// 전체해설보기
$('.all-ex-btn').on('click', (e) => {
  const status = $(e.target).text();

  if (status === '전체해설보기') {
    $('.all-ex-btn span').text('전체해설닫기');
    $('.ex-btn').removeClass('fa-plus');
    $('.ex-btn').addClass('fa-minus');
    $('.term__description').show();
  } else {
    $('.all-ex-btn span').text('전체해설보기');
    $('.ex-btn').removeClass('fa-minus');
    $('.ex-btn').addClass('fa-plus');
    $('.term__description').hide();
  }
});

/*------------------
スクロールに応じた各種処理
------------------*/

//スクロール発火処理
const scrollEffect = (element, adjustVlaue) => {
  $(`.${element}`).each(function () {
    const scroll = $(window).scrollTop(); //現在のyスクロール量を取得
    const windowHeight = $(window).height(); //ウィンドウの高さを取得
    const targetPos = $(this).offset().top; //ターゲットのy位置を取得
    //const subjectHeight = $(this).innerHeight(); //ターゲットの高さを取得
    const threshould = targetPos - windowHeight + adjustVlaue; //発火位置調整

    if (scroll > threshould) {
      $(this).addClass('isActive');
    } else {
      $(this).removeClass('isActive');
    }
  });
};

//強調箇所に下線を引く
$(window).scroll(() => {
  scrollEffect('moving-underline', 150);
});

/*------------------
検索ボックスの切り替え
------------------*/
// const showTab = (selector) => {
//   $('.top-search__tabs > div').removeClass('active');
//   $(`#${selector}`).addClass('active');

//   const idStr = selector.slice(-1);
//   $('.top-search__box > div').hide();
//   $(`#search-box-${idStr}`).show();
// };

// $('.top-search__tabs > div').on('click', (e) => {
//   const selector = $(e.target).attr('id');
//   showTab(selector);
// });

// showTab('search-tab-a');


