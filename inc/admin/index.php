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

    /**
     * Submenu for Floating Ads
     * 
     * @package terabox
     */
    add_submenu_page( 'tera', 'X Ads', 'X Ads', 'manage_options', 'x-ads', function(){ ?>

        <div class="tera_container">
            <?php settings_errors(); ?>
            <form action="options.php" method="post" class="tera_form">
                <?php
                echo '<h1>X Ads Options</h1>';
                /**
                 * Options Group
                 * 
                 * @package terabox
                 */
                settings_fields( 'tera-xads-groups' );

                do_settings_sections( 'x-ads' );

                submit_button( 'Save' );
                
                ?>
            </form>
        </div>

        <?php
    } );
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


    /**
     * For X Ads Setting
     * 
     * You can use this method for floathing ads
     * 
     * You can set hide ads or show for visitor
     * 
     * @package terabox
     */
    register_setting( 'tera-xads-groups', 'x_options' );
    add_settings_section( 'x-sections', null, function(){
        echo '<p>If enable this ads, please paste your ads in BOX Ads. Use size 300 x 600 px for up your CTR Google Adsense</p>';
    }, 'x-ads' );

    /**
     * Enabled Question
     * 
     * @package terabox
     */
    add_settings_field( 'x-enabled', 'Enable X Ads?', function(){
        $xOptions = get_option( 'x_options' );
        $xEnabled = !empty( $xOptions['enable'] ) && $xOptions['enable'] === 'true' ? 'checked' : ''; ?>

        <input type="checkbox" name="x_options[enable]" id="xenable" value="true" <?php echo $xEnabled ?>>

        <?php
    }, 'x-ads', 'x-sections' );


    /**
     * Disable ads for bot
     * 
     * @package terabox
     */
    add_settings_field( 'x-bot', 'Disable For Bot', function(){
        $xOptions = get_option( 'x_options' );
        $xBot = !empty( $xOptions['xBot']) && $xOptions['xBot'] === 'true' ? 'checked' : ''; ?>

        <input type="checkbox" name="x_options[xBot]" id="xBot" value="true" <?php echo $xBot ?>>

        <?php
    }, 'x-ads', 'x-sections' );


    /**
     * Device
     * 
     * @package terabox
     */
    add_settings_field( 'x-device', 'Device', function(){
        $xOptions = get_option( 'x_options' );
        $device = !empty( $xOptions['device'] ) ? $xOptions['device'] : ''; ?>

        <select name="x_options[device]" id="xdevice">
            <option value="all" <?php selected( $device, 'all' ); ?>>All Device</option>
            <option value="desktop" <?php selected( $device, 'desktop' ); ?>>Desktop</option>
            <option value="tablet" <?php selected( $device, 'tablet' ); ?>>Tablet</option>
            <option value="mobile" <?php selected( $device, 'mobile' ); ?>>Mobile</option>
        </select>

        <?php
    }, 'x-ads', 'x-sections' );


    /**
     * Show percentase
     * 
     * @package
     */
    add_settings_field( 'x-precentase', 'Show Ads Percentase', function(){
        $xOptions = get_option( 'x_options' );
        $xPerce = !empty( $xOptions['xPerce']) ? $xOptions['xPerce'] : 100; ?>

        <input type="number" name="x_options[xPerce]" id="xPerce" value="<?php echo $xPerce; ?>" placeholder="By default is 100%">

        <?php
    }, 'x-ads', 'x-sections' );

    
    /**
     * Ads By Gogle
     * 
     * @package terabox
     */
    add_settings_field( 'x-ads-code', 'Ads Code', function(){
        $xOptions = get_option( 'x_options' );
        $xAdsCode = !empty( $xOptions['xAdsCode'] ) ? $xOptions['xAdsCode'] : ''; ?>

        <textarea name="x_options[xAdsCode]" id="xAdsCode" cols="80" rows="7"><?php echo $xAdsCode; ?></textarea>

        <?php
    }, 'x-ads', 'x-sections' );


    /**
     * Option for hide ads
     * 
     * @package terabox
     */
    add_settings_field( 'x-hide', 'Hide Ads', function(){
        $xOptions = get_option( 'x_options' );
        $xHideAds = !empty( $xOptions['xHideAds'] ) && $xOptions['xHideAds'] === 'true' ? 'checked' : ''; ?>

        <input type="checkbox" name="x_options[xHideAds]" id="xHideAds" value="true" <?php echo $xHideAds; ?>>

        <?php

    }, 'x-ads', 'x-sections' );


    /**
     * Remove floathing after second
     * 
     * @package xads
     */
    add_settings_field( 'xcooldown', 'Remove ads after second', function(){
        $xOptions = get_option( 'x_options' );
        $xcooldown = !empty( $xOptions['xcooldown']) ? $xOptions['xcooldown'] : 30; ?>

        <input type="number" name="x_options[xcooldown]" id="xcooldown" value="<?php echo $xcooldown; ?>">

        <?php
    }, 'x-ads', 'x-sections' );


    /**
     * Country Blocked
     * 
     * @package terabox
     */
    add_settings_field( 'xcBlocked', 'Block Country', function(){
        $xOptions = get_option( 'x_options' );
        $xBlocked = !empty( $xOptions['cBlock'] ) ? $xOptions['cBlock'] : '';
        
        $isoPath = TERA_DIR . '/inc/geoip/isocode.xml';

        $isoCall = simplexml_load_file( $isoPath );
        
        ?>

        <select name="x_options[cBlock]" id="cBlock">
            <option value="">None</option>

            <?php foreach( $isoCall->country as $country ){
                $alpha2 = (string) $country['alpha-2'];
                $name = (string) $country['name']; ?>

                <option value="<?php echo $alpha2; ?>"><?php echo $name; ?></option>

                <?php
            } ?>
        </select>

        <?php
    }, 'x-ads', 'x-sections' );
}