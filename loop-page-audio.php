<h2 class="h6 col-sm-6 col-md-8 col-lg-6">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<span class="fui-volume"></span> <?php the_title(); ?>
	</a>
</h2>
<div class="col-sm-4 col-md-2 col-lg-4">
<?php
$attr = array(
		'src' => $post->guid,
		'loop' => 'off',
		#'autoplay' => 'off',
		'preload' => 'metadata',
);
echo wp_audio_shortcode( $attr );
$post_ancestors = get_post_ancestors( $post );
foreach ( $post_ancestors as $post_ancestor ) {
	$ancestor = get_post( $post_ancestor );
?>
<?php _e( 'From', 'citypress' ); ?>: <a href="<?php echo get_permalink( $post_ancestor ); ?>" title="<?php echo apply_filters( 'the_title_attribute', $ancestor->post_title ); ?>">
	<?php echo apply_filters( 'the_title', $ancestor->post_title ); ?>
</a>
<?php
}
?>
</div>

<div class="col-sm-2 col-md-2 col-lg-2">
	<a class="btn btn-default" href="<?php echo wp_get_attachment_url( get_the_ID() ); ?>" download><?php _e( 'Download', 'citypress' ); ?></a>
	<?php if( current_user_can( 'edit_post', $post->ID ) ) { ?>
	&nbsp;
	<a href="<?php echo esc_attr( get_edit_post_link() ); ?>" title="<?php _e( 'Edit', 'citypress' ); ?> <?php the_title_attribute(); ?>">
		<span class="fui-gear" role="presentation"></span>
		<?php _e( 'Edit', 'citypress' ); ?>
	</a>
	<?php } ?>
</div>

<div class="clearfix"></div>