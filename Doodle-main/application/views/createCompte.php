<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/allStyle.css';?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/creatCompte.css';?>">
        <title>Créer son compte</title>
        <link rel="icon" href="<?php echo base_url().'assets/Image/logo.png';?>">
    </head>
<body>

    <!--Header-->
    <div class="head">
        <div class="classLogo">
            <img class="photoLogo" src="<?php echo base_url().'assets/Image/logo.png';?>" alt="logo">
        </div>
        <div class="classNomEntreprise">
            <a href="<?php echo site_url('controlerUser/loadPageAccueil');?>" class="nomEntreprise">DEVCORP</a>
        </div>
        <div class="menu">
            <a href="<?php echo site_url('controlerUser/loadPageConnection');?>" class="boutonMenu">Se connecter</a>
            <a href="<?php echo site_url('controlerUser/loadPageCreateCompte');?>" class="boutonMenu">Créer un compte</a>
        </div>
    </div>

    <div class="ligne"></div>

    <!-- Body -->
    <div class="classConnection">
        <p class="connectezVous">Inscrivez-vous</p>

        <?php echo form_open('controlerUser/create', 'class="formulaire"'); ?>
            <label class="label" for="nom">Nom</label>
            <input name="nom" class="input" placeholder="Nom" type="text">
            <label class="label" for="prenom">Prenom</label>
            <input name="prenom" class="input" placeholder="Prenom" type="text">
            <label class="label" for="email">Adresse mail</label>
            <input name="email" class="input" placeholder="Adresse mail" type="email">
            <label class="label" for="login">Nom d'utilisateur</label>
            <input name="login" class="input" placeholder="Nom d'utilisateur" type="text">
            <label class="label" for="mdp">Mot de passe</label>
            <input name="mdp" class="input" placeholder="Mot de passe" type="password">
            <input name="envoie" class="validateBouton" type="submit" value="Valider">
        </form>
        <div>
            <?php echo validation_errors('<p class="errors">','</p>');?>
        </div>
            



        <!--<p><?#php echo $erreur?></p>-->
        <!--<form class="formulaire" action="testCreate.php" method="GET">
            <label class="label" for="user">Adresse mail</label>
            <input name="email" class="input" placeholder="Adresse mail" type="email">
            <label class="label" for="user">Nom d'utilisateur</label>
            <input name="user" class="input" placeholder="Nom d'utilisateur" type="text">
            <label class="label" for="mdp">Mot de passe</label>
            <input name="mdp" class="input" placeholder="Mot de passe" type="password">
            <input name="envoie" class="validateBouton" type="submit" value="Valider">
        </form>-->
    </div>



    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2021 - DEVCORP.COM</p>
    </div>
</body>
</html>