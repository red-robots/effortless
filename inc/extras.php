<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );

function add_query_vars_filter( $vars ) {
  $vars[] = "pg";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );


function shortenText($str, $limit, $brChar = ' ', $pad = '...')  {
    if (empty($str) || strlen($str) <= $limit) {
        return $str;
    }
    $output = substr($str, 0, ($limit+1));
    $brCharPos = strrpos($output, $brChar);
    $output = substr($output, 0, $brCharPos);
    $output = preg_replace('#\W+$#', '', $output);
    $output .= $pad;
    return $output;
}

function my_custom_admin_head() { ?>
	<style type="text/css">
		/* Homepage Slider */
		.acf-field-5c6923e818202 .acf-gallery-side-data .media-types-required-info,
		.acf-field-5c6923e818202 .acf-gallery-side-info .acf-gallery-edit,
		.acf-field-5c6923e818202 .acf-gallery-side-data [data-name="caption"],
		.acf-field-5c6923e818202 .acf-gallery-side-data [data-name="alt"] {
			display: none!important;
		}
		.acf-field-5c6923db18201 .acf-gallery-side-data textarea {
			height: 90px;
		}
	</style>	
<?php }
add_action( 'admin_head', 'my_custom_admin_head' );

function get_page_id_by_slug($slug,$status='publish') {
	global $wpdb;
	if(empty($slug)) return 0;
	$result = $wpdb->get_row( "SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."' AND post_status='".$status."'" );
	return ($result) ? $result->ID : 0;
}

function get_instagram_setup() {
	global $wpdb;
	$result = $wpdb->get_row( "SELECT option_value FROM $wpdb->options WHERE option_name = 'sb_instagram_settings'" );
	if($result) {
		$option = ($result->option_value) ? @unserialize($result->option_value) : false;
	} else {
		$option = '';
	}
	return $option;
}

function get_the_categories_by_status($post_type,$taxonomy,$status) {
	global $wpdb;
	$the_categories = array();

	$posts = $wpdb->get_results( 
		"
			SELECT post.ID as post_id, post.post_title, post.post_type, tx.term_id, tx.name, tx.slug, tx.taxonomy
			FROM $wpdb->posts post, $wpdb->term_relationships as rel
			JOIN (
			      SELECT terms.*, taxo.taxonomy
			      FROM $wpdb->term_taxonomy as taxo, $wpdb->terms as terms
			      WHERE taxo.term_id=terms.term_id AND taxo.taxonomy='".$taxonomy."'
			  ) tx ON rel.term_taxonomy_id = tx.term_id 
			WHERE post.ID=rel.object_id 
			   AND post.post_status = 'publish' AND post.post_type='".$post_type."'
		"
		);

	if($post_type=='sources-resources') {

		$the_categories = $wpdb->get_results( 
		"
			SELECT post.post_type, tx.*
			FROM $wpdb->posts post, $wpdb->term_relationships as rel
			JOIN (
			      SELECT terms.*, taxo.taxonomy
			      FROM $wpdb->term_taxonomy as taxo, $wpdb->terms as terms
			      WHERE taxo.term_id=terms.term_id AND taxo.taxonomy='".$taxonomy."'
			  ) tx ON rel.term_taxonomy_id = tx.term_id 
			WHERE post.ID=rel.object_id 
			   AND post.post_status = 'publish' AND post.post_type='".$post_type."'
			   GROUP BY tx.term_id
		"
		);

	} else {


		if($status=='public') {

			/* status = public */
			$res_stat = $wpdb->get_row( "SELECT term_id FROM $wpdb->terms WHERE slug = '".$status."'" );
			$status_term_id = ($res_stat) ? $res_stat->term_id:0;

			if($posts) {
				$num_post = 1;
				foreach($posts as $po) {
					$post_id = $po->post_id;
					$cat_id = $po->term_id; 
					$post_type = $po->post_type;
					$sql2 = "SELECT rel.term_taxonomy_id FROM $wpdb->term_relationships as rel
							WHERE rel.object_id=".$post_id." AND rel.term_taxonomy_id=".$status_term_id."";
					$result2 = $posts = $wpdb->get_results($sql2);
					if($result2) {
						$the_categories[$cat_id] = (object) array(
									'term_id'=>$cat_id,
									'name'=>$po->name,
									'slug'=>$po->slug,
									'taxonomy'=>$po->taxonomy,
									'post_type'=>$post_type
								);
					}
				}
			}


		} else {

			/* status = members */
			if($posts) {
				$num_post = 1;
				foreach($posts as $po) {
					$post_id = $po->post_id;
					$cat_id = $po->term_id; 
					$post_type = $po->post_type;
					$sql2 = "
							SELECT rel.term_taxonomy_id 
							FROM $wpdb->term_relationships as rel
							JOIN (
							      SELECT terms.*, taxo.taxonomy
							      FROM $wpdb->term_taxonomy as taxo, $wpdb->terms as terms
							      WHERE taxo.term_id=terms.term_id AND taxo.taxonomy='cpt-status'
							  ) tx ON rel.term_taxonomy_id = tx.term_id 
							WHERE rel.object_id=".$post_id."; 
						";

					$result2 = $posts = $wpdb->get_results($sql2);
					if($result2) {
						$the_categories[$cat_id] = (object) array(
									'term_id'=>$cat_id,
									'name'=>$po->name,
									'slug'=>$po->slug,
									'taxonomy'=>$po->taxonomy,
									'post_type'=>$post_type
								);
					}
				}
			}

		}
	}

	if($the_categories) {
		$items = sort_object_items($the_categories,'name','ASC');
		$items = array_values($items);
		return $items;
	}
}


function string_cleaner($str) {
    if($str) {
        $str = str_replace(' ', '', $str); 
        $str = preg_replace('/\s+/', '', $str);
        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        $str = strtolower($str);
        $str = trim($str);
        return $str;
    }
}

function sort_object_items($array, $key, $sort='ASC') {
    $sorter=array();
    $ret=array();
    $items = array();

    foreach($array as $k=>$v) {
        $str = string_cleaner($v->$key);
        $index = $str.'_'.$k;
        $sorter[$index] = $v;
    }

    if($sort=='DESC') {
        krsort($sorter);
    } else {
        ksort($sorter);
    }

    foreach($sorter as $key=>$val) {
        $parts = explode('_',$key);
        $n = $parts[1];
        $items[$n] = $val;
    }
    return $items;
}

function default_post_per_page() {
	return 20;
}

function cpt_taxonomies($post_type=null) {
	$cpt['menu'] = 'sub';
	$cpt['recipe'] = 'sub-5';
	$cpt['tips-quips'] = 'sub-3';
	$cpt['style-points'] = 'sub-4';
	$cpt['sources-resources'] = 'sub-2';
	if($post_type) {
		return ( isset($cpt[$post_type]) && $cpt[$post_type] ) ? $cpt[$post_type] : '';
	} else {
		return $cpt;
	}
}

function get_archive_url_by_field($field,$term_slug,$taxonomy) {
	global $wpdb;
	$page_url = '';
	if($field && $term_slug && $taxonomy) {

		$sql = "SELECT post.ID as post_id, post.post_name, meta.meta_value FROM $wpdb->posts as post, $wpdb->postmeta as meta
				WHERE post.ID=meta.post_id AND meta.meta_key='".$field."'
				AND post.post_status='publish' AND post.post_type='page'";
		$result = $wpdb->get_results($sql);

		$taxonomies = cpt_taxonomies();
		$the_post_type = '';
		foreach($taxonomies as $cpt=>$tax) {
			if($tax==$taxonomy) {
				$the_post_type = $cpt;
				break;
			}
		}

		if($result) {
			foreach($result as $row) {
				$post_id = $row->post_id;
				$meta_values = ( isset($row->meta_value) && $row->meta_value ) ? @unserialize($row->meta_value) : '';
				$post_type = ($meta_values) ? $meta_values[0] : '';
				if($post_type==$the_post_type) {
					$page_url = get_permalink($post_id) . '?sub=' . $term_slug;
					break;
				}
			}
		}

	}

	return $page_url;
}

