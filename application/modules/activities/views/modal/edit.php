<?php
$type_list = App::activity_type();
$activity = App::get_data($id,'activities');
$activity_type =  App::get_data($activity->type_id,'activity_type');
$title = array('name' => 'title','class' => 'form-control','value' => $activity->activity_name,'maxlength' => 80,'size' => 30, 'placeholder' => 'Title');
$type = array('name' => 'type','class' => 'form-control','value' =>$activity_type->name,'');

$start_date = array('name' => 'start_date','class' => 'form-control form-control-inline disabled', 'value'=> $activity->start_date, 'placeholder' => 'Start Date', 'id' => 'date', 'disabled' => 'disabled');
$end_date = array('type' => 'date','name' => 'end_date','class' => 'form-control form-control-inline date-picker', 'placeholder' => 'Due Date', 'id' => 'date', 'value'=> $activity->end_date);
$desc = array('name' => 'desc','class' => 'form-control', 'placeholder' => 'Description (Optional)', 'value' => $activity->description);
 ?>
<div class="modal-dialog">
    <div class="modal-content  portlet light portlet-fit portlet-form bordered">
        <div class="modal-header portlet-title"> <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title  caption-subject bold uppercase"><?='Edit Activity'?></h4>
        </div>

<?php echo form_open(base_url().'activities/edit','class="form-horizontal"'); ?>
        <div class="portlet-body modal-body">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="form-group form-md-line-input">
                <div class="col-md-12">
                                                        <?php echo form_input($title); ?>
                                              <span class="error"><?php echo form_error($title['name']); ?><?php echo isset($errors[$title['name']])?$errors[$title['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter activity title</span>
                                                    </div>
                                                    </div>
                                                    
												<div class="form-group form-md-line-input"><div class="col-md-12">
                                                        <?php echo form_dropdown($type,$type_list,$activity->type_id); ?>
                                              <span class="error"><?php echo form_error($type['name']); ?><?php echo isset($errors[$type['name']])?$errors[$type['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">actvity type</span>
                                                    </div>
                                                    
												</div>
												<div class="form-group form-md-line-input">
                                                    <div class="col-md-12">
                                                        <?php echo form_input($start_date); ?>
                                              <span class="error"><?php echo form_error($start_date['name']); ?><?php echo isset($errors[$start_date['name']])?$errors[$start_date['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose start date</span>
                                                    </div>
                                                    </div>
                                                    	<div class="form-group form-md-line-input">
                                                    <div class="col-md-12">
                                                        <?php echo form_input($end_date); ?>
                                              <span class="error"><?php echo form_error($end_date['name']); ?><?php echo isset($errors[$end_date['name']])?$errors[$end_date['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter due date</span>
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
		<div class="modal-footer  form-actions"> <a href="#" class="btn btn-default" data-dismiss="modal"><?='Close'?></a>
			<button type="submit" class="btn green"><?='Save Changes'?></button>
		</form>
	</div>
</div>
</div>

