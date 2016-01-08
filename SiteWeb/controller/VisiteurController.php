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
                case "voirNews":
                                $this->afficherNews();
                                break;
                case "ajouterCommentaire": 
                                $this->addCommentaire();
                                break;
                default:
                                //require('./vue/Erreur.php');
                                break;
        }
    }
	

    public function SansAction(){
            global $rootDirectory;
            global $vues;
            $dataVue;
            require($rootDirectory.$vues['vueAccueil']);	
    }


    public function seConnecter(){

            echo "connection";
    }

    public function afficherNews(){

            echo "news";
    }

    public function addCommentaire(){

            echo "ajoutCommentaire";
    }
}
