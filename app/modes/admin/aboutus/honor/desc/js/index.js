$(document).ready(function()
{
    $.setAjaxForm('#myForm', function(response)
    {
        if('success' == response.result) {
        	//window.location.reload();
        	$('.modal').modal('hide');
        }
    });
});