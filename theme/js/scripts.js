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

  function isDesktop() {
    return mql.matches;
  }

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

// アコーディオンメニュー（divで実装バージョン）
document.addEventListener("DOMContentLoaded", () => {
  const accordions = document.querySelectorAll(".js_accordion");

  accordions.forEach((accordion) => {
    const header = accordion.querySelector(".js_accordion_list");
    const content = accordion.querySelector(".accordion--content");
    const closeBtn = accordion.querySelector(".is-close");
    if (!header || !content) return;

    // 初期状態を同期
    const syncInitial = () => {
      if (accordion.classList.contains("is-active")) {
        content.style.height = content.scrollHeight + "px";
        requestAnimationFrame(() => (content.style.height = "auto"));
      } else {
        content.style.height = "0px";
      }
    };

    // 開く/閉じるを関数化
    const open = () => {
      if (accordion.classList.contains("is-active")) return;
      accordion.classList.add("is-active");
      content.style.height = content.scrollHeight + "px";
      const onEnd = (e) => {
        if (e.propertyName === "height") {
          content.style.height = "auto";
          content.removeEventListener("transitionend", onEnd);
        }
      };
      content.addEventListener("transitionend", onEnd);
    };

    const close = () => {
      if (!accordion.classList.contains("is-active")) return;
      accordion.classList.remove("is-active");
      const current = content.scrollHeight; // 現在の高さを固定
      content.style.height = current + "px";
      requestAnimationFrame(() => {
        // 次フレームで 0 にアニメ
        content.style.height = "0px";
      });
    };

    syncInitial();

    // タイトル行クリックでトグル
    header.addEventListener("click", () => {
      accordion.classList.contains("is-active") ? close() : open();
    });

    // ★「閉じる」ボタンで確実に閉じる
    if (closeBtn) {
      closeBtn.setAttribute("type", "button"); // フォーム内対策
      closeBtn.addEventListener("click", (e) => {
        e.preventDefault();
        close();
      });
    }

    // 可変コンテンツの高さ追従（任意）
    const ro = new ResizeObserver(() => {
      if (accordion.classList.contains("is-active") && content.style.height === "auto") return;
      if (accordion.classList.contains("is-active")) {
        content.style.height = content.scrollHeight + "px";
      }
    });
    ro.observe(content);
  });
});

