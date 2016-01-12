<?php $tabperso = PersonnageGateway::getAllPerso(); ?>
<html>
    <head>
        <?php
        require_once 'header.php';
	$roleSession = 'none';
	if(isset($_SESSION['login']) && isset($_SESSION['role']))
		$roleSession = $_SESSION['role'];
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
                if(Config::hasErreur())
                    require(Config::getViews()['erreur']);
		if($roleSession==Admin::getRole())
		{
	?>

	<div class="element_Admin">
	    <a href="./?action=addPerso" class="bouton_Admin">
		<img src="<?php global $serverInfo; echo $serverInfo.'/images/icones/Add.png'?>">
		Ajouter un personnage
    	    </a>
        </div>

        <?php
		}
		foreach ($tabperso as $perso) {
        ?>
        <div class="element">
            <table> 
                <tr> 
                    <td rowspan="4">
                        <img src="<?php global $serverInfo; echo $serverInfo.$perso->imagePath; ?>" alt="<?php echo $perso->nom; ?>">
                    </td>
                    <td>
			<?php if($roleSession==Admin::getRole())
				{
			?>
			<a href="./?action=suppPerso&indexPerso=<?php echo $perso->index;?>" onClick="return confirm('Supprimer ce personnage?')" class="bouton_Admin">
		            <img src="<?php global $serverInfo; echo $serverInfo.'/images/icones/Delete.png'?>">
			</a>
			<a href="./?action=modifPerso&indexPerso=<?php echo $perso->index;?>" class="bouton_Admin">
		            <img src="<?php global $serverInfo; echo $serverInfo.'/images/icones/Edit.png'?>">
			</a>
			<?php } ?>
                            <b> Nom :</b> <?php echo $perso->nom; ?>
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
