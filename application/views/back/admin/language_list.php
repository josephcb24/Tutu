
                
	<div class="panel-body" id="demo_s">
    <button class="btn btn-danger btn-labeled fa fa-minus-circle pull-left mar-rgt" 
        style="margin-top:10px;" onclick="delete_lang('<?php echo $lang; ?>')">
            <?php echo translate('delete_language');?> : <?php echo $lang; ?>
                </button>
		<table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true" data-ignorecol="0,2" data-show-toggle="false" data-show-columns="false" data-search="true" >

			<thead>
				<tr>
					<th><?php echo translate('no');?></th>
					<th><?php echo translate('word');?></th>
					<th><?php echo translate('translation');?></th>
					<th class="text-right"><?php echo translate('options');?></th>
				</tr>
			</thead>
            <?php
				if ($lang == 'undefined' || $lang == '') {
					if ($lang = $this->session->userdata('language')) {
					} else {
						$lang = $this->db->get_where('general_settings', array(
							'type' => 'language'
						))->row()->value;
					}
				}
			?>
			<tbody >
			<?php
				$i = 0;
            	foreach($words as $row){
            		$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td class="abv"><?php echo $row['english']; ?></td>
				<td>
					<?php
                        echo form_open(base_url() . 'index.php/admin/language_settings/upd_trn/'.$row['word_id'], array(
                            'class' => 'form-horizontal trs',
                            'method' => 'post',
                            'id' => $lang.'_'.$row['word_id']
                        ));
                    ?>
						<div class="col-md-8">
							<input type="text" name="translation" value="<?php echo $row[$lang]; ?>" class ="form-control ann" />
							<input type="hidden" name="lang" value="<?php echo $lang; ?>" />
						</div>
						<div class="col-md-4">
							<span class="btn btn-success btn-xs btn-labeled fa fa-wrench submittera" data-wid='<?php echo $lang; ?>_<?php echo $row['word_id']; ?>'  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('updated!'); ?>' ><?php echo translate('save');?></span>
	                    </div>
		            </form>
                </td>
				<td class="text-right">
					<a onclick="delete_confirm('<?php echo $row['word_id']; ?>','<?php echo translate('really_want_to_delete_this_word?'); ?>')" class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip" 
                    	data-original-title="Delete" data-container="body">
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
<script type="text/javascript">
	var extra = '<?php echo $lang; ?>';

	$(document).ready(function() {
	    $('.page-list').find('.dropdown-menu li:last-child').click();
	});
</script>


