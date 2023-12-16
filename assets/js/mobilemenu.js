//mobile menu
const burgerIcon = document.querySelector(".navbar-burger");
const navbarMenu = document.querySelector(".navbar-menu");
const heroSection = document.querySelector(".hero");

burgerIcon.addEventListener("click", () => {
  navbarMenu.classList.toggle("is-active");
  burgerIcon.classList.toggle("is-active");
});