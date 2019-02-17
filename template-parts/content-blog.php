<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-blog blogPosts full-width-wrapper"); ?>>
    <?php get_template_part("template-parts/content","template-header");?>
    <section class="row-2 clear-bottom">

        <?php 
        $args2 = array(
            'post_type'=>'post',
            'posts_per_page'=>1,
            'category__not_in'=>array(353)
        );
        $recent_post = new WP_Query($args2);
        ?>


        <?php $args = array(
            'post_type'=>'post',
            'posts_per_page'=>10,
            'paged'=>$paged,
            'category__not_in'=>array(353)
        );
        $pagenum = ($paged) ? $paged : 1;
        $current_posts = array();
        $recent_post_id = 0;
        $query = new WP_Query($args);
        if ($query->have_posts()): ?>
            <div class="column-1 home-blogs">
                <div class="wrapper clear">

                    <?php if($pagenum==1) { ?>
                    <?php while($recent_post->have_posts()): $recent_post->the_post(); 
                        $recent_post_id = get_the_ID(); ?>
                        <div id="post_<?php echo $recent_post_id; ?>" class="recent-post-item">
                            <?php if(has_post_thumbnail()) { ?>
                                <div class="postcol post-image"><?php the_post_thumbnail('full');?></div>
                            <?php } ?>
                            <div class="postcol textcontent <?php echo (has_post_thumbnail()) ? 'has-image':'no-image';?>">
                                <div class="inside clear">
                                    <div class="date"><?php the_date('F d, Y');?></div>
                                    <h2 class="maintitle"><?php the_title();?></h2>
                                    <div class="excerpt"><?php the_excerpt();?></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <?php } ?>

                    <div class="row-posts flex-container clear">
                    <?php while($query->have_posts()): $query->the_post(); $current_posts[] = get_the_ID();?>
                        <?php
                        $post_id = get_the_ID();  
                        $thumbnail_id = get_post_thumbnail_id();
                        $image = wp_get_attachment_image_src($thumbnail_id,'medium_large'); 
                        $title = get_the_title(); 
                        $post_title = shortenText($title,40);
                        if($post_id!==$recent_post_id) { ?>
                            <div class="col col-3">
                                <div class="inside clear">
                                    <a class="pagelink" href="<?php the_permalink(); ?>" title="<?php echo $title; ?>">
                                        <?php if($image) { ?>
                                        <span class="imagediv" style="background-image:url('<?php echo $image[0]; ?>');">
                                            <?php the_post_thumbnail('medium_large');  ?>
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
                        <?php } ?>
                    <?php endwhile;?>
                    </div><!--.row-posts-->

                </div><!--.wrapper-->
            </div><!--.column-1-->
            <?php wp_reset_postdata();
        endif; ?>
        <?php $watermark = get_field("row_2_watermark",15);?>
        <aside class="column-2 blockquote">
            <div class="outer-wrapper">
                <div class="inner-wrapper" <?php if($watermark) echo 'style="background-image: url('. $watermark['url'].');"';?>>
                    <?php $signuptext = get_field("signup_header_text_blog","option");?>
                    <!-- Begin MailChimp Signup Form -->
                    <div id="mc_embed_signup">
                        <form action="//myeffortlessentertaing.us14.list-manage.com/subscribe/post?u=959a4d7fabeafa2e758654125&amp;id=20b4e3c60e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                                <?php if($signuptext) echo $signuptext;?>
                                <div class="mc-field-group">
                                    <input type="email" value="" placeholder="Email" name="EMAIL" class="required email" id="mce-EMAIL">
                                </div>
                                <div class="mc-field-group">
                                    <input type="text" value="" placeholder="Name" name="FNAME" class="" id="mce-FNAME">
                                </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_959a4d7fabeafa2e758654125_20b4e3c60e" tabindex="-1" value=""></div>
                                <input type="submit" value="Submit" name="subscribe" id="mc-embedded-subscribe">
                            </div>
                        </form>
                    </div>
                    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                    <!--End mc_embed_signup-->
                    <?php $args = array(
                        'post_type'=>'post',
                        'posts_per_page'=>-1,
                        'post__not_in'=>$current_posts,
                        'category__not_in'=>array(353)
                    );
                    $side_query = new WP_Query($args);
                    if ($side_query->have_posts()): ?>
                        <?php $archive_title = get_field("archive_title");?>
                        <div class="list copy">
                            <?php if($archive_title):?>
                                <header><h2><?php echo $archive_title;?></h2></header>
                            <?php endif;?>    
                            <ul>
                                <?php while($side_query->have_posts()): $side_query->the_post();?>
                                    <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                        <?php wp_reset_postdata();
                    endif;?>
                </div><!--.inner-wrapper-->
            </div><!--.outer-wrapper-->
        </aside><!--column-3-->
    </section><!--.row-2-->
    <div class="row-3">
        <?php pagi_posts_nav_blog($query);?>
    </div><!--.row-3-->
</article><!-- #post-## -->
