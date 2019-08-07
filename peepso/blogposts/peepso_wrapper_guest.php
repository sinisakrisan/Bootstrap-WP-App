<div class="card">

	<?php if(strlen($header)) { ?>
		<div class="card-header text-center">
			<h3><?php echo $header;?></h3>
		</div>
	<?php } ?>

	<div class="card-body">
		<?php
			$args = array();
			if( 1==PeepSo::get_option('blogposts_comments_no_cover' ,0)) {
    		$args['no_cover'] = TRUE;
			}
			PeepSoTemplate::exec_template('general', 'register-panel', $args);?>

			<?php if(strlen($header_comments)) { ?>
    		<h4><?php echo $header_comments; ?></h4>
		<?php } ?>

		{peepso_comments}
	</div>

</div>