<?php 
//Credits: This file was derived from https://wordpress.org/plugins/accesspress-social-share by Access Keys
    defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
?>
<div class="apss-wrapper-block">
	<div class="apss-setting-header clearfix">
		<div class="apss-headerlogo">
			<img src="<?php echo APSS_IMAGE_DIR; ?>/cross_device_logo.png" alt="<?php esc_attr_e( 'Cross-device Social Share', 'cross-device-social-share' ); ?>" />
		</div>
		<div class="apss-header-title">
			<?php _e( 'Cross-device Social Share', 'cross-device-social-share' ); ?>
		</div>
	</div>
	<?php $options = get_option( APSS_SETTING_NAME );?>
	<?php if ( isset( $_SESSION['apss_message'] ) ): ?>
            <div class="apss-message">
		<p>
                    <?php
                        echo $_SESSION['apss_message'];
                        unset( $_SESSION['apss_message'] );
                    ?>
                </p>
            </div>
        <?php endif; ?>

	<div class="apps-wrap">
		<form method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
			<input type="hidden" name="action" value="apss_save_options"/>

			<ul class="apss-setting-tabs clearfix">
				<li><a href="javascript:void(0)" id="apss-social-networks" class="apss-tabs-trigger apss-active-tab	"><?php _e( 'Social Networks', 'cross-device-social-share' ); ?></a></li>
				<li><a href="javascript:void(0)" id="apss-how-to-use" class="apss-tabs-trigger"><?php _e( 'More', 'cross-device-social-share' ); ?></a></li>
                                
			</ul>
			<div class="apss-wrapper">
                            <div class="apss-tab-contents apss-social-networks" id="tab-apss-social-networks" style='display:block'>
				<h2><?php _e( 'Social Network:', 'cross-device-social-share' ); ?> </h2>
                                <span class="social-text"><?php _e( 'Please choose the social media you want to display.', 'cross-device-social-share' ); ?></span>
				<div class="apps-opt-wrap clearfix">
                                    <?php
					$label_array = 
                                                array( 
                                                    'facebook' => 'Facebook',
                                                    'pinterest' => 'Pinterest',
                                                    'twitter' => 'Twitter',
                                                    'google-plus' => 'Google Plus',
                                                    'qiikchat' => 'Local Device',
                                                );
                                    ?>
                                    <?php foreach ( $options['social_networks'] as $key => $val ) :?>
					<div class="apss-option-wrapper">
                                            <div class="apss-option-field">
						<label class="clearfix">
                                                    <input 
                                                        type="checkbox" 
                                                        data-key='<?php echo $key; ?>' 
                                                        name="social_networks[<?php echo $key; ?>]" 
                                                        value="1" <?php if ( $val == '1' ) {echo "checked='checked'";} ?> 
                                                    />
                                                    <span class="social-name"><?php echo $label_array[$key]; ?></span>
                                                </label>
                                            </div>
					</div>
                                    <?php endforeach; ?>
                                </div>
                                <input type="hidden" name="apss_social_newtwork_order" id='apss_social_newtwork_order' value="<?php echo implode( ',', array_keys( $options['social_networks'] ) ); ?>"/>
                            
				<h2><?php _e( 'Share options:', 'cross-device-social-share' ); ?> </h2>
				<span class="social-text"><?php _e( 'Select if you want also to display social share icons on:', 'cross-device-social-share' ); ?></span>
				<p style="display: none">
                                    <input 
                                        type="checkbox" 
                                        id="apss_posts" 
                                        value="post" 
                                        name="cross_share_settings[share_options][]" <?php 
                                            if ( in_array( "post", $options['share_options'] ) || in_array( "posts", $options['share_options'] ) ) {
                                                echo "checked='checked'";
                                            } 
                                        ?>
                                    >
                                    <label for="apss_posts"><?php _e( 'Posts', 'cross-device-social-share' ); ?> </label>
                                </p>
                                <p style="">
                                    <input 
                                        type="checkbox" 
                                        id="apss_pages" 
                                        value="page" 
                                        name="cross_share_settings[share_options][]" <?php 
                                            if ( in_array( "page", $options['share_options'] ) || in_array( "pages", $options['share_options'] ) ) {
                                                echo "checked='checked'";
                                            } 
                                        ?> 
                                     >
                                    <label for="apss_pages"><?php _e( 'Pages', 'cross-device-social-share' ); ?> </label>
                                </p>
				<p>
                                    <input 
                                        type="checkbox" 
                                        id="apss_front_page" 
                                        value="front_page" 
                                        name="cross_share_settings[share_options][]" <?php 
                                            if ( in_array( "front_page", $options['share_options'] ) ) {
                                                echo "checked='checked'";
                                            } ?> 
                                    >
                                    <label for="apss_front_page"><?php _e( 'Front Page', 'cross-device-social-share' ); ?></label>
                                </p>
                                <p>
                                    <input 
                                        type="checkbox" 
                                        id="apss_archives" 
                                        value="archives" 
                                        name="cross_share_settings[share_options][]" <?php 
                                            if ( in_array( "archives", $options['share_options'] ) ) {
                                                echo "checked='checked'";
                                            }
                                        ?> 
                                    >
                                    <label for="apss_archives"><?php _e( 'Archives', 'cross-device-social-share' ); ?></label>
                                </p>

				<p>
                                    <input 
                                        type="checkbox" 
                                        id="apss_categories" 
                                        value="categories" 
                                        name="cross_share_settings[share_options][]" <?php 
                                            if ( in_array( "categories", $options['share_options'] ) ) {
                                                echo "checked='checked'";
                                            } ?> 
                                    >
                                    <label for="apss_categories"><?php _e( 'Categories', 'cross-device-social-share' ); ?></label>
                                </p>
				<p>
                                    <input 
                                        type="checkbox" 
                                        id="apss_all" 
                                        value="all" 
                                        name="cross_share_settings[share_options][]" <?php 
                                            if ( in_array( "all", $options['share_options'] ) ) {
						echo "checked='checked'";
                                            } ?>
                                    >
                                    <label for="apss_all"><?php _e( 'Other (search results, etc)', 'cross-device-social-share' ); ?></label>
                                </p>
                            
                                <div class=' apss-display-positions'>
                                    <h2><?php _e( 'Buttons position:', 'cross-device-social-share' ); ?></h2>
                                    <span class='social-text'><?php _e( 'Choose where you want to display the social share buttons:', 'cross-device-social-share' ); ?></span>
                                    <p>
                                        <input 
                                            type="radio" 
                                            id="apss_below_content" 
                                            name="cross_share_settings[social_share_position_options]" 
                                            value="below_content" <?php 
                                                if ( $options['share_positions'] == 'below_content' ) {
                                                    echo "checked='checked'";
                                                } ?> 
                                        />
                                        <label for='apss_below_content'><?php _e( 'Below content', 'cross-device-social-share' ); ?></label></p>
                                    <p>
                                        <input 
                                            type="radio" 
                                            id="apss_above_content" 
                                            name="cross_share_settings[social_share_position_options]" 
                                            value="above_content" <?php 
                                                if ( $options['share_positions'] == 'above_content' ) {
                                                    echo "checked='checked'";
                                                } ?> 
                                        />
                                        <label for='apss_above_content'><?php _e( 'Above content', 'cross-device-social-share' ); ?></label>
                                    </p>
                                    <p>
                                        <input 
                                            type="radio" 
                                            id="apss_below_above_content" 
                                            id="below_above_content" 
                                            name="cross_share_settings[social_share_position_options]" 
                                            value="on_both" <?php 
                                            if ( $options['share_positions'] == 'on_both' ) {
                                                echo "checked='checked'";
                                            } ?> 
                                        />
                                        <label for='apss_below_above_content'><?php _e( 'Both', 'cross-device-social-share' ); ?></label>
                                    </p>
                                </div>
                                <div class=" apss-icon-sets" style="display: none">
                                    <h2><?php _e( 'Icons sets: ', 'cross-device-social-share' ); ?> </h2>
                                    <?php for ( $i = 1; $i <= 1; $i++ ): ?>
                                        <p>
                                            <input 
                                                id="apss_icon_set_<?php echo $i; ?>" 
                                                value="<?php echo $i; ?>" 
                                                name="cross_share_settings[social_icon_set]" 
                                                type="radio" <?php 
                                                    if ( $options['social_icon_set'] == $i ) {
                                                        echo "checked='checked'";
                                                    } ?> 
                                            >
                                            <label for="apss_icon_set_<?php echo $i; ?>">
                                                <span class="apss_demo_icon apss_demo_icons_<?php echo $i; ?>"></span>
                                                <?php _e( "Icon sets $i", 'cross-device-social-share' ); ?>
                                                <div class="apss-theme-image">
                                                    <img src='<?php echo APSS_IMAGE_DIR . "/theme/theme$i.jpg"; ?>'/>
                                                </div>
                                            </label>
                                        </p>
                                    <?php endfor; ?>
                                </div>
                            
                                <h2><?php _e( 'Miscellaneous: ', 'cross-device-social-share' ); ?> </h2>
                                <div class="apss-share-text-settings clearfix">
                                    <p>
                                        <?php _e('Enter the text you want appear above social share icons.', 'cross-device-social-share' ); ?> 
                                    </p>
                                    <input 
                                        type="text" 
                                        name="cross_share_settings[share_text]"  
                                        value="<?php 
                                            if ( isset( $options['share_text'] ) ) {
                                                echo $options['share_text'];
                                            } 
                                        ?>" 
                                    />
                                </div>
                                <br />
                                <div class="apss-twitter-settings clearfix">
                                    <p>
                                        <?php _e( 'Twitter username:', 'cross-device-social-share' ); ?>
                                    </p>    
                                    <input 
                                        type="text" 
                                        name="cross_share_settings[twitter_username]"  
                                        value="<?php echo $options['twitter_username']; ?>" 
                                    />
                                </div>
                            </div>
                            <div class="apss-tab-contents apss-how-to-use" id="tab-apss-how-to-use" style='display:none' >
                                <h2>Shortcodes</h2>
                                <?php include_once('how-to-use.php'); ?>
                                <h2>Credits</h2>
                                <p><strong>Cross-device Social Share</strong> was derived from AccessPress Social Share by <a target="_blank" href="https://accesspressthemes.com/">AccessPress Themes.</a></p>
                            </div>
 
                            <?php wp_nonce_field( 'apss_nonce_save_settings', 'apss_add_nonce_save_settings' ); ?>
                            <input 
                                type="submit" 
                                alt=""accesskey=""class="submit_settings button primary-button" 
                                value="<?php _e( 'Save settings', 'cross-device-social-share' ); ?>" 
                                name="apss_submit_settings" 
                                id="apss_submit_settings"
                            />
                            <?php /* --------------- Noncefield ---------------------------- */?>
                            <?php wp_nonce_field( 'apss_settings_action', 'apss_settings_action' );?>
                            <?php $nonce = wp_create_nonce( 'apss-restore-default-settings-nonce' ); ?>
                            <?php $nonce_clear = wp_create_nonce( 'apss-clear-cache-nonce' ); ?>
                            <a 
                                href="<?php echo admin_url() . 'admin-post.php?action=apss_restore_default_settings&_wpnonce=' . $nonce; ?>" 
                                onclick="return confirm('<?php _e( 'Are you sure you want to restore default settings?', 'cross-device-social-share' ); ?>')">
                                <input type="button" value="Restore Default Settings" class="apss-reset-button button primary-button"/>
                            </a>
                            <a  style="display:none" 
                                href="<?php echo admin_url() . 'admin-post.php?action=apss_clear_cache&_wpnonce=' . $nonce_clear; ?>" 
                                onclick="return confirm('<?php _e( 'Are you sure you want to clear cache share counter?', 'cross-device-social-share' ); ?>')">
                                <input type="button" value="Clear Cache" class="apss-reset-button button primary-button"/>
                            </a>
			</div>
		</form>
	</div>
</div>
<div class="apss-promoFloat">

</div>
<div class="clear">
    
</div>