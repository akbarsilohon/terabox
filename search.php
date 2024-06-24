<?php
/**
 * Render search result views
 * 
 * Silohon Terabox Wordpress Theme
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

get_header(); ?>

<div class="container fastPosts">
    <form action="<?php echo home_url('/'); ?>" method="get" class="searchFormBox"> 
        <input class="searchInput" itemprop="query-input" type="text" name="s" placeholder="Search here.." value="<?php echo $s; ?>"/>
        <input type="submit" value="Search" class="btnsearchMobile" />
    </form>

    <?php if( have_posts()){ ?>

        <div class="grid-2">
            <?php while( have_posts()){

                the_post(); ?>

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
    } ?>
</div>

<?php
get_footer();