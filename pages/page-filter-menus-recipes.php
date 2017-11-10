<?php
/**
 * Template Name: Filter Menus & Recipes
 *
 */

get_header("login"); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'filter-menus-recipes' );
			endif; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
