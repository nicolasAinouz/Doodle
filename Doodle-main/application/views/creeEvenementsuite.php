<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/creeEven.css';?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/allStyle.css';?>">
        <title>Créer évènement</title>
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
    <div class="description">
        <p class="bienvenu titleEvent">SONDAGE PARTIE 2</p>
        <p class="textDescription">
            Maintenant, indiquez les dates et heures.
           
        </p>  
    </div>
    <div class="classConnection">
        <?php echo form_open('controlerUser/validateEvent', 'class="formulaire"'); ?>
            <?php 
                for($i=1;$i<=$nbDate;$i++){
                    echo "<label class='label' for='debutDate'>Date de début de l'évenement ($i)</label>
                    <input name='debutDate[]' class='input'  type='date'>";

                    echo "<label class='label' for='debutHeure'>Heure de début de l'évenement</label>
                    <input name='debutHeure[]' id='appt' class='input'  type='time'>";
                
                    echo "<label class='label' for='finDate'>Date de fin de l'évenement</label>
                    <input name='finDate[]' class='input'  type='date'>";

                    echo "<label class='label' for='finHeure'>Heure de fin de l'évenement </label>
                    <input name='finHeure[]' id='appt' class='input'  type='time'>";
                }
            ?>
         <input name="retour" value="Retour" class="validateBouton" type="button" onclick="history.go(-1)">
        <input name="envoie" value="Valider" class="validateBouton" type="submit">

    </div>
    <div class="classImagePrincipale">
        <img class="imagePrincipale" src="<?php echo base_url().'assets/Image/ordi.png';?>" alt="emploi du temps">
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2021 - DEVCORP.COM</p>
    </div>
    
</body>
</html>