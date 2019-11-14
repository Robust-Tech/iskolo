<?php if (config_item('timezone')) { date_default_timezone_set(config_item('timezone')); } ?>
<!DOCTYPE html>
<html lang="eng" class="app">
<head>
	<meta charset="utf-8" />
  <link rel="shortcut icon" href="<?=base_url()?>assets/admin/img/icon.png">
  <title><?php echo $template['title'];?></title>
	<meta name="author" content="<?=config_item('site_author')?>">
	<meta name="keyword" content="<?=config_item('site_desc')?>">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
       
        <link href="<?=base_url()?>assets/admin/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
     <link href="<?=base_url()?>assets/admin/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
    <link href="<?=base_url()?>assets/admin/css/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/summernote.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/datatables.min.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url()?>assets/admin/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/plugins.min.css" rel="stylesheet" type="text/css" />

        <link href="<?=base_url()?>assets/admin/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>assets/admin/css/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
 <script src="<?=base_url()?>assets/admin/js/jquery.min.js" type="text/javascript"></script>
<style>
  .date-picker{z-index:+1, !important}
</style>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/js/html5.js"></script>
    <script src="<?php echo base_url();?>assets/js/respond.js"></script>
    <![endif]-->
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
	<div class="page-wrapper">
		<!--header start-->
		<?php  echo modules::run('sidebar/top_header');?>
		<!--header end-->
		<section class="page-container">
			<div class="page-sidebar-wrapper">

				<?php

				if (User::is_student()) {
					echo modules::run('sidebar/student_menu');

				}elseif (User::is_teacher()) {

					echo modules::run('sidebar/teacher_menu');

				}elseif (User::is_parent()) {

					echo modules::run('sidebar/parent_menu');

				}else{
					echo modules::run('sidebar/admin_menu');
				}
				?>
                
                </div>
                <section class="page-content-wrapper">
                <div class="page-content">
                
				<!--main content start-->
				<?php  echo $template['body'];?>
				<!--main content end-->
				
				
				</div>
				</section>
			</section>
		</div>
		<script>
			
			var base_url = '<?=base_url()?>';
		</script>

       
        <script src="<?=base_url()?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/moment.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/clockface.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/datatable.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/admin/js/datatables.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/datatables.bootstrap.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/admin/js/app.min.js" type="text/javascript"></script>

        <script src="<?=base_url()?>assets/admin/js/layout.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>assets/admin/js/custom.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready( function(){
        $('#table').DataTable();
       /* $('.date-picker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    }); //#modal is the id of the modal*/
    });
        /*$('#Modal').on('shown.bs.modal', function() {
  $('.datepicker').datepicker({
    format: "dd/mm/yyyy",
    startDate: "01-01-2017",
    endDate: "01-01-2020",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true,
    container: '#Modal modal-body'
  });
});*/
    $(document).on('click', '[data-toggle="Modal"]', function(e) {
            $('#Modal').remove();
            e.preventDefault();
            var $this = $(this),
                $remote = $this.data('remote') || $this.attr('href'),
                $modal = $('<div class="modal" id="Modal"><div class="modal-body"></div></div>');
            $('body').append($modal);
            $modal.modal();
            $modal.load($remote);
         //$('.datepicker').datepicker();
        });
    </script>

	</body>
	</html>
