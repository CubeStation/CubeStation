<?php
//Credits: This file was derived from https://wordpress.org/plugins/accesspress-social-share by Access Keys
defined('ABSPATH') or die("No script kiddies please!");
?>
<?php
global $post;
$options = get_option(APSS_SETTING_NAME);
$apss_link_open_option = "_blank";
$twitter_user = $options['twitter_username'];
$icon_set_value = $options['social_icon_set'];
$twitter_api_use = '1';
$url = get_permalink();
$cache_period = ($options['cache_period'] != '') ? $options['cache_period'] * 60 * 60 : 24 * 60 * 60;
if (isset($attr['networks'])) {
    $raw_array = explode(',', $attr['networks']);
    $network_array = array_map('trim', $raw_array);
    $new_array = array();
    foreach ($network_array as $network) {
        $new_array[$network] = '1';
    }
    $options['social_networks'] = $new_array;
}
$total_counter_enable_options = 0;


if (isset($attr['counter'])) {
    if ($attr['counter'] == '1') {
        $counter_enable_options = 1;
    }
} else {
    $counter_enable_options = 0;
}
?>

<div class='apss-social-share apss-theme-<?php echo $icon_set_value; ?> clearfix'>
    <?php
    $title = str_replace('+', '%20', urlencode($post->post_title));
    $content = strip_shortcodes(strip_tags(get_the_content()));
    if (strlen($content) >= 100) {
        $excerpt = substr($content, 0, 100) . '...';
    } else {
        $excerpt = $content;
    }
    ?>

    <?php if (isset($attr['share_text']) && $attr['share_text'] != '') { ?> <div class='apss-share-text'><?php echo $attr['share_text']; ?></div> <?php } ?>
    <?php
    $total_count = 0;
    foreach ($options['social_networks'] as $key => $value) {
        if (intval($value) == '1') {
            $count = $this->get_count($key, $url);
            $total_count += $count;
            switch ($key) {
                //counter available for facebook
                case 'facebook':
                    $link = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
                    $count = $this->get_count($key, $url);
                    ?>
                    <div class='apss-facebook apss-single-icon'>
                        <a class='qiik-facebook-sharer' 
                           rel='nofollow' 
                           title='<?php _e('Share on Facebook', 'cross-device-social-share'); ?>' target='<?php echo $apss_link_open_option; ?>' href='<?php echo $link; ?>'>
                            <div class='apss-icon-block clearfix'>
                                <i class='fa fa-facebook'></i>
                                <span class='apss-social-text'><?php _e('Share on Facebook', 'cross-device-social-share'); ?></span>
                                <span class='apss-share'><?php _e('Share', 'cross-device-social-share'); ?></span>
                            </div>
                            <?php if (isset($counter_enable_options) && $counter_enable_options == '1') { ?>
                                <div class='count apss-count' data-url='<?php echo $url; ?>' data-social-network='<?php echo $key; ?>' data-social-detail="<?php echo $url . '_' . $key; ?>"><?php echo $count; ?></div>
                            <?php } ?>
                        </a>
                    </div>
                    <?php
                    break;

                //counter available for twitter
                case 'twitter':
                    $url_twitter = $url;
                    $url_twitter = urlencode($url_twitter);
                    if (isset($twitter_user) && $twitter_user != '') {
                        $twitter_user = 'via=' . $twitter_user;
                    }
                    $link = "https://twitter.com/intent/tweet?text=$title&amp;url=$url_twitter&amp;$twitter_user";
                    $count = $this->get_count($key, $url);
                    ?>
                    <div class='apss-twitter apss-single-icon'>
                        <a class='qiik-twitter-sharer' 
                           rel='nofollow' 
                           title='<?php _e('Share on Twitter', 'cross-device-social-share'); ?>' 
                           target='<?php echo $apss_link_open_option; ?>' href="<?php echo $link; ?>">
                            <div class='apss-icon-block clearfix'>
                                <i class='fa fa-twitter'></i>
                                <span class='apss-social-text'><?php _e('Share on Twitter', 'cross-device-social-share'); ?></span><span class='apss-share'><?php _e('Tweet', 'cross-device-social-share'); ?></span>
                            </div>
                            <?php if (isset($counter_enable_options) && $counter_enable_options == '1' && $twitter_api_use != '1') { ?>
                                <div class='count apss-count' data-url='<?php echo $url; ?>' data-social-network='<?php echo $key; ?>' data-social-detail="<?php echo $url . '_' . $key; ?>"><?php echo $count; ?></div>
                            <?php } ?>
                        </a>
                    </div>
                    <script>
                        url_twitter = '<?php echo $url_twitter; ?>';
                        qiiktitle = '<?php echo $title; ?>';
                        twitter_user = '<?php echo $twitter_user; ?>';
                    </script>                    
                    <?php
                    break;

                //counter available for google plus
                case 'google-plus':
                    $link = 'https://plus.google.com/share?url=' . $url;
                    $count = $this->get_count($key, $url);
                    ?>
                    <div class='apss-google-plus apss-single-icon'>
                        <a class='qiik-gplus-sharer' 
                           rel='nofollow' 
                           title='<?php _e('Share on Google Plus', 'cross-device-social-share'); ?>' 
                           target='<?php echo $apss_link_open_option; ?>' href='<?php echo $link; ?>'>
                            <div class='apss-icon-block clearfix'>
                                <i class='fa fa-google'></i>
                                <span class='apss-social-text'><?php _e('Share on Google Plus', 'cross-device-social-share'); ?> </span>
                                <span class='apss-share'><?php _e('Plus', 'cross-device-social-share'); ?></span>
                            </div>
                            <?php if (isset($counter_enable_options) && $counter_enable_options == '1') { ?>
                                <div class='count apss-count' data-url='<?php echo $url; ?>' data-social-network='<?php echo $key; ?>' data-social-detail="<?php echo $url . '_' . $key; ?>"><?php echo $count; ?></div>
                            <?php } ?>
                        </a>
                    </div>
                    <?php
                    break;

                //counter available for pinterest
                case 'pinterest':
                    $count = $this->get_count($key, $url);
                    ?>
                    <div class='apss-pinterest apss-single-icon'>
                        <a class='qiik-pinterest-sharer' 
                           rel='nofollow' 
                           title='<?php _e('Share on Pinterest', 'cross-device-social-share'); ?>' 
                           href='javascript:pinIt();'>
                            <div class='apss-icon-block clearfix'>
                                <i class='fa fa-pinterest-p'></i>
                                <span class='apss-social-text'><?php _e('Share on Pinterest', 'cross-device-social-share'); ?></span>
                                <span class='apss-share'><?php _e('Pin it', 'cross-device-social-share'); ?></span>
                            </div>
                            <?php if (isset($counter_enable_options) && $counter_enable_options == '1') { ?>
                                <div class='count apss-count' data-url='<?php echo $url; ?>' data-social-network='<?php echo $key; ?>' data-social-detail="<?php echo $url . '_' . $key; ?>"><?php echo $count; ?></div>
                            <?php } ?>
                        </a>
                    </div>
                    <?php
                    break;
                    
                case 'qiikchat':
                    $link = ('https://qiikchat.com/sendtodevice/?linkurl='. $url); ?>
                    
                    <div class='apss-qiikchat apss-single-icon'>
                        <a rel='nofollow' 
                           class='qiik-chat-sharer share-qiikchat-popup' 
                           title='<?php _e( 'Send To Devices', 'cross-device-social-share' ); ?>' 
                           target='_blank' 
                           href='<?php echo $link; ?>'>
                            <div class='apss-icon-block clearfix'>
                                <i class='fa  fa-bluetooth-b'></i>
                                <span class='apss-social-text'><?php _e('Send email', 'cross-device-social-share'); ?></span>
                                <span class='apss-share'><?php _e('Send', 'cross-device-social-share'); ?></span>
                            </div>
                        </a>
                    </div>

                    <?php
                    break;
            }
        }
    }

    if (isset($total_counter_enable_options) && $total_counter_enable_options == '1') {
        ?>
        <div class='apss-total-share-count'>
            <span class='apss-count-number'><?php echo $total_count; ?></span>
            <div class="apss-total-shares"><span class='apss-total-text'><?php echo _e(' Total', 'cross-device-social-share'); ?></span>
                <span class='apss-shares-text'><?php echo _e(' Shares', 'cross-device-social-share'); ?></span></div>
        </div>
    <?php } ?>
</div>