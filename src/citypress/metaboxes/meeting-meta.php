<?php

namespace citypress\Metaboxes;

/**
 *
 * @author SetordeTI
 *        
 */
class Meeting_Meta {
	
	protected static $id = 'citypress_meeting_metadata';
	protected static $screens = array( 'meeting' );
	protected static $nonce_name = 'citypress_meeting_metabox_nonce';
	protected static $title;
	
	/**
	 */
	function __construct() {
		static::$title = __( 'Meeting Data', 'citypress' );
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_boxes' ) );
	}
	
	public static function add_meta_boxes() {
		
		foreach ( static::$screens as $screen ) {
			add_meta_box( static::$id, static::$title, array( __CLASS__, 'callback' ), $screen );
		}
		
	}
	
	public static function callback( $post ) {
		
	}
	
}

return new Meeting_Meta();
