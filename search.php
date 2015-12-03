<?php
get_header();
get_header( 'internal' );

if ( have_posts() ) {
	?>
	<ul class="list-group">
		<?php
		while ( have_posts() ) {
			the_post();
			?>
			<li <?php post_class( 'list-group-item' ); ?>>
				<?php get_template_part( 'loop', 'search' ); ?>
			</li>
			<?php
		}
		?>
	</ul>
	<?php
} else {
	_e( 'Nothing found', 'citypress' );
}
?>
<div class="col-sm-3">
<?php get_sidebar( 'advanced-search' ); ?>
</div>
<div class="clearfix"></div>
<?php get_footer(); ?>
