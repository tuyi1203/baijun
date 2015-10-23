/**
 *  jQuery  zoom.1.1js  
 *  Copyright (c)  ZhangYu 
 */ 
 if ( !Function.prototype.bind ) { 
	Function.prototype.bind = function (o) { 
		var self = this,
			boundArgs = Array.prototype.slice.call(arguments,0); 
		return function(){ 
			var args = [], 
				i; 
			for (i = 1; i < boundArgs.length; i++ ) {
					args.push(boundArgs[i]); 
			}		
			for ( i = 0; i < arguments.length; i++ ) {
				args.push(arguments[i]); 
			}
			return self.apply(o,args); 
		} 
	} 
};
 
(function($) {
	var zoom = function(element,opt) {
		this.element = $(element);
		this.isMax = false;
		this.options = null;
		this._defaults = {
			magnifyStyle:'zoomImgbtnOpen',
		    shrinkStyle:'zoomImgbtnClose',
			magnifyHtml:'&#xf13b',
			shrinkHtml:'&#xf13c'
			
		};
		this.init(opt);
	};
  zoom.prototype ={
	   init:function(opt){
			var tempOpt = opt || {};
			this.options = $.extend({}, this._defaults, tempOpt);
			this.options.maxwidth = 'auto'; //$(window).width();  // 图片放大最大的宽度 
			this.options.maxheight = $(window).height()*2; // 图片放大最大的高度
			var self  = this;
			this.initStatus();
			// 事件监听
			this.element.bind('click',function(e){
				if(!self.isMax) {
					 $(this).addClass(self.options.shrinkStyle)
			 		 .removeClass(self.options.magnifyStyle).html(self.options.shrinkHtml);
					self.magnify();	
				}else {
					$(this).addClass(self.options.magnifyStyle)
			 		.removeClass(self.options.shrinkStyle).html(self.options.magnifyHtml);
					self.shrink();
				}	
			});			
	   },
	   magnify:function() {
			  // 放大图片
			  var curImg = $(this.options.curObjClass).find('img');
			  this.options.width = curImg.width(); // 图片原始宽度
			  this.options.height = curImg.height(); //图片原始高度				
			  this.options.left = curImg.position().left; //图片原始left				
			  this.options.top = curImg.position().top; //图片原始top				
			  this.isMax = true;
			  this.options.winWidth = $(window).width();
			  this.options.winHeight = $(window).height();
			  swipeflg = false;
			  var self  = this;
			  curImg.css({'width':this.options.maxwidth,'height':this.options.maxheight,'left':0,'top':0})
			  .bind('swipemove',function(e,t) {
			   	 self.drag(this,t);
		   	  });
	   },
	   shrink:function() {
			  this.isMax = false;
			  swipeflg = true;
			  // 缩小图片 
			  var curImg = $(this.options.curObjClass).find('img');
			  curImg.css({'width':this.options.width,'height':this.options.height,'left':this.options.left,'top':this.options.top})
			  .unbind('swipemove');		      
	   },
	   drag:function(obj,t) {
		    var left = $(obj).position().left,
				top =  $(obj).position().top,
				width = $(obj).width(),
				height =  $(obj).height();	
			if(t.delta[0].lastX >0) {
				if(left < 0) {
					left += t.delta[0].lastX;		
				}
			}else if(t.delta[0].lastX < 0) {
				if(this.options.winWidth<(left+width)) {
					left-=Math.abs(t.delta[0].lastX);
				}
			}
			if(t.delta[0].lastY > 0) {
				if(top < 0) {
					top +=t.delta[0].lastY;
				}	
			}else {
				if(this.options.winHeight<(top+height)) {
					top-=Math.abs(t.delta[0].lastY);
				}				
			}
		   $(obj).css({'left':left,'top':top});	  						
	  },
	  initStatus:function() {
		  this.isMax = false;
		  this.element.html(this.options.magnifyHtml).removeClass(this.options.shrinkStyle).addClass(this.options.magifyStyle);	  
	 }
  };
  
  var old = $.fn.zoom;
  
  $.fn.zoom= function (option) {
	return this.each(function () {
	  var $this   = $(this);
	  var data    = $this.data('bs.zoomimg');
	  var options = typeof option == 'object' && option;
	  if (!data) {
		  $this.data('bs.zoomimg', (data = new zoom(this, options)));
	  }
	  if (typeof option == 'string') {
		  data[option]();
	  }
	});
  };
  
  $.fn.initZoomStatus = function() {
	   var zoom = $(this).data('bs.zoomimg');	  
	   if(zoom) {
		   zoom.initStatus();	
	   }
  };
  $.fn.zoom.Constructor = zoom;
  $.fn.zoom.noConflict = function () {
	$.fn.zoom = old;
	return this;
  }	
})(jQuery);
