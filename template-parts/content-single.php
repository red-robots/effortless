<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-single full-width-wrapper"); ?>>
    <?php get_template_part("template-parts/content","template-header");?>
    <section class="row-2 clear-bottom">
        <?php if (get_the_content()): ?>
            <div class="column-1">
                <div class="wrapper copy">
                    <?php the_content(); ?>
                </div><!--.wrapper-->
            </div><!--.column-2-->
        <?php endif; ?>
        <?php $watermark = get_field("row_2_watermark");
        $terms = get_the_terms($post,'category');
        $is_dish = false;
        if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):
            foreach($terms as $term):
                if($term->term_id==353):
                    $is_dish = true;
                    break;
                endif;
            endforeach;
        endif;
        if(!$is_dish):?>
            <aside class="column-2 blockquote">
                <div class="outer-wrapper">
                    <div class="inner-wrapper" <?php if($watermark) echo 'style="background-image: url('. $watermark['url'].');"';?>>
                        <div class="list copy">
                            <ul>
                                <?php wp_get_archives(array('type'=>'monthly'));?>
                            </ul>
                        </div>
                    </div><!--.inner-wrapper-->
                </div><!--.outer-wrapper-->
            </aside><!--column-3-->
        <?php endif;?>
    </section><!--.row-2-->
</article><!-- #post-## -->
