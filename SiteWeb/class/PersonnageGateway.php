<?php


/**
 * Description of PersonnageGateway
 *
 * @author ceparis
 */
class PersonnageGateway {
/*
$server = 'mysql:host=hina;dbname=dbnasayarh';
        $user = 'nasayarh';
        $mdp = 'patate';
*/
    
    public static function getAllPerso()
    {
        $server = 'mysql:host=hina;dbname=dbnasayarh';
        $user = 'nasayarh';
        $mdp = 'patate';
        $connexion = new Connection($server, $user, $mdp, null);
        $requete = "SELECT * FROM Personnage ORDER BY nom";
        $connexion->executeQuery($requete);
	$result = $connexion->getResults();

        foreach ($result as $row)
        {	
		$perso = new Commentaire();
		$perso->nom = $row['nom'];
		$perso->age = $row['age'];
		$perso->planeteOrigine = $row['planeteOrigine'];
		$perso->description = $row['description'];
		$perso->imagePath = $row['imagePath'];
		$tabperso[] = $perso;
        }
	return $tabperso;
    }
}
