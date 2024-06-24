<?php
/**
 * Shortcode render for Silohon Terabox Wordpress Theme
 * 
 * @package terabox
 */

define( 'tera_sc_js', TERA_URI . '/asset/js/sc.js' );

/**
 * Register Tiny MCE Button
 * 
 * @package terabox
 */
add_action( 'admin_init', 'tera_register_tiny_MCE_buttons' );
function tera_register_tiny_MCE_buttons(){
    global $typenow;

    if( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ){
        return;
    }

    if( get_user_option('rich_editing') === 'true' ){
        add_filter( 'mce_external_plugins', 'tera_MCE_external_plugins' );
        add_filter( 'mce_buttons', 'tera_MCE_buttons' );
    }

    function tera_MCE_external_plugins( $plugin_array ){
        $plugin_array['tera_mce'] = tera_sc_js;
        return $plugin_array;
    }

    function tera_MCE_buttons( $buttons ){
        array_push( $buttons, 'tera_mce' );

        return $buttons;
    }
}


/**
 * Ads Shortcode Render
 * 
 * @package terabox
 */
add_shortcode( 'tera-ad', 'tera_ad_function');
function tera_ad_function(){
    $scAds = get_option('tera_options')['scAds'];
    if( !empty( $scAds )){
        $outputAds = '<div class="boxHomeAd">';
        $outputAds .= $scAds;
        $outputAds .= '</div>';


        return $outputAds;
    }
}