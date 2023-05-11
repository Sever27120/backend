<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice2 sur tablo</title>
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


$groupe=19001;
//initialiser la variable qui contiendra la dernière positipn
$last =false;

foreach ($a[$groupe] as $index =>$value){

    // si la valeur actuelle est égale à "stage",stocke sa position
if ($value == "Stage")
{// la valeur de la recherche du mot stage dans le tableau
    $last = $index;
    //la valeur suivante est stocker dans $lat jusqu'à la dernière puis garder dans une variable $index pour pouvoir l'afficher
    
}
}
 echo "La dernière position occurence de ".$groupe. "est:".($index-1);
?>


</body>
</html>





