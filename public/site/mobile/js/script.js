/**
 * 重庆百君律师事务所
 * 
 * @version 1.0 2018-5-5
 */

define(["jquery"],function (){
	var windowHt = window.height;
	var script = {};

	// var handler = function() {
	// 	event.preventDefault();
	// };
	var fullPage = function(dom){
		var $dom = $(dom);
		$dom.css('height',window.innerHeight);
	};

	var indTouch = function(firPage,secPage,downLnk){
		var touchFlag = 1,
			startx,starty;//获得角度
	    function getAngle(angx, angy) {
	        return Math.atan2(angy, angx) * 180 / Math.PI;
	    };
	    //根据起点终点返回方向 1向上 2向下 3向左 4向右 0未滑动
	    function getDirection(startx, starty, endx, endy) {
	        var angx = endx - startx;
	        var angy = endy - starty;
	        var result = 0;
	        //如果滑动距离太短
	        if (Math.abs(angx) < 2 && Math.abs(angy) < 2) {
	            return result;
	        }
	        var angle = getAngle(angx, angy);
	        if (angle >= -135 && angle <= -45) {
	            result = 1;
	        } else if (angle > 45 && angle < 135) {
	            result = 2;
	        } else if ((angle >= 135 && angle <= 180) || (angle >= -180 && angle < -135)) {
	            result = 3;
	        } else if (angle >= -45 && angle <= 45) {
	            result = 4;
	        }
	        return result;
	    }//手指接触屏幕
	    document.addEventListener("touchstart", function(e) {
	        startx = e.touches[0].pageX;
	        starty = e.touches[0].pageY;
	    }, false);
	    //手指离开屏幕
	    document.addEventListener("touchend", function(e) {
	        var endx, endy;
	        endx = e.changedTouches[0].pageX;
	        endy = e.changedTouches[0].pageY;
	        var direction = getDirection(startx, starty, endx, endy);
	        if(direction == 1){
	        	if(touchFlag == 1){
	        		backtop();
			    	$(firPage).slideUp();
			    	$(secPage).slideDown('',function(){touchFlag = 0;});
	        	}
	        	
	        }
	    }, false);

	    $(window).scroll(function() {
	        if ($(document).scrollTop()<=0){
			    document.addEventListener("touchend", function(e) {
			        var endx, endy;
			        endx = e.changedTouches[0].pageX;
			        endy = e.changedTouches[0].pageY;
			        var direction = getDirection(startx, starty, endx, endy);
			        if(direction == 2){
			        	removebackTop();
			        	$(secPage).slideUp();
				    	$(firPage).slideDown('',function(){touchFlag = 1;});
			        }
			    }, false);
	        }
	    });

	    $(downLnk).bind('click',function(){
	    	backtop();
	    	$(firPage).slideUp();
	    	$(secPage).slideDown();
	    	touchFlag = 0;
	    });
	};


	var sch = function(btn,ele,close){
		var $btn = $(btn),
			$ele = $(ele),
			$close = $(close);
		$btn.bind('click',function(){
			$ele.animate({'top':'0','opacity':'1'});
			$('html,body').css({'height':'100%','overflow-y':'hidden'});
			$close.bind('click',function(){
				$('html,body').css({'height':'auto','overflow-y':'inherit'});
				$ele.animate({'top':'-100%','opacity':'0'});
			})
		})
	};

	var personLst = function(ele){
		var $ele = $(ele);
		$ele.find('dt').bind('click',function(){
			var $dl = $(this).parents('dl');
			if($dl.hasClass('open')){
				$dl.removeClass('open');
				$dl.find('dd').slideUp();
			}else{
				$dl.siblings('dl').removeClass('open').find('dd').slideUp();
				$dl.addClass('open').find('dd').slideDown();
			}
		})
	};


	var nav = function(lnk,navEle,close,wxLnk,wxLayer,wxClose){
		var $lnk = $(lnk),
			$nav = $(navEle)
			$close = $(close),
			$wxLnk = $(wxLnk),
			$wxLayer = $(wxLayer),
			$wxClose = $(wxClose),
			navFlag = 1,
			anFlag = 1;
		$lnk.bind('click',function(){
			if(navFlag == 1){
				navFlag = 2;
				$nav.css({'transform':'translate(0,0)','-moz-transform':'translate(0,0)','-webkit-transform':'translate(0,0)','-ms-transform':'translate(0,0)'});
				$('html,body').css({'overflow-y':'hidden','height':'100%'});
				$nav.find('a.downLnk').bind('click',function(){
					var $li = $(this).parents('li');
					if(anFlag == 1){
						anFlag = 2;
						if($li.hasClass('open')){
							$li.removeClass('open');
							$(this).siblings('dl').slideUp('slow',function(){
								anFlag = 1;
							});
						}else{
							$li.addClass('open');
							$(this).siblings('dl').slideDown('slow',function(){
								anFlag = 1;
							});
						}
					}else{
						return;
					}
				})
				$wxLnk.bind('click',function(){
					$wxLayer.removeClass('dialogClose').addClass('dialogShow');
				});
				$wxClose.bind('click',function(){
					$wxLayer.removeClass('dialogShow').addClass('dialogClose');
				});
				$close.bind('click',function(){
					$nav.css({'transform':'translate(100%,0)','-moz-transform':'translate(100%,0)','-webkit-transform':'translate(100%,0)','-ms-transform':'translate(100%,0)'});
					$('html,body').css({'overflow-y':'scroll','height':'inherit'});
					navFlag = 1;
				});
			}

		});
	};

	var backtop = function(){
		var html = '<a href="javascript:void(0);" class="backTop" id="_backTop"></a>';
		$("body").append(html);
		$('#_backTop').bind('click',function(){
			$("html,body").animate({scrollTop:0},500);
		});
	}

	var removebackTop = function(){
		$('#_backTop').remove();
	}

	script.nav = nav;
	script.fullPage = fullPage;
	script.indTouch = indTouch;
	script.sch = sch;
	script.personLst = personLst;
	script.backtop = backtop;
	return script;
});
