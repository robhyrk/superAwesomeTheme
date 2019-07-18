<?php
/**
 * TAXONOMIES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

 /**
  * Create "Product Type" Taxonomy
  */
 function tent_register_product_type_taxonomy() {

   $slug = 'product-type';
   $name = 'Product Types';
   $singular_name = 'Product Type';

   $labels = array(
     'name'                       => $name, 'Taxonomy General Name',
     'singular_name'              => $singular_name, 'Taxonomy Singular Name',
     'menu_name'                  => $name,
     'all_items'                  => 'All ' . $name,
     'parent_item'                => 'Parent ' . $singular_name,
     'parent_item_colon'          => sprintf( 'Parent %s:', $singular_name ),
     'new_item_name'              => sprintf( 'New %s Name', $singular_name ),
     'add_new_item'               => 'Add New ' . $singular_name,
     'edit_item'                  => 'Edit ' . $singular_name,
     'update_item'                => 'Update ' . $singular_name,
     'separate_items_with_commas' => sprintf( 'Separate %s with commas', strtolower( $name ) ),
     'search_items'               => 'Search ' . strtolower( $name ),
     'add_or_remove_items'        => 'Add or remove ' . strtolower( $name ),
     'choose_from_most_used'      => 'Choose from the most used ' . strtolower( $name ),
   );

   $args = array(
     'labels'                     => $labels,
     'hierarchical'               => true,
     'public'                     => true,
     'query_var'                  => true,
     'show_ui'                    => true,
     'show_in_nav_menus'          => true,
     'show_admin_column'          => true,
     'show_in_rest'               => true,        // needed for Gutenberg to work!
   );

   register_taxonomy( $slug, array( 'product' ), $args );
 }

 add_action( 'init', 'tent_register_product_type_taxonomy', 0 );
