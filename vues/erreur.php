<div class="erreurs_div">
    <ul class="erreur">
        <?php
        $erreurs = Config::getErreurs();
        foreach ((array)$erreurs as $err)
        {
            echo '<li>'.$err.'</li>';
        }
        ?>
    </ul>
</div>
