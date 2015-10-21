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
    	$('#changeForm').attr('action','{:U('module/second/default/change/mode/','',false)}' + $('#mode').val() + '.json').submit();
	});

    $('.selectModule').change(function()
	{
    	var url  = '{:U('module/second/default/list/mode/','',false)}' + $('#mode').val() + '/pid/' + $('#pid').val() + '.html';
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
	$.each(data.options.pid , function(key,value)
	{
		ophtml.push('<option value="'+ key +'">' + value + '</option>');
	});
	$('#pid').html(ophtml.sort().join(''));
}