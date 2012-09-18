<?php if (!empty($media['MediaAlert'])): ?>
	<div class="info">
		<h3>Alertes Utilisateurs</h3>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th>Catégorie</th>
			<th>Message</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
			foreach ($media['MediaAlert'] as $mediaAlert): ?>
			<tr>
	
				<td><?php echo $mediaAlert['media_alert_category_id']; ?></td>
				<td style="width: 60%;"><?php echo $mediaAlert['message']; ?></td>
				<td class="actions">
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'media_alerts', 'action' => 'delete', 'admin'=>true, $mediaAlert['id']), null, __('Are you sure you want to delete # %s?', $mediaAlert['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>


<?php if(!empty($media['MediaFile']['path'])): ?>

	<div class="whitebox miniature_pdf">
		<?php echo $this->Html->image('apostrophe.png', array('alt' => 'Miniature'));?>
		<p class="actions">
			<?php echo $this->Html->link('Télécharger', $media['MediaFile']['path']); ?>
		</p>
	</div>
	
<?php endif; ?>

<?php if(!empty($media['MediaVideo']['url'])): ?>
	
	<div class="mediavideo">
		<iframe class="youtube-player" type="text/html" width="640" height="385" src="http://www.youtube.com/embed/<?php echo $media['MediaVideo']['url']; ?>" frameborder="0">
		</iframe>
	</div>

<?php endif; ?>


<div class="media view" style="width : 55%">

<h2><?php  echo $media['MediaCategory']['name']. ' ' . $media['Media']['title'];  ?></h2>
	<dl>
		<dt>Publication</dt>
		<dd>
			<?php echo h($media['Media']['publication']); ?>
			&nbsp;
		</dd>
		
		<dt>Auteurs</dt>
		<dd>
			<?php if (!empty($media['MediaAuthor'])): ?>
				<ul>
					<?php foreach ($media['MediaAuthor'] as $mediaAuthor): ?>
						<li><?php echo $mediaAuthor['name']; ?> (Promo. <?php echo $mediaAuthor['promotion']; ?>)</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			&nbsp;
		</dd>
		
		<dt>Tags</dt>
		<dd>
			<?php if (!empty($media['MediaTag'])): ?>
				<ul>
					<?php foreach ($media['MediaTag'] as $mediaTag): ?>
						<li><?php echo $mediaTag['name']; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			&nbsp;
		</dd>
		
	</dl>
</div>

<div class="whitebox" style="clear : both">

	<h2>Description</h2>
	
	<?php echo h($media['Media']['description']); ?>
	
</div>
