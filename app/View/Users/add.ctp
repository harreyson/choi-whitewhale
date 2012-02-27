<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('full_name',array('label' => 'Full Name'));
                echo $this->Form->input('email');
                echo $this->Form->input('paypal_account_name');
                echo $this->Form->input('address', array('type' => 'textarea'));
                echo $this->Form->input('phone');
                echo $this->Form->input('user_name',array('label' => 'Username'));
                echo $this->Form->input('password', array('label' => 'Password','type' => 'password'));
                echo $this->Form->input('password_confirm', array('label' => 'Password Confirm', 'type' => 'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
	</ul>
</div>
