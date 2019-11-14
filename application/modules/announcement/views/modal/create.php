<?php
$role_list = App::role_list();
$grade_list = App::grade_list();
$priority_list = App::priority_list();
$title = array('name' => 'title','class' => 'form-control','maxlength' => 80,'size' => 30, 'placeholder' => 'Title');
$priority = array('name' => 'priority','class' => 'form-control');

$role = array('name' => 'role','class' => 'form-control form-control-inline');
$grade = array('name' => 'grade','class' => 'form-control form-control-inline date-picker', 'placeholder' => 'Due Date', 'id' => 'date');
$desc = array('name' => 'desc','class' => 'form-control', 'placeholder' => 'Description (Optional)');
 ?>
<div class="modal-dialog">
    <div class="modal-content portlet light portlet-fit portlet-form bordered">
        <div class="modal-header portlet-title"> <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title caption-subject bold uppercase"><?='New Announcement'?></h4>
        </div><?=form_open(base_url().'announcement/create','class="form-horizontal"')?>
        <div class="form-body">
                                           
        <div class="portlet-body modal-body"> 
            <div class="form-group form-md-line-input">
                <div class="col-md-12">
                                                        <?php echo form_input($title); ?>
                                              <span class="error"><?php echo form_error($title['name']); ?><?php echo isset($errors[$title['name']])?$errors[$title['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter activity title</span>
                                                    </div>
                                                    </div>
                                                    
												<div class="form-group form-md-line-input"><div class="col-md-12">
                                                        <?php echo form_dropdown($priority,$priority_list); ?>
                                              <span class="error"><?php echo form_error($priority['name']); ?><?php echo isset($errors[$priority['name']])?$errors[$priority['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose priority</span>
                                                    </div>
                                                    
												</div>
												<div class="form-group form-md-line-input">
                                                    <div class="col-md-12">
                                                        <?php echo form_dropdown($role,$role_list); ?>
                                              <span class="error"><?php echo form_error($role['name']); ?><?php echo isset($errors[$role['name']])?$errors[$role['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose role</span>
                                                    </div>
                                                    </div>
                                                    	<div class="form-group form-md-line-input">
                                                    <div class="col-md-12">
                                                        <?php echo form_dropdown($grade,$grade_list); ?>
                                              <span class="error"><?php echo form_error($grade['name']); ?><?php echo isset($errors[$grade['name']])?$errors[$grade['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose grade</span>
                                                    </div>
												</div>
                                                    <div class="form-group form-md-line-input">
                                                                                                       
													<div class="col-md-12">
                                                         <?php echo form_textarea($desc); ?>
                                              <span class="error"><?php echo form_error($desc['name']); ?><?php echo isset($errors[$desc['name']])?$errors[$desc['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter description</span>
                                                    </div>
                                                </div>                                            
                    </div>
        
		<div class="modal-footer form-actions"> <a href="#" class="btn btn-default" data-dismiss="modal"><?='Close'?></a>
			<button type="submit" class="btn green"><?='Save'?></button>
		<?=form_close()?>
	</div>
	</div>
</div>
</div>


