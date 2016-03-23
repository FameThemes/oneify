<?php
/**
 * OnePress Child Theme Functions
 *
 */

/**
 * Enqueue child theme style
 */
add_action( 'wp_enqueue_scripts', 'oneify_child_enqueue_styles', 15 );
function oneify_child_enqueue_styles()
{
    wp_enqueue_style('onepress-child-style', get_stylesheet_directory_uri() . '/style.css');
}


/**
 * More header after hero section for front page only.
 *
 */
function oneify_move_header(){
    if ( is_page_template( 'template-frontpage.php' ) ) {
        remove_action( 'onepress_site_start', 'onepress_site_header' );
        add_action( 'onepress_after_section_hero', 'onepress_site_header' );
    }
}
add_action( 'wp', 'oneify_move_header' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function oneify_body_classes( $classes ) {
    if ( is_page_template( 'template-frontpage.php' ) ) {
        $classes[] = 'header-after-hero';
    }
    return $classes;
}
add_filter( 'body_class', 'oneify_body_classes', 75 );
