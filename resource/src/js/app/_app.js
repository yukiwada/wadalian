export default class App {
  constructor (opts = {}) {

    this.setHomeSlide();
    this.setGNav();
    
    $('.j-submit').on('click', () => {
      $('.j-contact input[name="submitConfirm"]').trigger('click');
    });
    $('.j-submit-finish').on('click', () => {
      console.log('click finish');
      $('.j-contact input[name="submit"]').trigger('click');
    });
    $('.j-submit-back').on('click', () => {
      console.log('click back');
      $('.j-contact input[name="submitBack"]').trigger('click');
    });
  }


  setHomeSlide(){

    let $slideTotal = $('.j-home-hero-slide-total');
    let $slideCurrent = $('.j-home-hero-slide-current');
    $slideTotal.text($('.j-home-hero .swiper-slide').length);

    var swiper = new Swiper('.j-home-hero .swiper-container', {
      speed: 400,
      loop: true,
      navigation: {
        nextEl: '.j-home-hero-next',
        prevEl: '.j-home-hero-prev'
      },
    });
    swiper.on('slideChange', (e) => {
      $slideCurrent.text(swiper.realIndex + 1);
    });
  }

  setGNav(){
    let $opener = $('.j-gnav-opener');
    let $closer = $('.j-gnav-closer');
    let $gnav = $('.j-gnav');

    $opener.on('click', () => {

      if($gnav.hasClass('is-show')){
        $gnav.removeClass('is-show');
      }else{
        $gnav.addClass('is-show');
      }

      return false;
    });

    $closer.on('click', () => {
      $gnav.removeClass('is-show');
    });
  }

};
