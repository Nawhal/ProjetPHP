<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsGateway
 *
 * @author ceparis
 */
class NewsGateway {
    
    public static function getAllNews()
    {
        $server = 'mysql:host=hina;dbname=dbnasayarh';
        $user = 'nasayarh';
        $mdp = 'patate';

        $connexion = new Connection($server, $user, $mdp, null);

        /*$requete = "INSERT INTO News VALUES('Bonjour ceci est une news trop classe. Elle sert a rien mais c est pas très grave c est pour les tests. Salut la bise. Nawhal SayarH', '16/12/2015')";
        $connexion->executeQuery($requete);*/
        $requete = "SELECT * FROM News";
        $connexion->executeQuery($requete);
        return $connexion->getResults();
    }
    
    public static function get3News()
    {
        $server = 'mysql:host=hina;dbname=dbnasayarh';
        $user = 'nasayarh';
        $mdp = 'patate';
        
        $connexion = new Connection($server, $user, $mdp, null);
        $requete = "SELECT * FROM News ORDER BY DATE DESC";
        $connexion->executeQuery($requete);
        $result = $connexion->getResults();
        $compteur=3;
        foreach ($result as $row)
        {
                echo "<h1>".$row['index']."</h1>\n<br/><br/>";
        }
        
    }
    
    public static function get1News($index)
    {
        $server = 'mysql:host=hina;dbname=dbnasayarh';
        $user = 'nasayarh';
        $mdp = 'patate';
        
        $news = new News();
        $connexion = new Connection($server, $user, $mdp, null);
        $requete = 'SELECT titre FROM News WHERE index='.'$index';
        $connexion->executeQuery($requete);
        $news->titre = $connexion->getResults();
        
        $requete = 'SELECT date FROM News WHERE index='.'$index';
        $connexion->executeQuery($requete);
        $news->date = $connexion->getResults();
        
        $requete = 'SELECT pathImage FROM News WHERE index='.'$index';
        $connexion->executeQuery($requete);
        $news->pathImage = $connexion->getResults();
        
        $requete = 'SELECT resume FROM News WHERE index='.'$index';
        $connexion->executeQuery($requete);
        $news->resume = $connexion->getResults();
        
        $requete = 'SELECT contenu FROM News WHERE index='.'$index';
        $connexion->executeQuery($requete);
        $news->contenu = $connexion->getResults();
        
        return news;
    }
}

