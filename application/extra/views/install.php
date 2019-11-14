<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/installer/img/icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>iSkolo LMS - Installer</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="<?=base_url()?>assets/installer/css/app.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/installer/css/fuelux.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js" cache="false">
    </script>
    <script src="js/ie/respond.min.js" cache="false">
    </script>
    <script src="js/ie/excanvas.js" cache="false">
    </script> <![endif]-->
</head>
<body>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">

    <div class="container" style="width:80%">
        <section class="panel panel-default bg-white m-t-lg">
            <header class="panel-heading text-center">
                <strong>Web Insatller</strong>
            </header>
            <div class = "panel-body wrapper-lg">

                <?php
                $step1 = $step2 = $step3 = $step4 = '';
                $badge1 = $badge2 = $badge3 = $badge4 ='badge';
                if(isset($_GET['step'])){
                    switch ($_GET['step']) {
                        case '2':
                            $step2 = 'active'; $badge2='badge badge-success';
                            break;
                        case '3':
                            $step3 = 'active'; $badge3='badge badge-success';
                            break;
                        case '4':
                            $step4 = 'active'; $badge4='badge badge-success';
                            break;

                        default:
                            $step1 = 'active'; $badge1='badge badge-success';
                            break;
                    }
                }else $step1 = 'active'; $badge1='badge';
                ?>


                <div class="panel panel-default wizard">
                    <div class="wizard-steps clearfix" id="form-wizard">
                        <ul class="steps">
                            <li class="<?=$step1?>"><span class="<?=$badge1?>">1</span>System Check</li>
                            <li class="<?=$step2?>"><span class="<?=$badge2?>">2</span>Database Settings</li>
                            <li class="<?=$step3?>"><span class="<?=$badge3?>">3</span>Admin Settings</li>
                            
                        </ul>
                    </div>
                    <div class="step-content clearfix">

                        <?php
                        if($this->session->flashdata('message')){ ?>
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <i class="fa fa-info-sign"></i><?=$this->session->flashdata('message')?>
                            </div>
                        <?php } ?>

                        <div class="step-pane <?=$step1?>" id="step1">
  <?php
                            $config_file = "./application/config/config.php";
                            $database_file = "./application/config/database.php";
                            $autoload_file = "./application/config/autoload.php";
                            $route_file = "./application/config/routes.php";
                            $htaccess_file = ".htaccess";
                            $error = FALSE;
                             
                            if(!is_writeable($database_file)){$error = TRUE; echo "<div class='alert alert-danger'>Database File (application/config/database.php) is not writeable!</div>";}else{echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> Database file is writeable!</div>";}
                            if(!is_writeable($config_file)){$error = TRUE; echo "<div class='alert alert-danger'>Config File (application/config/config.php) is not writeable!</div>";}else{echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> Config file is writeable!</div>";}
                            if(!is_writeable($route_file)){$error = TRUE; echo "<div class='alert alert-danger'>Route File (application/config/routes.php) is not writeable!</div>";}else{echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> Routes file is writeable!</div>";}
                            if(!is_writeable($autoload_file)){$error = TRUE; echo "<div class='alert alert-danger'>Autoload File (application/config/autoload.php) is not writeable!</div>";}else{echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> Autoload file is writeable!</div>";}
                            if(!is_writeable($htaccess_file)){$error = TRUE; echo "<div class='alert alert-danger'>HTACCESS File (.htaccess) is not writeable!</div>";}else{echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> HTACCESS file is writeable!</div>";}

                            if(!is_writeable("./temp")){echo "<div class='alert alert-danger'><i class='fa fa-times'></i> /temp folder is not writeable!</div>";}else{echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> /resource/tmp folder is writeable!</div>";}

                            
                            ?>
                                                        <div class="actions pull-left">
                                <a href="<?php echo base_url()?><?=config_item('index_page')?>/installer/start" class="btn btn-success btn-sm">Next</a>
                            </div>

                        </div>
                        <div class="step-pane <?=$step2?>" id="step2">
        <?php
             $attributes = array('class' => 'm-b-sm form-horizontal','id' => 'database','novalidate' => 'novalidate');
          echo form_open(base_url().config_item('index_page').'/installer/setup_database',$attributes); ?>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Database Host</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control"  placeholder="localhost" name="set_hostname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Database Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control"  placeholder="db_school" name="set_database">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Database Username</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="db_username" name="set_user">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Database Password</label>
                                    <div class="col-lg-7">
                                        <input type="password" class="form-control" placeholder="db_pass" name="set_password">
                                    </div>
                                </div>
                                <div class="actions pull-left">
                                    <a href="<?php echo base_url()?><?=config_item('index_page')?>/installer" class="btn btn-success btn-sm">Previous</a>
                                    <button type="submit" class="btn btn-success btn-sm">Next</button>
                                </div>

                            <?= form_close()?>
                        </div>
                        <div class="step-pane <?=$step3?>" id="step3">

                        
        <?php
             $attributes = array('class' => 'm-b-sm form-horizontal','id' => 'complete','novalidate'=>'novalidate');
          echo form_open(base_url().config_item('index_page').'/installer/complete',$attributes); ?>

                                <?php
                                $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
                                $base_url .= "://".$_SERVER['HTTP_HOST'];
                                $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

                                ?>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">School Domain</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" value="<?=$base_url?>" name="set_base_url">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">First Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="John " name="set_firstname">
                                    </div>
                                </div>
                            <div class="form-group">
                                    <label class="col-lg-3 control-label">Last Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="Doe" name="set_lastname">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Username</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="johndoe" name="set_username">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Password</label>
                                    <div class="col-lg-7">
                                        <input type="password" class="form-control" placeholder="password" name="set_password">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email</label>
                                    <div class="col-lg-7">
                                        <input type="email" class="form-control" placeholder="admin@iskolo.co.za" name="set_email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">School Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" placeholder="Iskolo lms" name="set_school_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">School Email</label>
                                    <div class="col-lg-7">
                                        <input type="email" class="form-control" placeholder="info@iskolo.co.za" name="set_school_email">
                                    </div>
                                </div>
                            <div class="form-group">
                                    <label class="col-lg-3 control-label">School Contact Number</label>
                                    <div class="col-lg-7">
                                        <input type="tel" class="form-control" placeholder="+27(011) 456 9873" name="set_school_contact_number">
                                    </div>
                                </div>


                                <div class="actions pull-left">
                                    <button type="submit" class="btn btn-success btn-sm">Complete</button>
                                </div>

                            <?=form_close()?>

                        </div>
                        </div>
                </div>

            </div>
        </section>
    </div>
</section>
<!--main content end-->
<script src="<?=base_url()?>assets/installer/js/jquery-2.2.4.min.js"></script>
<script src="<?=base_url()?>assets/installer/js/app.js"></script>
<script src="<?=base_url()?>assets/installer/js/jquery.validate.min.js"></script>

<script>
    $(function() {
        $("#database").validate({
            rules: {
                set_hostname: "required",
                set_database: "required",
                set_user: "required"
            },

            // Specify the validation error messages
            messages: {
                set_hostname: "Please enter your hostname usually localhost",
                set_database: "Please specify your database name",
                set_user: "Please specify your database username"
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $("#complete").validate({
            rules: {
                set_username: "required",
                set_firstname: "required",
                set_lastname: "required",
                set_email: "required",
                set_email: {
                    required: true,
                    email: true
                },
            set_school_name: "required",
            set_school_email: {
                    required: true,
                    email: true
                },
            },

            // Specify the validation error messages
            messages: {
                set_username: "Please enter username",
                set_firstname: "Set your first name",
                set_lastname: "Set your last name",
                set_password: "Set your password",
                set_email: "Set admin email address",
                set_school_name: "Set your school name",
                set_school_email: "Enter your school email address e.g info@school.com",
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

    });

</script>
</body>
</html>