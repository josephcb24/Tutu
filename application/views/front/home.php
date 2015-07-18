<!--=== home banner ===-->
<div class="container margin-bottom-20">
	<?php
		$place = 'after_slider';
        $query = $this->db->get_where('banner',array('page'=>'home', 'place'=>$place, 'status' => 'ok'));
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
                        <div class="illustration-bg banner_<?php echo $query->num_rows(); ?>" 
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


<!--=== Category wise products ===-->
<div class="container" style="margin-bottom: -40px;">
    <div class="heading heading-v1 margin-bottom-20">
        <h2><?php echo translate('featured_product');?></h2>
        <p></p>
    </div>
    
    <div class="illustration-v2 margin-bottom-60">
        <ul class="list-inline owl-slider-v2">
        <?php
            foreach($featured_data as $row1)
            {
        ?>
            <li class="item custom_item">
                <div class="product-img">
                    <a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>">
                        <div class="shadow" 
                            style="background: url('<?php echo $this->crud_model->file_view('product',$row1['product_id'],'','','thumb','src','multi','one'); ?>') no-repeat center center; 
                                background-size: 100% auto;">
                        </div>
                    </a>
                    
                    <a class="add-to-cart add_to_cart" data-type='text' data-pid='<?php echo $row1['product_id']; ?>' >
                        <i class="fa fa-shopping-cart"></i>
                        <?php if($this->crud_model->is_added_to_cart($row1['product_id'])){ ?>
                            <?php echo translate('added_to_cart');?>
                        <?php } else { ?>
                            <?php echo translate('add_to_cart');?>
                        <?php } ?>
                    </a>
                    <?php
                        if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'current_stock') <= 0){
                    ?>
                    <div class="shop-rgba-red rgba-banner" style="border-top-right-radius: 4px !important;"><?php echo translate('out_of_stock');?></div>
                    <?php
                        } else {
                            if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ 
                    ?>
                        <div class="shop-bg-green rgba-banner" style="border-top-right-radius: 4px !important;" >
                            <?php 
                                if($row1['discount_type'] == 'percent'){
                                    echo $row1['discount'].'%';
                                } else if($row1['discount_type'] == 'amount'){
                                    echo currency().$row1['discount'];
                                }
                            ?>
                            <?php echo ' '.translate('off'); ?>
                        </div>
                    <?php 
                            } 
                        }
                    ?>
                </div>
                <div class="product-description product-description-brd">
                    <div class="overflow-h margin-bottom-5">
                        <div class="col-md-9 pull-left" style="padding:0px;">
                            <h4 class="title-price"><a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><?php echo $row1['title'] ?></a></h4>
                            <span class="gender text-uppercase"><?php echo $this->crud_model->get_type_name_by_id('category',$row1['category'],'category_name'); ?></span>
                            <span class="gender"><?php echo $this->crud_model->get_type_name_by_id('sub_category',$row1['sub_category'],'sub_category_name'); ?></span>
                        </div>    
                        <div class="col-md-3 product-price" style="padding:0px;">
                            <?php if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ ?>
                                <span class="title-price"><?php echo currency().$this->crud_model->get_product_price($row1['product_id']); ?></span>
                                <span class="title-price line-through"><?php echo currency().$row1['sale_price']; ?></span>
                            <?php } else { ?>
                                <span class="title-price"><?php echo currency().$row1['sale_price']; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <ul class="list-inline product-ratings col-md-5 col-sm-5 col-xs-5 tooltips"
                        data-original-title="<?php echo $rating = $this->crud_model->rating($row1['product_id']); ?>"	
                            data-toggle="tooltip" data-placement="right" >
                        <?php
                            $rating = $this->crud_model->rating($row1['product_id']);
                            $r = $rating;
                            $i = 0;
                            while($i<5){
                                $i++;
                        ?>
                        <li>
                            <i class="rating<?php if($i<=$rating){ echo '-selected'; } $r--; ?> fa fa-star<?php if($r < 1 && $r > 0){ echo '-half';} ?>"></i>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <div class="col-md-6 col-sm-6 col-xs-6"></div>
                    <?php 
                        $wish = $this->crud_model->is_wished($row1['product_id']); 
                    ?>
                    
                    <ul class="list-inline product-ratings col-md-1 col-sm-1 col-xs-1 tooltips"
                         data-original-title="<?php if($wish == 'yes'){ ?><?php echo translate('added_to_wishlist');?><?php } else { ?><?php echo translate('add_to_wishlist');?><?php } ?>" 
                            data-toggle="tooltip" data-placement="left" >
                        <li class="like-icon">
                            <span data-pid='<?php echo $row1['product_id']; ?>'
                                class="<?php if($wish == 'yes'){ ?>wished_it<?php } else {?>wish_it<?php } ?>">
                                <i class="fa fa-heart"></i>
                            </span>
                        </li>
                    </ul>    
                </div>
            </li>   
        <?php
            }
        ?>
        </ul>
    </div>
</div>

<!--=== home banner ===-->
<div class="container margin-bottom-30">
	<?php
		$place = 'after_featured';
        $query = $this->db->get_where('banner',array('page'=>'home', 'place'=>$place, 'status' => 'ok'));
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
                        <div class="illustration-bg banner_<?php echo $query->num_rows(); ?>" 
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

<div class="parallax-team parallaxBg">
    <div class="container content">
        <div class="title-box-v2">
            <h2><?php echo translate('search_product');?></h2>
        </div>

        <div class="row">
            <?php
                echo form_open(base_url() . 'index.php/home/home_search/text', array(
                    'class' => 'sky-form',
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                    'style' => 'border:none !important;'
                ));
            ?>
                <div class="col-md-3 col-sm-6">
                    <label class="select">
                        <select name='category' id='category' >
                            <option value="0"><?php echo translate('choose_category');?></option>
                            <?php
                            	$categories = $this->db->get('category')->result_array();
								foreach($categories as $row){
							?>
                            	<option value="<?php echo $row['category_id']; ?>"><?php echo ucfirst($row['category_name']); ?></option>
                            <?php
								}
							?>
                        </select>
                        <i></i>
                    </label>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <label class="select">
                        <select name='sub_category' onchange='get_pricerange(this.value)'  id='sub_category'>
                            <option value="0"><?php echo translate('choose_sub_category');?></option>
                        </select>
                        <i></i>
                    </label>
                </div>
                
                <div class="col-md-3 col-sm-6" id="range">
                    <input type="text" id="rangelvl" value="" name="range" />
                    <script>
						$( document ).ready(function() {
							$("#rangelvl").ionRangeSlider({
								hide_min_max: false,
								keyboard: true,
								min:<?php echo $min; ?>,
								max:<?php echo $max; ?>,
								from:<?php echo $min; ?>,
								to:<?php echo $max; ?>,
								type: "double",
								step: 1,
								prefix: "$",
								grid: true,
								onFinish: function (data) {
									filter('click','none','none','0');
								}
							});
                    	});
                    </script>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <input type="submit" class="form-control" value="Search">
                </div>
            </form>
            
        </div>
    </div>
</div>    



<div class="container margin-top-20">
	<?php
		$place = 'after_search';
        $query = $this->db->get_where('banner',array('page'=>'home', 'place'=>$place, 'status' => 'ok'));
        $banners = $query->result_array();
        if($query->num_rows() > 0){
            $r = 12/$query->num_rows();
        }
        foreach($banners as $row){
    ?>
        <a href="<?php echo $row['link']; ?>" >
            <div class="col-md-<?php echo $r; ?> md-margin-bottom-30">
                <div class="overflow-h margin-top-5">
                    <div class="illustration-v1 illustration-img1">
                        <div class="illustration-bg banner_<?php echo $query->num_rows(); ?>" 
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

<div class="container content">
    <div class="row">
    <div class="col-md-12">
            <!-- Owl Carousel v2 -->
            <?php
				$n = 0;
                $category = json_decode($this->crud_model->get_type_name_by_id('ui_settings','10','value'));
                foreach($category as $row)
                {
                    $this->db->limit(9);
                    $this->db->order_by('product_id','desc');
                    $product = $this->db->get_where('product',array('category'=>$row,'status'=>'ok'))->result_array();
                    $sub_cats = $this->db->get_where('sub_category',array('category'=>$row))->result_array();
					
					if($n>4){
						$n = 0;
					}
					$n++;
					
            ?>
                <!-- Tab v1 -->               
                <div class="tab-v2 margin-bottom-30" style="background:#fff;box-shadow: 0px 0px 6px 1px #ddd;">
                    <ul class="nav nav-tabs full theme_<?php echo $n; ?>" style="background:#F9F9F9;">
                        <li>
                        	<div onClick="return false;" data-toggle="tab">
                            	<?php echo $this->crud_model->get_type_name_by_id('category',$row,'category_name'); ?>
                        	</div>
                        </li>
                        <?php
							$l = 0;
							foreach($sub_cats as $row3){
							$num_product = $this->db->get_where('product',array('sub_category'=>$row3['sub_category_id'],'status'=>'ok'))->num_rows();
								if($num_product > 0){
									$l++;
						?>
                        	<li <?php if($l == 1){ ?>class="active"<?php } ?> >
                            	<a href="#sub_<?php echo $row3['sub_category_id'] ?>" data-toggle="tab">
									<?php echo $row3['sub_category_name'] ?>
                                </a>
                            </li>
                        <?php
								}
							}
						?>
                        <li class="pull-right">
                            <div class="owl-btn next tab_hov" style="padding:5px 13px !important;">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </li>
                        <li class="pull-right">
                            <div class="owl-btn prev tab_hov" style="padding:5px 13px !important;">
                                <i class="fa fa-angle-left"></i>
                            </div>
                        </li>
                    </ul>            
                    <div class="tab-content">
                        <?php
							$a = 0;
							foreach($sub_cats as $row3){
							$num_product = $this->db->get_where('product',array('sub_category'=>$row3['sub_category_id'],'status'=>'ok'))->num_rows();
								if($num_product > 0){
								$a++;
						?>
                        <div class="tab-pane fade in <?php if($a == 1){echo 'active';} ?>" id="sub_<?php echo $row3['sub_category_id'] ?>">
                            <div class="row">
                                <div class="illustration-v2 margin-bottom-60">
                                    <ul class="list-inline owl-slider-v2">
                                        <?php
                                            $this->db->limit(9);
                                            $this->db->order_by('product_id','desc');
                                            $sub_product = $this->db->get_where('product',array('sub_category'=>$row3['sub_category_id'],'status'=>'ok'))->result_array();
                                            foreach($sub_product as $row1)
                                            {
                                        ?>
                                        <li class="item custom_item">
                                            <div class="product-img">
                                            
                                                <a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>">
                                                    <div class="shadow" 
                                                        style="background: url('<?php echo $this->crud_model->file_view('product',$row1['product_id'],'','','thumb','src','multi','one'); ?>') no-repeat center center; 
                                                            background-size: 100% auto;">
                                                    </div>
                                                    
                                                </a>
                                                
                                                <a class="add-to-cart add_to_cart" data-type='text' data-pid='<?php echo $row1['product_id']; ?>' >
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <?php if($this->crud_model->is_added_to_cart($row1['product_id'])){ ?>
                                                        <?php echo translate('added_to_cart');?>
                                                    <?php } else { ?>
                                                        <?php echo translate('add_to_cart');?>
                                                    <?php } ?>
                                                </a>
                                                <?php
                                                    if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'current_stock') <= 0){
                                                ?>
                                                <div class="shop-rgba-red rgba-banner" style="border-top-right-radius: 4px !important;"><?php echo translate('out_of_stock');?></div>
                                                <?php
                                                    } else {
                                                        if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ 
                                                ?>
                                                    <div class="shop-bg-green rgba-banner" style="border-top-right-radius: 4px !important;" >
                                                        <?php 
                                                            if($row1['discount_type'] == 'percent'){
                                                                echo $row1['discount'].'%';
                                                            } else if($row1['discount_type'] == 'amount'){
                                                                echo currency().$row1['discount'];
                                                            }
                                                        ?>
                                                        <?php echo ' '.translate('off'); ?>
                                                    </div>
                                                <?php 
                                                        } 
                                                    }
                                                ?>
                                            </div>
                                            <div class="product-description product-description-brd">
                                                <div class="overflow-h margin-bottom-5">
                                                    <div class="col-md-9 pull-left" style="padding:0px;">
                                                        <h4 class="title-price"><a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><?php echo $row1['title'] ?></a></h4>
                                                        <span class="gender text-uppercase"><?php echo $this->crud_model->get_type_name_by_id('category',$row1['category'],'category_name'); ?></span>
                                                        <span class="gender"><?php echo $this->crud_model->get_type_name_by_id('sub_category',$row1['sub_category'],'sub_category_name'); ?></span>
                                                    </div>    
                                                    <div class="col-md-3 product-price" style="padding:0px;">
                                                        <?php if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ ?>
                                                            <span class="title-price"><?php echo currency().$this->crud_model->get_product_price($row1['product_id']); ?></span>
                                                            <span class="title-price line-through"><?php echo currency().$row1['sale_price']; ?></span>
                                                        <?php } else { ?>
                                                            <span class="title-price"><?php echo currency().$row1['sale_price']; ?></span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <ul class="list-inline product-ratings col-md-5 col-sm-5 col-xs-5 tooltips"
                                                    data-original-title="<?php echo $rating = $this->crud_model->rating($row1['product_id']); ?>"	
                                                        data-toggle="tooltip" data-placement="right" >
                                                    <?php
                                                        $rating = $this->crud_model->rating($row1['product_id']);
                                                        $r = $rating;
                                                        $i = 0;
                                                        while($i<5){
                                                            $i++;
                                                    ?>
                                                    <li>
                                                        <i class="rating<?php if($i<=$rating){ echo '-selected'; } $r--; ?> fa fa-star<?php if($r < 1 && $r > 0){ echo '-half';} ?>"></i>
                                                    </li>
                                                    <?php
                                                        }
                                                    ?>
                                                </ul>
                                                <div class="col-md-6 col-sm-6 col-xs-6"></div>
                                                <?php 
                                                    $wish = $this->crud_model->is_wished($row1['product_id']); 
                                                ?>
                                                
                                                <ul class="list-inline product-ratings col-md-1 col-sm-1 col-xs-1 tooltips"
                                                     data-original-title="<?php if($wish == 'yes'){ ?><?php echo translate('added_to_wishlist');?><?php } else { ?><?php echo translate('add_to_wishlist');?><?php } ?>" 
                                                        data-toggle="tooltip" data-placement="left" >
                                                    <li class="like-icon">
                                                        <span data-pid='<?php echo $row1['product_id']; ?>'
                                                            class="<?php if($wish == 'yes'){ ?>wished_it<?php } else {?>wish_it<?php } ?>">
                                                            <i class="fa fa-heart"></i>
                                                        </span>
                                                    </li>
                                                </ul>    
                                            </div>
                                        </li>
                                        <?php
                                            }
                                        ?>    
                                    </ul>
                                 </div>
                            </div>
                        </div>
                        <?php
								}
							}
						?>
                        
                        
                    </div>
                </div>
                <!-- End Tab v1 -->  
             <?php
                }
            ?>    
        </div>
        
        <!--=== home banner ===-->
        <div class="col-md-12">
            <div class="container">
                <?php
                    $place = 'after_category';
                    $query = $this->db->get_where('banner',array('page'=>'home', 'place'=>$place, 'status' => 'ok'));
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
                                    <div class="illustration-bg banner_<?php echo $query->num_rows(); ?>" 
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
        </div>
        
        
        <!--=== Illustration v4 ===-->
        <div class="row illustration-v4 margin-bottom-20">
            <div class="col-md-4">
                <div class="heading margin-bottom-10 margin-top-20">
                    <h2><?php echo  translate('latest_products'); ?></h2>
                </div>
				<?php
					$this->db->limit(3);
					$this->db->order_by('product_id','desc');
					$this->db->where('status','ok');
					$latest = $this->db->get('product')->result_array();
					foreach ($latest as $row2){
                ?>
                <div class="thumb-product">
                    <div class="thumb-product-img" style="background:url('<?php echo $this->crud_model->file_view('product',$row2['product_id'],'','','thumb','src','multi','one'); ?>') no-repeat center center; background-size: 100% auto;"></div>
                    <div class="thumb-product-in">
                        <h4><a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><?php echo $row2['title'] ?></a></h4>
                        <span class="thumb-product-type"><?php echo $this->crud_model->get_type_name_by_id('category',$row2['category'],'category_name'); ?></span>
                    </div>
                    <ul class="list-inline overflow-h">
					<?php if($this->crud_model->get_type_name_by_id('product',$row2['product_id'],'discount') > 0){ ?>
                        <li class="thumb-product-price">
							<?php echo currency().$this->crud_model->get_product_price($row2['product_id']); ?>
                        </li>
                        <li class="thumb-product-price line-through">
							<?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } else { ?>
                        <li class="thumb-product-price">
							<?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } ?>
                        <li class="thumb-product-purchase">
                            <span data-original-title="<?php echo translate('add_to_cart'); ?>" data-toggle="tooltip" data-placement="left"  class="tooltips add-to-cart add_to_cart" data-type='icon' data-pid='<?php echo $row2['product_id']; ?>' >
                                <?php if($this->crud_model->is_added_to_cart($row2['product_id'])){ ?>
                                	<i style="color:#18ba9b" class="fa fa-shopping-cart"></i>
                                <?php } else { ?>
                                    <i class="fa fa-shopping-cart"></i>
                                <?php } ?>
                            </span> 
                            |
                            <?php if($this->crud_model->is_wished($row2['product_id'])=='yes'){ ?>
                                <span data-original-title="<?php echo translate('added_to_wishlist');?>" data-toggle="tooltip" data-placement="left" class="tooltips wished_it">
                                	<i class="fa fa-heart"></i>
                                </span>
                            <?php } else { ?>
                                <span data-original-title="<?php echo translate('add_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips wish_it">
                                	<i class="fa fa-heart"></i>
                                </span>
                            <?php } ?>
                        </li>
                    </ul>    
                </div>
                <?php
					}
				?>
            </div>
            
            <div class="col-md-4">
                <div class="heading margin-bottom-10 margin-top-20">
                    <h2><?php echo  translate('most_sold'); ?></h2>
                </div>
				<?php
					$i = 0;
					$most_popular = $this->crud_model->most_sold_products();
                    foreach ($most_popular as $row2){
						$i++;
						if($i <= 3){
							$now = $this->db->get_where('product',array('product_id'=>$most_popular[$i]['id']))->row();
                ?>
                <div class="thumb-product">
                    <div class="thumb-product-img" style="background:url('<?php echo $this->crud_model->file_view('product',$now->product_id,'','','thumb','src','multi','one'); ?>') no-repeat center center; background-size: 100% auto;"></div>
                    <div class="thumb-product-in">
                        <h4><a href="<?php echo $this->crud_model->product_link($now->product_id); ?>"><?php echo $now->title; ?></a></h4>
                        <span class="thumb-product-type"><?php echo $this->crud_model->get_type_name_by_id('category',$now->category,'category_name'); ?></span>
                    </div>
                    <ul class="list-inline overflow-h">
					<?php if($this->crud_model->get_type_name_by_id('product',$now->product_id,'discount') > 0){ ?>
                        <li class="thumb-product-price">
							<?php echo currency().$this->crud_model->get_product_price($now->product_id); ?>
                        </li>
                        <li class="thumb-product-price line-through">
							<?php echo currency().$now->sale_price; ?>
                        </li>
                    <?php } else { ?>
                        <li class="thumb-product-price">
							<?php echo currency().$now->sale_price; ?>
                        </li>
                    <?php } ?>
                        <li class="thumb-product-purchase">
                            <span data-original-title="Add to Cart" data-toggle="tooltip" data-placement="left"  class="tooltips add-to-cart add_to_cart" data-type='icon' data-pid='<?php echo $now->product_id; ?>' >
                                <?php if($this->crud_model->is_added_to_cart($now->product_id)){ ?>
                                	<i style="color:#18ba9b" class="fa fa-shopping-cart"></i>
                                <?php } else { ?>
                                    <i class="fa fa-shopping-cart"></i>
                                <?php } ?>
                            </span> 
                            |
                            <?php if($this->crud_model->is_wished($now->product_id)=='yes'){ ?>
                                <span data-original-title="<?php echo translate('added_to_wishlist');?>" data-toggle="tooltip" data-placement="left" class="tooltips wished_it">
                                	<i class="fa fa-heart"></i>
                                </span>
                            <?php } else { ?>
                                <span data-original-title="<?php echo translate('add_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $now->product_id; ?>' class="tooltips wish_it">
                                	<i class="fa fa-heart"></i>
                                </span>
                            <?php } ?>
                        </li>
                    </ul>    
                </div>
                <?php
						}
					}
				?>
                
            </div>
            
            <div class="col-md-4">
                <div class="heading margin-bottom-10 margin-top-20">
                    <h2><?php echo  translate('most_viewed_products'); ?></h2>
                </div>
				<?php
					$this->db->limit(3);
                    $this->db->order_by('number_of_view','desc');
					$this->db->where('status','ok');
					$most_viewed = $this->db->get('product')->result_array();
					foreach ($most_viewed as $row2){
                ?>
                <div class="thumb-product">
                    <div class="thumb-product-img" style="background:url('<?php echo $this->crud_model->file_view('product',$row2['product_id'],'','','thumb','src','multi','one'); ?>') no-repeat center center; background-size: 100% auto;"></div>
                    <div class="thumb-product-in">
                        <h4><a href="<?php echo $this->crud_model->product_link($row2['product_id']); ?>"><?php echo $row2['title'] ?></a></h4>
                        <span class="thumb-product-type"><?php echo $this->crud_model->get_type_name_by_id('category',$row2['category'],'category_name'); ?></span>
                    </div>
                    <ul class="list-inline overflow-h">
					<?php if($this->crud_model->get_type_name_by_id('product',$row2['product_id'],'discount') > 0){ ?>
                        <li class="thumb-product-price">
							<?php echo currency().$this->crud_model->get_product_price($row2['product_id']); ?>
                        </li>
                        <li class="thumb-product-price line-through">
							<?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } else { ?>
                        <li class="thumb-product-price">
							<?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } ?>
                        <li class="thumb-product-purchase">
                            <span data-original-title="<?php echo translate('add_to_cart'); ?>" data-toggle="tooltip" data-placement="left"  class="tooltips add-to-cart add_to_cart" data-type='icon' data-pid='<?php echo $row2['product_id']; ?>' >
                                <?php if($this->crud_model->is_added_to_cart($row2['product_id'])){ ?>
                                	<i style="color:#AB00FF" class="fa fa-shopping-cart"></i>
                                <?php } else { ?>
                                    <i class="fa fa-shopping-cart"></i>
                                <?php } ?>
                            </span>
                            |
                            <?php if($this->crud_model->is_wished($row2['product_id'])=='yes'){ ?>
                                <span data-original-title="<?php echo translate('added_to_wishlist');?>" data-toggle="tooltip" data-placement="left" class="tooltips wished_it">
                                	<i class="fa fa-heart"></i>
                                </span>
                            <?php } else { ?>
                                <span data-original-title="<?php echo translate('add_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips wish_it">
                                	<i class="fa fa-heart"></i>
                                </span>
                            <?php } ?>
                        </li>
                    </ul>    
                </div>
                <?php
					}
				?>
            </div>
        </div><!--/end row-->

        
		<?php
            $i = 0;
            $brands = json_decode($this->crud_model->get_type_name_by_id('ui_settings','13','value'));
            if($brands){
		?>
        <!--=== Sponsors ===-->
        <div class="container content">
            <div class="heading margin-bottom-20">
                <h2><?php echo translate('our_available_brands'); ?></h2>
            </div>
    
            <ul class="list-inline owl-sponsor">
            	<?php
					foreach($brands as $row1)
					{
						$brand = $this->db->get_where('brand',array('brand_id'=>$row1))->result_array();
						foreach($brand as $row)
						{
						$i++;
				?>
                        <li class="item <?php if($i==1){ ?>first-child<?php } ?>">
                            <img src="<?php echo $this->crud_model->file_view('brand',$row['brand_id'],'','','no','src','','','.png') ?>" alt="">
                        </li>
                <?php
							}
						}
					}
				?>
            </ul><!--/end owl-carousel-->
        </div>
