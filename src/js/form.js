function formIcon() {
  const labels = document.querySelectorAll("label");
  labels.forEach((label) => {
    const input = label.querySelector("input");
    const textarea = label.querySelector("textarea");

    if (input) {
      input.addEventListener("focus", function () {
        label.classList.add("active");
      });
      input.addEventListener("blur", function () {
        label.classList.remove("active");
      });
    }

    if (textarea) {
      textarea.addEventListener("focus", function () {
        label.classList.add("active");
      });
      textarea.addEventListener("blur", function () {
        label.classList.remove("active");
      });
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const element = document.querySelector(".js-form");
  if (element) {
    new formIcon(element);
  }
});
