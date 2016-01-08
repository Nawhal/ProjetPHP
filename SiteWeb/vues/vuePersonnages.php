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
        require_once 'aside.php';
        ?>
        
        <h2 class="centrer">
            Personnages
        </h2>
        <?php
		$tabperso = PersonnageGateway::getAllPerso();
		foreach ($tabperso as $perso) {
        ?>
        <div class="element">
            <table> 
                <tr> 
                    <td rowspan="4">
                        <img src="<?php global $serverInfo; echo $serverInfo.$perso->imagePath; ?>" alt="<?php echo $perso->nom; ?>">
                    </td>
                    <td>
                        <a id="<?php echo $perso->nom; ?>">
                            <b> Nom :</b> <?php echo $perso->nom; ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b> Age : </b> <?php echo $perso->age; ?>
                    </td>
                </tr>
                <tr> 
                    <td>
                        <b> Plan&egrave;te d'origine : </b><?php echo $perso->planeteOrigine; ?>
                    </td>
                </tr>
                <tr> 
                    <td>
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
