var BillUpdateList;

$(document).ready(function() {

// output of legislative session updates from WP database
// set up the list...

//Original List.js structure for searchable list
var options = {
  valueNames: ['id', 'bill', 'billnum', 'topic', 'headline', 'date', 'body'],
  item: '<li><p class="bill"></p><p class="billnum"></p><p class="topic"></p><p class="headline"></p><p class="date"></p><p class="body"></p></li>'
};

// the actual list of bill updates...

var values = [
<?php //for($i=0;$i<1;$i++) { ?>
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
<?php if ( is_page() && $post->post_parent ) { ?>
{
  id: <?php echo get_the_ID(); ?>,
  bill: '<?php echo get_the_title(wp_get_post_parent_id((get_the_ID()))); ?>',
  billnum: '<?php echo get_post_meta(wp_get_post_parent_id((get_the_ID())), 'bill_number',true); ?>',
  topic: '<?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { $the_posttags = $the_posttags . $tag->name . ', '; } echo rtrim($the_posttags, ", "); } ?>',
  headline: '<?php the_title(); ?>',
  date: '<?php the_time('n/j/Y H:i'); ?>',
  body: '<?php echo htmlentities(get_the_content(), ENT_QUOTES); ?>'
},
<?php $the_posttags = ''; ?>
<?php } ?>
<?php endwhile; ?>
<?php //} ?>
]
// ...end list

// now create the list
BillUpdateList = new List('updatelist', options, values);
// and sort by date for good measure
BillUpdateList.sort('date', { order: "desc" });

});