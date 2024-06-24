<?php
/**
 * Call wp footer()
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */ ?>


<footer class="tera_footer">
    <div class="container innter_footer">
        <p>&copy; <?php echo bloginfo( 'name' ); ?> <?php echo the_time('Y'); ?></p>
    </div>
</footer>


<?php
wp_footer(); ?>

</body>
</html>