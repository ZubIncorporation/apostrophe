<?php
	$actual = null;
	$onglets = array(
		'index' => '/',
		'archives' => '/media',
		'contact' => '/pages/contact'
	);
	
	if($this->request->controller == 'media')
		$actual = 'archives';
		
	else if($this->request->here == '/apostrophe/' || $this->request->here == '/apostrophe/pages/home')
		$actual = 'index';
		
	else if($this->request->here == '/apostrophe/pages/contact')
		$actual = 'contact';
?>
<div id="onglets">
	<ul>
		<?php foreach($onglets as $onglet => $path) : 
			$neg = $onglet == $actual ? '-neg' : null;
		?>
			<li>
				<?php echo $this->Html->link(
						$this->Html->image('onglet-'.$onglet.$neg.'.png', array('alt' => $onglet, 'border' => '0')),
						$path,
						array('escape' => false)
					);
				?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>