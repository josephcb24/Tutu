<link rel="stylesheet" href="<?php echo base_url(); ?>template/front/layerslider/css/layerslider.css" type="text/css">
<script src="<?php echo base_url(); ?>template/front/layerslider/js/greensock.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>template/front/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>template/front/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>

<style>
    #layerslider * {
        font-family: 'Roboto', sans-serif;
    }
    body {
        padding: 0 !important;
    }
</style>

<div id="content-container">
	<div id="page-title">
		<h1 class="page-header text-overflow"><?php echo translate('manage_slider');?></h1>
	</div>
	<div class="tab-base">
		<div class="panel">
			<div class="panel-body">
                <div class="tab-content">
                    <div class="col-md-12" style="border-bottom: 1px solid #ebebeb;padding: 5px;">
                        <button class="btn btn-primary btn-labeled fa fa-plus-circle add_pro_btn pull-right" 
                        	onclick="ajax_set_full('add','<?php echo translate('title'); ?>','<?php echo translate('successfully_added!'); ?>','slider_add','')">
								<?php echo translate('create_slider');?>
                        </button>
                        <button class="btn btn-info btn-labeled fa fa-plus-circle add_pro_btn pull-right" 
                        	onclick="ajax_set_list()">
								<?php echo translate('slider_list');?>
                        </button>
                        <button class="btn btn-purple btn-labeled fa fa-align-justify add_pro_btn pull-right" 
                        	onclick="ajax_set_full('serial','<?php echo translate('slider_serial'); ?>','<?php echo translate('successfully_serialized!'); ?>','slider_serial',''); ">
								<?php echo translate('slider_serial');?>
                        </button>
                    </div>
                    <!-- LIST -->
                    <div class="tab-pane fade active in" id="list" 
                        style="border:1px solid #ddd; border-radius:4px;">					
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<span id="slid"></span>
<script>
	var base_url = '<?php echo base_url(); ?>'
	var user_type = 'admin';
	var module = 'slider';
	var list_cont_func = 'list';
	var dlt_cont_func = 'delete';
</script>