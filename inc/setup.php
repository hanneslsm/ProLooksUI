<?php
/**
 * Setup
 * 
 * @link https://developer.wordpress.org/themes/block-themes/block-theme-setup/
 * @package prolooksui
 * @since 1.0
 */



if (!function_exists('prolooksui_setup')) :
    function prolooksui_setup()
    {
        // Make theme available for translation.
        load_theme_textdomain('prolooksui', get_template_directory() . '/languages');

        // Add support for block styles.
        add_theme_support('wp-block-styles');

        // Remove core block patterns.
        remove_theme_support('core-block-patterns');

        // Enqueue editor styles.
        add_editor_style('editor-style.css');
    }
endif; // prolooksui_setup
add_action('after_setup_theme', 'prolooksui_setup');
