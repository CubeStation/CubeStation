<?php 
    //Credits: This file was derived from https://wordpress.org/plugins/accesspress-social-share by Access Keys
    defined( 'ABSPATH' ) or die( "No script kiddies please!" );
    ?>
<?php
    $apss_link_open_option = "_blank";
    $twitter_user = $options['twitter_username'];
    $counter_enable_options = $options['counter_enable_options'];
    $twitter_api_use = '1';
    $icon_set_value = $options['social_icon_set'];
    $url = get_permalink(); //$this->curPageURL();
    $cache_period = ($options['cache_period'] != '') ? $options['cache_period'] * 60 * 60 : 24 * 60 * 60;
    $enable_counter = 0;
?>
<?php if ( isset( $options['share_text'] ) && $options['share_text'] != '' ) { ?> <div class='apss-share-text'><?php echo $options['share_text']; ?></div> <?php } ?>

<?php
$total_count = 0;

foreach ( $options['social_networks'] as $key => $value ) {
	if ( intval( $value ) == '1' ) {
		$count = $this->get_count( $key, $url );
		$total_count += $count;
		switch ( $key ) {
			//counter available for facebook
			case 'facebook':
				$link = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
				$count = $this->get_count( $key, $url );
				?>
				<div class='apss-facebook apss-single-icon'>
					<a class='qiik-facebook-sharer' 
                                           rel='nofollow' 
                                           title="<?php _e( 'Share on Facebook', 'cross-device-social-share' ); ?>" 
                                           target='<?php echo $apss_link_open_option; ?>' href='<?php echo $link; ?>'>
						<div class='apss-icon-block clearfix'>
							<i class='fa fa-facebook'></i>
							<span class='apss-social-text'><?php _e( 'Share on Facebook', 'cross-device-social-share' ); ?></span>
							<span class='apss-share'><?php _e( 'Share', 'cross-device-social-share' ); ?></span>
						</div>
						<?php if ( isset( $counter_enable_options ) && $counter_enable_options == '1' ) { ?>
							<div class='count apss-count' data-url='<?php echo $url; ?>' data-social-network='<?php echo $key; ?>' data-social-detail="<?php echo $url . '_' . $key; ?>"><?php echo $count; ?></div>
						<?php } ?>
					</a>
				</div>
				<?php
				break;

			case 'twitter':
				$url_twitter = $url;
				$url_twitter = urlencode( $url_twitter );
				if ( isset( $twitter_user ) && $twitter_user != '' ) {
					$twitter_user = 'via=' . $twitter_user;
				}
				$link = "https://twitter.com/intent/tweet?text=$title&amp;url=$url_twitter&amp;$twitter_user";
				$count = $this->get_count( $key, $url );
				?>
				<div class='apss-twitter apss-single-icon'>
					<a class='qiik-twitter-sharer' 
                                           rel='nofollow' 
                                           title="<?php _e( 'Share on Twitter', 'cross-device-social-share' ); ?>" 
                                           target='<?php echo $apss_link_open_option; ?>' href="<?php echo $link; ?>">
						<div class='apss-icon-block clearfix'>
							<i class='fa fa-twitter'></i>
							<span class='apss-social-text'><?php _e( 'Share on Twitter', 'cross-device-social-share' ); ?></span><span class='apss-share'><?php _e( 'Tweet', 'cross-device-social-share' ); ?></span>
						</div>
						<?php if ( isset( $counter_enable_options ) && $counter_enable_options == '1' && $twitter_api_use !='1' ) { ?>
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
				$count = $this->get_count( $key, $url );
				?>
				<div class='apss-google-plus apss-single-icon'>
					<a class='qiik-gplus-sharer' 
                                           rel='nofollow' 
                                           title="<?php _e( 'Share on Google Plus', 'cross-device-social-share' ); ?>" 
                                           target='<?php echo $apss_link_open_option; ?>' 
                                           href='<?php echo $link; ?>'>
						<div class='apss-icon-block clearfix'>
							<i class='fa fa-google'></i>
							<span class='apss-social-text'><?php _e( 'Share on Google Plus', 'cross-device-social-share' ); ?></span>
							<span class='apss-share'><?php _e( 'Plus', 'cross-device-social-share' ); ?></span>
						</div>
						<?php if ( isset( $counter_enable_options ) && $counter_enable_options == '1' ) { ?>
							<div class='count apss-count' data-url='<?php echo $url; ?>' data-social-network='<?php echo $key; ?>' data-social-detail="<?php echo $url . '_' . $key; ?>"><?php echo $count; ?></div>
						<?php } ?>
					</a>
				</div>
				<?php
				break;

			//counter available for pinterest
			case 'pinterest':
				$count = $this->get_count( $key, $url );
				?>

				<div class='apss-pinterest apss-single-icon'>
					<a class='qiik-pinterest-sharer' 
                                           target='_blank' 
                                           rel='nofollow' 
                                           title="<?php _e( 'Share on Pinterest', 'cross-device-social-share' ); ?>" 
                                           href='javascript:pinIt();'>
						<div class='apss-icon-block clearfix'>
							<i class='fa fa-pinterest-p'></i>
							<span class='apss-social-text'><?php _e( 'Share on Pinterest', 'cross-device-social-share' ); ?></span>
							<span class='apss-share'><?php _e( 'Pin it', 'cross-device-social-share' ); ?></span>
						</div>
						<?php if ( isset( $counter_enable_options ) && $counter_enable_options == '1' ) { ?>
							<div class='count apss-count' data-url='<?php echo $url; ?>' data-social-network='<?php echo $key; ?>' data-social-detail="<?php echo $url . '_' . $key; ?>"><?php echo $count; ?></div>
						<?php } ?>

					</a>
				</div>
				<?php
				break;

			case 'qiikchat':
				$link = ('https://qiikchat.com/sendtodevice/?linkurl='. $url); ?>
				<div class='apss-qiikchat apss-single-icon'>
					<a 
                                           rel='nofollow' 
                                           class='qiik-chat-sharer share-qiikchat-popup' 
                                           title="<?php _e( 'Send To Own Devices', 'cross-device-social-share' ); ?>" 
                                           target='_blank' 
                                           href='<?php echo $link; ?>'>
						<div class='apss-icon-block clearfix'>
							<i class='fa  fa-bluetooth-b'></i>
							<span class='apss-social-text'><?php _e( 'Send To Devices', 'cross-device-social-share' ); ?></span>
							<span class='apss-share'><?php _e( 'Send', 'cross-device-social-share' ); ?></span>
						</div>
					</a>
				</div>

				<?php
				break;
		}
	}
}
if ( isset( $enable_counter ) && $enable_counter == '1' ) {
	?>
	<div class='apss-total-share-count'>
		<span class='apss-count-number'><?php echo $total_count; ?></span>
		<div class="apss-total-shares"><span class='apss-total-text'><?php echo _e( ' Total', 'cross-device-social-share' ); ?></span>
			<span class='apss-shares-text'><?php echo _e( ' Shares', 'cross-device-social-share' ); ?></span></div>
	</div>
<?php
}