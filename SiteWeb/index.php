<?php

    $rootDirectory = dirname(__FILE__)."/";
    $serverInfo = "http://localhost/~ceparis/SiteWeb/";
    require_once($rootDirectory.'/config/Autoload.php');
    require_once($rootDirectory.'/config/config.php');
    try
    {
        Autoload::load();
        $ctrl =new FrontController();
    }
    catch (Exception $e)
    {
        echo "<p>".$e->getMessage()."</p>";
    }

?> 
