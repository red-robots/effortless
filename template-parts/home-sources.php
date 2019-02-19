<?php
$pageID = get_page_id_by_slug('homepage','private');
$section_title_5 = get_field('section_title_5',$pageID);
$button_name_5 = get_field('button_name_5',$pageID);
$button_link_5 = get_field('button_link_5',$pageID);
$args = array(
	'posts_per_page'   => 4,
	'post_type'        => 'sources-resources',
	'post_status'      => 'publish',
);
$sources = new WP_Query($args);
if ( $sources->have_posts() ) {  ?>
<section class="section home-blogs home-sources">
	<div class="mid_wrapper">
		<?php if ($section_title_5) { ?>
		<h2 class="section-title text-center"><?php echo $section_title_5; ?></h2>
		<?php } ?>
		<div class="flex-container row clear">
			<?php while ( $sources->have_posts() ) : $sources->the_post(); 
			$post_id = get_the_ID();  
			// $thumbnail_id = get_post_thumbnail_id();
			// $image = wp_get_attachment_image_src($thumbnail_id,'medium_large'); 
			$title = get_the_title(); 
			$post_title = shortenText($title,40); 
			$search_image = get_field('search_image');
			$source_link = get_field('website_link');
			$site_url = get_site_url();
			$parts_a = parse_url($site_url);
			$the_host = $parts_a['host'];
			$target = '';
			if($source_link) {
				$s_url = $source_link;
				$parts_b = parse_url($s_url);
				$n_the_host = $parts_b['host'];
				if($the_host!=$n_the_host) {
					$target = ' target="_blank"';
				}
			} else {
				$source_link = '#';
			}
			?>
			<div class="col col-4">
				<div class="inside clear">
					<a class="pagelink" href="<?php echo $source_link; ?>" title="<?php echo $title; ?>"<?php echo $target; ?>>
						<?php if($search_image) { ?>
	                    <span class="imagediv" style="background-image:url('<?php echo $search_image["url"]; ?>');">
	                        <img src="<?php echo $search_image["sizes"]["medium_large"]; ?>" alt="<?php echo $search_image["title"]; ?>" />
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

		<?php if($button_name_5 && $button_link_5) { ?>
		<div class="buttondiv clear">
			<a class="btn" href="<?php echo $button_link_5; ?>"><?php echo $button_name_5; ?></a>
		</div>
		<?php } ?>
	</div>
</section>
<?php } ?>
