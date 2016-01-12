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
               Ajouter un personnage
        </h2>
        
        <div class="element">
            <?php
		$perso = $dataVue['perso'];
                if(Config::hasErreur())
                    require(Config::getViews()['erreur']);
            ?>
           <form method="post" action="./?action=modifPerso&indexPerso=<?php echo $perso->index;?>" enctype="multipart/form-data">
               <input placeholder="Nom" name="nom" type="text" value="<?php echo $perso->nom;?>" required>
               <br />
               <input placeholder="Age" name="age" type="text" value="<?php echo $perso->age;?>" required>
               <br />
               <input placeholder="Plan&egrave;te d'origine" name="planeteOrigine" type="text" value="<?php echo $perso->planeteOrigine;?>" required>
               <br />
               Image du personnage (max. 1 Mo) :
               <br />
               <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
               <input type="file" name="image" id="image">
               <label for="image">Choisir un fichier...</label>
               <br/>
               <textarea placeholder="Description" name="description" type="text" required><?php echo $perso->description;?></textarea>
               <button type="submit" value="Valider">Valider</button>
           </form>  
        </div>
        <?php
            require_once 'footer.php';
        ?>
    </body>
</html>
