<?php
$gradename = array('name' => 'grade','class' => 'form-control','value' => set_value('grade'),'maxlength' => 80,'size' => 30, 'placeholder' => 'Grade');
$desc = array('name' => 'desc','class' => 'form-control','value' => set_value('desc'), 'placeholder' => 'Description (Optional)');
 ?>
<div class="row">
                            <div class="col-md-7">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Grades</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped" id="table">
                                            <thead>
                                                <tr>
                                                    <th> Name </th>
                                                    <th> No. of Students </th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!empty($grades)){
                                                    $slog = 1;
                                                    foreach($grades as $grade){
                                                ?>
                                                <tr class="<?php echo ($slog & 1)?"odd gradeX":"even gradeC" ?>">
                                                <td><?=$grade->grade_name?></td>
                                                <td><?=App::counter('students',array('gradeid'=> $grade->id))?></td>
                                                
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
                                                                        <i class="icon-flag"></i> Students
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                
                                                </tr> 
                                                <?php    $slog++;}
                                                } else{ ?>
                                                <tr><td>No grades records yet</td></tr>
                                                <?php
                                                }
                                                ?>
    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
    <div class="col-md-5">
                                
                                <div class=" portlet light portlet-fit portlet-form bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Add New Grade
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
<?= form_open('grade/create','class="form-horizontal"')?>
<div class="form-body">
                                                                                      <div class="form-group form-md-line-input">
                                                                                                        <div class="col-md-12">
                                                        <?php echo form_input($gradename); ?>
                                              <span class="error"><?php echo form_error($gradename['name']); ?><?php echo isset($errors[$gradename['name']])?$errors[$gradename['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your grade</span>
                                                    </div>
												</div>
                                                    <div class="form-group form-md-line-input">
                                                                                                       
													<div class="col-md-12">
                                                         <?php echo form_textarea($desc); ?>
                                              <span class="error"><?php echo form_error($desc['name']); ?><?php echo isset($errors[$desc['name']])?$errors[$desc['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter grade description</span>
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