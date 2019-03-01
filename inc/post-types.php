<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init()  {
    $post_types = array(
        array(
          'post_type' => 'menu',
          'menu_name' => 'Menus',
          'plural'    => 'Menus',
          'single'    => 'Menu',
          'supports'  => array('title','editor','thumbnail')
        ),
        array(
          'post_type' => 'recipe',
          'menu_name' => 'Recipes',
          'plural'    => 'Recipes',
          'single'    => 'Recipe',
          'supports'  => array('title','editor','thumbnail')
        ),
        array(
          'post_type' => 'tips-quips',
          'menu_name' => 'Tips & Quips',
          'plural'    => 'Tips & Quips',
          'single'    => 'Tip or Quip',
          'supports'  => array('title','editor','thumbnail')
        ),
        array(
          'post_type' => 'style-points',
          'menu_name' => 'Style Points',
          'plural'    => 'Style Points',
          'single'    => 'Style Point',
          'supports'  => array('title','editor','thumbnail')
        ),
        array(
          'post_type' => 'sources-resources',
          'menu_name' => 'Sources & Resources',
          'plural'    => 'Sources & Resources',
          'single'    => 'Source or Resource',
          'supports'  => array('title','editor','thumbnail')
        ),
        array(
          'post_type' => 'testimonial',
          'menu_name' => 'Testimonials',
          'plural'    => 'Testimonials',
          'single'    => 'Testimonial',
          'supports'  => array('title','editor','thumbnail')
        ),
    );

    if($post_types) {
        foreach ($post_types as $p) {
            $p_type = ( isset($p['post_type']) && $p['post_type'] ) ? $p['post_type'] : ""; 
            $single_name = ( isset($p['single']) && $p['single'] ) ? $p['single'] : "Custom Post"; 
            $plural_name = ( isset($p['plural']) && $p['plural'] ) ? $p['plural'] : "Custom Post"; 
            $menu_name = ( isset($p['menu_name']) && $p['menu_name'] ) ? $p['menu_name'] : $p['plural']; 
            $menu_icon = ( isset($p['menu_icon']) && $p['menu_icon'] ) ? $p['menu_icon'] : "dashicons-admin-post"; 
            $supports = ( isset($p['supports']) && $p['supports'] ) ? $p['supports'] : array('title','editor','custom-fields','thumbnail'); 
            $taxonomies = ( isset($p['taxonomies']) && $p['taxonomies'] ) ? $p['taxonomies'] : array(); 
            $parent_item_colon = ( isset($p['parent_item_colon']) && $p['parent_item_colon'] ) ? $p['parent_item_colon'] : ""; 
            $menu_position = ( isset($p['menu_position']) && $p['menu_position'] ) ? $p['menu_position'] : 20; 
            
            if($p_type) {
                
                $labels = array(
                    'name' => _x($plural_name, 'post type general name'),
                    'singular_name' => _x($single_name, 'post type singular name'),
                    'add_new' => _x('Add New', $single_name),
                    'add_new_item' => __('Add New ' . $single_name),
                    'edit_item' => __('Edit ' . $single_name),
                    'new_item' => __('New ' . $single_name),
                    'view_item' => __('View ' . $single_name),
                    'search_items' => __('Search ' . $plural_name),
                    'not_found' =>  __('No ' . $plural_name . ' found'),
                    'not_found_in_trash' => __('No ' . $plural_name . ' found in Trash'), 
                    'parent_item_colon' => $parent_item_colon,
                    'menu_name' => $menu_name
                );
            
            
                $args = array(
                    'labels' => $labels,
                    'public' => true,
                    'publicly_queryable' => true,
                    'show_ui' => true, 
                    'show_in_menu' => true, 
                    'query_var' => true,
                    'rewrite' => true,
                    'capability_type' => 'post',
                    'has_archive' => false, 
                    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
                    'menu_position' => $menu_position,
                    'menu_icon'=> $menu_icon,
                    'supports' => $supports
                ); 
                
                register_post_type($p_type,$args); // name used in query           
            }
            
        }
    }
} // close custom post type

  /*##############################################
Custom Taxonomies     */
function build_taxonomies() {

  $posts = array(

    /* TAGS */
    array(
      'post_types' => array('menu','recipe','sources-resources','tips-quips','style-points'),
      'menu_name' => 'Tags',
      'plural'    => 'Tags',
      'single'    => 'Tag',
      'hierarchical' => false,
      'rewrite' => true,
      'taxonomy'  => 'cpt-tag'
    ),

    /* FROM */
    array(
      'post_type' => 'menu',
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from',
      'rewrite' => array( 'slug' => 'menu-from' ),
    ),
    array(
      'post_type' => 'recipe',
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from-5',
      'rewrite'   => array( 'slug' => 'recipe-from' ),
    ),
    array(
      'post_type' => 'tips-quips',
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from-3',
      'rewrite'   => array( 'slug' => 'tips-quips-from' ),
    ),
    array(
      'post_type' => 'style-points',
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from-4',
      'rewrite'   => array( 'slug' => 'style-points-from' ),
    ),
    array(
      'post_type' => 'sources-resources',
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from-2',
      'rewrite'   => array( 'slug' => 'sources-resources-from' ),
    ),
    
    /* SUB */
    array(
      'post_type' => 'menu',
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub',
      'rewrite' => array( 'slug' => 'menu-sub' ),
    ),
    array(
      'post_type' => 'recipe',
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub-5',
      'rewrite'   => array( 'slug' => 'recipe-sub' ),
    ),
    array(
      'post_type' => 'tips-quips',
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub-3',
      'rewrite'   => array( 'slug' => 'tips-quips-sub' ),
    ),
    array(
      'post_type' => 'style-points',
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub-4',
      'rewrite'   => array( 'slug' => 'style-points-sub' ),
    ),
    array(
      'post_type' => 'sources-resources',
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub-2',
      'rewrite'   => array( 'slug' => 'sources-resources-sub' )
    ),

    /* STATUS */
    array(
      'post_types' => array('menu','recipe','sources-resources','tips-quips','style-points'),
      'menu_name' => 'Status',
      'plural'    => 'Status',
      'single'    => 'Status',
      'taxonomy'  => 'cpt-status',
      'rewrite' => array( 'slug' => 'cpt-status' )
    ),
    
  );

  if($posts) {
    foreach($posts as $p) {
      $multiple_types = ( isset($p['post_types']) && $p['post_types'] ) ? $p['post_types'] : ""; 
      $p_type = ( isset($p['post_type']) && $p['post_type'] ) ? $p['post_type'] : ""; 
      $single_name = ( isset($p['single']) && $p['single'] ) ? $p['single'] : "Custom Post"; 
      $plural_name = ( isset($p['plural']) && $p['plural'] ) ? $p['plural'] : "Custom Post"; 
      $menu_name = ( isset($p['menu_name']) && $p['menu_name'] ) ? $p['menu_name'] : $p['plural'];
      $taxonomy = ( isset($p['taxonomy']) && $p['taxonomy'] ) ? $p['taxonomy'] : "";
      $is_rewrite = ( isset($p['rewrite']) && $p['rewrite'] ) ? $p['rewrite'] : true;
      $show_admin_column = ( isset($p['show_admin_column']) ) ? $p['show_admin_column'] : true;
      $hierarchical = ( isset($p['hierarchical']) ) ? $p['hierarchical'] : true;

      $labels = array(
        'name' => _x( $menu_name, 'taxonomy general name' ),
        'singular_name' => _x( $single_name, 'taxonomy singular name' ),
        'search_items' =>  __( 'Search ' . $plural_name ),
        'popular_items' => __( 'Popular ' . $plural_name ),
        'all_items' => __( 'All ' . $plural_name ),
        'parent_item' => __( 'Parent ' .  $single_name),
        'parent_item_colon' => __( 'Parent ' . $single_name . ':' ),
        'edit_item' => __( 'Edit ' . $single_name ),
        'update_item' => __( 'Update ' . $single_name ),
        'add_new_item' => __( 'Add New ' . $single_name ),
        'new_item_name' => __( 'New ' . $single_name ),
      );

      if( $p_type && $taxonomy ) {
        register_taxonomy($taxonomy,$p_type, array(
          'hierarchical' => $hierarchical,
          'labels' => $labels,
          'show_ui' => true,
          'query_var' => true,
          '_builtin' => true,
          'public' => true,
          'show_admin_column' => $show_admin_column,
          'rewrite' => $is_rewrite,
        ));
      } 

      if( $multiple_types && is_array($multiple_types) && $taxonomy ) {
        register_taxonomy($taxonomy, $multiple_types, array(
          'hierarchical' => $hierarchical,
          'labels' => $labels,
          'show_ui' => true,
          'query_var' => true,
          '_builtin' => true,
          'public' => true,
          'show_admin_column' => $show_admin_column,
          'rewrite' => $is_rewrite,
        ));
      }

    }
  }
} // End build taxonomies
add_action( 'init', 'build_taxonomies', 0 );

