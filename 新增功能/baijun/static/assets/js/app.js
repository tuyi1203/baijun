define(["jquery","nicescroll"],function($){
	$.extend({
		setIndex: function(className) { 
			var zIndex = 1000;
			$('.'+className).each(function() {
				$(this).css('z-index',zIndex--);
			});
		},
		// 设置index

		tab:function(tId,cId){ 
			$(tId).find('li').click(function(){
				if($(this).hasClass('cu')){
					return false;//do something
				}else{
					var thisIndex = $(this).index();
					var loading = $('<div class="load-container load7"><div class="loader">Loading...</div></div>');
					var thisCId = $(cId).find('.tab_con').eq(thisIndex);
					$(cId).find('.load-container').remove();
					$(this).addClass('cu').siblings('li').removeClass('cu');
					
//					thisCId.css({'display':'block'}).addClass('_tabconcu').siblings('.tab_con').css({'display':'none'}).removeClass('_tabconcu');
					$(cId).find('.tab_con').css({'display':'none'}).removeClass('_tabconcu');
					$(cId).append(loading);
					setTimeout(function(){
						loading.remove();
						thisCId.css({'display':'block'}).addClass('_tabconcu');
					},500);
					
				}
			});
		},
		//选项卡调用$.tab('#tabT','#tabC');
		
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
		
		hov:function(obj){
			var $obj = $(obj);
			$obj.hover(function(){
				if($(this).hasClass('noData')){
					return false;
				}else{
					$(this).addClass('hov');
				}
			},function(){
				$(this).removeClass('hov');
			});
			
		},
		//指向对象改变状态调用$.hov('#lst li');
		
		lim:function(obj,maxNum){
			$(obj).each(function(){
				var html = $(this).html();
				if(html.length > maxNum){
					$(this).html(html.substr(0, maxNum)+"...");
				}
			})
			
		},
		//模块字数限制$.lim('#obj','10','10');
		
		input:function(obj){
			var $obj = $(obj);
			var $defval = $obj.val();
			$obj.focus(function(){
				var $thisval = $(this).val();
				$(this).siblings('label').css({'display':'none'});
				$(this).addClass('focus');
			});
			$obj.blur(function(){
				var thisval = $(this).val();
				if(thisval==""){
					$(this).siblings('label').css({'display':'block'});
				}
				$(this).removeClass('focus');
			});
		},
		//输入框获取焦点及失去焦点时的水印变化调用$.input('input.text');
		
		backtop:function(obj,topNum,leveNum,boxWidth){
			var $obj = $(obj);
			var wWidth = $(window).width();
			var tW = $(obj).width();
			var w = ((wWidth-boxWidth)/2)-tW-(tW/2);
			if(wWidth>=1440){
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
		},
		//回到顶部调用$.backtop('#_back','500','500',1100);
		
		turn:function(obj,front,back,width){
			var $obj = $(obj),
				$front = $(front),
				$back = $(back);
			var turn = function(target,time,opts){
				target.find('a').hover(function(){
					$(this).find($front).stop().animate(opts[0],time,function(){
						$(this).hide().next().show();
						$(this).next().animate(opts[1],time);
					});
				},function(){
					$(this).find($back).animate(opts[0],time,function(){
						$(this).hide().prev().show();
						$(this).prev().animate(opts[1],time);
					});
				});
			}
			
			var verticalOpts = [{'width':0},{'width':width}];
			turn($obj,100,verticalOpts);
//			var horizontalOpts = [{'height':0,'top':'120px'},{'height':'240px','top':0}];
//			turn($('#horizontal'),100,horizontalOpts);

		},
		//设置两面翻转 $.turn('#turn','.front','.back','105');
		
		setheight:function(obj){
			var $obj = $(obj);
			$obj.height($(window).height());
			$(window).resize(function(){
				$obj.height($(window).height());
			});
		}
		//设置和浏览器等高 $.setheight('#leftBar');
		
	});
	
	(function ($) {
	    $.fn.extend({
	        pageinit: function (options) {
	            var defaults = {
	            	debuge:false,
	            	whether:false,
	            	pagemask:'#_pagemask',
	                leftobj: '#leftBar',//左侧菜单容器
	                turnobj:'#logo',
	                turnfront:'.logo_front',
	                turnback:'.logo_back',
	                turnwidth:105,
	                triggerclick:'click',
	                triggerover:'mouseover',
	                lftbarcontrl:'#leftBarContrl',
	                leftbarcontrolclass:'open',
	                lftobjheight:180,
	                swp:'.swiper-slide',
	                swp_box:'.box',
	                swp_box_left:100,
	                noloading:'_noLoading',
	                codelnk:'#_codelnk',
	                codebox:'#_ecode',
	                codeclose:'#_closeecode',
	                slip:'#_lslip',
	                slipcontrl:'#_lsliplnk',
	                slipclose:'#_lslipclose',
	                scroll:'#_scroll',
	                scrolltxt:'#_scrolltxt',
	                call:''
	            };
	            var options = $.extend({},defaults, options);
	            var o = options,
	        		obj = $(this);
	        		
				if(o.debuge){
					console.log('调试模式开启');
				}else{
					window.console = {log : function(){return false}};
				}
				
				if(obj.length>0){
					var lftwth = $(o.leftobj).width();
					obj.animate({'margin-left':lftwth});
				}
				//设置正文默认左移150像素
				
				$(o.leftobj).height($(window).height());
				$(window).resize(function(){
					$(o.leftobj).height($(window).height());
				});
				//设置左侧菜单容器高度
				
				$.turn(o.turnobj,o.turnfront,o.turnback,o.turnwidth);
				//设置logo指向动画
				
				
				if(o.whether == false){
					$(o.lftbarcontrl).css('display','none');
				}
				//是否显示左侧导航开关按钮
				var f = 0;
				$(o.lftbarcontrl).bind(o.triggerclick,function(){
					if(f == 1){
						if(o.whether == true){
							console.log('左侧滑动' + o.whether);
							$(o.leftobj).animate({'height':$(window).height()});
							$(this).removeClass(o.leftbarcontrolclass);
							obj.animate({'margin-left':$(o.leftobj).width()});
							console.log('盒子左偏移为:' + $(o.swp).find(o.swp_box).css('left'));
							$(o.swp).find(o.swp_box).animate({'left':o.swp_box_left});
							f--;
						}
					}else{
						if(o.whether == true){
							console.log('左侧滑动' + o.whether);
							$(o.leftobj).animate({'height':o.lftobjheight},function(){});
							$(this).addClass(o.leftbarcontrolclass);
							obj.animate({'margin-left':'0'});
							console.log('盒子左偏移为:' + $(o.swp).find(o.swp_box).css('left'));
							$(o.swp).find(o.swp_box).animate({'left':o.swp_box_left+150});
							f++;
						}
					}
				});
				//设置左侧导航开关
				
				if($(o.codelnk)){
					$(o.codelnk).bind(o.triggerclick,function(){
//						$(o.codebox + ',' + o.pagemask).css('display','block');
						$(o.codebox).css({'z-index':'201','display':'block'});
						$(o.pagemask).css({'z-index':'200','display':'block'});
						$(o.codeclose).bind(o.triggerclick,function(){
//							$(o.codebox + ',' + o.pagemask).css('display','none');
							$(o.codebox).css({'z-index':'101','display':'none'});
							$(o.pagemask).css({'z-index':'100','display':'none'});
						});
					});
				}
				//二维码控制事件
				
				$.simulationLink('a',o.noloading);
				//设置点击链接触发加载动画

				var f2 = 0;
				$(o.slipcontrl).bind(o.triggerclick,function(){
					if(f2 == 1 ){
						$(o.slip).animate({'left':'-100%','margin-left':'0'},function(){
							$(o.leftobj).parent().css('z-index',100);
							console.log($(o.slip).offset().left);
							$(o.scroll).getNiceScroll().hide();
						});
						f2--;
					}else{
						$(o.leftobj).parent().css('z-index',105);
						$(o.slip).animate({'left':0},function(){
						    $(o.scroll).height($(window).height()-$(o.scrolltxt).outerHeight(true)).niceScroll({
								cursorcolor:"#414141",
								zindex:"102",
								autohidemode:"scroll",
								hidecursordelay:500,
								cursoropacitymin:0,
								cursoropacitymax:1,
								touchbehavior:false,
								cursorwidth:"5px",
								cursorborder:"0",
								cursorborderradius:"5px"
						    });
						    console.log($(o.slip).offset().left);
						    $(o.scroll).getNiceScroll().show();
						    //专业领域滚动条模拟
						});
						f2++;
					}
				});
				$(o.slipclose).bind(o.triggerclick,function(){
					if(f2 == 1 ){
						$(o.slip).animate({'left':'-100%','margin-left':'0'},function(){
							$(o.leftobj).parent().css('z-index',100);
							console.log($(o.slip).offset().left);
							$(o.scroll).getNiceScroll().hide();
						});
						f2--;
					}else{
						return false;
					}
				});
				//专业领域开关
	       },
	       
	       contact:function(options){
	            var defaults = {
	            	debuge:false,
	                triggerobj: '#_contactContrl',
	                triggerclick:'click',
	                class:'boxarr_close',
	                triggermouseenter:'mouseenter',
	                triggermouseleave:'mouseleave',
	                lnglnk:'#_languageLnk',
	                lnglst:'#_hidelst',
	                box:'#_contactBox',
	                call:'',
	                isHome:false
	            };
	            var options = $.extend({},defaults, options);
	            var o = options,
	        		obj = $(this);
	        		
	        	//初始化联系我们窗口
	        	if(o.isHome == true){
	        		//默认开启
	        		obj.animate({'right':'0'});
					$(this).removeClass(o.class);
				}else{
	        		//默认关闭
	        		obj.animate({'right':-(obj.width())});
					$(this).addClass(o.class);
				};
				
				$(o.triggerobj).bind(o.triggerclick,function(){
					if($(this).hasClass(o.class)){
						console.log(obj.css('right'));
						obj.animate({'right':'0'});
						$(this).removeClass(o.class);
					}else{
						console.log(obj.css('right'));
						obj.animate({'right':-(obj.width())});
						$(this).addClass(o.class);
					}
				});
				//联系我们开关
				
				obj.find(o.lnglnk).bind(o.triggermouseenter,function(){
					$(o.lnglst).css('display','block');
					$(this).parent('dd').bind(o.triggermouseleave,function(){
						$(o.lnglst).css('display','none');
						$(this).unbind(o.triggermouseleave);
					});
				});
				//语言切换
	    	}
	    });
	    
	})(jQuery);
});

