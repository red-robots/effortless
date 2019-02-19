<?php $wp_query = new WP_Query();
$wp_query->query(array(
    'post_type'=>'testimonial',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
));
if ($wp_query->have_posts())  { ?>
<section class="section testimonials whatpeoplesay">
    <div class="mid_wrapper">
        <h2>What People Are Saying</h2>
        <img class="icon" src="<?php bloginfo('template_url'); ?>/images/icon.png" style="width: 30px;"></img>
        <div class="testimonial-slider">
            <ul class="slides">
                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <li class="testimonial">
                        <div class="inner clear">
                            <?php the_content(); ?>
                            <div class="signature">
                                <?php the_title(); ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</section>
<?php } ?>
    

    