$(function()
{
    $.setAjaxForm('#fileForm', function(data){
    	//$.reloadAjaxModal();
    	if (data.result == "success") {
    		$.reloadAjaxModal();
    	}
    	});
    $('.goback').click(function(){
    	//$.reloadAjaxModal();
    	$('.modal').modal('hide');
    })
})