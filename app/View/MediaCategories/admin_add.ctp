<div class="mediaCategories form">
<?php echo $this->Form->create('MediaCategory'); ?>
	<fieldset>
		<legend><?php echo __('Add Media Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
