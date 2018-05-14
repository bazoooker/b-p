//  $(document).ready(function() {
//   $('select').niceSelect();
// });



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
        $('.js-object-slide').click(function() {
            var thumbIndex = $(this).index();
            swiperObjects.slideTo(thumbIndex, 300);
        });

    // filter objects
    $('.objects__filter-links li a').click(function(e) {
        e.preventDefault();
        $('.objects__filter-links li a').removeClass('active');
        $(this).addClass('active');
    })

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
                $(elem).slideDown(300);
            } else {
                $(elem).slideUp(300);
            }
        });
    });


    $('.collapsable__btn').on("click", function() {
        $(this).toggleClass('untoggled');
    });



    // TABS SHOW/HIDE FULL CONTENT ON BUTTON CLICK
    // =================================

    // $(document).ready(function() {
    //     $('.collapsable__btn').on("click", function() {
    //         var sectionTabs = $(this).parent().find('.section-tabs__content_type-small');
    //         if (sectionTabs.hasClass('concatenated')) {
    //             sectionTabs.removeClass('concatenated');
    //         } else {
    //             sectionTabs.addClass('concatenated');
    //         }
    //     });
    // });

//     var li_name = [];

    
//     $('.section-tabs .section-tabs__tabs').each(function(i, elem) {
//         elem.setAttribute('rel', i);
//         $('.section-tabs .section-tabs__tabs[rel=' + i + ']').parent().find('.section-tabs__content').attr('rel', i);
//         super_sbor(i);
//     });

//     function super_sbor(number) {
//         $('.section-tabs .section-tabs__tabs[rel=' + number + '] ul li').each(function(i, elem) {
//             li_name[i] = elem.innerHTML;
//         });

//         var content = [];

//         $('.section-tabs__content[rel=' + number + '] .slide').each(function(i, elem) {
//             content[i] = elem.innerHTML;
//         });            
//         paint_dom(content, li_name, number);

//         content = new Array();
//         li_name = new Array();
//     }

//     $('#mini_tab ul.cd-accordion-menu .has-children').click(function() {
//         if ($(this).attr('class') == 'has-children active') {
//             $(this).find('.slide_children').slideUp(200);
//             $(this).removeClass('active');
//         } else {
//             $('.slide_children').hide(200);
//             console.log("hide me");
//             $('#mini_tab ul.cd-accordion-menu .has-children.active').removeClass('active');
//             $(this).addClass('active');
//             $(this).find('.slide_children').slideDown(200);
//         }
//     });


// function paint_dom(content, li_name, number, name_home_dom='section-tabs__tabs') {
//     var structur_dom = '<ul class="cd-accordion-menu">';
//     for (var i = 0; i < li_name.length; i++) {

//         if (content[i] == undefined) {
//             content[i] = ' ';
//         }
//         structur_dom = structur_dom + '<li rel=' + i + ' class="has-children"><label class="group-1">' + li_name[i] + '</label><div style="display:none;" class="slide_children">' + content[i] + '</div></li>';
//     }
//     structur_dom = structur_dom + '</ul>';

//     if (name_home_dom=='section-tabs__tabs') {
//      $('.section-tabs__tabs[rel=' + number + '] ').append("<div id='mini_tab'>" + structur_dom + "</div>");
//     }else{

//       $('.'+name_home_dom+'').append("<div id='mini_tab'>" + structur_dom + "</div>");
//     }
// }






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
        console.log('hover');
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

// STICKY HEADER


function showStickyHeader() {
    // var heroHeight = $('.hero').height();
    // console.log(heroHeight);

    if ( window.pageYOffset > 0 ) {
        console.log('more than 700')
       $('.page-header').addClass('page-header_sticky');
       if ( $(window).width() > 1230 ) {
           $('.weather').fadeOut(300);
       }
    }
    else {
        console.log('less than 700')
        $('.page-header').removeClass('page-header_sticky');
        $('.weather').show(300);   
    }
}

function showToTopButton() {
    // var heroHeight = $('.hero').height();
    // console.log(heroHeight);

    if ( window.pageYOffset > 500 ) {
       $('.to-top').addClass('to-top_visible')
    }
    else {
        $('.to-top').removeClass('to-top_visible')
    }
} 

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
    $('.js-scroll-to-top').click(scrollToTop);
    window.onscroll = function() {showStickyHeader()};    
    window.onscroll = function() {showToTopButton()};    
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

// $(document).ready(function() {

// function slideMenuList() {

//     var navList = $('.js-menu-list-slidein a');
//     i = 500;

//     navList.each(function() {
//         $(this).delay(i).css('color', 'red');
//         i = i+600;
//         console.log(i)
//     });

// }

// });



// добавить каждому пункту transition-delay
// js-menu-list-slidein


