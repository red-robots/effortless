<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-contact full-width-wrapper"); ?>>
    <?php $image = get_field("template_header_image");
    if ($image):?>
        <header class="template-header row-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            <h1><?php echo get_the_title(); ?></h1>
        </header><!--.template-header-->
    <?php endif; ?>
    <section class="row-2 clear-bottom">
        <?php $watermark = get_field("row_2_watermark");
        $rows = get_field("row_2_blockquote");
        if ($rows) :
            $max = count($rows) - 1;
            if ($max === -1) :
                $blockquote = false;
            else :
                $blockquote = $rows[rand(0, $max)]['quote'];
            endif;
        else :
            $blockquote = false;
        endif;?>
        <?php if (get_the_content()): ?>
            <div class="column-1">
                <div class="wrapper copy">
                    <?php the_content(); ?>
                </div><!--.wrapper-->
            </div><!--.column-2-->
        <?php endif; ?>
        <?php if ($blockquote): ?>
            <aside class="column-2 blockquote">
                <div class="outer-wrapper">
                    <div class="inner-wrapper" <?php if($watermark) echo 'style="background-image: url('. $watermark['url'].');"';?>>
                        <?php if ($blockquote): ?>
                            <blockquote class="copy">
                                <?php echo $blockquote; ?>
                            </blockquote>
                        <?php endif; ?>
                    </div><!--.inner-wrapper-->
                </div><!--.outer-wrapper-->
            </aside><!--column-3-->
        <?php endif; ?>
    </section><!--.row-2-->
</article><!-- #post-## -->
