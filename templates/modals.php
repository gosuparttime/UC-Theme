<!-- Modal -->
<? 	$query = new WP_Query( 
	$args = array(
		'page_id' => $myID,
    ) );
	$query = new WP_Query($args);
	while ( $query->have_posts() ) : $query->the_post(); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
          <? the_title(); ?>
        </h4>
      </div>
      <div class="modal-body">
        <? the_content(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->
<? endwhile;
wp_reset_postdata();
?>
