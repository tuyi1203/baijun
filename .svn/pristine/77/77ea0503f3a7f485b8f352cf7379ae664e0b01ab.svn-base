$(function()
{
	$(':radio').parent().addClass("radio-inline");
	$(':radio').on('change' , changeReplyType);
	$('#pid').on('change' , function(){
		if($(this).val()) {
			$("input[name*='replytype'][value='-1']").parent().hide();
			if ($("input[name*='replytype']:checked").val() == '-1') {
				$("input[name*='replytype'][value='-1']").attr('checked',false);
				$("input[name*='replytype'][value='1']").attr('checked',true);
				$("input[name*='replytype'][value='1']").trigger('click');;
			}
		} else {
			$("input[name*='replytype'][value='-1']").parent().show();
		}
	});
});


function changeReplyType()
{
	var val = $("input[name*='replytype']:checked").val();
	$(':radio').each(function(){
		if($(this).val() == val) {
			$('#'+$(this).val()).show();
		} else {
			$('#'+$(this).val()).hide();
		}
	});
}
