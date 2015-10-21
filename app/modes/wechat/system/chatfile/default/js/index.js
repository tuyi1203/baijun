$(document).ready(function()
{
	$('.listview li').each(function(){
		$(this).on('click',function(){
			if (!$(this).hasClass('selected')) {
				$('.listview li').removeClass('selected');
				$(this).addClass('selected');
				$('#certain').attr('disabled',false);
			} else {
				$('.listview li').removeClass('selected');
				$('#certain').attr('disabled',true);
			}
		});
	});

	$('#certain').on('click',function(){
		var result = {};
		result.fileid = $('.selected').find('a').attr('data-id');
		result.filetype = $(':hidden[name*="data[filetype]"]').val();
		if (result.filetype == 'image') {
			result.fileurl = $('.selected').find('img').attr('src');
		}
		$('.modal').modal('hide');
		certain(result);
	});

//    $.setAjaxForm('#fileForm', function(data)
//    {
//        if(data.result == 'success') $.reloadAjaxModal(1500);
//    });
//    $.setAjaxLoader('.edit', '#ajaxModal');
//    $('a.option').click(function(data)
//    {
//        $.getJSON($(this).attr('href'), function(data)
//        {
//            if(data.result == 'success')
//            {
//                $.reloadAjaxModal();
//            }
//            else
//            {
//                alert(data.message);
//            }
//        });
//        return false;
//    });
//
//    $(".modal-backdrop").click(function()
//    {
//        $('.modal').modal('hide');
//    });
//
//    $('#ajaxModal').on('hidden.bs.modal', function (e) {
//    	  // do something...
//    	$('#ajaxModal').html('');
//    })
});
