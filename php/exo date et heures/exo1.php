<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo1</title>
</head>
<body>
    <?php
//---Trouver le numéro de semaine de la date suivante:14/07/2019-----
// déclararer la date recherche dans le calendrier
$date_test="14-07-2019";
//sert à lire une date en format anglais
$format=strtotime($date_test);
// le W sert à compter le nombre de semaines sur calendrier à partir d'une date
echo "Le nombre de semaines de cette date est:" ;
echo date("W",$format);
?>
    
</body>
</html>