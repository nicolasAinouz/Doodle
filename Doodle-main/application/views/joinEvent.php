<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/joinEven';?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/allStyle.css';?>">
        <title>Rejoindre évènement</title>
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
        <p class="bienvenu titleEvent">REJOINDRE UN SONDAGE</p>
        <p class="textDescription">
            Vous souhaitez rejoindre un sondage rapidement et simplement?
            Copier-coller la clé de sondage* ci-dessous.
            <br></br>
        </p>  
    </div>

    <div class="classConnection">
        <?php echo form_open('controlerUser/joinEvent', 'class="formulaire"'); ?>
            <label class="label" for="cle">Clé de sondage</label>
            <input name="cle" class="cle" placeholder="clé de sondage" type="text">
            <input name="envoie" class="validateBouton" type="submit" value="Suivant">
        </form>
    </div>
    <div class="classImagePrincipale">
        <img class="imagePrincipale" src="<?php echo base_url().'assets/Image/jumelles.png';?>" alt="jumelles">
    </div>
    <div class="explication"> 
        <p>*La clé de sondage est une URL qui vous sera transmise par le créateur du sondage. Pour en savoir plus contactez l'auteur du sondage.
    </div>
    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2021 - DEVCORP.COM</p>
    </div>
</body>
</html>