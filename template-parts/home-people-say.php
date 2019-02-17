<?php $wp_query = new WP_Query();
$wp_query->query(array(
    'post_type'=>'testimonial',
    'posts_per_page' => 1,
    'orderby' => 'rand'
));
if ($wp_query->have_posts())  { ?>
<section class="section testimonials whatpeoplesay">
    <div class="mid_wrapper">
    <h2>What People Are Saying</h2>
    <img class="icon" src="<?php bloginfo('template_url'); ?>/images/icon.png" style="width: 30px;"></img>
    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <div class="testimonial">
            <?php the_content(); ?>
            <div class="signature">
                <?php the_title(); ?>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</section>
<?php } ?>
    

    