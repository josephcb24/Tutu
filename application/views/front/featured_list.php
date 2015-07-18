    <!--=== Content Part ===-->
    <div class="content container">
    <?php $side_bar_pos = 'right'; ?>
        <div class="row">
            <div class="col-md-3 filter-by-block md-margin-bottom-60 pull-<?php echo $side_bar_pos; ?>-md">
                <!-- MOST SOLD -->
                <div class="sdbar posts margin-bottom-20">
                    <h4 class="text_color center_text mr_top_0"><?php echo translate('most_sold'); ?></h4>
					<?php
                        $i = 0;
                            $most_popular = $this->crud_model->most_sold_products();
                            foreach ($most_popular as $row2){
                                $i++;
                                if($i <= 4){
									if(!empty($most_popular[$i])){
                                    	$now = $this->db->get_where('product',array('product_id'=>$most_popular[$i]['id']))->row();
									 
                    ?>
                    <dl class="dl-horizontal">
                        <dt>
                        	<a href="<?php echo $this->crud_model->product_link($now->product_id); ?>">
                            	<img src="<?php echo $this->crud_model->file_view('product',$now->product_id,'','','thumb','src','multi','one'); ?>" alt="" />
                            </a>
                        </dt>
                        <dd>
                            <p>
                            	<a href="<?php echo $this->crud_model->product_link($now->product_id); ?>">
									<?php echo $now->title; ?>
                                </a>
                            </p>
                            <p>
							<?php if($this->crud_model->get_type_name_by_id('product',$now->product_id,'discount') > 0){ ?>
                                <span>
                                    <?php echo currency().$this->crud_model->get_product_price($now->product_id); ?>
                                </span>
                                <span style=" text-decoration: line-through;color:#c9253c;">
                                    <?php echo currency().$now->sale_price; ?>
                                </span>
                            <?php } else { ?>
                                <span>
                                    <?php echo currency().$now->sale_price; ?>
                                </span>
                            <?php } ?>
                            </p>
                        </dd>
                    </dl>
					<?php		
								}
							}
                        }
                    ?>
                </div><!--/posts-->
                <!-- End Posts -->
                
                
				<!--=== home banner ===-->
                <div class="row margin-bottom-20">
                    <?php
                        $place = 'after_most_sold';
                        $query = $this->db->get_where('banner',array('page'=>'featured', 'place'=>$place, 'status' => 'ok'));
                        $banners = $query->result_array();
                        if($query->num_rows() > 0){
                            $r = 12/$query->num_rows();
                        }
                        foreach($banners as $row){
                    ?>
                        <a href="<?php echo $row['link']; ?>" >
                            <div class="col-md-<?php echo $r; ?> md-margin-bottom-30">
                                <div class="overflow-h">
                                    <div class="illustration-v1 illustration-img1">
                                        <div class="illustration-bg banner_cat" 
                                            style="background:url('<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src') ?>') no-repeat center center; background-size: 100% auto;" >
                                            
                                        </div>    
                                    </div>
                                </div>    
                            </div>
                        </a>
                    <?php
                        }
                    ?>
                </div>
                <!--=== home banner ===-->
                
                <!-- MOST VIEWED -->
                <div class="sdbar posts margin-bottom-20">
                    <h4 class="text_color center_text mr_top_0"><?php echo translate('most_viewed_products'); ?></h4>
					<?php
						$this->db->limit(4);
						$this->db->order_by('number_of_view','desc');
						$this->db->where('status','ok');
						$most_viewed = $this->db->get('product')->result_array();
						foreach ($most_viewed as $row2){
                    ?>
                    <dl class="dl-horizontal">
                        <dt>
                        	<a href="<?php echo $this->crud_model->product_link($row2['product_id']); ?>">
                            	<img src="<?php echo $this->crud_model->file_view('product',$row2['product_id'],'','','thumb','src','multi','one'); ?>" alt="" />
                            </a>
                        </dt>
                        <dd>
                            <p>
                            	<a href="<?php echo $this->crud_model->product_link($row2['product_id']); ?>">
									<?php echo $row2['title'] ?>
                                </a>
                            </p>
                            <p>
							<?php if($this->crud_model->get_type_name_by_id('product',$row2['product_id'],'discount') > 0){ ?>
                                <span>
                                    <?php echo currency().$this->crud_model->get_product_price($row2['product_id']); ?>
                                </span>
                                <span style=" text-decoration: line-through;color:#c9253c;">
                                    <?php echo currency().$row2['sale_price']; ?>
                                </span>
                            <?php } else { ?>
                                <span>
                                    <?php echo currency().$row2['sale_price']; ?>
                                </span>
                            <?php } ?>
                            </p>
                            
                        </dd>
                    </dl>
					<?php
                        }
                    ?>
                </div><!--/posts-->
                <!-- End Posts -->
                
				<!--=== home banner ===-->
                <div class="row margin-bottom-20">
                    <?php
                        $place = 'after_most_viewed';
                        $query = $this->db->get_where('banner',array('page'=>'featured', 'place'=>$place, 'status' => 'ok'));
                        $banners = $query->result_array();
                        if($query->num_rows() > 0){
                            $r = 12/$query->num_rows();
                        }
                        foreach($banners as $row){
                    ?>
                        <a href="<?php echo $row['link']; ?>" >
                            <div class="col-md-<?php echo $r; ?> md-margin-bottom-30">
                                <div class="overflow-h">
                                    <div class="illustration-v1 illustration-img1">
                                        <div class="illustration-bg banner_cat" 
                                            style="background:url('<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src') ?>') no-repeat center center; background-size: 100% auto;" >
                                            
                                        </div>    
                                    </div>
                                </div>    
                            </div>
                        </a>
                    <?php
                        }
                    ?>
                </div>
                <!--=== home banner ===-->
                                   
                <!-- MOST VIEWED -->
                <div class="sdbar posts margin-bottom-20">
                    <h4 class="text_color center_text mr_top_0"><?php echo translate('latest_products'); ?></h4>
					<?php
						$this->db->limit(4);
						$this->db->order_by('product_id','desc');
						$this->db->where('status','ok');
						$most_viewed = $this->db->get('product')->result_array();
						foreach ($most_viewed as $row2){
                    ?>
                    <dl class="dl-horizontal">
                        <dt>
                        	<a href="<?php echo $this->crud_model->product_link($row2['product_id']); ?>">
                            	<img src="<?php echo $this->crud_model->file_view('product',$row2['product_id'],'','','thumb','src','multi','one'); ?>" alt="" />
                            </a>
                        </dt>
                        <dd>
                            <p>
                            	<a href="<?php echo $this->crud_model->product_link($row2['product_id']); ?>">
									<?php echo $row2['title'] ?>
                                </a>
                            </p>
                            <p>
							<?php if($this->crud_model->get_type_name_by_id('product',$row2['product_id'],'discount') > 0){ ?>
                                <span>
                                    <?php echo currency().$this->crud_model->get_product_price($row2['product_id']); ?>
                                </span>
                                <span style=" text-decoration: line-through;color:#c9253c;">
                                    <?php echo currency().$row2['sale_price']; ?>
                                </span>
                            <?php } else { ?>
                                <span>
                                    <?php echo currency().$row2['sale_price']; ?>
                                </span>
                            <?php } ?>
                            </p>
                            
                        </dd>
                    </dl>
					<?php
                        }
                    ?>
                </div><!--/posts-->
                <!-- End Posts -->
                                   
                
            </div>
            
            <div class="col-md-9">
                <div class="row margin-bottom-5">
                    <div class="col-sm-8 result-category"></div>
                    <div class="col-sm-4">
                        <ul class="list-inline clear-both">
                            <li class="grid-list-icons">
                                <span class="viewers" data-typ="list"><i class="fa fa-th-list"></i></span>
                                <span class="viewers" data-typ="grid"><i class="fa fa-th"></i></span>
                            </li>
                        </ul>
                    </div>    
                </div><!--/end result category-->
                <div class="filter-results" id="list"></div>
                <div class="text-center pg_links" ></div>
                <!--/end filter resilts-->
             </div>
        </div><!--/end row-->
    </div><!--/end container-->    
    <!--=== End Content Part ===-->
    <input type="hidden" id="viewtype" value="list" />

