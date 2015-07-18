<?php
	foreach($brand_data as $row){
?>
    <div>
        <?php
			echo form_open(base_url() . 'index.php/admin/brand/update/' . $row['brand_id'], array(
				'class' => 'form-horizontal',
				'method' => 'post',
				'id' => 'brand_edit',
				'enctype' => 'multipart/form-data'
			));
		?>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="demo-hor-1"><?php echo translate('brand_name');?></label>
                    <div class="col-sm-6">
                        <input type="text" value="<?php echo $row['name'];?>" 
                        	name="name" id="demo-hor-1" class="form-control required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"><?php echo translate('category');?></label>
                    <div class="col-sm-6">
                        <?php echo $this->crud_model->select_html('category','category','category_name','edit','demo-chosen-select required',$row['category']); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="demo-hor-2"><?php echo translate('brand_logo');?></label>
                    <div class="col-sm-6">
                        <span class="pull-left btn btn-default btn-file">
                            <?php echo translate('select_brand_logo');?>
                            <input type="file" name="img" id='imgInp' accept="image">
                        </span>
                        <br><br>
                        <span id='wrap' class="pull-left" >
                            <img src="<?php echo $this->crud_model->file_view('brand',$row['brand_id'],'','','no','src','','','.png') ?>" width="60%" id='blah' > 
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php
	}
?>

<script src="<?php echo base_url(); ?>template/back/js/custom/brand_form.js"></script>


