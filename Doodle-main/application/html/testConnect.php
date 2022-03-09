<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>
        <?php
            if(isset($_GET['envoie'])) {

                $user = $_GET['user'];
                $mdp = $_GET['mdp'];
                echo "Nom d'utilisateur : " . $user . "<br>" . "MDP : " . $mdp;
            }
            

        ?>

    </h3>

</body>
</html>