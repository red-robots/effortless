<?php
/**
 * Template part for displaying page content in page-filter.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
global $bella_url;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-filter full-width-wrapper"); ?>>
    <?php $filter_terms = null;
    if(isset($_GET['filter'])):
        $filter_terms = explode(",",$_GET['filter']);
    endif;?>
    <aside class="column-1">
        <?php $bella_url = get_the_permalink();
        get_template_part( 'template-parts/content', 'terms' );?>
    </aside><!--.column-1-->
    <section class="column-2">
        <header>
            <h1><?php the_title();?></h1>
            <?php get_template_part('template-parts/content', 'search-form');?>
        </header>
        <?php $args = null;
        if(!isset($_GET['search'])):
            $post_type = get_field("post_type");
            if($post_type && !empty($post_type)):
                $args = array(
                    'posts_per_page'=>12,
                    'paged'=>$paged,
                    'post_type'=>$post_type,
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
            endif;
        else: 
            $metakey	= "Harriet's Adages";
            $metavalue	= "WordPress' database interface is like Sunday Morning: Easy.";
    
            $wpdb->query( $wpdb->prepare( 
                "
                    INSERT INTO $wpdb->postmeta
                    ( post_id, meta_key, meta_value )
                    VALUES ( %d, %s, %s )
                ", 
                    10, 
                $metakey, 
                $metavalue 
            ) );
        endif;
        if($args):
            $query = new WP_Query($args);
            if($query->have_posts()):?>
                <div id="container">    
                    <?php while($query->have_posts()):$query->the_post();?>
                        <div class="item js-blocks">
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
            endif;
        endif;?>
    </section><!--.column-2-->
</article><!-- #post-## -->
