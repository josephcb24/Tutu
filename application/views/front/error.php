<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
	<?php $system_title	 =  $this->db->get_where('general_settings',array('type' => 'system_title'))->row()->value; ?>
    <title>404 Not Found | <?php echo $system_title; ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php $ext =  $this->db->get_where('ui_settings',array('type' => 'fav_ext'))->row()->value;?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/plugins/font-awesome/css/font-awesome.min.css">

    <!-- CSS Page Style -->    
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/css/pages/page_error4_404.css">

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/css/theme-colors/default.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/css/custom.css">
</head> 

<body>

    <!--=== Error V4 ===-->    
    <div class="container content">
        <!--Error Block-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="error-v4">
                   <a href="<?php echo base_url(); ?>"><img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt=""></a>      
                    <h3> <?php echo $system_title; ?></h3>
                    <h1>404</h1>
                    <span class="sorry">Sorry, the page you were looking for could not be found!</span>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <a class="btn-u btn-brd btn-u-light" href="<?php echo base_url(); ?>index.php/home/"> Go Back to Main Page</a>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div><!--/container-->
    <!--End Error Block-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="<?php echo base_url(); ?>template/front/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template/front/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template/front/assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo base_url(); ?>template/front/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>template/front/assets/plugins/backstretch/jquery.backstretch.min.js"></script>
<script type="text/javascript">
    $.backstretch([
      "<?php echo base_url(); ?>template/front/assets/img/blur/img2.jpg"
      ])
</script>
<!-- JS Customization -->
<script type="text/javascript" src="<?php echo base_url(); ?>template/front/assets/js/custom.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo base_url(); ?>template/front/assets/js/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();      
    });
</script>
<!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/respond.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html> 