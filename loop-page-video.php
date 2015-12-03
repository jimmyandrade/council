<div class="thumbnail">
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<?php \the_post_video_thumbnail(); ?>
	</a>
	<div class="caption">
		<h3 class="h4">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<span class="fui-video" role="presentation"></span> <?php the_title(); ?>
			</a>
		</h3>
		<time><?php the_date(); ?></time>
	</div>
</div>
