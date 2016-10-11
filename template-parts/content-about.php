<?php
/**
 * Template part for displaying page content in about.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-about full-width-wrapper"); ?>>
	<?php $image = get_field("template_header_image");
	if($image):?>
		<header class="template-header row-1">
			<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
            <h1><?php echo get_the_title();?></h1>
		</header><!--.template-header-->
	<?php endif;?>
	<section class="row-2 clear-bottom">
		<?php $image = get_field("row_2_image");
		$rows = get_field("row_2_blockquote");
        if($rows) :
            $max = count($rows) - 1;
            if ($max === -1) :
                $blockquote = false;
            else :
                $blockquote = $rows[rand(0, $max)]['quote'];
            endif;
        else :
            $blockquote = false;
        endif;
		if($image):?>
			<div class="image wrapper column-1">
				<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
			</div><!--.column-1-->
		<?php endif;?>
		<?php if(get_the_content()):?>
			<div class="copy column-2">
				<?php the_content();?>
			</div><!--.column-2-->
		<?php endif;?>
		<?php if($blockquote):?>
			<aside class="column-3 copy blockquote">
				<blockquote>
					<?php echo $blockquote;?>
				</blockquote>
			</aside><!--column-3-->
		<?php endif;?>
	</section><!--.row-2-->
</article><!-- #post-## -->
