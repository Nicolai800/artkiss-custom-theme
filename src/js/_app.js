class App {
  /**
   * Init headroom.js
   */
  initHeadroom() {
    var headroom = new Headroom(document.querySelector(".js-headroom"));
    headroom.init();
  }

  /**
   * Init AOS
   */
  initAOS() {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        once: true,
        offset: 50,
      });

      // Refresh AOS on window load to ensure accurate element coordinates
      window.addEventListener('load', () => {
        AOS.refresh();
      });
    }
  }

  /**
   * Class toggler
   */
  activeClassToggler() {
    const togglers = document.querySelectorAll(".-js-toggler");
    if (togglers) {
      togglers.forEach((toggler) => {
        toggler.addEventListener("click", () => {
          toggler.classList.toggle("active");
        });
      });
    }
  }

  /**
   * FAQ Accordion
   */
  initFaq() {
    const faqQuestions = document.querySelectorAll('.faq__question');
    if (faqQuestions.length > 0) {
      faqQuestions.forEach(question => {
        question.onclick = () => {
          question.classList.toggle('is-active');
        };
      });
    }
  }

  /**
   * Init Instagram Swiper slider (home_s6)
   */
  initInstagramSlider() {
    const sliderEl = document.querySelector(".js-instagram-slider");
    if (sliderEl && typeof Swiper !== 'undefined') {
      new Swiper(".js-instagram-slider", {
        slidesPerView: 1.4,
        spaceBetween: 16,
        centeredSlides: true,
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        navigation: {
          nextEl: ".js-instagram-next",
          prevEl: ".js-instagram-prev",
        },
        pagination: {
          el: ".js-instagram-pagination",
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: 3,
            spaceBetween: 24,
            centeredSlides: false,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 30,
            centeredSlides: false,
          },
          1200: {
            slidesPerView: 5,
            spaceBetween: 30,
            centeredSlides: false,
          }
        }
      });
    }
  }

  /**
   * Execute on page ready
   */
  pageReady() {
    document.body.classList.add("loaded");
    document.body.classList.remove("preload");
  }

  init() {
    this.initHeadroom();
    this.initAOS();
    this.activeClassToggler();
    this.initFaq();
    this.initInstagramSlider();
    this.pageReady();
  }
}
const app = new App();
app.init();
