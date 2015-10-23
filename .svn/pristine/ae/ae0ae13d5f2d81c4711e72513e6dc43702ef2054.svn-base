$(document).ready(function()
{
	$.setAjaxPublisher('.publisher');
	$('a[data-toggle="modal"]').on('click',function(){
		openmodal(this);
	});
	$('a[data-toggle="popover"]').popover({placement:'right',html:true});
	$('a[data-toggle="popover"]').on('mouseover',function(){
		$(this).popover('toggle');
	});
	$('a[data-toggle="popover"]').on('mouseout',function(){
		$(this).popover('toggle');
	});
	//取消点击事件
	$('a[data-toggle="popover"]').unbind('click');
});

$.extend(
{
	 /**
     * Set ajax publisher.
     *
     * @param  string $selector
     * @access public
     * @return void
     */
    setAjaxPublisher: function (selector)
    {
        $(document).on('click', selector, function()
        {
            if(confirm(v.lang.confirmPublic))
            {
                var publisher = $(this);
                publisher.text(v.lang.publishing);

                $.getJSON(publisher.attr('href'), function(data)
                {
                    if(data.result == 'success')
                    {
                        if(publisher.parents('#ajaxModal').size()) return $.reloadAjaxModal(1200);
                        if(data.locate) return location.href = data.locate;
                        return location.reload();
                    }
                    else
                    {
                        alert(data.message);
                    }
                });
            }
            return false;
        });
    }
}
);