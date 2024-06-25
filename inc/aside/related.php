<?php
/**
 * Render Related Posts
 * 
 * Silohon Terabox Wordpress Theme
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

$option_array = get_option( 'tera_options' );
$fixReCount = !empty( $option_array['reCount']) ? $option_array['reCount'] : 6;

$reApps = get_posts(
    array(
        'category__in'          =>  wp_get_post_categories( $post->ID ),
        'numberposts'           =>  $fixReCount,
        'post__not_in'          =>  array($post->ID),
    )
);

if( $reApps ){ ?>

<div class="section_cat">
    <span class="in_single_tag">Related Apps</span>
</div>

<div class="grid-2">
    <?php foreach( $reApps as $post ){
        setup_postdata( $post ); ?>

            <article id="post-<?php the_ID(); ?>" class="grid-90-auto">
                <a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" class="grid-a">
                    <?php echo tera_generate_app_icon( get_the_ID(), 'grid-img', 'lazy' ); ?>
                </a>
                <div class="grid-body">
                    <a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" class="grid-body-a">
                        <?php the_title('<h2 class="grid-title">', '</h2>'); ?>
                    </a>
                    <div class="meta-block">
                        <span class="rating-star"><span class="star-value"><?php echo tera_gen_ratings( get_the_ID() ); ?> &starf;</span></span>
                    </div>
                </div>
            </article>

        <?php
    } ?>
</div>

<?php
}

wp_reset_postdata();