<?php


/**
 * Description of Admin
 *
 * @author ceparis
 */
class Admin {

    public $login;
    
    public function __construct($login)
    {
	$this->login = $login;
    }

    public static function getRole()
    {
	return 'admin';
    }
}
