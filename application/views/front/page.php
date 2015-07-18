<div class="content container">
    <?php 
		foreach($page_items as $item){
		$parts	= json_decode($item['parts'],true); 
			foreach($parts as $row){
			$size		= $row['size'];
			$type		= $row['type'];
			$content	= $row['content'];
			$widget		= $row['widget'];	
	?>
    		<div class="col-md-<?php echo $size; ?>">
            	<?php
                	if($type == 'content'){
						echo $content;
					} else if ($type == 'widget'){
						$widget_set = explode(',',$widget);
				?>
                <div class="row">
                    <div class="col-md-12 md-margin-bottom-60">
                        <!-- MOST SOLD -->
                        <div class="sdbar posts margin-bottom-20" 
                        	style="display:<?php if(in_array('most_sold',$widget_set)){ ?>block<?php } else { ?>none<?php } ?>">
                            <h4 class="text_color center_text mr_top_0"><?php echo translate('most_sold'); ?></h4>
                            <?php
                                $i = 0;
                                    $most_popular = $this->crud_model->most_sold_products();
                                    foreach ($most_popular as $row2){
                                        $i++;
                                        if($i <= 4){
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
                            ?>
                        </div><!--/posts-->
                        <!-- End Posts -->
        
                        
                        <!-- MOST VIEWED -->
                        <div class="sdbar posts margin-bottom-20"
                        	style="display:<?php if(in_array('most_viewed',$widget_set)){ ?>block<?php } else { ?>none<?php } ?>">
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
                        
                                           
                        <!-- MOST VIEWED -->
                        <div class="sdbar posts margin-bottom-20"
                        	style="display:<?php if(in_array('latest',$widget_set)){ ?>block<?php } else { ?>none<?php } ?>">
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
                    
                    
                </div>
                <?php
					}
				?>
            </div>
    <?php
			}
		}
	?>
</div>