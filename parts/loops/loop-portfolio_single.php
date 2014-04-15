<?php

if ( have_posts() ): while( have_posts() ): the_post();
?>
<?php
	if ( get_field( 'header_image' ) ) {
		$headerImg = wp_get_attachment_image_src( get_field( 'header_image' ), 'masthead' );
		$theHeader = $headerImg[0];
	}
?>
<header class="masthead" style="background-image: url(<?php echo $theHeader; ?>);"></header>
<article class="singleOverlap">
	<h1><?php the_title(); ?></h1>
	<section class="grid">
		<div class="col-3-4">
			<?php if ( has_sub_field( 'slider_images' ) ): ?>
			<div class="flexslider">
				<ul class="slides">
					<?php while( has_sub_field( 'slider_images' )): ?>
					<li>
						<?php $image_slide = wp_get_attachment_image_src( get_sub_field( 'slider_image' ), 'portfolio-slider' ); ?>
						<img src="<?php echo $image_slide[0]; ?>" alt="<?php the_sub_field( 'title' ); ?>" />
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php elseif ( get_field( 'description' ) ):
				the_field( 'description' );
			endif; ?>
		</div>
		<div class="col-1-4 meta">
			<?php if ( get_field( 'client' ) ): ?>
			<div class="client">
				<h3>Client</h3>
				<p><?php echo get_field( 'client' ); ?></p>
			</div>
			<?php endif;
			if ( get_field( 'project_url' ) ): ?>
			<div class="url">
				<h3>Project Link</h3>
				<?php $project_url = get_field( 'project_url' ); ?>
				<a href="<?php echo esc_url( $project_url ); ?>" class="button" target="_blank">View Online</a>
			</div>
			<?php endif; ?>
			<div class="skills">
				<h3>Skills Used</h3>
				<?php $terms = get_the_terms( $post->ID, 'skills' ); 
						
					foreach ( $terms as $term ){
						$skills[] = $term->name;
					}
					$the_skills = join( ' <br> ',$skills );
					
					echo '<span>' . $the_skills . '</span>';
				?>
			</div>
		</div><?php //.meta ?>
	</section><?php //.grid ?>
	<section class="content">
		<?php the_content(); ?>
	</section>
</article>
<?php posts_nav_link( ' - ', '« Previous Portfolio Piece', 'Next Portfolio Page »');

endwhile;
endif;

?>