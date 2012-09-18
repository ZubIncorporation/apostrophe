<div class="media form">
<?php echo $this->Form->create('Media', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Media'); ?></legend>
	<?php
		echo $this->Form->input('media_category_id');
		echo $this->Form->input('title');
		echo $this->Form->input('publication');
		echo $this->Form->input('description');
		echo $this->Form->input('MediaAuthor');
		echo $this->Form->input('MediaTag');
	?>
	</fieldset>
	
	<fieldset>
		<legend>Media Associé</legend>
	<?php
		echo $this->Form->radio('type', array('file' => 'Fichier PDF', 'video' => 'Vidéo Youtube'), array('legend' => false));
		echo $this->Form->input('MediaFile.fileName', array('type'=>'file', 'label'=>'PDF à uploader'));
		echo $this->Form->input('MediaVideo.url', array( 'label'=>'URL de la vidéo'));
	?>
	</fieldset>
	
<?php echo $this->Form->end(__('Submit')); ?>
</div>
