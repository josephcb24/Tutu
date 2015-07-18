<nav id="mainnav-container">
    <div id="mainnav">
        <!--Menu-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <ul id="mainnav-menu" class="list-group">
                        <!--Category name-->
                        <li class="list-header"></li>
            
                        <!--Menu list item-->
                        <li <?php if($page_name=="dashboard"){?> class="active-link" <?php } ?> 
                        	style="border-top:1px solid rgba(69, 74, 84, 0.7);">
                            <a href="<?php echo base_url(); ?>index.php/admin/">
                                <i class="fa fa-dashboard"></i>
                                <span class="menu-title">
									<?php echo translate('dashboard');?>
                                </span>
                            </a>
                        </li>
                        
            			<?php
                        	if($this->crud_model->admin_permission('category') ||
								$this->crud_model->admin_permission('sub_category') || 
									$this->crud_model->admin_permission('product') || 
										$this->crud_model->admin_permission('stock') ){
						?>
                        <!--Menu list item-->
                        <li <?php if($page_name=="category" || 
                                        $page_name=="sub_category" || 
                                            $page_name=="product" || 
                                                $page_name=="stock" ){?>
                                                     class="active-sub" 
                                                        <?php } ?> >
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                    <span class="menu-title">
                                        <?php echo translate('products');?>
                                    </span>
                                	<i class="fa arrow"></i>
                            </a>
            
                            <!--PRODUCT------------------->
                            <ul class="collapse <?php if($page_name=="category" || 
                                                            $page_name=="sub_category" ||  
                                                                $page_name=="product" || 
                                                                    $page_name=="brand" ||
                                                                        $page_name=="stock" ){?>
                                                                             in
                                                                                <?php } ?> >" >
                                
								<?php
                                    if($this->crud_model->admin_permission('category')){
                                ?>                                            
                                    <li <?php if($page_name=="category"){?> class="active-link" <?php } ?> >
                                        <a href="<?php echo base_url(); ?>index.php/admin/category">
                                        	<i class="fa fa-circle fs_i"></i>
                                        		<?php echo translate('category');?>
                                        </a>
                                    </li>
								<?php
									} if($this->crud_model->admin_permission('sub_category')){
                                ?>
                                    <li <?php if($page_name=="sub_category"){?> class="active-link" <?php } ?> >
                                        <a href="<?php echo base_url(); ?>index.php/admin/sub_category">
                                            <i class="fa fa-circle fs_i"></i>
                                            	<?php echo translate('sub-category');?>
                                        </a>
                                    </li>
								<?php
									} if($this->crud_model->admin_permission('brand')){
                                ?>
                                    <li <?php if($page_name=="brand"){?> class="active-link" <?php } ?> >
                                        <a href="<?php echo base_url(); ?>index.php/admin/brand">
                                        	<i class="fa fa-circle fs_i"></i>
                                            	<?php echo translate('brands');?>
                                        </a>
                                    </li>
								<?php
									} if($this->crud_model->admin_permission('product')){
                                ?>
                                    <li <?php if($page_name=="product"){?> class="active-link" <?php } ?> >
                                        <a href="<?php echo base_url(); ?>index.php/admin/product">
                                        	<i class="fa fa-circle fs_i"></i>
                                            	<?php echo translate('all_products');?>
                                        </a>
                                    </li>
								<?php
									} if($this->crud_model->admin_permission('stock')){
                                ?>
                                    <li <?php if($page_name=="stock"){?> class="active-link" <?php } ?> >
                                        <a href="<?php echo base_url(); ?>index.php/admin/stock">
                                        	<i class="fa fa-circle fs_i"></i>
                                        		<?php echo translate('product_stock');?>
                                        </a>
                                    </li>
								<?php
									}
                                ?>
                            </ul>
                        </li>
                      
            			<?php
							}
						?>  
                        
                        <!--SALE-------------------->
						<?php
							if($this->crud_model->admin_permission('sale')){
						?>
                        <!--Menu list item-->
                        <li <?php if($page_name=="sales"){?> class="active-link" <?php } ?>>
                            <a href="<?php echo base_url(); ?>index.php/admin/sales/">
                                <i class="fa fa-usd"></i>
                                    <span class="menu-title">
                                		<?php echo translate('sale');?>
                                    </span>
                            </a>
                        </li>
                        <?php
							}
						?>
						
                        <?php
							if($this->crud_model->admin_permission('report')){
						?>
                        <!--Menu list item-->
                        <li <?php if($page_name=="report" || 
                                        $page_name=="report_stock" ||
                                            $page_name=="report_wish" ){?>
                                                     class="active-sub" 
                                                        <?php } ?>>
                            <a href="#">
                                <i class="fa fa-file-text"></i>
                                    <span class="menu-title">
                                		<?php echo translate('reports');?>
                                    </span>
                                		<i class="fa arrow"></i>
                            </a>
                            
                            <!--REPORT-------------------->
                            <ul class="collapse <?php if($page_name=="report" || 
                                                            $page_name=="report_stock" ||
                                                                $page_name=="report_wish" ){?>
                                                                             in
                                                                                <?php } ?> ">
                                <li <?php if($page_name=="report"){?> class="active-link" <?php } ?> >
                                	<a href="<?php echo base_url(); ?>index.php/admin/report/">
                                    	<i class="fa fa-circle fs_i"></i>
                                            <?php echo translate('product_compare');?>
                                    </a>
                                </li>
                                <li <?php if($page_name=="report_stock"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>index.php/admin/report_stock/">
                                    	<i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('product_stock');?>
                                    </a>
                                </li>
                                <li <?php if($page_name=="report_wish"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>index.php/admin/report_wish/">
                                    	<i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('product_wishes');?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
							}
						?>

						
                        <?php
							if($this->crud_model->admin_permission('user')){
						?>
                        <!--Menu list item-->
                        <li <?php if($page_name=="user"){?> class="active-link" <?php } ?> >
                            <a href="<?php echo base_url(); ?>index.php/admin/user/">
                                <i class="fa fa-users"></i>
                                    <span class="menu-title">
                                		<?php echo translate('customers');?>
                                    </span>
                            </a>
                        </li>
                        <!--Menu list item-->
                        <?php
							}
						?>
                        
                        <?php
                            if($this->crud_model->admin_permission('page')){
                        ?>                      
                            <li <?php if($page_name=="page"){?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>index.php/admin/page/">
                                    <i class="fa fa-file-text"></i>
                                    <span class="menu-title">
                                        <?php echo translate('create_new_page');?>
                                    </span>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        <?php
                            if($this->crud_model->admin_permission('slider')){
                        ?>
                            <!--Menu list item-->
                            <li <?php if($page_name=="slider"){?> class="active-link" <?php } ?> >
                                <a href="<?php echo base_url(); ?>index.php/admin/slider/">
                                    <i class="fa fa-sliders"></i>
                                    <span class="menu-title">
                                        <?php echo translate('create_slider');?>
                                    </span>
                                </a>
                            </li>
                            <!--Menu list item-->
                        <?php
                            }
                        ?>
            			<?php
                        	if($this->crud_model->admin_permission('site_settings') ||
								$this->crud_model->admin_permission('banner')){
						?>
                        <li <?php if($page_name=="banner" || 
										$page_name=="site_settings" ){?>
                                         class="active-sub" 
                                            <?php } ?> >
                            <a href="#">
                                <i class="fa fa-desktop"></i>
                                    <span class="menu-title">
                                		<?php echo translate('front_settings');?>
                                    </span>
                                		<i class="fa arrow"></i>
                            </a>
            
                            <!--Submenu-->
                            <ul class="collapse <?php if($page_name=="banner" || 
    														$page_name=="site_settings" ){?>
                                                             in
                                                                <?php } ?>" >
                                
								
								
                                <?php
                                    if($this->crud_model->admin_permission('banner')){
                                ?>
                                    <!--Menu list item-->
                                    <li <?php if($page_name=="banner"){?> class="active-link" <?php } ?> >
                                        <a href="<?php echo base_url(); ?>index.php/admin/banner/">
                                            <i class="fa fa-circle fs_i"></i>
                                            	<?php echo translate('banner_settings');?>
                                        </a>
                                    </li>
                                    <!--Menu list item-->
                                <?php
                                    }
                                ?>
								<?php
                                    if($this->crud_model->admin_permission('site_settings')){
                                ?>                      
                                    <li <?php if($page_name=="site_settings"){?> class="active-link" <?php } ?> >
                                        <a href="<?php echo base_url(); ?>index.php/admin/site_settings/general_settings/">
                                            <i class="fa fa-circle fs_i"></i>
                                            	<?php echo translate('site_settings');?>
                                        </a>
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
						<?php
                            }
                        ?>
                        
                        
            			<?php
                        	if($this->crud_model->admin_permission('role') ||
								$this->crud_model->admin_permission('banner') ){
						?>
                        <li <?php if($page_name=="role" || 
                                        $page_name=="admin" ){?>
                                             class="active-sub" 
                                                <?php } ?> >
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span class="menu-title">
                                	<?php echo translate('staffs');?>
                                </span>
                                <i class="fa arrow"></i>
                            </a>
            
                            <ul class="collapse <?php if($page_name=="admin" || 
															$page_name=="role"){?>
                                                                 in
                                                                    <?php } ?>" >
                                
								<?php
                                    if($this->crud_model->admin_permission('admin')){
                                ?>
                                <li <?php if($page_name=="admin"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>index.php/admin/admins/">
                                        <i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('all_staffs');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                                <?php
                                    if($this->crud_model->admin_permission('role')){
                                ?>
                                <!--Menu list item-->
                                <li <?php if($page_name=="role"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>index.php/admin/role/">
                                        <i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('staff_permissions');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
						<?php
                            }
                        ?>
                        
            			<?php
                        	if($this->crud_model->admin_permission('newsletter') ||
								$this->crud_model->admin_permission('contact_message') ){
						?>
                        <li <?php if($page_name=="newsletter" || 
                                        $page_name=="contact_message" ){?>
                                             class="active-sub" 
                                                <?php } ?> >
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="menu-title">
                                	<?php echo translate('messaging');?>
                                </span>
                                <i class="fa arrow"></i>
                            </a>
            
                            <ul class="collapse <?php if($page_name=="newsletter" || 
															$page_name=="contact_message"){?>
                                                                 in
                                                                    <?php } ?>" >
                                
								<?php
                                    if($this->crud_model->admin_permission('newsletter')){
                                ?>
                                <li <?php if($page_name=="newsletter"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>index.php/admin/newsletter">
                                        <i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('newsletters');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                                
                                <?php
                                    if($this->crud_model->admin_permission('contact_message')){
                                ?>
                                <li <?php if($page_name=="contact_message"){?> class="active-link" <?php } ?> >
                                    <a href="<?php echo base_url(); ?>index.php/admin/contact_message">
                                        <i class="fa fa-circle fs_i"></i>
                                        	<?php echo translate('contact_messages');?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
						<?php
                            }
                        ?>

						
                        
                        <?php
							if($this->crud_model->admin_permission('language')){
						?> 
                        <li <?php if($page_name=="language"){?> class="active-link" <?php } ?> >
                            <a href="<?php echo base_url(); ?>index.php/admin/language_settings">
                                <i class="fa fa-language"></i>
                                <span class="menu-title">
                                	<?php echo translate('language');?>
                                </span>
                            </a>
                        </li>
                        <?php
							}
						?>
                        
                        
                        <?php
							if($this->crud_model->admin_permission('business_settings')){
						?>
                        <li <?php if($page_name=="business_settings"){?> class="active-link" <?php } ?> >
                            <a href="<?php echo base_url(); ?>index.php/admin/business_settings/">
                                <i class="fa fa-briefcase"></i>
                                <span class="menu-title">
                                	<?php echo translate('business_settings');?>
                                </span>
                            </a>
                        </li>
                        <?php
							}
						?>
                        
                        <li <?php if($page_name=="manage_admin"){?> class="active-link" <?php } ?> >
                            <a href="<?php echo base_url(); ?>index.php/admin/manage_admin/">
                                <i class="fa fa-lock"></i>
                                <span class="menu-title">
                                	<?php echo translate('manage_admin_profile');?>
                                </span>
                            </a>
                        </li>
                </div>
            </div>
        </div>
    </div>
</nav>