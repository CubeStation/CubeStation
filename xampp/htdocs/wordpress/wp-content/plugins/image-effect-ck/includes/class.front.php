<?php
defined('ABSPATH') or die;

class ImageffectckFront extends Imageffectck {

	function __construct() {
		parent::__construct();

		add_action('wp_head', array( $this, 'load_assets'));
		add_action('init', array( $this, 'load_assets_files'));
	}

	function load_assets_files() {
		wp_enqueue_script('jquery');
		wp_enqueue_style('image-effect-ck', $this->pluginurl . '/assets/imageeffectck.css');
		wp_enqueue_script('image-effect-ck', $this->pluginurl . '/assets/imageeffectck.js');
	}

	function load_assets() {
		?>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			$(this).ImageEffectck({
			});
		});
		</script>
	<?php }
}

