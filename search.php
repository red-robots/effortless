<?php
/**
 * The template for displaying search page.
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main " role="main">
            <?php $post = get_post(131);
            if($post):
                setup_postdata($post);?>
                <section class="template-search full-width-wrapper">
                    <?php $image = get_field("template_header_image");
                    if ($image):?>
                        <header class="template-header row-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            <h1><?php esc_html_e( 'Search Results for: '. get_search_query(), 'acstarter' ); ?></h1>
                        </header><!--.template-header-->
					<?php endif; 
					wp_reset_postdata();?>
                    <div class="copy row-2">
						<?php if(have_posts()):?>
							<ul>
								<?php while(have_posts()):the_post();?>
									<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
								<?php endwhile;?>
							</ul>
						<?php endif;?>
						<header><h2>Sitemap</h2></header>
						<nav class="sitemap">
                            <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
                        </nav>
                    </div><!-- .copy -->
                </section><!-- .error-404 -->
            <?php endif;//if post?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
