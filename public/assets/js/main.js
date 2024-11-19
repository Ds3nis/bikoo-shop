var swiper = new Swiper(".mainSwiper", {
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".bikeComing", {
    slidesPerView: 2,
    spaceBetween: 10,
    // autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    // },
    freeMode: true,
    navigation: {
        nextEl: ".bike-coming__next",
        prevEl: ".bike-coming__prev",
    },
});

var swiper = new Swiper(".product-swiper", {
    pagination: {
        el: ".swiper-pagination",
    },
});
