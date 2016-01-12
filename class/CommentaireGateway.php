<?php


/**
 * Description of CommentaireGateway
 *
 * @author ceparis
 */
class CommentaireGateway {
    
    /**
     * Récupère tous les commentaires pour un article d'index $index
     */
    public static function getAllForIndex($index)
    {
        $index = Validation::nettoyerIndex($index);
        if(empty($index))
        {
                Config::ajouterErreur ("Probleme d'index de commentaire");
                return;
        }
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "SELECT * FROM Commentaire WHERE indexNews=$index ORDER BY date DESC";
        $connexion->executeQuery($requete);
	$result = $connexion->getResults();
        $tabcom = array();
        foreach ($result as $row)
        {	
		$com = new Commentaire();
		$com->indexCom = $row['indexCom'];
		$com->indexNews = $row['indexNews'];
		$com->pseudo = $row['pseudo'];
		$com->date = $row['date'];
		$com->contenu = $row['contenu'];
		$tabcom[] = $com;
        }
	return $tabcom;
    }

    
    /**
     * Supprime tous les commentaires pour un article d'index $index
     */
    public static function suppAllForIndex($index)
    {
        $index = Validation::nettoyerIndex($index);
        if(empty($index))
        {
                Config::ajouterErreur ("Probleme d'index de commentaire");
                return;
        }
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "DELETE FROM Commentaire WHERE indexNews=$index";
        $connexion->executeQuery($requete);
    }
    
    /**
     * Sauvegarde un commentaire dont les infos sont passées en commentaire
     */
    public static function save1Commentaire($indexNews, $pseudo, $contenu)
    {
        $indexNews = Validation::nettoyerIndex($indexNews);
        $pseudo = Validation::nettoyerString($pseudo);
        $contenu = Validation::nettoyerString($contenu);
        if(empty($indexNews) || empty($pseudo) || empty($contenu))
        {
            Config::ajouterErreur ("Champs incorrects");
            return;
        }
	$tabcom = self::getAllForIndex($indexNews);
	if(!empty($tabcom[2]))
	{
		self::supprimerCommentaire($indexNews, $tabcom[2]->indexCom);
		$index = $tabcom[2]->indexCom;
	}
	else
		$index = self::getIndexLibre($tabcom);
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "INSERT INTO Commentaire VALUES($index, $indexNews, '$pseudo', '$contenu', NOW())";
        $connexion->executeQuery($requete);
    }

    /**
     * Renvoie un index de commentaire libre, soit 1, 2 ou 3
     */
    public static function getIndexLibre($tabCom)
    {
	if(empty($tabCom[0]->indexCom))
		return 1;
	if(empty($tabCom[1]->indexCom))
	{	
		if($tabCom[0]->indexCom == 1)
			return 2;
		else
			return 1;
	}
		
	$somme = $tabCom[0]->indexCom+ $tabCom[1]->indexCom; 
	if($somme == 3)
		return 3;
	if($somme == 5)
		return 1;
	if($somme == 4)
		return 2;
    }

    /**
     * Supprime le commentaire d'index $indexCom pour la News d'index $indexNews
     */
    public static function supprimerCommentaire($indexNews, $indexCom)
    {
	$indexNews = Validation::nettoyerIndex($indexNews);
        $indexCom = Validation::nettoyerIndex($indexCom);
        if(empty($indexCom) || empty($indexCom))
        {
                Config::ajouterErreur ("Probleme d'index de commentaire");
                return;
        }
	$connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "DELETE FROM Commentaire WHERE indexNews=$indexNews AND indexCom=$indexCom";
        $connexion->executeQuery($requete);
    }
}
