<?php
/**
 * Template Name: Sources & Resources
 *
 */

$search_placeholder = get_field('search_placeholder');
$type = get_field('post_type');
$post_type = ($type) ? $type[0] : '--NA--';

$taxonomy = cpt_taxonomies($post_type);
$posts_per_page = default_post_per_page();
$total_pages = 0;
$has_items = array();
$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
// if( is_user_logged_in() ) {
// 	$status = 'members';
// } else {
// 	$status = 'public';
// }
$subcat = ( isset($_GET['sub']) && $_GET['sub'] ) ? $_GET['sub'] : '';
$search = ( isset($_GET['search']) && $_GET['search'] ) ? $_GET['search'] : '';
get_header(); ?>

	<div id="primary" class="full-content-area with-pagination clear">
		<main id="main" class="site-main clear" role="main">
			<?php if( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class("template-filter full-width-wrapper"); ?>>
					<section class="column-2 fullwidth">
		        		<header>
				            <h1 class="page-title"><?php the_title(); ?></h1>
				            <form class="bella-search cpt-search-form" action="<?php get_permalink(); ?>" method="GET">
				   				 <input type="text" name="search" placeholder="<?php echo $search_placeholder ?>" value="<?php echo $search; ?>" />
							</form>
						</header>

						<?php  
						$terms = get_the_categories_by_status($post_type,$taxonomy,$status);
						$term_ids = array();
						if($terms) { ?>
							<div class="sub-menu">
								<div class="sub-terms terms">
									<div class="term">
										<div class="name">
											<a href="<?php echo get_permalink(); ?>">All</a>
										</div>
									</div>
									<?php foreach ($terms as $tm) { 
										$i_term_id = $tm->term_id;
										$i_taxonomy = $tm->taxonomy;
										$i_term_name = $tm->name;
										$i_term_slug = $tm->slug;
										$term_ids[] = $i_term_id;
										//$term_link = get_term_link($tm);
										$term_link = get_permalink() . '?sub=' . $i_term_slug;
										$is_current = ($subcat==$i_term_slug) ? ' current':'';
										?>
										<div class="term<?php echo $is_current;?>">
											<div class="name">
												<a href="<?php echo $term_link ?>"><?php echo $i_term_name ?></a>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>


							<?php  
							if( $subcat ) {
								$tax_query_args = array( 
									array(
										'taxonomy' => $taxonomy, 
										'field'    => 'slug',
										'terms'    => $subcat
									),
								);
							} else {
								$tax_query_args = array( 
									array(
										'taxonomy' => $taxonomy, 
										'field'    => 'term_id',
										'terms'    => $term_ids
									),
								);
							}

							$args = array(
								'posts_per_page' => $posts_per_page,
								'post_type'	=> $post_type,
								'post_status'  => 'publish',
								'paged'	=> $paged,
								'tax_query' => $tax_query_args
							); 

							$args2 = array(
								'posts_per_page' => -1,
								'post_type'	=> $post_type,
								'post_status'  => 'publish',
								'paged'	=> $paged,
								'tax_query' => $tax_query_args
							); 

							if($search) {
								$args['s'] = $search;
								$args2['s'] = $search;
							} 
							

							$x_items = get_posts($args2);
							$total_pages = count($x_items);

							$items = new WP_Query($args); 
							?>
							<?php if ($items) { ?>
								<div class="container">  
									<?php while ( $items->have_posts() ) : $items->the_post(); 
										$img = get_field('search_image');
										$image_url = ($img) ? $img['sizes']['medium_large'] : get_bloginfo('template_url') . '/images/coming-soon-image.gif';
										$p_id = get_the_ID();
										$has_items[] = $p_id;
										$cat_status = get_the_terms($p_id,'cpt-status');
										$cat_subs = get_the_terms($p_id,$taxonomy);
										$the_cats = ' ';
										if($cat_status) {
											foreach($cat_status as $c) {
												$the_cats .= ' ' . $c->slug;
											}
										}
										if($cat_subs) {
											foreach($cat_subs as $cs) {
												$the_cats .= ' ' . $cs->slug;
											}
										}
										$company = get_field('company');
										$product_title = get_field('product_title');
										$entry_title = ($company) ? $company : get_the_title();
									?>
									<div class="item js-blocks<?php echo $the_cats?>">
										<a href="<?php the_permalink(); ?>">
				                        	<?php if ( $img ) {  ?>
				                        		<img src="<?php echo $image_url?>" alt="<?php echo $img['title'];?>" />
				                        	<?php } else { ?>
				                        		<img src="<?php echo $image_url?>" alt="<?php echo get_the_title();?>" />
				                        	<?php } ?>
				                            <header>
								              <h2 class="entryTitle"><?php echo $entry_title; ?></h2>
								              <?php if ($product_title) { ?>
								              <h3><?php echo $product_title; ?></h3>	
								              <?php } ?>
								            </header>
				                        </a>
									</div>
									<?php endwhile; wp_reset_postdata(); ?>
								</div>
							<?php } ?>

						<?php } ?>

						<?php if(!$has_items) { ?>
							<h4>No posts found.</h4>
						<?php } ?>
					</section>
					
				</article>

				<?php
				if($total_pages>$posts_per_page) {
					$total = ceil($total_pages/$posts_per_page); ?>
					<div class="full-width-wrapper clear">
			            <div id="pagination" class="pagination-wrapper pagination clear">
		                    <?php
		                        $pagination = array(
		                            'base' => @add_query_arg('pg','%#%'),
		                            'format' => '?paged=%#%',
		                            'current' => $paged,
		                            'total' => $total,
		                            'prev_text' => __( '&laquo;', 'red_partners' ),
		                            'next_text' => __( '&raquo;', 'red_partners' ),
		                            'type' => 'plain'
		                        );
		                        echo paginate_links($pagination);
		                    ?>
		                </div>
		            </div>
		        <?php } ?>

			<?php endif;  ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
