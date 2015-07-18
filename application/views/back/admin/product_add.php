<div class="row">
    <div class="col-md-12">
		<?php
            echo form_open(base_url() . 'index.php/admin/product/do_add/', array(
                'class' => 'form-horizontal',
                'method' => 'post',
                'id' => 'product_add',
				'enctype' => 'multipart/form-data'
            ));
        ?>
            <div class="panel-body">
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-1"><?php echo translate('product_title');?></label>
                    <div class="col-sm-6">
                        <input type="text" name="title" id="demo-hor-1" placeholder="<?php echo translate('product_title');?>" class="form-control required">
                    </div>
                </div>
                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-2"><?php echo translate('category');?></label>
                    <div class="col-sm-6">
                        <?php echo $this->crud_model->select_html('category','category','category_name','add','demo-chosen-select required','','','','get_cat'); ?>
                    </div>
                </div>
                
                <div class="form-group btm_border" id="sub" style="display:none;">
                    <label class="col-sm-4 control-label" for="demo-hor-3"><?php echo translate('sub-category');?></label>
                    <div class="col-sm-6" id="sub_cat">
                    </div>
                </div>
                
                <div class="form-group btm_border" id="brn" style="display:none;">
                    <label class="col-sm-4 control-label" for="demo-hor-4"><?php echo translate('brand');?></label>
                    <div class="col-sm-6" id="brand">
                    </div>
                </div>
                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('unit');?></label>
                    <div class="col-sm-6">
                        <input type="text" name="unit" id="demo-hor-5" placeholder="<?php echo translate('unit_(e.g._kg,_pc_etc.)'); ?>" class="form-control unit required">
                    </div>
                </div>
                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-6"><?php echo translate('sale_price');?></label>
                    <div class="col-sm-4">
                        <input type="number" name="sale_price" id="demo-hor-6" placeholder="<?php echo translate('sale_price');?>" class="form-control required">
                    </div>
                    <span class="btn unit_set"></span>
                </div>
                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-7"><?php echo translate('purchase_price');?></label>
                    <div class="col-sm-4">
                        <input type="number" name="purchase_price" id="demo-hor-7" placeholder="<?php echo translate('purchase_price');?>" class="form-control required">
                    </div>
                    <span class="btn unit_set"></span>
                </div>
                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-8"><?php echo translate('shipping_cost');?></label>
                    <div class="col-sm-4">
                        <input type="number" name="shipping_cost" id="demo-hor-8" placeholder="<?php echo translate('shipping_cost');?>" class="form-control">
                    </div>
                    <span class="btn unit_set"></span>
                </div>
                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-9"><?php echo translate('product_tax');?></label>
                    <div class="col-sm-4">
                        <input type="number" name="tax" id="demo-hor-9" placeholder="<?php echo translate('product_tax');?>" class="form-control">
                    </div>
                    <div class="col-sm-1">
                        <select class="demo-chosen-select" name="tax_type">
                            <option value="percent">%</option>
                            <option value="amount"><?php echo currency(); ?></option>
                        </select>
                    </div>
                    <span class="btn unit_set"></span>
                </div>
                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-10"><?php echo translate('product_discount');?></label>
                    <div class="col-sm-4">
                        <input type="number" name="discount" id="demo-hor-10" placeholder="<?php echo translate('product_discount');?>" class="form-control">
                    </div>
                    <div class="col-sm-1">
                        <select class="demo-chosen-select" name="discount_type">
                            <option value="percent">%</option>
                            <option value="amount"><?php echo currency(); ?></option>
                        </select>
                    </div>
                    <span class="btn unit_set"></span>
                </div>
                                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-11"><?php echo translate('tags');?></label>
                    <div class="col-sm-6">
                        <input type="text" name="tag" data-role="tagsinput" placeholder="<?php echo translate('tags');?>" class="form-control">
                    </div>
                </div>
                                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-12"><?php echo translate('images');?></label>
                    <div class="col-sm-6">
                    <span class="pull-left btn btn-default btn-file"> <?php echo translate('choose_file');?>
                        <input type="file" multiple name="images[]" onchange="preview(this);" id="demo-hor-12" class="form-control required">
                        </span>
                        <br><br>
                        <span id="previewImg" ></span>
                    </div>
                </div>
                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-13"><?php echo translate('description'); ?></label>
                    <div class="col-sm-6">
                        <textarea rows="9"  class="summernotes" data-height="200" data-name="description"></textarea>
                    </div>
                </div>
                
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-14"><?php echo translate('color'); ?></label>
                    <div class="col-sm-4"  id="more_colors">
                      <div class="col-md-12" style="margin-bottom:8px;">
                          <div class="col-md-10">
                              <div class="input-group demo2">
                                   <input type="text" value="#ccc" name="color[]" class="form-control" />
                                   <span class="input-group-addon"><i></i></span>
                                </div>
                          </div>
                          <span class="col-md-2">
                              <span class="remove_it_v rmc btn btn-danger btn-icon icon-lg fa fa-trash" ></span>
                          </span>
                      </div>
                    </div>
                    <div class="col-sm-2">
                        <div id="more_color_btn" class="btn btn-primary btn-labeled fa fa-plus">
                            <?php echo translate('add_more_colors');?>
                        </div>
                    </div>
                    
                </div>
                
                <div id="more_additional_fields"></div>
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-inputpass"></label>
                    <div class="col-sm-6">
                        <h4 class="pull-left">
                            <i><?php echo translate('if_you_need_more_field_for_your_product_,_please_click_here_for_more...');?></i>
                        </h4>
                        <div id="more_btn" class="btn btn-mint btn-labeled fa fa-plus pull-right">
                        <?php echo translate('add_more_fields');?></div>
                    </div>
                </div>
            </div>
    
            <div class="panel-footer">
                <div class="row">
                	<div class="col-md-11">
                        <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" 
                            onclick="ajax_set_full('add','<?php echo translate('add_product'); ?>','<?php echo translate('successfully_added!'); ?>','product_add',''); "><?php echo translate('reset');?>
                        </span>
                    </div>
                    
                    <div class="col-md-1">
                        <span class="btn btn-success btn-md btn-labeled fa fa-upload pull-right" onclick="form_submit('product_add','<?php echo translate('product_has_been_uploaded!'); ?>');proceed('to_add');" ><?php echo translate('upload');?></span>
                    </div>
                    
                </div>
            </div>
    
        </form>
    </div>
