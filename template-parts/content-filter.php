<?php
/**
 * Template part for displaying page content in page-filter.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
global $bella_url;
global $post_type;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-filter full-width-wrapper"); ?>>
    <?php $filter_terms = null;
    if(isset($_GET['filter'])):
        $filter_terms = explode(",",$_GET['filter']);
    endif;?>
    <aside class="column-1">
        <?php $bella_url = get_the_permalink();
        get_template_part( 'template-parts/content', 'terms-hidden' );?>
    </aside><!--.column-1-->
    <section class="column-2">
        <header>
            <h1><?php the_title();?></h1>
            <?php get_template_part('template-parts/content', 'search-form');?>
        </header>
        <?php $args = null;
        $post_type = get_field("post_type");
        if($post_type && !empty($post_type)):
            if(!isset($_POST['search'])):
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
            else: 
                $prepare_args = $post_type;
                $prepare_string = "SELECT ID, post_title FROM $wpdb->posts WHERE post_title LIKE '%%%s%%' AND (";
                $max = count($post_type);
                for($i = 1;$i<=$max;$i++):
                    $prepare_string .= " post_type = %s";
                    if($i<$max):
                        $prepare_string.=" OR ";
                    else:
                        $prepare_string.=" ";
                    endif;
                endfor;
                $prepare_string .= ")";
                array_unshift($prepare_args,$_POST['search']);
                array_unshift($prepare_args,$prepare_string);
                $results = $wpdb->get_results(  call_user_func_array(array($wpdb, "prepare"),$prepare_args));
                if($results):
                    $in = array();
                    foreach($results as $result):
                        $in[] = $result->ID;
                    endforeach;
                    $args = array(
                        'posts_per_page'=>12,
                        'paged'=>$paged,
                        'post_type'=>$post_type,
                        'post__in'=>$in
                    );
                endif;
            endif;
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
