<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/voirSondage';?>">
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
        <p>Retrouvez ici les réponses à votre sondage 
            des différents participants.</p>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Date Début</th>
      <th>Heure Début</th>
      <th>Date Fin</th>
      <th>Heure Fin</th>
      <th>Participant</th>
      <th>Réponse</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $i=0;
    foreach($sondages as $Sondages) {
      echo "<tr>";
      echo "<th>" . $Sondages ['titre'] . "</th>";
      echo "<th>" . strftime('%d-%m-%Y',strtotime($Sondages['debutDate'])) . "</th>";
      echo "<th>" . date('H:i',strtotime($Sondages['debutHeure'])) . "</th>";
      echo "<th>" . strftime('%d-%m-%Y',strtotime($Sondages['finDate'])) . "</th>";
      echo "<th>" . date('H:i',strtotime($Sondages['finHeure'])) . "</th>";
      echo "<th>" . $participant[$i][0]['loginParticipant'] . "</th>";
      echo "<th>";
      if ($participant[$i][0]['reponse']==1) {
        echo "Oui";
      } else {
        echo "Non";
      }
      echo "</th>";

      #var_dump($participant);
      
      echo "</tr>";
      $i++;
    }
    
    ?>


    <!--<tr>
      <th>1</th>
    </tr>
    <tr>
      <th>2</th>
    </tr>
    <tr>
      <th>3</th>
    </tr>-->
  </tbody>
</table>
    
<div class="menu">
    <a href="<?php echo site_url('controlerUser/loadPageConnect');?>" class="boutonMenu">Accueil compte</a>
</div>

    
    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2021 - DEVCORP.COM</p>
    </div>
</body>
</html>