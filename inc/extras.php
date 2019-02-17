<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );

function shortenText($str, $limit, $brChar = ' ', $pad = '...')  {
    if (empty($str) || strlen($str) <= $limit) {
        return $str;
    }
    $output = substr($str, 0, ($limit+1));
    $brCharPos = strrpos($output, $brChar);
    $output = substr($output, 0, $brCharPos);
    $output = preg_replace('#\W+$#', '', $output);
    $output .= $pad;
    return $output;
}

function my_custom_admin_head() { ?>
	<style type="text/css">
		/* Homepage Slider */
		.acf-field-5c6923e818202 .acf-gallery-side-data .media-types-required-info,
		.acf-field-5c6923e818202 .acf-gallery-side-info .acf-gallery-edit,
		.acf-field-5c6923e818202 .acf-gallery-side-data [data-name="caption"],
		.acf-field-5c6923e818202 .acf-gallery-side-data [data-name="alt"] {
			display: none!important;
		}
		.acf-field-5c6923db18201 .acf-gallery-side-data textarea {
			height: 90px;
		}
	</style>	
<?php }
add_action( 'admin_head', 'my_custom_admin_head' );

function get_page_id_by_slug($slug,$status='publish') {
	global $wpdb;
	if(empty($slug)) return 0;
	$result = $wpdb->get_row( "SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."' AND post_status='".$status."'" );
	return ($result) ? $result->ID : 0;
}

function get_instagram_setup() {
	global $wpdb;
	$result = $wpdb->get_row( "SELECT option_value FROM $wpdb->options WHERE option_name = 'sb_instagram_settings'" );
	if($result) {
		$option = ($result->option_value) ? @unserialize($result->option_value) : false;
	} else {
		$option = '';
	}
	return $option;
}



