<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrontController
 *
 * @author ceparis
 */
class FrontController {
    
    public function __construct()
    {
        $listeActionVisiteur = array('sansAction','seConnecter', 'seDeconnecter', 'voirNews', 'voirPersonnages', 'addCommentaire');
        $listeActionAdmin = array('addNews', 'modifNews', 'suppNews', 'suppCom', 'addPerso', 'modifPerso', 'suppPerso');

        session_start();

        try
        {
                $action = isset($_REQUEST['action']) ? $_REQUEST['action']:'sansAction';
                switch($action)
                {
                        case in_array($action, $listeActionVisiteur):
                                $controlVisit = new VisiteurController($action);
                                break;
                        case in_array($action, $listeActionAdmin):
                                if(MdlAdmin::isAdmin()!=null)
                                {
                                    $controlAdmin = new AdminController($action);
                                    break;
                                }
                                Config::ajouterErreur ("Droit Insuffisant!");
                                require(Config::getViews()['Erreur']);
                                break;
                        default:
                                Config::ajouterErreur ("Action inconnue!");
                                require(Config::getViews()['vueErreur']);
                }
        }
        catch(PDOException $e)
        {
            Config::ajouterErreur ("Problème d'acces à la base de données !!!");
            require(Config::getViews()['vueErreur']);
            die();
        }
        catch(Exception $e)
        {
            Config::ajouterErreur ($e->getMessage());
            require(Config::getViews()['vueErreur']);
            die();
        }

    }  
}
