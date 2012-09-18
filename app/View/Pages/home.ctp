<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
if (Configure::read('debug') == 0):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');

	$edito = $this->requestAction('/generals/element_request/edito');

?>

<div class="whitebox">
	<h2>Bienvenue sur le site de l'Apostrophe</h2>
	<p>L'Apostrophe est LE journal étudiant de l’EPF, École d'Ingénieurs. Publié à 700 exemplaires toutes les trois semaines, l’Apostrophe s’adresse non seulement aux élèves de l’EPF mais aussi à son administration. Par différents articles (interviews, sondages, reportages...) le journal renseigne les élèves sur la vie générale de l’école.</p>

	<p>L'association est gérée par une équipe organisée et motivée d’une quinzaine de personnes. Ses objectifs : resserrer les liens entre les élèves, l’administration et les associations.</p>
</div>

<?php if(!empty($edito)){ ?>
	<div class="whitebox">
		<h2>Édito</h2>
		<?php echo $edito; ?>
	</div>
<?php } ?>

<!--
<div id="barre_droite">
	<div id="alaune" class="whitebox">
		<img src="images/accueil/une.png" alt="La une"/>
	</div>
</div>

<div id="numero">
	<a href="multimedia/archives/Apostrophe5-16-12-2010.pdf"><img src="images/accueil/dernier_numero.png" alt="Le dernier numéro"/></a>
</div>
-->