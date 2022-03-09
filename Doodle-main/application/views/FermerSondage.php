<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/FermerSondage.css';?>">
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

        </div>
    </div>

    <div class="ligne"></div>

    <!-- Body -->
    <div class="DescrVoirSondage">
        <p>Si vous souhaitez mettre fin à un sondage vous êtes sur la bonne voie. Cliquer sur "cloturer"
            à coté du sondage à fermer.
        </p>
    </div>
    <div class="important">
        <p> Attention ! 
            <br>
            <br>
            Si vous fermez un sondage, vous ne pourrez plus le réouvrir : alors pensez-y bien avant d'en fermer un.
        </p>
    </div>
    <div class="centreFermer">

        <?php
        
        $count = count($titres);

        foreach($titres as $Titres) {
            echo "<div class='divTextBouton'>";
                echo "<div>";
                    echo "<p class='textInt'>";
                        echo $Titres['titre'];
                    echo "</p>";
                echo "</div>";
                echo "<div>";
                    echo "<p class='textInt'>";
                        echo $Titres['cleSondage'];
                    echo "</p>";
                echo "</div>";
                $_SESSION['closeSondage']=$Titres['cleSondage'];
                echo "<div>";
                    echo "<p><a href='" . site_url('controlerUser/closeSondage') . "' class='boutonFermer'> Fermer </a></p>";
                echo "</div>";
            echo "</div>";
        }
        ?>

    </div>
    <div class="menu">
        <a href="<?php echo site_url('controlerUser/loadPageConnect');?>" class="boutonMenu">Accueil Compte</a>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2021 - DEVCORP.COM</p>
    </div>
</body>
</html>