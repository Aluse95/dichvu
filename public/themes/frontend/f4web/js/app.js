const swiperLoop = new Swiper(
  "#banner .swiper, #testimonials .swiper, .m-client .swiper, #client .swiper",
  {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 3000,
    },
    pagination: {
      el: ".swiper-pagination",
      type: "bullets",
    },
  }
);

const swiper = new Swiper(".m-category.swiper", {
  direction: "horizontal",
  autoplay: {
    delay: 3000,
  },

  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});
