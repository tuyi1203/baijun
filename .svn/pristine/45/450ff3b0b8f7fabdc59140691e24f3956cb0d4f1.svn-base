$(function()
{
	$(':radio').parent().addClass("radio-inline");
	$(':checkbox').parent().addClass("checkbox-inline");
//	$('input[name*=role]').click(changeRole);
	$(':radio[name*=role]').attr("disabled",true);
	$('#account').attr("disabled",true);
	changeRole();
});

function changeRole() {
	if ($('input[name*=role]:checked').val() == "5") {
		$('.doctor').show();
	} else {
		$('.doctor').hide();
	}
}