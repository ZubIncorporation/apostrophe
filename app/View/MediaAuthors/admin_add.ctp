<div class="mediaAuthors form">
<?php echo $this->Form->create('MediaAuthor'); ?>
	<fieldset>
		<legend><?php echo __('Add Media Author'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('promotion');
		echo $this->Form->input('Media');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
