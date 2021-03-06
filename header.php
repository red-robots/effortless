<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
if( is_archive() ) {
    $queried = get_queried_object();
    /* FILTER PAGE */    
    $queried = get_queried_object();
    $current_taxonomy = ( isset($queried->taxonomy) && $queried->taxonomy ) ? $queried->taxonomy : '';
    $term_slug = ( isset($queried->slug) && $queried->slug ) ? $queried->slug : '';
    $taxonomies = cpt_taxonomies();

    if( in_array($current_taxonomy, $taxonomies) ) {
        $page_url = get_archive_url_by_field('post_type',$term_slug,$current_taxonomy);
        if($page_url) {
            wp_redirect( $page_url );
            exit;
        }
    }
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="https://use.typekit.net/vww2unj.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<?php $ga = get_field("google_analytics","option");
if($ga):
    echo $ga;
endif;?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site clear">

    <?php get_template_part( 'template-parts/navigation-misc'); ?>

	<header id="masthead" class="site-header clear-bottom" role="banner">
        <div class="row-1 the-top-navigation">
            <div class="wrapper full-width-wrapper clear-bottom">
                <a class="burgerMenu" href="#"><span></span></a>
                <div id="cart-icon" class="cart">
                    <a href="<?php echo wc_get_cart_url();?>">
                        <i class="fa fa-shopping-cart"></i>
                        <div class="num"></div><!--.num-->
                    </a>
                </div><!--.cart#cart-icon-->
                <?php $members_link = get_field("members_link","option");
                if($members_link):?>
                    <div class="members button">
                        <a href="<?php echo $members_link;?>" class="surrounding">
                            <i class="fa fa-user"></i>
                        </a>
                    </div>
                <?php endif;?>
                <?php $account_link = get_field("account_link","option");
                $account_text = get_field("account_text","option");
                if($account_text&&$account_link):?>
                    <div class="account button">
                        <a href="<?php echo $account_link;?>" class="surrounding">
                            <?php echo $account_text; ?>
                        </a>
                    </div>
                <?php endif;?>
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav><!-- #site-navigation -->
            </div><!--.wrapper-->
        </div><!--.row-1-->
        <div class="row-2">
            <div class="wrapper full-width-wrapper">
                <?php $logo = get_field("logo","option");
                if($logo):?>
                    <div class="logo">
                        <a href="<?php echo get_bloginfo("url");?>" class="surrounding">
                            <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
                        </a>
                    </div><!--.logo-->
                <?php endif;?>
            </div><!-- wrapper -->
        </div><!--.row-2-->
        <div class="row-3">
            <div class="wrapper full-width-wrapper">
                <?php $mobilebuttontext = get_field("mobile_button_text","option");?>
                <?php if($mobilebuttontext):?>
                    <div class="button">
                        <?php echo $mobilebuttontext;?>
                    </div><!--.button-->
                <?php endif;?>
                <nav id="mobile-site-navigation" class="main-navigation" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav><!-- #mobile-site-navigation -->
            </div><!--.wrapper-->
        </div><!--.row-3-->
	</header><!-- #masthead -->
	<div id="content" class="site-content clear">
