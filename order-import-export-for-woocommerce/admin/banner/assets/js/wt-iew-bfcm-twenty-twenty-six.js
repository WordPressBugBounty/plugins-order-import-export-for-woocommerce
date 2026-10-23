(function ($) {
    'use strict';

    $(function () {
        const wt_iew_bfcm_twenty_twenty_six_banner = {
            init: function () { 
                const data_obj = {
                    _wpnonce: wt_iew_bfcm_twenty_twenty_six_banner_js_params.nonce,
                    action: wt_iew_bfcm_twenty_twenty_six_banner_js_params.action,
                    wt_iew_bfcm_twenty_twenty_six_banner_action_type: '',
                };

                $(document).on('click', '.wt-iew-bfcm-banner-2026 .bfcm_cta_button', function (e) { 
                    e.preventDefault(); 
                    const elm = $(this);
                    window.open(wt_iew_bfcm_twenty_twenty_six_banner_js_params.cta_link, '_blank'); 
                    elm.parents('.wt-iew-bfcm-banner-2026').hide();
                    data_obj['wt_iew_bfcm_twenty_twenty_six_banner_action_type'] = 3; /** Clicked the button. */
                    
                    $.ajax({
                        url: wt_iew_bfcm_twenty_twenty_six_banner_js_params.ajax_url,
                        data: data_obj,
                        type: 'POST'
                    });
                }).on('click', '.wt-iew-bfcm-banner-2026 .notice-dismiss', function(e) {
                    e.preventDefault();
                    data_obj['wt_iew_bfcm_twenty_twenty_six_banner_action_type'] = 2; /** Closed by user. */
                    
                    $.ajax({
                        url: wt_iew_bfcm_twenty_twenty_six_banner_js_params.ajax_url,
                        data: data_obj,
                        type: 'POST',
                    });
                });
            }
        };
        wt_iew_bfcm_twenty_twenty_six_banner.init();
    });

})(jQuery);