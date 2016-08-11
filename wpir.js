(function($){
    $(function(){
        $('.wpir').click(function(){
            $.ajax({
                type : "post",
                dataType : "json",
                url : wpir.ajaxurl,
                data : 'action=hello_wpir' + '&security=' + wpir.ajax_nonce,
                success: function(response) {
                    // You can put any code here to run if the response is successful.

                    // This will allow you to see the response
                    console.log(response);
                }
            });

        });
    });
})(jQuery);
