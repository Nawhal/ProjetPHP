<aside class="section">
    <?php
        if(Config::hasErreur())
            require(Config::getViews()['erreur']);
    ?>
    <?php if(isset($_SESSION['login']) && isset($_SESSION['role'])) { ?>
	<h3>Bonjour <?php echo $_SESSION['login']; ?>!</h3>
	<h4>Statut : <?php echo $_SESSION['role']; ?></h4>
        <form method="POST" action='./?action=seDeconnecter'>
	    <input class="bouton bouton-centre" type="submit" value="D&eacute;connection">
    <?php } else { ?>
        <h4>Connexion</h4>
        <form method="POST" action='./?action=seConnecter'>
            <input placeholder="Identifiant" name="login" type="text">
            <input placeholder="Mot de passe" name="mdp" type="password">
            <input class="bouton bouton-centre" type="submit" value="Se connecter">
    <?php } ?>
    </form>
    <br/><br/><br/><br/><br/>
    <h4>Liens externes</h4>
    <a href="http://www.bbc.co.uk/programmes/b006q2x0">
        Le site officiel BBC de Doctor Who
    </a>
    <a href="http://www.bbc.co.uk/programmes/articles/26Y2fJtHFZ2wWp397SHttGM/doctor-who-game-maker">
        Quelques jeux Doctor Who
    </a>
    <a href="http://tardis.wikia.com/wiki/Doctor_Who_Wiki">
        TARDIS Datacore, le Wikia anglais de Doctor Who
    </a>
    <a href="http://fr.doctorwho.wikia.com/wiki/Wiki_Doctor_Who">
        Le Wikia français de Doctor Who
    </a>
</aside>