<?php
$title = array('name' => 'title','class' => 'form-control','value' => set_value('grade'),'maxlength' => 80,'size' => 30, 'placeholder' => 'Title');
$grade = array('name' => 'grade','class' => 'form-control','value' => set_value('grade'));
$teacher = array('name' => 'teacher','class' => 'form-control','value' => set_value('grade'));
 ?>
<div class="row">
                            <div class="col-md-8">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">  Subjects</span>
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
                                                    <th> Grade </th>
                                                    <th> Teacher </th> 
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!empty($subjects)){
                                                    $slog = 1;
                                                    foreach($subjects as $subject){
                                                ?>
                                                <tr class="<?php echo ($slog & 1)?"odd gradeX":"even gradeC" ?>">
                                                <td><?=$subject->name?></td>
                                                <td><?=$subject->grade_name?></td>
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
                                                                        <i class="icon-flag"></i> MarkSheet
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                
                                                </tr> 
                                                <?php    $slog++;}
                                                } else{ ?>
                                                <tr><td>No subjects added yet</td></tr>
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
<?= form_open('subjects/create','class="form-horizontal"')?>
<div class="form-body">
                                                                                      <div class="form-group form-md-line-input">
                                                                                                        <div class="col-md-12">
                                                        <?php echo form_input($title); ?>
                                              <span class="error"><?php echo form_error($title['name']); ?><?php echo isset($errors[$title['name']])?$errors[$title['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your grade</span>
                                                    </div>
                                                    </div>
                                                    <div class="form-group form-md-line-input">
                                                                                                        <div class="col-md-6">
                                                        <?php echo form_dropdown($grade,$grade_list); ?>
                                              <span class="error"><?php echo form_error($grade['name']); ?><?php echo isset($errors[$grade['name']])?$errors[$grade['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose grade</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?php echo form_dropdown($teacher,$teacher_list); ?>
                                              <span class="error"><?php echo form_error($teacher['name']); ?><?php echo isset($errors[$teacher['name']])?$errors[$teacher['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">choose subject</span>
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