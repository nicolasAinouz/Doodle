<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/repJoinSondage';?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/allStyle.css';?>">
        <title>Participation au sondage</title>
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
    <div class="SondageDescr">
        <p>Vous venez de rejoindre un sondage. Répondez aux différentes dates proposés ci-dessous.</p>
    </div>
    <div class="dateAffiche">
        <?php echo form_open('controlerUser/addVote', 'class="formulaire"'); ?>
            <?php 
            $i=0;
                foreach ($day as $Date){
                    echo '<p class="SondageDescr">';
                    echo 'Début de l\'évènement : ';
                    echo strftime('%d-%m-%Y',strtotime($Date['debutDate']));
                    echo ' à ';
                    echo date('H:i',strtotime($Date['debutHeure']));
                    echo "<br>";
                    echo 'Fin de l\'évènement : ';
                    echo strftime('%d-%m-%Y',strtotime($Date['finDate']));
                    echo ' à ';
                    echo date('H:i',strtotime($Date['finHeure']));
                    echo '</p>';
                    echo '<p class="SondageDescr">';
                    echo 'Pensez-vous participer à l\'évènement ?';
                    echo '</p>';

                    echo '<div class="divButton">';
                    echo "<div class='oui'>";
                    echo "<input type='radio' value='1' id='boutonOui".$i. "' name='bouton".$i."' checked>";
                    echo "<label for='boutonOui".$i."'>OUI</label>";
                    echo "</div>";

                    echo "<div class='non'>";
                    echo "<input type='radio' value='0' id='boutonNon".$i. "' name='bouton".$i."'>";
                    echo "<label for='boutonNon".$i."'>NON</label>";
                    echo "</div>";
                    echo '</div>';
                    $i=$i+1;
                    $_SESSION['nbDateInvite']=$i;
                }
                echo "<p class='errors'>" . $erreur . "</p>";
            ?>
            <input name="envoie" value="Valider" class="validateBoutonrep" type="submit">
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2021 - DEVCORP.COM</p>
    </div>
</body>
</html>