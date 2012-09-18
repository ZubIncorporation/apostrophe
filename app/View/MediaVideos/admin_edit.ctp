<div class="mediaVideos form">
<?php echo $this->Form->create('MediaVideo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Media Video'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
