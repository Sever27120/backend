
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
$nom = $_POST["nom"];// Cherche ce qui a été écrit par l'utilisateur du nom
$email = $_POST["email"];// Cherche ce qui a été écrit par l'utilisateur du prénom
$message = $_POST["message"];// Cherche ce qui a été écrit par l'utilisateur du message

echo "Nom : " . $nom . "<br>";// envoie sur la page web le nom adresse et message inscrit pas l'utilisateur 
echo "E-mail : " . $email . "<br>";
echo "Message : " . $message . "<br>";
?>   