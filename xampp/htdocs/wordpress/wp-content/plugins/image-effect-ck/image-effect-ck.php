<?php
/**
 * Plugin Name: Image Effect CK
 * Plugin URI: http://www.wp-pluginsck.com/
 * Description: Image Effect CK allows you to add some nice effects on your images into your editor. You just have to add the needed CSS class on the desired images.
 * Version: 1.0.1
 * Author: Cédric KEIFLIN
 * Author URI: http://www.wp-pluginsck.com/
 * License: GPL2
 * Text Domain:image-effect-ck
 * Domain Path: /language
 */

defined('ABSPATH') or die;

class Imageffectck {

	public $pluginname, $pluginurl, $plugindir;

	function __construct() {
		// init variables
		$this->pluginname = 'image-effect-ck';
		$this->pluginurl = plugins_url('', __FILE__);
		$this->plugindir = WP_PLUGIN_DIR . '/' . $this->pluginname;
	}

	function init() {
		// load the translation
		add_action('plugins_loaded', array($this, 'load_textdomain'));

		if (is_admin()) {
			// nothing
		} else {
			// load the main plugin class
			require_once( plugin_dir_path( __FILE__ ) . 'includes/class.front.php' );
			new ImageffectckFront();
		}
		return;
	}

	function load_textdomain() {
		load_plugin_textdomain( 'image-effect-ck', false, dirname( plugin_basename( __FILE__ ) ) . '/language/'  );
	}
}

// load the process
$imageeffectck = new Imageffectck();
$imageeffectck->init();