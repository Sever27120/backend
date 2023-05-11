<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo sur fonction calculator</title>
</head>
<body>
    <?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$calcu = $_POST['calcu'];

    function calculate($n1,$n2, $calcu) // defiir $calcu comme paramètre
    {
        switch($calcu)
        {
        case "Addition":// ici utilisé les deux point pour faire un switch
            $compute = $n1 + $n2; 
            break;
        case "Soustraction":
            $compute = $n1 - $n2; 
            break;
        case "Multiplication":
            $compute = $n1 * $n2; 
            break;
        case "Division":
            $compute = $n1 / $n2; 
            break;
        }
        return $compute; // retourner la valeur de la variable
    }
echo .$calcu. "<br /> <br /> premier Nombre:". $num1." <br />deuxième nombre:" .$num2." <br /><br />";
echo "La réponse est:" .calculate($num1,$num2, $calcu);
    $num1=$_POST['num1']
    ?>
</body>
</html>