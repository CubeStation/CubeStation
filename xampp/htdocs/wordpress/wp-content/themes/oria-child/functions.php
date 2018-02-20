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
