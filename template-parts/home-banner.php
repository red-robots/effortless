<?php 
$images = get_field("row_1_images"); 
?>
<?php if($images) { ?>
<section id="home_slideshow"  class="row-1 bannerSlides clear">
	<ul class="slideshow-wrapper slides">
		<?php foreach($images as $img) { 
		$id = $img['ID'];
		$title = $img['title'];
		$imageSRC = $img['url'];
		$description = $img['description'];
		$pagelink = get_field('page_link',$id);
		$caption_wrap_start = '<div class="caption">';
		$caption_wrap_end = '</div>';
		if($pagelink) {
			$caption_wrap_start = '<a class="caption has-link" href="'.$pagelink.'">';
			$caption_wrap_end = '</a>';
		}
		?>
		<li class="slide-item" style="background-image:url('<?php echo $imageSRC; ?>');">
			<?php if ($title && $description) { ?>
				<?php echo $caption_wrap_start; ?>
				<figcaption class="inner-text">
					<span class="textwrap">
						<span class="text">
						<?php if ($title) { ?>
							<h3 class="b-title"><?php echo $title; ?></h3>
							<span class="icon"><i></i></span>
						<?php } ?>
						<?php if ($description) { ?>
							<span class="b-text"><?php echo $description; ?></span>
						<?php } ?>
						</span>
					</span>
				</figcaption>	
				<?php echo $caption_wrap_end; ?>
			<?php } ?>
		</li>
		<?php } ?>
	</ul>
</section>
<?php } ?>