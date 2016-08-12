(function($){
    $(function(){
        $('.wpir').click(function(){
	        var id = $(this).attr('id');
            $.ajax({
                type : "post",
                dataType : "json",
                url : wpir.ajaxurl,
                data : 'action=hello_wpir&id=' + id + '&security=' + wpir.ajax_nonce,
                success: function(response) {
                    // You can put any code here to run if the response is successful.
                }
            });

        });
    });
})(jQuery);
