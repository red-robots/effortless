<?php
/**
 * Template part for displaying page content in about.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-about"); ?>>
	<?php $image = get_field("template_header_image");
	if($image):?>
		<header class="template-header row-1">
			<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
			<h1><?php echo get_the_title();?></h1>
		</header><!--.template-header-->
	<?php endif;?>
    <section class="row-2">
        <?php $image = get_field("step_1_image");
        $step_image = get_field("step_1_step_image");
        $title = get_field("step_1_title");
        $tag = get_field("step_1_tag");
        $copy = get_field("step_1_copy");?>
        <?php if($step_image||$title||$tag||$copy):?>
            <div class="column-1">
                <?php if($step_image||$title||$tag):?>
                    <div class="row-1">
                        <?php if($step_image):?>
                            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                        <?php endif;//if for image?>
                        <?php if($title):?>
                            <h2><?php echo $title;?></h2>
                        <?php endif;//if for title?>
                        <?php if($tag):?>
                            <span class="tag"><?php echo $tag;?></span>
                        <?php endif;//if for tag?>
                    </div><!--.row-1-->
                <?php endif;//if for step image or title or tag?>
                <?php if($copy):?>
                    <div class="row-2 copy">
                        <?php echo $copy;?>
                    </div><!--.row-2-->
                <?php endif;//if for copy?>
            </div><!--.column-1-->
        <?php endif;//if for step image or title or tag or copy?>
        <?php if($image):?>
            <div class="column-2">
                <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
            </div><!--.column-2-->
        <?php endif;//if for image?>
    </section><!--.row-2-->
    <section class="row-3">
        <?php $image = get_field("step_2_image");
        $step_image = get_field("step_2_step_image");
        $title = get_field("step_2_title");
        $tag = get_field("step_2_tag");
        $copy = get_field("step_2_copy");?>
        <?php if($step_image||$title||$tag||$copy):?>
            <div class="column-1">
                <?php if($step_image||$title||$tag):?>
                    <div class="row-1">
                        <?php if($step_image):?>
                            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                        <?php endif;//if for image?>
                        <?php if($title):?>
                            <h2><?php echo $title;?></h2>
                        <?php endif;//if for title?>
                        <?php if($tag):?>
                            <span class="tag"><?php echo $tag;?></span>
                        <?php endif;//if for tag?>
                    </div><!--.row-1-->
                <?php endif;//if for step image or title or tag?>
                <?php if($copy):?>
                    <div class="row-2 copy">
                        <?php echo $copy;?>
                    </div><!--.row-2-->
                <?php endif;//if for copy?>
            </div><!--.column-1-->
        <?php endif;//if for step image or title or tag or copy?>
        <?php if($image):?>
            <div class="column-2">
                <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
            </div><!--.column-2-->
        <?php endif;//if for image?>
    </section><!--.row-3-->
    <section class="row-4">
        <?php $image = get_field("step_3_image");
        $step_image = get_field("step_3_step_image");
        $title = get_field("step_3_title");
        $tag = get_field("step_3_tag");
        $copy = get_field("step_3_copy");?>
        <?php if($step_image||$title||$tag||$copy):?>
            <div class="column-1">
                <?php if($step_image||$title||$tag):?>
                    <div class="row-1">
                        <?php if($step_image):?>
                            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                        <?php endif;//if for image?>
                        <?php if($title):?>
                            <h2><?php echo $title;?></h2>
                        <?php endif;//if for title?>
                        <?php if($tag):?>
                            <span class="tag"><?php echo $tag;?></span>
                        <?php endif;//if for tag?>
                    </div><!--.row-1-->
                <?php endif;//if for step image or title or tag?>
                <?php if($copy):?>
                    <div class="row-2 copy">
                        <?php echo $copy;?>
                    </div><!--.row-2-->
                <?php endif;//if for copy?>
            </div><!--.column-1-->
        <?php endif;//if for step image or title or tag or copy?>
        <?php if($image):?>
            <div class="column-2">
                <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
            </div><!--.column-2-->
        <?php endif;//if for image?>
    </section><!--.row-4-->
</article><!-- #post-## -->
