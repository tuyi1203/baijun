function getList(obj)
{
	$.get($(obj).attr('data-href'),function(data){
//		alert(data);
		$('#ajaxModal').html(data);
	});
}