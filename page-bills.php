<?php
	$new_query = new WP_Query(array(
		'posts_per_page'	=> 500,
		'post_type'			=> 'billupdates',
		'depth' 			=> 1,
		//'category_name'		=> 'featured',
		//'cat'				=> 7875,
		'offset'			=> 0,
		'orderby'			=> 'modified'
	));
?>
<?php while ($new_query->have_posts()) : $new_query->the_post(); update_post_caches($posts); $ids[] = get_the_ID(); ?>
<?php if ( is_page() && !$post->post_parent ) { ?>
 	<option class="<?php echo str_replace(' ', '-', get_post_meta($post->ID, 'bill_topic', true)); ?>" value="<?php echo get_post_meta($post->ID, 'bill_number', true); ?>"><?php the_title(); ?></option>
<?php } ?>
<?php endwhile; ?>