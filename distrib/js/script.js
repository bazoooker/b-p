//  $(document).ready(function() {
//   $('select').niceSelect();
// });



$(document).ready(function(){ 
    var swiperEvents = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
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




// ACCORDEON
// =================================

$(document).ready(function () {
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
})
    



// MAIN-MENU
// =================================

var menuIsOpen; //for closing menu on "esc"

// menu open/close
function openMenu() {
    var topMenu = $('.menu');    
    if( topMenu.hasClass('menu_active') ) {
        topMenu.removeClass('menu_active');
        $('.overlay').fadeOut(300);
        $('.page-wrapper').removeClass('h-no-scroll');
        menuIsOpen = false;
    }
    else {
        topMenu.addClass('menu_active');
        $('.overlay').fadeIn(300);
        $('.page-wrapper').addClass('h-no-scroll');
        slideMenuList();
        menuIsOpen = true;
    }
}

// triggers
$(document).ready(function() {   
    $('.js-open-menu').click(openMenu);
    $('.js-menu-close').click(openMenu);
    $('.js-overlay').click(openMenu);    
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
