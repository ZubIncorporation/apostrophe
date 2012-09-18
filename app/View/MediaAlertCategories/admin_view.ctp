<div class="mediaAlertCategories view">
<h2><?php  echo __('Media Alert Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mediaAlertCategory['MediaAlertCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mediaAlertCategory['MediaAlertCategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Media Alerts'); ?></h3>
	<?php if (!empty($mediaAlertCategory['MediaAlert'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Media Id'); ?></th>
		<th><?php echo __('Media Alert Category Id'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($mediaAlertCategory['MediaAlert'] as $mediaAlert): ?>
		<tr>
			<td><?php echo $mediaAlert['id']; ?></td>
			<td><?php echo $mediaAlert['media_id']; ?></td>
			<td><?php echo $mediaAlert['media_alert_category_id']; ?></td>
			<td><?php echo $mediaAlert['message']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'media_alerts', 'action' => 'view', $mediaAlert['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'media_alerts', 'action' => 'edit', $mediaAlert['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'media_alerts', 'action' => 'delete', $mediaAlert['id']), null, __('Are you sure you want to delete # %s?', $mediaAlert['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Media Alert'), array('controller' => 'media_alerts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
