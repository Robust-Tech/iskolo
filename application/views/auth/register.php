<?php
$this->load->view('common/header');
if ($use_username) {
  $username = array('name' => 'username',  'class' => 'form-control',  'value' =>set_value('username'),  'maxlength' => $this->config->item('username_max_length','tank_auth'), 'size' => 30, 'placeholder' => 'username');
}

$email = array('name' => 'email','class' => 'form-control','value' => set_value('email'),'maxlength' => 80,'size' => 30, 'placeholder' => 'Email Address');
$firstname = array('name' => 'firstname','class' => 'form-control','value' => set_value('firstname'), 'placeholder' => 'Full Names');
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
$confirm_password = array('name'	=> 'confirm_password','class'	=> 'form-control input-lg','value' => set_value('confirm_password'),'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),'size'	=> 30, 'placeholder' => 'Confirm Password');
$captcha = array('name'	=> 'captcha','id'	=> 'captcha','class'	=> 'form-control input-lg','maxlength'	=> 8);
$marital_options = array('' => 'Marital Status','unmarried' => 'Unmarried', 'married' => 'Married', 'widower' => 'Widower', 'Widow' => 'Widow', 'divorced' => 'Divorced');

 ?>
<div class="page page-login page-login page-registration page-content">
  <div class=" page-login-block">
    <div class="page-login-block__form">
      <?php echo form_open($this->uri->uri_string(),'class="form-horizontal" id="wizard-validation"'); ?>
      <div class="wizard show-submit wizard-validation">
        <ul>
          <li>
            <a href="#pd">
                                                <span class="stepNumber">1</span>
                                                <span class="stepDesc">Personal<br /><small>Personal Details</small></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#hd">
                                                <span class="stepNumber">2</span>
                                                <span class="stepDesc">Contact <br /><small>Address Details</small></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#ed">
                                                <span class="stepNumber">3</span>
                                                <span class="stepDesc">Employment <br /><small>Employment Details</small></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#ld">
                                                <span class="stepNumber">4</span>
                                                <span class="stepDesc">Acount <br /><small>Login Details</small></span>
                                            </a>
                                        </li>
        </ul>
        <div id="pd">
          <div class="row"></div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <?php echo form_input($firstname); ?>
                                            <span class="hidden-xs error"><?php echo form_error($firstname['name']); ?><?php echo isset($errors[$firstname['name']])?$errors[$firstname['name']]:''; ?></span>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <?php echo form_input($lastname); ?>
                                              <span class="error"><?php echo form_error($lastname['name']); ?><?php echo isset($errors[$lastname['name']])?$errors[$lastname['name']]:''; ?></span>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <?php echo form_input($id_no); ?>
                                            <span class="error"><?php echo form_error($id_no['name']); ?><?php echo isset($errors[$id_no['name']])?$errors[$id_no['name']]:''; ?></span>
                                          </div>

                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group ">
                                            <?php echo form_input($nationality); ?>
                                            <span class="error"><?php echo form_error($nationality['name']); ?><?php echo isset($errors[$nationality['name']])?$errors[$nationality['name']]:''; ?></span>
                                          </div>

                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <?php echo form_input($marital_status); ?>
                                            <span class="error"><?php echo form_error($marital_status['name']); ?><?php echo isset($errors[$marital_status['name']])?$errors[$marital_status['name']]:''; ?></span>

                                          </div>

                                      </div>


                                      <div class="col-md-6">
                                          <div class="form-group">
                                            <?php echo form_input($title); ?>
                                            <span class="error"><?php echo form_error($marital_status['name']); ?><?php echo isset($errors[$marital_status['name']])?$errors[$marital_status['name']]:''; ?></span>

                                          </div>

                                      </div>

        </div>
        <div id="hd">
          <div class="col-md-6">
              <div class="form-group">
                <?php echo form_input($phone); ?>
                <span class="error"><?php echo form_error($phone['name']); ?><?php echo isset($errors[$phone['name']])?$errors[$phone['name']]:''; ?></span>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <?php echo form_input($cell_number); ?>
                  <span class="error"><?php echo form_error($cell_number['name']); ?><?php echo isset($errors[$cell_number['name']])?$errors[$cell_number['name']]:''; ?></span>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <?php echo form_input($email); ?>
                <span class="error"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></span>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                <?php echo form_textarea($home_address); ?>
                <span class="error"><?php echo form_error($home_address['name']); ?><?php echo isset($errors[$home_address['name']])?$errors[$home_address['name']]:''; ?></span>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                  <?php echo form_textarea($postal_address); ?>
                  <span class="error"><?php echo form_error($postal_address['name']); ?><?php echo isset($errors[$postal_address['name']])?$errors[$postal_address['name']]:''; ?></span>
              </div>
          </div>
        </div>
        <div id="ed">
          <div class="col-md-6">
              <div class="form-group">
                <?php echo form_input($employer); ?>
                <span class="error"><?php echo form_error($employer['name']); ?><?php echo isset($errors[$employer['name']])?$errors[$employer['name']]:''; ?></span>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <?php echo form_input($occupation); ?>
                  <span class="error"><?php echo form_error($occupation['name']); ?><?php echo isset($errors[$occupation['name']])?$errors[$occupation['name']]:''; ?></span>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <?php echo form_input($work_tel); ?>
                <span class="error"><?php echo form_error($work_tel['name']); ?><?php echo isset($errors[$work_tel['name']])?$errors[$work_tel['name']]:''; ?></span>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <?php echo form_input($work_fax); ?>
                <span class="error"><?php echo form_error($work_fax['name']); ?><?php echo isset($errors[$work_fax['name']])?$errors[$work_fax['name']]:''; ?></span>
              </div>
          </div>
          <div class="col-md-12">
              <div class="form-group">
                  <?php echo form_textarea($work_address); ?>
                  <span class="error"><?php echo form_error($work_address['name']); ?><?php echo isset($errors[$work_address['name']])?$errors[$work_address['name']]:''; ?></span>
              </div>
          </div>
        </div>
        <div id="ld">
          <?php if ($use_username) { ?>
          <div class="col-md-12">
              <div class="form-group">
                <?php echo form_input($username); ?>
                <span class="error"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></span>
              </div>
          </div>
          <?php } ?>
          <div class="col-md-6">
              <div class="form-group">
                <?php echo form_password($password); ?>
                <span class="error"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <?php echo form_password($confirm_password); ?>
                  <span class="error"><?php echo form_error($confirm_password['name']); ?><?php echo isset($errors[$confirm_password['name']])?$errors[$confirm_password['name']]:''; ?></span>
              </div>
          </div>
        </div>
        </div>
      </div>
      <?php echo form_close(); ?>

    </div>
  </div>
</div>
<?php $this->load->view('common/footer'); ?>
