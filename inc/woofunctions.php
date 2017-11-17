<?php if(!function_exists('bella_add_customer_login_text')){
    add_action('woocommerce_login_form_start','bella_add_customer_login_text',0);
    function bella_add_customer_login_text(){
        echo 'You need to have a membership to access the member\'s section.
        To become a member, purchase your membership <a href="'.get_the_permalink(11).'">here</a>';
    }
};
if(!function_exists('bella_remove_hooks')){
    add_action('init','bella_remove_hooks', 10);
    function bella_remove_hooks(){
        remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper', 10);
        remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end', 10);
        remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
        if(class_exists('WC_Subscriptions_Cart')){
            remove_action( 'woocommerce_review_order_after_order_total', array('WC_Subscriptions_Cart' , 'display_recurring_totals') );
        }
    }
}
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_add_to_cart', 10 );

// Change number or products per row to 2
if (!function_exists('bella_loop_columns')) {
    add_filter('loop_shop_columns', 'bella_loop_columns');
	function bella_loop_columns() {
		return 2; // 2 products per row
	}
}

if(!function_exists('bella_change_image_shown')){
    add_filter( 'woocommerce_before_shop_loop_item_title', 'change_image_shown', 10 );
    function change_image_shown( $args ) {
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'large' );
        } else {
            echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $product->post->ID );
        }
    }
}

add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 0 );

if(!function_exists('bella_add_template_header')){
    add_action('woocommerce_before_shop_loop','bella_add_template_header', 0);
    function bella_add_template_header(){
        global $post;
        $post = get_post(632);
        setup_postdata($post);
        get_template_part("template-parts/content","template-header");
        wp_reset_postdata();
    }
}