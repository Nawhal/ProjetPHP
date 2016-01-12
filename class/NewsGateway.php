<?php


/**
 * Description of NewsGateway
 *
 * @author ceparis
 */
class NewsGateway {

    /*
     * Récupère la News d'index $index
     */
    public static function get1News($index)
    {
        $indexNews = Validation::nettoyerIndex($index);
        if(empty($index))
        {
            Config::ajouterErreur ("Erreur Index incorrect");
            return;
        }
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "SELECT * FROM News WHERE indexNews=$index";
        $connexion->executeQuery($requete);
	$result = $connexion->getResults();

        if(empty($result[0]))
		return null;
	$row = $result[0];
	$news = new News();
        $news->index = $row['indexNews'];
        $news->titre = $row['titre'];
        $news->date = $row['date'];
        $news->pathImage = $row['pathImage'];
        $news->resume = $row['resume'];
        $news->contenu = $row['contenu'];
	return $news;
    }

    /*
     * Récupère l'ensemble des News sous forme de tableau
     */
    public static function getAllNews()
    {
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "SELECT * FROM News ORDER BY DATE DESC";
        $connexion->executeQuery($requete);
	$result = $connexion->getResults();
        $tabnews = array();
        foreach ($result as $row)
        {	
		$news = new News();
                $news->index = $row['indexNews'];
                $news->titre = $row['titre'];
                $news->date = $row['date'];
                $news->pathImage = $row['pathImage'];
                $news->resume = $row['resume'];
                $news->contenu = $row['contenu'];
		$tabnews[] = $news;
        }
	return $tabnews;
    }
    
    /*
     * Récupère les 3 News les plus récentes sous forme de tableau
     */
    public static function get3News()
    {
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
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
                $news->index = $row['indexNews'];
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

    /*
     * Valide et sauvegarde une News dont les informations sont passées en paramètres.
     */
    public static function save1News($titre, $pathImage, $resume, $contenu)
    {
        $titre = Validation::nettoyerString($titre);
        $nPathImage = Validation::nettoyerPath($pathImage);
        $resume = Validation::nettoyerString($resume);
        $contenu = Validation::nettoyerString($contenu);
        if(empty($titre) || empty($resume) || empty($contenu))
        {
            Config::ajouterErreur ("Erreur de Saisie, Champ Incorrect pour l'ajout d'une actualité");
            return;
        }
	$index = self::findMaxIndex();
	$index = $index + 1;
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "INSERT INTO News VALUES($index, '$titre', NOW(), '$nPathImage', '$resume', '$contenu')";
        $connexion->executeQuery($requete);
    }

    /*
     * Récupère l'index maximale dans la table de News.
     */
    public static function findMaxIndex()
    {
	$connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "SELECT MAX(indexNews) FROM News";
        $connexion->executeQuery($requete);
        $result = $connexion->getResults();
	if(empty($result[0][0]))
		return 0;
	return $result[0][0];
    }

    /*
     * Supprime une News dont l'index est passé en paramètre.
     */
    public static function supprimerNews($index)
    {
	$index = Validation::nettoyerIndex($index);
        if(empty($index))
        {
                Config::ajouterErreur ("Probleme d'index d'actualité");
                return;
        }
	$connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "DELETE FROM News WHERE indexNews=$index";
        $connexion->executeQuery($requete);
    }

    /*
     * Modifie une News dont l'index est passé en paramètre avec les données passées en paramètres.
     */
    public static function modifierNews($index, $titre, $pathImage, $resume, $contenu)
    {
        $index = Validation::nettoyerIndex($index);
        if(empty($index))
        {
                Config::ajouterErreur ("Probleme d'index d'actualité pour la modification");
                return;
        }
	$titre = Validation::nettoyerString($titre);
        $nPathImage = Validation::nettoyerPath($pathImage);
        $resume = Validation::nettoyerString($resume);
        $contenu = Validation::nettoyerString($contenu);
        if(empty($titre) || empty($resume) || empty($contenu))
        {
            Config::ajouterErreur ("Erreur de Saisie, Champ Incorrect pour la modification");
            return;
        }
	$connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "UPDATE News SET titre='$titre', pathImage='$nPathImage', resume='$resume', contenu='$contenu' WHERE indexNews=$index";
        $connexion->executeQuery($requete);
	
    }

}

