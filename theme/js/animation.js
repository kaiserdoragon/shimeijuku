console.log("animation");

/*------------------------------- //
フェードインアニメーション
// -------------------------------*/

// 画面内に入ったらクラス名を付ける
const Target = document.querySelectorAll(".is-fadein"); // ターゲットとする対象を指定

const Options = {
  root: null, // 基準にする要素(nullはbody)
  rootMargin: "0px 0px", // 上下左右の位置
  threshold: "0",
};

// Observerのインスタンスを作成
const Observer = new IntersectionObserver(change_target, Options);

// 取得した要素を監視対象に登録
for (let i = 0; i < Target.length; i++) {
  Observer.observe(Target[i]);
}

// クラス名を付け外しする
function change_target(entries, Observer) {
  entries.forEach((entry, index) => {
    const Target = entry.target;
    if (entry.isIntersecting) {
      Target.classList.add("is-animation");
      // 一度アニメーションしたら監視を解除
      Observer.unobserve(Target);
    } else {
      Target.classList.remove("is-animation");
    }
  });
}

/*------------------------------- //
タブ切り替え
// -------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
  const tabButtons = document.querySelectorAll(".tab_switching--btn");
  const tabPanels = document.querySelectorAll(".tab_switching--contents");

  tabButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const targetTab = this.getAttribute("data-tab");

      // タブボタンの状態更新
      tabButtons.forEach((btn) => btn.classList.remove("is-active_btn"));
      this.classList.add("is-active_btn");

      // タブパネルの状態更新
      tabPanels.forEach((panel) => {
        panel.classList.remove("is-active_contents");
      });

      const targetPanel = document.getElementById(targetTab);
      targetPanel.classList.add("is-active_contents");
    });
  });
});

/*------------------------------- //
もっと見る・続きを読む
// -------------------------------*/
(function ($, root, undefined) {
  $(function () {
    let el = {}; // 配列・変数用（巻き上げ防止の為、冒頭にて宣言）
    el.accordion = ".js-viewmore"; // アコーディオンコンテンツ全体のセレクタの取得
    el.accordionMoreContent = ".js-viewmore_contents"; // アコーディオン開閉コンテンツのセレクタの取得
    el.accordionButton = ".js-viewmore_btn"; // アコーディオンボタンのセレクタの取得
    el.accordionButtonText = ".js-viewmore_btn_txt"; // アコーディオンボタンテキストのセレクタ取得
    el.isActive = "is-active"; // アコーディオン展開時(アクティブ時)の付与するclass名を指定
    el.slideSpeed = 500; // アコーディオン展開時(アクティブ時)の開閉速度(単位：ms)を指定

    // アコーディオン開閉処理
    $(el.accordionButton).on("click", function () {
      $(this).parents(el.accordion).find(el.accordionMoreContent).slideToggle(el.slideSpeed); // アコーディオンボタン要素の親要素のアコーディオンコンテンツ内にある開閉コンテンツを開閉する
      $(this).toggleClass(el.isActive); // アコーディオンボタン要素にclassを追加・削除する
      $(this).parents(el.accordion).find(el.accordionButtonText).toggleClass(el.isActive); // アコーディオンボタンテキスト要素にclassを追加・削除する
    });
  });
  // var trigger = $('.js-modal_trigger'),
  //   wrapper = $('.js-modal_contents'),
  //   layer = $('.js-modal_layer'),
  //   container = $('.js-modal_container'),
  //   close = $('.js-modal_close');

  // $(trigger).click(function () {
  //   var index = $(this).index();
  //   $(wrapper).eq(index).fadeIn(400);
  //   $(container).scrollTop(0);
  //   $('html, body').css('overflow', 'hidden');
  // });

  // $(layer).add(close).click(function () {
  //   $(wrapper).fadeOut(400);
  //   $('html, body').removeAttr('style');
  // });
})(jQuery, this);

const elements = document.querySelectorAll(".more");

Array.from(elements).forEach(function (el) {
  //ボタンを取得
  const btn = el.querySelector(".more__btn");
  //コンテンツを取得
  const content = el.querySelector(".more__content");

  //ボタンクリックでイベント発火
  btn.addEventListener("click", function () {
    if (!content.classList.contains("open")) {
      //コンテンツの実際の高さを代入
      //キーワード値（none、max-content等）では動作しないので注意
      content.style.maxHeight = content.scrollHeight + "px";
      //openクラスを追加
      content.classList.add("open");
      //もっと見るボタンのテキストを設定
      btn.textContent = "閉じる";
    } else {
      //コンテンツの高さを固定値を代入
      content.style.maxHeight = "150px";
      //openクラスを削除
      content.classList.remove("open");
      //もっと見るボタンのテキストを設定
      btn.textContent = "もっと見る";
    }
  });
});
