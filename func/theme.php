<?php
/**
 * After setup SILOHON TERABOX Wordpress Theme
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

add_action( 'after_setup_theme', 'terabox_after_setup_theme' );
function terabox_after_setup_theme(){
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'responsive-embeds' );

    register_nav_menu( 'header', 'Menu Header list' );
}




/**
 * Default favicon
 * 
 * @package terabox
 */
$favUri = get_site_icon_url();
if( empty( $favUri ) ){
    add_action( 'wp_head', 'tera_render_default_favicon' );
    add_action( 'admin_head', 'tera_render_default_favicon' );
    add_action( 'login_enqueue_scripts', 'tera_render_default_favicon' );
}

function tera_render_default_favicon(){
    $faviCon = TERA_URI . '/asset/image/favicon.png'; ?>

    <link rel="shortcut icon" href="<?php echo $faviCon; ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo $faviCon; ?>">

    <?php
}


/**
 * Render posts thumbnails
 * 
 * @package terabox
 */
function tera_render_post_thumbnails( $id, $size, $class, $loading ){
    $teraThumbnail = '';

    if( has_post_thumbnail( $id )){
        $teraThumbnail .= get_the_post_thumbnail( 
            $id, 
            $size, 
            array(
                'class'         =>  $class,
                'loading'       =>  $loading
            )
        );
    } else{
        $getContent = get_the_content( null, false, $id );
        $cover .= '';

        preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $getContent, $cover);

        if( !empty($cover[1])){
            $teraThumbnail .= '<img width="350" height="300" src="'. $cover[1] .'" class="'. $class .'" alt="'.get_the_title($id).'" loading="'.$loading.'"/>';
        } else{
            $teraThumbnail .= '<img width="350" height="300" src="'. TERA_URI . '/asset/image/no-thumbnail.jpg' .'" class="'. $class .'" alt="'.get_the_title($id).'" loading="'.$loading.'"/>';
        }
    }

    return $teraThumbnail;
}



/**
 * Generate Icon URI the post
 * 
 * @package terabox
 */
function tera_generate_app_icon( $id, $class, $loading ){
    $teraIconApp = '';

    $meta = get_post_meta($id);
    $appIcon = $meta['appIcon'][0];

    if( !empty( $appIcon )){
        $teraIconApp .= '<img width="100" height="100" src="'. esc_attr( $appIcon ) .'" class="'. $class .'" loading="'. $loading .'" alt="'. get_the_title( $id ) .' icon app">';
    } else{
        $teraIconApp .= '<img width="100" height="100" src="'. TERA_URI . '/asset/image/no-icon.png' .'" class="'. $class .'" loading="'. $loading .'" alt="'. get_the_title( $id ) .' icon app">';
    }

    return $teraIconApp;
}


/**
 * Generate rating apps
 * 
 * @package terabox
 */
function tera_gen_ratings( $id ){
    $meta = get_post_meta( $id );
    $appStar5 = isset($meta['appStar5'][0]) ? $meta['appStar5'][0] : '';
    $appStar4 = isset($meta['appStar4'][0]) ? $meta['appStar4'][0] : '';
    $appStar3 = isset($meta['appStar3'][0]) ? $meta['appStar3'][0] : '';
    $appStar2 = isset($meta['appStar2'][0]) ? $meta['appStar2'][0] : '';
    $appStar1 = isset($meta['appStar1'][0]) ? $meta['appStar1'][0] : '';
    $total = $appStar5 + $appStar4 + $appStar3 + $appStar2 + $appStar1;

    $averageRating = $total != 0 ? ($appStar5 * 5 + $appStar4 * 4 + $appStar3 * 3 + $appStar2 * 2 + $appStar1 * 1) / $total : 0;

    return number_format( $averageRating, 1 );
}