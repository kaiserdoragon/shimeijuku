
// ヘッダーのスクロール位置を取得 /////////////////////////////////////////////
// headerの高さ分スクロールしたら、-fixedクラスをつける。
const Header = document.getElementById("js-header");
if (Header) {
  const options = {
    root: null,
    rootMargin: `${Header.offsetHeight}px 0px ${document.body.clientHeight}px 0px`,
    threshold: 1,
  };

  const observer = new IntersectionObserver(change_header, options);
  observer.observe(document.body);
  function change_header(entries) {
    if (!entries[0].isIntersecting) {
      Header.classList.add("-fixed");
    } else {
      Header.classList.remove("-fixed");
    }
  }
}

// ページトップへ移動するボタン(クリックでページトップへスクロール) ///////////////////////////
const Totop = document.getElementById("js-totop");
if (Totop) {
  Totop.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
}

// アンカーリンクのスムーススクロール //////////////////////////////////////////////
// iOSでスムーススクロールをするためには「<script src=" https://polyfill.io/v3/polyfill.min.js?features=smoothscroll"></script>」を読み込む必要がある。
const headerHeight = ((load) => {
  return load ? document.getElementsByClassName("header")[0].offsetHeight : 0;
})(true); // ※ヘッダー高さをロード時にはかりたいときは、ここをtrueにする

const anchor = document.querySelectorAll("a[href*='#']:not(.is-noscroll)"); // 発火しない場合は「.is-noscroll」
[...anchor].forEach((element) => {
  const target = ((hash) => {
    return hash
      ? document.querySelector(element.hash)
      : console.error(`リンクが空です。 ${element.outerHTML}`);
  })(element.hash);

  if (target) {
    element.addEventListener("click", (e) => {
      e.preventDefault();
      window.scrollTo({
        top: target.offsetTop - headerHeight,
        behavior: "smooth",
      });
    });
  }
});

//別URLからやってきたときに発火
window.addEventListener("load", () => {
  const url = window.location.href;
  if (url.indexOf("#") !== -1) {
    const id = url.split("#");
    const target = document.getElementById(id[id.length - 1]);
    if (target) {
      window.scroll({ top: 0 });
      window.scroll({ top: target.offsetTop - headerHeight, behavior: "smooth" });
    }
  }
});


// ハンバーガーメニュー
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger-overlay");
  const nav = document.querySelector(".nav-overlay");
  const mql = window.matchMedia("(min-width: 1024px)");

  if (!hamburger || !nav) return;

  function isDesktop() { return mql.matches; }

  // 共通の状態反映（モバイル時のみクラス・属性を効かせる）
  function setOpen(isOpen) {
    const desktop = isDesktop();

    // PCでは .active を付けても表示は常時なので影響しないが、
    // クラスはモバイル専用の表現として制御する
    hamburger.classList.toggle("active", !desktop && isOpen);
    nav.classList.toggle("active", !desktop && isOpen);

    // アクセシビリティ: PCでは常時 aria-hidden=false / inert=false
    hamburger.setAttribute("aria-expanded", String(!desktop && isOpen));
    nav.setAttribute("aria-hidden", String(desktop ? false : !isOpen));

    if ("inert" in nav) {
      // モバイルのみフォーカス/入力を無効化
      nav.inert = desktop ? false : !isOpen;
      // inert はフォーカス・入力を無効化します（視覚はCSS側で制御）。:contentReference[oaicite:2]{index=2}
    }

    // 背景スクロールロックはモバイル時のみ
    document.documentElement.classList.toggle("is-locked", !desktop && isOpen);
  }

  // ブレークポイント跨ぎ用：トランジション無効で即座に状態反映
  function setOpenInstant(isOpen) {
    nav.classList.add("no-transition");
    setOpen(isOpen);
    void nav.offsetHeight; // reflow
    nav.classList.remove("no-transition");
  }

  // 初期状態は閉（モバイル時）。PCではCSSで常時表示されるため問題なし
  setOpen(false);

  hamburger.addEventListener("click", () => {
    if (isDesktop()) return; // PCではハンバーガー無効
    setOpen(!hamburger.classList.contains("active"));
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && !isDesktop() && nav.classList.contains("active")) {
      setOpen(false);
    }
  });

  // ブレークポイントを跨いだら“即時”で閉じる（PCに入る瞬間の残留状態を掃除）
  mql.addEventListener("change", () => {
    setOpenInstant(false);
  });
});










(function ($, root, undefined) {
  // ドロップダウンメニュー
  $(function () {
    $(".nav-overlay__item").hover(
      function () {
        $(this).children(".dropdownmenu").stop(true, true).slideDown(500);
      },
      function () {
        $(this).children(".dropdownmenu").stop(true, true).slideUp(500);
      }
    );
  });


  // アコーディオンメニュー＋閉じるボタン
  $(document).ready(function () {
    let accordionDetails = '.js-accordion';
    let accordionSummary = '.js-accordion--ttl';
    let accordionContent = '.js-accordion--content';
    let speed = 500;

    $(accordionSummary).each(function () {
      $(this).on("click", function (event) {
        $(this).toggleClass("is-active");
        event.preventDefault();
        if ($(this).parent($(accordionDetails)).attr("open")) {
          $(this).nextAll($(accordionContent)).slideUp(speed, function () {
            $(this).parent($(accordionDetails)).removeAttr("open");
            $(this).show();
          });
        } else {
          $(this).parent($(accordionDetails)).attr("open", "true");
          $(this).nextAll($(accordionContent)).hide().slideDown(speed);
        }
      });

      $(this).closest(accordionDetails).find('.close-btn').on('click', function (eventclosee) {
        eventclosee.preventDefault();
        $(this).closest(accordionDetails).find(accordionSummary).removeClass("is-active");
        $(this).closest(accordionContent).slideUp(speed, function () {
          $(this).closest(accordionDetails).removeAttr("open");
        });
      });
    });
  });




  // 変数に要素を入れる
  var trigger = $('.js-modal_trigger'),
    wrapper = $('.modal_contents'),
    layer = $('.modal__layer'),
    container = $('.modal__container'),
    close = $('.modal__close');

  // 『モーダルを開くボタン』をクリックしたら、『モーダル本体』を表示
  $(trigger).click(function () {
    var index = $(this).index();
    $(wrapper).eq(index).fadeIn(400);

    // スクロール位置を戻す
    $(container).scrollTop(0);

    // サイトのスクロールを禁止にする
    $('html, body').css('overflow', 'hidden');
  });

  // 『背景』と『モーダルを閉じるボタン』をクリックしたら、『モーダル本体』を非表示
  $(layer).add(close).click(function () {
    $(wrapper).fadeOut(400);

    // サイトのスクロール禁止を解除する
    $('html, body').removeAttr('style');
  });

})(jQuery, this);
