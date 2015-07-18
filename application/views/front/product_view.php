<?php
    foreach($product_data as $row)
    {
?>
    <!--=== Shop Product ===-->
    <div class="shop-product">
        <!-- Product Head -->
        <div class="container product_head">
        	<div class="col-md-6">
                <ul class="breadcrumb-v5">
                    <li><a href="<?php echo base_url(); ?>index.php/home/"><i class="fa fa-home"></i></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/home/category/"><?php echo translate('products');?></a></li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category']; ?>">
                            <?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name'); ?>	 
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category']; ?>/<?php echo $row['sub_category']; ?>">
                            <?php echo $this->crud_model->get_type_name_by_id('sub_category',$row['sub_category'],'sub_category_name'); ?>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6" style="padding-top:10px;">
            	<div id="share"></div>
            </div>
        </div>
        <!-- Product Head -->
        
        
        <!-- Product Body -->
        <div class="container">
            <div class="row product_body">
                <div class="col-md-4">
                    <div class="ms-showcase2-template">
                        <div id="slider" class="flexslider" style="overflow:hidden;">
                        <?php
							$thumbs = $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','all');
							$mains = $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','all');
						?>
                          <ul class="slides" >
							<?php 
                                foreach ($mains as $row1) {
                            ?>
                                <li class="zoom">
                                  <img src="<?php echo $row1; ?>" class="img-responsive zoom" />
                                </li>
                            <?php 
                                }
                             ?>
                            <!-- items mirrored twice, total of 12 -->
                          </ul>
                        </div>
                        <span id="zom" class="btn-u btn-u-xs btn-u-cust">
                        	<i class="fa fa-search-plus"></i> <?php echo translate('preview');?>
                        </span>
                        <?php
                        	if(count($mains) > 1){
						?>
                        <div id="carousel" class="flexslider" style="overflow:hidden;">
                          <ul class="slides" >
                            <?php
								$i = 0;
								foreach ($thumbs as $row1) {
							?>
								<li style="border:4px solid #fff;">
                                 <a class="fancybox-button zoomer" data-rel="fancybox-button" title="<?php echo $row['title'].' ('.($i+1).')'; ?>" href="<?php echo $mains[$i]; ?>" ></a>
								  <img src="<?php echo $row1; ?>" />
                                  
								</li>
							<?php
								$i++;
								}
							 ?>
                             
                          </ul>
                        </div>
                        <script>
                            $( "#zom" ).click(function() {
                                $('.flex-active-slide').find('a').click();
                            });
                        </script>
                        <?php
                            } else if(count($mains) == 1) {
                        ?>
                            <a class="fancybox-button zoomer fancyier" data-rel="fancybox-button" title="<?php echo $row['title']; ?>" href="<?php echo $mains[0]; ?>" ></a>
                            <script>
                                $( "#zom" ).click(function() {
                                    $('.fancyier').click();
                                });
                            </script>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-5" style="border-right:1px solid #D4D4D4;">
                    <div class="shop-product-heading">
                        <h2><?php echo $row['title']; ?></h2>
                        <div class="col-md-6 shadow-wrapper">       
                    	</div>
                    </div><!--/end shop product social-->
 
                    
                    
                    <div class="stars-ratings inp_rev list-inline" style="display:none;" data-pid='<?php echo $row['product_id']; ?>'>
                        <input type="radio" class="rate_it" name="rating" data-rate="5" id="rate-5">
                        <label for="rate-5"><i class="fa fa-star"></i></label>
                        <input type="radio" class="rate_it" name="rating" data-rate="4" id="rate-4">
                        <label for="rate-4"><i class="fa fa-star"></i></label>
                        <input type="radio" class="rate_it" name="rating" data-rate="3" id="rate-3">
                        <label for="rate-3"><i class="fa fa-star"></i></label>
                        <input type="radio" class="rate_it" name="rating" data-rate="2" id="rate-2">
                        <label for="rate-2"><i class="fa fa-star"></i></label>
                        <input type="radio" class="rate_it" name="rating" data-rate="1" id="rate-1">
                        <label for="rate-1"><i class="fa fa-star"></i></label>
                    </div>
                    
                    <ul class="list-inline ratings_show product-ratings margin-bottom-10 tooltips"
                    	data-original-title="<?php echo $rating = $this->crud_model->rating($row['product_id']); ?>"	
                       		data-toggle="tooltip" data-placement="left" >
                        <?php
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
                        <?php
                        	if($this->session->userdata('user_login') == "yes"){
						?>
                            <li class="product-review-list pull-right">
                                <span>
                                    <a href="#" class='rev_show'><?php echo translate('give_a_rating');?></a>
                                </span>
                            </li>
                        <?php
							}
						?>
                    </ul><!--/end shop product ratings-->
                    <script>
						$('body').on('click', '.rev_show', function(){
							$('.ratings_show li').each(function() {
                                $(this).hide('fast');
                            });
							$('.inp_rev').show('slow');
						});
					</script>
                    
                    <h5 class="text-justify"><?php echo $row['description'];?></h5>

                    <ul class="list-inline shop-product-prices">
					<?php if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ ?>
                        <li class="shop-violet"><?php echo currency().$this->crud_model->get_product_price($row['product_id']); ?></li>
                        <li class="line-through"><?php echo currency().$row['sale_price']; ?></li>
                    <?php } else { ?>
                        <li class="shop-violet"><?php echo currency().$row['sale_price']; ?></li>
                    <?php } ?>
                    </ul><!--/end shop product prices-->
                    <?php echo $this->crud_model->is_added_to_cart($row['product_id'],'option'); ?>
                    <?php
                        $all_c = json_decode($row['color']);
                            if($all_c){
                    ?>
					<h3 class="shop-product-title"><?php echo translate('color');?></h3>
                    <ul class="list-inline product-color margin-bottom-30">
                        <?php
                            $n = 0;
                            foreach($all_c as $i => $p){
                                $c = '';
                                $n++;
                                if($a = $this->crud_model->is_added_to_cart($row['product_id'],'option')){
                                    if($a == $p){
                                        $c = 'checked';
                                    }
                                } else {
                                    if($n == 1){
                                        $c = 'checked';
                                    }
                                }
                        ?>
                            <li>
                                <input type="radio" id="c-<?php echo $i; ?>" value="<?php echo $p; ?>" <?php echo $c; ?> name="color">
                                <label style="background:<?php echo $p; ?>;width:60px;height:60px;" for="c-<?php echo $i; ?>"></label>
                            </li>  
						<?php
                                }
							}
                        ?>
                    </ul>
                    
                    
                    <h3 class="shop-product-title"><?php echo translate('quantity');?></h3>
                    <div class="margin-bottom-40">
                        <form name="f1" class="product-quantity sm-margin-bottom-20">
                            <button type='button' class="quantity-button" name='subtract' onclick='javascript: subtractQty();' value='-'>-</button>
                            <input type='text' class="quantity-field cart_quantity" name='qty' value="<?php if($a = $this->crud_model->is_added_to_cart($row['product_id'],'qty')){echo $a;} else {echo '1';} ?>" id='qty'/>
                            <button type='button' class="quantity-button" name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'>+</button>
                        </form>
                        <button type="button" class="btn-u btn-brd btn-brd-hover rounded btn-u-vio btn-u-xs add_to_cart"  data-pid='<?php echo $row['product_id']; ?>'>
                            <i class="fa fa-shopping-cart"></i>
                            <?php if($this->crud_model->is_added_to_cart($row['product_id'])){ ?>
                                <?php echo translate('added_to_cart'); ?>
                            <?php } else { ?>
                                <?php echo translate('add_to_cart'); ?>
                            <?php } ?>
                        </button>
                        
                        <?php 
                            $wish = $this->crud_model->is_wished($row['product_id']); 
                        ?>
                        <button type="button" data-pid='<?php echo $row['product_id']; ?>' 
                            class="btn-u btn-brd btn-brd-hover rounded btn-u-pink btn-u-xs <?php if($wish == 'yes'){ ?>btn_wished<?php } else {?>btn_wish<?php } ?>">
                            <i class="fa fa-heart"></i>
                            <?php if($wish == 'yes'){ ?>
                                <?php echo translate('added_to_wishlist');?>
                            <?php } else {?>
                                <?php echo translate('add_to_wishlist');?>
                            <?php } ?>
                        </button>
                        
                    </div>
                    <!--/end product quantity--> 
                </div>
                
                <div class="col-md-3">
                    <!-- Related Products -->
                    <div class="sdbar posts margin-bottom-20">
                        <h4 class="text_color center_text mr_top_0"><?php echo translate('related_products'); ?></h4>
                        <?php
                            $i = 0;
							$this->db->where('sub_category',$row['sub_category']);
							$this->db->limit(5);
							$this->db->order_by('product_id','desc');
							$a = $this->db->get('product')->result_array();
							foreach ($a as $row2) {
							$now = $this->db->get_where('product',array('product_id'=>$row2['product_id']))->row();             
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
                        ?>
                    </div><!--/posts-->
                    <!-- End Posts -->
                    
                </div>
                
            </div><!--/end row-->
        </div>    
    </div>
    <!--=== End Product Body ===-->

    <!--=== Content Medium ===-->
    <div class="content-md container" style="padding-top:20px !important;">

        <div class="tab-v2">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#descrt" role="tab" data-toggle="tab"><?php echo translate('full_description');?></a></li>
                <li><a href="#spec" role="tab" data-toggle="tab"><?php echo translate('additional_specification');?></a></li>
                <li><a href="#shipmnt" role="tab" data-toggle="tab"><?php echo translate('shipment_info');?></a></li>
                <li><a href="#reviews" role="tab" data-toggle="tab"><?php echo translate('reviews');?></a></li>
            </ul>

            <div class="tab-content">
                <!-- Description -->
                <div class="tab-pane fade in active" id="descrt">
                    <div class="row">
                        <div class="col-md-12">
                        	<?php echo $row['description'];?>
                        </div>
                    </div>
                </div>
                <!-- End Description -->

                <!-- Reviews -->                
                <div class="tab-pane fade" id="shipmnt">
                    <div class="row">
                        <div class="col-md-12">
                        	<?php
								echo $this->db->get_where('business_settings',array('type'=>'shipment_info'))->row()->value;
							?>
                        </div>
                    </div>
                </div>
                <!-- End Reviews --> 

                <!-- Reviews -->                
                <div class="tab-pane fade" id="spec">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-sea margin-bottom-40">
                                <?php 
                                    $a = $this->crud_model->get_additional_fields($row['product_id']);
                                    if(count($a)>0){
                                ?>
                                    <div class="panel-heading">
                                        <h2 class="panel-title heading heading-v4" style="font-weight:100;"><?php echo translate('special_specifications');?></h2>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <?php
                                            foreach ($a as $val) {
                                        ?>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $val['name']; ?></td>
                                                <td style="text-align:center;"><?php echo $val['value']; ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                <?php 
                                    }
                                ?>
                            </div>       
                        </div>
                    </div>
                </div>
                <!-- End Reviews --> 
				<?php
                	$discus_id = $this->db->get_where('general_settings',array('type'=>'discus_id'))->row()->value;
				?>
                <!-- Reviews -->                
                <div class="tab-pane fade" id="reviews">
                    <div class="row">
                        <div class="col-md-12">
                        	<?php if($discus_id !== ''){ ?>
                    	    <div id="disqus_thread"></div>
							<script type="text/javascript">
                                /* * * CONFIGURATION VARIABLES * * */
                                var disqus_shortname = '<?php echo $discus_id; ?>';
                                
                                /* * * DON'T EDIT BELOW THIS LINE * * */
                                (function() {
                                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                })();
                            </script>
							<script type="text/javascript">
								/* * * CONFIGURATION VARIABLES * * */
									var disqus_shortname = '<?php echo $discus_id; ?>';
								
								/* * * DON'T EDIT BELOW THIS LINE * * */
								(function () {
									var s = document.createElement('script'); s.async = true;
									s.type = 'text/javascript';
									s.src = '//' + disqus_shortname + '.disqus.com/count.js';
									(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
								}());
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
							<?php
								}
							?>
                        </div>
                    </div>
                </div>
                <!-- End Reviews -->                
            </div>
        </div>
        
    </div><!--/end container-->    
    <!--=== End Content Medium ===-->

     <!--=== Illustration v2 ===-->
        
    <!--=== End Illustration v2 ===-->

<?php
    }
?>

<script>
	$(document).ready(function() {
		$('#share').share({
			networks: ['facebook','googleplus','twitter','linkedin','tumblr','in1','stumbleupon','digg'],
			theme: 'square'
		});
	});
	
	$(window).load(function() {
	<?php
		if(count($mains) > 1){
	?>
	  $('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 100,
		itemMargin: 5,
		asNavFor: '#slider'
	  });
	<?php
		}
	?>
	 
	  $('#slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel"
	  });
	});

	$(function(){
		$('.zoom').zoome({hoverEf:'transparent',showZoomState:true,magnifierSize:[200,200]});
	});
	
	function destroyZoome(obj){
		if(obj.parent().hasClass('zm-wrap'))
		{
			obj.unwrap().next().remove();
		}
	}
	
</script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
<script>
    $('body').on('click', '.quantity-button', function(){
        $(this).closest('.margin-bottom-40').find('.add_to_cart').html('<i class="fa fa-shopping-cart"></i><?php echo translate('add_to_cart'); ?>');
    });
</script>

<style>
    .heading_alt{
        font-size: 50px;
        font-weight: 100;
        color: #18BA9B;	
    }
</style>

