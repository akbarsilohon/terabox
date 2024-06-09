<?php
/**
 * Call script for frontend
 * 
 * SILOHON TERABOX Wordpress Theme
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

add_action( 'wp_enqueue_scripts', 'tera_enqueue_scripts_frontend' );
function tera_enqueue_scripts_frontend(){
    /**
     * Main css
     * 
     * @package terabox
     */
    wp_enqueue_style( 'tera-root-style', TERA_URI . '/asset/css/root.css', array(), fileatime( TERA_DIR . '/asset/css/root.css' ), 'all' );


    /**
     * Main script
     * 
     * @package terabox
     */
    wp_enqueue_script( 'tera-main-script', TERA_URI . '/asset/js/main.js', array(), fileatime( TERA_DIR . '/asset/js/main.js' ), true );
}