'use strict';

$(document).ready(function () {

    // leftbar toggle for minbar
    var nice = $(".left-bar").niceScroll(); 
    $('.menu-bar').click(function(){                  
        $(".content-left").toggleClass('mini-bar');        

        $(".left-bar").getNiceScroll().remove();
        setTimeout(function() {
            $(".left-bar").niceScroll();
        }, 200);
    }); 
    
    // mobile menu
    $('.menu-bar-mobile').on('click', function (e) {        
        // $(this).addClass('menu_appear');
        $(".left-bar").getNiceScroll().remove();
        
        $( ".left-bar" ).toggleClass("menu_appear" );
        $( ".overlay" ).toggleClass("show" );
        setTimeout(function() {
          $(".left-bar").niceScroll();
        }, 200);
    });

    // orvelay hide menu
    $(".overlay").on('click',function(){
        $( ".left-bar" ).toggleClass("menu_appear" );
        $(this).removeClass("show");
    });

    // right side-bar toggle
    $('.right-bar-toggle').on('click', function(e){
        e.preventDefault();
        $('.wrapper').toggleClass('right-bar-enabled');
    });

    $('ul.menu-parent').accordion();

   
});