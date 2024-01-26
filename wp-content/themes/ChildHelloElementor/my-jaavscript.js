function searchProviders() {
    var input, filter;
    input = jQuery("#country-search");
    filter = input.val().toUpperCase();

    // Log the country value for debugging
    console.log('Country:', filter);

    if (filter.trim() !== "") {
        jQuery.ajax({
            url: script_data.ajaxurl,
            type: 'POST',
            data: {
                action: 'get_providers',
                country: filter,
            },
            beforeSend: function() {
                console.log('AJAX request sent.');
            },
            success: function (response) {
                console.log('AJAX request successful. Response:', response);
                jQuery("#provider-list").html(response);

                if (response.trim() !== "") {
                    jQuery("#provider-list").show();
                } else {
                    jQuery("#provider-list").hide();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX request failed. Status:', textStatus, 'Error:', errorThrown);
            }
        });
    } else {
        jQuery("#provider-list").hide();
    }
}

jQuery(document).ready(function () {
    jQuery("#provider-list").hide();

    jQuery("#country-search").on("input", function () {
        searchProviders();
    });
});
