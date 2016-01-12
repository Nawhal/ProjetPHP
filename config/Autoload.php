<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autoload
 *
 * @author ceparis
 */
class Autoload
{

	private static $m_instance = null;

	/**
	 * Charge l'instance d'Autoload et déclare la fonction callback
	 */
	public static function load()
	{
		if (self ::$m_instance !==null)
		{
			throw new Exception("Erreur l'autoload ne peut être chargé qu'une fois : ".__CLASS__);
		}
		self::$m_instance=new self();

		if (!spl_autoload_register(array(self::$m_instance, 'autoloadCallback'), false))
		{
			throw new Exception("Impossible de lancer l'autoload : ".__CLASS__);
		}
	}

	/**
	 * Désactive le callback et détruit l'instance d'Autoload
	 */
	public static function shutDown()
	{
		if(null !== self::$m_instance)
		{
			if(!spl_autoload_unregister(array(self::$m_instance,'_autoload')))
			{
				throw new Exception("Impossible d'arrêter l'autoload :".__CLASS__);
			}
			self::$m_instance=null;
		}
	}

	/**
	 * Charge une classe, cette métode est appelée automatiquement en cas d'instanciation d'une classe inconnue
	 */
	private static function autoloadCallback($class)
	{
		global $rootDirectory;
		$sourceFileName = $class.'.php';
		$directoryList=array('','config/', 'modele/','controller/','class/','validation/');
		foreach ($directoryList as $subDir){
			$filePath=$rootDirectory.$subDir.$sourceFileName;
			if(file_exists($filePath))
			{
				include ($filePath);
			}
		}
	}
}
