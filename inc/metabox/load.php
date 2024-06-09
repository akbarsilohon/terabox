<?php
/**
 * Custom metabox SILOHON TERABOX
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

add_action('add_meta_boxes', 'tera_add_meta_boxes');
function tera_add_meta_boxes() {
    add_meta_box( 
        'tera_meta_box', 
        'Info App', 
        'tera_output_metabox', 
        'post', 
        'normal', 
        'high'
    );
}

/**
 * Output meta boxes SILOHON TERABOX
 * 
 * @package terabox
 */
function tera_output_metabox($post) {
    $meta = get_post_meta($post->ID);

    $appIcon = isset($meta['appIcon'][0]) ? $meta['appIcon'][0] : '';
    $appStar = isset($meta['appStar'][0]) ? $meta['appStar'][0] : '';
    $appReviews = isset($meta['appReviews'][0]) ? $meta['appReviews'][0] : '';
    $appDownload = isset($meta['appDownload'][0]) ? $meta['appDownload'][0] : '';
    $appLink = isset($meta['appLink'][0]) ? $meta['appLink'][0] : '';

    $appDataShare = isset($meta['appDataShare'][0]) ? $meta['appDataShare'][0] : '';
    $appDataCloud = isset($meta['appDataCloud'][0]) ? $meta['appDataCloud'][0] : '';
    $appDataLock = isset($meta['appDataLock'][0]) ? $meta['appDataLock'][0] : '';
    $appDataTrash = isset($meta['appDataTrash'][0]) ? $meta['appDataTrash'][0] : '';
    $appDataShield = isset($meta['appDataShield'][0]) ? $meta['appDataShield'][0] : '';

    $appStar5 = isset($meta['appStar5'][0]) ? $meta['appStar5'][0] : '';
    $appStar4 = isset($meta['appStar4'][0]) ? $meta['appStar4'][0] : '';
    $appStar3 = isset($meta['appStar3'][0]) ? $meta['appStar3'][0] : '';
    $appStar2 = isset($meta['appStar2'][0]) ? $meta['appStar2'][0] : '';
    $appStar1 = isset($meta['appStar1'][0]) ? $meta['appStar1'][0] : '';

    wp_nonce_field('tera_save_meta_box_data', 'tera_meta_box_nonce');

    ?>
    <div class="tera_container">
        <!-- App icon -->
        <div class="tera_content">
            <label for="tera_app-icon">App Icon:</label>
            <div class="tera_two-colm">
                <input type="url" name="appIcon" id="tera_app-icon" value="<?php echo esc_url($appIcon); ?>">
                <button id="tera_app-icon-change" type="button">Change</button>
            </div>
        </div>

        <!-- App Rating Star -->
        <div class="tera_content">
            <label for="tera_app-star">Rating Star:</label>
            <input type="number" step="0.1" name="appStar" id="tera_app-star" value="<?php echo esc_attr($appStar); ?>">
        </div>

        <!-- App Review -->
        <div class="tera_content">
            <label for="tera_app-reviews">Review Count:</label>
            <input type="text" name="appReviews" id="tera_app-reviews" value="<?php echo esc_attr($appReviews); ?>">
        </div>

        <!-- Download Count -->
        <div class="tera_content">
            <label for="tera_app-download">Download Count:</label>
            <input type="text" name="appDownload" id="tera_app-download" value="<?php echo esc_attr($appDownload); ?>">
        </div>

        <!-- Link Download -->
        <div class="tera_content">
            <label for="tera_app-link">App Link:</label>
            <input type="url" name="appLink" id="tera_app-link" value="<?php echo esc_url($appLink); ?>">
        </div>

        <h2 class="tera_section">Data safety</h2>

        <!-- Data Share -->
        <div class="tera_content">
            <label for="app_data-share"><span class="dashicons dashicons-share"></span></label>
            <input type="text" name="appDataShare" id="app_data-share" value="<?php echo esc_attr($appDataShare); ?>">
        </div>

        <!-- Data Cloud -->
        <div class="tera_content">
            <label for="app_data-cloud"><span class="dashicons dashicons-cloud-upload"></span></label>
            <input type="text" name="appDataCloud" id="app_data-cloud" value="<?php echo esc_attr($appDataCloud); ?>">
        </div>

        <!-- Data Lock -->
        <div class="tera_content">
            <label for="app_data-lock"><span class="dashicons dashicons-lock"></span></label>
            <input type="text" name="appDataLock" id="app_data-lock" value="<?php echo esc_attr($appDataLock); ?>">
        </div>

        <!-- Data trash -->
        <div class="tera_content">
            <label for="app_data-trash"><span class="dashicons dashicons-trash"></span></label>
            <input type="text" name="appDataTrash" id="app_data-trash" value="<?php echo esc_attr($appDataTrash); ?>">
        </div>

        <!-- Data shield -->
        <div class="tera_content">
            <label for="app_data-shield"><span class="dashicons dashicons-shield"></span></label>
            <input type="text" name="appDataShield" id="app_data-shield" value="<?php echo esc_attr($appDataShield); ?>">
        </div>

        <h2 class="tera_section">Ratings</h2>

        <div class="tera_content">
            <label for="app_star-5">
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
            </label>
            <input type="number" name="appStar5" id="app_star-5" value="<?php echo esc_attr($appStar5); ?>">
        </div>

        <div class="tera_content">
            <label for="app_star-4">
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
            </label>
            <input type="number" name="appStar4" id="app_star-4" value="<?php echo esc_attr($appStar4); ?>">
        </div>

        <div class="tera_content">
            <label for="app_star-3">
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
            </label>
            <input type="number" name="appStar3" id="app_star-3" value="<?php echo esc_attr($appStar3); ?>">
        </div>

        <div class="tera_content">
            <label for="app_star-2">
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
            </label>
            <input type="number" name="appStar2" id="app_star-2" value="<?php echo esc_attr($appStar2); ?>">
        </div>

        <div class="tera_content">
            <label for="app_star-1">
                <span class="dashicons dashicons-star-filled"></span>
            </label>
            <input type="number" name="appStar1" id="app_star-1" value="<?php echo esc_attr($appStar1); ?>">
        </div>
    </div>
    <?php
}


/**
 * Save Terabox Meta Data To DB
 * 
 * @package terabox
 */
add_action('save_post', 'tera_save_data_meta_boxes_to_db');
function tera_save_data_meta_boxes_to_db($post_id) {
    // Check if our nonce is set and verify it.
    if (!isset($_POST['tera_meta_box_nonce']) || !wp_verify_nonce($_POST['tera_meta_box_nonce'], 'tera_save_meta_box_data')) {
        return;
    }

    // Check if this is an autosave.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'page' === $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // Sanitize and save the data
    $fields = [
        'appIcon',
        'appStar',
        'appReviews',
        'appDownload',
        'appLink',
        'appDataShare',
        'appDataCloud',
        'appDataLock',
        'appDataTrash',
        'appDataShield',
        'appStar5',
        'appStar4',
        'appStar3',
        'appStar2',
        'appStar1'
    ];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        } else{
            delete_post_meta( $post_id, $field );
        }
    }
}
