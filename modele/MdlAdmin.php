<?php


/**
 * Description of MdlAdmin
 *
 * @author ceparis
 */
class MdlAdmin {
    
    /*
     * Retourne un objet Admin si l'utilisateur de la session actuelle est administrateur. Sinon, retourne null.
     */
    public static function isAdmin()
    {
	if(isset($_SESSION['login']) && isset ($_SESSION['role']))
	{
		$login = $_SESSION['login'];
		$role = $_SESSION['role'];
		if($role!='admin')
			return null;
        	return new Admin($login);
	}
	else
		return null;
    }
}
