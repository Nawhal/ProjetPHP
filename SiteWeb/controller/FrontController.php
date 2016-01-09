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
        global $rootDirectory;
        global $vues;
        $listeActionVisiteur = array('sansAction','seConnecter', 'voirNews', 'voirPersonnages', 'ajouterCommentaire');
        $listeActionAdmin = array('addNews', 'modifNews', 'suppNews', 'suppCommentaire', 'addImage', 'addPerso', 'modifPerso', 'suppPerso');

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
                                if(MdlAdmin::isAdmin())
                                        $controlAdmin = new AdminController();
                                else
                                {
                                        $dVueErreur[]='Droit insuffisant';
                                        require($vues['Erreur']);
                                }
                        default:
                                //$dVueErreur[]='Erreur Inconnue';
                                //require($vues['Erreur']);
                }
        }
        catch(Exception $e)
        {
                $dVueErreur[] = $e->getMessage();
                die();
                require($vues['Erreur']);
        }

    }  
}
