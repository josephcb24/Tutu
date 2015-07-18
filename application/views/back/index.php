<?php
	$system_name	 =  $this->db->get_where('general_settings',array('type' => 'system_name'))->row()->value;
	$system_title	 =  $this->db->get_where('general_settings',array('type' => 'system_title'))->row()->value;
?>
<?php include 'includes_top.php'; ?>
<body>
	<div id="container" class="effect mainnav-lg">
		<!--NAVBAR-->
		<?php include 'header.php'; ?>
		<!--END NAVBAR-->
		<div class="boxed">
			<!--CONTENT CONTAINER-->
			<?php include $this->session->userdata('title').'/'.$page_name.'.php' ?>
			<!--END CONTENT CONTAINER-->
			
			<!--MAIN NAVIGATION-->
			<?php include $this->session->userdata('title').'/navigation.php' ?>
			<!--END MAIN NAVIGATION-->
			
		</div>
		<!-- FOOTER -->
		<?php include 'footer.php'; ?>
		<?php include 'script_texts.php'; ?>
		<!-- END FOOTER -->
		<!-- SCROLL TOP BUTTON -->
		<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
	</div>
	<!-- END OF CONTAINER -->

	<!-- SETTINGS - DEMO PURPOSE ONLY -->	
<?php include 'includes_bottom.php'; ?>

