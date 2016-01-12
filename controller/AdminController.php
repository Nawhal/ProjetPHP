<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 *
 * @author ceparis
 */
class AdminController {
    
    public function __construct($action){

        switch($action){
                case "addNews":
                                $this->addNews();
                                break;
                case "modifNews":
                                $this->modifierNews();
                                break;
		case "suppNews":
                                $this->supprimerNews();
                                break;
                case "addPerso":
                                $this->addPersonnage();
                                break;
		case "modifPerso": 
                                $this->modifierPersonnage();
                                break;
                case "suppPerso": 
                                $this->supprimerPerso();
                                break;
		case "suppCom": 
                                $this->supprimerCommentaire();
                                break;
                default:
                                Config::ajouterErreur("Action inconnue!");
                                require(Config::getViews()['vueErreur']);
        }
    }
    
    /*
     * Vérifie la validité des champs entrés dans le formulaire et sauvegarde la News ainsi rentrée
     */
    private function addNews(){
	    if(isset($_REQUEST['titre']) && isset($_REQUEST['resume']) && isset($_REQUEST['contenu']))
	    {
		if(!empty($_FILES['image']['tmp_name']))
		{
			$index = NewsGateway::findMaxIndex();
			$index = $index + 1;
			$pathImage = UploadImageGestionnaire::addImage($_FILES['image'], 'images/imageActualite', $index);
		}
		else
			$pathImage['pathImage'] = '';
		$news = NewsGateway::save1News($_REQUEST['titre'], $pathImage['pathImage'], $_REQUEST['resume'], $_REQUEST['contenu']);
		require(Config::getViews()['vueActualites']);
	    }
	    else
            	require(Config::getViews()['vueAjoutActualite']);	
    }

    /*
     * Supprime la News indiquée à travers une requête
     */
    private function supprimerNews(){
            global $rootDirectory;
	    if(empty($_REQUEST['indexNews']))
	    {
		Config::ajouterErreur ("Problème d'index de News pour la suppression");
                require(Config::getViews()['vueActualites']);
	    }
	    else
	    {
		$news = NewsGateway::get1News($_REQUEST['indexNews']);
		if(!empty($news->pathImage))
		{
			unlink($rootDirectory.$news->pathImage);//supprime le fichier
		}
		CommentaireGateway::suppAllForIndex($_REQUEST['indexNews']);
		NewsGateway::supprimerNews($_REQUEST['indexNews']);
            	require(Config::getViews()['vueActualites']);
	    }
    }

    /*
     * Vérifie la validité des champs entrés dans le formulaire et sauvegarde la News ainsi modifiée
     */
    private function modifierNews()
    {
	    if(empty($_REQUEST['indexNews']))
	    {
		Config::ajouterErreur ("Problème d'index d'Actualité pour la suppression");
		require(Config::getViews()['vueActualites']);
                return;
	    }
	    if(isset($_REQUEST['titre']) && isset($_REQUEST['resume']) && isset($_REQUEST['contenu']))
	    {
		if(!empty($_FILES['image']['tmp_name']))
		{
			$pathImage = UploadImageGestionnaire::addImage($_FILES['image'], 'images/imageActualite', $_REQUEST['indexNews']);
		}
		else
		{
			$news = NewsGateway::get1News($_REQUEST['indexNews']);
			$pathImage['pathImage'] = $news->pathImage;
		}
		$news = NewsGateway::modifierNews($_REQUEST['indexNews'], $_REQUEST['titre'], $pathImage['pathImage'], $_REQUEST['resume'], $_REQUEST['contenu']);
		require(Config::getViews()['vueActualites']);
		return;
	    }
	    $news = NewsGateway::get1News($_REQUEST['indexNews']);
	    if($news == null)
	    {
		require(Config::getViews()["Erreur de Recuperation de donnée pour l'actualite a modifier"]);
                require(Config::getViews()['vueActualites']);
	    }
	    else
	    {
		$dataVue = array();
		$dataVue['news'] = $news;
		require(Config::getViews()['vueModifActualite']);	
	    }

    }

