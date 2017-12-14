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
    <section class="row-2 clear-bottom">
        <?php $menus_recipes_text = get_field("menus_recipes_text");
        $sources_resources_text = get_field("sources_resources_text");
        $tips_quips_text = get_field("tips_quips_text");
        $style_points_text = get_field("style_points_text");
        $menus_recipes_post = get_field("menus_recipes_post");
        $sources_resources_post = get_field("sources_resources_post");
        $tips_quips_post = get_field("tips_quips_post");
        $style_points_post = get_field("style_points_post");?>
        <?php if($menus_recipes_post&&$menus_recipes_text):
            $image = get_field("search_image", $menus_recipes_post->ID);
            if($image):?>
                <div class="item">
                    <a href="<?php echo get_the_permalink(561);?>">
                        <header class="top"><h2><?php echo $menus_recipes_text;?></h2></header>
                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                    </a>
                    <header>
                        <a href="<?php echo get_the_permalink($menus_recipes_post->ID);?>">
                            <h3><?php echo $menus_recipes_post->post_title;?></h3>
                        </a>    
                    </header>                
                </div><!--.item-->
            <?php endif;
        endif;?>
        <?php if($sources_resources_post&&$sources_resources_text):
            $image = get_field("search_image", $sources_resources_post->ID);
            $title = get_field("product_title", $sources_resources_post->ID);
            $website_link = get_field("website_link", $sources_resources_post->ID);
            $pdf_link = get_field("pdf_link", $sources_resources_post->ID);
            if($image):?>
                <div class="item">
                    <a href="<?php echo get_the_permalink(583);?>">
                        <header class="top"><h2><?php echo $sources_resources_text;?></h2></header>
                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                    </a>    
                    <header>
                        <?php if($pdf_link||$website_link):?>
                            <a href="<?php if($pdf_link):
                                    echo $pdf_link['url'];
                                else:
                                    echo $website_link;
                                endif;?>" target="_blank">
                        <?php endif;?>
                            <h3><?php echo $title;?></h3>
                        <?php if($pdf_link||$website_link):?>
                            </a>
                        <?php endif;?>
                    </header>                
                </div><!--.item-->
            <?php endif;
        endif;?>
        <?php if($tips_quips_post&&$tips_quips_text):
            $image = get_field("search_image", $tips_quips_post->ID);
            if($image):?>
                <div class="item">
                    <a href="<?php echo get_the_permalink(579);?>">
                        <header class="top"><h2><?php echo $tips_quips_text;?></h2></header>
                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                    </a>    
                    <header>
                        <a href="<?php echo get_the_permalink($tips_quips_post->ID);?>">
                            <h3><?php echo $tips_quips_post->post_title;?></h3>
                        </a>    
                    </header>                
                </div><!--.item-->
            <?php endif;
        endif;?>
        <?php if($style_points_post&&$style_points_text):
            $image = get_field("search_image", $style_points_post->ID);
            if($image):?>
                <div class="item">
                    <a href="<?php echo get_the_permalink(581);?>">
                        <header class="top"><h2><?php echo $style_points_text;?></h2></header>
                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                    </a>    
                    <header>
                        <a href="<?php echo get_the_permalink($style_points_post->ID);?>">
                            <h3><?php echo $style_points_post->post_title;?></h3>
                        </a>    
                    </header>                
                </div><!--.item-->
            <?php endif;
        endif;?>
    </section><!--.row-2-->
</article><!-- #post-## -->
