//获取最高的一个zindex，提供给dialog和control调用，
$.fn.bgIframe = $.fn.bgiframe = function(s)
{
    //因发现ie7也出现这个问题，所以不管什么浏览器都加上
    //if ($.browser.msie && /6.0/.test(navigator.userAgent))
    try
    {
        s = $.extend({ top: 'auto', left: 'auto', width: 'auto', height: 'auto', opacity: true, src: 'javascript:void(0);'
        }, s || {});

        var prop = function(n)
        {
            return n && n.constructor == Number ? n + 'px' : n;
        };
        var width = this.outerWidth(true);
        var height = this.outerHeight(true);
        var html = this.find('.bgiframe');
        if (html.length > 0)
        {
            html.remove();
        }
        html = '<iframe class="bgiframe" frameborder="0" tabindex="-1" src="javascript:void(0)"' + 'style="display:block;position:absolute;z-index:-1;' + (s.opacity !== false ? 'filter:Alpha(Opacity=\'0\');' : '') + 'top:' + (s.top == 'auto' ? '0px' : prop(s.top)) + ';' + 'left:' + (s.left == 'auto' ? '0px' : prop(s.left)) + ';' + 'width:' + prop(width) + ';' + 'height:' + prop(height) + ';' + ' overflow:hidden;"/>';
        this.prepend(html);
    } catch (e) { }
    return this;
};

function preventBSK() {
	var a = false;
	var b = window.event;
	if (typeof(b) != 'undefined') {
		a = b && b.altKey && (b.keyCode == 8 || b.keyCode == 37 || b.keyCode == 39);
		if (b.keyCode == 8) {
			var c = b.srcElement.tagName.toUpperCase();
			if (c == "TEXTAREA" || c == "INPUT") a = b.srcElement.readOnly;
			else a = true
		}
		b.cancelBubble = a;
		b.returnValue = !a
	}
} 

/*
 * 计算文本长度
*/

