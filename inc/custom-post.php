<?php
function custom_portfolio(){
  register_post_type ('portfolio',
    array(
      'labels' => array(
        'name' => ('Portfolios'),
        'singular_name' => ('Portfolio'),
        'add_new' => ('Add Portfolio'),
        'add_new_item' => ('Add Portfolio'),
        'edit_item' => ('Edit Portfolio'),
        'new_item' => ('New Portfolio'),
        'view_item' => ('View Portfolio'),
        'not_found' => ('Sorry, we cound\'n find the Portfolio you are looking for.'),
      ),
      'menu_icon' => 'dashicons-networking',
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => true,
      'menu_position' => 5, 
      'has_archive' => true,
      'hierarchial' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'taxonomies' => array('portfolio_category'),
      'rewrite' => array('slug' => 'portfolio'),
      'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
      )
    );
    add_theme_support('post-thumbnails');
        // Register a custom taxonomy (category) for the 'portfolio' post type
        register_taxonomy(
            'portfolio_category', // Change this to a unique name for your taxonomy
            'portfolio', // Associate with the 'portfolio' post type
            array(
                'label' => 'Portfolio Categories',
                'hierarchical' => true,
                'public' => true,
                'rewrite' => array('slug' => 'portfolio-category'), // Change the slug as needed
                'show_admin_column' => true,
            )
        );
    
        add_theme_support('post-thumbnails');
}

add_action('init', 'custom_portfolio');

function query_post_type($query) {
    if(is_category()){
      $post_type = get_query_var('post_type');
      if($post_type){
        $post_type = $post_type;
      }else{
        $post_type = array('post','portfolio');
        $query->set('post_type', $post_type);
        return $query;
      }
    }
}

add_filter('pre_get_posts', 'query_post_type');
