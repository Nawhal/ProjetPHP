<html>
    <head>
        <?php
        require_once 'header.php';
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
		$tabnews = NewsGateway::getAllNews();
		foreach ($tabnews as $news) {
        ?>
        
        <article>
            <h3>
                <?php echo $news->titre; ?>
            </h3>
            <p class="date">
                <?php echo $news->date; ?>
            </p>
            <img src="<?php global $serverInfo; echo $serverInfo.'images/hydroflax.jpg'; ?>">
            <p>
		<?php echo $news->contenu; ?>
            </p>
        </article>
        <a class="article_affich">
            Afficher les commentaires
        </a>
        <div class="commentaires">
            <?php
		$tabcom = CommentaireGateway::getAllForIndex($news->index);
                foreach ($tabcom as $com) {
            ?>
            <div class="element">
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
            <input placeholder="Pseudo" name="pseudo" type="text">
            <br/>
            <textarea placeholder="Commentaire" name="commentaire" type="text"></textarea>
            <input class="bouton" type="submit" value="Valider">
        </div>
        <?php
        }
        ?>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>
