<?php
     foreach($user_info as $row)
        {
?>
    <!--=== Profile ===-->
    <div class="profile container content">
    	<div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <?php if(file_exists('uploads/user_image/user_'.$row['user_id'].'.jpg')){ ?>
                    <img class="img-responsive profile-img margin-bottom-20" src="<?php echo base_url(); ?>uploads/user_image/user_<?php echo $row['user_id']; ?>.jpg" alt="User_Image">
                <?php } else if($row['fb_id'] !== ''){ ?>
                    <img class="img-responsive profile-img margin-bottom-20" src="https://graph.facebook.com/<?php echo $row['fb_id']; ?>/picture?type=large" alt="User_Image">
                <?php } else if($row['g_id'] !== ''){ ?>
                    <img class="img-responsive profile-img margin-bottom-20" src="<?php echo $row['g_photo']; ?>" alt="User_Image">
                <?php } else { ?>
                    <img class="img-responsive profile-img margin-bottom-20" src="<?php echo base_url(); ?>uploads/user_image/default.png" >
                <?php } ?>
                    <table class="table">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <center><h4><?php echo translate('personal_information');?></h4></center>
                            </td>                          
                        </tr>
                        <tr>
                            <th><?php echo translate('name');?></th>
                            <td> <?php echo $row['username'];?></td>                          
                        </tr> 
                        <tr>
                            <th><?php echo translate('email');?></th>
                            <td><?php echo $row['email'];?></td>                          
                        </tr> 
                        <tr>
                            <th><?php echo translate('phone');?></th>
                            <td><?php echo $row['phone'];?></td>                          
                        </tr> 
                        <tr>
                            <th><?php echo translate('address_line_1');?></th>
                            <td><?php echo $row['address1'];?></td>                          
                        </tr> 
                        <tr>
                            <th><?php echo translate('address_line_2');?></th>
                            <td><?php echo $row['address2'];?></td>                          
                        </tr> 
                        <tr>
                            <th><?php echo translate('city');?></th>
                            <td><?php echo $row['city'];?></td>                          
                        </tr>   
                    </tbody>
                </table>
                    
                    
            </div>
            <!--End Left Sidebar-->
            
            <div class="col-md-9">
                <!--Profile Body-->
                <div class="profile-body">
                	<div class="row margin-bottom-30">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="service-block-v3 service-block-u">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="service-heading">
                                	<?php echo translate('total_purchase');?>
                                </span>
                                <span class="counter">
                                	<?php echo currency().$this->crud_model->user_total(0); ?>
                                </span>
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small><?php echo translate('last_7_days');?></small>
                                        <h4 class="counter">
											<?php echo currency().$this->crud_model->user_total(7); ?>
                                        </h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small><?php echo translate('last_30_days');?></small>
                                        <h4 class="counter">
											<?php echo currency().$this->crud_model->user_total(30); ?>
                                        </h4>
                                    </div>
                                </div>            
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="service-block-v3 service-block-blue">
                                <i class="fa fa-heart"></i>
                                <span class="service-heading"><?php echo translate('wished_products');?></span>
                                <span class="counter">
                                	<?php echo $this->crud_model->user_wished(); ?>
                                </span>
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small><?php echo translate('user_since');?></small>
                                        <h4 class="counter">
                                        	<?php
                                            	echo date('d M, Y',$row['creation_date']);
											?>
                                        </h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small><?php echo translate('last_login');?></small>
                                        <h4 class="counter">
                                        	<?php
                                            	echo date('d M, Y',$row['last_login']);
											?>
                                        </h4>
                                    </div>
                                </div>            
                            </div>
                        </div>
                    </div><!--/end row-->

                    <div class="tab-v2">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-1" data-toggle="tab"><?php echo translate('purchase_history');?></a></li>
                            <li class=""><a href="#wishli" data-toggle="tab"><?php echo translate('wishlist');?></a></li>
                            <li class=""><a href="#tab-2" data-toggle="tab"><?php echo translate('edit_info');?></a></li>
                            <li class=""><a href="#tab-3" data-toggle="tab"><?php echo translate('change_password');?></a></li>
                        </ul>                
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab-1">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo translate('date');?></th>
                                            <th><?php echo translate('total');?></th>
                                            <th><?php echo translate('payment_status');?></th>
                                            <th><?php echo translate('delivery_status');?></th>
                                            <th><?php echo translate('invoice');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 0;
                                        $this->db->order_by('sale_id','desc');
                                        $sales = $this->db->get_where('sale',array('buyer'=>$row['user_id']))->result_array();
                                        foreach ($sales as $row1) {
                                            $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo date('d M Y',$row1['sale_datetime']); ?></td>
                                            <td><?php echo currency().$this->cart->format_number($row1['grand_total']); ?></td>
                                            <td><?php echo $row1['payment_status']; ?></td>
                                            <td><?php echo $row1['delivery_status']; ?></td>
                                            <td><a class="btn-u btn-u-cust btn-u btn-u-xs float-shadow" href="<?php echo base_url(); ?>index.php/home/invoice/<?php echo $row1['sale_id']; ?>"><?php echo translate('invoice');?></a></td>                          
                                        </tr>
                                        
                                    <?php
                                        }
                                    ?>   
                                    </tbody>
                                </table>                        
                            </div>
                            <div class="tab-pane fade" id="wishli">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo translate('image');?></th>
                                            <th><?php echo translate('name');?></th>
                                            <th><?php echo translate('price');?></th>
                                            <th><?php echo translate('availability');?></th>
                                            <th><?php echo translate('purchase');?></th>
                                            <th><?php echo translate('remove');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 0;
										$wishlist = json_decode($this->db->get_where('user',array('user_id'=>$row['user_id']))->row()->wishlist);
                                        foreach ($wishlist as $row1) {
                                            $i++;
											$query = $this->db->get_where('product',array('product_id'=>$row1))->row();
                                    ?>
                                    	
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
												<img src="<?php echo $this->crud_model->file_view('product',$row1,'','','thumb','src','multi','one'); ?>" width="100" />
                                            </td>
                                            <td>$<?php echo $query->title; ?></td>
                                            <td><?php echo currency().$this->crud_model->get_product_price($row1); ?></td>
                                            <td>
												<?php if($query->current_stock <= 0){ ?>
                                                	<span class="label label-dark">
														<?php echo translate('unvailable'); ?>
                                                    </span>
                                                <?php } else { ?>
                                                	<span class="label label-green">
														<?php echo translate('available'); ?>
                                                    </span>
												<?php } ?>
                                            </td>
                                            <td>
                                                <?php if($this->crud_model->is_added_to_cart($row1)){ ?>
                                                    <a class="tooltips btn-u btn-u-default disabled add_to_cart btn_radius2" data-type='icon'  data-original-title="<?php echo translate('add_to_cart'); ?>" data-toggle="tooltip" data-placement="top"   data-pid='<?php echo $row1; ?>' >
                                                    	<i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a class="tooltips btn-u btn-u-cust add_to_cart btn_radius2" data-original-title="<?php echo translate('added_to_cart'); ?>" data-toggle="tooltip" data-placement="top"    data-type='icon' data-pid='<?php echo $row1; ?>' >
                                                    	<i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a class="tooltips add-to-cart remove_from_wish" data-original-title="<?php echo translate('remove_from_wishlist'); ?>" data-placement="top" data-toggle="tooltip" data-pid='<?php echo $row1; ?>' >
                                                    <button class="tooltips btn-u btn-u-red" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </a>
                                            </td>                          
                                        </tr>
                                    <?php
                                        }
                                    ?>   
                                    </tbody>
                                </table>                        
                            </div>

                            <div class="tab-pane fade" id="tab-2">
                                <div class="row margin-bottom-40">
                                	<div class="col-md-12">
                        				<!-- Reg-Form -->
										<?php
                                            echo form_open(base_url() . 'index.php/home/registration/update_info/', array(
                                                'class' => 'sky-form log-reg-v3',
                                                'method' => 'post',
                                                'enctype' => 'multipart/form-data',
                                                'id' => 'sky-form4'
                                            ));
                                        ?>    
                                        	<?php
											foreach($user_info as $row)
												{
											?>
                                            <fieldset>                  
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-user"></i>
                                                        <input type="text" name="username" class="required" value="<?php echo $row['username'];?>">
                                                        <b class="tooltip tooltip-right"><?php echo translate('re-write your_first_name'); ?></b>
                                                    </label>
                                                </section> 

                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-user"></i>
                                                        <input type="text" name="surname" class="required" value="<?php echo $row['surname'];?>">
                                                        <b class="tooltip tooltip-right"><?php echo translate('re-write your_last_name'); ?></b>
                                                    </label>
                                                </section>
                                                
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-phone"></i>
                                                        <input type="text" name="phone" value="<?php echo $row['phone'];?>" >
                                                        <b class="tooltip tooltip-right">
															<?php echo translate('re-write_your_phone_number'); ?>
                                                            	</b>
                                                    </label>
                                                </section>
                                                
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-home"></i>
                                                        <input type="text" name="address1" class="required" value="<?php echo $row['address1'];?>">
                                                        <b class="tooltip tooltip-right"><?php echo translate('address_line_1'); ?></b>
                                                    </label>
                                                </section>
                                                
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-home"></i>
                                                        <input type="text" name="address2" value="<?php echo $row['address2'];?>">
                                                        <b class="tooltip tooltip-right"><?php echo translate('address_line_2'); ?></b>
                                                    </label>
                                                </section>
                                                
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-home"></i>
                                                        <input type="text" name="zip" 
                                                            value="<?php echo $row['zip'];?>" >
                                                        <b class="tooltip tooltip-right"><?php echo translate('ZIP_Code'); ?></b>
                                                    </label>
                                                </section>
                                                
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-university"></i>
                                                        <input type="text" name="city" class="required" 
                                                            value="<?php echo $row['city'];?>" >
                                                        <b class="tooltip tooltip-right"><?php echo translate('city_name'); ?></b>
                                                    </label>
                                                </section>
                                                
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-skype"></i>
                                                        <input type="text" name="skype" 
                                                            value="<?php echo $row['skype'];?>" >
                                                        <b class="tooltip tooltip-right">
															<?php echo translate('your_skype_id'); ?>
                                                            	</b>
                                                    </label>
                                                </section>
                                                
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-facebook"></i>
                                                        <input type="text" name="facebook" 
                                                            value="<?php echo $row['facebook'];?>" >
                                                        <b class="tooltip tooltip-right">
															<?php echo translate('your_facebook_profile_link');?>
                                                            	</b>
                                                    </label>
                                                </section>
                                                
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-google-plus"></i>
                                                        <input type="text" name="google_plus" 
                                                            value="<?php echo $row['google_plus'];?>" >
                                                        <b class="tooltip tooltip-right">
															<?php echo translate('your_google+_profile_link'); ?>
                                                            	</b>
                                                    </label>
                                                </section>
                        
                                                <section class="col-md-8">
                                                    <label for="file" class="input input-file">
                                                        <div class="button btn-u btn-u-cust">
                                                        	<input type="file" name="image" 
                                                            	onchange="document.getElementById('nam').value = this.value;">
                                                                	<?php echo translate('browse'); ?>
                                                        </div>
                                                        <input type="text" id="nam" placeholder="Change Profile Picture" readonly>
                                                    </label>
                                                </section>

                                            </fieldset>
                                            <?php
												}
											?>
                                            <footer>
                                            	<section class="col-md-8">
                                                    <div class="pull-right">
                                                        <span type="submit" class="btn-u btn-u-update btn-block margin-bottom-20 btn-labeled fa fa-check-circle submitter" data-msg='Info Updated!' data-ing='Updating..'>
															<?php echo translate('update_info')?>
                                                        </span>
                                                    </div>
                                                </section>
                                            </footer>
                                        </form>         
                                        <!-- End Reg-Form -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3">
                               <div class="row margin-bottom-40">
                               		<div class="col-md-12">
										<?php
                                            echo form_open(base_url() . 'index.php/home/registration/update_password/', array(
                                                'class' => 'sky-form',
                                                'method' => 'post',
                                                'enctype' => 'multipart/form-data',
                                                'id' => 'sky-form1',
												'novalidate' => 'novalidate'
                                            ));
                                        ?> 
                                            <fieldset>                  
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-lock"></i>
                                                        <input type="password" name="password" placeholder="<?php echo translate('current_password');?>">
                                                        <b class="tooltip tooltip-bottom-right">
															<?php echo translate('enter_your_current_password');?>
                                                        		</b>
                                                    </label>
                                                </section>
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-key"></i>
                                                        <input type="password" name="password1" class="pass pass1" placeholder="<?php echo translate('new_password');?>">
                                                        <b class="tooltip tooltip-bottom-right">
															<?php echo translate('enter_your_new_password');?>
                                                        		</b>
                                                    </label>
                                                </section>
                                                
                                                <section class="col-md-8">
                                                    <label class="input">
                                                        <i class="icon-append fa fa-thumbs-up"></i>
                                                        <input type="password" name="password2" class="pass pass2" placeholder="<?php echo translate('confirm_new_password');?>">
                                                        <b class="tooltip tooltip-bottom-right">
															<?php echo translate('re-enter_your_new_password');?></b>
                                                        <div id="pass_note"></div>
                                                    </label>
                                                </section>
                                            </fieldset>
                                            <footer>
                                               <section class="col-md-8">
                                                    <div class="pull-right">
                                                          <span class="btn btn-u btn-u-update btn-block margin-bottom-20 btn-labeled fa fa-key submitter pass_chng disabled" disabled='disabled' data-msg='Password Saved!' data-ing='Saving'><?php echo translate('save_password'); ?></span>
                                                    </div>
                                               </section>
                                            </footer>
                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Profile Body-->
            </div>
        </div><!--/end row-->
    </div><!--/container-->    
    <!--=== End Profile ===-->
<?php
    }
?>
<script>
	var mismatch = '<?php echo translate('password_mismatched'); ?>';
	var required = '<?php echo translate('required'); ?>';
	var must_number = '<?php echo translate('must_be_a_number'); ?>';
	var valid_email = '<?php echo translate('must_be_a_valid_email_address'); ?>';
	var incor = '<?php echo translate('incorrect_password'); ?>';
	var cur_sub_category = '<?php echo $cur_sub_category ?>';
    var cur_category = '<?php echo $cur_category ?>';
	var base_url = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo base_url(); ?>template/front/assets/js/custom/profile.js"></script>

