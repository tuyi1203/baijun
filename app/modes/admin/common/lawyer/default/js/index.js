$(document).ready(function(){
	$.setAjaxForm('#addForm' , function(response){
		if(response.result == 'success') {
			submit = $("#submit");
			submit.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
        	submit.next('.popover').addClass('popover-success');
            function distroy(){submit.popover('destroy')}
            setTimeout(destroy,2000);
			$.reloadAjaxModal(1500);
		}
	});
	$('.edit').each(function(){
		$(this).on('click',function(){
			$('.groupname').show();
			$('.editor').hide();
			var td = $(this).parent().prev().prev();
			td.find('.groupname').hide();
//			td.find('.editor').show();
			td.find('.editor').show().find('input').val(td.find('.groupname').text()).get(0).select();
		});
	});
	$('.cancel').each(function(){
		$(this).on('click',function(){
			refresh(this);
		});
	});
	$('.update').each(function(){
	       $(this).on('click',function(){
	       	if ($(this).parent().find('input').val() == $(this).parent().parent().find('.groupname').text()) {
	       		refresh(this);
	       	} else {//当内容有修改时
	       		var _self = this;
	       		$.post($(this).attr("data-href"),
	   	                {'data[title]':$(this).parent().find('input').val()
	   	                 ,'data[id]':$(this).attr('data-id')}
	   	                , function(data, textStatus){
	   	                	if (data.result == "fail") {
	   	                		alert(data.message);
	   	                	}
	   	                	if (data.result == 'success') {
	   	                		$(_self).parent().parent().find('.groupname').text($(_self).parent().find('input').val());
	   	                		refresh(_self);
	   	                	}
    	                } , 'json');
        	}
        });
     });
	 $('.select').on('click',function(){
		 closemodal({
					 e:'selectgroup'
					,groupname:$(this).parent().parent().find('.groupname').text()
					,groupid:$(this).attr('data-id')
				});
		 $('#ajaxModal').modal('toggle');
	 });

	 function refresh(obj) {
		 $(obj).parent().find('input').val('');
		 $(obj).parent().hide();
		 $(obj).parent().prev().show();
	 }
});