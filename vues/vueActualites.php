<?php $tabnews = NewsGateway::getAllNews(); ?>
<html>
    <head>
        <?php
        require_once 'header.php';
	$roleSession = 'none';
	if(isset($_SESSION['login']) && isset($_SESSION['role']))
		$roleSession = $_SESSION['role'];
        ?>
        <link rel="stylesheet" href="<?php global $serverInfo; echo $serverInfo.'css/actualites.css'; ?>">
    </head>
    <body>
        <?php
        require_once 'menu.php';
        require_once 'aside.php';
        ?>
        
        <h2 class="centrer">
            Actualit&eacute;s
        </h2>
	<?php
                if(Config::hasErreur())
                    require(Config::getViews()['erreur']);
		if($roleSession==Admin::getRole())
		{
	?>
	<div class="element_Admin">
	    <a href="./?action=addNews" class="bouton_Admin">
		<img src="<?php global $serverInfo; echo $serverInfo.'/images/icones/Add.png'?>">
		Ajouter une actualité
    	    </a>
        </div>
        
        <?php
		}
		foreach ($tabnews as $news) {
        ?>
        
        <article>
	    <?php if($roleSession==Admin::getRole())
	          {
	    ?>
	    <a href="./?action=suppNews&indexNews=<?php echo $news->index;?>" onClick="return confirm('Supprimer cette actualit&eacute;?')" class="bouton_Admin">
		<img src="<?php global $serverInfo; echo $serverInfo.'/images/icones/Delete.png'?>">
    	    </a>
	    <a href="./?action=modifNews&indexNews=<?php echo $news->index;?>" class="bouton_Admin">
		<img src="<?php global $serverInfo; echo $serverInfo.'/images/icones/Edit.png'?>">
    	    </a>
	    <?php } ?>
            <h3>
                <?php echo $news->titre; ?>
            </h3>
            <p class="date">
                <?php echo $news->date; ?>
            </p>
	    <?php if(!empty($news->pathImage))
	          {
	    ?>
            <img src="<?php global $serverInfo; echo $serverInfo.$news->pathImage; ?>">
	    <?php } ?>
            <p>
		<?php echo $news->contenu; ?>
            </p>
        </article>
        <p class="article_affich">
            Commentaires
        </p>
        <div class="commentaires">
            <?php
		$tabcom = CommentaireGateway::getAllForIndex($news->index);
                foreach ($tabcom as $com) {
            ?>
            <div class="element">
		<?php if($roleSession==Admin::getRole())
	          {
	    	?>
		<a href="./?action=suppCom&indexNews=<?php echo $com->indexNews;?>&indexCom=<?php echo $com->indexCom; ?>" onClick="return confirm('Supprimer ce commentaire?')" class="bouton_Admin">
			<img src="<?php global $serverInfo; echo $serverInfo.'/images/icones/Delete.png'?>">
    	    	</a>
		<?php } ?>
                <h4><?php echo $com->pseudo; ?></h4>
                <?php echo $com->contenu; ?>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="element">
            <h4>
                Ajouter un commentaire
            </h4>
	    <form method="post" action="./?action=addCommentaire&indexNews=<?php echo $news->index;?>">
		    <input placeholder="Pseudo" name="pseudo" type="text" required>
		    <br/>
		    <textarea placeholder="Commentaire" name="contenu" type="text" required></textarea>
		    <input class="bouton" type="submit" value="Valider">
	    </form>
        </div>
        <?php
        }
        ?>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>
