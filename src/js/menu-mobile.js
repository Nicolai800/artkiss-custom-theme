class MenuMobile {
  constructor(element) {
    this.element = element;
    this.menuIsActive = false;
    this.menu = element.querySelector(".c-menu-mobile__menu");
    this.menuItems = element.querySelectorAll(".menu-item-type-custom");
    this.toggler = element.querySelector(".c-menu-mobile__toggler");
    this.toggler.addEventListener("click", () => this.toggleMenu());
    if (this.menuItems) {
      this.menuItems.forEach((menuItem) => {
        menuItem.addEventListener("click", () => this.toggleMenu());
      });
    }
  }

  toggleMenu() {
    this.menu.classList.toggle("is-active");
    this.toggler.classList.toggle("is-open");
    this.menuIsActive = !this.menuIsActive;

    this.toggleOverflow();
  }

  toggleOverflow() {
    if (this.menuIsActive) {
      document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "auto";
    }
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const element = document.querySelector(".js-menu-mobile");

  if (element) {
    new MenuMobile(element);
  }
});

document.addEventListener("DOMContentLoaded", function () {
  var menuItemsWithChildren = document.querySelectorAll(
    ".menu-item-has-children"
  );

  menuItemsWithChildren.forEach(function (menuItem) {
    var svg = document.createElement("span");
    svg.className = "menu-item-arrow";
    svg.innerHTML =
      '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">' +
      '<path d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"/>' +
      "</svg>";

    menuItem.appendChild(svg);
  });

  var menuArrows = document.querySelectorAll(".menu-item-arrow");

  menuArrows.forEach(function (menuArrow) {
    menuArrow.addEventListener("click", function () {
      var subMenu = this.parentElement.querySelector(".sub-menu");

      // Dodaj lub usuń klasę is-active w zależności od obecnego stanu
      if (subMenu.classList.contains("is-active")) {
        subMenu.classList.remove("is-active");
      } else {
        subMenu.classList.add("is-active");
      }
    });
  });
});
