function deleteLabel(obj)
{
	if(confirm(v.lang.confirmDelete)) {
		$.get($(obj).attr('act') , {}, function(data){
			eval("var data= " + data);
			if (data.result == "success")
			$.reloadAjaxModal(1500);
		});
	}
}

$(document).ready(function(){

//	/**
//     * Reload ajax modal.
//     *
//     * @param int duration
//     * @access public
//     * @return void
//     */
//    reloadAjaxModal: function(duration)
//    {
//       if(typeof(duration) == 'undefined') duration = 1000;
//       setTimeout(function(){$('#ajaxModal').load($('#ajaxModal').attr('rel'), function(){$(this).find('.modal-dialog').css('width', $(this).data('width'))})}, duration);
//    }

	$.setAjaxForm('#saveForm' , function(response){
		if(response.result == 'success') {
//			submit = $("#submit");
//			submit.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
//        	submit.next('.popover').addClass('popover-success');
//            function distroy(){submit.popover('destroy')}
//            setTimeout(destroy,2000);
			$.reloadAjaxModal(1500);
		}
		//$('#submit').removeClass('disabled');
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

});