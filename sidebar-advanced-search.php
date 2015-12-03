<form>
	<fieldset>
		<legend><?php _e( 'Detailed search', 'citypress' ); ?></legend>
		<p class="form-group">
			<label class="control-label" for="s"><?php _e( 'What?', 'citypress' ); ?></label>
			<?php get_template_part( 'searchform', 'input' ); ?>
		</p>
		<p class="form-group">
			<label class="control-label" for="where"><?php _e( 'Where?', 'citypress' ); ?></label>
			<select class="select-block" id="where" name="where">
				<option selected="selected" value=""><?php _e( 'Whole website', 'citypress' ); ?></option>
				<option value="people"><?php _e( 'People', 'citypress' ) ?></option>
				<option value="laws"><?php _e( 'Laws', 'citypress' ) ?></option>
			</select>
		</p>
		<p>
			<button class="btn btn-primary"><?php _e( 'Search again', 'citypress' ); ?></button>
		</p>
	</fieldset>
</form>