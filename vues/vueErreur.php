<html lang="fr">
    <head>
        <?php
            require_once 'header.php';
        ?>
    </head>
    <body>
        <?php
            require_once 'menu.php';
            require_once 'aside.php';
        ?>

        <h2 class="centrer">
            Erreur
        </h2>
        
        <div class="erreurs_div centrer">
            <?php
                $erreurs = Config::getErreurs();
                foreach ((array)$erreurs as $err)
                {
                    echo $err.'<br/><br/>';
                }
            ?>
            <img src="<?php global $serverInfo; echo $serverInfo.'/images/sorry.gif'?>">
        </div>
        
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>