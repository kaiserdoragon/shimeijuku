// ---------------------------------------------
//  スクロールアニメーション（フェードイン）
// ---------------------------------------------

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

// ---------------------------------------------
//  タブ切り替え
// ---------------------------------------------
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

// ---------------------------------------------
//  もっと見る・続きを見る
// ---------------------------------------------

const elements = document.querySelectorAll(".viewmore");

Array.from(elements).forEach(function (el) {
  //ボタンを取得
  const btn = el.querySelector(".viewmore--btn");
  //コンテンツを取得
  const content = el.querySelector(".viewmore--content");

  //ボタンクリックでイベント発火
  btn.addEventListener("click", function () {
    if (!content.classList.contains("open")) {
      //コンテンツの実際の高さを代入
      //キーワード値（none、max-content等）では動作しないので注意
      content.style.maxHeight = content.scrollHeight + "px";
      //openクラスを追加
      content.classList.add("open");
      btn.classList.add("is-active_btn");
      //もっと見るボタンのテキストを設定
      btn.textContent = "閉じる";
    } else {
      //コンテンツの高さを固定値を代入
      content.style.maxHeight = "100px";
      //openクラスを削除
      content.classList.remove("open");
      btn.classList.remove("is-active_btn");
      //もっと見るボタンのテキストを設定
      btn.textContent = "もっと見る";
    }
  });
});


// ---------------------------------------------
//  スクロールテーブル
// ---------------------------------------------
new ScrollHint('.js-scrolltable', {
  suggestiveShadow: true, //スクロール可能な要素右端に影を付ける
  i18n: {
    scrollable: '横スクロール可能です' //表示するテキスト
  }
});