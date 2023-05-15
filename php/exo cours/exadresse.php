<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exemple à la fin du cour 1</title>
</head>
<body>
    <?php
    echo 'l\'adresse utilisateur est : '. $_SERVER["REMOTE_ADDR"] . '<br>';
   
    
    echo 'l\'adresse du serveur est : '.(isset($_SERVER["SERVER_ADDR"]) ? $_SERVER[SERVER_ADDR] : "not defined").'<br>';


    ?>
    


</body>
</html>