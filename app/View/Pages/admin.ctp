<h2>Panel Administration</h2>

<table class="panel whitebox">
	<tr class="lien">
		<td><?php echo $this->Html->image('media.png', array('alt' => 'Media', 'url' => array('controller' => 'media', 'admin'=>true)));?></td>
		<td><?php echo $this->Html->image('users.png', array('alt' => 'Users', 'url' => array('controller' => 'users')));?></td>
		<td><?php echo $this->Html->image('edito.png', array('alt' => 'Edito', 'url' => array('controller' => 'generals', 'action'=>'edit', 1, 'admin'=>true)));?></td>
	</tr>
	<tr class="label">
		<td>Media</td>
		<td>Utilisateurs</td>
		<td>Edito</td>
	</tr>
	<tr class="lien">
		<td><?php echo $this->Html->image('rebours.png', array('alt' => 'Rebours', 'url' => array('controller' => 'generals', 'action'=>'edit', 2, 'admin'=>true)));?></td>
		<td><?php echo $this->Html->image('twitter.png', array('alt' => 'Twitter', 'url' => array('controller' => 'generals', 'action'=>'edit', 3, 'admin'=>true)));?></td>
		<td></td>
	</tr>
	<tr class="label">
		<td>Compte à Rebours</td>
		<td></td>
		<td></td>
	</tr>
</table>