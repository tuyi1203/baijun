$(document).ready(function()
{
    $.setAjaxForm('#sortForm');

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
    	var pos  = location.href.lastIndexOf('.');
    	var url = location.href.substring(0, pos) + '/mode/' + $('#mode').val() + '.html';
    	location.href = url;
	});

});

function sort()
{
    $('input[name*=sort]').each(function(index, obj) { $(this).val(index + 1); });
}