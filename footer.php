<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper full-width-wrapper">
			<div class="site-info">
                <nav class="account">
                    <?php wp_nav_menu( array( 'theme_location' => 'account' ) ); ?>
                </nav>
                <?php $email = get_field("email","option");
                if($email):?>
                    <div class="email">
                        <?php echo $email;?>
                    </div><!--.email-->
                <?php endif;?>
                <nav class="sitemapbw">
                    <?php wp_nav_menu( array( 'theme_location' => 'sitemapbw' ) ); ?>
                </nav>
            </div><!-- .site-info -->
            <div class="email-signup">
                <!--insert email signup here-->
            </div><!--.email-signup-->
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
