$(document).ready(function(){
	var mojiid = 'moji';
	$('li[tab-type="'+ mojiid +'"]').on('click',function(){
		$('li[role="presentation"]').removeClass('active');
    	$('li[role="presentation"][tab-type="'+ mojiid +'"]').addClass('active');
    	$('.ke-container').hide();
    	$('#' + mojiid).prev().show();
	});

	$.setAjaxForm('#replyForm' , function(response){
		submit = $("#submit");
		if(response.result == 'success')
        {
            if(response.message && response.message.length)
            {
            	submit.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
            	submit.next('.popover').addClass('popover-success');
                function distroy(){submit.popover('destroy')}
                setTimeout(distroy,2000);
                location.reload();
            }
        } else {
        	submit.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
        	submit.next('.popover').addClass('popover-danger');
            function distroy(){submit.popover('destroy')}
            setTimeout(distroy,2000);
            $('#responser').html(response.message).addClass('red f-12px').show().delay(5000).fadeOut(100);
        }
	});
});