<div id="slider__main" class="owl-carousel slider-main">
	<?php 
	// the query
	$args = array(
		'post_type' => 'Sliders',
		'posts_per_page' => 5,
		'categorias' => 'principal',
	);

	$the_query = new WP_Query( $args ); ?>

	<?php if ( $the_query->have_posts() ) : ?>

		<!-- pagination here -->

		<!-- the loop -->
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<?php if (has_post_thumbnail( $post->ID ) ){ ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<div class="item owl-lazy" data-src="<?php echo $image[0]; ?>">
		<?php } else { ?>
			<div class="item">
		<?php } ?>
				<a class="owl-prev mainPrevBtn" style=""><i class="fa fa-angle-left"></i></a>
					<a class="owl-next mainNextBtn" style=""><i class="fa fa-angle-right"></i></a>
				<?php $currentlang = get_bloginfo('language'); ?>
				<div class="slider__content">
					<h2><?php the_content(); ?></h2>
				</div>
					<div class="slider__cta">
						<?php if ( $currentlang == "en-US" ) { ?>
							<a href="<?php echo bloginfo( 'url' ); ?>/submission" class="btn btn-primary btn-lg">
								Submission
							</a>
						<?php }elseif ($currentlang == "fr-FR") {?>
							<a href="<?php echo bloginfo( 'url' ); ?>/soumission" class="btn btn-primary btn-lg">
								Soumission
							</a>
						<?php }else{?>
							<a href="<?php echo bloginfo( 'url' ); ?>/soumission" class="btn btn-primary btn-lg">
								Soumission
							</a>
						<?php } ?>
					</div>
			</div>
		<?php endwhile; ?>
		<!-- end of the loop -->

		<!-- pagination here -->

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
</div>
