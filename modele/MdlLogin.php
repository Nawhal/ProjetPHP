<?php


/**
 * Description of MdlLogin
 *
 * Gere la connection de tout type d'utilisateur (admin...)
 *
 * @author ceparis
 */
class MdlLogin {
    
    /*
     * Vérifie que le login et ele mot de passe se corresponde puis connecte l'utilisateur
     */
    public static function connexion($login, $mdp)
    {
	if(! Validation::validerLoginMdp($login, $mdp))
        {
            Config::ajouterErreur ("Mot de passe ou login incorrect");
            return;
        }
	$result = UtilisateurGateway::getUtilisateurAvecLogin($login, $mdp);
	if($result!=null)
	{

		$_SESSION['login'] = $result->login;
		$_SESSION['role'] = $result->getRole();
	}
    }

    /*
     * Déconnecte l'utilisateur
     */
    public static function deconnexion()
    {
        session_unset();
	session_destroy();
	$_SESSION = array();
    }
}
