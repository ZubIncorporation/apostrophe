<div class="generals form">
<?php echo $this->Form->create('General'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit General'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
