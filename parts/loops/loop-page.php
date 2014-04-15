<?php
if ( have_posts() ): while( have_posts() ): the_post();
?>
<?php
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src( $thumb_id, 'masthead' );
?>
	<header class="masthead" style="background-image: url(<?php echo $thumb_url[0]; ?>);"></header>
	<article class="singleOverlap">
	<h1><?php the_title(); ?></h1>
		<section class="content">
			<?php the_content(); ?>
		</section>
	</article>
<?php
endwhile;
endif;
?>