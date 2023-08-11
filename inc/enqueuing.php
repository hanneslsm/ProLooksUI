<?php
/**
 * Enqueue files
 * 
 * @package prolooksui
 * @since 1.0
 */



/**
 * Enqueue Stylesheets
*/
function my_enqueue_styles()
{
    // Enqueue style.css
    wp_enqueue_style('wp-styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');
