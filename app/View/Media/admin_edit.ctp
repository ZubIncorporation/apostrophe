<div class="media form">
<?php echo $this->Form->create('Media'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Media'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('media_category_id');
		echo $this->Form->input('title');
		echo $this->Form->input('publication');
		echo $this->Form->input('description');
		echo $this->Form->input('MediaAuthor');
		echo $this->Form->input('MediaTag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
