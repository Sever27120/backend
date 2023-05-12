
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
</head>
<body>
    
</body>
</html>

<?php
$nom = $_POST["nom"];
$email = $_POST["email"];
$message = $_POST["message"];

echo "Nom : " . $nom . "<br>";
echo "E-mail : " . $email . "<br>";
echo "Message : " . $message . "<br>";
?>   