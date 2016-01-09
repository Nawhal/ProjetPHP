<html>
    <head>
        <?php
            require_once 'header.php';
        ?>
        <link rel="stylesheet" href="<?php global $serverInfo; echo $serverInfo.'css/actualites.css' ?>">
    </head>
    <body>
        <?php
            require_once 'menu.php';
            require_once 'asideAdmin.php';
        ?>
        
        <h2 class="centrer">
               Ajouter/Modifier un personnage
        </h2>
        
        <div class="element">
            <?php
                if (isset($erreurs))
                    require_once 'erreurSaisie.php';
            ?>
           <form method="post" action="" enctype="multipart/form-data">
               <input placeholder="Nom" name="nom" type="text">
               <br />
               <input placeholder="Age" name="age" type="text">
               <br />
               <input placeholder="Plan&egrave;te d'origine" name="planeteOrigine" type="text">
               <br />
               Image du personnage (max. 1 Mo) :
               <br />
               <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
               <input type="file" name="image" id="image">
               <label for="image">Choisir un fichier...</label>
               <br/>
               <textarea placeholder="Description" name="resume" type="text"></textarea>
               <button type="submit" value="Valider">Valider</button>
               <!--https://openclassrooms.com/courses/upload-de-fichiers-par-formulaire POUR RECUPERER L'IMAGE EN PHP-->
           </form>  
        </div>
        <?php
            require_once 'footer.php';
        ?>
    </body>
</html>