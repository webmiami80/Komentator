// public/scripts/koment-webmiami80-gpt-connect-public.js

(function ($) {
    $(document).ready(function () {
        // Dodaj tutaj niestandardowe skrypty JavaScript dla strony publicznej

        // Przykładowy kod: pobierz dane z serwera przy użyciu AJAX
        $.ajax({
            url: koment_webmiami80_gpt_connect_public_ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'koment_webmiami80_gpt_connect_public_ajax_request',
                parameter: 'example_parameter',
            },
            success: function (response) {
                console.log('Dane z serwera: ' + response);
            },
            error: function (error) {
                console.log('Błąd AJAX: ' + error.responseText);
            },
        });
    });
})(jQuery);
