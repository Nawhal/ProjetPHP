<?php

	$rep=__DIR__.'/../';

	// liste des modules � inclure
	//$dConfig['includes']= array('controleur/Validation.php');

	//BD

	$base = 'mysql:host=hina;dbname=dbnasayarh';
        $loginBase = 'nasayarh';
        $mdpBase = 'patate';

	//Vues
        $vues = array();
	$vues['erreur']='vues/erreur.php';
	$vues['vuephp1']='vues/vuephp1.php';
        $vues['vueAccueil']='vues/vueAccueil.php';
?>