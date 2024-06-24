<?php 
/**
 * Theme Header
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    /**
     * Insert HTML Code
     * 
     * @package terabox
     */
    $htmlCode = get_option('tera_options')['headHTML'];
    if( !empty( $htmlCode )){
        echo $htmlCode;
    }


    /**
     * call wp_head();
     * 
     * @package terabox
     */
    wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="https://schema.org/Blog">
    <header class="fast_header" id="header">
        <div class="header_inner">
            <a href="<?php echo home_url('/'); ?>" rel="home" title="<?php echo bloginfo( 'name' ); ?>" class="brand_url">
                <?php
                    $default = TERA_URI . '/asset/image/logo-blog.png';
                    $logo = !empty( get_option('tera_options')['te_logo']) ? get_option('tera_options')['te_logo'] : $default;
                    echo '<img width="300" height="60" src="'. esc_url( $logo ) .'" alt="'. get_bloginfo( 'name' ).'"/>';
                    echo '<h1 class="'. get_bloginfo('name') .'" style="display:none;">'. get_bloginfo('name') .'</h1>';
                ?>
            </a>

            <div id="btnOpen">
                <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M3 12H21M3 6H21M9 18H21" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </div>
        </div>
    </header>

    <div id="flexbox">
        <div id="btnClose">
            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M8.00386 9.41816C7.61333 9.02763 7.61334 8.39447 8.00386 8.00395C8.39438 7.61342 9.02755 7.61342 9.41807 8.00395L12.0057 10.5916L14.5907 8.00657C14.9813 7.61605 15.6144 7.61605 16.0049 8.00657C16.3955 8.3971 16.3955 9.03026 16.0049 9.42079L13.4199 12.0058L16.0039 14.5897C16.3944 14.9803 16.3944 15.6134 16.0039 16.0039C15.6133 16.3945 14.9802 16.3945 14.5896 16.0039L12.0057 13.42L9.42097 16.0048C9.03045 16.3953 8.39728 16.3953 8.00676 16.0048C7.61624 15.6142 7.61624 14.9811 8.00676 14.5905L10.5915 12.0058L8.00386 9.41816Z" fill="#0F0F0F"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z" fill="#0F0F0F"></path>
                </g>
            </svg>
        </div>

        <?php if(! is_search()) : ?>
            <div class="flexSearch" itemscope itemtype="https://schema.org/WebSite">
                <meta itemprop="url" content="<?php echo home_url('/'); ?>"/>
                <form action="<?php echo home_url('/'); ?>" method="get" class="formMobile" itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction">
                    <meta itemprop="target" content="<?php echo home_url('/') . '?s={s}'; ?>"/>
                    <input class="searchInput" itemprop="query-input" type="text" name="s" placeholder="Search here.." required/>
                    <input type="submit" value="Search" class="btnsearchMobile" />
                </form>
            </div>
        <?php endif; ?>

        <?php 
            wp_nav_menu(
                array(
                    'theme_location'        =>  'header',
                    'container'             =>  'ul',
                    'menu_class'            =>  'flexMenu',
                    'menu_id'               =>  'flexMenu',
                    'fallback_cb'           =>  false,
                    'link_before'           =>  '<span class="menu-link">',
                    'link_after'            => '</span>'
                )
            );
        ?>
    </div>