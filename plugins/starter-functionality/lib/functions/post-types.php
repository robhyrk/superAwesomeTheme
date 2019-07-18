<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

 /**
  * Create "Product" post type
  */
 function tent_register_product_post_type() {

   $slug = 'product';
   $name = 'Products';
   $singular_name = 'Product';

   $labels = array(
     'name'                => $name, 'Post Type General Name',
     'singular_name'       => $singular_name, 'Post Type Singular Name',
     'menu_name'           => $name,
     'parent_item_colon'   => sprintf( 'Parent %s:', $singular_name ),
     'all_items'           => 'All ' . $name,
     'view_item'           => 'View ' . $singular_name,
     'add_new_item'        => 'Add New ' . $singular_name,
     'add_new'             => 'New ' . $singular_name,
     'edit_item'           => 'Edit ' . $singular_name,
     'update_item'         => 'Update ' . $singular_name,
     'search_items'        => 'Search ' . strtolower( $name ),
     'not_found'           => sprintf( 'No %s found', strtolower( $name ) ),
     'not_found_in_trash'  => sprintf( 'No %s found in Trash', strtolower( $name ) ),
   );

   $args = array(
     'description'         => 'Products are hipstery items that Inhabitent sells.',
     'labels'              => $labels,
     'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
     //  ^^^ 'custom-fields' must be supported above to add meta to REST API response
     'hierarchical'        => false,
     'public'              => true,
     'show_ui'             => true,
     'show_in_menu'        => true,
     'show_in_nav_menus'   => true,
     'show_in_admin_bar'   => true,
     'menu_position'       => 5,
     'menu_icon'           => 'dashicons-cart',
     'can_export'          => true,
     'has_archive'         => 'products',
     'rest_base'           => 'products',
     'exclude_from_search' => false,
     'publicly_queryable'  => true,
     'capability_type'     => 'post',
     'show_in_rest'        => true,             // needed for Gutenberg to work!
     'template_lock' => 'all',                  // or 'insert' to allow moving blocks
     'template' => array(
        // array( 'inhabitent/product-price', array() ),
        array( 'core/paragraph', array(
          'placeholder' => 'Add the product description here.',
        ) ),
      ),                                        // the template blocks
   );

   register_post_type( $slug, $args );
 }
 add_action( 'init', 'tent_register_product_post_type' );

 /**
  * Create "Testimonial" post type
  */
 function tent_register_adventure_post_type() {

   $slug = 'adventure';
   $name = 'Adventures';
   $singular_name = 'Adventure';

   $labels = array(
     'name'                => $name, 'Post Type General Name',
     'singular_name'       => $singular_name, 'Post Type Singular Name',
     'menu_name'           => $name,
     'parent_item_colon'   => sprintf( 'Parent %s:', $singular_name ),
     'all_items'           => 'All ' . $name,
     'view_item'           => 'View ' . $singular_name,
     'add_new_item'        => 'Add New ' . $singular_name,
     'add_new'             => 'New ' . $singular_name,
     'edit_item'           => 'Edit ' . $singular_name,
     'update_item'         => 'Update ' . $singular_name,
     'search_items'        => 'Search ' . strtolower( $name ),
     'not_found'           => sprintf( 'No %s found', strtolower( $name ) ),
     'not_found_in_trash'  => sprintf( 'No %s found in Trash', strtolower( $name ) ),
   );

   $args = array(
     'description'         => 'Testimonials are glowing reviews from happy customers.',
     'labels'              => $labels,
     'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),
     'hierarchical'        => false,
     'public'              => true,
     'show_ui'             => true,
     'show_in_menu'        => true,
     'show_in_nav_menus'   => true,
     'show_in_admin_bar'   => true,
     'menu_position'       => 5,
     'menu_icon'           => 'dashicons-location-alt',
     'can_export'          => true,
     'has_archive'         => 'adventures',
     'exclude_from_search' => false,
     'publicly_queryable'  => true,
     'capability_type'     => 'post',
     'show_in_rest'        => true,             // needed for Gutenberg to work!
   );

   register_post_type( $slug, $args );
 }
 add_action( 'init', 'tent_register_adventure_post_type' );

 /**
  * Change the "Enter the title" text for custom post types
  * @since 1.0.0
  *
  */
 function tent_change_title_here_text( $input ) {
    global $post_type;

    if ( is_admin() && 'testimonial' == $post_type ) {
       return 'Enter customer first and last name here';
    }
    return $input;
 }
 add_filter( 'enter_title_here', 'tent_change_title_here_text' );
