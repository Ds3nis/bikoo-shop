document.addEventListener("DOMContentLoaded", function () {
    const burger = document.querySelector(".header__burger");
    const nav = document.querySelector(".header__nav");
    const body = document.body;

    burger.addEventListener("click", function () {
        nav.classList.toggle("open");
        burger.classList.toggle("open");
        body.classList.toggle("lock");
    });
});
