<?php 
	$description	 =  $this->db->get_where('general_settings',array('type' => 'meta_description'))->row()->value;
	$keywords		 =  $this->db->get_where('general_settings',array('type' => 'meta_keywords'))->row()->value;
	$author			 =  $this->db->get_where('general_settings',array('type' => 'meta_author'))->row()->value;
	$system_name	 =  $this->db->get_where('general_settings',array('type' => 'system_name'))->row()->value;
	$system_title	 =  $this->db->get_where('general_settings',array('type' => 'system_title'))->row()->value;
	$page_title		 =  ucfirst(str_replace('_',' ',$page_title));
	if($page_name == 'product_view'){
		$keywords	 .= $product_tags;
	}
	
	include 'includes_top.php';
	include 'preloader.php';
	include 'header.php';

	if($page_name=="home")
	{
		include 'slider.php';
	}
	include $page_name.'.php';

	include 'footer.php';
	include 'script_texts.php';
	include 'includes_bottom.php';
?>