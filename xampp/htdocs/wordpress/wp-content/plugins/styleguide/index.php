<?php
/**
 * Plugin Name: Styleguide - Custom Fonts and Colors
 * Plugin URI: https://wordpress.org/plugins/styleguide/
 * Description: Easily customize the theme fonts and colors that you use on your website.
 * Version: 1.6.1
 * Author: BinaryMoon
 * Author URI: https://prothemedesign.com/
 * License: GPLv2 or later
 * Text Domain: styleguide
 *
 * @package styleguide
 */

/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

/**
 * Wishlist
 *
 * style templates
 * allow fonts that aren't in the font list (to support themes with default fonts)
 * add italic option for fonts
 * add intelligent defaults for properties
 * check if the color control already exists and if not create it
 * behave better when there's already defined colors (eg with Twenty Fifteen)
 * remove rules containing handlebars (ie with no property set)
 * add support for child themes - using an 'include' process that allows you to include a theme style file
 */


include_once( 'includes/fonts.php' );

include_once( 'includes/class.styleguide.php' );

include_once( 'includes/helpers.php' );
