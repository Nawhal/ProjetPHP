<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VisiteurController
 *
 * @author ceparis
 */
class VisiteurController {
    
    public function __construct($action){

        switch($action){
                case "sansAction":
                                $this->SansAction();
                                break;
                case "seConnecter":
                                $this->seConnecter();
                                break;
		case "seDeconnecter":
                                $this->seDeconnecter();
                                break;
                case "voirNews":
                                $this->afficherNews();
                                break;
		case "voirPersonnages": 
                                $this->voirPersonnages();
                                break;
                case "addCommentaire": 
                                $this->addCommentaire();
                                break;
                default:
                                Config::ajouterErreur ("Action inconnue!");
                                require(Config::getViews()['vueErreur']);
        }
    }
	
    /*
     * Retourne sur la page d'accueil
     */
    private function SansAction(){
            require(Config::getViews()['vueAccueil']);	
    }

    /*
     * Si le login et le mot de passe sont tous deux renseignés, on demande au MdlLogin de se connecter
     */
    private function seConnecter(){
	    if(empty($_REQUEST['login'])||empty($_REQUEST['mdp']))
            {
                Config::ajouterErreur ("Le login et le mot de passe doivent être renseignés");
		require(Config::getViews()['vueAccueil']);
                return;
            }
            MdlLogin::connexion($_REQUEST['login'], $_REQUEST['mdp']);
	    require(Config::getViews()['vueAccueil']);
    }
    
    /*
     * Déconnecte l'utilisateur
     */
    private function seDeconnecter(){
	    MdlLogin::deconnexion();
	    require(Config::getViews()['vueAccueil']);
    }

    /*
     * Redirige vers la page d'Actualités
     */
    private function afficherNews(){
            require(Config::getViews()['vueActualites']);
    }

    /*
     * Vérifie qu'aucun champs ne soit vide puis sauvegarde le commentaire
     */
    private function addCommentaire(){
           if(empty($_REQUEST['pseudo']) || empty($_REQUEST['contenu']) || empty($_REQUEST['indexNews']))
	   {
		Config::ajouterErreur ("Tout les champs doivent être correctement renseigné pour ajouter un commentaire");
                require(Config::getViews()['vueActualites']);
                return;
	   }
	   else
	   {
		CommentaireGateway::save1Commentaire($_REQUEST['indexNews'], $_REQUEST['pseudo'], $_REQUEST['contenu']);
		require(Config::getViews()['vueActualites']);
	   }
    }

    /*
     * Redirige vers la page de Personnages
     */
    private function voirPersonnages(){
            require(Config::getViews()['vuePersonnages']);
    }
}
