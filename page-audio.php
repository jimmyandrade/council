<?php
/*
  Template Name: Audio Listing Page
 */
__( 'Audio Listing Page', 'citypress' );
get_header();
the_post();
get_header( 'internal' );
the_content();

$audio_attachments_args	 = array(
	'post_type'		 => 'attachment',
	'post_mime_type' => 'audio/mpeg',
	'numberposts'	 => - 1,
	'post_parent'	 => null, // any parent
);
$posts					 = get_posts( $audio_attachments_args );
?>
<ul class="list-group">
	<?php
	foreach ( $posts as $post ) {
		setup_postdata( $post );
		?>
		<li <?php post_class( 'list-group-item' ); ?>>
			<?php get_template_part( 'loop', 'page-audio' ); ?>
		</li>
		<?php
	}
	?>
</ul>
<?php
get_footer();
