<?php

/**
 * Description of Config
 *
 * @author ceparis
 */
class Config {

        private static $tabErreur = array();
        /*
         * Ajoute une erreur donnée en paramètre dans le tableau d'erreurs
         */
        public static function ajouterErreur($stringErreur)
        {
            self::$tabErreur = $stringErreur;
        }
        
        /*
         * Indique s'il y a une ou plusieurs erreurs dans le tableau d'erreurs
         */
        public static function hasErreur()
        {
            if(count(self::$tabErreur)!=0)
                return true;
            return false;
        }
        
        /*
         * Retourne le tableau d'erreurs
         */
        public static function getErreurs()
        {
            return self::$tabErreur;
        }
	
        /*
         * Donne accès aux informations de la base de données
         */
	public static function getDataBaseInfos()
	{
		$dataBaseInfos = array();
		$dataBaseInfos['DBname'] = 'mysql:host=****;dbname=db********';
		$dataBaseInfos['login'] = '********';
		$dataBaseInfos['mdp'] = '******';
		return $dataBaseInfos;
	}

        /*
         * Donne accès aux informations sur les fichiers uploadés
         */
	public static function getUploadInfos()
	{	
		$uploadInfos = array();
		$uploadInfos['fileMaxSize'] = 1048576;
		$uploadInfos['imageMaxWidth'] = 1920;
		$uploadInfos['imageMaxHeight'] = 1080;
		return $uploadInfos;
	}
	
        /*
         * Renvoie l'ensemble des vues
         */
	public static function getViews()
	{	
		global $rootDirectory;
		$vues = array();
		$vues['erreur']=$rootDirectory.'vues/erreur.php';
                $vues['vueErreur']=$rootDirectory.'vues/vueErreur.php';
		$vues['vueAccueil']=$rootDirectory.'vues/vueAccueil.php';
		$vues['vueActualites']=$rootDirectory.'vues/vueActualites.php';
		$vues['vueAjoutActualite']=$rootDirectory.'vues/vueAjoutActualite.php';
		$vues['vueModifActualite']=$rootDirectory.'vues/vueModifActualite.php';
		$vues['vuePersonnages']=$rootDirectory.'vues/vuePersonnages.php';
		$vues['vueAjoutPersonnage']=$rootDirectory.'vues/vueAjoutPersonnage.php';
		$vues['vueModifPersonnage']=$rootDirectory.'vues/vueModifPersonnage.php';
		return $vues;
	}
}

