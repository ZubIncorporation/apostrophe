<div class="mediaCategories view">
<h2><?php  echo __('Media Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mediaCategory['MediaCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mediaCategory['MediaCategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Media'); ?></h3>
	<?php if (!empty($mediaCategory['Media'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Media Category Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Publication'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Is Valid'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($mediaCategory['Media'] as $media): ?>
		<tr>
			<td><?php echo $media['id']; ?></td>
			<td><?php echo $media['media_category_id']; ?></td>
			<td><?php echo $media['title']; ?></td>
			<td><?php echo $media['publication']; ?></td>
			<td><?php echo $media['description']; ?></td>
			<td><?php echo $media['numero']; ?></td>
			<td><?php echo $media['is_valid']; ?></td>
			<td><?php echo $media['created']; ?></td>
			<td><?php echo $media['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'media', 'action' => 'view', $media['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'media', 'action' => 'edit', $media['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'media', 'action' => 'delete', $media['id']), null, __('Are you sure you want to delete # %s?', $media['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Media'), array('controller' => 'media', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
