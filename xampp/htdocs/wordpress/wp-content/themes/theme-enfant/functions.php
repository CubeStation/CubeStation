<?php
/**
**  activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
function header_widgets_init() {
 
 register_sidebar( array(

 'name' => 'Ma nouvelle zone de widget',
 'id' => 'new-widget-area',
 'before_widget' => '<div class="nwa-widget">',
 'after_widget' => '</div>',
 'before_title' => '<h2 class="nwa-title">',
 'after_title' => '</h2>',
 ) );
}

add_action( 'widgets_init', 'header_widgets_init' );
?>

