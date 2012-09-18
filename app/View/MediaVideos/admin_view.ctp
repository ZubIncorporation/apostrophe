<div class="mediaVideos view">
<h2><?php  echo __('Media Video'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mediaVideo['MediaVideo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Media'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mediaVideo['Media']['title'], array('controller' => 'media', 'action' => 'view', $mediaVideo['Media']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($mediaVideo['MediaVideo']['url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Media Video'), array('action' => 'edit', $mediaVideo['MediaVideo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Media Video'), array('action' => 'delete', $mediaVideo['MediaVideo']['id']), null, __('Are you sure you want to delete # %s?', $mediaVideo['MediaVideo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Media Videos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media Video'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Media'), array('controller' => 'media', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Media'), array('controller' => 'media', 'action' => 'add')); ?> </li>
	</ul>
</div>
