<div class="mediaAlerts view">
<h2><?php  echo __('Media Alert'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mediaAlert['MediaAlert']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mediaAlert['Media']['title'], array('controller' => 'media', 'action' => 'view', $mediaAlert['Media']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media Alert Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mediaAlert['MediaAlertCategory']['name'], array('controller' => 'media_alert_categories', 'action' => 'view', $mediaAlert['MediaAlertCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($mediaAlert['MediaAlert']['message']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
