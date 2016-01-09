<html>
    <head>
        <?php
            require_once 'header.php';
        ?>
        <link rel="stylesheet" href="<?php global $serverInfo; echo $serverInfo.'css/personnages.css'; ?>">
    </head>
    <body>
        <?php
            require_once 'menu.php';
            require_once 'asideAdmin.php';
        ?>
        
        <h2 class="centrer">
            Personnages
        </h2>
        
        <div class="element_Admin">
            <a href="./?action=addPerso" class="bouton bouton_Admin">
                <img src="<?php global $serverInfo; echo $serverInfo.'/images/add.png'?>">
                Ajouter un personnage
            </a>
        </div>
        
        <?php
            $tabperso = PersonnageGateway::getAllPerso();
            foreach ($tabperso as $perso) {
        ?>
        <div class="element">
            <table> 
                <tr> 
                    <td>
                        <img src="<?php global $serverInfo; echo $serverInfo.$perso->imagePath; ?>" alt="<?php echo $perso->nom; ?>">
                    </td>
                    <td>
                        <a href="./?action=suppPerso<?php echo 'perso' . $perso->index ?>" class="bouton bouton_Admin">
                            <img src="<?php global $serverInfo; echo $serverInfo.'/images/delete.png'?>">
                        </a>
                        <a href="./?action=modifPerso<?php echo 'perso' . $perso->index ?>" class="bouton bouton_Admin">
                            <img src="<?php global $serverInfo; echo $serverInfo.'/images/edit.png'?>">
                        </a>
                        <a id="<?php echo $perso->nom; ?>">
                            <b> Nom :</b> <?php echo $perso->nom; ?>
                        </a>
                        <br/>
                        <b> Age : </b> <?php echo $perso->age; ?>
                        <br/>
                        <b> Plan&egrave;te d'origine : </b><?php echo $perso->planeteOrigine; ?>
                        <br/>
                        <b> Description sommaire : </b><?php echo $perso->description; ?>
                    </td>
                </tr>
            </table>
        </div>
	<?php
            }
            require_once 'footer.php';
        ?>
    </body>
</html>
