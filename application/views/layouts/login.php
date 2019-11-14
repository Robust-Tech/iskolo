<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
 <link rel="shortcut icon" href="<?=base_url()?>assets/admin/img/icon.png">
  

  <title><?php echo $template['title'];?></title>
  <meta name="description" content="<?=config_item('site_desc')?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url()?>assets/admin/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url()?>assets/admin/css/login.min.css" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/html5.js"></script>
    <script src="<?php echo base_url();?>assets/js/respond.js"></script>
    <![endif]-->
<script src="<?php echo base_url();?>assets/admin/js/modernizr.js"></script>
</head>
<body class="login">
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg" style="background-image:url(<?=base_url()?>assets/admin/img/bg.jpg)">
                        </div>
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="login-content">
                        
            <div class="form-title">
                <img class="login-logo" src="<?=base_url()?>assets/admin/img/logo.png" /> 
                    <span class="form-title">Welcome.</span>
                    <span class="form-subtitle">Please login.</span>
                </div>

	<!--main content start-->
      <?php  echo $template['body'];?>
      <!--main content end-->
</div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-md-6">
                                <div class="login-copyright">
								<p>Powered by <a href="http://www.tinyeleti.com" target="_blank">Tinyeleti Consulting</a></p>
								</div>
                            </div>
                            <div class="col-md-6 bs-reset">
                                <div class="login-copyright text-right">
                                    <p><a href="<?=$this->config->item('school_domain')?>" target="_blank"><?=$website_name?></a> &copy; <?=date('Y')?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/app.js"></script>
<script src="<?=base_url()?>assets/admin/js/login.min.js"></script>


</body>
</html>