</div>

<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
</script>

<script>

    window.preview = function (input) {
        if (input.files && input.files[0]) {
            $("#previewImg").html('');
            $(input.files).each(function () {
                var reader = new FileReader();
                reader.readAsDataURL(this);
                reader.onload = function (e) {
                    $("#previewImg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
                }
            });
        }
    }

    function other_forms(){}
	
	function set_summer(){
        $('.summernotes').each(function() {
            var now = $(this);
            var h = now.data('height');
            var n = now.data('name');
            now.closest('div').append('<input type="hidden" class="val" name="'+n+'">');
            now.summernote({
                height: h,
                onChange: function() {
                    now.closest('div').find('.val').val(now.code());
                }
            });
            now.closest('div').find('.val').val(now.code());
        });
	}
	
    $(document).ready(function() {
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
		set_summer();
		createColorpickers();
    });
    function other(){
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
        $('#sub').show('slow');
        $('#brn').show('slow');
    }
    function get_cat(id){
        $('#brand').html('');
        $('#sub').hide('slow');
        $('#brn').hide('slow');
        ajax_load(base_url+'index.php/admin/product/sub_by_cat/'+id,'sub_cat','other');
        ajax_load(base_url+'index.php/admin/product/brand_by_cat/'+id,'brand','other');
    }
    function get_sub_res(id){}

    $(".unit").on('keyup',function(){
        $(".unit_set").html('/'+$(".unit").val());
    });

	function createColorpickers() {
	
		$('.demo2').colorpicker({
			format: 'rgba'
		});
		
	}
	
    $("#more_btn").click(function(){
        $("#more_additional_fields").append(''
            +'<div class="form-group">'
            +'    <div class="col-sm-4">'
            +'        <input type="text" name="ad_field_names[]" class="form-control"  placeholder="<?php echo translate('field_name'); ?>">'
            +'    </div>'
            +'    <div class="col-sm-5">'
			+'        <input type="text" name="ad_field_values[]" class="form-control"  placeholder="<?php echo translate('field_value'); ?>">'
            +'    </div>'
            +'    <div class="col-sm-2">'
            +'        <span class="remove_it_v rms btn btn-danger btn-icon btn-circle icon-lg fa fa-times" onclick="delete_row(this)"></span>'
            +'    </div>'
            +'</div>'
        );
		set_summer();
    });

    
    $('body').on('click', '.rms', function(){
        $(this).parent().parent().remove();
    });

    $("#more_color_btn").click(function(){
        $("#more_colors").append(''
            +'      <div class="col-md-12" style="margin-bottom:8px;">'
            +'          <div class="col-md-10">'
            +'              <div class="input-group demo2">'
			+'		     	   <input type="text" value="#ccc" name="color[]" class="form-control" />'
			+'		     	   <span class="input-group-addon"><i></i></span>'
			+'		        </div>'
            +'          </div>'
            +'          <span class="col-md-2">'
            +'              <span class="remove_it_v rmc btn btn-danger btn-icon icon-lg fa fa-trash" ></span>'
            +'          </span>'
            +'      </div>'
  		);
		createColorpickers();
    });		           

    $('body').on('click', '.rmc', function(){
        $(this).parent().parent().remove();
    });


	$(document).ready(function() {
		$("form").submit(function(e){
			return false;
		});
	});
</script>

<style>
	.btm_border{
		border-bottom: 1px solid #ebebeb;
		padding-bottom: 15px;	
	}
</style>


<!--Bootstrap Tags Input [ OPTIONAL ]-->