<style>
	div.shadow {
		max-height:300px;
		min-height:300px;
		overflow:hidden;
	}
	
	.custom_item{
	  border: 1px solid #ccc;
	  border-radius: 4px !important;
		transition: all .2s ease-in-out;
		margin-top:10px !important;	
	}
	.custom_item:hover{
		webkit-transform: translate3d(0, -5px, 0);
	  -moz-transform: translate3d(0, -5px, 0);
	  -o-transform: translate3d(0, -5px, 0);
	  -ms-transform: translate3d(0, -5px, 0);
	  transform: translate3d(0, -5px, 0);
	  -webkit-box-shadow: 0 1px 11px rgba(0,0,0,0.25);
	  box-shadow: 0 1px 11px rgba(0,0,0,0.25);
	}
	
	.sub_cat{
		padding-left:30px !important;
	}
</style>
<?php
	echo form_open(base_url() . 'index.php/home/listed/', array(
		'method' => 'post',
		'id' => 'plistform',
        'enctype' => 'multipart/form-data'
	));
?>
<input type="hidden" name="category" id="categoryaa">
<input type="hidden" name="sub_category" id="sub_categoryaa">
<input type="hidden" name="featured" id="featuredaa">
</form>
<script>
	var add_to_cart = '<?php echo translate('add_to_cart'); ?>';
	var base_url = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo base_url(); ?>template/front/assets/js/custom/featured.js"></script>


