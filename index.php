<?php
/**
 * Root template Silohon Terabox
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

get_header();

$page = get_option('posts_per_page');
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$indexQuery = new WP_Query(
    array(
        'post_type'         =>  'post',
        'post_status'       =>  'publish',
        'posts_per_page'    =>  $page,
        'paged'             =>  $paged
    )
);

$i = 0;

if( $indexQuery->have_posts()){ ?>

    <div class="container teraPosts">
        <?php
        $count = $indexQuery->post_count;
        while( $i < min( 1, $count ) && $indexQuery->have_posts() ){
            $indexQuery->the_post();
            $i ++; ?>

            <article id="post-<?php the_ID(); ?>" class="teraPost-hero">
                <a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>" class="teraHero-a" rel="bookmark">
                    <?php echo tera_render_post_thumbnails( get_the_ID(), 'full', 'teraHero-img', 'lazy' ); ?>

                    <div class="teraHero-body">
                        <?php echo tera_generate_app_icon( get_the_ID(), 'teraHero-icon', 'lazy' ); ?>
                        <div class="teraHero-block">
                            <?php the_title('<h2 class="teraHero-title">', '</h2>'); ?>
                            <span class="rating"><?php echo tera_gen_ratings( get_the_ID() ); ?> &starf;</span>
                        </div>
                    </div>
                </a>

            </article>

            <?php
        }
        ?>

        <div class="grid-2">
            <?php 
            $i = 0;
            while( $indexQuery->have_posts() ){
                $indexQuery->the_post();
                $i ++; ?>

                <article id="post-" class="grid-90-auto">
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
    </div>

<?php
}


/**
 * Cell Footer
 * 
 * @package terabox
 */
get_footer();