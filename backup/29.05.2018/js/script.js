//  $(document).ready(function() {
//   $('select').niceSelect();
// });

//новости с ленивой загрузкой

$(document).ready(function(){ 


	if($('#newscontainer').length>0){
	var $nextPageToLoad = 1;
	var $pagesCnt = parseInt(Math.ceil(totalcount/5));
	var $canAddItems = ($pagesCnt > 1);
	var $url = '/news/__news_ajax.php?tag='+tag+'&gurl='+gurl+'&gid='+gid+'&pageno=';

	$(window).bind('scroll', function() {
                if (!$canAddItems) { return; }
                if ($(document).height() - $(document).scrollTop() - $(window).height() < $(window).height()*5) {
			$('#ajaxLoader').show();
			$canAddItems = false;
			$.post($url + $nextPageToLoad, function(data) {
				var $data = $( data);
				$('#newscontainer').append($data);
				$canAddItems = ($pagesCnt > $nextPageToLoad);
				$nextPageToLoad++;
				$('#ajaxLoader').hide();
			});
		}

	});

                if (!$canAddItems) { return; }
                if ($(document).height() - $(document).scrollTop() - $(window).height() < $(window).height()*5) {
			$('#ajaxLoader').show();
			$canAddItems = false;
			$.post($url + $nextPageToLoad, function(data) {
				var $data = $( data);
				$('#newscontainer').append($data);
				$canAddItems = ($pagesCnt > $nextPageToLoad);
				$nextPageToLoad++;
				$('#ajaxLoader').hide();
			});
		}


        }
});


// инпуты как любит белокуриха
$(document).ready(function(){
	$('.formgroup input,.formgroup textarea').blur();

	$('.formgroup label').click(function(){
		$(this).parent().find('input, textarea').focus();
		$(this).addClass("up");
	});

	$('.formgroup input,.formgroup textarea').blur(function(){
		if($(this).val()!=""){} else {
			$(this).parent().find("label").removeClass("up");
		};
	});
	$('.formgroup input,.formgroup textarea').focus(function(){
		if($(this).val()!=""){} else {
			$(this).parent().find("label").addClass("up");
		};
	});
});


$(document).ready(function(){ 


    // events slider on main page
    var swiperEvents = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    // slider on object page
    var swiperObjects = new Swiper('.swiper-container-objects');

    // slide on thumbnails

    // первая миниатюра станет активной
    $('.js-object-slide').first().addClass('hero-object-thumbnail_active');

    $('.js-object-slide').click(function() {
        var thumbIndex = $(this).index(),
            curThumb = $('.hero-object-thumbnail').get(thumbIndex);

        // при клике на данную миниатюру делаем ее активной
        $('.hero-object-thumbnail').removeClass('hero-object-thumbnail_active');
        $(curThumb).addClass('hero-object-thumbnail_active');

    // при клике на данную миниатюру листаем свайпер
        swiperObjects.slideTo(thumbIndex, 300);
    });

    // slider on main screen
    var swiperHero = new Swiper('.swiper-container-hero', {
        effect: 'slide',
        slidesPerView: 1,
        autoplay: {
            delay: 4000,
        },

    });

    var swiperFeedback = new Swiper('.swiper-container-feedback', {
        // autoplay: {
        //     delay: 3000,
        // },
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },    
        breakpoints: {
            569: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            960: {
              slidesPerView: 2,
              spaceBetween: 30
            }
        }
    });

    var swiperDiplomas = new Swiper('.swiper-container-diplomas', {
        // autoplay: {
        //     delay: 3000,
        // },
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next.diplomas',
            prevEl: '.swiper-button-prev.diplomas',
          },
          breakpoints: {
            569: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            960: {
              slidesPerView: 2,
              spaceBetween: 30
            }
          }
    });

    var swiperLicenz = new Swiper('.swiper-container-licenz', {
        // autoplay: {
        //     delay: 3000,
        // },
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next.licenz',
            prevEl: '.swiper-button-prev.licenz',
          },
          breakpoints: {
            569: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            960: {
              slidesPerView: 2,
              spaceBetween: 30
            }
          }
    });

    var slide_number;
    var timerId = setInterval(function() {
        if (slide_number!=swiperHero.activeIndex) {
             wows = new WOW(
      {
        boxClass:     'wows',      // класс, скрывающий элемент до момента отображения на экране (по умолчанию, wow)
        animateClass: 'animated', // класс для анимации элемента (по умолчанию, animated)
        offset:       0,          // расстояние в пикселях от нижнего края браузера до верхней границы элемента, необходимое для начала анимации (по умолчанию, 0)
        mobile:       true,       // включение/отключение WOW.js на мобильных устройствах (по умолчанию, включено)
        live:         true,       // поддержка асинхронно загруженных элементов (по умолчанию, включена)
        callback:     function(box) {
          // функция срабатывает каждый раз при старте анимации
          // аргумент box — элемент, для которого была запущена анимация
        },
        scrollContainer: null // селектор прокручивающегося контейнера (опционально, по умолчанию, window)
      }
    ).init();
 slide_number=swiperHero.activeIndex;
}
}, 500);
       
       
   
     

    

    });


    /* МОДАЛЬНЫЕ ОКНА */
