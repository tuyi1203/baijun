$(document).ready(function()
{
    $.setAjaxForm('#sortForm');
    $.setAjaxForm('#changeForm',change);

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
    	$('#changeForm').attr('action','{:U('module/script/default/change/act/mode/mode/','',false)}' + $('#mode').val() + '.json').submit();
	});

    $('.selectModule').change(function()
	{
    	$('#changeForm').attr('action','{:U('module/script/default/change/act/first/mode/','',false)}' + $('#mode').val() + '/pid/' + $('#pid').val() + '.json').submit();
	});

    $('.selectSecond').change(function()
	{
    	var url  = '{:U('module/script/default/list/mode/','',false)}' + $('#mode').val() + '/pid/' + $('#pid').val() + '/sid/' + $('#sid').val() + '.html';
    	location.href = url;
	});

});

function sort()
{
    $('input[name*=sort]').each(function(index, obj) { $(this).val(index + 1); });
}

function change(data)
{
	var ophtml = new Array();
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