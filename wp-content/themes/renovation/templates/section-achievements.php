<?php
global $post; 
$currentlang = get_bloginfo('language');

$args = array( 'post_type' => 'page', 'page_id' => 39, 'posts_per_page' => 1 );
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>
	<div class="page-header">
		<?php if ( $currentlang == "en-US" ) { ?>
			<h3><a href="<?php echo get_page_link(41); ?>" rel="bookmark" title="<?php echo get_the_title(41); ?>"><?php echo get_the_title(41); ?></a> &raquo; 
				<small>
					<a class="owl-prev customPrevBtn" style=""><i class="fa fa-angle-left"></i></a>
					<a class="owl-next customNextBtn" style=""><i class="fa fa-angle-right"></i></a>
				</small>
			</h3>
		<?php }elseif ($currentlang == "fr-FR") {?>
			<h3><a href="<?php echo get_page_link(39); ?>" rel="bookmark" title="<?php echo get_the_title(39); ?>"><?php echo get_the_title(39); ?></a> &raquo; 
				<small>
					<a class="owl-prev customPrevBtn" style=""><i class="fa fa-angle-left"></i></a>
					<a class="owl-next customNextBtn" style=""><i class="fa fa-angle-right"></i></a>
				</small>
			</h3>
		<?php }else{?>
			<h3><a href="<?php echo get_page_link(39); ?>" rel="bookmark" title="<?php echo get_the_title(39); ?>"><?php echo get_the_title(39); ?></a> &raquo; 
				<small>
					<a class="owl-prev customPrevBtn" style=""><i class="fa fa-angle-left"></i></a>
					<a class="owl-next customNextBtn" style=""><i class="fa fa-angle-right"></i></a>
				</small>
			</h3>
		<?php } ?>
	</div>
	<!-- pagination here -->
	<div id="carousel__achievements" class="owl-carousel">
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
						echo '<div class="item"><a href="';
						the_permalink();
						echo '">';
						echo wp_get_attachment_image( $attachment->ID, 'thumbnail', '' , array('class'=>'img-responsive') );
						echo '</a></div>';
					}
				}				
			?>
		
	<?php endwhile; ?>
	<!-- end of the loop -->
	
	</div>
	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
