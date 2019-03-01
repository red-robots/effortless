<div class="nav-misc-wrapper">
    <div class="navi-overlay"></div>
    <div id="navMisc" class="navi-misc">
        <a id="closeNavMisc" href="#" class="closenav"><span></span></a>
        <div class="inner clear">
            <?php 
            wp_nav_menu( array( 'theme_location' => 'account', 'menu_id'=>'nav_misc','container'=>'' ) ); 
            ?>  
            <?php if( is_user_logged_in() ) { ?>
            <ul class="menu bottom-menu-links">
            	<li><a href="<?php echo get_site_url(); ?>/my-account/customer-logout/">Logout</a></li>
            </ul>
        	<?php } ?>
        </div>
    </div>
</div>