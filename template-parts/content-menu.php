<?php
/**
 * Template part for displaying page content in single-menu.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
global $bella_url;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-menu full-width-wrapper"); ?>>
    <?php $post = get_post(549);
    setup_postdata($post);
    $description_title = get_field("description_title");
    $gameplan_title = get_field("gameplan_title");
    $shopping_list_title = get_field("shopping_list_title");
    $notes_title = get_field("notes_title");
    wp_reset_postdata();?>
    <aside class="column-1">
        <?php $bella_url = get_the_permalink(561);
        get_template_part( 'template-parts/content', 'terms' );?>
    </aside><!--.column-1-->
    <section class="column-2">
        <header>
            <h1><?php the_title();?></h1>
            <?php $serving_size = get_field("serving_size");
            if($serving_size):?>
                <div class="serving-size">
                    <?php echo $serving_size;?>
                </div><!--.serving-size-->
            <?php endif;?>
        </header>
        <?php $recipes = get_field("recipes");
        $description = get_field("description");
        $gameplan = get_field("gameplan");
        $shopping_list = get_field("shopping_list");
        $notes = get_field("notes");
        if($recipes):?>
            <div class="recipes copy">
                <?php foreach($recipes as $row):
                    if(isset($row['recipe'])):;?>
                        <div class="recipe">
                            <a href="<?php echo get_the_permalink($row['recipe']->ID);?>">
                                <?php echo $row['recipe']->post_title;?>
                            </a>
                        </div><!--.recipe-->
                    <?php endif;
                endforeach;?>
            </div><!--.recipes-->
        <?php endif;
        if($description):?>
            <?php if($description_title):?>
                <header><h2><?php echo $description_title;?></h2></header>
            <?php endif;?>
            <div class="description copy">
                <?php echo $description;?>    
            </div><!--.description-->
        <?php endif;
        if($gameplan):?>
            <?php if($gameplan_title):?>
                <header><h2 class="gameplan"><?php echo $gameplan_title;?></h2></header>
            <?php endif;?>
            <div class="gameplan copy">
                <?php foreach($gameplan as $row):
                    if(!empty($row['time'])):?>
                        <div class="unit">
                            <?php if($row['day']):?>
                                <header><h3><?php echo $row['day'];?></h3></header>
                            <?php endif;
                            foreach($row['time'] as $sub_row):?>
                                <?php if($sub_row['time']):?>
                                    <header><h3 class="time"><?php echo $sub_row['time'];?></h3></header>
                                <?php endif;?>
                                <?php if($sub_row['list']):?>
                                    <?php echo $sub_row['list'];?>
                                <?php endif;?>
                            <?php endforeach;?>
                        </div><!--.unit-->
                    <?php endif;
                endforeach;?>
            </div><!--.gameplan-->
        <?php endif;
        if($shopping_list):?>
            <?php if($shopping_list_title):?>
                <header><h2 class="shopping-list"><?php echo $shopping_list_title;?></h2></header>
            <?php endif;?>
            <div class="shopping-list copy">
                <?php foreach($shopping_list as $row):
                    if($row['list']):?>
                        <div class="unit">
                            <?php if($row['header']):?>
                                <header><h3><?php echo $row['header'];?></h3></header>
                            <?php endif;?>
                            <?php echo $row['list'];?>
                        </div><!--.unit-->
                    <?php endif;
                endforeach;?>
            </div><!--.shopping-list-->
        <?php endif;?>
    </section><!--.column-2-->
</article><!-- #post-## -->