</div>
</div>
             
<script>
	$('#category').on('change', function(){
		var category = $('#category').val();
		var list1 = $('#sub_category');
		var list2 = $('#range');
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/others/get_sub_by_cat/'+category,
			beforeSend: function() {
				list1.html('...');
			},
			success: function(data) {
				list1.html(data);
			},
			error: function(e) {
				console.log(e)
			}
		});
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/others/get_range_by_cat/'+category,
			beforeSend: function() {
				list2.html('...');
			},
			success: function(data) {
				list2.html(data);
			},
			error: function(e) {
				console.log(e)
			}
		});
	});
	$('#sub_category').on('change', function(){
		var sub_category = $('#sub_category').val();
		var list2 = $('#range');
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/others/get_range_by_sub/'+sub_category,
			beforeSend: function() {
				list2.html('...');
			},
			success: function(data) {
				list2.html(data);
			},
			error: function(e) {
				console.log(e)
			}
		});
	});
	function filter(){}
</script>
<style>

div.shadow {
    max-height:300px;
    min-height:300px;
    overflow:hidden;
	-webkit-transition: all .4s ease;
	-moz-transition: all .4s ease;
	-o-transition: all .4s ease;
	-ms-transition: all .4s ease;
	transition: all .4s ease;
}
.shadow:hover {
	background-size: 110% auto !important;
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
  border:1px solid #AB00FF;
}
.tab_hov{
transition: all .5s ease-in-out;	
}
.tab_hov:hover{
opacity:0.7;
transition: all .5s ease-in-out;
}
.tab_hov:active{
opacity:0.7;
}
</style>