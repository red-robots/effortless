<?php
$pageID = get_page_id_by_slug('homepage','private');
$section_title_4 = get_field('section_title_4',$pageID);
$button_name_4 = get_field('button_name_4',$pageID);
$button_link_4 = get_field('button_link_4',$pageID);
$args = array(
	'posts_per_page'   => 4,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
);
$blogs = new WP_Query($args);
if ( $blogs->have_posts() ) {  ?>
<section class="section home-blogs">
	<div class="mid_wrapper">
		<?php if ($section_title_4) { ?>
		<h2 class="section-title text-center"><?php echo $section_title_4; ?></h2>
		<?php } ?>
		<div class="flex-container row clear">
			<?php while ( $blogs->have_posts() ) : $blogs->the_post(); 
			$post_id = get_the_ID();  
			$thumbnail_id = get_post_thumbnail_id();
			$image = wp_get_attachment_image_src($thumbnail_id,'medium_large'); 
			$title = get_the_title(); 
			$post_title = shortenText($title,40); ?>
			<div class="col col-4">
				<div class="inside clear">
					<a class="pagelink" href="<?php the_permalink(); ?>" title="<?php echo $title; ?>">
						<?php if($image) { ?>
	                    <span class="imagediv" style="background-image:url('<?php echo $image[0]; ?>');">
	                        <?php the_post_thumbnail('medium_large');  ?>
	                    </span>
	                    <?php } else { ?>
	                    	<span class="imagediv" style="background-image:url('<?php echo get_bloginfo('template_url')?>/images/no-image.gif');"></span>
	                    <?php } ?>
						<span class="description clear js-blocks">
							<h3 class="title thin"><?php echo $post_title; ?></h3>
						</span>
					</a>
				</div>
			</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>

		<?php if($button_name_4 && $button_link_4) { ?>
		<div class="buttondiv clear">
			<a class="btn" href="<?php echo $button_link_4; ?>"><?php echo $button_name_4; ?></a>
		</div>
		<?php } ?>
	</div>
</section>
<?php } ?>
