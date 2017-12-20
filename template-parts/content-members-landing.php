<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-members-landing full-width-wrapper"); ?>>
    <?php get_template_part("template-parts/content","template-header");?>
    <section class="row-2 copy">
        <?php the_content();?>
    </section><!--.row-2-->
    <section class="row-3 clear-bottom">
        <?php $menus_recipes_text = get_field("menus_recipes_text");
        $sources_resources_text = get_field("sources_resources_text");
        $tips_quips_text = get_field("tips_quips_text");
        $style_points_text = get_field("style_points_text");
        $menus_recipes_image = get_field("menus_recipes_image");
        $sources_resources_image = get_field("sources_resources_image");
        $tips_quips_image = get_field("tips_quips_image");
        $style_points_image = get_field("style_points_image");?>
        <?php if($menus_recipes_image&&$menus_recipes_text):
            if($menus_recipes_image):?>
                <div class="item">
                    <a href="<?php echo get_the_permalink(561);?>">
                        <header class="top"><h2><?php echo $menus_recipes_text;?></h2></header>
                        <img src="<?php echo $menus_recipes_image['sizes']['large'];?>" alt="<?php echo $menus_recipes_image['alt'];?>">
                    </a>          
                </div><!--.item-->
            <?php endif;
        endif;?>
        <?php if($style_points_image&&$style_points_text):
            if($style_points_image):?>
                <div class="item">
                    <a href="<?php echo get_the_permalink(581);?>">
                        <header class="top"><h2><?php echo $style_points_text;?></h2></header>
                        <img src="<?php echo $style_points_image['sizes']['large'];?>" alt="<?php echo $style_points_image['alt'];?>">
                    </a>    
                </div><!--.item-->
            <?php endif;
        endif;?>
        <?php if($tips_quips_image&&$tips_quips_text):
            if($tips_quips_image):?>
                <div class="item">
                    <a href="<?php echo get_the_permalink(579);?>">
                        <header class="top"><h2><?php echo $tips_quips_text;?></h2></header>
                        <img src="<?php echo $tips_quips_image['sizes']['large'];?>" alt="<?php echo $tips_quips_image['alt'];?>">
                    </a>    
                </div><!--.item-->
            <?php endif;
        endif;?>
        <?php if($sources_resources_image&&$sources_resources_text):
            if($sources_resources_image):?>
                <div class="item">
                    <a href="<?php echo get_the_permalink(583);?>">
                        <header class="top"><h2><?php echo $sources_resources_text;?></h2></header>
                        <img src="<?php echo $sources_resources_image['sizes']['large'];?>" alt="<?php echo $sources_resources_image['alt'];?>">
                    </a>          
                </div><!--.item-->
            <?php endif;
        endif;?>
    </section><!--.row-3-->
</article><!-- #post-## -->
