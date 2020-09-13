(function($){
  // search box 
  $('.tet30-tool-box-search .action-button').on('click', function(event){
    $(this).parent().toggleClass('active');
  });

  if ($('.c4d-theme-pro').length > 0) {
    var c4dLastScrollTop = 0;
    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       var wH = $(window).height();
       if (st > c4dLastScrollTop){
          if (!$('body').hasClass('c4d-theme-scroll-down')) {
            document.body.className += ' ' + 'c4d-theme-scroll-down';
          }
          $('body').removeClass('c4d-theme-scroll-up');
       } else {
          if (!$('body').hasClass('c4d-theme-scroll-up')) {
            document.body.className += ' ' + 'c4d-theme-scroll-up';
          }
          $('body').removeClass('c4d-theme-scroll-down');
       }
       if (st <= 0) {
          $('body').removeClass('c4d-theme-scroll-down').removeClass('c4d-theme-scroll-up').removeClass('c4d-theme-scrolling');
       } else {
          $('body').addClass('c4d-theme-scrolling');
       }
       c4dLastScrollTop = st;
    });
  }

  $('.tet30-go-to-top').on('click', function(){
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });

  ///////////////////// MENU /////////////////////////////////////////
  $('.tet30-mega-menu').each(function(index, el){
    var pos = $('.is-menu-align-compare').offset(),
    mPos = $(el).find('> .sub-menu').offset();
    $(el).find('> .sub-menu').css('left', pos.left - mPos.left);
  });

  $('.menu-toggle').on('click', function(){
    $('body').toggleClass('tet30-menu-toggle-active');
  });

  $('.menu-item-has-children').append('<span class="tet30-menu-expand"></span>');

  $('.tet30-menu-expand').on('click', function(index, el){
    $(this).parent().toggleClass('tet30-menu-expand-active');
  });

  $('.tet30-woo-category-wrap').on('click', function(index, el){
    $(this).toggleClass('active');
  });

  ///////////////////////// END MENU /////////////////////////////////

  /////////////////////////// WOO ////////////////////////////////////
  $('.c4d-woo-filter-aside, .c4w-woo-filter-main').on('click', function(){
    $('body').toggleClass('c4d-woo-filter-aside-active');
  });

  $('body').on('click', '.quantity .minus, .quantity .plus', function(event){
    var input =  $(this).parent().find('input.qty'),
    current =  parseInt(input.val());
    size = parseInt(input.attr('size'));
    if ($(this).hasClass('minus')) {
      if (current > 1) {
        current--;
      }
    } else {
      if (current < size) {
        current++;
      }
    }
    input.val(current).trigger('change');
  });

  $('.tet30-archive-left-sidebar-stick').on('click', function(){
    $('body').addClass('tet30-left-sidebar-open');
  }); 

  $('.tet30-archive-left-sidebar-close').on('click', function(){
    $('body').removeClass('tet30-left-sidebar-open'); 
  });   

  ////////////////////////// SINGLE WOO //////////////////////////////
  $('.woocommerce-product-gallery__wrapper').each(function(index, el){
    var slider = '', self = this;

    $(self).find('.woocommerce-product-gallery__image').each(function(index, img){
      $(img).css('display', 'none');
      slider += '<div class="slide-item"><img src="'+ $(img).find('img').attr('data-src') + '"></div>';
    });

    $(self).append('<div class="main-slider">'+ slider +'</div><div class="main-nav">'+ slider +'</div>');

    $(self).find('.main-slider').slick({
      accessibility: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        lazyLoad: 'ondemand',
        asNavFor: $(self).find('.main-nav')
    }); 

    $(self).find('.main-nav').slick({
      slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: $(self).find('.main-slider'),
        centerMode: true,
        focusOnSelect: true
    });

    var currentSlide = $(self).find('.main-slider').find('.slick-current');
        currentSlide.trigger( 'zoom.destroy' );
        currentSlide.zoom();

    $(self).find('.main-slider').on('afterChange', function(event, slick, currentSlide){
      var currentSlide = $(self).find('.main-slider').find('[data-slick-index="'+currentSlide+'"]');
        currentSlide.trigger( 'zoom.destroy' );
        currentSlide.zoom();
    });
    
    $(this).find('.main-slider').trigger('resize');
  });

  if($('#reviews #comments').length < 1) {
    $('#tab-title-reviews').css('display', 'none');
  }
  ////////////////////////// SINGLE WOO //////////////////////////////
  

  /////////////////////////// END WOO ////////////////////////////////

  
  //////////////////////////// BLOG ///////////////////////////////////
  
  
  //////////////////////////// END BLOG ///////////////////////////////
  $(document).ready(function(){
    $('i').html('');  
  });
  
})(jQuery);