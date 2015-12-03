<?php

namespace citypress\Metaboxes;

/**
 *
 * @author SetordeTI
 *        
 */
class Notice_Meta {

    protected static $id = 'citypress_notice_metadata';
    protected static $screens = array('notice');
    protected static $nonce_name = 'citypress_notice_metabox_nonce';
    protected static $title;

    /**
     */
    function __construct() {
        static::$title = __('Notice Data', 'citypress');
        add_action('add_meta_boxes', array(__CLASS__, 'add_meta_boxes'));
        add_action('save_post', array(__CLASS__, 'save_post'));
    }

    public static function add_meta_boxes() {

        foreach (static::$screens as $screen) {
            add_meta_box(static::$id, static::$title, array(__CLASS__, 'callback'), $screen);
        }
    }

    public static function callback($post) {
        \wp_nonce_field( static::$id, static::$nonce_name );
        $submission_deadline = \get_post_meta($post->ID, '_submission_deadline', true);
        $opening_date = \get_post_meta($post->ID, '_opening_date', true);
        ?>
        <p>
            <label for="submission_deadline">
                <?php _e('Deadline for submission', 'citypress'); ?>
            </label>
            <input
                class="widefat datepicker"
                data-name="<?php _e('Deadline for submission', 'citypress'); ?>"
                id="submission_deadline" name="submission_deadline"
                type="date" value="<?php echo \esc_attr($submission_deadline); ?>"
                />
        </p>
        <p>
            <label for="opening_date">
                <?php _e('Opening date', 'citypress'); ?>
            </label>
            <input
                class="widefat datepicker"
                data-name="<?php _e('Opening date', 'citypress'); ?>"
                id="opening_date" name="opening_date"
                type="date" value="<?php echo \esc_attr($opening_date); ?>"
                />
        </p>
        <?php
    }
    
    public static function save_post( $post_id ) {
        $nonce = \filter_input(\INPUT_POST, static::$nonce_name);
        if( empty( $nonce ) ) {
            return;
        }
        if( !wp_verify_nonce( $nonce, static::$id ) ) {
            return;
        }
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        $post_type = \filter_input(\INPUT_POST, 'post_type');
        
        if(in_array($post_type, static::$screens) && !current_user_can('edit_post', $post_id ) ) {
            return;
        }
        
        $submission_deadline = \filter_input(\INPUT_POST, 'submission_deadline');
        $opening_date = \filter_input(\INPUT_POST, 'opening_date');
        \update_post_meta( $post_id, '_submission_deadline', \sanitize_text_field( $submission_deadline ) );
        \update_post_meta( $post_id, '_opening_date', \sanitize_text_field( $opening_date ) );
        
    }

}

return new Notice_Meta();
