	<?php 
		$contact_address =  $this->db->get_where('general_settings',array('type' => 'contact_address'))->row()->value;
		$contact_phone =  $this->db->get_where('general_settings',array('type' => 'contact_phone'))->row()->value;
		$contact_email =  $this->db->get_where('general_settings',array('type' => 'contact_email'))->row()->value;
		$contact_website =  $this->db->get_where('general_settings',array('type' => 'contact_website'))->row()->value;
		$contact_about =  $this->db->get_where('general_settings',array('type' => 'contact_about'))->row()->value;
		
		$facebook =  $this->db->get_where('social_links',array('type' => 'facebook'))->row()->value;
		$googleplus =  $this->db->get_where('social_links',array('type' => 'google-plus'))->row()->value;
		$twitter =  $this->db->get_where('social_links',array('type' => 'twitter'))->row()->value;
		$skype =  $this->db->get_where('social_links',array('type' => 'skype'))->row()->value;
		$youtube =  $this->db->get_where('social_links',array('type' => 'youtube'))->row()->value;
		$pinterest =  $this->db->get_where('social_links',array('type' => 'pinterest'))->row()->value;
		
        $footer_text =  $this->db->get_where('general_settings',array('type' => 'footer_text'))->row()->value;
        $footer_category =  json_decode($this->db->get_where('general_settings',array('type' => 'footer_category'))->row()->value);
    ?>
    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div id='ajlin'></div>
    </div>
    <!-- End Modal -->

    <!-- Modal -->
    <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div id='ajlup'></div> 
    </div>
    <!-- End Modal -->

    <a data-toggle="modal" data-target="#login" id="loginss" ></a>
    <a data-toggle="modal" data-target="#registration" id="regiss" ></a>
    
<!--=== Footer ===-->

	<div class="footer-v2">
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <!-- About -->
                        <div class="col-md-3 md-margin-bottom-40">
                            <center><a href="<?php echo base_url(); ?>">
                            	<img id="logo-footer" class="footer-logo" width='100%'
                                	src="<?php echo $this->crud_model->logo('home_bottom_logo'); ?>" alt="">
                            </a></center>
                            
                            <p class="margin-bottom-10">
                            	<?php echo $footer_text; ?>
                            </p>

							<?php
                                echo form_open(base_url() . 'index.php/home/subscribe', array(
                                    'class' => 'footer-subsribe',
                                    'method' => 'post'
                                ));
                            ?>    
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email" placeholder="<?php echo translate('email_address'); ?>">                            
                                    <span class="input-group-btn">
                                        <span class="btn-u subscriber"><?php echo translate('subscribe'); ?></span>
                                    </span>
                                </div>                  
                            </form>                       
                        </div>
                        <!-- End About -->
                        
                        <!-- Link List -->
                        <div class="col-md-3 md-margin-bottom-40">
                            <div class="headline"><h2 class="heading-sm"><?php echo translate('categories'); ?></h2></div>
                            <ul class="list-unstyled link-list">
                            	<?php
                                	foreach($footer_category as $row){
								?>
                                <li>
                                	<a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row; ?>">
                                    	<?php
                                        	echo $this->crud_model->get_type_name_by_id('category',$row,'category_name');
										?>
                                    </a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <?php
									}
								?>
                            </ul>
                        </div>
                        <!-- End Link List -->                  

                        <!-- Link List -->
                        <div class="col-md-3 md-margin-bottom-40">
                            <div class="headline heading-v4"><h2 class="heading-sm"><?php echo translate('useful_links'); ?></h2></div>
                            <ul class="list-unstyled link-list">
                                <li>
                                	<a href="<?php echo base_url(); ?>index.php/home/">
                                    	<?php echo translate('home'); ?>
                                    </a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li>
                                	<a href="<?php echo base_url(); ?>index.php/home/category">
                                    	<?php echo translate('all_products'); ?>
                                    </a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li>
                                	<a href="<?php echo base_url(); ?>index.php/home/featured_item">
                                    	<?php echo translate('featured'); ?>
                                    </a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                                <li>
                                	<a href="<?php echo base_url(); ?>index.php/home/contact">
                                    	<?php echo translate('contact'); ?>
                                    </a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- End Link List -->  

                        <!-- Address -->
                        <div class="col-md-3 md-margin-bottom-40">
                            <div class="headline"><h2 class="heading-sm"><?php echo translate('contact_us'); ?></h2></div>                         
                            <address class="md-margin-bottom-40">
                                <i class="fa fa-home"></i>
									<?php echo $contact_address; ?> <br />
                                <i class="fa fa-phone"></i>
                                	<?php echo translate('phone'); ?>: <?php echo $contact_phone; ?> <br />
                                <i class="fa fa-globe"></i>
                                	<?php echo translate('website'); ?>: <a href="<?php echo $contact_website; ?>"><?php echo $contact_website; ?></a> <br />
                                <i class="fa fa-envelope"></i>
                                	<?php echo translate('email'); ?>: <a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a> 
                            </address>

                            <!-- Social Links -->
                            <ul class="social-icons">
                                <li>
                                	<a href="<?php echo $facebook; ?>" data-original-title="<?php echo translate('facebook'); ?>" 
                                    	class="rounded-x social_facebook"></a>
                                </li>
                                <li>
                                	<a href="<?php echo $twitter; ?>" data-original-title="<?php echo translate('twitter'); ?>" 
                                    	class="rounded-x social_twitter"></a>
                                </li>
                                <li>
                                	<a href="<?php echo $googleplus; ?>" data-original-title="<?php echo translate('google_plus'); ?>" 
                                    	class="rounded-x social_googleplus"></a>
                                </li>
                                <li>
                                	<a href="<?php echo $youtube; ?>" data-original-title="<?php echo translate('youtube'); ?>" 
                                    	class="rounded-x social_youtube"></a>
                                </li>
                            </ul>
                            <!-- End Social Links -->
                        </div>
                        <!-- End Address -->
                    </div>
                </div> 
            </div><!--/footer-->

            <div class="copyright">
                <div class="container">
                	<div class="row">
                    	<div class="col-md-7"> 
                        	<p class="pull-left list-unstyled link-list">2015 &copy; <?php echo translate('all_rights_reserved'); ?> @ <a target="_blank" href="<?php echo base_url(); ?>"><?php echo $system_title; ?></a> | <a target="_blank" href="<?php echo base_url(); ?>index.php/home/legal/terms_conditions"><?php echo translate('terms_&_condition'); ?></a> | <a target="_blank" href="<?php echo base_url(); ?>index.php/home/legal/privacy_policy"><?php echo translate('privacy_policy'); ?></a></p>
                        </div>
                    	<div class="col-md-5"> 
                        	 <ul class="list-inline sponsors-icons pull-right">
                            <li><i class="fa fa-cc-paypal cards"></i></li>
                            <li><i class="fa fa-cc-visa cards"></i></li>
                            <li><i class="fa fa-cc-mastercard cards"></i></li>
                            <li><i class="fa fa-cc-discover cards"></i></li>
                        </ul>

                        </div>
                    </div>
                </div> 
            </div><!--/copyright--> 
        </div>
<!--=== End Footer===-->

</div><!--/wrapper-->