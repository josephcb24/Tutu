<body class="header-fixed">
<div class="wrapper">
    <div class="header-v5 header-sticky header-fixed">
        <div class="topbar-v3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Topbar Navigation -->
                        <ul class="left-topbar">
                            <li>
                            	<?php
									if($set_lang = $this->session->userdata('language')){} else {
										$set_lang = $this->db->get_where('general_settings',array('type'=>'language'))->row()->value;
									}
								?>
                                <a>Language (<?php echo $set_lang; ?>)</a>
                                <ul class="language">
                                	<?php
                                    	$fields = $this->db->list_fields('language');
										foreach ($fields as $field)
										{
											if($field !== 'word' && $field !== 'word_id'){
									?>
                                    	<li <?php if($set_lang == $field){ ?>class="active"<?php } ?> >
                                        	<a href="<?php echo base_url(); ?>index.php/home/set_language/<?php echo $field; ?>">
												<?php echo $field; ?> 
												<?php if($set_lang == $field){ ?>
                                                	<i class="fa fa-check"></i>
												<?php } ?>
                                            </a>
                                        </li>
                                    <?php
											}
										}
									?>
                                </ul>
                            </li>   
                        </ul><!--/end left-topbar-->
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-inline right-topbar pull-right" id="loginsets">
                        </ul>
                    </div>
                </div>
            </div><!--/container-->
                
        </div>
        <!-- End Topbar v3 -->

        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only"><?php echo translate('toggle_navigation');?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home/">
                        <img id="logo-header" src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="Logo" class="img-responsive" style="width:350px;">
                    </a>
                </div>
                
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <!-- Badge -->
                    <ul class="list-inline shop-badge badge-lists badge-icons pull-right" id="added_list">
                    </ul>
                    <!-- End Badge -->
                    <ul class="nav navbar-nav">
                        <!-- Home -->
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/home/" class="dropdown-toggle" >
                                <?php echo translate('home'); ?>
                            </a>
                        </li>
                        <!-- End Home -->
                        
                        <!-- Books -->
                        <li class="dropdown mega-menu-fullwidth">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <?php echo translate('our_products'); ?>
                            </a>
                            <ul class="dropdown-menu ">
                                <li>
                                    <div class="mega-menu-content">
                                        <div class="container">
                                            <div class="row equal-height mega-menu">
                                            	<?php
                                                	$category = $this->db->get('category')->result_array();
													foreach($category as $row){
												?>
                                                 <div class="col-md-2 col-sm-12 equal-height-in">
                                                    <h3 class="mega-menu-heading">
                                                    	<a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category_id']; ?>/">
                                                    		<?php echo $row['category_name']; ?>
                                                        </a>
                                                    </h3>
                                                    <ul class="list-unstyled equal-height-list">
                                                    	<?php
															$sub_category = $this->db->get_where('sub_category',array('category' => $row['category_id']))->result_array();
															foreach($sub_category as $row1){
														?>
                                                        	<li>
                                                            	<a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category_id']; ?>/<?php echo $row1['sub_category_id']; ?>/">
                                                                	<?php echo $row1['sub_category_name']; ?>
                                                                </a>
                                                            </li>
														<?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <?php
													}
												?>
                                            </div><!--/end row-->
                                        </div><!--/end container-->
                                    </div><!--/end mega menu content-->  
                                </li>
                            </ul><!--/end dropdown-menu-->
                        </li>
                        <!-- End Header -->
                        


                        <!-- Featured -->
                        <li class="dropdown mega-menu-fullwidth">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" 
                            	data-toggle="dropdown">
                                	<?php echo translate('featured_product');?>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="mega-menu-content">
                                        <div class="container">
                                            <div class="row">
                                                
                                                <?php
													$this->db->order_by('product_id','desc');
													$this->db->limit(3);
                                                	$featured = $this->db->get_where('product',array('featured'=>'ok'))->result_array();
													foreach($featured as $row){
												?>
                                                <div class="col-md-3 md-margin-bottom-30">
                                                    <div class="overflow-h">
                                                        <a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
                                                            <div class="illustration-v1 illustration-img1">
                                                                <div class="illustration-bg" style="background:url('<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','one') ?>') no-repeat center center; background-size: 100% auto;">
                                                                    <div class="illustration-ads ad-details-v1" >
                                                                            <h4 style="background:rgba(205, 168, 168, 0.6); text-decoration:none; padding:3px; color:#fff;"><?php echo $row['title']; ?></h4>
                                                                    </div>    
                                                                </div>    
                                                            </div>
                                                        </a>
                                                    </div>    
                                                </div> 
                                                <?php
													}
												?>
                                                <div class="col-md-3 md-margin-bottom-30">
                                                    <div class="overflow-h">
                                                        <a href="<?php echo base_url(); ?>index.php/home/featured_item">
                                                            <div class="illustration-v1 illustration-img1">
                                                                <div class="illustration-bg">
                                                                    <div class="illustration-ads ad-details-v1" >
                                                                            <div class="btn-u btn-u-sea"><?php echo translate('see_more');?> <i class="fa fa-arrow-circle-right"></i></div>
                                                                    </div>    
                                                                </div>    
                                                            </div>
                                                        </a>
                                                    </div>    
                                                </div>
                                            </div><!--/end row-->
                                        </div><!--/end container-->
                                    </div><!--/end mega menu content-->  
                                </li>
                            </ul><!--/end dropdown-menu-->
                        </li>
                        <!-- End Featured -->

                        <!-- Home -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>index.php/home/contact/" class="dropdown-toggle" >
                                <?php echo translate('contact'); ?>
                            </a>
                        </li>
                        <!-- End Home -->
						<?php
                        	$pages = $this->db->get_where('page',array('status'=>'ok'))->result_array();
							foreach($pages as $row1){
						?>
                        <!-- Home -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>index.php/home/page/<?php echo $row1['parmalink']; ?>" class="dropdown-toggle" >
                                <?php echo translate($row1['page_name']); ?>
                            </a>
                        </li>
                        <!-- End Home -->
                        <?php
                        	}
						?>
                    </ul>
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header style1 ===-->