$(document).ready(function(){        
    $(".callback-link").on('click', function(){
        var btn = $(this);                        
        $("#overlay").fadeIn(100, function(){
            $($(btn).data('window')).show();                        
        }); 
       $('#callback-window').show();
        return false;
    });
    
    $("#overlay, .modal .modal-close").on('click', function(){
        $("#overlay, .modal").fadeOut();
    $('.modal').find('input, textarea').val('');
        return false;
    });    
    $('.modal').each(function(){
        var f=$(this).find('.modal-content');
        var t=$(this).find('.modal-content-copy');
        t.html(f.html());
        t.hide();

    });
});
/* МОДАЛЬНЫЕ ОКНА END */

// отправка колбека
$(".modal form").on('submit', function(e){
        e.preventDefault();
        var modal = $(this).parents('.modal');
        var form = $(this);         
        $(this).ajaxSubmit({  
            url: "/ajax.php?file="+$(form).data('file'),
            data: $(form).serialize(),
            dataType: "JSON",
            type: "POST",
            success: function(data){
                if(data.done) {
      $(modal).find('.modal-result').html(data.message);
      $(modal).find('.modal-result').show('fast')
      setTimeout("$('.modal-result').hide('fast')",1500);

      setTimeout("$('.modal').hide()",2000);
                  setTimeout("$('#overlay').hide()",2000);
      var f=$(modal).find('.modal-content-copy');
      var t=$(modal).find('.modal-content');
                  setTimeout("$('.modal').find('input, textarea').val('')",3000);
      
                } else {
                    $(modal).find('.modal-errors').html(data.message);
    $(modal).find('.modal-errors').show('fast')
    setTimeout("$('.modal-errors').hide('fast')",1000);
                    $(modal).children(".spinner").hide();
                }
            },
            complete: function(){
                $(modal).children(".spinner").hide();                     
            }
        });
        return false;
    });




// TABS
// =================================

    $('.section-tabs .section-tabs__tabs ul li').click(function() {
        $(this).parent().children('li.active').removeClass('active');

        $(this).addClass('active');



        var sectionTabs = $(this).parent().parent().parent().children('.section-tabs__content');

        var index = $(this).index();

        var sectionContent = $(this).parent().parent().parent().children('.section-tabs__content');
        console.log(sectionContent);

        // $(this).parent().parent().parent().find('.slide').each(function(i, elem) {
        sectionContent.children('.slide').each(function(i, elem) {
            if (i == index) {
                $(elem).show();
            } else {
                $(elem).hide();
            }
        });
    });



 var li_name = [];
    $(document).ready(function() {
       
        
        $('.section-tabs .section-tabs__tabs').each(function(i, elem) {
            elem.setAttribute('rel', i);
            $('.section-tabs .section-tabs__tabs[rel=' + i + ']').parent().find('.section-tabs__content').attr('rel', i);
            super_sbor(i);
           
        })

            $('#mini_tab ul.cd-accordion-menu .has-children').click(function(e) {
    	
        if ($(this).attr('class') == 'has-children active') {
            $(this).find('.slide_children').slideUp(200);
            $(this).removeClass('active');
        } else {
            $('.slide_children').hide(200);
            console.log("hide me");
            $('#mini_tab ul.cd-accordion-menu .has-children.active').removeClass('active');
            $(this).addClass('active');
            $(this).find('.slide_children').slideDown(200);
        }
   	 });
    });

    function super_sbor(number) {
        $('.section-tabs .section-tabs__tabs[rel=' + number + '] ul li').each(function(i, elem) {
            li_name[i] = elem.innerHTML;
        });

        var content = [];

        $('.section-tabs__content[rel=' + number + '] .slide').each(function(i, elem) {
            content[i] = elem.innerHTML;
        });            
        paint_dom(content, li_name, number);

        content = new Array();
        li_name = new Array();
    }




function paint_dom(content, li_name, number, name_home_dom='section-tabs__tabs') {
    var structur_dom = '<ul class="cd-accordion-menu">';
    for (var i = 0; i < li_name.length; i++) {

        if (content[i] == undefined) {
            content[i] = ' ';
        }
        structur_dom = structur_dom + '<li rel=' + i + ' class="has-children"><label class="group-1">' + li_name[i] + '</label><div style="display:none;" class="slide_children">' + content[i] + '</div></li>';
    }
    structur_dom = structur_dom + '</ul>';

    if (name_home_dom=='section-tabs__tabs') {
     $('.section-tabs__tabs[rel=' + number + '] ').append("<div id='mini_tab'>" + structur_dom + "</div>");
    }else{

      $('.'+name_home_dom+'').append("<div id='mini_tab'>" + structur_dom + "</div>");
    }
}






