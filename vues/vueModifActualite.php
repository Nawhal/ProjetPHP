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
               Modifier une actualit&eacute;
        </h2>
        
        <div class="element">
            <?php
		$news = $dataVue['news'];
		if(Config::hasErreur())
                    require(Config::getViews()['erreur']);
            ?>
           <form method="post" action="./?action=modifNews&indexNews=<?php echo $news->index;?>" enctype="multipart/form-data">
               <input placeholder="Titre" name="titre" type="text" value="<?php echo $news->titre;?>" required>
               <br />
               Image de l'article (facultatif | max. 1 Mo) :
               <br />
               <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
               <input type="file" name="image" id="image">
               <label for="image">Choisir un fichier...</label>
               <br/>
               <textarea placeholder="R&eacute;sum&eacute;" name="resume" type="text" required><?php echo $news->resume;?></textarea>
               <br/>
               <textarea class="contenu" placeholder="Contenu" name="contenu" type="text" required><?php echo $news->contenu;?></textarea>
               <button type="submit" value="Valider">Valider</button>
               <!--https://openclassrooms.com/courses/upload-de-fichiers-par-formulaire POUR RECUPERER L'IMAGE EN PHP-->
           </form>  
        </div>
        <?php
            require_once 'footer.php';
        ?>
    </body>
</html>
