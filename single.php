<?php
get_header();
if ( 'portfolio' == get_post_type() ){
	get_template_part( 'parts/loops/loop', 'portfolio_single' );
}else{
	get_template_part( 'parts/loops/loop', 'index' );
}

get_footer();
?>