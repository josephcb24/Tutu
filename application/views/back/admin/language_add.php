<div>
    <?php
		echo form_open(base_url() . 'index.php/admin/language_settings/do_add_lang/', array(
			'class' => 'form-horizontal',
			'method' => 'post',
			'id' => 'language_add'
		));
	?>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-4 control-label" for="demo-hor-1"><?php echo translate('language_name');  ?></label>
                <div class="col-sm-6">
                    <input type="text" name="language" id="demo-hor-1" class="form-control required" placeholder="<?php echo translate('new_language'); ?>" >
                </div>
            </div>
        </div>
	</form>
</div>

<script>
	$(document).ready(function() {
	    $("form").submit(function(e) {
	        return false;
	    });
	});
</script>