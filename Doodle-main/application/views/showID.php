<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/showID.css';?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/allStyle.css';?>">
        <title>ID du sondage</title>
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
        </div>
    </div>

    <div class="ligne"></div>

    <!-- Body -->
    <div class="descrID">
        <p>Ceci est votre clé de sondage. Elle permet aux utilisateurs de rejoindre votre sondage.
             Elle est unique et confidentielle, ne la partagez pas à n'importe qui.
        </p>
    </div>
    <div class="divcleID">
        <p class="cleID"> <?php echo $cle;?> </p>
    </div>

    <p class="info">Vous pourrez retrouver cette clé dans la rubrique "Voir Sondage".</p>

    <div class="menu">
        <a href="<?php echo site_url('controlerUser/loadPageConnect');?>" class="boutonMenu">Accueil Compte</a>
    </div>

     <!-- Footer -->
     <div class="footer">
        <p>&copy; 2021 - DEVCORP.COM</p>
    </div>
</body>
</html>