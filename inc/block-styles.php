<?php
/**
 * Block styles
 * 
 * @package prolooksui
 * @since 1.0
 */


 /** 
 * Register block styles
 */
function register_block_styles()
{

    $block_styles = array(
        'core/button'                    => array(
            'button-secondary' => __('Secondary', 'prolooksui')
        ),
        'core/list'                    => array(
            'list-recipe' => __('Recipe', 'prolooksui'),
        ),
        'core/table'                    => array(
            'table-dashed' => __('dashed', 'prolooksui'),
        ),
        'core/image'                    => array(
            'image-picture-frame' => __('Picture Frame', 'prolooksui'),
            'image-hover-zoom' => __('Hover zoom', 'prolooksui'),
        ),
        'core/navigation'                    => array(
            'navigation-opacity' => __('Opacity', 'prolooksui'),
            'navigation-neutral' => __('Neutral', 'prolooksui')
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
                'handle' => "prolooksui-block-{$filename}",
                'src'    => get_theme_file_uri("assets/styles/{$filename}.css"),
                'path'   => get_theme_file_path("assets/styles/{$filename}.css"),
            )
        );
    }
}
add_action('init', 'enqueue_custom_block_styles');

