(function () {
  
  "use strict";

  var swiper = new Swiper(".testimonialSwiper", {
    slidesPerView: 2,
    spaceBetween: 30,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    breakpoints: {
      "@0.00": {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      "@0.75": {
        slidesPerView: 2,
        spaceBetween: 20,
      },
    },
  });

  var swiper1 = new Swiper(".homeSwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


})();

function switcherClick() {
  let ltrBtn, rtlBtn, ResetAll;
  ltrBtn = document.querySelector('#switcher-ltr');
  rtlBtn = document.querySelector('#switcher-rtl');
  ResetAll = document.querySelector('#reset-all');

  /* rtl start */
  if(rtlBtn){
    rtlBtn.addEventListener('click', () => {
      let swiperDir = document.querySelector('.testimonialSwiper');
      swiperDir.setAttribute("dir", "rtl");
      swiperDir.classList.add('swiper-rtl');
      document.querySelector('.swiper-wrapper').style.transform = "translate3d(0px,0,0)"
    });
    /* rtl end */

    /* ltr start */
    if(ltrBtn){
      ltrBtn.addEventListener('click', () => {
        let swiperDir1 = document.querySelector('.testimonialSwiper');
        swiperDir1.classList.remove('swiper-rtl');
        document.querySelector('.swiper-wrapper').style.transform = "translate3d(0px,0,0)"
      });
  }
  /* ltr end */
  }

    // reset all start
    if(ResetAll){
      ResetAll.addEventListener('click', () => {
        let swiperDir2 = document.querySelector('.testimonialSwiper');
        document.querySelector('.swiper-wrapper').style.transform = "translate3d(0px,0,0)"
        swiperDir2.setAttribute("dir", "ltr");
        swiperDir2.classList.remove('swiper-rtl');
      })
  }
  // reset all start
  
}

switcherClick();