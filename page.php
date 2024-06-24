<?php
/**
 * Render Page views
 * 
 * Silohon Terabox WOrdpress Theme
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

get_header(); ?>

<div class="container teraPosts">
    <article id="post-<?php the_ID(); ?>" class="single-post">
        <?php the_title('<h1 class="page_title">', '</h1>'); ?>

        <section class="body_post">
            <div class="content_inner">
                <?php the_content(); ?>
            </div>
        </section>
    </article>
</div>

<?php
get_footer();