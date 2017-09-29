<?php
/**
 * Template part for displaying page content in page-recipe-menu-search.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-recipe-menu-search full-width-wrapper"); ?>>
    <?php $filter_terms = null;
    if(isset($_GET['filter'])):
        $filter_terms = explode(",",$_GET['filter']);
    endif;?>
    <aside class="column-1">
        <?php get_template_part( 'template-parts/content', 'terms' );?>
    </aside><!--.column-1-->
    <section class="column-2">
        <header><h1><?php the_title();?></h1></header>
        <?php $args = array(
            'posts_per_page'=>12,
            'paged'=>$paged,
            'post_type'=>array('menu','recipe'),
        );
        $tax_params = array(
            'relation' => 'AND',
        );
        $taxes = array();
        if($filter_terms):
            foreach($filter_terms as $term):
                $split = explode("-",$term);
                if(count($split)===2):
                    $taxes[$split[0]][] = $split[1];    
                endif;
            endforeach;
        endif;
        foreach($taxes as $key=>$value):
            $tax_params[] = array(
                'taxonomy'=>$key,
                'field'=>'term_id',
                'terms'=>$value,
            );
        endforeach;
        if(count($tax_params)>1):
            $args['tax_query'] = $tax_params;
        endif;
        $query = new WP_Query($args);
        if($query->have_posts()):?>
            <div id="container">    
                <?php while($query->have_posts()):$query->the_post();?>
                    <div class="item">
                        <a href="<?php 
                        if(isset($_GET['filter'])):
                            echo add_query_arg('filter',$_GET['filter'],get_the_permalink());
                        else:
                            the_permalink();
                        endif;?>">
                            <?php $image = get_field("search_image");
                            if($image):?>
                                <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                            <?php endif;?>
                            <header><h2><?php the_title();?></h2></header>
                        </a>
                    </div><!--.item-->
                <?php endwhile;?>
            </div><!--#container-->
        <?php pagi_posts_nav($query);
        wp_reset_postdata();
    endif;?>
    </section><!--.column-2-->
</article><!-- #post-## -->
