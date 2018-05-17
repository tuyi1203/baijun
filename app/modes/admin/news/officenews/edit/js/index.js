$(function()
{
	$(':radio').parent().addClass("radio-inline");
});

function lawyerselect(id,name) {
	//$('.lawyerlist').append('<button class="btn btn-primary" type="button" lawyerid="'+id+'">'+name+'<span class="badge">X</span></button>');
	//$('.lawyerlist').append('&nbsp;<a href="javascript:void(0);" onclick="deletelawyer(this);" data-id="'+id+'">'+name+' <span class="badge">X</span><input type="hidden" name="data[lawyer][]" value="'+id+'"/></a>&nbsp;');
	$('.nolawyer').remove();
	$('.zc_tags').append('<label onclick="deletelawyer(this);" data-id="'+id+'">'+name+' <span>×</span><input type="hidden" name="data[lawyer][]" value="'+id+'"/></label>');
	$('#ajaxModal').modal('toggle');
}

function deletelawyer(obj) {
	$(obj).remove();
	if ($('.zc_tags').find('label').length == 0 ) {
		$('.zc_tags').append('<label class="nolawyer">'+nolawyer+'</label>');
	}
}