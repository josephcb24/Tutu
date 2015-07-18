<div id="content-container"> 
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('manage_site');?></h1>
    </div>
    <div class="tab-base">
        <div class="panel">
            <div class="tab-base tab-stacked-left">
                <ul class="nav nav-tabs">
                    <li <?php if($tab_name=="general_settings") {?>class="active"<?php } ?>>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-1"><?php echo translate('general_settings');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-2"><?php echo translate('logo');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-3"><?php echo translate('favicon');?></a>
                    </li>
                    <li <?php if($tab_name=="social_links") {?>class="active"<?php } ?>>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-4"><?php echo translate('social_media');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-7"><?php echo translate('social_login_configuaration');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-c"><?php echo translate('product_comment_settings');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-5"><?php echo translate('SEO');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-8"><?php echo translate('captcha_settings');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-6"><?php echo translate('terms_&_condition');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-p"><?php echo translate('privacy_policy');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-home"><?php echo translate('home_page');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-cat"><?php echo translate('category_page');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-contact"><?php echo translate('contact_page');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-footer"><?php echo translate('footer');?></a>
                    </li>
                </ul>

                <div class="tab-content bg_grey">
                    <div id="demo-stk-lft-tab-1" class="tab-pane fade <?php if($tab_name=="general_settings") {?>active in<?php } ?>">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('general_settings');?></h3>
                            </div>
							<?php
                                echo form_open(base_url() . 'index.php/admin/general_settings/set/', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => 'gen_set',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo translate('system_name');?></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="system_name" value="<?php echo $this->crud_model->get_type_name_by_id('general_settings','1','value'); ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" ><?php echo translate('system_email');?></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="system_email" value="<?php echo $this->crud_model->get_type_name_by_id('general_settings','2','value'); ?>"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" ><?php echo translate('system_title');?></label>
                                        <div class="col-sm-6">
                                            <input type="text" name="system_title" value="<?php echo $this->crud_model->get_type_name_by_id('general_settings','3','value'); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" ><?php echo translate('language');?></label>
                                        <div class="col-sm-6">
                                            <select name="language" class="demo-cs-multiselect">
                                            <?php
                                                $set_lang = $this->db->get_where('general_settings',array('type'=>'language'))->row()->value;
                                                $fields = $this->db->list_fields('language');
                                                foreach ($fields as $field)
                                                {
                                                    if($field !== 'word' && $field !== 'word_id'){
                                            ?>
                                                <option value="<?php echo $field; ?>" <?php if($set_lang == $field){ echo 'selected'; } ?> ><?php echo ucfirst($field); ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo translate('admin_notification_sound');?></label>
                                        <div class="col-sm-6">
                                            <input id="admin_noti_sound" class='sw5' data-set='set_admin_notification_sound' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('general_settings','45','value') == 'ok'){ ?>checked<?php } ?> />
                                        </div>
                                    </div>
                                    <?php
                                        $ad_volume = $this->crud_model->get_type_name_by_id('general_settings','46','value');
                                    ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" >
											<?php echo translate('admin_notification_volume');?>
                                            	</label>
                                        <div class="col-sm-4">
                                            <div class="range-def" data-start="<?php echo ($ad_volume*10); ?>" data-min="0" data-max="10" ></div>
                                            <div>
                                                <strong><?php echo translate('Volume_:_');?></strong>
                                                <span class="range-def-val"><?php echo $ad_volume; ?></span> / 10
                                                <input type="hidden" value="<?php echo $ad_volume; ?>" name="admin_notification_volume">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" >
											<?php echo translate('homepage_notification_sound');?>
                                            	</label>
                                        <div class="col-sm-6">
                                            <input id="home_noti_sound" class='sw5' data-set='set_home_notification_sound' type="checkbox" <?php if($this->crud_model->get_type_name_by_id('general_settings','49','value') == 'ok'){ ?>checked<?php } ?> />
                                        </div>
                                    </div>
                                    
                                    <?php
                                        $hom_volume = $this->crud_model->get_type_name_by_id('general_settings','50','value');
                                    ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" >
											<?php echo translate('homepage_notification_volume');?>
                                            	</label>
                                        <div class="col-sm-4">
                                            <div class="range-def" data-start="<?php echo ($hom_volume*10); ?>" data-min="0" data-max="10" ></div>
                                            <div>
                                                <strong><?php echo translate('Volume_:_');?></strong>
                                                <span class="range-def-val"><?php echo $hom_volume; ?></span> / 10
                                                <input type="hidden" value="<?php echo $hom_volume; ?>" name="homepage_notification_volume">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="nowslide">
                                </div>
                                <div class="panel-footer text-right">
                                    <span class="btn btn-success btn-labeled fa fa-check submitter" type="submit"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                        <?php echo translate('save');?>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <span id="genset"></span>
                    <div id="demo-home" class="tab-pane fade">             
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('home_page');?></h3>
                            </div>
                            <div class="panel-body">
								<?php
                                    echo form_open(base_url() . 'index.php/admin/ui_settings/ui_home/update/', array(
                                        'class' => 'form-horizontal',
                                        'method' => 'post',
                                        'id' => '',
                                        'enctype' => 'multipart/form-data'
                                    ));
                                ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo translate('home_category');?></label>
                                        <div class="col-sm-6">
                                            <?php
                                                $category = $this->crud_model->get_type_name_by_id('ui_settings','10','value');
                                                echo $this->crud_model->select_html('category','category','category_name','edit','demo-cs-multiselect',$category);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo translate('home_brands');?></label>
                                        <div class="col-sm-6">
                                            <?php
                                                $brands = $this->crud_model->get_type_name_by_id('ui_settings','13','value');
                                                echo $this->crud_model->select_html('brand','brand','name','edit','demo-cs-multiselect',$brands);
                                            ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="panel-footer text-right">
                                        <span class="btn btn-success btn-labeled fa fa-check submitter" type= data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                            <?php echo translate('save');?>
                                        </span>
                                    </div>
                                </form>     
                            </div>
                        </div>
                    </div>
                    <div id="demo-cat" class="tab-pane fade <?php if($tab_name=="category_page") {?>active in<?php } ?>">
                    <?php
                    $side_bar_pos=$this->db->get_where('ui_settings',array('type'=>"side_bar_pos_category"))->result_array();
                    ?>              
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('manage_category_page'); ?></h3>
                            </div>
                            <div class="panel-body">
                                <form action="<?php echo base_url(); ?>index.php/admin/ui_settings/ui_category/update/" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">
                                        	<?php echo translate('side_bar_position');?>
                                            	</label>
                                        <div class="col-sm-6">
                                           <?php
                                                foreach($side_bar_pos as $row1)
                                                {
                                                    $from = array('right','left');
                                                    echo $this->crud_model->select_html($from,'side_bar_pos','','edit','demo-chosen-select',$row1['value']);
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    <div class="panel-footer text-right">
                                        <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                            <?php echo translate('save');?>
                                        </span>
                                    </div>


                                </form>     
                            </div>
                        </div>
                    </div>
                    <div id="demo-stk-lft-tab-2" class="tab-pane fade">
                        <div class="col-md-12 col-sm-12">
                             <div class="col-md-12">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo translate('upload_logo');?></h3>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label" for="demo-hor-inputemail"></label>
                                    <div class="col-sm-10">
											<?php
                                                echo form_open(base_url() . 'index.php/admin/logo_settings/upload_logo', array(
                                                    'class' => 'dropzone',
                                                    'method' => 'post',
                                                    'id' => 'demo-dropzone',
                                                    'enctype' => 'multipart/form-data'
                                                ));
                                            ?>
                                            <div class="dz-default dz-message">
                                                <div class="dz-icon icon-wrap icon-circle icon-wrap-md">
                                                    <i class="fa fa-cloud-upload fa-3x"></i>
                                                </div>
                                                <div>
                                                    <p class="dz-text"><?php echo translate('drop_logos_to_upload');?></p>
                                                    <p class="text-muted"><?php echo translate('or_click_to_pick_manually');?></p>
                                                </div>
                                            </div>
                                            <div class="fallback">
                                                <input name="logo" type="file"  />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                             </div>
                         </div>
                         <br>
                         <div class="col-md-12 col-sm-12" style="margin-top:20px;">
                             <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo translate('all_logos');?></h3>
                                </div>
                                <div class="panel-body" id="list" >

                                </div>
                            </div>
                        </div>
                        <form >
                         <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo translate('select_logo');?></h3>
                                </div>
                                <?php
                                    $admin_login_logo = $this->db->get_where('ui_settings',array('type' => 'admin_login_logo'))->row()->value;
                                    $admin_nav_logo = $this->db->get_where('ui_settings',array('type' => 'admin_nav_logo'))->row()->value;
                                    $home_top_logo = $this->db->get_where('ui_settings',array('type' => 'home_top_logo'))->row()->value;
                                    $home_bottom_logo = $this->db->get_where('ui_settings',array('type' => 'home_bottom_logo'))->row()->value;
                                ?>
                                
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><?php echo translate('place');?></th>
                                                <th><?php echo translate('logo');?></th>
                                                <th class="text-right"><?php echo translate('options');?></th>
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                            <tr>
                                                <td><?php echo translate('admin_logo');?></td>
                                                <td>
                                                	<div class="inner-div tr-bg img-fixed">
                                                    	<img class="img-responsive img-sm" src="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $admin_login_logo; ?>.png" id="admin_login_logo">
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <span class="btn btn-info btn-labeled fa fa-plus-circle" 
                                                        onclick="ajax_modal('show_all/selectable','<?php echo translate('select_logo'); ?>','<?php echo translate('successfully_selected!'); ?>','logo_set','admin_login_logo')">
                                                            <?php echo translate('change');?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php echo translate('homepage_header_logo');?></td>
                                                <td>
                                                	<div class="inner-div tr-bg img-fixed">
                                                    	<img class="img-responsive img-sm" src="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $home_top_logo; ?>.png" id="home_top_logo" >
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <span class="btn btn-info btn-labeled fa fa-plus-circle" 
                                                        onclick="ajax_modal('show_all/selectable','<?php echo translate('select_logo'); ?>','<?php echo translate('successfully_selected!'); ?>','logo_set','home_top_logo')">
                                                            <?php echo translate('change');?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php echo translate('homepage_footer_logo');?></td>
                                                <td>
                                                	<div class="inner-div tr-bg img-fixed">
                                                    	<img class="img-responsive img-sm" src="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $home_bottom_logo; ?>.png" id="home_bottom_logo" alt="User_Image" >
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <span class="btn btn-info btn-labeled fa fa-plus-circle" 
                                                        onclick="ajax_modal('show_all/selectable','<?php echo translate('select_logo'); ?>','<?php echo translate('successfully_selected!'); ?>','logo_set','home_bottom_logo')">
                                                            <?php echo translate('change');?>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                             </div>         
                         </div>
                         </form>
                    </div>
                    
                    <!--UPLOAD : FAVICON---------->
                    <div id="demo-stk-lft-tab-3" class="tab-pane fade">
                         <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo translate('select_favicon');?></h3>
                                </div>
							<?php
                                echo form_open(base_url() . 'index.php/admin/favicon_settings/', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <div class="form-group margin-top-10">
                                    <label class="col-sm-3 control-label margin-top-10" for="demo-hor-inputemail">Favicon</label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-2">
                                            <?php $ext =  $this->db->get_where('ui_settings',array('type' => 'fav_ext'))->row()->value;?>
                                            <img class="img-responsive img-md img-circle img-border" src="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>" id="blah" >
                                        </div>
                                        <div class="col-sm-2">
                                        <span class="pull-left btn btn-default btn-file margin-top-10">
                                            <?php echo translate('select_favicon');?>
                                            <input type="file" name="fav" class="form-control" id="imgInp">
                                        </span>
                                        </div>
                                        <div class="col-sm-5"></div>
                                    </div>
                                </div>
                                <br />
                                <div class="panel-footer text-right">
                                    <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                        <?php echo translate('save');?>
                                    </span>
                                </div>
                            </form>	
                            </div>              
                        </div>
                    </div>
                    
                    <!--UPLOAD : SOCIAL LINKS---------->
                    <div id="demo-stk-lft-tab-4" class="tab-pane fade <?php if($tab_name=="social_links") {?>active in<?php } ?>">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('social_links');?></h3>
                            </div>
							<?php
                                echo form_open(base_url() . 'index.php/admin/social_links/set/', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <div class="panel-body">
                                    <!--FACEBOOK---------->
                                    <div class="form-group mar-btm">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <div class="input-group mar-btm">
                                                <span class="input-group-addon fb_font">
                                                    <i class="fa fa-facebook-square fa-lg"></i>
                                                </span>
                                                <input type="text" name="facebook" value="<?php echo $this->crud_model->get_type_name_by_id('social_links','1','value'); ?>" id="demo-hor-inputemail" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <!--G+---------->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" ></label>
                                        <div class="col-sm-6">
                                            <div class="input-group mar-btm">
                                                <span class="input-group-addon g_font">
                                                    <i class="fa fa-google-plus-square fa-lg"></i>
                                                </span>
                                                <input type="text" name="google-plus" value="<?php echo $this->crud_model->get_type_name_by_id('social_links','2','value'); ?>" id="demo-hor-inputemail" class="form-control">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--TWITTER---------->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" ></label>
                                        <div class="col-sm-6">
                                            <div class="input-group mar-btm">
                                                <span class="input-group-addon tw_font">
                                                    <i class="fa fa-twitter-square fa-lg"></i>
                                                </span>
                                                <input type="text" name="twitter" value="<?php echo $this->crud_model->get_type_name_by_id('social_links','3','value'); ?>" id="demo-hor-inputemail" class="form-control">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--PINTEREST---------->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" ></label>
                                        <div class="col-sm-6">
                                            <div class="input-group mar-btm">
                                                <span class="input-group-addon pin_font">
                                                    <i class="fa fa-pinterest fa-lg"></i>
                                                </span>
                                                <input type="text" name="pinterest" value="<?php echo $this->crud_model->get_type_name_by_id('social_links','5','value'); ?>" id="demo-hor-inputemail" class="form-control">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--SKYPE---------->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" ></label>
                                        <div class="col-sm-6">
                                            <div class="input-group mar-btm">
                                                <span class="input-group-addon skype_font">
                                                    <i class="fa fa-skype fa-lg"></i>
                                                </span>
                                                <input type="text" name="skype" value="<?php echo $this->crud_model->get_type_name_by_id('social_links','4','value'); ?>" id="demo-hor-inputemail" class="form-control">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--YOUTUBE---------->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" ></label>
                                        <div class="col-sm-6">
                                            <div class="input-group mar-btm">
                                                <span class="input-group-addon youtube_font">
                                                    <i class="fa fa-youtube fa-lg"></i>
                                                </span>
                                                <input type="text" name="youtube" value="<?php echo $this->crud_model->get_type_name_by_id('social_links','6','value'); ?>" id="demo-hor-inputemail" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--SAVE---------->
                                <div class="panel-footer text-right">
                                    <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                        <?php echo translate('save');?>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--UPLOAD : SOCIAL LINKS END---------->
                    <div id="demo-stk-lft-tab-c" class="tab-pane fade">
                        <div class="col-md-12">
                            <div class="panel">
                            <?php 
                                $discus_id = $this->db->get_where('general_settings',array('type'=>'discus_id'))->row()->value;
                            ?>
								<?php
                                    echo form_open(base_url() . 'index.php/admin/product_comment/', array(
                                        'class' => 'form-horizontal',
                                        'method' => 'post',
                                        'id' => '',
                                        'enctype' => 'multipart/form-data'
                                    ));
                                ?>
                                    <div class="panel-heading margin-bottom-15">
                                        <h3 class="panel-title"><?php echo translate('discus_settings');?></h3>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                        	<?php echo translate('discus_ID');?>
                                            	</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="discus_id" value="<?php echo $discus_id; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="panel-footer text-right">
                                        <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                            <?php echo translate('save');?>
                                        </span>
                                    </div>
                                </form> 
                            </div>                
                        </div>
                    </div>
                    <!--UPLOAD : SOCIAL LINKS END---------->
                    <div id="demo-stk-lft-tab-7" class="tab-pane fade">
                        <div class="col-md-12">
                            <div class="panel">
                <?php 
                    $appid =  $this->db->get_where('general_settings',array('type' => 'fb_appid'))->row()->value;
                    $secret =  $this->db->get_where('general_settings',array('type' => 'fb_secret'))->row()->value;                    
                    $application_name =  $this->db->get_where('general_settings',array('type' => 'application_name'))->row()->value;
                    $client_id =  $this->db->get_where('general_settings',array('type' => 'client_id'))->row()->value;
                    $client_secret =  $this->db->get_where('general_settings',array('type' => 'client_secret'))->row()->value;
                    $redirect_uri =  $this->db->get_where('general_settings',array('type' => 'redirect_uri'))->row()->value;
                    $api_key =  $this->db->get_where('general_settings',array('type' => 'fb_secret'))->row()->value;
					$fb_login_set = $this->crud_model->get_type_name_by_id('general_settings','51','value');
					$g_login_set = $this->crud_model->get_type_name_by_id('general_settings','52','value');
                ?>
							<?php
                                echo form_open(base_url() . 'index.php/admin/social_login_settings/', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                            <style>
                        	<?php if($fb_login_set !== 'ok'){ ?>
								.fb_log_ins{
									display: none;
								}
                        	<?php } if($g_login_set !== 'ok'){ ?>
								.g_log_ins{
									display: none;
								}
                        	<?php } ?>
							</style>
                                    <div class="panel-heading margin-bottom-15">
                                        <h3 class="panel-title"><?php echo translate('facebook_login_settings');?></h3> 
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail"><?php echo translate('status');?></label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input id="fb_login_set" class='sw5' data-set='fb_login_set' type="checkbox" <?php if($fb_login_set == 'ok'){ ?>checked<?php } ?> />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group fb_log_ins">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">App ID</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="appid" value="<?php echo $appid; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group fb_log_ins">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">Secret</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="secret" value="<?php echo $secret; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel-heading margin-bottom-15">
                                        <h3 class="panel-title"><?php echo translate('google+_login_settings');?></h3>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail"><?php echo translate('status');?></label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input id="g_login_set" class='sw5' data-set='g_login_set' type="checkbox" <?php if($g_login_set == 'ok'){ ?>checked<?php } ?> />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group g_log_ins" >
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
											Application Name
                                            	</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="application_name" value="<?php echo $application_name; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group g_log_ins">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                        	Client Id
                                            	</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="client_id" value="<?php echo $client_id; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group g_log_ins">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                        	Client Secret
                                            	</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="client_secret" value="<?php echo $client_secret; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group g_log_ins">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
											Redirect URI
                                            	</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="redirect_uri" value="<?php echo $redirect_uri; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group g_log_ins">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
											API key
                                            	</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="api_key" value="<?php echo $api_key; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="panel-footer text-right">
                                        <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                            <?php echo translate('save');?>
                                        </span>
                                    </div>
                                </form> 
                            </div>                
                        </div>
                    </div>
                    
                    <div id="demo-stk-lft-tab-8" class="tab-pane fade">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading margin-bottom-15">
                                    <h3 class="panel-title"><?php echo translate('save');?><?php echo translate('captcha_settings'); ?></h3>
                                </div>
                                <?php $cpub =  $this->db->get_where('general_settings',array('type' => 'captcha_public'))->row()->value;?>
                                <?php $cprv =  $this->db->get_where('general_settings',array('type' => 'captcha_private'))->row()->value;?>
								<?php
                                    echo form_open(base_url() . 'index.php/admin/captcha_settings/', array(
                                        'class' => 'form-horizontal',
                                        'method' => 'post',
                                        'id' => '',
                                        'enctype' => 'multipart/form-data'
                                    ));
                                ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
											<?php echo translate('public_key');?>
                                            	</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="cpub" value="<?php echo $cpub; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
											<?php echo translate('private_key');?>
                                            	</label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="cprv" value="<?php echo $cprv; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="panel-footer text-right">
                                        <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                            <?php echo translate('save');?>
                                        </span>
                                    </div>
                                </form> 
                            </div>                
                        </div>
                    </div>
                    
                    <!-- START : MANAGE SEO------>
                    <div id="demo-stk-lft-tab-5" class="tab-pane fade">
                         <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading margin-bottom-20">
                                    <h3 class="panel-title">
                                        <?php echo translate('manage_search_engine_optimization');?>
                                    </h3>
                                </div>
                            <?php 
                                $description =  $this->db->get_where('general_settings',array('type' => 'meta_description'))->row()->value;
                                $keywords =  $this->db->get_where('general_settings',array('type' => 'meta_keywords'))->row()->value;
                                $author =  $this->db->get_where('general_settings',array('type' => 'meta_author'))->row()->value;
                            ?>
							<?php
                                echo form_open(base_url() . 'index.php/admin/seo_settings/set', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                        <?php echo translate('keywords'); ?>
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-">
                                            <input type="text"  data-role="tagsinput" name="keywords" value="<?php echo $keywords; ?>" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                        <?php echo translate('author'); ?>
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-">
                                            <input type="text" name="author" value="<?php echo $author; ?>" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                        <?php echo translate('description'); ?>
                                    </label>
                                    <div class="col-sm-8">
                                        <div class="col-sm-">
                                            <textarea name="description" class="form-control" rows='8' ><?php echo $description; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer text-right">
                                    <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                    <?php echo translate('save');?></span>
                                </div>
                            </form>               
                        </div>
                        </div> 
                    </div>
                    <!-- END : MANAGE SEO-->
                    
                    <div id="demo-stk-lft-tab-p" class="tab-pane fade">
                        <div class="panel">
                            <?php 
                                $privacy_policy =  $this->db->get_where('general_settings',array('type' => 'privacy_policy'))->row()->value;
                            ?>
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('privacy_policy');?></h3>
                            </div>
							<?php
                                echo form_open(base_url() . 'index.php/admin/general_settings/privacy_policy/', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <div class="panel-body">
                                    <textarea class="summernotes" data-height='700' data-name='privacy_policy' ><?php echo $privacy_policy; ?></textarea>
                                    <!--===================================================-->
                                    <!-- End Summernote -->
                                </div>
                                <div class="panel-footer text-right">
                                    <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                        <?php echo translate('save');?>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div id="demo-stk-lft-tab-6" class="tab-pane fade">
                        <div class="panel">
                            <?php 
                                $terms_conditions =  $this->db->get_where('general_settings',array('type' => 'terms_conditions'))->row()->value;
                            ?>
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('terms_&_condition');?></h3>
                            </div>
							<?php
                                echo form_open(base_url() . 'index.php/admin/general_settings/terms/', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <div class="panel-body">
                                    <textarea class="summernotes" data-height='700' data-name='terms' ><?php echo $terms_conditions; ?></textarea>
                                    <!--===================================================-->
                                    <!-- End Summernote -->
                                </div>
                                <div class="panel-footer text-right">
                                    <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                        <?php echo translate('save');?>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div id="demo-contact" class="tab-pane fade">
                        <div class="panel">
                            <?php 
                                $contact_address =  $this->db->get_where('general_settings',array('type' => 'contact_address'))->row()->value;
                                $contact_phone =  $this->db->get_where('general_settings',array('type' => 'contact_phone'))->row()->value;
                                $contact_email =  $this->db->get_where('general_settings',array('type' => 'contact_email'))->row()->value;
                                $contact_website =  $this->db->get_where('general_settings',array('type' => 'contact_website'))->row()->value;
                                $contact_about =  $this->db->get_where('general_settings',array('type' => 'contact_about'))->row()->value;
                            ?>
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('contact_page');?></h3>
                            </div>
							<?php
                                echo form_open(base_url() . 'index.php/admin/general_settings/contact', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                            <?php echo translate('contact_address'); ?>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="contact_address" value="<?php echo $contact_address; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                            <?php echo translate('contact_phone'); ?>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="contact_phone" value="<?php echo $contact_phone; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                            <?php echo translate('contact_email'); ?>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="contact_email" value="<?php echo $contact_email; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                            <?php echo translate('contact_website'); ?>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <input type="text" name="contact_website" value="<?php echo $contact_website; ?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                            <?php echo translate('contact_about'); ?>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <textarea class="summernotes" data-height='400' data-name='contact_about'><?php echo $contact_about; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="panel-footer text-right">
                                    <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                        <?php echo translate('save');?>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div id="demo-footer" class="tab-pane fade">
                        <div class="panel">
                            <?php 
                                $footer_text =  $this->db->get_where('general_settings',array('type' => 'footer_text'))->row()->value;
                                $footer_category =  $this->db->get_where('general_settings',array('type' => 'footer_category'))->row()->value;
                            ?>
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('terms_&_condition');?></h3>
                            </div>
							<?php
                                echo form_open(base_url() . 'index.php/admin/general_settings/footer', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                            ?>
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                            <?php echo translate('footer_category'); ?>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <?php
                                                    echo $this->crud_model->select_html('category','footer_category','category_name','edit','demo-cs-multiselect',$footer_category);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                                            <?php echo translate('footer_text'); ?>
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="col-sm-">
                                                <textarea class="summernotes" data-height='400' data-name='footer_text'><?php echo $footer_text; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="panel-footer text-right">
                                    <span class="btn btn-success btn-labeled fa fa-check submitter"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                        <?php echo translate('save');?>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- for logo settings -->
<script>
    function load_logos(){
        ajax_load('<?php echo base_url(); ?>index.php/admin/logo_settings/show_all','list','');
    }
	$(document).ready(function() {
		
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
			now.focus();
        });
		
		// DROPZONE.JS
		// =================================================================
		// Require Dropzone
		// http://www.dropzonejs.com/
		// =================================================================
		Dropzone.options.demoDropzone = { // The camelized version of the ID of the form element
			// The configuration we've talked about above
			autoProcessQueue: true,
			uploadMultiple: true,
			parallelUploads: 25,
			maxFiles: 25,
	
			// The setting up of the dropzone
			init: function() {
    			var myDropzone = this;
                this.on("queuecomplete", function (file) {
                    load_logos();
                });
			}
		}
        load_logos();
		
	});

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#wrap').hide('fast');
                $('#blah').attr('src', e.target.result);
                $('#wrap').show('fast');
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });


    var base_url = '<?php echo base_url(); ?>'
    var user_type = 'admin';
    var module = 'logo_settings';
    var list_cont_func = 'show_all';
    var dlt_cont_func = 'delete_logo';
</script>
<!-- for logo settings -->



<script type="text/javascript">

    $(document).ready(function() {
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
    });



    $(".range-def").on('slide', function(){
        var vals    = $("#nowslide").val();
        $(this).closest(".form-group").find(".range-def-val").html(vals);
        $(this).closest(".form-group").find("input").val(vals);
    });

    function sets(now){
        $(".range-def").each(function(){
            var min = $(this).data('min');
            var max = $(this).data('max');
            var start = $(this).data('start');
            $(this).noUiSlider({
                start: Number(start) ,
                range: {
                    'min': Number(min),
                    'max': Number(max)
                }
            }, true);
            if(now == 'first'){
                $(this).noUiSlider({
                    start: 500 ,
                    connect : 'lower',
                    range: {
                        'min': 0 ,
                        'max': 10
                    }
                },true).Link('lower').to($("#nowslide"));
                $(this).closest(".form-group").find(".range-def-val").html(start);
                $(this).closest(".form-group").find("input").val(start);
            } else if(now == 'later'){
                var than = $(this).closest(".form-group").find(".range-def-val").html();
                
                if(than !== 'undefined'){
                    $(this).noUiSlider({
                        start: than,
                        connect : 'lower',
                        range: {
                            'min': min ,
                            'max': max
                        }
                    },true).Link('lower').to($("#nowslide"));
                } 
                $(this).closest(".form-group").find(".range-def-val").html(than);
                $(this).closest(".form-group").find("input").val(than);
            }
        });
    }
	$(document).ready(function() {
        sets('later');
		$("form").submit(function(e){
			return false;
		});
	});
</script>
<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
</script>
<style>
.img-fixed{
	width: 100px;	
}
.tr-bg{
background-image: url(http://www.mikechambers.com/files/html5/canvas/exportWithBackgroundColor/images/transparent_graphic.png)	
}

.cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}
 
.cc-selector input:active +.drinkcard-cc
{
	opacity: 1;
	border:4px solid #169D4B;
}
.cc-selector input:checked +.drinkcard-cc{
	-webkit-filter: none;
	-moz-filter: none;
	filter: none;
	border:4px solid #8400C5;
}
.drinkcard-cc{
	cursor:pointer;
	background-size:contain;
	background-repeat:no-repeat;
	display:inline-block;
	-webkit-transition: all 100ms ease-in;
	-moz-transition: all 100ms ease-in;
	transition: all 100ms ease-in;
	-webkit-filter:opacity(.8);
	-moz-filter:opacity(.8);
	filter:opacity(.8);
	transition: all .6s ease-in-out;
	border:4px solid transparent;
	border-radius:5px !important;
}
.drinkcard-cc:hover{
	-webkit-filter:opacity(1);
	-moz-filter: opacity(1);
	filter:opacity(1);
	transition: all .6s ease-in-out;
	border:4px solid #8400C5;
			
}
</style>
