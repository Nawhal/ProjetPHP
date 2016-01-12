<?php


/**
 * Description of UtilisateurGateway
 * 
 * Obtient les information sur tout type d'utilisateur quelque soit son role (admin...)
 *
 * @author ceparis
 */
class UtilisateurGateway {
    
    public static function getUtilisateurAvecLogin($login, $mdp)
    {
        $connexion = new Connection(Config::getDataBaseInfos()['DBname'], Config::getDataBaseInfos()['login'], Config::getDataBaseInfos()['mdp'], null);
        $requete = "SELECT login, mdp, role FROM Utilisateur WHERE login='$login'";
        $connexion->executeQuery($requete);
	$result = $connexion->getResults();
        if(count($result)==0)
            Config::ajouterErreur ("Login ou mot de passe de passe incorrect");
	$result = $result[0];
	if($result['login']==$login && $result['mdp']==$mdp)
        	return self::returnBonTypeUtilisateur($result['login'], $result['role']);
        Config::ajouterErreur ("Login ou mot de passe de passe incorrect");
	return null;
    }

    private static function returnBonTypeUtilisateur($login, $role)
    {
	//retourne le bon type d'object en fonction du role
	
	switch($role)
	{
		case 'admin':
			return new Admin($login);
		default:
			return null;
	}
    }
}
