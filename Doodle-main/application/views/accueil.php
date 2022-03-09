<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type='text/css' href="<?php echo base_url().'assets/css/allStyle.css';?>">
    <title>Appli de rdv</title>
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
    <div class="title">
        <p>PROTO MEETING</p>
    </div>
    <div class="classImagePrincipale">
        <img class="imagePrincipale" src="<?php echo base_url().'assets/Image/imageReunion1.png';?>" alt="Image réunion">
        <img class="imagePrincipale" src="<?php echo base_url().'assets/Image/imageReunion2.png';?>" alt="Image réunion">
        <img class="imagePrincipale" src="<?php echo base_url().'assets/Image/imageReunion3.png';?>" alt="Image réunion">
    </div>
    <div class="description">
        <p class="bienvenu">BIENVENUE</p>
        <p class="textDescription">
            Commencez à gérer vos meeting grâce à PROTO MEETING.
            <br>
            Inscrivez-vous ou connectez-vous si vous avez déjà un compte.
        </p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2021 - DEVCORP.COM</p>
    </div>
</body>
</html>