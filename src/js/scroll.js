document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const href = this.getAttribute("href");

      // Skip dummy links/empty hashes
      if (href === "#" || href === "") {
        return;
      }

      // Safe query selector check
      try {
        const targetElement = document.querySelector(href);
        if (targetElement) {
          e.preventDefault();

          if (window.lenis) {
            window.lenis.scrollTo(targetElement, {
              offset: -100,
              duration: 1.5,
            });
          } else {
            targetElement.scrollIntoView({
              behavior: "smooth"
            });
          }
        }
      } catch (err) {
        console.warn("Invalid anchor target selector: " + href);
      }
    });
  });
});

