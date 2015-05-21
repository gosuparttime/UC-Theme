<? $main_office = get_field('main_office');
	if ($main_office == "Yes"):
		$office = get_field('office_page');
		$args = array(
			'posts_per_page'     => 1,
			'page_id'            => $office->ID,
			
		);
		$query = new WP_Query( $args );
		while ( $query->have_posts() ) : $query->the_post();
		endwhile;
		?>
<td><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
<td><? 
$phone = get_field('office_phone');
echo '<a href="tel:';
echo $phone;
echo '">';
echo $phone;
echo '</a>';
?>
</td>
<td><? 
$email = get_field('office_email');
echo '<a href="mailto:';
echo $email;
echo '">';
echo $email;
echo '</a>';
?></td><?
		wp_reset_postdata();
	
else:
?> 
<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
<td><? 
$phone = get_field('office_phone');
echo '<a href="tel:';
echo $phone;
echo '">';
echo $phone;
echo '</a>';
?>
</td>
<td><? 
$email = get_field('office_email');
echo '<a href="mailto:';
echo $email;
echo '">';
echo $email;
echo '</a>';
?></td><?
endif; ?>