<div class="mediaTags form">
<?php echo $this->Form->create('MediaTag'); ?>
	<fieldset>
		<legend><?php echo __('Add Media Tag'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('Media');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
