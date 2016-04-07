<?php
global $post; 
$currentlang = get_bloginfo('language');

$args = array( 'post_type' => 'page', 'page_id' => 214, 'posts_per_page' => 1 );
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>
	<!-- pagination here -->
	<ul class="list-inline">
	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php

				$args = array(
					'post_type' => 'attachment',
					'numberposts' => -1,
					'orderby' => 'ID',
					'order' => 'ASC',
					'post_status' => null,
					'post_parent' => $post->ID
				);

				$attachments = get_posts( $args );
				
				if ( $attachments ) {
					foreach ( $attachments as $attachment ) {
						echo '<li><a href="';
						the_permalink();
						echo '">';
						echo wp_get_attachment_image( $attachment->ID, 'thumbnail', '' , array('class'=>'img-responsive') );
						echo '</a></li>';
					}
				}				
			?>
		
	<?php endwhile; ?>
	<!-- end of the loop -->
	
	</ul>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
