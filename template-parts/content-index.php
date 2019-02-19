<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
$popup_active = get_field("popup_active");
if($popup_active && strcmp($popup_active,'yes')===0):?>
    <div style="display: none;">
        <div id="eff-embed-signup">
            <?php $popup_text = get_field("popup_text");
            if($popup_text):?>
                <div class="copy">
                    <?php echo $popup_text;?>
                </div>
            <?php endif;
            $form_post = get_post(474);
            if($form_post):?>
                <div class="popup-form">
                    <iframe scrolling="no" class="dynamic-embed" src="<?php echo get_the_permalink($form_post);?>"></iframe>
                </div>
            <?php endif;?>
        </div>
    </div>
<?php endif;?>
    

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index full-width-div clear"); ?>>

    <?php get_template_part( 'template-parts/home-banner' ); ?>
    <?php get_template_part( 'template-parts/home-three-boxes' ); ?>
    <div class="subscribe-section clear">
        <div class="mid_wrapper">
            <?php
                $sub_title1 = get_field('title_1');
                $sub_title2 = get_field('title_2');
            ?>
            <div class="top-text">
                <?php if($sub_title1) { ?>
                <p class="subsc-title1"><?php echo $sub_title1; ?></p>
                <?php } ?>
                <?php if($sub_title2) { ?>
                <p class="subsc-title2"><?php echo $sub_title2; ?></p>
                <?php } ?>
                <div class="floral-icon"><span></span></div>
            </div>

            <div id="mc_embed_signup" class="form-wrapper clear">
                <form action="https://myeffortlessentertaining.us14.list-manage.com/subscribe/post?u=959a4d7fabeafa2e758654125&amp;id=20b4e3c60e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div class="mc-field-group">
                        <input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="Name">
                    </div>
                    <div class="mc-field-group">
                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email">
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_959a4d7fabeafa2e758654125_20b4e3c60e" tabindex="-1" value=""></div>
                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                </form>
            </div>
        </div>
    </div>
    <?php get_template_part( 'template-parts/home-blogs' ); ?>
    <?php get_template_part( 'template-parts/home-sources' ); ?>
    <?php get_template_part( 'template-parts/home-testimonial' ); ?>
    <?php /* INSTAGRAM = see footer.php */ ?>
    <div id="instagram_feeds" class="instagram_feeds clear"></div>

</article><!-- #post-## -->






