<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/accueilCompte.css';?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/allStyle.css';?>">
        <title>Votre compte</title>
        <link rel="icon" href="<?php echo base_url().'assets/Image/logo.png';?>">
    </head>
<body>
    <!--Header-->
    <div class="head">
        <div class="classLogo">
            <img class="photoLogo" src="<?php echo base_url().'assets/Image/logo.png';?>" alt="logo">
        </div>
        <div class="classNomEntreprise">
            <a href="<?php echo site_url('controlerUser/loadPageConnect');?>" class="nomEntreprise">DEVCORP</a>
        </div>
        <div class="menu">
            <a href="<?php echo site_url('controlerUser/loadPageAccueil');?>" class="boutonMenu">Se déconnecter</a>
            <a href="<?php echo site_url('controlerUser/loadVoirSondage');?>" class="boutonMenu">Voir sondage</a>
        </div>
    </div>

    <div class="ligne"></div>

    <!-- Body -->

    <div class="title">
        <p class="titleEvent">Evènements</p>
    </div>
    <div class="classDescriptionEvent">
        <p>Créez votre propre évènement en gérant, le lieux, la date, l'horaire de ce dernier ou bien rejoignez un évènement déjà crée en fournissant l'URL !</p>
    </div>
    <div class="classBoutonEvent">
        <a href="<?php echo site_url('controlerUser/loadCreeEvent');?>" class="boutonEvent">Créer Evènement</a>
        <a href="<?php echo site_url('controlerUser/loadjoinEvent');?>" class="boutonEvent">Rejoindre Evènement</a>
    </div>

    <div class="classBoutonEvent">
        <a href="<?php echo site_url('controlerUser/loadPageFermerSondage');?>" class="boutonEvent">Fermer Sondage</a>
    </div>

    <div class="classImagePrincipale">
        <img class="imagePrincipale" src="<?php echo base_url().'assets/Image/calendrier.png';?>" alt="calendrier">
    </div>


    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2021 - DEVCORP.COM</p>
    </div>
</body>
</html>