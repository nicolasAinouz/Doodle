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
        <p class="bienvenu titleEvent">SONDAGE</p>
        <p class="textDescription">
            Vous êtes sur le point de créer votre sondage. Pour se faire,
            complétez les différents champs ci-dessous.
        </p>  
    </div>
    <div class="classConnection">
        <?php echo form_open('controlerUser/loadCreeEvent2', 'class="formulaire"'); ?>

            <label class="label" for="titreSondage">Titre du sondage</label>
            <input name="titreSondage" class="input" placeholder="Titre du sondage" type="text">
            
            <label class="label" for="lieuSondage">Lieu de l'évènement</label>
            <input name="lieuSondage" class="input" placeholder="Lieu de l'évènement" type="text">
            
            <label class="label" for="descripSondage">Description du sondage</label>
            <textarea name="descripSondage" class="input XL" id="" rows="3"></textarea>

            <label class="label" for="nbdate">Nombre de date demandé</label>

            <select class="nbDate" name="nbdate">
                <option> 1 </option>
                <option> 2 </option>
                <option> 3 </option>
                <option> 4 </option>
                <option> 5 </option>
                <option> 6 </option>
                <option> 7 </option>
                <option> 8 </option>
                <option> 9 </option>
            </select>
            <input name="envoie" value="Suivant" class="validateBouton" type="submit">
        </form>
        <div>
            <?php echo validation_errors('<p class="errors">', '</p>');?>
        </div>
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