$(document).ready(function () {

    // ACCORDEON

    // $('.js-accordeon .js-accordeon__content').slideUp(0);    
    $('.js-accordeon .js-accordeon__label').click(function() {

        // подсвечиваем открытый аккордеон
        if ( $(this).parent().hasClass('opened') ) {
            $(this).parent().removeClass('opened');
            $(this).parent().children('.js-accordeon__content').slideUp(300);
        }
        else {
            $(this).parent().addClass('opened');
            $(this).parent().children('.js-accordeon__content').slideDown(300);
        }
    });



    // DROPDOWN
    $('.nav-main__links > li').hover(function() {
        // console.log('hover');
        $(this).find('.dropdown-nav').fadeIn(200);
    });

    $('.nav-main__links > li').mouseleave(function() {
        $('.dropdown-nav').fadeOut(200);
    });

    // WOW
    new WOW().init();

    // MENU ACCORDEONS
    $('.nav-full > li .nav-full__rubrika').click(function() {


        var curAccord = $(this).parent().find( $('.nav-full__list'));

        if (curAccord.hasClass('nav-full__list_opened')) {
            curAccord.slideUp(300);
            curAccord.removeClass('nav-full__list_opened');
            console.log('hide acc');
        }
        else {
            curAccord.slideDown(300);
            curAccord.addClass('nav-full__list_opened');
            console.log('show acc');
        }

        // подсвечиваем открытый аккордеон
        // if ( $(this).parent().hasClass('opened') ) {
        //     $(this).parent().removeClass('opened');
        //     $(this).parent().children('.js-accordeon__content').slideUp(300);
        // }
        // else {
        //     $(this).parent().addClass('opened');
        //     $(this).parent().children('.js-accordeon__content').slideDown(300);
        // }
    });

});

function moveProgress() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("progress").style.width = scrolled + "%";
};


// STICKY HEADER
function showStickyHeader() {
    // var heroHeight = $('.hero').height();
    // console.log(heroHeight);

    if ( window.pageYOffset > 0 ) {
        // console.log('more than 700')
       $('.page-header').addClass('page-header_sticky');
       // if ( $(window).width() > 1230 ) {
       //     $('.weather').fadeOut(300);
       // }
    }
    else {
        console.log('less than 700')
        $('.page-header').removeClass('page-header_sticky');
        // $('.weather').show(300);   
    }
};

function showToTopButton() {
    // var heroHeight = $('.hero').height();
    // console.log(heroHeight);

    if ( window.pageYOffset > 500 ) {
       $('.to-top').addClass('to-top_visible')
    }
    else {
        $('.to-top').removeClass('to-top_visible')
    }
}; 

function scrollToTop() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
}; 
    




// MAIN-MENU
// =================================

var menuIsOpen; //for closing menu on "esc"

// menu open/close
function openMenu() {
    var topMenu = $('.menu');    
    if( topMenu.hasClass('menu_active') ) {
        topMenu.removeClass('menu_active');
        // $('.js-overlay').fadeOut(300);
        $('.page-wrapper').removeClass('h-no-scroll');
        $('.js-open-menu').removeClass('btn-menu_active');
        $('.nav-main__links').removeClass('nav-main__links_removed');
        // $('.page-header').removeClass('page-header_sticky');
        menuIsOpen = false;
    }
    else {
        topMenu.addClass('menu_active');
        // $('.overlay').fadeIn(300);
        $('.page-wrapper').addClass('h-no-scroll');
        $('.js-open-menu').addClass('btn-menu_active');
        $('.nav-main__links').addClass('nav-main__links_removed');
        // $('.page-header').addClass('page-header_sticky');
        // slideMenuList();
        menuIsOpen = true;
    }
}

// triggers
$(document).ready(function() {   
    $('.js-open-menu').click(openMenu);
    $('.js-menu-close').click(openMenu);
    $('.js-overlay').click(openMenu);
    $('.menu .nav-full .nav-full__list li a').click(openMenu);
    $('.js-scroll-to-top').click(scrollToTop);
    $(window).scroll(showStickyHeader);  
    $(window).scroll(showToTopButton);    
    $(window).scroll(moveProgress);    
});

// close on "esc"
$(document).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        if ( menuIsOpen == true ) {
         openMenu();
         console.log('esc menu close');
        }
    }
});


// BTN-GROUP

