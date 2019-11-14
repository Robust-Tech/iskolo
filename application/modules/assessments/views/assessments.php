<?php
$title = array('name' => 'title','class' => 'form-control','value' => set_value('grade'),'maxlength' => 80,'size' => 30, 'placeholder' => 'Title');
$grade = array('name' => 'grade','class' => 'form-control','value' => set_value('grade'));
$subject = array('name' => 'subject','class' => 'form-control','value' => set_value('grade'));
$type = array('name' => 'type','class' => 'form-control','value' => set_value('grade'));
$start_date = array('name' => 'start_date','class' => 'form-control form-control-inline date-picker','value' => set_value('start_date'), 'placeholder' => 'Start Date');
$due_date = array('name' => 'due_date','class' => 'form-control form-control-inline date-picker','value' => set_value('due_date'), 'placeholder' => 'Due Date');

$total_mark = array('name' => 'total_mark','class' => 'form-control','value' => set_value('total_mark'), 'placeholder' => 'Total Mark');
$notes = array('name' => 'notes');

$desc = array('name' => 'desc','class' => 'form-control','value' => set_value('desc'), 'placeholder' => 'Description (Optional)');

 ?>
<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Assessments</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                   
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group pull-right">
                                                        <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-print"></i> Print </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th> Name </th>
                                                    <th> Description</th>
                                                    <th> Subject </th>
                                                    <th> Type </th>
                                                    <th> Total Mark</th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!empty($assessments)){
                                                    $slog = 1;
                                                    foreach($assessments as $assessment){
                                                ?>
                                                <tr class="<?php echo ($slog & 1)?"odd gradeX":"even gradeC" ?>">
                                                <td><?=$assessment->title?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                
                                                                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-docs"></i> View </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-note"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-user"></i> Delete </a>
                                                                </li>
                                                                <li class="divider"> </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="icon-flag"></i> Download
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                
                                                </tr> 
                                                <?php    $slog++;}
                                                } else{ ?>
                                                <tr><td>No assessments yet</td></tr>
                                                <?php
                                                }
                                                ?>
    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
    <div class="col-md-4">
                                
                                <div class=" portlet light portlet-fit portlet-form bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Add Assessment
                                            </span>
                                        </div>
                                        <div class="actions">

                                             <button type="button" class="btn btn-circle btn-icon-only btn-defaul close" data-dismiss="modal" aria-hidden="true"><i class="icon-trash"></i></button>
                                           
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="col-sm-12">
                <?php if ($this->session->flashdata('success') != null) {  ?>
                <div class="alert alert-info"> 
                    <?php echo $this->session->flashdata('success'); ?>
                </div> 
                <?php } ?>
                
                <?php if ($this->session->flashdata('exception') != null) {  ?>
                <div class="alert error">
                <?php echo $this->session->flashdata('exception'); ?>
                </div>
                <?php } ?> 
            </div>
                                        <?php ?>
<?= form_open('assessments/create','class="form-horizontal"')?>
<div class="form-body">
                                                                                      <div class="form-group form-md-line-input">
                                                                                                        <div class="col-md-12">
                                                        <?php echo form_input($title); ?>
                                              <span class="error"><?php echo form_error($title['name']); ?><?php echo isset($errors[$title['name']])?$errors[$title['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your grade</span>
                                                    </div>
                                                    </div>
                                                    <div class="form-group form-md-line-input"><div class="col-md-6">
                                                        <?php echo form_dropdown($grade,$grade_list); ?>
                                              <span class="error"><?php echo form_error($grade['name']); ?><?php echo isset($errors[$grade['name']])?$errors[$grade['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose grade</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?php echo form_dropdown($subject,$subject_list); ?>
                                              <span class="error"><?php echo form_error($subject['name']); ?><?php echo isset($errors[$subject['name']])?$errors[$subject['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose subject</span>
                                                    </div>
												</div>
												<div class="form-group form-md-line-input"><div class="col-md-6">
                                                        <?php echo form_dropdown($type,$assessment_list); ?>
                                              <span class="error"><?php echo form_error($type['name']); ?><?php echo isset($errors[$type['name']])?$errors[$type['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose assessment type</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?php echo form_input($total_mark); ?>
                                              <span class="error"><?php echo form_error($total_mark['name']); ?><?php echo isset($errors[$total_mark['name']])?$errors[$total_mark['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter total mark</span>
                                                    </div>
												</div>
												<div class="form-group form-md-line-input"><div class="col-md-6">
                                                        <?php echo form_input($start_date); ?>
                                              <span class="error"><?php echo form_error($start_date['name']); ?><?php echo isset($errors[$start_date['name']])?$errors[$start_date['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose start date</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?php echo form_input($due_date); ?>
                                              <span class="error"><?php echo form_error($due_date['name']); ?><?php echo isset($errors[$due_date['name']])?$errors[$due_date['name']]:''; ?></span>
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
                                                                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green">Add</button>
                                                        <button type="reset" class="btn default">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
<?= form_close()?>
                              </div>
                                </div>
                            </div>
                        </div>