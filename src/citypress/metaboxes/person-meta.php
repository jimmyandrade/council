<?php

namespace citypress\Metaboxes;

class Person_Meta {

    protected static $id = 'citypress_person_metadata';
    protected static $screens = array('person');
    protected static $nonce_name = 'citypress_person_metabox_nonce';
    protected static $title;

    function __construct() {
        static::$title = __('Person Info', 'citypress');
        add_action('add_meta_boxes', array(__CLASS__, 'add_meta_boxes'));
    }

    public static function add_meta_boxes() {
        foreach (static::$screens as $screen) {
            add_meta_box(static::$id, static::$title, array(__CLASS__, 'callback'), $screen);
        }
    }

    private static function get_max_birthday( $min_age = 18 ) {
        $birthday_max_year = \date( 'Y' ) - $min_age;
        $birthday_max = $birthday_max_year . '-' . date('m') . '-' . date('d');
        return $birthday_max;
    }
    
    public static function callback($post) {
        \wp_enqueue_script('jquery-ui-datepicker');
        $birthday = \get_post_meta( $post->ID, '_birthday', true );
        $birthday_max_attribute = ' max="' . \esc_attr( static::get_max_birthday() ) . '"';
        $birthday_value_attribute = ' value="' . \esc_attr( $birthday ) . '"';
?>
<p>
    <label for="birthday"><?php _e( 'Birthday', 'citypress' ); ?></label>
    <input class="widefat datepicker" data-dateformat="yyyy-mm-dd"
           data-maxdate="-18y"
           data-placeholder="aaaa-mm-dd" id="birthday" name="birthday"
           type="date" <?php echo $birthday_max_attribute . $birthday_value_attribute; ?> />
</p>
<script type="text/javascript">
/* <![CDATA[ */
	jQuery(document).ready(function(){
            jQuery( '.datepicker' ).datepicker({
                dateFormat: jQuery(this).data('dateformat'),
                maxDate: jQuery(this).data('maxdate')
            });
        });
/* ]]> */
</script>
<?php
    }

}
return new Person_Meta();
