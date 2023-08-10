<?php

/**
 * prolooksui functions and definitions
 * @package prolooksui
 * @since 1.0
 */



/* Setup 
** @link https://developer.wordpress.org/themes/block-themes/block-theme-setup/
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

/* Styles
*/
function my_enqueue_styles()
{
    // Enqueue style.css
    wp_enqueue_style('wp-styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');



/**
 * Add block styles.
 */
function register_block_styles()
{

    $block_styles = array(
        'core/button'                    => array(
            'button-secondary' => __('Secondary', 'prolooks')
        ),
        'core/list'                    => array(
            'list-recipe' => __('Recipe', 'prolooks'),
        ),
        'core/table'                    => array(
            'table-dashed' => __('dashed', 'prolooks'),
        ),
        'core/image'                    => array(
            'image-picture-frame' => __('Picture Frame', 'prolooks'),
            'image-hover-zoom' => __('Hover zoom', 'prolooks'),
        ),
        'core/navigation'                    => array(
            'navigation-opacity' => __('Opacity', 'prolooks'),
            'navigation-neutral' => __('Neutral', 'prolooks')
        )
    );

    foreach ($block_styles as $block => $styles) {
        foreach ($styles as $style_name => $style_label) {
            register_block_style(
                $block,
                array(
                    'name'  => $style_name,
                    'label' => $style_label,
                )
            );
        }
    }
}
add_action('init', 'register_block_styles');

/**
 * Load custom block styles only when the block is used.
 */
function enqueue_custom_block_styles()
{

    // Scan our styles folder to locate block styles.
    $files = glob(get_template_directory() . '/assets/styles/*.css');

    foreach ($files as $file) {

        // Get the filename and core block name.
        $filename   = basename($file, '.css');
        $block_name = str_replace('core-', 'core/', $filename);

        wp_enqueue_block_style(
            $block_name,
            array(
                'handle' => "prolooks-block-{$filename}",
                'src'    => get_theme_file_uri("assets/styles/{$filename}.css"),
                'path'   => get_theme_file_path("assets/styles/{$filename}.css"),
            )
        );
    }
}
add_action('init', 'enqueue_custom_block_styles');


/**
 * Register custom pattern categories
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
    register_block_pattern_category(
      'hero',
      array(
            'label' => __( 'Heros', 'text-domain' ),
            'description' => __( 'Sections that prominently display information', 'text-domain' ),
      ),
      'hero',
      array(
            'label' => __( 'Heros', 'text-domain' ),
            'description' => __( 'Sections that prominently display information', 'text-domain' ),
      ),
   );
}