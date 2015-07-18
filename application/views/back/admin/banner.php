<div id="content-container"> 
    <div id="page-title">
        <h1 class="page-header text-overflow">
			<?php echo translate('manage_banner');?>
        </h1>
    </div>
    <div class="tab-base">
        <div class="tab-base tab-stacked-left">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#demo-stk-lft-tab-1">
						<?php echo translate('homepage');?>
                    </a>
                </li>
                <li >
                    <a data-toggle="tab" href="#demo-stk-lft-tab-3">
						<?php echo translate('category_page');?>
                    </a>
                </li>
                <li >
                    <a data-toggle="tab" href="#demo-stk-lft-tab-5">
						<?php echo translate('featured_page');?>
                    </a>
                </li>
             </ul>
            <div class="tab-content">
                <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
                	<?php
                    	$a = array(
							'after_slider',
							'after_featured',
							'after_search',
							'after_category',
							'after_latest',
							'after_popular',
							'after_most_viewed'
						);
						
						foreach ($a as $r) {
							
							$home = $this->db->get_where('banner', array(
								'page' => 'home',
								'place' => $r
							))->result_array();
							if (count($home) < 2) {
								$m = 3;
								$l = 12;
							} else {
								$m = 12;
								$l = 3;
							}
					?>
                        <div class="col-md-<?php echo $m; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <?php echo translate($r); ?>
                                        </h3>
                                    </div>
                                    <?php
                                        foreach($home as $row){
                                    ?>
                                        <div class="col-md-<?php echo $l; ?>">
                                            <?php
												echo form_open(base_url() . 'index.php/admin/banner/set/' . $row['banner_id'], array(
													'class' => 'form-horizontal',
													'method' => 'post',
													'enctype' => 'multipart/form-data'
												));
											?>
                                                <div class="panel panel-bordered-grey">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <img class="img-responsive img_show img-banner"
                                                                    src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','thumb','src') ?>"  />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <span class="pull-left btn btn-default btn-file">
                                                                    <?php echo translate('select_banner_image');?>
                                                                    <input type="file" name="img" class="form-control imgInp" accept="image">
                                                                </span>	
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <input id="ban_<?php echo $row['banner_id']; ?>" 
                                                                    data-id="<?php echo $row['banner_id']; ?>" class='sw1' 
                                                                        type="checkbox" name="status" 
                                                                            <?php if($row['status'] == 'ok'){ ?>checked<?php } ?>
                                                                                value="ok" />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                 <input type="text" name="link" value="<?php echo $row['link']; ?>" 
                                                                 	placeholder="<?php echo translate('link');?>" class="form-control" >
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="panel-footer text-right">
                                                        <span class="btn btn-info btn-xs btn-labeled fa fa-check submitter"  
                                                            data-ing='<?php echo translate('updating..');?>' 
                                                            	data-msg='<?php echo translate('settings_updated!');?>'>
                                                            	<?php echo translate('update');?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
					<?php
                        }
                    ?>
                </div>
                
                <div id="demo-stk-lft-tab-3" class="tab-pane fade">
                    
                	<?php
						$category = $this->db->get_where('banner', array(
							'page' => 'category',
							'place' => 'after_filters'
						))->result_array();
						if (count($category) < 2) {
							$m = 3;
							$l = 12;
						} else {
							$m = 12;
							$l = 3;
						}
					?>

                    <div class="col-md-<?php echo $m; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo translate('after_filters'); ?></h3>
                                </div>
                                <?php
                                    foreach($category as $row){
                                ?>
                                    <div class="col-md-<?php echo $l; ?>">
                                        <?php
                                            echo form_open(base_url() . 'index.php/admin/banner/set/' . $row['banner_id'], array(
                                                'class' => 'form-horizontal',
                                                'method' => 'post',
                                                'enctype' => 'multipart/form-data'
                                            ));
                                        ?>
                                            <div class="panel panel-bordered-grey">
                                                <div class="panel-body">
                                                
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <img class="img-responsive img_show img-banner-long"
                                                                src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','thumb','src') ?>"  />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <span class="pull-left btn btn-default btn-file">
                                                                <?php echo translate('select_banner_image');?>
                                                                <input type="file" name="img" class="form-control imgInp" accept="image">
                                                            </span>	
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input id="ban_<?php echo $row['banner_id']; ?>" 
                                                                data-id="<?php echo $row['banner_id']; ?>" class='sw1' 
                                                                    type="checkbox" name="status" 
                                                                        <?php if($row['status'] == 'ok'){ ?>checked<?php } ?>
                                                                            value="ok" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                             <input type="text" name="link" value="<?php echo $row['link']; ?>" 
                                                                placeholder="<?php echo translate('link');?>" class="form-control" >
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            
                                                <div class="panel-footer text-right">
                                                    <span class="btn btn-info btn-xs btn-labeled fa fa-check submitter"  
                                                        data-ing='<?php echo translate('updating..');?>' 
                                                        	data-msg='<?php echo translate('settings_updated!');?>'>
                                                            	<?php echo translate('update');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                                
                <div id="demo-stk-lft-tab-5" class="tab-pane fade active in">
                	<?php
						$a = array(
							'after_most_sold',
							'after_most_viewed'
						);
						foreach ($a as $r) {
							
							$home = $this->db->get_where('banner', array(
								'page' => 'featured',
								'place' => $r
							))->result_array();
							if (count($home) < 2) {
								$m = 3;
								$l = 12;
							} else {
								$m = 12;
								$l = 3;
							}
						
					?>
                    <div class="col-md-<?php echo $m; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo translate($r); ?></h3>
                                </div>
                                <?php
                                    foreach($home as $row){
                                ?>
                                    <div class="col-md-<?php echo $l; ?>">
                                            <?php
                                                echo form_open(base_url() . 'index.php/admin/banner/set/' . $row['banner_id'], array(
                                                    'class' => 'form-horizontal',
                                                    'method' => 'post',
                                                    'enctype' => 'multipart/form-data'
                                                ));
                                            ?>
                                            <div class="panel panel-bordered-grey">
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <img class="img-responsive img_show img-banner-long"
                                                                src="<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','thumb','src') ?>"  />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <span class="pull-left btn btn-default btn-file">
                                                                <?php echo translate('select_banner_image');?>
                                                                <input type="file" name="img" class="form-control imgInp" accept="image">
                                                            </span>	
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <input id="ban_<?php echo $row['banner_id']; ?>" 
                                                                data-id="<?php echo $row['banner_id']; ?>" class='sw1' 
                                                                    type="checkbox" name="status" 
                                                                        <?php if($row['status'] == 'ok'){ ?>checked<?php } ?>
                                                                            value="ok" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                             <input type="text" name="link" value="<?php echo $row['link']; ?>" 
                                                                placeholder="<?php echo translate('link');?>" class="form-control" >
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            
                                                <div class="panel-footer text-right">
                                                    <span class="btn btn-info btn-xs btn-labeled fa fa-check submitter" 
                                                        data-ing='<?php echo translate('updating..');?>' 
                                                        	data-msg='<?php echo translate('settings_updated!');?>'>
                                                            	<?php echo translate('update');?>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
					<?php
                        }
                    ?>
                    
                </div>
            </div>
          </div>
     </div>
</div>

<script type="text/javascript">

	$(document).ready(function() {
		$('.demo-chosen-select').chosen();
		$('.demo-cs-multiselect').chosen({
			width: '100%'
		});
	});
	
	$(document).ready(function() {
		$("form").submit(function(e) {
			return false;
		});
		$(".sw1").each(function() {
			new Switchery(document.getElementById('ban_' + $(this).data('id')), {
				color: 'rgb(100, 189, 99)'
			});
			var changeCheckbox = document.querySelector('#ban_' + $(this).data('id'));
			changeCheckbox.onchange = function() {
				ajax_load('<?php echo base_url(); ?>index.php/admin/banner/banner_publish_set/' + $(this).data('id') + '/' + changeCheckbox.checked, 'prod', 'others');
				if (changeCheckbox.checked == true) {
					$.activeitNoty({
						type: 'success',
						icon: 'fa fa-check',
						message: '<?php echo translate('banner_published!'); ?>',
						container: 'floating',
						timer: 3000
					});
				} else {
					$.activeitNoty({
						type: 'danger',
						icon: 'fa fa-check',
						message: '<?php echo translate('banner_unpublished!'); ?>',
						container: 'floating',
						timer: 3000
					});
				}
			};
		});
	});
	
	
	$(".imgInp").change(function() {
		var tar = $(this).closest('.panel-body').find('.img_show');
		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				tar.attr('src', e.target.result);
			}
			reader.readAsDataURL(this.files[0]);
		}
	});
</script>
