$(function()
{
	$(':radio').parent().addClass("radio-inline");
	$(':checkbox').parent().addClass("checkbox-inline");
	$('input[name*=role]').click(changeRole);
	changeRole();
});

function changeRole() {
	if ($('input[name*=role]:checked').val() == "5") {
		$('.doctor').show();
	} else {
		$('.doctor').hide();
	}
}