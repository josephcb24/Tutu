<div class="panel-body" id="demo_s">
    <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,6" data-show-toggle="true" data-show-columns="false" data-search="true" >
        <thead>
            <tr>
                <th><?php echo translate('image');?></th>
                <th><?php echo translate('title');?></th>
                <th><?php echo translate('current_quantity');?></th>
                <th><?php echo translate('publish');?></th>
                <th><?php echo translate('featured');?></th>
                <th class="text-right"><?php echo translate('options');?></th>
            </tr>
        </thead>

        <tbody >
        <?php
            $i=0;
            foreach($all_product as $row){
                $i++;
        ?>
        <tr>
            <td>
                <img class="img-sm" style="height:auto !important; border:1px solid #ddd;padding:2px; border-radius:2px !important;"
                    src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','one'); ?>"  />
            </td>
            <td><?php echo $row['title']; ?></td>
            <td>
                <?php
                    if($row['current_stock'] > 0){ 
                ?>
                <?php echo $row['current_stock']; ?> <?php echo $row['unit']; ?>(s)
                <?php
                    } else {
                ?>
                    <span class="label label-danger"><?php echo translate('out_of_stock'); ?></span>
                <?php
                    }
                ?>
            </td>
            <td>
                <input id="pub_<?php echo $row['product_id']; ?>" class='sw1' type="checkbox" data-id='<?php echo $row['product_id']; ?>' <?php if($row['status'] == 'ok'){ ?>checked<?php } ?> />
            </td>
            <td>
                <input id="fet_<?php echo $row['product_id']; ?>" class='sw2' type="checkbox" data-id='<?php echo $row['product_id']; ?>' <?php if($row['featured'] == 'ok'){ ?>checked<?php } ?> />
            </td>
            <td class="text-right">
                <a class="btn btn-info btn-xs btn-labeled fa fa-location-arrow" data-toggle="tooltip" 
                    onclick="ajax_set_full('view','<?php echo translate('view_product'); ?>','<?php echo translate('successfully_viewed!'); ?>','product_view','<?php echo $row['product_id']; ?>');proceed('to_list');" data-original-title="View" data-container="body">
                        <?php echo translate('view');?>
                </a>
                <a class="btn btn-purple btn-xs btn-labeled fa fa-tag" data-toggle="tooltip"
                    onclick="ajax_modal('add_discount','<?php echo translate('view_discount'); ?>','<?php echo translate('viewing_discount!'); ?>','add_discount','<?php echo $row['product_id']; ?>')" data-original-title="Edit" data-container="body">
                        <?php echo translate('discount');?>
                </a>
                <a class="btn btn-mint btn-xs btn-labeled fa fa-plus-square" data-toggle="tooltip" 
                    onclick="ajax_modal('add_stock','<?php echo translate('add_product_quantity'); ?>','<?php echo translate('quantity_added!'); ?>','stock_add','<?php echo $row['product_id']; ?>')" data-original-title="Edit" data-container="body">
                        <?php echo translate('stock');?>
                </a>

                <a class="btn btn-dark btn-xs btn-labeled fa fa-minus-square" data-toggle="tooltip" 
                    onclick="ajax_modal('destroy_stock','<?php echo translate('reduce_product_quantity'); ?>','<?php echo translate('quantity_reduced!'); ?>','destroy_stock','<?php echo $row['product_id']; ?>')" data-original-title="Edit" data-container="body">
                        <?php echo translate('destroy');?>
                </a>
                
                <a class="btn btn-success btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" 
                    onclick="ajax_set_full('edit','<?php echo translate('edit_product'); ?>','<?php echo translate('successfully_edited!'); ?>','product_edit','<?php echo $row['product_id']; ?>');proceed('to_list');" data-original-title="Edit" data-container="body">
                        <?php echo translate('edit');?>
                </a>
                
                <a onclick="delete_confirm('<?php echo $row['product_id']; ?>','<?php echo translate('really_want_to_delete_this?'); ?>')" 
                    class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip" data-original-title="Delete" data-container="body">
                        <?php echo translate('delete');?>
                </a>
                
            </td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
    <div id='export-div' style="padding:40px;">
		<h1 id ='export-title' style="display:none;"><?php echo translate('product');?></h1>
		<table id="export-table" class="table" data-name='product' data-orientation='l' data-width='1500' style="display:none;">
				<colgroup>
					<col width="50">
					<col width="150">
					<col width="150">
					<col width="150">
					<col width="150">
					<col width="150">
					<col width="150">
					<col width="150">
				</colgroup>
				<thead>
					<tr>
						<th><?php echo translate('no');?></th>
						<th><?php echo translate('title');?></th>
						<th><?php echo translate('category');?></th>
						<th><?php echo translate('sub-category');?></th>
						<th><?php echo translate('brand');?></th>
						<th><?php echo translate('quantity');?></th>
						<th><?php echo translate('sale Price');?></th>
						<th><?php echo translate('creation Date');?></th>
					</tr>
				</thead>



				<tbody >
				<?php
					$i = 0;
	            	foreach($all_product as $row){
	            		$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name'); ?></td>
					<td><?php echo $this->crud_model->get_type_name_by_id('sub_category',$row['sub_category'],'sub_category_name'); ?></td>
					<td><?php echo $this->crud_model->get_type_name_by_id('brand',$row['brand'],'name'); ?></td>
					<td><?php echo $row['current_stock']; ?> <?php echo $row['unit']; ?>(s)</td>
					<td><?php echo currency().$row['sale_price']; ?></td>
					<td><?php echo date('d M, Y',$row['add_timestamp']); ?></td>
				</tr>
	            <?php
	            	}
				?>
				</tbody>
		</table>
	</div>
