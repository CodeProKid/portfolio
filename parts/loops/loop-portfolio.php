<?php
	$args = array(
		'post_type' => 'portfolio',
		'orderby'	=> 'menu_order',
		'order'		=> 'ASC'
	);
	$portfolio_query = new WP_Query( $args );
	
	if( $portfolio_query-> have_posts() ): while ( $portfolio_query->have_posts() ): $portfolio_query->the_post(); ?>
		<figure class="col-1-3 portfolio-item">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ){
					the_post_thumbnail( 'portfolio-grid' );
				} ?>
			</a>
			<figcaption>
				<h3><?php the_title(); ?></h3>
				<?php $terms = get_the_terms( $post->ID, 'skills' ); 
					if ( $terms && ! is_wp_error( $terms ) ) : 
						foreach ( $terms as $term ){
							$skills[] = $term->name;
						}
						$the_skills = join( ' | ',$skills );
						
						echo '<span>' . $the_skills . '</span>';
						unset($skills);
					endif;
					
				?>
			</figcaption>
		</figure>
	<?php
	endwhile;
	endif;
	wp_reset_postdata();
	
?>