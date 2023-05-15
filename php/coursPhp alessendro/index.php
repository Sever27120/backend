<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    echo "Hello World";

    $clientIP = $_SERVER['REMOTE_ADDR']; // Adresse IP du client
    $serverIP = isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : 'Non défini'; // Adresse IP du serveur XAMPP en tant qu'environnement de développement local. Lorsque vous travaillez en local, certaines variables de $_SERVER peuvent ne pas être définies, comme $_SERVER['SERVER_ADDR']
    //Dans cet exemple, nous utilisons l'opérateur ternaire pour vérifier si $_SERVER['SERVER_ADDR'] est défini. Si c'est le cas, la valeur de $serverIP sera l'adresse IP du serveur. Sinon, la valeur sera 'Non défini'.
    echo "<br/>"; // Saut de ligne en HTML
    echo "Adresse IP du client: " . $clientIP;
    echo "<br/>";
    echo "Adresse IP du serveur: " . $serverIP;

    echo "<hr>"; // Ligne horizontale en HTML

    //Exercice 1
   echo "<br/>";
   echo "exercice 1";
    echo "<br/>";
    for ($i = 1; $i <= 150; $i += 2) {
        echo $i . " ";
    }

    echo "<hr>";

    //Exercice 2
    //Écrire un programme qui écrit 500 fois la phrase Je dois faire des sauvegardes régulières de mes fichiers.

    echo "<br/>";
    echo "exercices 2";
    echo "<br>";
    for ($i = 1; $i <= 500; $i++) {
        echo $i . " Je dois faire des sauvegardes régulières de mes fichiers. ";
    }

    echo "<hr>";

    //Exercice 3
    //Ecrire un script qui affiche la table de multiplication totale de {1,...,12} par {1,...,12}, le résultat doit être le suivant :

    echo "<br/>";
    echo "Exercice 3";
    echo "<br>";
    
    echo "<table border='1'>"; // Ajoutez une bordure au tableau pour une meilleure visibilité
    
    for ($i = 1; $i <= 12; $i++) {
        echo "<tr>"; // Ouvre une nouvelle ligne du tableau
    
        for ($j = 1; $j <= 12; $j++) {
            echo "<td>"; // Ouvre une nouvelle cellule du tableau
            echo $i * $j;
            echo "</td>"; // Ferme la cellule du tableau
        }
    
        echo "</tr>"; // Ferme la ligne du tableau
    }
    
    echo "</table>"; // Ferme le tableau
    

    echo "<hr>";


    //Exercice 4
    $a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
        "", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
        "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"),
        "19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
        "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage",
        "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""),
        "19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
        "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
        "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation"),
);

//Quelle semaine a lieu la validation du groupe 19002 ?

echo "<br/>";
echo "Exercice 4";
echo "<br>";

$group = 19002;
$validationWeek = array_search("Validation", $a[$group]);
echo "La validation du groupe " . $group . " a lieu à la semaine " . ($validationWeek + 1);

echo "<hr>";


//Trouver la position de la dernière occurrence de Stage pour le groupe 19001.

echo "<br/>";
echo "Exercice 4";
echo "<br>";
$group = 19001;
$lastStageWeek = array_search("Stage", array_reverse($a[$group]));
echo "la Derniere occurance de stage pour le goupe" . $group . "est la semaine" . (25 - $lastStageWeek);

echo "<hr>";

//Extraire, dans un nouveau tableau, les codes des groupes.

echo "<br/>";
echo "Exercice 5";
echo "<br>";

$groupCodes = array_keys($a);
print_r($groupCodes);

echo "<hr>";


//Combien de semaines dure le stage du groupe 19003 ?

echo "<br/>";
echo "Exercice 6";
echo "<br>";

$group = 19003;
$lastStageWeek = array_search("Stage", array_reverse($a[$group]));
$firstStageWeek = array_search("Stage", $a[$group]);

echo "Le stage du groupe " . $group . " dure " . ($lastStageWeek - $firstStageWeek + 1) . " semaines";

echo "<hr>";

//FUNCTIONS
//1 Ecrivez la fonction calculator() traitant les opérations d'addition, de soustraction, de multiplication et de division.

function calculator($a, $b, $operateur) {
    switch ($operateur) {
        case "+":
            return $a + $b;
            break;
        case "-":
            return $a - $b;
            break;
        case "*" :
            return $a * $b;
            break;
        case "/" :
            return $a / $b;
            break;
        default:
            return "L'opérateur n'est pas valide";
    }
}

$result = calculator(5, 5, "/");
echo "Le resultat est " . $result;


echo "<hr>";


echo "<br/>";
echo "Afficher la date ";
echo "<br>";

// on déclare une instance de l'objet PHP 'DateTime' :
$date = new DateTime();
// on affiche le résultat :
echo $date->format('Y-m-d H:i:s');

echo "<hr>";

echo "FUNCTIONS";
echo "<br/>";
echo "1 Exercices
Utilisez l'objet DateTime, sauf mention contraire.";
echo "<br>";

//1. Trouvez le numéro de semaine de la date suivante : 14/07/2019.

//$date = new DateTime("2019-07-14");
//echo "Le numéro de semaine de la date 14/07/2019 est " . $date->format("W");

//n,echo "<hr>";


//Combien reste-t-il de jours avant la fin de votre formation ?

echo "<br/>";
echo "2 Exercices";
echo "<br>";

$date = new DateTime(); // Date actuelle
$end = new DateTime("2023-09-10"); // Date de fin de formation
$interval = $date->diff($end); // Calcule la différence entre les deux dates

$remainingDays = $interval->format("%a"); // Récupère le nombre de jours restants
echo "Il reste " . $remainingDays . " jours avant la fin de la formation";



?>




</body>
</html>