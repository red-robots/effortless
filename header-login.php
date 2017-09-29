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

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="https://use.typekit.net/vww2unj.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead-login" class="site-header clear-bottom" role="banner">
        <div class="row-1">
            <div class="wrapper full-width-wrapper clear-bottom">
                <?php $account_link = get_field("account_link","option");
                $account_text = get_field("account_text","option");
                if($account_text&&$account_link):?>
                    <div class="account button">
                        <a href="<?php echo $account_link;?>" class="surrounding">
                            <?php echo $account_text; ?>
                        </a>
                    </div>
                <?php endif;?>
            </div><!--.wrapper-->
        </div><!--.row-1-->
        <div class="row-2">
            <div class="wrapper full-width-wrapper clear-bottom">
                <?php $logo = get_field("logo","option");
                if($logo):?>
                    <div class="logo">
                        <a href="<?php echo get_bloginfo("url");?>" class="surrounding">
                            <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
                        </a>
                    </div><!--.logo-->
                <?php endif;?>
                <?php $mobilebuttontext = get_field("mobile_button_text","option");?>
                <?php if($mobilebuttontext):?>
                    <div class="button">
                        <?php echo $mobilebuttontext;?>
                    </div><!--.button-->
                <?php endif;?>
                <nav id="login-site-navigation" class="login-nav">
                    <?php wp_nav_menu( array( 'theme_location' => 'login' ) ); ?>
                </nav>
            </div><!-- wrapper -->
        </div><!--.row-2-->
	</header><!-- #masthead -->
	<div id="content" class="site-content wrapper">
