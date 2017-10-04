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
      'supports' => array('title','editor','custom-fields','thumbnail'),
    
    ); 
  register_post_type('recipe',$args); // name used in query

  $labels = array(
    'name' => _x('Tips & Quips', 'post type general name'),
      'singular_name' => _x('Tip or Quip', 'post type singular name'),
      'add_new' => _x('Add New', 'Tip or Quip'),
      'add_new_item' => __('Add New Tip or Quip'),
      'edit_item' => __('Edit Tip or Quip'),
      'new_item' => __('New Tip or Quip'),
      'view_item' => __('View Tip or Quip'),
      'search_items' => __('Search Tips & Quips'),
      'not_found' =>  __('No Tips or Quips found'),
      'not_found_in_trash' => __('No Tips or Quips found in Trash'), 
      'parent_item_colon' => '',
      'menu_name' => 'Tips & Quips'
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
  register_post_type('tips-quips',$args); // name used in query
    
  $labels = array(
    'name' => _x('Style Points', 'post type general name'),
    'singular_name' => _x('Style Point', 'post type singular name'),
    'add_new' => _x('Add New', 'Style Point'),
    'add_new_item' => __('Add New Style Point'),
    'edit_item' => __('Edit Style Point'),
    'new_item' => __('New Style Point'),
    'view_item' => __('View Style Points'),
    'search_items' => __('Search Style Points'),
    'not_found' =>  __('No Style Points found'),
    'not_found_in_trash' => __('No Style Points found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Style Points'
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
  register_post_type('style-points',$args); // name used in query

  $labels = array(
    'name' => _x('Sources & Resources', 'post type general name'),
      'singular_name' => _x('Source or Resource', 'post type singular name'),
      'add_new' => _x('Add New', 'Source or Resource'),
      'add_new_item' => __('Add New Source or Resource'),
      'edit_item' => __('Edit Source or Resource'),
      'new_item' => __('New Source or Resource'),
      'view_item' => __('View Source or Resource'),
      'search_items' => __('Search Sources & Resources'),
      'not_found' =>  __('No Sources or Resources found'),
      'not_found_in_trash' => __('No Sources or Resources found in Trash'), 
      'parent_item_colon' => '',
      'menu_name' => 'Sources & Resources'
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
    register_post_type('sources-resources',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type

  /*##############################################
Custom Taxonomies     */

function build_taxonomies() {
// custom tax
  register_taxonomy( 'other', array('menu','recipe','sources-resources','tips-quips','style-points'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Other',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'other' ),
			'_builtin' => true
		) );
    register_taxonomy( 'season', array('menu','recipe','sources-resources','tips-quips','style-points'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Season',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'season' ),
			'_builtin' => true
    ) );
    register_taxonomy( 'from', array('menu','recipe','sources-resources','tips-quips','style-points'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'From',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'from' ),
			'_builtin' => true
    ) );
    register_taxonomy( 'when', array('menu','recipe','sources-resources','tips-quips','style-points'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Year',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'when' ),
			'_builtin' => true
		) );
} // End build taxonomies
add_action( 'init', 'build_taxonomies', 0 );