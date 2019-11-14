 <?php
$email = array('name' => 'email','class' => 'form-control','value' => set_value('email'),'maxlength' => 80,'size' => 30, 'placeholder' => 'Email Address');

$firstname = array('name' => 'firstname','class' => 'form-control','value' => set_value('firstname'), 'placeholder' => 'First Names');

$lastname = array('name' => 'lastname',  'class' => 'form-control', 'value' => set_value('lastname'), 'placeholder' => 'Surname');

$nationality = array('name' => 'nationality',  'class' => 'form-control', 'value' => set_value('nationality'), 'placeholder' => 'Nationality');

$id_no = array('name' => 'id_no', 'class' => 'form-control', 'value' => set_value('id_no'), 'placeholder' => 'ID No. / Passport No.');
$gender = array('name' => 'gender', 'class' => 'form-control', 'value' => set_value('gender'), 'placeholder' => 'Gender [Male / Female]');

$midname = array('name' => 'midname', 'class' => 'form-control', 'value' => set_value('midname'), 'placeholder' => 'Middle Name');

$dob = array('name' => 'dob', 'class' => 'form-control', 'value' => set_value('dob'), 'placeholder' => 'Date of Birth');

$parent_id = array('name' => 'parent_id', 'class' => 'form-control', 'value' => set_value('parent_id'));

$home_language = array('name' => 'home_language', 'class' => 'form-control', 'value' => set_value('home_language'));

$grade_id = array('name' => 'grade_id', 'class' => 'form-control', 'value' => set_value('grade_id'));

$previous_school = array('name' => 'previous_school', 'class' => 'form-control', 'value' => set_value('previous_school'),'placeholder' => 'Previous School');

$previous_school_address = array('name' => 'previous_school_address', 'class' => 'form-control', 'value' => set_value('previous_school_address'),'placeholder' => 'Previous School Address');

$previous_school_tel = array('name' => 'previous_school_tel', 'class' => 'form-control', 'value' => set_value('previous_school_tel'),'placeholder' => 'Previous School Tel No.');
$password = array('name'	=> 'password','class'	=> 'form-control','value' => set_value('password'),'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),'size'	=> 30, 'placeholder' => 'Password');
$confirm_password = array('name'	=> 'confirm_password','class'	=> 'form-control','value' => set_value('confirm_password'),'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),'size'	=> 30, 'placeholder' => 'Confirm Password');
?>
<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">  Students</span>
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
                                                    <th> Parent </th>
                                                    <th> Status </th>
                                                    <th> Actions </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(!empty($students)){
                                                    $slog = 1;
                                                    foreach($students as $student){
                                                ?>
                                                <tr class="<?php echo ($slog & 1)?"odd gradeX":"even gradeC" ?>">
                                                <td><?=$student->first_name?> <?=$student->middle_name?> <?=$student->surname?></td>
                                                <td><?=$student->grade_name?></td>
                                                <td><?=$student->parent_name?> <?=$student->mid_name?> <?=$student->parent_surname?></td>
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
                                                <tr><td>No students are registered yet</td></tr>
                                                <?php
                                                }
                                                ?>
    
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        

                            </div>
                        