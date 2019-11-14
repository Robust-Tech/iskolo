<?php

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
    'class' => 'form-control form-control-solid placeholder-no-fix',
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php $attributes = array('class' => 'login-form'); echo form_open($this->uri->uri_string(),$attributes); ?>
<div class="form-title">
                    <span class="form-title">Forget Password ?<br/></span>
                    <span class="form-subtitle">Enter your e-mail to reset it.</span>
                </div>
                <div class="form-group">
                    <?php echo form_input($login); ?>
		<span style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span></div>
                <div class="form-actions">
                    <?php echo anchor('/login/', 'Back','class="btn btn-default"'); ?>
                    <?php echo form_submit('reset', 'Get a new password','class="btn btn-primary red uppercase pull-right"'); ?>
                </div>
		


<?php echo form_close(); ?>