$(document).ready(function(){
	$('#name').focus();
	$.setAjaxForm('#remarkForm' , function(response){
		if(response.result == 'success') {
			submit = $("#submit");
			submit.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
        	submit.next('.popover').addClass('popover-success');
            function distroy(){submit.popover('destroy');$('#ajaxModal').modal('toggle');}
            setTimeout(distroy,2000);
            closemodal({
				 e:'editremarkname'
				,'remarkname':$('#name').val()
			});
		} else {
			submit = $("#submit");
			submit.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
        	submit.next('.popover').addClass('popover-success');
            function distroy(){submit.popover('destroy')}
            setTimeout(distroy,2000);
		}
	});
});