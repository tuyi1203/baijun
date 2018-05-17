define(["jquery","countup","waypoints"],function($){
	$.extend({
		simulationLink:function(obj,noloading){
			//noloading为查找的不执行加载动画
			$(obj).bind('click',function(){
				var loading = $('<div class="load-fixed load-container load9"><div class="loader">Loading...</div></div>');
				var mask = $('<div class="loading_mask"></div>');
				var notperform = $(this).hasClass(noloading) || $(this).attr('target')=='_blank';
				if(notperform){
					return;
				}else{
					$('body').append(mask);
					$('body').append(loading);
				}
			})
		},
		//$.simulationLink('a','_noLoading');
		
		lim:function(obj,maxNum){
			$(obj).each(function(){
				var html = $(this).html();
				if(html.length > maxNum){
					$(this).html(html.substr(0, maxNum)+"...");
				}
			})
			
		},
		//模块字数限制$.lim('#obj','10','10');
		
		backtop:function(obj,topNum,leveNum,boxWidth){
			var $obj = $(obj);
			var wWidth = $(window).width();
			var tW = $(obj).width();
			var w = ((wWidth-boxWidth)/2)-tW-(tW/2);
			if(wWidth>=980){
				$obj.css('right',w);
			}
			$(window).scroll(function(){  
				if ($(window).scrollTop()>leveNum){
					$obj.fadeIn(500);
				}  
				else{
					$obj.fadeOut(500);
				}  
			});
			$obj.on('click',function(){
				$('body,html').animate({scrollTop:0},topNum);
			});
		}
		//回到顶部调用$.backtop('#_back','500','500',1100);
	});
	
	(function ($) {
	    $.fn.extend({
	       wisdom:function(options){
	            var defaults = {
	            	debuge:false,
	            	noloading:'_noLoading',
	            	jumppart:'.indpart',
	            	jumpobj:'._jumpNum',
	            	dropobj:'nav',
	            	droplnk:'.droplnk',
	            	listobj:'.pagelist',
	            	listjumplnk:'a._jumplnk'
	            };
	            var options = $.extend({},defaults, options);
	            var o = options,
	        		obj = $(this);
	        		
				if(o.debuge){
					console.log('调试模式开启');
				}else{
					window.console = {log : function(){return false}};
				}
				
				$.simulationLink('a',o.noloading);
				//设置点击链接触发加载动画
				
				$(o.jumppart).find('a').hover(function(){
					$(o.jumpobj).countUp({
					    delay: 100,
					    time: 2000
					});
				},function(){
					return;
				});
				//数字翻滚
				
				$(o.dropobj).find(o.droplnk).hover(function(){
					$(this).addClass('drophov');
					$(this).find('.droplist').css('display','block');
				},function(){
					$(this).removeClass('drophov');
					$(this).find('.droplist').css('display','none');
				});
				//导航下拉通用
				
				$(o.listobj).find(o.listjumplnk).hover(function(){
					$(o.jumpobj).countUp({
					    delay: 100,
					    time: 2000
				    });
				},function(){
					return;
				})
				//列表页数字翻滚
				
				$.backtop('#_back','500','500',980);
				//回到顶部调用
				
	       }
	    })
	})(jQuery);
	
});

