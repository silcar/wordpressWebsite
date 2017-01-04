<?php
/**
 *
 * Function file for the 3W website theme:
 *
 * @package WordPress
 * @subpackage 3w_theme
 * @since 3w theme 2016 1.0
 *
 * */

/**
 * Remove wp-generator
 */
remove_action('wp_head', 'wp_generator');

/**
 * Change Logo, Url and Title of login page
 */
function custom_login_logo() {
  //  echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/assets/img/3W_logo.png) center no-repeat !important; }</style>';
}

function change_wp_login_url() {
    return get_home_url();
}

function change_wp_login_title() {
    return get_option('blogname');
}
add_action('login_head', 'custom_login_logo');
add_filter('login_headerurl', 'change_wp_login_url');
add_filter('login_headertitle', 'change_wp_login_title');

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Filter the except length to 40 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 39;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



/**
 * Enqueue styles and scripts
 */
function theme_styles(){
wp_enqueue_style ('bxslider_css', get_template_directory_uri() . '/assets/js/bxslider/jquery.bxslider.css');
wp_enqueue_style ('materialize_ccs', get_template_directory_uri() . '/assets/css/materialize.min.css');
   wp_enqueue_style ('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.min.css');
   wp_enqueue_style ('animate', get_template_directory_uri() . '/assets/css/animate.css');
   wp_enqueue_style ('main_style', get_template_directory_uri() . '/style.css?v=5.1205');

}
add_action('wp_enqueue_scripts', 'theme_styles');


function theme_scripts(){

    global $wp_scripts;

    wp_register_script('html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false);
    wp_register_script('respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false);

    $wp_scripts->add_data('html5_shiv', 'conditinal', 'lt IE 9');
    $wp_scripts->add_data('respond_js', 'conditinal', 'lt IE 9');

    wp_enqueue_script('materialize_js', get_template_directory_uri() . '/assets/js/materialize.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery_easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array('jquery'), '', true);
    wp_enqueue_script('bxslider', get_template_directory_uri() . '/assets/js/bxslider/jquery.bxslider.min.js', array('jquery'), '', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '', true);
    wp_enqueue_script( 'default-script', get_template_directory_uri() . '/assets/js/default.js', array('jquery'), '4.96', true );
}
add_action('wp_enqueue_scripts', 'theme_scripts');

// Theme setup
function theme_settings(){
    /**
     * Register home menu
     */

    register_nav_menus(array(
        'menu-header' => 'Header Menu',
        'menu-footer' => 'Footer Menu'
    ) );
    /**
     * Adding featured image support
     */
    add_theme_support('post-thumbnails');
    add_image_size( 'small-thumbnail', 180, 120, true );
    add_image_size('banner-image', 920, 210, array('left','top'));

    /**
     * Post format support
     */
    add_theme_support('post-formats', array(
        'aside', 'gallery', 'link', 'video'
    ) );

}

add_action('after_setup_theme', 'theme_settings');

function block_users()
{
    if( !current_user_can( 'delete_pages' ) ) {
        wp_redirect( get_home_url(), 301 );
        exit;
    }
}
add_action('admin_init','block_users');
require 'inc/client-type.php';
require 'inc/news-type.php';
require 'inc/expertise-type.php';
require 'inc/domain-type.php';