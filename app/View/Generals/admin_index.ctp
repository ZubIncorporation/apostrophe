<div class="generals index">
	<h2><?php echo __('Generals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Nom</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($generals as $general): ?>
	<tr>
		<td><?php echo h($general['General']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $general['General']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

