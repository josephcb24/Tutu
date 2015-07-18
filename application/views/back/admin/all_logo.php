<div class="panel-body">
    <!-- Delete Logo Div -->
    <?php foreach ($logo as $row){ ?>
        <div class="delete-div-wrap">
            <span class="close"><i class="fa fa-trash"></i></span>
            <div class="inner-div tr-bg">
                <img class="img-responsive img-md" 
                	src="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $row['logo_id']; ?>.png" 
                    	data-id="<?php echo $row['logo_id']; ?>" >
            </div>
        </div>
    <?php } ?>
</div>
<script>
	$('.delete-div-wrap .close').on('click', function() {
	    var id = $(this).closest('.delete-div-wrap').find('img').data('id');
	    delete_confirm(id, '<?php echo translate('really_want_to_delete_this_logo?'); ?>');
	});
</script>