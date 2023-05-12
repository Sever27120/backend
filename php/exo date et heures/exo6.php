<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo5</title>
</head>
<body>
 <?php
//---Ajoutez 1 mois à la date courante---


$date = date('Y-m-d');
$nouvelle_date = date('Y-m-d', strtotime('+1 month', strtotime($date)));
echo $nouvelle_date;
?>



    
</body>
</html>