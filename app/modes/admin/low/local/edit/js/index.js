$(function()
{
    $.setAjaxForm('#fileForm', function(data){
    	//$.reloadAjaxModal();
    	if (data.result == "success") {
//    		$.reloadAjaxModal();
    		location.href = data.locate;
    	}
    });
    $('.goback').click(function(){
    	//$.reloadAjaxModal();
    	$('.modal').modal('hide');
    })
})