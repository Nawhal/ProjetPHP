<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
            require_once 'header.php';
        ?>
        <link rel="stylesheet" href="<?php global $serverInfo; echo $serverInfo.'css/accueil.css' ?>">
    </head>
    <body>
        <?php
        require_once 'menu.php';
        require_once 'asideAdmin.php';
        ?>
        <div class="presentation">
            <div class="centrer">
                <h1>
                    Doctor Who Fanpage
                </h1>

                <h3 class="presentation_sous-titre">
                        Pour les fans français de Doctor Who.
                </h3>
                <h3 class="presentation_sous-titre">
                    D&eacute;couvrez les actualit&eacute;s Doctor Who les plus juteuses r&eacute;unies en un site !
                </h3>
            </div>
        </div>

        <div class="section articles">
            <?php
                $tabnews = NewsGateway::get3News();
            	foreach ($tabnews as $news) {
            ?>
                <div class="articles_element">
                    <div class="articles_article">
                        <h3 class="centrer">
                            <?php echo $news->titre;?>
                        </h3>
                        <p>
                            <?php echo $news->resume; ?>
                        </p>
                        <a href="./accueil.php" class="bouton-centre bouton">
                            En savoir plus
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>
