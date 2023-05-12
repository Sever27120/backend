<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo sur fonction calculator</title>
</head>
<body>
<form method='post' action=''>
        <input type="radio" value="Addition" name="calcu"> Addition .<br />
        <input type="radio" value="Subtraction" name="calcu"> Subtraction .<br />
        <input type="radio" value="Multiplication" name="calcu"> Multiplication .<br />
        <input type="radio" value="Division" name="calcu"> Division .<br />

        <label for='nombre1'>Nombre 1 : </label>
        <input type='number' name='nombre1'><br>

        <label for='nombre2'>Nombre 2 : </label>
        <input type='number' name='nombre2'><br>

        <input type='submit' value='Envoyer'>
    </form>

    <?php 
    if(isset($_POST['nombre1']) && isset($_POST['nombre2']) && isset($_POST['calcu'])){// conditions des info écrit par l'utilisateur

        $nombre1 = $_POST['nombre1'];// vient chercher dans le imput le numéro 1 écrit
        $nombre2 = $_POST['nombre2'];// vient chercher dans le imput le numéro 2 écrit
        $calcu = $_POST['calcu'];// vient chercher dans le imput si il a chosi + - * /

        function calculate($n1, $n2, $calcu)// indique les paramètres de la fonction 1 nombre 2 nombre et + - * /
        {
            // calcule c'est le choix de l'utilisateur + - * /
            switch($calcu) 
            {
                // si choix addition nombre 1+ nombre 2 breack la fin si c'est ce choix
            case "Addition":
                $compute = $n1 + $n2; 
                break;
                // si choix addition nombre 1- nombre 2 breack la fin si c'est ce choix 
                //Attention pas écrire soustaction mais subtraction sinon ce la ne fonctionnera pas
            case "Subtraction":
                $compute = $n1 - $n2; 
                break;
                // si choix addition nombre 1* nombre 2 breack la fin si c'est ce choix 
            case "Multiplication":
                $compute = $n1 * $n2; 
                break;
                // si choix addition nombre 1/ nombre 2 breack la fin si c'est ce choix 
            case "Division":
                $compute = $n1 / $n2; 
                break;
                // défaut si l'utilisateur ne choisi pas .
            default:
            echo "Choisir le calculateur soit addition,soustarction,division,multiplication"; 
            }
            return $compute;// retourne le résultat de fin
        }
// renvoie à l'utilisateur à l'écran le choix du calculateur comme multiplication
        echo "Opération : " . $calcu . "<br>";
        // renvoie à l'utilisateur à l'écran le nombre 1 taper
        echo "Premier nombre : " . $nombre1 . "<br>";
        // renvoie à l'utilisateur à l'écran le nombre 2 taper
        echo "Deuxième nombre : " . $nombre2 . "<br>";
        //renvoie le résultat donc nombre1(le calculateur choisi)nombre2=resultat
        echo "Résultat : " . calculate($nombre1, $nombre2, $calcu);
    }
    ?>
</body>
</html>