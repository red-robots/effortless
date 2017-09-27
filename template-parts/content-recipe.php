<?php
/**
 * Template part for displaying page content in single-recipe.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-recipe full-width-wrapper"); ?>>
    <?php $filter_terms = null;
    if(isset($_GET['filter'])):
        $filter_terms = explode(",",$_GET['filter']);
    endif;
    $post = get_post(27);
    setup_postdata($post);
    $ingredients_title = get_field("ingredients_title");
    $filter_title = get_field("filter_title");
    $seasons_title = get_field("seasons_title");
    $year_title = get_field("year_title");
    $other_title = get_field("other_title");
    $directions_title = get_field("directions_title");
    $notes_title = get_field("notes_title");
    $quote_title = get_field("quote_title");
    wp_reset_postdata();?>
    <aside class="column-1">
        <?php if($filter_title):?>
            <header><h2><?php echo $filter_title;?></h2></header>
        <?php endif;?>
        <?php $terms = get_terms(array(
            'taxonomy'=>'from',
        ));
        if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
            <div class="from-terms terms">
                <?php foreach($terms as $term):?>
                    <div class="filter-term term value-<?php echo strtolower(preg_replace("/[^0-9a-zA-Z]/","",$term->name));?>">
                        <div class="name">
                            <?php echo $term->name;?>      
                        </div><!--.name-->
                        <div class="checkbox">
                            <?php if($filter_terms&&in_array(strtolower($term->name),$filter_terms)):?>
                                <i class="fa fa-check"></i>
                            <?php endif;?>
                        </div><!--.checkbox-->
                    </div><!--.filter-term-->
                <?php endforeach;?>
            </div><!--.from-terms-->
        <?php endif;?>
        <?php $terms = get_terms(array(
            'taxonomy'=>'season',
        ));
        if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
            <div class="terms-wrapper">
                <?php if($seasons_title):?>
                    <header>
                        <h2><?php echo $seasons_title;?></h2>
                        <i class="fa fa-chevron-down"></i>
                    </header>
                <?php endif;?>
                <div class="season-terms terms">
                    <?php foreach($terms as $term):?>
                        <div class="filter-term term value-<?php echo strtolower(preg_replace("/[^0-9a-zA-Z]/","",$term->name));?>">
                            <div class="name">
                                <?php echo $term->name;?>      
                            </div><!--.name-->
                            <div class="checkbox">
                                <?php if($filter_terms&&in_array(strtolower($term->name),$filter_terms)):?>
                                    <i class="fa fa-check"></i>
                                <?php endif;?>
                            </div><!--.checkbox-->
                        </div><!--.filter-term-->
                    <?php endforeach;?>
                </div><!--.from-terms-->
           </div><!--.terms-wrapper-->
        <?php endif;?>
        <?php $terms = get_terms(array(
            'taxonomy'=>'year',
        ));
        if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
            <div class="terms-wrapper">
                <?php if($year_title):?>
                    <header>
                        <h2><?php echo $year_title;?></h2>
                        <i class="fa fa-chevron-down"></i>
                    </header>
                <?php endif;?>
                <div class="year-terms terms">
                    <?php foreach($terms as $term):?>
                        <div class="filter-term term value-<?php echo strtolower(preg_replace("/[^0-9a-zA-Z]/","",$term->name));?>">
                            <div class="name">
                                <?php echo $term->name;?>      
                            </div><!--.name-->
                            <div class="checkbox">
                                <?php if($filter_terms&&in_array(strtolower($term->name),$filter_terms)):?>
                                    <i class="fa fa-check"></i>
                                <?php endif;?>
                            </div><!--.checkbox-->
                        </div><!--.filter-term-->
                    <?php endforeach;?>
                </div><!--.from-terms-->
        </div><!--.terms-wrapper-->
        <?php endif;?>
        <?php $terms = get_terms(array(
            'taxonomy'=>'other',
        ));
        if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):?>
            <div class="terms-wrapper">
                <?php if($other_title):?>
                    <header>
                        <h2><?php echo $other_title;?></h2>
                        <i class="fa fa-chevron-down"></i>
                    </header>
                <?php endif;?>
                <div class="other-terms terms">
                    <?php foreach($terms as $term):?>
                        <div class="filter-term term value-<?php echo strtolower(preg_replace("/[^0-9a-zA-Z]/","",$term->name));?>">
                            <div class="name">
                                <?php echo $term->name;?>      
                            </div><!--.name-->
                            <div class="checkbox">
                                <?php if($filter_terms&&in_array(strtolower($term->name),$filter_terms)):?>
                                    <i class="fa fa-check"></i>
                                <?php endif;?>
                            </div><!--.checkbox-->
                        </div><!--.filter-term-->
                    <?php endforeach;?>
                </div><!--.from-terms-->
        </div><!--.terms-wrapper-->
        <?php endif;?>
    </aside><!--.column-1-->
    <section class="column-2">
        <header><h1><?php the_title();?></h1></header>
        <?php $notes = get_field("notes");
        $directions = get_field("instructions");
        $quote = get_field("quote"); 
        if($directions):?>
            <?php if($directions_title):?>
                    <header><h2><?php echo $directions_title;?></h2></header>
                <?php endif;?>
            <div class="directions copy">
                <?php echo $directions;?>    
            </div><!--.directions-->
        <?php endif;?>
        <?php if($notes):?>
            <?php if($notes_title):?>
                    <header><h2><?php echo $notes_title;?></h2></header>
                <?php endif;?>
            <div class="notes copy">
                <?php echo $notes;?>    
            </div><!--.notes-->
        <?php endif;?>
        <?php if($quote):?>
            <?php if($quote_title):?>
                    <header><h2><?php echo $quote_title;?></h2></header>
                <?php endif;?>
            <div class="quote copy">
                <?php echo $quote;?>    
            </div><!--.quote-->
        <?php endif;?>
    </section><!--.column-2-->
    <aside class="column-3">
        <?php //insert search
        $ingredients = get_field("ingredients");
        if($ingredients):?>
            <?php if($ingredients_title):?>
                <header></h2><?php echo $ingredients_title;?></h2></header>
            <?php endif;?>
            <div class="ingredients">
                <?php foreach($ingredients as $row):?>
                    <div class="ingredient">
                        <?php echo $row['ingredient'];?>
                    </div><!--.ingredient-->
                <?php endforeach;?>
            </div><!--.ingredients-->
        <?php endif;?>
    </aside><!--.column-3-->
</article><!-- #post-## -->
