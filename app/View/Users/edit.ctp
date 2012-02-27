<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('full_name');
                echo $this->Form->input('email');
		echo $this->Form->input('paypal_account_name');
		echo $this->Form->input('address',array('type' => 'textarea'));
                echo $this->Form->input('phone');
		echo $this->Form->input('user_name');
		//echo $this->Form->input('password',array('type' => 'text'));
               $status = $this->request->data['User']['status'];                
	?>
                Status </br>
                <select name="data[User][status]">
                  <option value="active" <?php if($status == 'active'){ ?> selected="selected" <?php } ?> >Active</option>
                  <option value="inactive" <?php if($status == 'inactive'){ ?> selected="selected" <?php } ?> >Inactive</option>
                </select> 
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.user_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.user_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
	</ul>
</div>
