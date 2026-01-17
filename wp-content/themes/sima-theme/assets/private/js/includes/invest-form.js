$(document).ready(function() {
    // Open modal on click
    $(document).on('click', '.invest-now-btn', function(){
        let product = $(this).data('product');
        let modal = $('#invest-modal');

        if (modal.length || product.length) {
            // product.val(product);
            modal.addClass('open-invest-form');
        } else {
            console.error('Product input or modal not found!');
        }
    });

    // Close modal
    $('.close-modal').on('click', function() {
        $('#invest-modal').removeClass('open-invest-form');
    });

    // AJAX submit form
    $('#invest-now-form').on('submit', function(e) {
        // Creating FormData object from investment form
        let formData = new FormData(this);

        // Adding action and nonce
        formData.append('action', 'submit_invest_form');
        formData.append('invest_nonce', investformHandlerAjax.invest_nonce);

        e.preventDefault();

        $.ajax({
            url: investformHandlerAjax.ajaxurl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                let msg = $('#invest-response');
                if (msg.length) {
                    msg.show().text(response.data.message);
                }
                if (response.success) {
                    $('#invest-now-form')[0].reset();
                }
            },
            error: function(err) {
                console.error(err);
            }
        });
    });
});