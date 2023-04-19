<?php
if( !defined( 'ABSPATH' ) ) exit;

function flexysign_custom_post_projects() {
    $labels = array(
      'name'               => __('Projects','flexysign'),
      'singular_name'      => __('Project','flexysign'),
      'add_new'            => __('Add Project','flexysign'),
      'add_new_item'       => __('Add New Project','flexysign'),
      'edit_item'          => __('Edit Project','flexysign'),
      'new_item'           => __('New Project','flexysign'),
      'all_items'          => __('All Projects','flexysign'),
      'view_item'          => __('View Projects','flexysign'),
      'search_items'       => __('Search Projects','flexysign'),
      'not_found'          => __( 'No Projects found','flexysign' ),
      'not_found_in_trash' => __( 'No Project found in the Trash','flexysign' ), 
      'parent_item_colon'  => __('Parent Projects:', 'flexysign'),
      'menu_name'          => __('Projects','flexysign')
    );
    $args = array(
      'labels'        => $labels,
      'description'   => 'Our Projects',
      'public' => true,
      'show_ui' => true,
      'menu_position' => 40,
      'supports'      => array( 'title', 'editor','thumbnail', 'revisions'),
      'has_archive'   => true,
      'menu_icon'		=> 'dashicons-schedule',
    );
    register_post_type( 'project', $args ); 
  }
  add_action( 'init', 'flexysign_custom_post_projects' );
  
  
  function flexysign_custom_message_Projects( $messages ){
      global $post, $post_ID;
      //$post             = get_post();
      $post_type        = get_post_type($post);
      $post_type_object = get_post_type_object($post_type);
  
      $messages['project'] = array(
          0       => '', // Unused. Messages start at index 1.
          1       => sprintf(__('Project updated  <a href="%s">View Project</a>'),esc_url( get_permalink($post_ID)) ),
          2       => __('Project Updated.','flexysign'),
          3       => __('Project Deleted.','flexysign'),
          4       => __('Project Updated.','flexysign'),
          5       => isset( $_GET['revision'] ) ? sprintf( _('Project restored to revision from %s','flexysign'), wp_post_revision_title((int) $_GET['revision'], false)) :false,
          6       => sprintf(__('Project published. <a href="%s">View Project</a>'),esc_url( get_permalink($post_ID))),
          7       => __('Project Saved.','flexysign'),
          8       => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview Project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
          9       => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Project</a>'), 
                     date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
          10      => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview Project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
      );
      
      return $messages;
  }
  add_filter('post_updated_messages', 'flexysign_custom_message_projects');


if( !function_exists('flexysign_project_material_taxonomies') ) :
/**
 * Register Material Taxonomies
 */
function flexysign_project_material_taxonomies(){

    //Material materials labels
    $material_labels = array(
        'name'                   => _x('Project Materials','texonomy general name','intercom'),
        'singular_name'          => _x('Project Material','texonomy singular name','intercom'),
        'search_items'           => __('Search Materials','intercom'),
        'all_items'              => __('All Materials','intercom'),
        'parent_item'            => __('Parent Material:','intercom'),
        'edit_item'              => __('Edit Material','intercom'),
        'update_item'            => __('Update Material','intercom'),
        'add_new_item'           => __('Add New Material','intercom'),
        'new_item_name'          => __('New Material Name','intercom'),
        'menu_name'              => __('Materials','intercom'),
    );

    //project materials Arguments
    $materials_args = array(
            'labels'                =>  $material_labels,
            'show_ui'               =>  true,
            'hierarchical'          =>  true,
            'show_admin_column'     =>  true,
            'query_var'             =>  true,
            'rewrite'               =>  array('slug' => 'project_material', 'hierarchical' => true),
    );

    //Register work material
    register_taxonomy('project_material', array('project'), $materials_args );
}
add_action( 'init', 'flexysign_project_material_taxonomies', 0);
endif; //endif

if( !function_exists('flexysign_project_material_taxonomy_messages' ) ) :
/**
 * Taxonomy Update Messages
 **/
function flexysign_project_material_taxonomy_messages( $messages ){

    //override Texonomy Messages
    $messages['project_material'] = array(
        0   => '',
        1   => __('Material Added.','intercom'),
        2   => __('Material Deleted.','intercom'),
        3   => __('Material Updated.','intercom'),
        4   => __('Material Not Added.','intercom'),
        5   => __('Material Not Updated.','intercom'),
        6   => __('Materials Deleted.','intercom')
    );
    // Return Messages.
    return $messages;
}
add_filter('term_update_messages','flexysign_project_material_taxonomy_messages');
endif; //endif