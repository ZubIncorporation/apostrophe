<div class="mediaAlerts index">
	<h2><?php echo __('Media Alerts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('media_id'); ?></th>
			<th><?php echo $this->Paginator->sort('media_alert_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('message'); ?></th>
	</tr>
	<?php
	foreach ($mediaAlerts as $mediaAlert): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($mediaAlert['Media']['title'], array('controller' => 'media', 'action' => 'view', 'admin' => false, $mediaAlert['Media']['id'])); ?>
		</td>
		<td>
			<?php echo $mediaAlert['MediaAlertCategory']['name']; ?>
		</td>
		<td><?php echo h($mediaAlert['MediaAlert']['message']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>