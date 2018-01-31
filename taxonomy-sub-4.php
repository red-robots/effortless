<?php
/**
 * The template for displaying all single menu posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

if( !in_array( 'administrator', wp_get_current_user()->roles)&&!in_array( 'subscriber', wp_get_current_user()->roles) ){
	wp_redirect(get_permalink( get_option('woocommerce_myaccount_page_id')));
	exit;
}
global $post_type;
global $tax;
global $from_tax;
$from_tax = 'from-4';
$tax = 'sub-4';
$post_type = array('style-points');
get_header("login"); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php get_template_part( 'template-parts/content', 'filter' );?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
