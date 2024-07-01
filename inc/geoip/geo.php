<?php
/**
 * Geo Location by Maxmind.com
 * 
 * @package terabox
 * 
 * @link https://www.maxmind.com/en/accounts/1032483/geoip/downloads
 */

require TERA_DIR . '/inc/geoip/vendor/autoload.php';

use GeoIp2\Database\Reader;

function x_geo_country_detector(){
    $databaseFile = TERA_DIR . '/inc/geoip/GeoLite2-City.mmdb';
    
    $reader = new Reader($databaseFile);

    $ipUV = $_SERVER['REMOTE_ADDR'];

    try {
        $record = $reader->city( $ipUV );
        return $record->country->isoCode;
    } catch (\GeoIp2\Exception\AddressNotFoundException $e) {
        return 'Unknown';
    }
}
