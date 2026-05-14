class App {
  /**
   * Init headroom.js
   */
  initHeadroom() {
    var headroom = new Headroom(document.querySelector(".js-headroom"));
    headroom.init();
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
   * Execute on page ready
   */
  pageReady() {
    document.body.classList.add("loaded");
    document.body.classList.remove("preload");
  }

  init() {
    this.initHeadroom();
    this.activeClassToggler();
    this.initFaq();
    this.pageReady();
  }
}
const app = new App();
app.init();