    /*
     * Vérifie la validité des champs entrés dans le formulaire et sauvegarde le Personnage ainsi rentrée
     */
    private function addPersonnage()
    {
	    if(isset($_REQUEST['nom']) && isset($_REQUEST['age']) && isset($_REQUEST['planeteOrigine']) && isset($_REQUEST['description']))
	    {
		if(!empty($_FILES['image']['tmp_name']))
		{
			$index = PersonnageGateway::findMaxIndex();
			$index = $index + 1;
			$pathImage = UploadImageGestionnaire::addImage($_FILES['image'], 'images/imagePersonnage', $index);
		}
		else
			$pathImage['pathImage'] = '';
		$perso = PersonnageGateway::save1Perso($_REQUEST['nom'], $_REQUEST['age'], $_REQUEST['planeteOrigine'], $_REQUEST['description'], $pathImage['pathImage']);
		require(Config::getViews()['vuePersonnages']);
	    }
	    else
            	require(Config::getViews()['vueAjoutPersonnage']);	
    }

     /*
     * Supprime le Personnage indiqué à travers une requête
     */
    private function supprimerPerso()
    {
            global $rootDirectory;
	    if(empty($_REQUEST['indexPerso']))
	    {
		Config::ajouterErreur ("Problème d'index de Personnage pour la suppression");
                require(Config::getViews()['vuePersonnages']);
	    }
	    else
	    {
		$perso = PersonnageGateway::get1Perso($_REQUEST['indexPerso']);
		if(!empty($perso->pathImage))
		{
			unlink($rootDirectory.$perso->pathImage);//supprime le fichier
		}
		PersonnageGateway::supprimerPerso($_REQUEST['indexPerso']);
            	require(Config::getViews()['vuePersonnages']);
	    }
    }

    /*
     * Vérifie la validité des champs entrés dans le formulaire et sauvegarde le Personnage ainsi modifié
     */
    private function modifierPersonnage()
    {
	    if(empty($_REQUEST['indexPerso']))
	    {
		Config::ajouterErreur ("Problème d'index de Personnage pour la modification");
                require(Config::getViews()['vuePersonnages']);
                return;
	    }
	    if(isset($_REQUEST['nom']) && isset($_REQUEST['age']) && isset($_REQUEST['planeteOrigine']) && isset($_REQUEST['description']))
	    {
		if(!empty($_FILES['image']['tmp_name']))
		{
			$pathImage = UploadImageGestionnaire::addImage($_FILES['image'], 'images/imagePersonnage', $_REQUEST['indexPerso']);
		}
		else
		{
			$perso = PersonnageGateway::get1Perso($_REQUEST['indexPerso']);
			$pathImage['pathImage'] = $perso->pathImage;
		}
		$perso = PersonnageGateway::modifierPerso($_REQUEST['indexPerso'], $_REQUEST['nom'], $_REQUEST['age'], $_REQUEST['planeteOrigine'], $_REQUEST['description'], $pathImage['pathImage']);
		require(Config::getViews()['vuePersonnages']);
		return;
	    }
	    $perso = PersonnageGateway::get1Perso($_REQUEST['indexPerso']);
	    if($perso == null)
	    {
		require(Config::getViews()["Erreur de Recuperation de donnée pour le personnage a modifier"]);
                require(Config::getViews()['vuePersonnages']);
	    }
	    else
	    {
		$dataVue = array();
		$dataVue['perso'] = $perso;
		require(Config::getViews()['vueModifPersonnage']);	
	    }

    }

    /*
     * Supprime le Commentaire indiqué à travers une requête
     */
    private function supprimerCommentaire()
    {
	    if(empty($_REQUEST['indexNews']) || empty($_REQUEST['indexCom']))
	    {
		Config::ajouterErreur ("Problème d'index pour la suppression d'un commentaire");
                require(Config::getViews()['vueActualites']);
	    }
	    else
	    {
		CommentaireGateway::supprimerCommentaire($_REQUEST['indexNews'], $_REQUEST['indexCom']);
            	require(Config::getViews()['vueActualites']);
	    }
    }

}
