$(document).ready(function()
{
	$.setAjaxForm('#myForm',function(response)
	{
		   if(response.result == 'fail') {

			   if($.type(response.message) == 'object')
               {
				   var str = new Array();
	               for (ms in response.message)
	               {
	                   str.push(response.message[ms]);
	               }
	               alert(str.join('\n'));
               }

			   if($.type(response.message) == 'string')
               {
				   alert(response.message);
               }

		   } else {
			   alert(response.message);
			   //location.reload();
			   location.href = response.locate;
		   }
	});
});

function submitme(formid) {
    $('#'+formid).submit();
}