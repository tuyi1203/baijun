//微信可视编辑
;(function($){

$.extend({
	wxedite : function (options)
	{
		var e = this;
		var defaults = {
			event : 'click',//事件
			obj : 'div.lst',
			form : '#ui-form',//右侧表单对象
			add : '#ui-add',//添加数据对象
			list : '#ui-lst',//数据列表
			del : 'a.delLnk'//删除操作
		};
		var opt = $.extend({},defaults,options);//合并
        var self = $(e).find(opt.obj),
			_h = $(e).find(opt.obj+':eq(2)'),
			_list = $(opt.obj),
			_last = _list.last();
		var formTop = $(opt.form).css('margin-top');//获取表单元素顶部margin值
		var formTopNum = formTop.replace('px', '');//分割顶部margin值
		var formTopValue = parseFloat(formTop);//将表单元素顶部margin值转换为数字类型
		var fstHt = ($(e).find(opt.obj+':first-child').outerHeight())+1;//获取第一个对象高度
		var secHt = ($(e).find(opt.obj+':eq(1)').outerHeight())+1;
		//追加数据
		this.add = function(){
			$(opt.add).bind('click',function(){
				if($(opt.obj).length<=6){
					var h =$(_h).clone(true).insertBefore(_last).show();
				}else{
					alert('不能再“插”了');
				}
			});
		}();

		//标记删除元素
		markdel = function(obj) {
			$(obj).attr('data-delmark','1');
		}

		$(opt.del).each(function(){
			$(this).on('click',function(){
				markdel(this);
			});
		});
		//切换对应表单
		self.bind(opt.event,function(){
			_self = $(this);
			var index = _self.index();
			switch(index)
			{
			case 0:
				$(opt.form).css('margin-top',formTopValue+'px');
				break;
			case 1:
				$(opt.form).css('margin-top',formTopValue+fstHt+'px');
				break;
			default:
				$(opt.form).css('margin-top',formTopValue+fstHt+(secHt*(index-1))+'px');
				break;
			}
		});
    },
    wxedit_delete: function(){
    	$('[data-delmark="1"]').parent().parent().prev().trigger('click').next().remove();
//    	$('[data-delmark="1"]').parent().parent().remove();
    }});

})(jQuery);
