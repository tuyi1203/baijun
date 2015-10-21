$(document).ready(function(e) {
	$.input('#phone');

	$('#uiBnSlider').flexslider({
		animation: "slide",
		direction:"horizontal",
		controlNav:true,
		directionNav:false,
		easing:"swing"
	});//大banner调用


	$('.fancybox-thumbs').fancybox({
		titleShow:true,
		closeBtn  : true,
		arrows    : true,
		helpers : {
			thumbs : {
				width  : 100,
				height : 100,

			}
		}
	});


	$('.fancybox-thumbs-btn').click(function(){
		$(this).next().find('a').eq(0).click();
		return false;
	});

	$.tabHov('#tabList','#tabBox');

	var $ds_lnk = $('#designBox').find('a');
	$ds_lnk.hover(function(){
		$(this).find('img').animate({'right':'10px'},{duration: 100, queue: false});
	},function(){
		$(this).find('img').animate({'right':'0'},{duration: 100, queue: false});
	})
	//设计师推荐用样式布局

	$('#packScroll').jCarouselLite({
		visible: 2,
		auto: 2000,
		vertical: true
	});//强强联合，滚动调用

	$('#cntScroll').jCarouselLite({
		visible: 2,
		auto: 2000,
		vertical: true
	});//业主预约，滚动调用

	$('#lstScroll').jCarouselLite({
		visible: 8,
		auto: 2000,
		vertical: true
	});//家装预约，滚动调用

	$.setAjaxForm('#phoneForm',function(response)
	{
	   if(response.result == 'fail') {

		   if($.type(response.message) == 'object')
           {
			   var str = new Array();
               for (ms in response.message)
               {
                   str.push(response.message[ms]);
               }
               alert(str.join('\n'));
           }

		   if($.type(response.message) == 'string')
           {
			   alert(response.message);
           }

	   } else {
		   alert(response.message);
		   $("#phone").val("");
		   $("#phone").siblings('label').css({'display':'block'});
		   $("#phone").removeClass('focus');
		   //location.reload();
	   }
	});

	$.setAjaxForm('#priceForm',function(response){});
});