<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index full-width-wrapper"); ?>>
    <?php $image = get_field("row_1_image");
    $tag = get_field("row_1_tag");
    $copy = get_field("row_1_copy");
    $button_text = get_field("row_1_button_text");
    $button_link = get_field("row_1_button_link"); ?>
    <?php if ( $tag || $copy || ($button_link && $button_text)): ?>
        <section class="row-1">
            <?php if ($tag || $copy || ($button_link && $button_text)): ?>
                <div class="outer-wrapper" <?php if($image):
                    echo 'style="background-image: url('. $image['url'].');"';
                endif;?>>
                    <div class="inner-wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                        <?php if ($button_text && $button_link): ?>
                            <div class="button">
                                <?php echo $button_text; ?>
                                <a class="surrounding" href="<?php echo $button_link; ?>"></a>
                            </div>
                        <?php endif;//if for button text and link?>
                    </div><!--.inner-wrapper-->
                </div><!--.outer-wrapper-->
            <?php endif;//if for tag or copy or button?>
        </section><!--.row-1-->
    <?php endif; ?>
    <?php $image = get_field("row_2_image");
    $tag = get_field("row_2_tag");
    $copy = get_field("row_2_copy");
    $button_text = get_field("row_2_button_text");
    $button_link = get_field("row_2_button_link");
    $watermark = get_field("row_2_watermark");?>
    <?php if ($image || $tag || $copy || ($button_link && $button_text)): ?>
        <section class="row-2" <?php if($watermark):
            echo 'style="background-image: url('. $watermark['url'].');"';
        endif;?>>
            <?php if ($image): ?>
                <div class="column-1">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div><!--.column-1-->
            <?php endif;//if for image?>
            <?php if ($tag || $copy || ($button_text && $button_link)): ?>
                <div class="column-2" <?php if($watermark):
                    echo 'style="background-image: url('. $watermark['url'].');"';
                endif;?>>
                    <div class="wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                        <?php if ($button_text && $button_link): ?>
                            <div class="button">
                                <?php echo $button_text; ?>
                                <a class="surrounding" href="<?php echo $button_link; ?>"></a>
                            </div>
                        <?php endif;//if for button text and link?>
                    </div><!--.wrapper-->
                </div><!--.column-2-->
            <?php endif;//if for tag or copy or button text and link?>
        </section><!--.row-2-->
    <?php endif;//if for tag or image or copy or button text and link?>
    <?php $image = get_field("row_3_image");
    $icon = get_field("row_3_icon");
    $tag = get_field("row_3_tag");
    $copy = get_field("row_3_copy");
    $link = get_field("row_3_link"); ?>
    <?php if ($image || $tag || $copy): ?>
        <section class="row-3">
            <?php if ($image): ?>
                <div class="column-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div><!--.column-1-->
            <?php endif;//if for image?>
            <?php if ($tag || $copy): ?>
                <div class="column-2">
                    <div class="wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if($icon):?>
                            <img class="icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                        <?php endif;?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                    </div><!--.wrapper-->
                    <?php if($link):?>
                        <a class="surrounding" href="<?php echo $link;?>"></a>
                    <?php endif;?>
                </div><!--.column-2-->
            <?php endif;//if for tag or copy or button text and link?>
        </section><!--.row-3-->
    <?php endif;//if for tag or image or copy or button text and link?>
    <?php $image = get_field("row_4_image");
    $icon = get_field("row_4_icon");
    $tag = get_field("row_4_tag");
    $copy = get_field("row_4_copy");
    $link = get_field("row_4_link");?>
    <?php if ($image || $tag || $copy): ?>
        <section class="row-4">
            <?php if ($image): ?>
                <div class="column-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div><!--.column-1-->
            <?php endif;//if for image?>
            <?php if ($tag || $copy): ?>
                <div class="column-2">
                    <div class="wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if($icon):?>
                            <img class="icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                        <?php endif;?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                    </div><!--.wrapper-->
                    <?php if($link):?>
                        <a class="surrounding" href="<?php echo $link;?>"></a>
                    <?php endif;?>
                </div><!--.column-2-->
            <?php endif;//if for tag or copy or button text and link?>
        </section><!--.row-4-->
    <?php endif;//if for tag or image or copy or button text and link?>
    <?php $image = get_field("row_5_image");
    $icon = get_field("row_5_icon");
    $tag = get_field("row_5_tag");
    $copy = get_field("row_5_copy");
    $link = get_field("row_5_link"); ?>
    <?php if ($image || $tag || $copy): ?>
        <section class="row-5">
            <?php if ($image): ?>
                <div class="column-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div><!--.column-1-->
            <?php endif;//if for image?>
            <?php if ($tag || $copy): ?>
                <div class="column-2">
                    <div class="wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if($icon):?>
                            <img class="icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                        <?php endif;?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                    </div><!--.wrapper-->
                    <?php if($link):?>
                        <a class="surrounding" href="<?php echo $link;?>"></a>
                    <?php endif;?>
                </div><!--.column-2-->
            <?php endif;//if for tag or copy or button text and link?>
        </section><!--.row-5-->
    <?php endif;//if for tag or image or copy or button text and link?>
</article><!-- #post-## -->
