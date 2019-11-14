<?php
$email = array('name' => 'email','class' => 'form-control','value' => set_value('email'),'maxlength' => 80,'size' => 30, 'placeholder' => 'Email Address');
$firstname = array('name' => 'firstname','class' => 'form-control','value' => set_value('firstname'), 'placeholder' => 'First Names');
$lastname = array('name' => 'lastname',  'class' => 'form-control', 'value' => set_value('lastname'), 'placeholder' => 'Surname');
$nationality = array('name' => 'nationality',  'class' => 'form-control', 'value' => set_value('nationality'), 'placeholder' => 'Nationality');
$id_no = array('name' => 'id_no', 'class' => 'form-control', 'value' => set_value('id_no'), 'placeholder' => 'ID No. / Passport No.');
$marital_status = array( 'name' => 'marital_status', 'class' => 'form-control', 'value' => set_value('marital_status'), 'placeholder' => 'Marital Status');
$title = array( 'name' => 'title', 'class' => 'form-control', 'value' => set_value('title'), 'placeholder' => 'Title (Dr./Mr./Mrs./etc)');
$cell_number = array('name' => 'cell_number','class' => 'form-control',  'value' => set_value('cell_number') , 'placeholder' => 'Mobile Number');
$phone = array('name' => 'phone', 'class' => 'form-control', 'value' => set_value('phone'), 'placeholder' => 'Home Tel No.');
$home_address = array('name' => 'home_address','class' => 'form-control','value' => set_value('home_address'), 'placeholder' => 'Physical Address', 'rows' => 4);
$postal_address = array('name' => 'postal_address','class' => 'form-control','value' => set_value('postal_address'), 'placeholder' => 'Postal Address', 'rows' => 4);
$employer = array('name' => 'employer','class' => 'form-control','value' => set_value('employer'), 'placeholder' => 'Employer');
$occupation = array('name' => 'occupation','class' => 'form-control','value' => set_value('occupation'), 'placeholder' => 'Occupation');
$work_address = array('name' => 'work_address','class' => 'form-control','value' => set_value('work_address'), 'placeholder' => 'Work Address');
$work_tel = array('name' => 'work_tel','class' => 'form-control','value' => set_value('work_tel'), 'placeholder' => 'Work Tel No.');
$work_fax = array('name' => 'work_fax','class' => 'form-control','value' => set_value('work_fax'), 'placeholder' => 'Work Fax No.');
$password = array('name'	=> 'password','class'	=> 'form-control','value' => set_value('password'),'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),'size'	=> 30, 'placeholder' => 'Password');
$confirm_password = array('name'	=> 'confirm_password','class'	=> 'form-control','value' => set_value('confirm_password'),'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),'size'	=> 30, 'placeholder' => 'Confirm Password');
$marital_options = array('' => 'Marital Status','unmarried' => 'Unmarried', 'married' => 'Married', 'widower' => 'Widower', 'Widow' => 'Widow', 'divorced' => 'Divorced');
 ?>
   <div class="modal-dialog"> 
  <div class="modal-content portlet light portlet-fit portlet-form bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green sbold uppercase">Register Parent
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
<?= form_open('parenter/create','class="form-horizontal" id="register"')?>
<div class="form-body">
    <div class="form-group form-md-line-input">
      
                                                    <div class="col-md-6">
                                                        <?php echo form_input($lastname); ?>
                                              <span class="error"><?php echo form_error($lastname['name']); ?><?php echo isset($errors[$lastname['name']])?$errors[$lastname['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your surname</span>
                                                    </div>
													<div class="col-md-6">
                                                         <?php echo form_input($firstname); ?>
                                              <span class="error"><?php echo form_error($firstname['name']); ?><?php echo isset($errors[$firstname['name']])?$errors[$firstname['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your first name</span>								
                                                    </div>
													
													
													
                                                </div>
              <div class="form-group form-md-line-input">
                  <div class="col-md-4">
                                                        <?php echo form_input($nationality); ?>
                                              <span class="error"><?php echo form_error($nationality['name']); ?><?php echo isset($errors[$nationality['name']])?$errors[$nationality['name']]:''; ?></span>
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
                                                         <?php echo form_input($title); ?>
                                              <span class="error"><?php echo form_error($title['name']); ?><?php echo isset($errors[$title['name']])?$errors[$title['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your gender</span>
                                                    </div>
                                                </div>

                                               
              <div class="form-group form-md-line-input">
                  <div class="col-md-4">
                                                        <?php echo form_dropdown($marital_status,$marital_options); ?>
                                              <span class="error"><?php echo form_error($marital_status['name']); ?><?php echo isset($errors[$marital_status['name']])?$errors[$marital_status['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your parent</span>
                                                    </div>
													<div class="col-md-4">
                                                         <?php echo form_input($phone); ?>
                                              <span class="error"><?php echo form_error($phone['name']); ?><?php echo isset($errors[$phone['name']])?$errors[$phone['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your home tel number</span>								
                                                    </div>
													<div class="col-md-4">
                                                         <?php echo form_input($cell_number); ?>
                                              <span class="error"><?php echo form_error($cell_number['name']); ?><?php echo isset($errors[$cell_number['name']])?$errors[$cell_number['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your mobile contact number</span>
                                                    </div>
                                                </div>
                                                               <div class="form-group form-md-line-input">
                                                                   <div class="col-md-12">
                                                        <?php echo form_input($email); ?>
                                              <span class="error"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your employer</span>
                                                    </div></div>                                           <div class="form-group form-md-line-input">
    <div class="col-md-6">
                                                        <?php echo form_input($password); ?>
                                              <span class="error"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your password</span>
                                                    </div>
													<div class="col-md-6">
                                                         <?php echo form_input($confirm_password); ?>
                                              <span class="error"><?php echo form_error($confirm_password['name']); ?><?php echo isset($errors[$confirm_password['name']])?$errors[$confirm_password['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">confirm your password</span>								
                                                    </div>
                                                    </div>                                             <div class="form-group form-md-line-input">
													<div class="col-md-6">
                                                         <?php echo form_textarea($home_address); ?>
                                              <span class="error"><?php echo form_error($home_address['name']); ?><?php echo isset($errors[$home_address['name']])?$errors[$home_address['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your work address</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <?php echo form_textarea($postal_address); ?>
                                              <span class="error"><?php echo form_error($postal_address['name']); ?><?php echo isset($errors[$postal_address['name']])?$errors[$postal_address['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your work address</span>
                                                    </div>
                                                </div>
    <div class="form-group form-md-line-input">
    <div class="col-md-6">
                                                        <?php echo form_input($employer); ?>
                                              <span class="error"><?php echo form_error($employer['name']); ?><?php echo isset($errors[$employer['name']])?$errors[$employer['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your employer</span>
                                                    </div>
													<div class="col-md-6">
                                                         <?php echo form_input($occupation); ?>
                                              <span class="error"><?php echo form_error($occupation['name']); ?><?php echo isset($errors[$occupation['name']])?$errors[$occupation['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your occupation</span>								
                                                    </div> </div>
                                                    <div class="form-group form-md-line-input">
                                                        <div class="col-md-6">
                                                        <?php echo form_input($work_tel); ?>
                                              <span class="error"><?php echo form_error($work_tel['name']); ?><?php echo isset($errors[$work_tel['name']])?$errors[$work_tel['name']]:''; ?></span>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your $work_tel</span>
                                                    </div>
													<div class="col-md-6">
                                                         <?php echo form_input($work_fax); ?>
                                              <span class="error"><?php echo form_error($work_fax['name']); ?><?php echo isset($errors[$work_fax['name']])?$errors[$work_fax['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your work fax</span>								
                                                    </div>
													<div class="col-md-12">
                                                         <?php echo form_textarea($work_address); ?>
                                              <span class="error"><?php echo form_error($work_address['name']); ?><?php echo isset($errors[$work_address['name']])?$errors[$work_address['name']]:''; ?></span>
                                              
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">enter your work address</span>
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