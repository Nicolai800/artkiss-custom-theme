function buttonOpen() {
  const buttons = document.querySelectorAll(".button1");

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      const desc = button.nextElementSibling;
      desc.classList.toggle("active");
    });
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const element = document.querySelector(".js-button-open");
  if (element) {
    buttonOpen();
  }
});
