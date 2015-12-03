<?php
get_header();
get_header( 'internal' );
?>
<h2 class="h4"><?php _e( 'Please, try the following options', 'citypress' ); ?></h2>
<h3 class="h6"><?php _e( 'Search this site', 'citypress' ); ?></h3>
<?php get_template_part( 'searchform', 'input' ); ?>
<?php
get_footer();
