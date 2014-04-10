<?php
if ( have_posts() ): while( have_posts() ): the_post();
?>
<?php
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src( $thumb_id, 'masthead' );
?>
	<header class="masthead" style="background: url(<?php echo $thumb_url[0]; ?>);">
		<h1><?php the_title(); ?></h1>
	</header>
	<article class="singleOverlap">
		<div class="grid">
			<section class="content col-3-4">
				<?php the_content(); ?>
			</section>
			<aside class="sidebar col-1-4">
				<?php dynamic_sidebar( 'page-sidebar' ); ?>
			</aside>
		</div>
	</article>
<?php
endwhile;
endif;
?>