(function ($, root, undefined) {
  // ドロップダウンメニュー
  $(function () {
    // 画面幅のみで判定するなら '(min-width: 1025px)'
    // タッチ主体端末での誤作動を避けたいなら hover 能力も併せて判定
    const mql = window.matchMedia("(min-width: 1025px) and (hover: hover)"); // ←必要に応じて (hover: hover) を外す
    const NS = ".dropdown"; // イベントの名前空間
    const $items = $(".nav-overlay__item");

    function bindHover() {
      // 既存を一旦解除してからバインド（重複防止）
      $items.off(NS);
      $items
        .on("mouseenter" + NS, function () {
          $(this).children(".dropdownmenu").stop(true, true).slideDown(500);
        })
        .on("mouseleave" + NS, function () {
          $(this).children(".dropdownmenu").stop(true, true).slideUp(500);
        });
    }

    function unbindHover() {
      $items.off(NS); // 名前空間付きで安全に解除
      $items.children(".dropdownmenu").stop(true, true).hide(); // 状態リセット（任意）
    }

    function apply(e) {
      if (e.matches) {
        bindHover();
      } else {
        unbindHover();
      }
    }

    // 初期判定 & 画面幅/入力環境の変化に追随
    apply(mql);
    if (mql.addEventListener) {
      mql.addEventListener("change", apply);
    } else {
      // 古いSafari用フォールバック
      mql.addListener(apply);
    }
  });

  // アコーディオンメニュー（summaryで実装バージョン）
  $(document).ready(function () {
    let accordionDetails = ".js-accordion";
    let accordionSummary = ".js-accordion--ttl";
    let accordionContent = ".js-accordion--content";
    let speed = 500;

    $(accordionSummary).each(function () {
      $(this).on("click", function (event) {
        $(this).toggleClass("is-active");
        event.preventDefault();
        if ($(this).parent($(accordionDetails)).attr("open")) {
          $(this)
            .nextAll($(accordionContent))
            .slideUp(speed, function () {
              $(this).parent($(accordionDetails)).removeAttr("open");
              $(this).show();
            });
        } else {
          $(this).parent($(accordionDetails)).attr("open", "true");
          $(this).nextAll($(accordionContent)).hide().slideDown(speed);
        }
      });

      $(this)
        .closest(accordionDetails)
        .find(".close-btn")
        .on("click", function (eventclosee) {
          eventclosee.preventDefault();
          $(this).closest(accordionDetails).find(accordionSummary).removeClass("is-active");
          $(this)
            .closest(accordionContent)
            .slideUp(speed, function () {
              $(this).closest(accordionDetails).removeAttr("open");
            });
        });
    });
  });

  // モーダルウィンドウ
  (function ($) {
    var $doc = $(document);
    var FOCUSABLE =
      'a[href],area[href],input:not([disabled]):not([type="hidden"]),select:not([disabled]),textarea:not([disabled]),button:not([disabled]),iframe,object,embed,[contenteditable],[tabindex]:not([tabindex="-1"])';
    var lastFocused = null;

    function lockScroll() {
      var y = window.pageYOffset || document.documentElement.scrollTop || 0;
      $("body")
        .data("scrollY", y)
        .css({ position: "fixed", top: -y + "px", width: "100%" })
        .addClass("is-modal-open");
      $("html").addClass("is-modal-open");
    }

    function unlockScroll() {
      var y = $("body").data("scrollY") || 0;
      $("html, body").removeClass("is-modal-open");
      $("body").css({ position: "", top: "", width: "" }).removeData("scrollY");
      window.scrollTo(0, y);
    }

    function openModal($modal, $trigger) {
      if (!$modal || !$modal.length) return;

      lastFocused = $trigger && $trigger.length ? $trigger : $(document.activeElement);

      // そのモーダル内だけスクロール位置をリセット
      $modal.find(".js-modal_container").scrollTop(0);

      $modal.attr("aria-hidden", "false").fadeIn(300);
      if ($trigger && $trigger.length) $trigger.attr("aria-expanded", "true");

      lockScroll();

      // 初期フォーカス
      var $first = $modal.find("[autofocus]").filter(":visible").first();
      if (!$first.length) $first = $modal.find(FOCUSABLE).filter(":visible").first();
      if ($first.length) $first.focus();

      // Esc & 簡易フォーカストラップ
      $doc.on("keydown.modal", function (e) {
        var key = e.key || e.keyCode;
        if (key === "Escape" || key === 27) {
          closeModal($modal);
        } else if (key === "Tab" || key === 9) {
          var $focusables = $modal.find(FOCUSABLE).filter(":visible");
          if (!$focusables.length) return;
          var first = $focusables.get(0);
          var last = $focusables.get($focusables.length - 1);
          if (e.shiftKey && document.activeElement === first) {
            e.preventDefault();
            $(last).focus();
          } else if (!e.shiftKey && document.activeElement === last) {
            e.preventDefault();
            $(first).focus();
          }
        }
      });
    }

    function closeModal($modal) {
      if (!$modal || !$modal.length) return;

      $modal.attr("aria-hidden", "true").fadeOut(300, function () {
        if (lastFocused && lastFocused.length) lastFocused.focus();
      });

      // 対応するトリガーの状態を戻す
      var id = $modal.attr("id");
      if (id) $('[aria-controls="' + id + '"]').attr("aria-expanded", "false");

      $doc.off("keydown.modal");
      unlockScroll();
    }

    // --- イベント委譲（動的要素にも対応） ---
    // 開く
    $doc.on("click", ".js-modal_trigger", function (e) {
      e.preventDefault();
      var $t = $(this);

      // ① まずは文字列（# なし）を取り出す
      var target =
        $t.data("modalTarget") ||
        $t.attr("data-modal-target") ||
        $t.attr("aria-controls"); // aria-controls は ID を入れる属性

      // ② セレクタを安全に作る（空や '#' だけは使わない）
      var $modal = $();
      if (target && target.trim()) {
        var sel = target.startsWith("#") ? target : "#" + target;
        try { $modal = $(sel); } catch (e) { $modal = $(); }
      }

      // ③ 見つからなければ index フォールバック
      if (!$modal.length) {
        var idx = $(".js-modal_trigger").index(this);
        $modal = $(".js-modal_contents").eq(idx);
      }

      openModal($modal, $t);
    });

    // 背景 or 閉じるボタンで閉じる
    $doc.on("click", ".js-modal_layer, .js-modal_close", function (e) {
      e.preventDefault();
      closeModal($(this).closest(".js-modal_contents"));
    });
  })(jQuery);

})(jQuery, this);
