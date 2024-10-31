<?php
/**
* Plugin Name: Remove Amazon Affiliate Links in Feed
* Plugin URI: https://wpbarista.com/remove-amazon-affiliate-links-feed
* Description: This plugin scans your RSS / Feed for any amazon affiliate links. It replaces those links with a link back to the original post on your blog.
* Version: 1.3
* Author: Cathy Tibbles
* Author URI: https://wpbarista.com
* License: GPL3
* License URI: http://www.gnu.org/licenses/gpl.html
**/
if( !defined('ABSPATH') ) {
	die( 'Access denied.' );
}
/**
 * Activation Hook
 *
 * Register plugin activation hook.
 *
 * @package Remove Amazon Affiliate Links in Feed
 * @since 1.0.0
 **/
register_activation_hook( __FILE__, 'raalf_activation' );

if( !function_exists('raalf_activation') ) :
/**
 * Plugin Setup (On Activation)
 *
 * Does the initial setup,
 * test default values
 *
 * @package Remove Amazon Affiliate Links in Feed
 * @since 1.0.0
 **/
function raalf_activation() {
	
	//Plugin Activation Code Here
}
endif;

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 *
 * @package Remove Amazon Affiliate Links in Feed
 * @since 1.0.0
 */

register_deactivation_hook( __FILE__, 'raalf_deactivation');
if( !function_exists('raalf_deactivation') ) :
/**
 * Plugin Setup (On Deactivation)
 *
 * Clean up plugin details
 * 
 * @package Remove Amazon Affiliate Links in Feed
 * @since 1.0.0
 **/
function raalf_deactivation() {
	
	//Plugin Dectivation Code Here
}
endif;
if( !function_exists('raalf_override_amz_url_rss') ) :
/**
 * Override Amazon Affiliate Links With Post Permalink In RSS Feed
 * 
 * Replace specific amazon affiliate links with the permalink
 *
 * @package Remove Amazon Affiliate Links in Feed
 * @since 1.0.0
 **/
function raalf_override_amz_url_rss( $content ) {
	$content = preg_replace('/href=("|\')((http|https):)?\/\/(www\.)?(amazon|amzn|a).(co|to)(.*)("|\')/Ui', 'href="'.get_permalink().'"', $content);
	return $content;
}
add_filter( 'the_content_feed', 'raalf_override_amz_url_rss', 1 );
add_filter( 'the_excerpt_rss', 	'raalf_override_amz_url_rss', 1 );
endif;