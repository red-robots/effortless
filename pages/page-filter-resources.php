<?php
/**
 * Template Name: Sources & Resources
 *
 */
if( !in_array( 'administrator', wp_get_current_user()->roles) ){
	wp_redirect(get_bloginfo("url"));
	exit;
}
global $post_type;
global $tax;
global $from_tax;
$from_tax = 'from-2';
$tax = 'sub-2';
$post_type = array('sources-resources');
get_header("login"); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'filter-sources-resources' );

			endif; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
