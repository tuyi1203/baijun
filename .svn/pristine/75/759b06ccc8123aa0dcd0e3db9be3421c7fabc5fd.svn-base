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
			   if(response.locate){
                   return setTimeout(function(){location.href = response.locate;}, 1200);
               } else {
            	   location.reload();
               }

		   }
	});
});