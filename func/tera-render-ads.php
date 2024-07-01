<?php
/**
 * Render floathing Ads for up your earning
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

require TERA_DIR . '/inc/geoip/geo.php';

/**
 * XAds is loader
 * 
 * @package terabox
 */
function x_ads_loader() {
    $xAds = get_option('x_options');

    if (!empty($xAds['enable']) && $xAds['enable'] === 'true') {
        include_once TERA_DIR . '/inc/admin/MobileDetect.php';
        $mdetect = new MobileDetect();
        $percentage = !empty($xAds['xPerce']) ? intval($xAds['xPerce']) : 100;

        if (rand(1, 100) <= $percentage) {
            if (!empty($xAds['device'])) {
                switch ($xAds['device']) {
                    case 'all':
                        render_floathing_ads();
                        break;
                    case 'desktop':
                        if (!$mdetect->isMobile() && !$mdetect->isTablet()) {
                            render_floathing_ads();
                        }
                        break;
                    case 'tablet':
                        if ($mdetect->isTablet()) {
                            render_floathing_ads();
                        }
                        break;
                    case 'mobile':
                        if ($mdetect->isMobile() && !$mdetect->isTablet()) {
                            render_floathing_ads();
                        }
                        break;
                }
            }
        }
    }
}


/**
 * Xads render Floahing ads
 * 
 * @package terabox
 */
function render_floathing_ads() {

    $xAds = get_option('x_options');
    $adsCode = !empty($xAds['xAdsCode']) ? $xAds['xAdsCode'] : '';
    $hide = !empty($xAds['xHideAds']) && $xAds['xHideAds'] === 'true' ? 'style="opacity: 0;"' : '';
    $xcooldown = !empty( $xAds['xcooldown']) ? $xAds['xcooldown'] : 30;

    $countryBlock = $xAds['cBlock'];
    if( !empty( $countryBlock ) ){
        if( x_geo_country_detector() === $countryBlock ){
            return false;
        }
    }

    if( !empty($xAds['xBot']) && $xAds['xBot'] === 'true' ){
        if( bot_detector()){
            return false;
        }
    }

    $outputAds = '<style>
            .xFloathing{
                width: 100%;
                max-width: 1200px;
                height: auto;
                position: fixed;
                z-index: 999;
                top: 50%;
                left: 50%;
                transform: translate( -50%, -50%);
            }
        </style>';
    $outputAds .= '<div ' . $hide . ' id="xFloathing" class="xFloathing">' . $adsCode . '</div>';
    $outputAds .= '<script>
        setTimeout(function() {
            var xFloathing = document.getElementById("xFloathing");
            if (xFloathing) {
                xFloathing.remove();
            }
        }, '. $xcooldown .'000);
    </script>';

    echo $outputAds;
}


/**
 * Bot detector
 * 
 * @package terabox
 */
function bot_detector(){
    $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

    $bots = [
        'googlebot', 'bingbot', 'slurp', 'duckduckbot', 'baiduspider',
        'yandexbot', 'sogou', 'exabot', 'facebookexternalhit', 'facebot',
        'ia_archiver', 'petalbot', 'mj12bot', 'semrushbot'
    ];

    foreach ($bots as $bot) {
        if (stripos($user_agent, $bot) !== false) {
            return true;
        }
    }

    $bot_headers = [
        'HTTP_X_ROBOTS_TAG', 'HTTP_X_BOT', 'HTTP_X_BOT_VERSION',
        'HTTP_X_BOT_AGENT', 'HTTP_X_BOT_ID'
    ];

    foreach ($bot_headers as $header) {
        if (isset($_SERVER[$header])) {
            return true;
        }
    }

    return false;
}