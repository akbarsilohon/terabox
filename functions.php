<?php
/**
 * Root function SILOHON TERABOX
 * 
 * Wordpress theme affiliate
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

define( 'TERA_NAME', 'SILOHON TERABOX' );
define( 'TERA_AUTHOR', 'NUR AKBAR' );
define( 'TERA_VER', '1.1.1' );


/**
 * Define directory functions
 * 
 * @package terabox
 */
define( 'TERA_URI', get_template_directory_uri() );
define( 'TERA_DIR', get_template_directory() );
function TERA_PART( $teraFile ){

    $teraDir = get_template_part( $teraFile );

    return $teraDir;
}


/**
 * Upstreaming functions
 * 
 * theme function
 * 
 * call scrips
 * 
 * unregister functions
 * 
 * @package terabox
 */
require_once TERA_DIR . '/func/theme.php';
require_once TERA_DIR . '/func/scripts.php';
require_once TERA_DIR . '/func/unregister.php';



/**
 * Metabox functions
 * 
 * @package terabox
 */
require_once TERA_DIR . '/inc/metabox/load.php';