// показать карту
function showMap() {
    var isActive = $('.showtype').hasClass('showtype_active-map');
    var btnGroup = $('.showtype');

    if (isActive) {
        console.log('break')
        return false;
    }
    else {
        btnGroup.removeClass('showtype_active-list');
        btnGroup.addClass('showtype_active-map');
        $('.show-list').slideUp(300);
        $('.map').slideDown(300);
        console.log('show map');
    } 
}

// показать список
function showList() {    
    var isActive = $('.showtype').hasClass('showtype_active-list');
    var btnGroup = $('.showtype');

    if (isActive) {
        console.log('break')
        return false;
    }
    else {
        btnGroup.removeClass('showtype_active-map');
        btnGroup.addClass('showtype_active-list');
        $('.map').slideUp(300);
        $('.show-list').slideDown(300);
        console.log('show list');
    } 
}


// triggers
$(document).ready(function() {   
    $('.showtype_map').click(showMap);    
    $('.showtype_list').click(showList);    
});


$(document).ready(function() { 

    $(window).on('resize scroll', function() {
        if ( $('.counter').visible() ) {
           $('.counter').addClass('wow'); 
           $('.counter').each(function() { 
                var $this = $(this), 
                countTo = $this.attr('data-count-to'); 

                $({ countNum: $this.text()}).animate({ 
                countNum: countTo 
                }, 

                { 
                    duration: 2000, 
                    easing:'swing', 
                        step: function() { 
                        $this.text(Math.floor(this.countNum)); 
                        }, 
                    complete: function() { 
                        $this.text(this.countNum); 
                        //alert('finished'); 
                    } 
                });
            });
        }
    });
});







(function($){

    /**
     * Copyright 2012, Digital Fusion
     * Licensed under the MIT license.
     * http://teamdf.com/jquery-plugins/license/
     *
     * @author Sam Sehnert
     * @desc A small plugin that checks whether elements are within
     *       the user visible viewport of a web browser.
     *       only accounts for vertical position, not horizontal.
     */
    var $w=$(window);
    $.fn.visible = function(partial,hidden,direction,container){

        if (this.length < 1)
            return;
    
    // Set direction default to 'both'.
    direction = direction || 'both';
        
        var $t          = this.length > 1 ? this.eq(0) : this,
                        isContained = typeof container !== 'undefined' && container !== null,
                        $c                = isContained ? $(container) : $w,
                        wPosition        = isContained ? $c.position() : 0,
            t           = $t.get(0),
            vpWidth     = $c.outerWidth(),
            vpHeight    = $c.outerHeight(),
            clientSize  = hidden === true ? t.offsetWidth * t.offsetHeight : true;

        if (typeof t.getBoundingClientRect === 'function'){

            // Use this native browser method, if available.
            var rec = t.getBoundingClientRect(),
                tViz = isContained ?
                                                rec.top - wPosition.top >= 0 && rec.top < vpHeight + wPosition.top :
                                                rec.top >= 0 && rec.top < vpHeight,
                bViz = isContained ?
                                                rec.bottom - wPosition.top > 0 && rec.bottom <= vpHeight + wPosition.top :
                                                rec.bottom > 0 && rec.bottom <= vpHeight,
                lViz = isContained ?
                                                rec.left - wPosition.left >= 0 && rec.left < vpWidth + wPosition.left :
                                                rec.left >= 0 && rec.left <  vpWidth,
                rViz = isContained ?
                                                rec.right - wPosition.left > 0  && rec.right < vpWidth + wPosition.left  :
                                                rec.right > 0 && rec.right <= vpWidth,
                vVisible   = partial ? tViz || bViz : tViz && bViz,
                hVisible   = partial ? lViz || rViz : lViz && rViz,
        vVisible = (rec.top < 0 && rec.bottom > vpHeight) ? true : vVisible,
                hVisible = (rec.left < 0 && rec.right > vpWidth) ? true : hVisible;

            if(direction === 'both')
                return clientSize && vVisible && hVisible;
            else if(direction === 'vertical')
                return clientSize && vVisible;
            else if(direction === 'horizontal')
                return clientSize && hVisible;
        } else {

            var viewTop                 = isContained ? 0 : wPosition,
                viewBottom      = viewTop + vpHeight,
                viewLeft        = $c.scrollLeft(),
                viewRight       = viewLeft + vpWidth,
                position          = $t.position(),
                _top            = position.top,
                _bottom         = _top + $t.height(),
                _left           = position.left,
                _right          = _left + $t.width(),
                compareTop      = partial === true ? _bottom : _top,
                compareBottom   = partial === true ? _top : _bottom,
                compareLeft     = partial === true ? _right : _left,
                compareRight    = partial === true ? _left : _right;

            if(direction === 'both')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop)) && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
            else if(direction === 'vertical')
                return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop));
            else if(direction === 'horizontal')
                return !!clientSize && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
        }
    };

})(jQuery);