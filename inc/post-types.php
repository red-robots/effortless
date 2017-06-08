<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Menus', 'post type general name'),
    'singular_name' => _x('Menu', 'post type singular name'),
    'add_new' => _x('Add New', 'Menu'),
    'add_new_item' => __('Add New Menu'),
    'edit_item' => __('Edit Menus'),
    'new_item' => __('New Menu'),
    'view_item' => __('View Menus'),
    'search_items' => __('Search Menus'),
    'not_found' =>  __('No Menus found'),
    'not_found_in_trash' => __('No Menus found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Menus'
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
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('menu',$args); // name used in query  
  
  $labels = array(
	'name' => _x('Recipes', 'post type general name'),
    'singular_name' => _x('Recipe', 'post type singular name'),
    'add_new' => _x('Add New', 'Recipe'),
    'add_new_item' => __('Add New Recipe'),
    'edit_item' => __('Edit Recipes'),
    'new_item' => __('New Recipe'),
    'view_item' => __('View Recipes'),
    'search_items' => __('Search Recipes'),
    'not_found' =>  __('No Recipes found'),
    'not_found_in_trash' => __('No Recipes found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Recipes'
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
    'menu_position' => 20,
    'taxonomies' => ['recipe_menu_tax'],
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('recipe',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type

  /*##############################################
Custom Taxonomies     */
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
// custom tax
	register_taxonomy( 'recipe_menu_tax', 'menu',
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Category',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'recipe-menu-category' ),
			'_builtin' => true
		) );

} // End build taxonomies