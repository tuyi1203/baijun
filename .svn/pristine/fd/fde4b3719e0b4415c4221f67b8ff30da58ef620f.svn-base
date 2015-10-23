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
    	$('#mixForm').attr('action','{:U('module/second/add/change/mode/','',false)}' + $('#mode').val() + '.json').submit();
    	resetAction();
	});

});

function response(data)
{
	if (data.action == "change") {
		var ophtml = new Array();
		$.each(data.options.pid , function(key,value)
		{
			ophtml.push('<option value="'+ key +'">' + value + '</option>');
		});
		$('#parentid').html(ophtml.sort().join(''));
	}

	if (data.action == "insert") {
		 if(data.locate)
         {
             return setTimeout(function(){location.href = data.locate;}, 1200);
         }
	}

}

function resetAction() {
	$('#mixForm').attr('action','{:U('module/second/add/insert.json')}');
}