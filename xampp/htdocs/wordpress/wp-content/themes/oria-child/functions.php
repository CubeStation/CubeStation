<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
if( function_exists('register_sidebar')){

    register_sidebar(array(
        'name' => 'sidebar',
        'id' => 'new-widget-area',
        'before_widget' => '<div class="widget-sidebarentete">',
        'after_widget' => '</div>',
        'before_title' => '<div class="titre-moduleentete">',
        'after_title' => '</div>',
    ));

}

if( function_exists('register_sidebar')){

    register_sidebar(array(
        'name' => 'sidebar2',
        'id' => 'new-widget-area2',
        'before_widget' => '<div class="widget-sidebarentete2">',
        'after_widget' => '</div>',
        'before_title' => '<div class="titre-moduleentete2">',
        'after_title' => '</div>',
    ));

}

/*marge header top*/

add_action('get_header', 'remove_admin_login_header');

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
