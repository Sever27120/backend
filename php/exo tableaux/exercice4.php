<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice4 sur tablo</title>
</head>
<body>
    <?php
$a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
"", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
"Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"),
"19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
"Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage",
"Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""),
"19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
"Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
"Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation")
);


$groupe="19003";

$activite ="Stage";

$nbrsemaines =0;

if (isset ($a[$groupe])){// Vérifier que le groupe existe dans le tableau

    foreach($a[$groupe] as $value){//chercher la clés groupe 19003 dans un tablo et renonner avec une variable value
        if ($value == $activite){ // la valeur value est égale à la valeur activité qui est stage
            $nbrsemaines++;// a chaque boucle dès qu'il trouve le mot stage il l'additionne et continue jusqu'au dernier mot stage de la boucle
        }


    }
}
echo "Le stage du groupe  ".$groupe. " dure ".$nbrsemaines." semaines ";
// affiche le résultat.
//. et équilvalent au + dans javascript

 ?>


</body>
</html>