$(function()
{
	if($('.authorflg:checked').val() == '0') {
		$("#authorname").show();
		$("#selectAuthBtn").hide();
	} else {
		$("#authorname").hide();
		$("#selectAuthBtn").show();
	}
	$(':radio').parent().addClass("radio-inline");
	$('.authorflg').click(function(){
		if ($(this).val() == '0') {
			$("#authorname").show();
			$("#selectAuthBtn").hide();
		} else {
			$("#authorname").hide();
			$("#selectAuthBtn").show();
		}
	});
});

function selectLabel(id,name)
{
	$('#labelid').val(id);
	$('.label-btn').html(name);
	$('#ajaxModal').modal('toggle');
}

function lawyerselect(id,name) {
	//$('.lawyerlist').append('<button class="btn btn-primary" type="button" lawyerid="'+id+'">'+name+'<span class="badge">X</span></button>');
	//$('.lawyerlist').append('&nbsp;<a href="javascript:void(0);" onclick="deletelawyer(this);" data-id="'+id+'">'+name+' <span class="badge">X</span><input type="hidden" name="data[lawyer][]" value="'+id+'"/></a>&nbsp;');
	$('.nolawyer').remove();
	$('.zc_tags').append('<label onclick="deletelawyer(this);" data-id="'+id+'">'+name+' <span>×</span><input type="hidden" name="data[lawyer][]" value="'+id+'"/></label>');
	$('#ajaxModal').modal('toggle');
}

function lawyerselectonlyone(id,name) {
	$('#authorid').val(id);
	$('#selectAuthBtn').html(name);
	$('#ajaxModal').modal('toggle');
}

function deletelawyer(obj) {
	$(obj).remove();
	if ($('.zc_tags').find('label').length == 0 ) {
		$('.zc_tags').append('<label class="nolawyer">'+nolawyer+'</label>');
	}
}