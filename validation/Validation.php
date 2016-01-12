<?php

/**
 * Description of Validation
 *
 * @author ceparis
 */
class Validation {
    
    public static function nettoyerString($string)
    {
       return filter_var($string, FILTER_SANITIZE_STRING);
    }
    
    public static function nettoyerPath($string)
    {
       return filter_var($string, FILTER_SANITIZE_URL);
    }
    
    public static function nettoyerIndex($index)
    {
        return filter_var($index, FILTER_SANITIZE_NUMBER_INT);
    }
    
    public static function validerLoginMdp($login, $mdp)
    {
        $nLogin = filter_var($login, FILTER_SANITIZE_EMAIL);
        $nMdp =  filter_var($mdp, FILTER_SANITIZE_EMAIL);
        if($nLogin!=$login || $nMdp!=$mdp)
            return false;
        else 
            return true;
        
    }
    
}
