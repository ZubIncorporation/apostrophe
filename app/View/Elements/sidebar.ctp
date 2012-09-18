<?php
	$isLogged = $this->requestAction('/users/isLogged');
	$twitter = $this->requestAction('/generals/element_request/twitter');
	
	if($this->plugin == null && $this->request->params['controller'] != 'pages'){
		$object = isset($this->request->params['pass'][0]) ? '/'.$this->request->params['pass'][0] : null;
		$actions = $this->requestAction('/'.$this->request->params['controller'].'/actions/'.$this->request->params['action'].$object);
	}
	else{
		$actions = null;
	}

?>

<div id="sidebar">
	<?php if($actions){ ?>
		<div class="whitebox actions">
			<h2>Actions</h2>
			<ul>
				<?php foreach($actions as $name => $action): ?>
					<li><?php echo $this->Html->link($name, $action); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php } ?>
	<?php if(!$isLogged){ ?>
		<div class="whitebox">
			<?php
				echo $this->Form->create('User', array('action' => 'login'));
				echo $this->Form->inputs(array(
				    'legend' => __('Connexion'),
				    'username',
				    'password'
				));
				echo $this->Form->end('Login');
			?>
			<p id="inscription"><a>Pas inscrit ?</a></p>
		</div>
	<?php } ?>
	
	<div class="whitebox">
		<?php if($isLogged){ ?>
			<div class="actions">
			<h2>Liens</h2>
			<ul>
				<li><?php echo $this->Html->link('Administration', '/admin'); ?></li>
				<li><?php echo $this->Html->link('Logout', '/users/logout'); ?></li>
			</ul>
			</div>
		<?php } ?>
		
		<?php if(!empty($twitter)){ ?>
			<h2>Twitter</h2>
			<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
			<script>
			new TWTR.Widget({
			  version: 2,
			  type: 'profile',
			  rpp: 4,
			  interval: 30000,
			  width: 'auto',
			  height: 300,
			  theme: {
			    shell: {
			      background: '#0d0d0d',
			      color: '#ebcd09'
			    },
			    tweets: {
			      background: '#fffae3',
			      color: '#000000',
			      links: '#37940f'
			    }
			  },
			  features: {
			    scrollbar: false,
			    loop: false,
			    live: false,
			    behavior: 'all'
			  }
			}).render().setUser('<?php echo $twitter; ?>').start();
			</script>
		<?php } ?>
	</div>
	
</div>