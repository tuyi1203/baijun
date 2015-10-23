$(document).ready(function()
{
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
                $('#content').val('');//成功时清除输入内容
            }
        } else {
        	submit.popover({trigger:'manual', content:response.message, placement:'right'}).popover('show');
        	submit.next('.popover').addClass('popover-danger');
            function distroy(){submit.popover('destroy')}
            setTimeout(distroy,2000);
            $('#responser').html(response.message).addClass('red f-12px').show().delay(5000).fadeOut(100);
        }
		submit.attr("disabled" , false);
		submit.val(submit.data('data'));
		submit.trigger('blur');//恢复按钮未激活状态
		$('.wordcount').html($('.wordcount').attr('data-length'));
	});
	$('.quickreply').click(function(){
		toggleReplyContent(this);
	});
});

function toggleReplyContent(obj)
{
	if($(obj).parent().parent().next().attr('id') == "replyform") {
		if ($("#replyform").is(":hidden")) {
			$("#replyform").show();
		}else {
			$("#replyform").hide();
		}
	} else {
		$("#replyform").remove();
		$(obj).parent().parent().after(replyform);
		$('#replyform').find('#submit').click(function(){
			$(this).data('data', $(this).val());
			$(this).attr('disabled', true);
			$(this).val($(this).attr('data-loading'));
			$('#replyform').find(':hidden[name*="openid"]').val(
				$('#replyform').prev().attr('data-openid')
			);
			$('#replyform').find(':hidden[name*="mid"]').val(
				$('#replyform').prev().attr('data-mid')
			);
			$('#replyform').submit();
		});
		$("#replyform").find(".goback").click(function(){
			$("#replyform").hide();
		});
		//计算字数
		$('#content').keyup(function(){
			var residue  = $('.wordcount').attr('data-length')-$(this).val().length;
			$('.wordcount').html(residue);
			if (residue < 0) {
				$('#submit').attr("disabled" , true);
				$('.wordcount').html('0');
			} else {
				$('#submit').attr("disabled" , false);
			}

		});
	}
}
