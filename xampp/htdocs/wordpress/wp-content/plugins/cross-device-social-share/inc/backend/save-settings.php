<?php 
    //Credits: This file was derived from https://wordpress.org/plugins/accesspress-social-share by Access Keys
    defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
    ?>
<?php
$cross_share_settings = array();
$share_options = array();
if ( isset( $_POST['cross_share_settings']['share_options'] ) ) {
	foreach ( $_POST['cross_share_settings']['share_options'] as $key => $value ) {
		$share_options[] = $value;
	}
}

$cross_share_settings['share_options']	= $share_options;
$cross_share_settings['social_icon_set'] = $_POST['cross_share_settings']['social_icon_set'];
$cross_share_settings['share_positions'] = $_POST['cross_share_settings']['social_share_position_options'];

$apss_social_newtwork_order = explode( ',', $_POST['apss_social_newtwork_order'] );
$social_network_array = array();
foreach ( $apss_social_newtwork_order as $social_network ) {
	$social_network_array[$social_network] = (isset( $_POST['social_networks'][$social_network] )) ? 1 : 0;
}

$cross_share_settings['social_networks']					= $social_network_array;
$cross_share_settings['disable_frontend_assets']                         = '0';
$cross_share_settings['share_text']					= sanitize_text_field( $_POST['cross_share_settings']['share_text'] );
$cross_share_settings['twitter_username']				= stripslashes_deep( $_POST['cross_share_settings']['twitter_username'] );
$cross_share_settings['counter_enable_options']                          = '0';
$cross_share_settings['twitter_counter_api']				= '1';
$cross_share_settings['total_counter_enable_options']                    = '0';
$cross_share_settings['cache_period']					= '24';
$cross_share_settings['dialog_box_options']				= '1';
$cross_share_settings['apss_email_subject']				= 'email subjetc';
$cross_share_settings['apss_email_body']					= 'email body';
if ( !isset( $cross_share_settings['apss_social_counts_transients'] ) ) {
	$cross_share_settings['apss_social_counts_transients'] = array();
}

// The option already exists, so we just update it.
update_option( APSS_SETTING_NAME, $cross_share_settings );
$_SESSION['apss_message'] = __( 'Settings Saved Successfully.', 'cross-device-social-share' );
wp_redirect( admin_url() . 'admin.php?page=cross-device-social-share' );
exit;

