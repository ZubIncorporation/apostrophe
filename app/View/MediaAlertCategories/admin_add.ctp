<div class="mediaAlertCategories form">
<?php echo $this->Form->create('MediaAlertCategory'); ?>
	<fieldset>
		<legend><?php echo __('Add Media Alert Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
