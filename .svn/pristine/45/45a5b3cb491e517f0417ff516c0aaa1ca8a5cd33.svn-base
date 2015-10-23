$(document).ready(function()
{
    $.setAjaxForm('#mixForm',response);

    $('.icon-arrow-up').click(function()
    {
        $(this).parents('tr').prev().before($(this).parents('tr'));
        sort();
    });

    $('.icon-arrow-down').click(function()
    {
        $(this).parents('tr').next().after($(this).parents('tr'));
        sort();
    });

    $('.selectMode').change(function()
	{
    	$('#mixForm').attr('action','{:U('module/script/add/change/act/mode.json')}').submit();
    	resetAction();
	});

    $('.selectModule').change(function()
	{
    	$('#mixForm').attr('action','{:U('module/script/add/change/act/first.json')}').submit();
    	resetAction();
	});

});

function response(data)
{
	if (data.action == "change") {
		if (typeof(data.options.pid) != 'undefined') {
			var ophtml = new Array();
			$.each(data.options.pid , function(index , option)
			{
				ophtml.push('<option value="'+ option.key +'">' + option.value + '</option>');
			});
			$('#pid').html(ophtml.join(''));
		}

		if (typeof(data.options.sid) != 'undefined') {
			var ophtml = new Array();
			$.each(data.options.sid , function(index,option)
			{
				ophtml.push('<option value="'+ option.key +'">' + option.value + '</option>');
			});
			$('#sid').html(ophtml.join(''));
		}
	}

	if (data.action == "insert") {
		 if(data.locate)
         {
             return setTimeout(function(){location.href = data.locate;}, 1200);
         }
	}

}

function resetAction() {
	$('#mixForm').attr('action','{:U('module/script/add/insert.json')}');
}