<div class="content container">
    <div class="row">
    	<?php
        	echo $this->db->get_where('general_settings',array('type'=>$type))->row()->value;
		?>
    </div>
</div>