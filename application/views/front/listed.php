<?php
	if($viewtype == 'list'){
        foreach($all_products as $row){
?>

<div class="tag-box tag-box-v1">
    <div class="row">
        <div class="col-sm-3" style="border-right: solid 1px #E2E2E2 !important;">
           <a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
                <div class="shadow_list" 
                    style="background: url('<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','one'); ?>') no-repeat center center; 
                        background-size: 100% auto;">
                </div> 
           </a>
        </div> 
        <div class="col-sm-9 product-description">
            <div class="overflow-h margin-bottom-5">
                <div class="col-sm-12">
                    <div class="col-sm-6 pull-left">
                        <ul class="list-inline overflow-h">
                            <li>
                                <h4 class="title-price">
                                    <a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
                                        <?php echo $this->crud_model->limit_chars($row['title'],40);?>
                                    </a>
                                </h4>
                            </li>
                        </ul>  
                          
                        <div class="margin-bottom-10">
                            <span class="gender text-uppercase">
                                <?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name'); ?>
                            </span>
                        </div>
                        <div class="margin-bottom-10">
                            <span class="gender">
                                <?php echo $this->crud_model->get_type_name_by_id('sub_category',$row['sub_category'],'sub_category_name'); ?>
                            </span>
                        </div>
                        <div class="margin-bottom-10">
                            <?php if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ ?>
                                <span class="title-price margin-right-10"><?php echo currency().$this->crud_model->get_product_price($row['product_id']); ?></span>
                                <span class="title-price line-through"><?php echo currency().$row['sale_price']; ?></span>
                            <?php } else { ?>
                                <span class="title-price margin-right-10"><?php echo currency().$row['sale_price']; ?></span>
                            <?php } ?>
                        </div>
                        
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-inline product-ratings pull-right tooltips" style="padding:5px !important;"
                            data-original-title="<?php echo $rating = $this->crud_model->rating($row['product_id']); ?>"	
                                data-toggle="tooltip" data-placement="left" >
                            <?php
                                $rating = $this->crud_model->rating($row['product_id']);
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
                        <ul>
                        <?php
                            if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'current_stock') <= 0){
                        ?>
                            <div class="margin-bottom-10  pull-right">
                                <span class="label label-danger pull-right" style="margin-right: 7px;">
                                    <?php echo translate('out_of_stock');?>
                                </span>
                            </div>
                        <?php
                            } else {
                                if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ 
                        ?>
                            <div class="margin-bottom-5  pull-right">
                                <span class="label label-green pull-right" style="margin-right: 7px;">
                                    <?php 
                                        if($row['discount_type'] == 'percent'){
                                            echo $row['discount'].'%';
                                        } else if($row['discount_type'] == 'amount'){
                                            echo currency().$row['discount'];
                                        }
                                    ?>
                                    <?php echo ' '.translate('off'); ?>
                                </span>
                            </div>
                        <?php 
                                } 
                            }
                        ?>
                        </ul>
                        <ul class="list-inline margin-bottom-20">
                            <li class="margin-bottom-10 pull-right">
                                <div rel="curl-bottom-right" class="<?php if($this->crud_model->is_added_to_cart($row['product_id'])){ ?>btn_carted<?php } else { ?>btn_cart<?php } ?> btn-block add_to_cart"  data-type='text' data-pid='<?php echo $row['product_id']; ?>'>
                                    <?php if($this->crud_model->is_added_to_cart($row['product_id'])){ ?>
                                        <i class="fa fa-shopping-cart"></i>
                                        <?php echo translate('added_to_cart');?>
                                    <?php } else { ?>
                                        <i class="fa fa-shopping-cart"></i>
                                        <?php echo translate('add_to_cart');?>
                                    <?php } ?>
                                </div>
                            </li>
                            
                            <?php 
                                $wish = $this->crud_model->is_wished($row['product_id']); 
                            ?>
                            <li class="pull-right">
                                <div rel="curl-bottom-left" data-pid='<?php echo $row['product_id']; ?>'
                                    class="btn-block <?php if($wish == 'yes'){ ?>btn_wished<?php } else {?>btn_wish<?php } ?> pull-right">
                                    <i class="fa fa-heart"></i>
                                    <?php if($wish == 'yes'){ ?>
                                        <?php echo translate('added_to wishlist');?>
                                    <?php } else {?>
                                        <?php echo translate('add_to wishlist');?>
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                     </div>
                 </div>
            </div>    
        </div>
    </div>
</div>



<?php
       }
	} else if($viewtype == 'grid'){
		$f_num = (12/$grid_items_per_row);
?>

<div class="row illustration-v2">
<?php
	$n = 0;
    foreach($all_products as $row){
		$n++;
?> 	
        
    <div class="col-md-<?php echo $f_num; ?>" style="padding:2px;">
        <div class="item custom_item">
            <div class="product-img">
            
                <a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
                    <div class="shadow" 
                        style="background: url('<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','one'); ?>') no-repeat center center; 
                            background-size: 100% auto;">
                    </div>
                    
                </a>
                
                <a class="add-to-cart add_to_cart" data-type='text' data-pid='<?php echo $row['product_id']; ?>' >
                    <i class="fa fa-shopping-cart"></i>
                    <?php if($this->crud_model->is_added_to_cart($row['product_id'])){ ?>
                        <?php echo translate('added_to_cart'); ?>
                    <?php } else { ?>
                        <?php echo translate('add_to_cart'); ?>
                    <?php } ?>
                </a>
                <?php
                    if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'current_stock') <= 0){
                ?>
                <div class="shop-rgba-red rgba-banner" style="top:0px; border-top-right-radius: 4px !important;"><?php echo translate('out_of_stock');?></div>
                <?php
                    } else {
                        if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ 
                ?>
                    <div class="shop-bg-green rgba-banner" style="top:0px; border-top-right-radius: 4px !important;" >
                        <?php 
                            if($row['discount_type'] == 'percent'){
                                echo $row['discount'].'%';
                            } else if($row['discount_type'] == 'amount'){
                                echo currency().$row['discount'];
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
                        <h4 class="title-price"><a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>"><?php echo $row['title'] ?></a></h4>
                        <span class="gender text-uppercase"><?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name'); ?></span>
                        <span class="gender"><?php echo $this->crud_model->get_type_name_by_id('sub_category',$row['sub_category'],'sub_category_name'); ?></span>
                    </div>    
                    <div class="col-md-3 product-price" style="padding:0px;">
                        <?php if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ ?>
                            <span class="title-price"><?php echo currency().$this->crud_model->get_product_price($row['product_id']); ?></span>
                            <span class="title-price line-through"><?php echo currency().$row['sale_price']; ?></span>
                        <?php } else { ?>
                            <span class="title-price"><?php echo currency().$row['sale_price']; ?></span>
                        <?php } ?>
                    </div>
                </div>
                <ul class="list-inline product-ratings col-md-5 col-sm-5 col-xs-5 tooltips"
                    data-original-title="<?php echo $rating = $this->crud_model->rating($row['product_id']); ?>"	
                        data-toggle="tooltip" data-placement="right" >
                    <?php
                        $rating = $this->crud_model->rating($row['product_id']);
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
                    $wish = $this->crud_model->is_wished($row['product_id']); 
                ?>
                
                <ul class="list-inline product-ratings col-md-1 col-sm-1 col-xs-1 tooltips"
                     data-original-title="<?php if($wish == 'yes'){ ?>Added to wishlist<?php } else { ?>Add to wishlist<?php } ?>" 
                        data-toggle="tooltip" data-placement="left" >
                    <li class="like-icon">
                        <span data-pid='<?php echo $row['product_id']; ?>'
                            class="<?php if($wish == 'yes'){ ?>wished_it<?php } else {?>wish_it<?php } ?>">
                            <i class="fa fa-heart"></i>
                        </span>
                    </li>
                </ul>    
            </div>
        </div>
    </div>
	<?php if($n % 3 == 0){ ?>
         </div>
         <div class="row illustration-v2">
	<?php
			}
        }
    ?>
         
</div>
<?php
	}
?>


<div class="text-center" style="display:none;" id="pagenation_links">
    <?php echo $this->pagination->create_links(); ?>
</div><!--/end pagination-->

<script>
	$(document).ready(function() {
		$('.pg_links').html($('#pagenation_links').html());
		$('.result-category').html(''
			+'<h2><?php echo $name; ?></h2>'
			+'<div class="col-sm-2 shop-bg-red badge-results"><?php echo $count; ?> <?php echo translate('results'); ?></div>'
		);
	});
</script>
<style>
div.shadow_list {
    max-height:140px;
    min-height:140px;
    overflow:hidden;
	-webkit-transition: all .4s ease;
	-moz-transition: all .4s ease;
	-o-transition: all .4s ease;
	-ms-transition: all .4s ease;
	transition: all .4s ease;
}
.shadow_list:hover {
	background-size: 110% auto !important;
}

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
	-webkit-box-shadow: 0 1px 11px rgba(0,0,0,0.25);
	box-shadow: 0 1px 11px rgba(0,0,0,0.25);
}

</style>