<?php
$login = array(
	'name'	=> 'login','placeholder' => 'Email or Username',
	'id'	=> 'login',
	'value' => set_value('login'),'class' => 'form-control form-control-solid placeholder-no-fix',
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or Username';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password','class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Password',
	'id'	=> 'password',
	'autocomplete'	=> 'off',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<?php		$attributes = array('class' => 'login-form');
		echo form_open($this->uri->uri_string(),$attributes);  ?>
<div class="form-group">
                              <?php echo form_input($login); ?>
															<span class="error"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
                            
                        </div>
												<div class="form-group">
											                            
											                               
																											<?php echo form_password($password); ?>
																												<span class="error"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
																											</div>
																							<div class="form-actions no-border margin-top-20">
																							                            <?php echo form_submit('submit', 'Login','class="btn red btn-block uppercase"'); ?>
																							                        </div>
			<p class="col-md-12"><?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?></p>
<?php echo form_close(); ?>
