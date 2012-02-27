<?php
if (Configure::read('debug') == 0):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
?>

<?php
if (Configure::read('debug') > 0):
	Debugger::checkSecurityKeys();
endif;
?>
<p>
<legend><?php echo __('Add User'); ?></legend>

<?php

echo $this->Form->create(array('action' => 'register'));
echo $this->Form->input('full_name',array('label' => 'Full Name'));
echo $this->Form->input('email');
echo $this->Form->input('paypal_account_name');
echo $this->Form->input('address', array('type' => 'textarea'));
echo $this->Form->input('phone');
echo $this->Form->input('user_name',array('label' => 'Username'));
echo $this->Form->input('password', array('label' => 'Password','type' => 'password'));
echo $this->Form->input('password_confirm', array('label' => 'Password Confirm', 'type' => 'password'));
echo "Captcha";
echo $this->Recaptcha->display(array('recaptchaOptions' => array('theme' => 'white')));
echo '<br>';
echo $this->Form->end('Register');
?>
</p>


