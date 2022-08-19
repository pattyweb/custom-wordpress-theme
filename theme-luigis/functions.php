<?php


function load_stylesheets(){

    wp_register_style('font', get_template_directory_uri() . '/fonts/beyond_the_mountains-webfont.css', array(), 1, 'all');
    wp_enqueue_style('font');

    wp_register_style('bootstrap', get_template_directory_uri() . '/plugin-frameworks/bootstrap.min.css', array(), 1, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('swiper', get_template_directory_uri() . '/plugin-frameworks/swiper.css', array(), 1, 'all');
    wp_enqueue_style('swiper');

    wp_register_style('ionicons', get_template_directory_uri() . '/fonts/ionicons.css', array(), 1, 'all');
    wp_enqueue_style('ionicons');

    wp_register_style('styles', get_template_directory_uri() . '/common/styles.css', array(), 1, 'all');
    wp_enqueue_style('styles');

    wp_register_style('custom', get_template_directory_uri() . '/custom.css', array(), 1, 'all');
    wp_enqueue_style('custom');

}
add_action('wp_enqueue_scripts', 'load_stylesheets');

//Load Scripts

function addjs(){
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/plugin-frameworks/jquery-3.2.1.min.js', '',1, 1, 1);
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/plugin-frameworks/bootstrap.min.js', '',1, 1, 1);
    wp_enqueue_script('bootstrap');

    wp_register_script('swiper', get_template_directory_uri() . '/plugin-frameworks/swiper.js', '',1, 1, 1);
    wp_enqueue_script('swiper');

    wp_register_script('scripts', get_template_directory_uri() . '/common/scripts.js', '',1, 1, 1);
    wp_enqueue_script('scripts');

    wp_register_script('custom', get_template_directory_uri() . '/custom.js', '',1, 1, 1);
    wp_enqueue_script('custom');
}

add_action('wp_enqueue_scripts', 'addjs');


//menu support
add_theme_support('menus');
add_theme_support('post-thumbnails');
//register menus
register_nav_menus(

    array(
        'top-menu' => __('Top Menu', 'theme'),
    )
    );

function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );


/*function custom_search_result(){
if ($query->is_mais_query() && !is_admin() && $query->is_search()){
  $query->set('post_type', array('post'));
  $query->set('posts_per_page', 5);
 }
}

add_action('pre_get_posts', 'custom_search_result');*/

/*<link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

<!-- Stylesheets -->
<link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
<link href="plugin-frameworks/swiper.css" rel="stylesheet">
<link href="fonts/ionicons.css" rel="stylesheet">
<link href="common/styles.css" rel="stylesheet">


<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>
*/