$(document).ready(function(e) {
//页面必用效果js

//    $('#uiLst li').each(function(index, element) {
//        index++;
//        var r=/^[0-9]*[1-9][0-9]*$/,
//            r3=index/2;
//        if(r.test(r3)){
//            $(this).addClass('oth');
//        }
//    });
    $.hov('#uiLst li');


    var topBox = 238;
    var leftBox = 0;
    Fixed_Box("#fixedBox",topBox,leftBox);
    //浏览器的宽度发送改变时重新设置其样式
    $(window).resize(function()
    {
        Fixed_Box("#fixedBox",topBox,leftBox);
    });
    //alert($(window).width());

});