<?php
/**
 * Admin menu theme settings
 * 
 * Silohon terabox Wordpress Theme
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

add_action( 'admin_menu', 'tera_render_admin_menu' );
function tera_render_admin_menu(){
    add_menu_page( 
        'Terabox',
        'Terabox', 
        'manage_options',
        'tera',
        function(){ ?>

            <div class="tera_container">
                <?php settings_errors(); ?>
                <form action="options.php" method="post" class="tera_form">
                    <?php 
                        settings_fields( 'tera-options-group' );
                        do_settings_sections( 'tera' );
                        submit_button( 'Save' );
                    ?>
                </form>
            </div>

            <?php
        }, 
        'dashicons-admin-tools',
        1
    );
}


/**
 * Initiation for save Options
 * 
 * @package terabox
 */
add_action( 'admin_init', 'tera_admin_settings_init_options' );
function tera_admin_settings_init_options(){
    register_setting( 'tera-options-group', 'tera_options' );

    /**
     * General Settings
     * 
     * @package terabox
     */
    add_settings_section( 'tera-main', 'General', null, 'tera' );

    /**
     * Custom logo
     * 
     * @package terabox
     */
    add_settings_field( 'tera-custom-logo', 'Custom Logo', function(){

        $tOptions = get_option( 'tera_options' );
        $logo = !empty( $tOptions['te_logo'] ) ? $tOptions['te_logo'] : ''; ?>

        <input type="url" name="tera_options[te_logo]" id="teraLogo" value="<?php echo esc_url( $logo ); ?>">
        <input type="button" class="button button-primary" id="changeTeraLogo" value="Change">

        <?php
    }, 'tera', 'tera-main' );

    /**
     * Related Posts Count
     * 
     * @package terabox
     */
    add_settings_field( 'tera-re-count', 'Related Post Count', function(){
        $tOptions = get_option( 'tera_options' );
        $reCount = !empty( $tOptions['reCount']) ? $tOptions['reCount'] : 6; ?>

        <input type="number" name="tera_options[reCount]" id="reCount" value="<?php echo $reCount; ?>">

        <?php
    }, 'tera', 'tera-main' );


    /**
     * Ads Setting
     * 
     * @package terabox
     */
    add_settings_section( 'tera-ads', 'Include Ads', null, 'tera' );

    /**
     * Ads Home Page
     * 
     * @package terabox
     */
    add_settings_field( 'home-ads', 'Home Ads', function(){
        $tOptions = get_option( 'tera_options' );
        $homeAds = !empty( $tOptions['home_ad']) ? $tOptions['home_ad'] : ''; ?>

        <textarea name="tera_options[home_ad]" id="home_ad" cols="80" rows="6"><?php echo $homeAds; ?></textarea>

        <?php
    }, 'tera', 'tera-ads' );


    /**
     * Ads Before Content
     * 
     * @package terabox
     */
    add_settings_field( 'beforeContent-ads', 'After Section Content', function(){
        $tOptions = get_option( 'tera_options' );
        $beforeContent_ad = !empty( $tOptions['beforeContent_ad']) ? $tOptions['beforeContent_ad'] : ''; ?>

        <textarea name="tera_options[beforeContent_ad]" id="beforeContent_ad" cols="80" rows="6"><?php echo $beforeContent_ad; ?></textarea>

        <?php
    }, 'tera', 'tera-ads' );


    /**
     * Shortcode Ads
     * 
     * @package terabox
     */
    add_settings_field( 'scAds', 'Shorcode Ads', function(){
        $tOptions = get_option( 'tera_options' );
        $scAds = !empty( $tOptions['scAds']) ? $tOptions['scAds'] : ''; ?>

        <textarea name="tera_options[scAds]" id="scAds" cols="80" rows="6"><?php echo $scAds; ?></textarea>

        <?php
    }, 'tera', 'tera-ads' );


    /**
     * Insert HTML Code
     * 
     * @package terabox
     */
    add_settings_section( 'tera-html', 'Insert HTML', null, 'tera' );

    /**
     * Insert HTML to Header
     * 
     * @package terabox
     */
    add_settings_field( 'htmlHeader', 'Head HTML', function(){
        $tOptions = get_option( 'tera_options' );
        $headHTML = !empty( $tOptions['headHTML']) ? $tOptions['headHTML'] : ''; ?>

        <textarea name="tera_options[headHTML]" id="headHTML" cols="80" rows="6"><?php echo $headHTML; ?></textarea>

        <?php
    }, 'tera', 'tera-html' );


    /**
     * Insert HTML to Footer
     * 
     * @package terabox
     */
    add_settings_field( 'htmlFooter', 'Footer HTML', function(){
        $tOptions = get_option( 'tera_options' );
        $fooHTML = !empty( $tOptions['fooHTML']) ? $tOptions['fooHTML'] : ''; ?>

        <textarea name="tera_options[fooHTML]" id="fooHTML" cols="80" rows="6"><?php echo $fooHTML; ?></textarea>

        <?php
    }, 'tera', 'tera-html' );
}