(function($)
{
	var Listener = function(el, opt)
	{
		//默认值
        var _default = {
            max: 4000,
            objTotal: $(el).closest('div').next().find('.content'),
            objLeft: $(el).next('.textareaTxt').find('i'),
            duration: 200,
            objTotalStyle: 'green',
            flag:false
        };
        //初始化参数
        var options = $.extend({}, _default, opt);
        var start = function()
        {
            //统计函数
            var _length, _oldLen, _lastRn;
            _oldLen = _length = 0;
            this.time = setInterval(function()
            {
                _length = el.val().length;
                if (el == null || typeof el == "undefined")
                {   
                    this.time = null;
                    return;
                }
                if(!options.flag)
                {
                    if (_length == _oldLen)     //防止计时器做无用的计算
                    {   
                        return;
                    }
                }
                if (_length > options.max)
                {
                    //避免ie最后两个字符为"\r\n",导致崩溃
                    _lastRN = (el.val().substr(options.max - 1, 2) == "\r\n");
                    el.val(el.val().substr(0, (_lastRN ? options.max - 1 : options.max)));
                }
                _oldLen = _length = el.val().length;
                //显示已输入字符
                if (options.objTotal.length>0)
                {
                    options.objTotal.html(_length).addClass(options.objTotalStyle);
                };
                //显示剩余的输入字符
                if (options.objLeft.length>0)
                {
                    options.objLeft.html((options.max - _length) < 0 ? 0 : (options.max - _length)).addClass(options.objTotalStyle);
                }
            }, options.duration);
        };

        var stop = function()
        {
            this.time = null;
        };
        if (options.objLeft != null)
        {
            try
            {
                var defaultLength = options.max - $(el).val().length;
                options.objLeft.html(defaultLength).addClass(options.objTotalStyle);
            }
            catch (e) { }
		};
        el.bind('focus', start);
        el.bind('blur', stop);
    };

    $.fn.setListen = function(opt)
    {
        var l = new Listener(this, opt || {});
        this.data('listener', l);
    };
	
	
	jQuery.extend({
		// 设置index
		setIndex: function(className) { 
			var zIndex = 1000;
			$('.'+className).each(function() {
				$(this).css('z-index',zIndex--);
			});
		},
	  
		tab:function(tId,cId){ 
			$(tId).find('li').hover(function(){
				if($(this).hasClass('cu')){
					return false;//do something
				}else{
					
					var thisIndex = $(this).index();
					$(this).addClass('cu').siblings('li').removeClass('cu');
					
					$(cId).find('.tabCon').eq(thisIndex).css({'display':'block'}).siblings('.tabCon').css({'display':'none'});
				}
			},function(){
				return;
			});
		},
		//选项卡调用$.tab('#tabT','#tabC');
		
		tabHov:function(tId,cId){ 
			$(tId).find('li').mousemove(function(){
				if($(this).hasClass('cu')){
					return false;//do something
				}else{
					
					var thisIndex = $(this).index();
					$(this).addClass('cu').siblings('li').removeClass('cu');
					
					$(cId).find('.tabCon').eq(thisIndex).css({'display':'block'}).siblings('.tabCon').css({'display':'none'});
				}
			});
		},
		//选项卡调用$.tabHov('#tabT','#tabC');
		
		hov:function(o){
			var $o = $(o);
			$o.hover(function(){
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
		
		sclPageTop:function(o){
			var $o = $(o);
			$o.click(function(){
				$('html,body').animate({ scrollTop: 0},100);
			});
		},
		//返回顶部按钮
		
		sclChangeClass:function(o,num){
			var $o = $(o);
			$(window).scroll(function(){
				if ($(document).scrollTop() > num){
					$o.addClass('ok');
				}else{
					$o.removeClass('ok');
				}
			});
		},
		//滚动条高度判断,为对象追加class
		
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
		}
		//输入框获取焦点及失去焦点时的水印变化调用$.input('input.text');
		
	});
	
	//给文本框加水印
	$.fn.watermark = function(txt)
	{
	    var getVal = function(el)
	    {
	        if (el.length == 0) return '';
	        if (el[0].type.toLowerCase() == 'a' || el[0].type.toLowerCase() == 'span')
	        {
	            return el.html();
	        } else
	        {
	            return el.val();
	        }
	    };

	    this.attr('watermark', txt);
	    if (getVal(this) == '')
	    {
	        this.val(txt);
	        this.addClass('textGray');
	    }
	    this.focus(function()
	    {
	        var el = $(this);
	        if (getVal(el) == el.attr('watermark'))
	        {
	            el.removeClass('textGray');
	            el.val('');
	        }
	    });
	    this.blur(function()
	    {
	        refreshStatus();
	    });
	    var self = this;
	    var refreshStatus = function()
	    {
	        var el = self; //$(this);
	        var val = getVal(el);
	        var watermark = el.attr('watermark');
	        if (val == '' || val == watermark)
	        {
	            el.val(watermark);
	            el.addClass('textGray');
	        } else
	        {
	            el.removeClass('textGray');
	        }
	    }
	    refreshStatus();
	};


	//给文本框加水印
	$.fn.clearWatermark = function()
	{
	    var inputs=$(this).find('input[watermark]');
	    for(var i=inputs.length-1;i>=0;i--)
	    {
	    	
	        var el = $(inputs[i]);
	        if (el.val() == el.attr('watermark'))
	        {
	            el.val('');
	        }    
	    }
	};
	
})(jQuery);

$.fn.watermark2 = function(txt){
    var getVal = function(el){
			if (el.length == 0) return '';
			if (el[0].type.toLowerCase() == 'a' || el[0].type.toLowerCase() == 'span'){
				return el.html();
			} else {
				return el.val();
			}
    	},
		txtLabel = "txtLabel",
		createLabel = function(id, txt){
			return '<label class="' + txtLabel + '" for="'+ id +'" style="display: none;">'+txt+'</label>';
		}, 
		status = 'focus',
		attr = 'watermark',
		label, txt;

	return $(this).each(function(){
		var _this = $(this);
		if(txt = _this.attr(attr)){
			var label = _this.parent().find('.' + txtLabel);
			if(!label.length){
				label = $(createLabel(_this.attr('id'), txt)).prependTo(_this.parent());
			}
			if(getVal(_this) === ''){
				_this.removeClass(status);
				label.css('display', 'block');
			} else {
				label.css('display','none');
			}
			_this.on('focus blur', function(e){
				var _this = $(this),
					val = getVal(_this);

				if(e.type === status){
					_this.addClass(status);
					label.css('display','none');
				} else {
					_this.removeClass(status);
					if (val){
						label.css('display','none');
					} else {
						label.css('display','block');
					}
				}
			});
		}
	});
};


$('body').keydown(function() {
	preventBSK();
});

Array.prototype.contains = function(obj) { 
var i = this.length; 
while (i>=0) { 
	if (this[i] === obj) { 
		return true; 
	}
	i--; 
} 
return false; 
};

/*  
*　方法:Array.remove(v)  
*　功能:删除JavaScript数组元素.  
*　参数:值  
*　返回:在原JavaScript数组上修改JavaScript数组  
*/  
Array.prototype.remove=function(v)  {  
for(var i=0;i<this.length;i++)  {  
	if(this[i] == v) {   
	   while(i<this.length){
		  if(i==this.length-1) {
			  this.length-=1;
			  break;
		  }
		  this[i] = this[i+1]
		  i++; 
	   }  
	   break;
	}  
} 
}; 


function scroller(a, b,top) {
	$("#" + a).ScrollTo(b,top);
	return false;
}
function Dec_Pos(x, y,w) {
	
    var wnd=$(window);
    var scrollLeft = (wnd.width()+wnd.scrollLeft()-1000)/2+w;
    
	if ($(document).scrollTop() > y) {
		$(x).css({
			position: "fixed",
			top: 0,
			left:scrollLeft
		});
		if ($.browser.msie && $.browser.version == '6.0') {
			$(x).css({
				position: "absolute",
				top: $(document).scrollTop(),
				left:scrollLeft
			})
		}
	} else {
		$(x).css({
			position: "absolute",
			top: y,
			left:scrollLeft
		})
	}
}
function Fixed_Box(a, b,w) {
	b = b || "";
	var c = 0;
	if (!b) {
		c = $(a).offset().top;
	} else {
		c = b;
	}
	Dec_Pos(a, c,w);
	$(window).scroll(function() {
		Dec_Pos(a, c,w);
	})
}
jQuery.getPos = function(e) {
	var l = 0;
	var t = 0;
	var w = jQuery.intval(jQuery.css(e, 'width'));
	var h = jQuery.intval(jQuery.css(e, 'height'));
	var a = e.offsetWidth;
	var b = e.offsetHeight;
	while (e.offsetParent) {
		l += e.offsetLeft + (e.currentStyle ? jQuery.intval(e.currentStyle.borderLeftWidth) : 0);
		t += e.offsetTop + (e.currentStyle ? jQuery.intval(e.currentStyle.borderTopWidth) : 0);
		e = e.offsetParent;
	}
	l += e.offsetLeft + (e.currentStyle ? jQuery.intval(e.currentStyle.borderLeftWidth) : 0);
	t += e.offsetTop + (e.currentStyle ? jQuery.intval(e.currentStyle.borderTopWidth) : 0);
	return {
		x: l,
		y: t,
		w: w,
		h: h,
		wb: a,
		hb: b
	}
};
jQuery.getClient = function(e) {
	if (e) {
		w = e.clientWidth;
		h = e.clientHeight;
	} else {
		w = (window.innerWidth) ? window.innerWidth: (document.documentElement && document.documentElement.clientWidth) ? document.documentElement.clientWidth: document.body.offsetWidth;
		h = (window.innerHeight) ? window.innerHeight: (document.documentElement && document.documentElement.clientHeight) ? document.documentElement.clientHeight: document.body.offsetHeight;
	}
	return {
		w: w,
		h: h
	}
};
jQuery.getScroll = function(e) {
	var t, l, w, h;
	if (e) {
		t = e.scrollTop;
		l = e.scrollLeft;
		w = e.scrollWidth;
		h = e.scrollHeight;
	} else {
		if (document.documentElement && document.documentElement.scrollTop) {
			t = document.documentElement.scrollTop;
			l = document.documentElement.scrollLeft;
			w = document.documentElement.scrollWidth;
			h = document.documentElement.scrollHeight
		} else if (document.body) {
			t = document.body.scrollTop;
			l = document.body.scrollLeft;
			w = document.body.scrollWidth;
			h = document.body.scrollHeight;
		}
	}
	return {
		t: t,
		l: l,
		w: w,
		h: h
	}
};
jQuery.intval = function(v) {
	v = parseInt(v);
	return isNaN(v) ? 0 : v
};
jQuery.fn.ScrollTo = function(s,top) {
	o = jQuery.speed(s);
	return this.each(function() {
		new jQuery.fx.ScrollTo(this, o,top);
	})
};
jQuery.fx.ScrollTo = function(e, o,top) {
	var z = this;
	z.o = o;
	z.e = e;
	z.p = jQuery.getPos(e);
	//在滚动到目的锚点时，上面保留多少像素距离
	if(typeof top =='number'){
		z.p.y = z.p.y-top;
	}
	z.s = jQuery.getScroll();
	z.clear = function() {
		clearInterval(z.timer);
		z.timer = null
	};
	z.t = (new Date).getTime();
	z.step = function() {
		var t = (new Date).getTime();
		var p = (t - z.t) / z.o.duration;
		if (t >= z.o.duration + z.t) {
			z.clear();
			setTimeout(function() {
				z.scroll(z.p.y, z.p.x);
			},
			13)
		} else {
			st = (( - Math.cos(p * Math.PI) / 2) + 0.5) * (z.p.y - z.s.t) + z.s.t;
			sl = (( - Math.cos(p * Math.PI) / 2) + 0.5) * (z.p.x - z.s.l) + z.s.l;
			z.scroll(st, sl);
		}
	};
	z.scroll = function(t, l) {
		window.scrollTo(l, t);
	};
	z.timer = setInterval(function() {
		z.step();
	},
	13)
};

(function($) {
	var f = document;
	var g = [],
	readyBound = false;
	var h = f.createElement('script'),
	fn,
	node;
	fn = h.readyState ?
	function(b, c) {
		b.onreadystatechange = function() {
			var a = b.readyState;
			if (a === 'loaded' || a === 'complete') {
				b.onreadystatechange = null;
				c.call(this)
			}
		}
	}: function(a, b) {
		a.onload = b
	};
	function dequeue(a, b, c) {
		if ((a == undefined) || (a && a.type)) {
			var d = g.shift();
			if (d) {
				function plugins() {
					d.callback();
					dequeue()
				}
				dequeue(d.url, plugins, d.charset)
			}
		} else {
			var e = f.getElementsByTagName('head')[0] || f.documentElement,
			node = f.createElement('script');
			node.src = a;
			if (c) node.charset = c;
			if ($.isFunction(b)) {
				fn(node, b)
			}
			e.appendChild(node)
		}
	}
	function enqueue(a, b, c) {
		g.push({
			'url': a,
			'callback': b,
			'charset': c
		});
		domReady()
	}
	function domReady() {
		if (document.readyState === "complete") {
			return dequeue()
		}
		if (document.addEventListener) {
			document.addEventListener("DOMContentLoaded", dequeue, false);
			window.addEventListener("load", dequeue, false)
		} else if (document.attachEvent) {
			document.attachEvent("onreadystatechange", dequeue);
			window.attachEvent("onload", dequeue);
			var a = false;
			try {
				a = window.frameElement == null
			} catch(e) {}
			if (document.documentElement.doScroll && a) {
				try {
					document.documentElement.doScroll("left")
				} catch(error) {
					setTimeout(arguments.callee, 10);
					return
				}
				dequeue()
			}
		}
	}
	$.loader = {
		getScript: function(a, b, c, d) {
			if (!c) {
				dequeue(a, b, d)
			} else {
				enqueue(a, b, d)
			}
		},
		_globalEval: function() {}
	}
})(jQuery);

//给文本框加水印
$.fn.watermark = function(txt)
{
	if(typeof this.attr('watermark') != 'undefined') {
		txt = this.attr('watermark');
	}	
    var getVal = function(el)
    {
        if (el.length == 0) return '';
        if (el[0].type.toLowerCase() == 'a' || el[0].type.toLowerCase() == 'span')
        {
            return el.html();
        } else
        {
            return el.val();
        }
    };

    this.attr('watermark', txt);
    if (getVal(this) == '')
    {
        this.val(txt);
        this.addClass('textGray');
    }
    this.focus(function()
    {
        var el = $(this);
        if (getVal(el) == el.attr('watermark'))
        {
            el.removeClass('textGray');
            el.val('');
        }
    });
    this.blur(function()
    {
        refreshStatus();
    });
    var self = this;
    var refreshStatus = function()
    {
        var el = self; //$(this);
        var val = getVal(el);
        var watermark = el.attr('watermark');
        if (val == '' || val == watermark)
        {
            el.val(watermark);
            el.addClass('textGray');
        } else
        {
            el.removeClass('textGray');
        }
    };
    refreshStatus();
};


//用于在form提交前清空水印
$.fn.clearWatermark = function()
{
    var inputs=$(this).find('input[watermark]');
    for(var i=inputs.length-1;i>=0;i--)
    {
    	
        var el = $(inputs[i]);
        if (el.val() == el.attr('watermark'))
        {
            el.val('');
        }    
    }
};


//给文本框加水印  方法2
$.fn.watermark2 = function(txt)
{
    var getVal = function(el)
    {
        if (el.length == 0) return '';
        if (el[0].type.toLowerCase() == 'a' || el[0].type.toLowerCase() == 'span')
        {
            return el.html();
        } else
        {
            return el.val();
        }
    };

    if(this.length>0){
    	$(this).each(function(i){
    		if(typeof $(this).attr('watermark') != 'undefined') {
    			txt = $(this).attr('watermark');
    		}
    		
    		$(this).attr('watermark', txt);
            var objId = $(this).attr('id');
            $(this).before('<label class="txtLabel" for="'+objId+'" style="display: none;">'+txt+'</label>');
            if (getVal($(this)) == '')
            {
            	$(this).siblings('label.txtLabel').css({'display':'block'});
            	$(this).removeClass('focus');
            }
            else{
            	$(this).siblings('label.txtLabel').css({'display':'none'});
            }
            $(this).focus(function()
            {
                var el = $(this);
                
                if (getVal(el) == '')
                {
                	el.siblings('label.txtLabel').css({'display':'none'});
                	el.addClass('focus');
                }
            });
            $(this).blur(function()
            {
                refreshStatus();
            });
            var self = $(this);
            var refreshStatus = function()
            {
                var el = self; //$(this);
                var val = getVal(el);
                if (val == '')
                {
                	el.siblings('label.txtLabel').css({'display':'block'});
                	el.removeClass('focus');
                } else
                {
                	el.removeClass('focus');
                }
            };
            refreshStatus();
    	});
    }
    else{
    	if(typeof this.attr('watermark') != 'undefined') {
			txt = this.attr('watermark');
		}
    	this.attr('watermark', txt);
        var objId = this.attr('id');
        this.before('<label class="txtLabel" for="'+objId+'" style="display: none;">'+txt+'</label>');
        if (getVal(this) == '')
        {
        	this.siblings('label.txtLabel').css({'display':'block'});
        	this.removeClass('focus');
        }
        else{
        	this.siblings('label.txtLabel').css({'display':'none'});
        }
        this.focus(function()
        {
            var el = $(this);
            
            if (getVal(el) == '')
            {
            	el.siblings('label.txtLabel').css({'display':'none'});
            	el.addClass('focus');
            }
        });
        this.blur(function()
        {
            refreshStatus();
        });
        var self = this;
        var refreshStatus = function()
        {
            var el = self; //$(this);
            var val = getVal(el);
            if (val == '')
            {
            	el.siblings('label.txtLabel').css({'display':'block'});
            	el.removeClass('focus');
            } else
            {
            	el.removeClass('focus');
            }
        };
        refreshStatus();
    }
};



/*
计算文本长度
*/

(function($)
{
    var Listener = function(el, opt)
    {
        //默认值
        var _default = {
            max: 4000,
            objTotal: $(el).closest('div').next().find('.content'),
            objLeft: $(el).closest('div').next().find('.prompt'),
            duration: 200,
            objTotalStyle: 'green',
            flag: false
        };
        //初始化参数
        var options = $.extend({}, _default, opt);
        var start = function()
        {
            //统计函数
            var _length, _oldLen, _lastRn;
            _oldLen = _length = 0;
            this.time = setInterval(function()
            {
                _length = el.val().length;
                if (el == null || typeof el == "undefined")
                {
                    this.time = null;
                    return;
                }
                if (!options.flag)
                {
                    if (_length == _oldLen)     //防止计时器做无用的计算
                    {
                        return;
                    }
                }
                if (_length > options.max)
                {
                    //避免ie最后两个字符为"\r\n",导致崩溃
                    _lastRN = (el.val().substr(options.max - 1, 2) == "\r\n");
                    el.val(el.val().substr(0, (_lastRN ? options.max - 1 : options.max)));
                }
                _oldLen = _length = el.val().length;
                //显示已输入字符
                if (options.objTotal != null)
                {
                    options.objTotal.html(_length).addClass(options.objTotalStyle);
                };
                //显示剩余的输入字符
                if (options.objLeft != null)
                {
                    options.objLeft.html((options.max - _length) < 0 ? 0 : (options.max - _length)).addClass(options.objTotalStyle);
                }
            }, options.duration);
        };

        var stop = function()
        {
            this.time = null;
        };
        if (options.objLeft != null)
        {
            try
            {
            	
                var defaultLength = options.max - $(el).val().length;
                options.objLeft.html(defaultLength).addClass(options.objTotalStyle);
            }
            catch (e) { }
        };
        el.bind('focus', start);
        el.bind('blur', stop);
    };

})(jQuery);


/**
 * 时间类
 */
var timeUtil = {
		/**
		 *  @description  计算时间的间隔月
		 *  @param  begin_date  开始时间
		 *  @param  end_date    结束时间  
		 *  @retrun int
		 */
		date_diff_month:function(begin_date,end_date){
			var sTime,eTime;
			if(typeof(begin_date)=='undefined') {
				sTime = new Date();
		    }
			else if(typeof(begin_date)=='string') {
				sTime = new Date(begin_date.replace(/\-/g, "/"));
			}else{
				sTime = begin_date;
			}
			if(typeof(end_date)=='undefined') {
				eTime = new Date();
		    }
			else if(typeof(end_date)=='string') {
				eTime = new Date(end_date.replace(/\-/g, "/"));
			}else{
				eTime = end_date;
			}
			var diffmonth = (eTime.getFullYear()*12+eTime.getMonth()+1)-(sTime.getFullYear()*12+sTime.getMonth()+1);
			return diffmonth;	
		}
};
String.prototype.toInt = function()
{
return parseInt(this);
}
//字符串的长度，区分全角与半角
String.prototype.caseLength = function()
{
var self = this;
var len = self.length;
var caseLen = 0;
for (var i = 0; i < len; i++)
{
if ((self.charCodeAt(i) & 0xff00) != 0)
{
    caseLen++;
}
caseLen++;
}
return caseLen;
}

// 截取字符串长度，一个全角字符算两个长度
String.prototype.caseSubStr = function(start, len)
{
var self = this;
var caseLen = 0;
var l = 0;
var tempLen = 0;
var iStart = 0;
var iLen = 0;
for (var i = 0; i < self.length; i++)
{
tempLen = 0;
if ((self.charCodeAt(i) & 0xff00) != 0)
{
caseLen++;
tempLen++;
}
caseLen++;
tempLen++;
if (caseLen >= start)
{
if (iStart == null) iStart = i;
l += tempLen;
if (l >= len)
{
iLen = i - iStart + 1;
break;
}
}
}
return this.substring(iStart, iLen);
}

//将字符串转换为float类型
String.prototype.toFloat = function()
{
	return parseFloat(this);
}

//将日期字符串转换为日期类型，格式： 2010-11-5 16:00:00 
String.prototype.toDate = function()
{
var datePart = this.split(" ")[0];
var temp = datePart.split("-");
date = new Date(temp[0], temp[1] - 1, temp[2]);
//date.setFullYear(temp[0]);
//date.setMonth(temp[1]);
//date.setDate(temp[2]);
date.setHours(0);
date.setMinutes(0);
date.setSeconds(0);
date.setMilliseconds(0);
return date;
}

//去掉字符串的前后空格
// 将单个的replace方法拆分为 两次调用，可使每个正则表达式变得简单，因此更快
String.prototype.trim = function()
{
return this.replace(/^\s+/,"").replace(/\s+$/,"");
/*
return this.replace(/(^\s*)|(\s*$)/g, "");
*/
}

// 应用于比较长的字符串清空空格

String.prototype.longTrim=function()
{
this.replace(/^\s+/,"");
for(var i=this.length-1;i>=0;i--)
{
if(/\s/.test(this.charAt(i)))
{
this.substring(0,i+1);
break;
}
}
return this;
}

// 字符串StringBuilder类
function StringBuilder()
{
    this._strings = new Array();        
}
StringBuilder.prototype.Append= function(value)
{
    this._strings.push(value);
    return this;
}
StringBuilder.prototype.Clear = function()
{
    this._strings.length=1;
}
StringBuilder.prototype.toString = function()
{
    return this._strings.join('');
}

//写Cookie
function writeCookie(name, value)
{
    var expire = new Date();
    expire.setFullYear(expire.getFullYear() + 20);
    expire = '; expires=' + expire.toGMTString();
    document.cookie = name + '=' + escape(value) + expire;
}

// 读取Cookie
function readCookie(name)
{
    var cookieValue = '';
    var search = name + '=';
    if (document.cookie.length > 0)
    {
        var offset = document.cookie.indexOf(search)
        if (offset != -1)
        {
            offset += search.length;
            var end = document.cookie.indexOf(';', offset);
            if (end == -1) end = document.cookie.length;
            cookieValue = unescape(document.cookie.substring(offset, end));
        }
    }
    return cookieValue;
}

/**
 *
 *  cookie 使用类
 */
var cookieutility = {
	set:function(name, value) { //设置cookie
		var expire = new Date();
		expire.setFullYear(expire.getFullYear() + 20);
		expire = '; expires=' + expire.toGMTString();
		document.cookie = name + '=' + escape(value) + expire;		
	},
	get:function(name) {  //读取cookie
		var cookieValue = '';
		var search = name + '=';
		if (document.cookie.length > 0)
		{
			var offset = document.cookie.indexOf(search)
			if (offset != -1)
			{
				offset += search.length;
				var end = document.cookie.indexOf(';', offset);
				if (end == -1) end = document.cookie.length;
				cookieValue = unescape(document.cookie.substring(offset, end));
			}
		}
		return cookieValue;		
	},
	del:function(name) {  //删除cookie
		var exp = new Date();
		exp.setTime(exp.getTime() - 1);
		var val=this.get(name);
		if(val!=null) document.cookie= name + "="+val+";expires="+exp.toGMTString();		
	}	
}


//ECMAScript 5 Function.prototype.bind函数兼容处理 

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
} 

//通过自身的选中状态选中其它复选框
$.fn.checkBox = function(chk,table)
{
    var checked = this.attr('checked');
    var inputCheckBoxs = !table ? $('input:not(:disabled)[type=checkbox][name="' + chk + '"]') : $(table).find('input:not(:disabled)[type=checkbox][name="' + chk + '"]');
    inputCheckBoxs.attr("checked",checked);
    //console.debug("完成时间"+new Date().getDate());
    /*
    $('input[type=checkbox][name="' + chk + '"]').each(function()
    {
        var el = $(this);
        if (el.attr('disabled') != true)
        {
            el.attr('checked', checked);
        }
    });
    */
}


//给当前复先框绑定选中事件
$.fn.bindCheckBox = function(chk,containerName,isNumStat)
{
    // 替换为checkBox click绑定匿名函数
    var con=$(containerName);
    $(this).click(function()
    {
        var _self=$(this);
        var checked = _self.attr('checked');
        var inputCheckBoxs=!containerName?$('input:not(:disabled)[type=checkbox][name="' + chk + '"]'):con.find('input:not(:disabled)[type=checkbox][name="' + chk + '"]');
        if(!checked) {
        	inputCheckBoxs.removeAttr('checked');
        }else {
        	inputCheckBoxs.attr("checked",checked);	
        }
        if(isNumStat){
        	var checked_num = !containerName?$('input:not(:disabled)[type=checkbox][name="' + chk + '"]:checked').lenght:con.find('input:not(:disabled)[type=checkbox][name="' + chk + '"]:checked').length;
        	$('#emNum').html('已选择'+checked_num+'个职位');
        }
    });
        var c = {
        checkbox: this,
        selector: chk,
        check: function()
        {
            var _self= c;
            var checked = 0, unchecked = 0;
            var checkBoxs=!containerName?$('input[type="checkbox"][name="' + _self.selector + '"]'):con.find('input[type="checkbox"][name="' + _self.selector + '"]');
            for(var i=checkBoxs.length-1;i>=0;i--)
            {
            var el=$(checkBoxs[i]);
            if (el.attr('checked'))
            {
                checked++;
            } else if (el.attr('disabled') != true)
            {
                unchecked++;
            }
            }
            var allCheck = checked > 0 && unchecked == 0;
            _self.checkbox.attr('checked', allCheck);
            if(isNumStat){
            	$('#emNum').html('已选择'+checked+'个职位');
            }
        }
    };
    this.data('checkBoxName', c);
    (!containerName?$('input[type="checkbox"][name="' + chk + '"]'):con.find('input[type="checkbox"][name="' + chk + '"]')).live('click', c.check);
};
/**
 * 隐藏元素，
 * 	点击文档区域时，如果不是所属的元素或不是指定元素的子元素，隐藏指定的元素
 *  <param>element</param> object，需隐藏的jquery dom对象
 *  <param>curID</param>   string  
 *  <param>parentID</param>string  
 */
$.extend({
	concealElement:function(element,curID,parentID) {
	   $('body').click(function(e){
			// 检测发生在body中的点击事件
		   	var cID = curID,
		   		pID = parentID,
			    cell = $(e.target);
			if (!cell)return;
			var tgID = $(cell).attr('id') == '' ? "string" : $(cell).attr('id');
			var isTagert = true;
			 // 如果事件触发元素不是Input元素 并且不是发生在时间控件区域
			 if(cID&&cID!=''&&cID!=null) {
				 isTagert = (isTagert&&tgID!=cID&&$(cell).closest('#' + cID).length <= 0);
			 }
			 if(pID&&pID!=''&&pID!=null) {
				 isTagert = isTagert && tgID!=pID && $(cell).closest('#' + pID).length <= 0;
			 }
			if (isTagert){
				element.hide();
			}
		});
	}
});

   $.fn.extend({
	  mouseOverHide: function(element,parendID) {
	    $(this).mouseover(function(){
	    	element.show();
	    }).mouseout(function(e){
	    	var target = $(e.relatedTarget);
	    	if(target.closest('#'+parendID).length<=0) {
	    		element.hide();
	    	}
	    });
	    $('#'+parendID).mouseout(function(e){
	    	var target = $(e.relatedTarget);
	    	if(target.closest('#'+parendID).length<=0) {
	    		element.hide();
	    	}	    	
	    	
	    });
	  }
	});



