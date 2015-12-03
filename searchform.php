<form role="search" method="get" class="search-form"
	action="<?php echo home_url( '/' ) ?>">
	<div class="input-group">
		<label class="form-group">
			<span class="screen-reader-text sr-only">
				<?php _e( 'Search for:', 'citypress' ); ?>
			</span>
			<?php get_template_part( 'searchform', 'input' ); ?>
		</label>
		<span class="input-group-btn">
			<button type="submit" class="search-submit btn btn-primary">
				<span class="screen-reader-text sr-only"><?php _e( 'Search', 'citypress' ); ?></span>
				<span class="fui-search" <?php echo 'role="presentation"'; ?>></span>
			</button>
		</span>
	</div>
</form>