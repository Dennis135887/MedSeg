document.addEventListener("DOMContentLoaded", function () {

  new Swiper(".blogs-slider", {

    spaceBetween:30,
    loop:true,
    grabCursor:true,

    autoHeight:false,

    autoplay:{
      delay:4000,
      disableOnInteraction:false
    },

    breakpoints:{
      0:{slidesPerView:1},
      768:{slidesPerView:2},
      992:{slidesPerView:3}
    },

    pagination:{
      el:".swiper-pagination",
      clickable:true
    }

  });

});