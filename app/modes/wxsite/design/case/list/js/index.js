$(document).ready(function()
{
//    $.setAjaxForm('#myForm');
    $("input:radio").css("display","none");
    //绑定点击事件
    $(".close").find("a").bind("click",function(){
    	$(this).parent().parent().css('display','none');
    });
    $(".tabC").find("li").bind("click",function(){
    	choose(this);
    });

    $(".tabT a:eq(0)").bind("click",function(){
    	toggle('yjmset' , this);
    });
    $(".tabT a:eq(1)").bind("click",function(){
    	toggle('style' , this);
    });
    $(".tabT a:eq(2)").bind("click",function(){
    	toggle('room' , this);
    });
    $(".tabT a:eq(3)").bind("click",function(){
    	toggle('surface' , this);
    });
});

function toggle(id , a) {

	$('.tabCon').css('display','none');
	$('#'+id).css('display','block');

	$(a).parent().find("a").each(function(){$(this).removeClass('cu')});
	$(a).addClass("cu");
}

function choose(li) {
	$(li).find("input:radio").attr("checked",true);
	$('form').submit();
}