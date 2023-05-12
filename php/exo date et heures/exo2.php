<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo2</title>
</head>
<body>
    <?php
//---Combien reste-t-il de jours avant la fin de votre formation?-----

$date_formation=strtotime("21-09-2023");
echo "Nous sommes le ".date("d/m/Y")."<br>";
$datejour =time();
$diff=round(($date_formation-$datejour)/86400);
echo "Il me reste ".$diff." jours de formation";

?>
    
</body>
</html>