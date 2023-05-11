<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice3 sur tablo</title>
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
// array_keys recherche la clé dans un tableau la c'est les numéros des groupes 
$b=array_keys($a);
print_r($b);



?>