
<div class="row">
                            <div class="col-md-7">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Subjects</span>
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
                                                    <th>  Grade </th>
                                                    <th> Teacher </th>
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
                                                            </ul>
                                                        </div>
                                                    </td>
                                                
                                                </tr> 
                                                <?php    $slog++;}
                                                } else{ ?>
                                                <tr><td>No Data Available</td></tr>
                                                <?php
                                                }
                                                ?>
    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Add Subject</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN FORM-->
                                        <form action="<?=base_url()?>welcome/addGrade" class="form-horizontal" id="form_sample_1" method="post">
                                            <div class="form-body">
                                                <div class="alert alert-danger display-hide">
                                                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                                <div class="alert alert-success display-hide">
                                                    <button class="close" data-close="alert"></button>  Grade Added! </div>
                                                <div class="form-group form-md-line-input">
                                                    <label class="col-md-3 control-label" for="form_control_1">Grade
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="" name="name">
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter grade</span>
                                                    </div>
                                                </div>
                                                 <div class="form-group form-md-line-input">
                                                    <label class="col-md-3 control-label" for="form_control_1">Description</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="desc" rows="3"></textarea>
                                                        <div class="form-control-focus"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green">Add Grade</button>
                                                        <button type="reset" class="btn default">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                        </div>