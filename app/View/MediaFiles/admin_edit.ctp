<div class="mediaFiles form">
<?php echo $this->Form->create('MediaFile', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Mettre le fichier à jour'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fileName', array('type'=>'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

