<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsGateway
 *
 * @author ceparis
 */
class NewsGateway {
/*
$server = 'mysql:host=hina;dbname=dbnasayarh';
        $user = 'nasayarh';
        $mdp = 'patate';
*/
    
    public static function getAllNews()
    {
        $server = 'mysql:host=hina;dbname=dbnasayarh';
        $user = 'nasayarh';
        $mdp = 'patate';

        $connexion = new Connection($server, $user, $mdp, null);
        $requete = "SELECT * FROM News";
        $connexion->executeQuery($requete);
	$result = $connexion->getResults();
        foreach ($result as $row)
        {	
		$news = new News();
                $news->index = $row['index'];
                $news->titre = $row['titre'];
                $news->date = $row['date'];
                $news->pathImage = $row['pathImage'];
                $news->resume = $row['resume'];
                $news->contenu = $row['contenu'];
		$tabnews[] = $news;
		$compteur = $compteur-1;
        }
	return $tabnews;
    }
    
    public static function get3News()
    {
        $server = 'mysql:host=localhost;dbname=sitePhpDW';
        $user = 'root';
        $mdp = 'cedre2510';
        
        $connexion = new Connection($server, $user, $mdp, null);
        $requete = "SELECT * FROM News ORDER BY DATE DESC";
        $connexion->executeQuery($requete);
        $result = $connexion->getResults();
        $compteur=3;
	$tabnews = array();
        foreach ($result as $row)
        {	
		if($compteur==0)
			break;
		$news = new News();
                $news->index = $row['index'];
                $news->titre = $row['titre'];
                $news->date = $row['date'];
                $news->pathImage = $row['pathImage'];
                $news->resume = $row['resume'];
                $news->contenu = $row['contenu'];
		$tabnews[] = $news;
		$compteur = $compteur-1;
        }
	return $tabnews;
        
    }
}

