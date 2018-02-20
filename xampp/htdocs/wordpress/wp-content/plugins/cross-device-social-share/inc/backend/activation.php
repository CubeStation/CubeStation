<?php
//Credits: This file was derived from https://wordpress.org/plugins/accesspress-social-share by Access Keys
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$cross_share_settings = array();
$share_options = array(
    'post',
    'page'
);
$cross_share_settings['share_options'] = $share_options;
$cross_share_settings['social_icon_set'] = '1';
$cross_share_settings['share_positions'] = 'above_content';//'on_both' or 'below_content';
$social_networks = array(
    'facebook' => '1',
    'pinterest' => '1',
    'twitter' => '1',
    'google-plus' => '0',
    'qiikchat' => '1',
);
$cross_share_settings['social_networks'] = $social_networks;
$cross_share_settings['disable_frontend_assets'] = '0';
$cross_share_settings['share_text'] = '';
$cross_share_settings['twitter_username'] = '';
$cross_share_settings['counter_enable_options'] = '0';
$cross_share_settings['twitter_counter_api']    = '1';
$cross_share_settings['total_counter_enable_options'] = '0';
$cross_share_settings['cache_period'] = '24';
$cross_share_settings['apss_social_counts_transients'] = array();
$cross_share_settings['dialog_box_options'] = '1';
$cross_share_settings['footer_javascript'] = '1';
update_option( APSS_SETTING_NAME, $cross_share_settings );
