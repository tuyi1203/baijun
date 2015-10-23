// JavaScript Document
/**
 *  jQuery  zoom.js  
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
		this.options = null;
		this._defaults = {
			multiple:0.1 // 比例
		};
		this.init(opt);
	};
  zoom.prototype ={
	   init:function(opt){
		   var tempOpt = opt || {};
		   this.options = $.extend({}, this._defaults, tempOpt);
		   //this.options.width = this.element.width(); // 图片缩小最小宽度
		   //this.options.height = this.element.height(); //图片缩小最小高度
		   this.options.maxwidth = $(window).width();  // 图片放大最大的宽度 
		   this.options.maxheight = $(window).height(); // 图片放大最大的高度
		   var self  = this;
		   this.options.x = 0;
		   // 事件监听

		   this.element.bind('load',function(e){
			   self.options.width = $(this).width(); // 图片缩小最小宽度
			   self.options.height = $(this).height(); //图片缩小最小高度
			   self.options.top = $(this).offset().top;	
		   });
		   self.element.bind('pinchopen',function(e){
			   self.magnify();
		   });
		   self.element.bind('pinchclose',function(e) {
			   self.shrink();
		   });
		   self.element.bind('swipemove',function(e,t) {
			   // self.drag(t);
		   });
	   },
	   magnify:function() {
		      // 放大图片
			  var width =  this.element.width()*(1+this.options.multiple),
			  	  height = this.element.height()*(1+this.options.multiple),
				  left = this.element.offset().left-((width-this.element.width())/2),
				  top = this.element.offset().top-((height-this.element.height())/2);
				  swipeflg = false;
			  //width>=this.options.maxwidth||
			  if(height>this.options.maxheight) {  
				  return;
			  }	  
			  this.element.css({'width':width,'height':height,'left':left,'top':top});
	   },
	   shrink:function() {
		      // 缩小图片 
			  var width =  this.element.width()*(1-this.options.multiple),
			  	  height = this.element.height()*(1-this.options.multiple),
				  left = this.element.offset().left+((this.element.width()-width)/2),
				  top = this.element.offset().top+((this.element.height()-height)/2);
				  // width<=this.options.width||
			  if(height < this.options.height) { 
			      //tuyi
			      swipeflg = true;
				  this.element.css({'width':this.options.width,'height':this.options.height,'left':0,'top':this.options.top}); 	
				  return;
			  }	  
			  this.element.css({'width':width,'height':height,'left':left,'top':top});		      
	   },
	   drag:function(t) {
		  this.element.css({'left':+t.delta[0].moved});	  						
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
  }

  $.fn.zoom.Constructor = zoom;
  $.fn.zoom.noConflict = function () {
	$.fn.zoom = old;
	return this;
  }	
})(jQuery);
