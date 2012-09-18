<div class="mediaAlerts form">
<?php echo $this->Form->create('MediaAlert'); ?>
	<fieldset>
		<legend>Signaler un problème sur "<?php echo $media_title; ?>"</legend>
	<?php
		echo $this->Form->input('media_id', array('type'=>'hidden', 'value'=>$media_id) ); 
		echo $this->Form->input('media_alert_category_id');
		echo $this->Form->input('message');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
