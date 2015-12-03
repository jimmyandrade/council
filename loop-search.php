<?php
$keyword = get_search_query();
$excerpt = str_ireplace( $keyword, '<mark>' . $keyword . '</mark>', get_the_excerpt() );
$video	 = get_post_meta( get_the_ID(), 'video', true );

$audio_attachments_args	 = array(
	'post_type'		 => 'attachment',
	'post_mime_type' => 'audio/mpeg',
	'numberposts'	 => - 1,
	'post_parent'	 => get_the_ID(), // any parent
);
$audio_attachments		 = get_posts( $audio_attachments_args );
?>
<div class="col-sm-9">
	<p>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php echo str_ireplace( $keyword, '<mark>' . $keyword . '</mark>', get_the_title() ); ?>
		</a>
	</p>
</div>
<div class="col-sm-3">
	<ul class="list-inline">
		<?php if ( !empty( $video ) ) { ?>
			<li>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<span class="fui-video" role="presentation"></span>
				</a>
			</li>
		<?php } ?>
		<?php if ( count( $audio_attachments ) > 0 ) { ?>
			<li>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<span class="fui-volume" role="presentation"></span>
				</a>
			</li>
		<?php } ?>
	</ul>
</div>
<div class="clearfix"></div>
<?php
if ( !empty( $excerpt ) ) {
	?>
	<p><?php echo $excerpt; ?></p>
	<?php
}
