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
            require_once 'asideAdmin.php';
        ?>
        
        <h2 class="centrer">
            Actualit&eacute;s
        </h2>
        
        <div class="element_Admin">
            <a href="./?action=addNews" class="bouton bouton_Admin">
                <img src="<?php global $serverInfo; echo $serverInfo.'/images/add.png'?>">
                Ajouter une actualité
            </a>
        </div>
        
        <?php
            $tabnews = NewsGateway::getAllNews();
            foreach ($tabnews as $news) {
        ?>
        
        <article>
            <a href="./?action=suppNews<?php echo 'news' . $news->index ?>" class="bouton bouton_Admin">
                <img src="<?php global $serverInfo; echo $serverInfo.'/images/delete.png'?>">
            </a>
            <a href="./?action=modifNews<?php echo 'news' . $news->index ?>" class="bouton bouton_Admin">
                <img src="<?php global $serverInfo; echo $serverInfo.'/images/edit.png'?>">
            </a>
            <h3>
                <?php echo $news->titre; ?>
            </h3>
            <p class="date">
                <?php echo $news->date; ?>
            </p>
            <img src="<?php global $serverInfo; echo $serverInfo.$news->pathImage; ?>">
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
                <a href="./?action=suppCommentaire<?php echo 'com' . $com->indexNews?>" class="bouton_Admin">
                    <img src="./Images/Delete.png">
                </a>
                <h4>
                    <?php echo $com->pseudo; ?>
                </h4>
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
            <form method="POST" action='./?action=seConnecter'>
                <input placeholder="Pseudo" name="pseudo" type="text">
                <textarea placeholder="Commentaire" name="commentaire" type="text"></textarea>
                <button type="submit" value="Valider">Valider</button>
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