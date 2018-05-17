$(function()
{
	$(':radio').parent().addClass("radio-inline");
//	$('#watermark').change(function(){
//		toggle('watermark');
//	});
	toggleContent();
	$("[name='data[homepagenotice]']").bootstrapSwitch({
		onSwitchChange: function(event, state) {
			if (state) {
				$("[name='data[homepagenotice]']").attr('checked',true);
			} else {
				$("[name='data[homepagenotice]']").attr('checked',false);
			}
			toggleContent();
	      }
	});
});

function toggleContent() {
	if ($("[name='data[homepagenotice]']").attr('checked')) {
		$('.contenttr').show();
	} else {
		$('.contenttr').hide();
	}
}