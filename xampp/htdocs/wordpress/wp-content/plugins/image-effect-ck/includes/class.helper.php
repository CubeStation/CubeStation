<?php
/**
 * @copyright	Copyright (C) 2016. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		Plugins CK - Cédric KEIFLIN - http://www.wp-pluginsck.com
 */
defined('ABSPATH') or die;

class ImageeffectckHelper {

	private static $effectsList;

	public static function getEffectsList() {
		if (empty(self::$effectsList)) {
			self::$effectsList = array(
				 "effectck-lily"
				,"effectck-oscar" 
				,"effectck-sadie"
				,"effectck-honey"
				,"effectck-layla"
				,"effectck-zoe"
				,"effectck-marley"
				,"effectck-ruby"
				,"effectck-roxy"
				,"effectck-bubba"
				,"effectck-romeo"
				,"effectck-dexter"
				,"effectck-sarah"
				,"effectck-chico"
				,"effectck-milo"
				,"effectck-julia"
				,"effectck-goliath"
				,"effectck-selena"
				,"effectck-apollo"
				,"effectck-steve"
				,"effectck-moses"
				,"effectck-jazz"
				,"effectck-ming"
				,"effectck-duke"
				);
		}

		return self::$effectsList;
	}
}
