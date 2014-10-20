<?php
/*
Plugin Name: maps
Description: create Map Iframe in the WordPress editor using a shortcode. For example: <code>[maps height="1000px"]</code>
Version: 1.0
Author: Williamson Strong
Author URI: http://github.com/domabo
Plugin URI: http://github.com/domabo
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_shortcode('maps','domabo_maps');

function domabo_maps($atts) {
	 extract(shortcode_atts(array(
		'src' => plugins_url( 'maps.html', __FILE__ ),
		'width' => '100%',
		'height' => '400px',
		'scrolling' => 'no',
		'frameborder' => '0'
	 ), $atts));

	$find = array(
		'&amp;amp',
		'&amp;',
		'&;',
	);

	$replace = array(
		'&amp;',
		'&',
		'&',
	);

	$src = str_replace ($find, $replace, $src);	

	$out = "<iframe src=\"$src\" width=\"$width\" height=\"$height\" frameborder=\"$frameborder\" scrolling=\"$scrolling\"></iframe>";

	if (empty($src)) {
		$out = '';
	}

	return $out;
}