<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo3</title>
</head>
<body>
    <?php
//---Comment déterminer si une année est bissextile?-----

$annee = "2024";

// calcule pour trouver si l'année est bissextile
if ((($annee % 4 == 0) && ($annee % 100 != 0)) || ($annee % 400 == 0)) 
{

  
echo "$annee est une année bissextile";
} 

else {
    
   
echo "$annee n'est pas une année bissextile";
}



?>
    
</body>
</html>