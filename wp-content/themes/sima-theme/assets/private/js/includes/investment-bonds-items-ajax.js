$(document).on('submit', '#bonds-filter-form', function(e){
    e.preventDefault();

    // serialize() – jQuery function, which gets all fields from the form
    // and returns them into query string format, suitable for sending data through POST or GET.
    let formData = $(this).serialize();

    // Adding action + nonce like a query string
    formData += '&action=filter_investment_bonds&nonce=' + encodeURIComponent(investmentBondsAjax.nonce);

    $.ajax({
        url: investmentBondsAjax.ajaxurl,
        type: 'POST',
        data: formData,
        dataType: 'html',
        beforeSend: function(){
            $('#filtered-products-container').html('<p>Loading...</p>');
        },
        success: function(response){
            $('#filtered-products-container').html(response);
        },
        error: function(xhr, status, error){
            $('#filtered-products-container').html('<p>Error: ' + error + '</p>');
        }
    });
});