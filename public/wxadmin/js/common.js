
var postflg = false ;
$(document).ready(function(){
	noF5();
});
function subSubmit(mode , conf) {
	var submitflg = false;
	if(!postflg) {
		if(conf != false ){
			if(confirm(conf)){
				submitflg = true;
			}
		} else {
			submitflg = true;
		}

	}
	if(typeof(beforeSubmit) != "undefined") {
		beforeSubmit();
	}
	if(submitflg) {
		$("#data_event").val(mode);
		document.forms[0].submit();
		postflg = true;
	}
}

function dlSubmit(mode) {
	$("#data_event").val(mode);
	document.forms[0].submit();
}

function subReset(url) {
	location.href = url;
}

//防止F5重载入
//不对应以下浏览器
/*
Sleipnir 2.9.4
Safari(windows版) 5.0.2
Opera 10.62
*/
function noF5() {
	//TODO debug
	return;
	window.document.onkeydown = function (e)
	{
	  if (e != undefined)
	  {
	    if (e.keyCode == 116)
	    {
	      e.stopPropagation();
	      e.preventDefault();
	      e.keyCode = null;
	      return false;
	    }
	  }
	  else
	  {
	    if (event.keyCode == 116)
	    {
	      event.keyCode = null;
	      return false;
	    }
	  }
	}
}

function disableMe(domObj){
	$(domObj).hide();
}

//editor相关
var editor;
var options = {
        cssPath : '/css/index.css',
        width : '600px' ,
        height : '300px' ,
        items:[
               'undo', 'redo', '|', 'preview', 'cut', 'copy', 'paste',
              'plainpaste',  '|', 'justifyleft', 'justifycenter', 'justifyright',
              'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
              'superscript', 'quickformat', 'selectall', '|', 'fullscreen', '/',
              'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
              'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
              'table', 'hr', 'link', 'unlink'
              ],
        uploadJson : 'editor_upload-index-default.json',
        filterMode : true ,
        afterBlur : function(){
            //编辑器失去焦点时直接同步，可以取到值
            this.sync();
        }
};


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


$(document).ready(function(){
	/*
	 * 初始化按钮的loading功能，点击后将显示Loading字样，并且按钮被disabled掉，无法连续点击，防止二次提交
	 * 超过5秒后按钮将恢复原状
	 */
	/*
	$('button[data-loading-text]').click(function () {
	    var btn = $(this).button('loading');
	    setTimeout(function () {
	        btn.button('reset');
	    }, 5000);
	});
	*/

	if(window.onReady) {
		onReady();
	}

});

function toggleButton(btnObj) {

	if (btnObj.attr("disabled")) {
		btnObj.attr("disabled",false);
		btnObj.html(btnObj.attr("data-loaded-text"));
	} else {
		btnObj.attr("disabled",true);
		btnObj.html(btnObj.attr("data-loading-text"));
	}

}

//sleep 插件
$(function(){

	var _sleeptimer;
	$.sleep = function( time2sleep, callback )
	{
		$.sleep._sleeptimer = time2sleep;
		$.sleep._cback = callback;
		$.sleep.timer = setInterval('$.sleep.count()', 1000);
	}
	$.extend ($.sleep, {
		current_i : 1,
		_sleeptimer : 0,
		_cback : null,
		timer : null,
		count : function()
		{
			if ( $.sleep.current_i >= $.sleep._sleeptimer )
			{
				clearInterval($.sleep.timer);
				$.sleep._cback.call(this);
				$.sleep.current_i = 1;//2014.4.23再次使用时，sleep时间缩短现象对应
			} else {
				$.sleep.current_i++;
			}

		}
	});
})

//(jQuery);

