<?php

namespace citypress;

class Theme {

	protected $nav_menus;

	public function __construct() {

		$this->nav_menus = array(
			'global_nav'			 => __( 'Global Navigation Menu', 'citypress' ),
			'meeting_related_nav'	 => __( 'Meeting Related Navigation Menu', 'citypress' ),
		);

		add_action( 'admin_bar_menu', array( __CLASS__, 'admin_bar_menu' ), 100 );
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );
		add_action( 'after_setup_theme', array( __CLASS__, 'after_setup_theme' ) );
		add_action( 'widgets_init', array( __CLASS__, 'widgets_init' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'wp_enqueue_scripts' ) );
		add_action( 'wp_footer', array( __CLASS__, 'wp_footer' ) );
		add_action( 'wp_head', array( __CLASS__, 'wp_head' ) );

		add_filter( 'pre_option_upload_url_path', array( __CLASS__, 'pre_option_upload_url_path' ) );

		register_nav_menus( $this->nav_menus );
		include_once get_template_directory() . '/src/citypress/metaboxes/meeting-meta.php';
		include_once get_template_directory() . '/src/citypress/metaboxes/notice-meta.php';
		include_once get_template_directory() . '/src/citypress/metaboxes/person-meta.php';
	}

	public static function admin_bar_menu() {
		
	}

	public static function admin_menu() {
		remove_menu_page( 'edit-comments.php' );
	}

	public static function after_setup_theme() {
		add_editor_style();
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'html5' );
		add_theme_support( 'post-formats', array( 'gallery' ) );
		add_theme_support( 'post-thumbnails' );
		load_theme_textdomain( 'citypress', get_template_directory() . '/languages' );
	}

	public static function pre_option_upload_url_path() {
		return 'http://media.minasnovas.cam.mg.gov.br';
	}

	public static function wp_enqueue_scripts() {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-2.1.1.min.js', array(), '2.1.1', true );
		wp_enqueue_script( 'jquery-lazyload', '//cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js', array( 'jquery' ), '1.9.1', true );
		wp_enqueue_script( 'script', \get_template_directory_uri() . '/src/js/index.js', array( 'jquery', 'jquery-lazyload' ), null, true );
	}

	public static function widgets_init() {
		
	}

	public static function wp_head() {
		?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
				<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			var GOOG_FIXURL_LANG = '<?php echo \str_replace( '_', '-', \get_locale() ); ?>';
			var GOOG_FIXURL_SITE = '<?php echo \home_url(); ?>'
		</script>
		<?php
	}

	public static function wp_footer() {
		
	}

}

return new Theme();
