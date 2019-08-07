<div class="card">

	<?php if(strlen($header)) { ?>
		<div class="card-header text-center">
			<h3><?php echo $header;?></h3>
		</div>
	<?php } ?>

	<div class="card-body">
		<?php if(strlen($header_comments)) { ?>
    		<h4><?php echo $header_comments; ?></h4>
		<?php } ?>

		{peepso_comments}
	</div>

	<div class="card-footer">
		<?php if(strlen($header_actions)) { ?>
    		<h4><?php echo $header_actions;?></h4>
		<?php } ?>

		{peepso_actions}
	</div>

</div>



