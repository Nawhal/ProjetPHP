<?php


/**
 * Description of CommentaireGateway
 *
 * @author ceparis
 */
class CommentaireGateway {
/*
$server = 'mysql:host=hina;dbname=dbnasayarh';
        $user = 'nasayarh';
        $mdp = 'patate';
*/
    
    public static function getAllForIndex($index)
    {
        $server = 'mysql:host=hina;dbname=dbnasayarh';
        $user = 'nasayarh';
        $mdp = 'patate';
        $connexion = new Connection($server, $user, $mdp, null);
        $requete = "SELECT * FROM Commentaire WHERE indexNews=$index ORDER BY date DESC";
        $connexion->executeQuery($requete);
	$result = $connexion->getResults();

        foreach ($result as $row)
        {	
		$com = new Commentaire();
		$com->pseudo = $row['pseudo'];
		$com->date = $row['date'];
		$com->indexNews = $row['indexNews'];
		$com->contenu = $row['contenu'];
		$tabcom[] = $com;
        }
	return $tabcom;
    }
}
