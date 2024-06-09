<?php
/**
 * Unregister default functions Wordpress
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */


/**
 * Remove top navbar login wordpress
 * 
 * @package terabox
 */
add_action( 'show_admin_bar', '__return_false' );


/**
 * Replace WP_GENERATOR to hugo
 * 
 * @package terabox
 */
add_action( 'after_setup_theme', 'replace_generator_tag' );
function replace_generator_tag() {
    remove_action('wp_head', 'wp_generator');
    add_action('wp_head', 'custom_generator_tag');
}

function custom_generator_tag() {
    echo '<meta name="generator" content="HUGO" />' . "\n";
}


/**
 * Remove All default style inline wordpress on head
 * 
 * @package terabox
 */
add_action( 'wp_enqueue_scripts', 'remove_all_default_style_inline_wordpress' );
function remove_all_default_style_inline_wordpress(){

    /**
     * Remove Style Inline wp-block-library
     * 
     * @package terabox
     */
    wp_dequeue_style( 'wp-block-library' );


    /**
     * Remove Style Inline global-styles
     * 
     * @package terabox
     */
    wp_dequeue_style( 'global-styles' );


    /**
     * Remove WP_EMOJI Inline Style
     * 
     * @package terabox
     */
    wp_dequeue_style( 'wp-emoji-styles' );


    /**
     * Remove Inline Style classic-theme-styles
     * 
     * @package terabox
     */
    wp_dequeue_style( 'classic-theme-styles' );
}

/**
 * Remove WP_EMOJI
 * 
 * @package terabox
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);