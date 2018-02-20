//Author: AccessPress Themes
//Author URI: http://accesspressthemes.com
function removeMe(args) {
    jQuery('.' + args).html('');
}

(function ($) {
    $(function () {
        //all backend js goes here
        //sortable initialization
        $('.apps-opt-wrap').sortable({
            containment: "parent",
            update: function (event, ui) {
                var profile_array = [];
                $('.apss-option-wrapper input[type="checkbox"]').each(function () {
                    profile_array.push($(this).attr('data-key'));
                });
                var social_networks_orders = profile_array.join(',');
                $('#apss_social_newtwork_order').val(social_networks_orders);
            }
        });

        $('.apss-tabs-trigger').click(function () {
            $('.apss-tabs-trigger').removeClass('apss-active-tab');
            $(this).addClass('apss-active-tab');
            var board_id = 'tab-' + $(this).attr('id');
            $('.apss-tab-contents').hide();
            $('#' + board_id).show();
        });

        $('#apss_submit_settings').click(function () {
            
        });

        $('#counter_enable_options_y').click(function () {
            $('.apss-counter-api-options').show();
        });
        $('#counter_enable_options_n').click(function () {
            $('.apss-counter-api-options').hide();
        });

    });//document.ready close

}(jQuery));