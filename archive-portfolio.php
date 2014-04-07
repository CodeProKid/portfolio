<?php
get_header(); ?>
<section class="portfolio items">
	<h2>My Portfolio</h2>
	<div class="grid">
		<?php
			get_template_part( 'parts/loops/loop', 'portfolio' );
		?>
	</div>
</section>
<?php
get_footer();