<?php
	function days_to_date($parution){
		$parution = explode('/', $parution);
		$date = mktime(0, 0, 0, $parution[1], $parution[0], $parution[2]); //h m s M J A
		
		$diff = $date - time();
		
		if($diff <= 0)
			return NULL;
		else
			return date('z', $diff)+1;
	}
	
	$parution = $this->requestAction('/generals/element_request/rebours');
	

	$jours = ($d = days_to_date($parution)) ? $d : 0 ;
	$jours = str_split($jours);
?>

<div id="rebours">
J - 
	<?php 
		foreach($jours as $chiff)
			echo $this->Html->image('numeros/n'.$chiff.'.gif', array('alt' => $chiff, 'border' => '0'));
	?>
</div>