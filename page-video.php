<?php
/*
  Template Name: Video Listing Page
 */
__( 'Video Listing Page', 'citypress' );
get_header();
the_post();
get_header( 'internal' );

$args	 = array(
	'posts_per_page' => 12,
	'post_type'		 => 'any',
	'meta_key'		 => 'video',
	'meta_value'	 => '',
	'meta_compare'	 => '!=',
);
$posts	 = new WP_Query( $args );

while ( $posts->have_posts() ) {
	$posts->the_post();
	?>
	<div class="col-sm-3">
		<?php get_template_part( 'loop', 'page-video' ); ?>
	</div>
	<?php
}
wp_reset_postdata();

get_footer();
