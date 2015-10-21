$(document).ready(function(e) {
//页面必用效果js

    var topBox = 238;
    var leftBox = 0;
    Fixed_Box("#fixedBox",topBox,leftBox);
    //浏览器的宽度发送改变时重新设置其样式
    $(window).resize(function()
    {
        Fixed_Box("#fixedBox",topBox,leftBox);
    });

    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
		directionNav:false
    });

//    var theInt = null;
//    var $crosslink, $navthumb;
//    var curclicked = 0;
//
//    theInterval = function(cur){
//        clearInterval(theInt);
//
//        if( typeof cur != 'undefined' )
//            curclicked = cur;
//
//        $crosslink.removeClass("active-thumb");
//        $navthumb.eq(curclicked).parent().addClass("active-thumb");
//            $(".stripNav ul li a").eq(curclicked).trigger('click');
//
//        theInt = setInterval(function(){
//            $crosslink.removeClass("active-thumb");
//            $navthumb.eq(curclicked).parent().addClass("active-thumb");
//            $(".stripNav ul li a").eq(curclicked).trigger('click');
//            curclicked++;
//            if( 6 == curclicked )
//                curclicked = 0;
//
//        }, 3000);
//    };
//
    $.tab('#tabT','#tabC');
//
//    $(function(){
//
//        $("#main-photo-slider").codaSlider();
//
//        $navthumb = $(".nav-thumb");
//        $crosslink = $(".cross-link");
//
//        $navthumb
//        .click(function() {
//            var $this = $(this);
//            theInterval($this.parent().attr('href').slice(1) - 1);
//            return false;
//        });
//
//        theInterval();
//    });
    //alert($(window).width());

});