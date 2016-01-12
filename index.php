<?php

    $rootDirectory = dirname(__FILE__)."/";
    $serverInfo = "http://localhost/SiteWeb/";
    require_once($rootDirectory.'/config/Autoload.php');

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
