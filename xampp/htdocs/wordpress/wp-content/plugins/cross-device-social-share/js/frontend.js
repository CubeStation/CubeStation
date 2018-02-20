//Credits: This file was derived from https://wordpress.org/plugins/accesspress-social-share by Access Keys
//function from https://halgatewood.com/how-to-customize-the-pin-it-button-for-pinterest
function pinIt()
{
    var e = document.createElement('script');
    e.setAttribute('type', 'text/javascript');
    e.setAttribute('charset', 'UTF-8');
    e.setAttribute('src', 'https://assets.pinterest.com/js/pinmarklet.js?r=' + Math.random() * 99999999);
    document.body.appendChild(e);
}

jQuery(document).ready(function ($) {

    var shortcode_profile_array = [];
    $('.apss-count').each(function () {
        var social_detail = $(this).attr('data-social-detail');
        if ($.inArray(social_detail, shortcode_profile_array) == -1) {
            shortcode_profile_array.push(social_detail);
        }
    });

    // ajax call for social counter
    if (shortcode_profile_array.length > 0)
    {
        // $.ajax({
        //     type: 'post',
        //     url: frontend_ajax_object.ajax_url + '/?action=frontend_counter&_wpnonce=' + frontend_ajax_object.ajax_nonce,
        //     data: {shortcode_data: shortcode_profile_array},
        //     success: function (res) {
        //         res = $.parseJSON(res);
        //         for (var i=0;i<=shortcode_profile_array.length;i++) {
        //             var social_detail = shortcode_profile_array[i];
        //             var count = (res[i])?res[i]:0;
        //             $('.apss-count[data-social-detail="' + social_detail + '"]').html(count);
        //         }
        //     }
        // });
    }

    /*----  Added by inout starts here -----*/
    if(typeof(qiiktitle) === "undefined"){
        qiiktitle = "";
    }
    if(typeof(twitter_user) === "undefined"){
        twitter_user = "qiikchat-share";
    }
    
    makeSharerPageFor('.qiik-facebook-sharer','https://www.facebook.com/sharer/sharer.php?u=',300);
    makeSharerPageFor('.qiik-twitter-sharer','https://twitter.com/intent/tweet?text='+ qiiktitle+'&amp;'+twitter_user+'&amp;url=',300);
    makeSharerPageFor('.qiik-gplus-sharer','https://plus.google.com/share?url=',300);
    makeSharerPageFor('.qiik-chat-sharer','https://qiikchat.com/sendtodevice/?linkurl=',268);
    
    function makeSharerPageFor(JQselector,SharerLink,Height){
        jQuery(JQselector).click(function (event) {
            event.preventDefault();
            currentqiikpage = encodeURI(window.location.href);
            qiikchatpopup(SharerLink + currentqiikpage, 'QiikChat Share', 640, Height);
        })
    }
    
    function qiikchatpopup(url, title, w, h) {
        var left = (screen.width / 2) - (w / 2);
        var top = (screen.height / 2) - (h / 2);
        return window.open(url, title, 'height=141, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left)
    }
});