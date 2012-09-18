<div class="mediaFiles view">
<h2><?php  echo __('Media File'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mediaFile['Media']['title'], array('controller' => 'media', 'action' => 'view', $mediaFile['Media']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($mediaFile['MediaFile']['path']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Media File'), array('action' => 'edit', $mediaFile['MediaFile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Media File'), array('action' => 'delete', $mediaFile['MediaFile']['id']), null, __('Are you sure you want to delete # %s?', $mediaFile['MediaFile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Files'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media File'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media'), array('controller' => 'media', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media'), array('controller' => 'media', 'action' => 'add')); ?> </li>
	</ul>
</div>
