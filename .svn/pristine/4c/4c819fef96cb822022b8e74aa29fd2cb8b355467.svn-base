$(document).ready(function()
{
	$.setAjaxPublisher('.publisher');
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