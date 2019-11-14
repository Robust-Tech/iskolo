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


?>
 
 <div class="row">
                            <div class="col-md-8">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Register New Student
                                            </span></span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <?php ?>
<?= form_open($this->uri->uri_string(),'class="form-horizontal"')?>
<div class="form-body">
    <div class="form-group form-md-line-input">
      
                                                    <div class="col-md-4">
                                                        <?php echo form_input($lastname); ?>
                                              <span class="error"><?php echo form_error($lastname['name']); ?><?php echo isset($errors[$lastname['name']])?$errors[$lastname['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your surname</span>
                                                    </div>
													<div class="col-md-4">
                                                         <?php echo form_input($firstname); ?>
                                              <span class="error"><?php echo form_error($firstname['name']); ?><?php echo isset($errors[$firstname['name']])?$errors[$firstname['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your first name</span>								
                                                    </div>
													<div class="col-md-4">
                                                         <?php echo form_input($midname); ?>
                                              <span class="error"><?php echo form_error($midname['name']); ?><?php echo isset($errors[$midname['name']])?$errors[$midname['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your middle name</span>
                                                    </div>
													
													
                                                </div>
              <div class="form-group form-md-line-input">
                                                                                                        <div class="col-md-4">
                                                        <?php echo form_input($dob); ?>
                                              <span class="error"><?php echo form_error($dob['name']); ?><?php echo isset($errors[$dob['name']])?$errors[$dob['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your date of birth</span>
                                                    </div>
													<div class="col-md-4">
                                                         <?php echo form_input($id_no); ?>
                                              <span class="error"><?php echo form_error($id_no['name']); ?><?php echo isset($errors[$id_no['name']])?$errors[$id_no['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your id no. / passport</span>								
                                                    </div>
													<div class="col-md-4">
                                                         <?php echo form_input($gender); ?>
                                              <span class="error"><?php echo form_error($gender['name']); ?><?php echo isset($errors[$gender['name']])?$errors[$gender['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your gender</span>
                                                    </div>
                                                </div>

                                               
              <div class="form-group form-md-line-input">
                                                                                                        <div class="col-md-4">
                                                        <?php echo form_dropdown($parent_id,$parent_list); ?>
                                              <span class="error"><?php echo form_error($parent_id['name']); ?><?php echo isset($errors[$parent_id['name']])?$errors[$parent_id['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your parent</span>
                                                    </div>
													<div class="col-md-4">
                                                         <?php echo form_dropdown($home_language); ?>
                                              <span class="error"><?php echo form_error($home_language['name']); ?><?php echo isset($errors[$home_language['name']])?$errors[$home_language['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your home language</span>								
                                                    </div>
													<div class="col-md-4">
                                                         <?php echo form_dropdown($grade_id,$grade_list); ?>
                                              <span class="error"><?php echo form_error($gender['name']); ?><?php echo isset($errors[$gender['name']])?$errors[$gender['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter grade enrolling for</span>
                                                    </div>
                                                </div>
                                                                                                <div class="form-group form-md-line-input">
                                                                                                        <div class="col-md-6">
                                                        <?php echo form_input($previous_school); ?>
                                              <span class="error"><?php echo form_error($previous_school['name']); ?><?php echo isset($errors[$previous_school['name']])?$errors[$previous_school['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your previous school</span>
                                                    </div>
													<div class="col-md-6">
                                                         <?php echo form_input($previous_school_tel); ?>
                                              <span class="error"><?php echo form_error($previous_school_tel['name']); ?><?php echo isset($errors[$previous_school_tel['name']])?$errors[$previous_school_tel['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your previous school tel</span>								
                                                    </div>
													<div class="col-md-12">
                                                         <?php echo form_textarea($previous_school_address); ?>
                                              <span class="error"><?php echo form_error($previous_school_address['name']); ?><?php echo isset($errors[$previous_school_address['name']])?$errors[$previous_school_address['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your previous school address</span>
                                                    </div>
                                                </div>
                                                </div>
                                                                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green">Register</button>
                                                        <button type="reset" class="btn default">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
<?= form_close()?>
                              </div>
                                </div>
                            </div>
                        </div>