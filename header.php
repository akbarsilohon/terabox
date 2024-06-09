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
     * call wp_head();
     * 
     * @package terabox
     */
    wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="https://schema.org/Blog">
    <header id="top" class="t_header">
        <div class="header_inner">
            <a href="<?php echo bloginfo( 'url' ); ?>" class="t_brand-a" title="<?php echo bloginfo( 'name' ); ?>">
                <img class="t_brand-img" width="150" height="150" src="<?php echo TERA_URI . '/asset/image/logo.png'; ?>" alt="<?php echo bloginfo( 'name' ); ?>">
                <h1 class="t_brand-title"><?php echo bloginfo( 'name' ); ?></h1>
            </a>
        </div>
    </header>