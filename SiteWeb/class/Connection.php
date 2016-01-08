<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author ceparis
 */
class Connection extends PDO{
    
    private $stmt;
    
    public function __construct($dsn, $username = null, $password = null, array $options = null) {
        parent::__construct($dsn, $username, $password, $options);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    /*
    public function connexion()
    {
        $server = 'mysql:host=hina;dbname=test';
        $user = 'nasayarh';
        $mdp = '';

        try
        {
            $connexion = new PDO($server, $user, $mdp);
            $connexion->query("SET NAMES utf8");
        }
        catch (PDOException $ex) {
            echo "Connection impossible : ";
            $ex->getMessage();
            die(); // ferme la connexion
        }
    }
    */
    
    public function executeQuery($query, array $parameters = [])
    {
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value)
        {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }
    
    public function getResults ()
    {
        return $this->stmt->fetchAll();
    }
}