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

document.addEventListener("DOMContentLoaded", function () {
   const search = document.querySelector(".search-item");
   const searchBlock = document.querySelector(".header__btmsearch");

   search.addEventListener("click", function () {
      searchBlock.classList.toggle("open");
   });
});
