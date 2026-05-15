const lenis = new Lenis({
  duration: 1.5,
  easing: (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t)),
  smooth: true,
  smoothTouch: false,
  touchMultiplier: 2,
});

window.lenis = lenis;

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

// Кнопка "наверх" в футере
document.querySelectorAll(".anchor-item-up").forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    lenis.scrollTo(this.getAttribute("href"), {
      offset: -200,
    });
  });
});

// Якорные ссылки внутри страницы
document.querySelectorAll(".anchor-item").forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const targetId = this.getAttribute("href").split("#")[1];
    const targetSection = document.getElementById(targetId);

    if (targetSection) {
      lenis.scrollTo(targetSection, {
        offset: -150,
        duration: 2.5,
      });
    }
  });
});
