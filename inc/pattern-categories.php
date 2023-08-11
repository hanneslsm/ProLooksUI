<?php
/**
 * Pattern categories
 * 
 * @package prolooksui
 * @since 1.0
 * @link https://developer.wordpress.org/themes/advanced-topics/block-patterns/
 */


/**
 * Register custom pattern categories
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
    register_block_pattern_category(
        'hero',
        array(
            'label' => __( 'Heros', 'text-domain' ),
            'description' => __( 'Sections that prominently display information', 'text-domain' ),
        )
    );

    register_block_pattern_category(
        'typography',
        array(
            'label' => __( 'Typography', 'text-domain' ),
            'description' => __( 'Text optimized for readability', 'text-domain' ),
        )
    );
}
