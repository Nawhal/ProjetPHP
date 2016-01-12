<?php


/**
 * Description of PersonnageGateway
 *
 * @author ceparis
 */
class PersonnageGateway {

    /*
     * Récupère le Personnage d'index $index
     */
    public static function get1Perso($index)
    {
	$index = Validation::nettoyerIndex($index);
        if(empty($index))
        {
                Config::ajouterErreur ("Probleme d'index de personnage");
                return;
        }
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "SELECT * FROM Personnage WHERE indexPerso=$index";
        $connexion->executeQuery($requete);
	$result = $connexion->getResults();

        if(empty($result[0]))
		return null;
	$row = $result[0];
	$perso = new Personnage();
	$perso->index = $row['indexPerso']; 
	$perso->nom = $row['nom'];
	$perso->age = $row['age'];
	$perso->planeteOrigine = $row['planeteOrigine'];
	$perso->description = $row['description'];
	$perso->imagePath = $row['imagePath'];
	return $perso;
    }

     /*
     * Récupère l'ensemble des Personnages sous forme de tableau
     */
    public static function getAllPerso()
    {
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "SELECT * FROM Personnage ORDER BY nom";
        $connexion->executeQuery($requete);
	$result = $connexion->getResults();
        $tabperso = array();
        foreach ($result as $row)
        {	
		$perso = new Personnage();
		$perso->index = $row['indexPerso']; 
		$perso->nom = $row['nom'];
		$perso->age = $row['age'];
		$perso->planeteOrigine = $row['planeteOrigine'];
		$perso->description = $row['description'];
		$perso->imagePath = $row['imagePath'];
		$tabperso[] = $perso;
        }
	return $tabperso;
    }

    /*
     * Valide et sauvegarde un Personnage dont les informations sont passées en paramètres.
     */
    public static function save1Perso($nom, $age, $planeteOrigine, $description, $imagePath)
    {
	$nom = Validation::nettoyerString($nom);
        $nImagePath = Validation::nettoyerPath($imagePath);
        $age = Validation::nettoyerString($age);
        $description = Validation::nettoyerString($description);
        $planeteOrigine = Validation::nettoyerString($planeteOrigine);
        if(empty($nom) || empty($age) || empty($planeteOrigine) || empty($description))
        {
            echo $nom.' '.$age.' '.$planeteOrigine.' '.$description;
            Config::ajouterErreur ("Erreur de Saisie, Champ Incorrect pour l'ajout d'un personnage");
            return;
        }
	$index = self::findMaxIndex();
	$index = $index + 1;
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "INSERT INTO Personnage VALUES($index, '$nom', '$age', '$planeteOrigine', '$description', '$nImagePath')";
        $connexion->executeQuery($requete);
    }

    /*
     * Récupère l'index maximale dans la table de Personnage.
     */
    public static function findMaxIndex()
    {
	$connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "SELECT MAX(indexPerso) FROM Personnage";
        $connexion->executeQuery($requete);
        $result = $connexion->getResults();
	if(empty($result[0][0]))
		return 0;
	return $result[0][0];
    }

    /*
     * Supprime un Personnage dont l'index est passé en paramètre.
     */
    public static function supprimerPerso($index)
    {
        $index = Validation::nettoyerIndex($index);
        if(empty($index))
        {
                Config::ajouterErreur ("Probleme d'index de personnage lors de la suppression.");
                return;
        }
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "DELETE FROM Personnage WHERE indexPerso=$index";
        $connexion->executeQuery($requete);
    }

    /*
     * Modifie un Personnage dont l'index est passé en paramètre avec les données passées en paramètres.
     */
    public static function modifierPerso($index, $nom, $age, $planeteOrigine, $description, $imagePath)
    {
        $index = Validation::nettoyerIndex($index);
        if(empty($index))
        {
                Config::ajouterErreur ("Probleme d'index de personnage");
                return;
        }
	$nom = Validation::nettoyerString($nom);
        $nImagePath = Validation::nettoyerPath($imagePath);
        $age = Validation::nettoyerString($age);
        $description = Validation::nettoyerString($description);
        $planeteOrigine = Validation::nettoyerString($planeteOrigine);
        if(empty($nom) || empty($age) || empty($planeteOrigine) || empty($description))
        {
            Config::ajouterErreur ("Erreur de Saisie, Champ Incorrect pour la modification d'un personnage");
            return;
        }
	$connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "UPDATE Personnage SET nom='$nom', age='$age', planeteOrigine='$planeteOrigine', description='$description', imagePath='$nImagePath' WHERE indexPerso=$index";
        $connexion->executeQuery($requete);
    }

	
}
