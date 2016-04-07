<?php while (have_posts()) : the_post(); ?>
	<?php if (has_post_thumbnail( $post->ID ) ){ ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<div id="masshead__page" style="background: url('<?php echo $image[0]; ?>')  no-repeat top left; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
		<?php } else { ?>
			<div id="masshead__page">
		<?php } ?>
				<?php get_template_part('templates/page', 'header'); ?>
			</div>
<?php endwhile; ?>
