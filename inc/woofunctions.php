<?php if(!function_exists('bella_add_customer_login_text')){
    add_action('woocommerce_login_form_start','bella_add_customer_login_text',0);
    function bella_add_customer_login_text(){
        echo 'You need to have a membership to access the member\'s section.
        To become a member, purchase your membership <a href="'.get_the_permalink(11).'">here</a>';
    }
};